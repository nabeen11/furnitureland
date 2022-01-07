<?php

if( ! defined( 'ABSPATH' )) exit;

class Esewa_WC_Gateway_Request {

	protected $gateway;

	protected $notify_url;

	protected $endpoint;

	public function __construct( $gateway ) {
		$this->gateway    = $gateway;
		$this->notify_url = WC()->api_request_url( 'WC_Gateway_eSewa' );
	}

	public function get_request_url( $order, $sandbox = false ) {

		if( $sandbox ) {
			$this->sandbox_url = $this->gateway->get_option( 'sandbox_url' );
		}
		$this->testmode_url = ( empty($this->sandbox_url) ? 'https://uat.esewa.com.np' : $this->sandbox_url );

		$this->endpoint = $sandbox ? $this->testmode_url.'/epay/main?' : 'https://esewa.com.np/epay/main?';

		$esewa_args     = $this->get_esewa_args( $order, $sandbox );

		WC_Gateway_eSewa::log( 'eSewa Request Args for order ' . $order->get_order_number() . ': ' . wc_print_r( $esewa_args, true ) );

		return $this->endpoint . http_build_query( $esewa_args, '', '&' );
	}

	protected function limit_length( $string, $limit = 127 ) {
		$str_limit = $limit - 3;
		if ( function_exists( 'mb_strimwidth' ) ) {
			if ( mb_strlen( $string ) > $limit ) {
				$string = mb_strimwidth( $string, 0, $str_limit ) . '...';
			}
		} else {
			if ( strlen( $string ) > $limit ) {
				$string = substr( $string, 0, $str_limit ) . '...';
			}
		}
		return $string;
	}

	protected function get_esewa_args( $order, $sandbox ) {
		WC_Gateway_eSewa::log( 'Generating payment form for order ' . $order->get_order_number() . '. Notify URL: ' . $this->notify_url );

		return apply_filters(
			'woocommerce_esewa_args',
			array_merge(
				array(
					'amt'   => wc_format_decimal( $order->get_subtotal() - $order->get_total_discount(), 2 ),
					'txAmt' => wc_format_decimal( $order->get_total_tax(), 2 ),
					'psc'   => wc_format_decimal( $this->get_service_charge( $order ), 2 ),
					'pdc'   => wc_format_decimal( $order->get_total_shipping(), 2 ),
					'tAmt'  => wc_format_decimal( $order->get_total(), 2 ),
					'scd'   => $this->limit_length( $this->gateway->get_option( $sandbox ? 'sandbox_service_code' : 'service_code' ), 32 ),
					'pid'   => $this->limit_length( $this->gateway->get_option( 'invoice_prefix' ) . $order->get_order_number(), 127 ),

					'return'        => esc_url_raw( add_query_arg( 'utm_nooverride', '1', $this->gateway->get_return_url( $order ) ) ),
					'cancel_return' => esc_url_raw( $order->get_cancel_order_url_raw() ),
					'notify_url'    => $this->limit_length( $this->notify_url, 255 ),
					'custom'        => wp_json_encode(
						array(
							'order_id'  => $order->get_id(),
							'order_key' => $order->get_order_key(),
						)
					),
				),
				$this->get_payment_status_args( $order )
			),
			$order
		);
	}

	protected function get_payment_status_args( $order ) {
		$payment_statuses = array(
			'su' => 'success',
			'fu' => 'failure',
		);

		foreach ( $payment_statuses as $key => $payment_status ) {
			$payment_status_args[ $key ] = esc_url_raw(
				add_query_arg(
					array(
						'payment_status' => $payment_status,
						'key'            => $order->get_order_key(),
					),
					$this->limit_length( $this->notify_url, 255 )
				)
			);
		}
		return $payment_status_args;
	}

	protected function get_service_charge( $order ) {
		$fee_total = 0;

		if ( count( $order->get_fees() ) > 0 ) {
			foreach ( $order->get_fees() as $item ) {
				$fee_total += ( isset( $item['line_total'] ) ) ? $item['line_total'] : 0;
			}
		}
		return $fee_total;
	}
}
