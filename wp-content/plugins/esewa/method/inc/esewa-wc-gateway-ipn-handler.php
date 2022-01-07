<?php

if( ! defined( 'ABSPATH' )) exit;

require_once dirname( __FILE__ ) . '/source/esewa-wc-gateway-response.php';

class Esewa_WC_Gateway_IPN_Handler extends Esewa_WC_gateway_response {

	protected $service_code;

	public function __construct( $gateway, $sandbox = false, $service_code = '' ) {
		add_action( 'woocommerce_api_wc_gateway_esewa', array( $this, 'check_response' ) );
		add_action( 'valid-esewa-standard-ipn-request', array( $this, 'valid_response' ) );
		$this->service_code = $service_code;
		$this->sandbox      = $sandbox;
		$this->gateway      = $gateway;
	}

	public function check_response() {
		if ( ! empty( $_REQUEST ) && $this->validate_ipn() ) { // WPCS: CSRF ok.
			$requested = wp_unslash( $_REQUEST ); // WPCS: CSRF ok, input var ok.

			// phpcs:ignore WordPress.NamingConventions.ValidHookName.UseUnderscores
			do_action( 'valid-esewa-standard-ipn-request', $requested );
			exit;
		}
		include_once dirname( __FILE__ ) . '/template/message-view.php';
		exit;
	}

	public function valid_response( $requested ) {
		$order = isset( $requested['oid'], $requested['key'] ) ? $this->get_esewa_order( $requested['oid'], $requested['key'] ) : false;

		if ( $order ) {

			$requested['payment_status'] = strtolower( $requested['payment_status'] );

			if ( ( isset( $requested['refId'] )) && ( $requested['payment_status'] === 'success' )) {
				$requested['payment_status'] = 'completed';
				$requested['pending_reason'] = __( 'eSewa IPN response failed.', 'esewa-woocommerce' );
			} else {
				$requested['payment_status'] = 'failed';
			}

			if( ! empty($_GET['refId']) ) {
				update_post_meta($order->get_id(),'txnID',wc_clean( sanitize_text_field( wp_unslash($_GET['refId']))));
			}

			WC_Gateway_eSewa::log( 'Found order #' . $order->get_id() );
			WC_Gateway_eSewa::log( 'Payment status: ' . $requested['payment_status'] );

			if ( method_exists( $this, 'payment_status_' . $requested['payment_status'] ) ) {
				call_user_func( array( $this, 'payment_status_' . $requested['payment_status'] ), $order, $requested );
				wp_safe_redirect( esc_url_raw( add_query_arg( 'utm_nooverride', '1', $this->gateway->get_return_url( $order ) ) ) );
				exit;
			}
		}
	}

	public function validate_ipn() {
		WC_Gateway_eSewa::log( 'Checking IPN response is valid' );

		$orderID    = isset( $_REQUEST['oid'] ) ? wc_clean( sanitize_text_field( wp_unslash($_REQUEST['oid'] ) ) ) : ''; // WPCS: input var ok, CSRF ok.
		$transaction = isset( $_REQUEST['refId'] ) ? wc_clean( sanitize_text_field(wp_unslash( $_REQUEST['refId'] ) ) ) : ''; // WPCS: input var ok, CSRF ok.
		$order_amount      = isset( $_REQUEST['amt'] ) ? wc_clean( sanitize_text_field(wp_unslash( $_REQUEST['amt'] ) ) ): ''; // WPCS: input var ok, CSRF ok.

		if ( isset( $_REQUEST['key'] ) ) { // WPCS: CSRF ok.
			$order = $this->get_esewa_order( $orderID, wc_clean( sanitize_text_field(wp_unslash( $_REQUEST['key'] ) ) ) ); // WPCS: input var ok, CSRF ok.

			if ( number_format( $order->get_total(), 2, '.', '' ) !== number_format( $order_amount, 2, '.', '' ) ) {

				$requested = wp_unslash( $_REQUEST );
				$requested['payment_status'] = 'failed';

				if( ! empty($_GET['refId']) ) {
					update_post_meta($order->get_id(),'txnID',wc_clean( sanitize_text_field( wp_unslash($_GET['refId']))));
				}

				WC_Gateway_eSewa::log( 'Found order #' . $order->get_id() );
				WC_Gateway_eSewa::log( 'Payment status: ' . $requested['payment_status'] );
				if ( method_exists( $this, 'payment_status_' . $requested['payment_status'] ) ) {
					call_user_func( array( $this, 'payment_status_' . $requested['payment_status'] ), $order, $requested );
				}

				WC_Gateway_eSewa::log( 'Amount alert: eSewa amount do not match (sent "' . $order->get_total() . '" | returned "' . $order_amount . '").', 'alert' );
				$order_amount = $order->get_total();
			}
		}

		$order_data = array(
			'body'        => array(
				'amt' => $order_amount,
				'pid' => $orderID,
				'rid' => $transaction,
				'scd' => $this->service_code,
			),
			'timeout'     => 60,
			'httpversion' => '1.1',
			'compress'    => false,
			'decompress'  => false,
			'user-agent'  => 'WooCommerce/' . WC()->version,
			'sslverify'   => apply_filters( 'https_local_ssl_verify', false ),
		);

		if( $this->sandbox ) {
			$this->sandbox_url = $this->gateway->get_option( 'sandbox_url' );
		}
		$this->testmode_url = ( empty($this->sandbox_url) ? 'https://uat.esewa.com.np' : $this->sandbox_url );

		$order_item = wp_safe_remote_post( $this->sandbox ? $this->testmode_url.'/epay/transrec' : 'https://esewa.com.np/epay/transrec', $order_data );

		if( ! empty($_GET['refId']) ) {
			$response_url = ( $this->sandbox ? '' : 'https://esewa.com.np/#/transaction/'.wc_clean( sanitize_text_field(wp_unslash($_GET['refId']))));
			update_post_meta($order->get_id(),'order_url',$response_url);
		}

		WC_Gateway_eSewa::log( 'IPN Response: ' . wc_print_r( $order_item, true ) );

		if ( ! is_wp_error( $order_item ) && $order_item['response']['code'] >= 200 && $order_item['response']['code'] < 300 && strstr( strtoupper( $order_item['body'] ), 'SUCCESS' ) ) {
			WC_Gateway_eSewa::log( 'Valid response received from eSewa IPN' );
			return true;
		}

		WC_Gateway_eSewa::log( 'Invalid response received from eSewa IPN' );

		if ( is_wp_error( $order_item ) ) {
			WC_Gateway_eSewa::log( 'Error response: ' . $order_item->get_error_message() );
		}
		return false;
	}

	protected function payment_status_completed( $order, $requested ) {
		if ( $order->has_status( wc_get_is_paid_statuses() ) ) {
			WC_Gateway_eSewa::log( 'Aborting, Order #' . $order->get_id() . ' is already complete.' );
			exit;
		}

		if ( $requested['payment_status'] === 'completed' ) {
			if ( $order->has_status( 'cancelled' ) ) {
				$this->payment_status_paid_cancelled_order( $order, $requested );
			}

			$this->payment_complete( $order, ( ! empty( $requested['refId'] ) ? wc_clean( $requested['refId'] ) : '' ), __( 'IPN payment completed', 'esewa-woocommerce' ) );

			if ( ! empty( $requested['refId'] ) ) {
				update_post_meta( $order->get_id(), 'eSewa Reference Code', wc_clean( $requested['refId'] ) );
			}
		} else {
			/* translators: %s: pending reason */
			$this->payment_on_hold( $order, sprintf( __( 'Payment pending: %s', 'esewa-woocommerce' ), $requested['pending_reason'] ) );
		}
	}

	protected function send_ipn_email_notification( $subject, $message ) {
		$new_order_settings = get_option( 'woocommerce_new_order_settings', array() );
		$mailer             = WC()->mailer();
		$message            = $mailer->wrap_message( $subject, $message );

		$woocommerce_esewa_settings = get_option( 'woocommerce_esewa_settings' );
		if ( ! empty( $woocommerce_esewa_settings['ipn_notification'] ) && 'no' === $woocommerce_esewa_settings['ipn_notification'] ) {
			return;
		}

		$mailer->send( ! empty( $new_order_settings['recipient'] ) ? $new_order_settings['recipient'] : get_option( 'admin_email' ), strip_tags( $subject ), $message );
	}

	protected function payment_status_paid_cancelled_order( $order, $requested ) {
		if ( version_compare( WC_VERSION, '3.0', '>=' ) ) {
			$this->send_ipn_email_notification(
				/* translators: %s: order link. */
				sprintf( __( 'Payment for cancelled order %s received', 'esewa-woocommerce' ), '<a class="link" href="' . esc_url( $order->get_edit_order_url() ) . '">' . $order->get_order_number() . '</a>' ),
				/* translators: %s: order ID. */
				sprintf( __( 'Order #%s has been marked paid by eSewa IPN, but was previously cancelled. Admin handling required.', 'esewa-woocommerce' ), $order->get_order_number() )
			);
		}
	}

	protected function payment_status_failed( $order, $requested ) {
		/* translators: %s: payment status */
		$order->update_status( 'failed', sprintf( __( 'Payment %s via IPN.', 'esewa-woocommerce' ), wc_clean( $requested['payment_status'] ) ) );
	}
}
