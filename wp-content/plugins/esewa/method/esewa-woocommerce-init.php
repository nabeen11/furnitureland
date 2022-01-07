<?php

if( ! defined( 'ABSPATH' )) exit;

final class Esewa_WooCommerce_Init {

	/* Plugin version. */
	const VERSION = '1.0.0';

	protected static $instance = null;

	private function __construct() {
		if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0', '>=' ) ) {
			$this->includes();

			add_filter( 'woocommerce_payment_gateways', array( $this, 'esewa_wc_add_gateway' ) );
			add_filter( 'plugin_action_links_' . plugin_basename( ESEWA_WC_PLUGIN_FILE ), array( $this, 'esewa_wc_plugin_action_links' ) );
		} else {
			add_action( 'admin_notices', array( $this, 'esewa_wc_missing_notice' ) );
		}
	}

	private function includes() {
		include_once dirname( ESEWA_WC_PLUGIN_FILE ) . '/method/esewa-wc-payment-gateway.php';
	}

	public function esewa_wc_add_gateway( $methods ) {
		$methods[] = 'WC_Gateway_eSewa';
		return $methods;
	}

	public static function get_instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}
		return self::$instance;
	}

	public function esewa_wc_plugin_action_links( $actions ) {
		$link_action = array(
			'settings' => '<a href="' . admin_url( 'admin.php?page=wc-settings&tab=checkout&section=esewa' ) . '" aria-label="' . esc_attr( __( 'View WooCommerce eSewa settings', 'esewa-woocommerce' ) ) . '">' . __( 'Settings', 'esewa-woocommerce' ) . '</a>',
		);
		return array_merge( $link_action, $actions );
	}

	public function esewa_wc_missing_notice() {
		/* translators: %s: woocommerce version */
		echo '<div class="error notice is-dismissible"><p>' . sprintf( esc_html__( 'eSewa WooCommerce depends on the last version of %s or later to work!', 'esewa-woocommerce' ), '<a href="http://www.woothemes.com/woocommerce/" target="_blank">' . esc_html__( 'WooCommerce 3.0', 'esewa-woocommerce' ) . '</a>' ) . '</p></div>';
	}
}
