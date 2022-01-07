<?php

if (!defined('ABSPATH')) exit;

class WC_Gateway_eSewa extends WC_Payment_Gateway
{

	public static $log_enabled = false;

	public static $log = false;

	public function __construct()
	{
		$this->id                 = 'esewa';
		
		$this->has_fields         = false;
		$this->order_button_text  = __('Proceed to payment', 'esewa-woocommerce');
		$this->method_title       = __('eSewa', 'esewa-woocommerce');

		$this->title       = 	__('eSewa', 'esewa-woocommerce');
		$this->icon = apply_filters('esewa_woocommerce_icon', plugins_url( 'assets/images/esewa__.png', ESEWA_WC_PLUGIN_FILE ));

		$this->method_description = __('Take payments via eSewa - redirects customer to eSewa to enter their payment information.', 'esewa-woocommerce');

		$this->init_form_fields();
		$this->init_settings();
		
      $this->testmode     = 'yes' === $this->get_option('testmode', 'no');
		$this->debug        = 'yes' === $this->get_option('debug', 'no');
		$this->service_code = $this->testmode ? $this->get_option('sandbox_service_code') : $this->get_option('service_code');

		if ($this->testmode == 'yes') {
			$this->sandbox_url = $this->get_option('sandbox_url');
		}
		$this->testmode_url = (empty($this->sandbox_url) ? 'https://uat.esewa.com.np' : $this->sandbox_url);

		$this->view_transaction_url = $this->testmode ? $this->testmode_url . '/#/transaction/%s' : 'https://esewa.com.np/#/transaction/%s';

		self::$log_enabled = $this->debug;

		add_action('admin_enqueue_scripts', array($this, 'admin_scripts'));
		add_action('woocommerce_update_options_payment_gateways_' . $this->id, array($this, 'process_admin_options'));

		if (!$this->is_valid_for_use()) {
			$this->enabled = 'no';
		} elseif ($this->service_code) {
			include_once dirname(__FILE__) . '/inc/esewa-wc-gateway-ipn-handler.php';
			new Esewa_WC_Gateway_IPN_Handler($this, $this->testmode, $this->service_code);
		}

		add_action('woocommerce_receipt_' . $this->id, array(&$this, 'esewa_woocommerce_confirmation_form'));
	}

	/**
	 * Order confirmation detail page.
	 */
	public function esewa_woocommerce_confirmation_form($order_id)
	{
		$order = new WC_Order($order_id);

		$items = $order->get_items();

		$this->icon = apply_filters('esewa_woocommerce_icon', plugins_url( 'assets/images/esewa__.png', ESEWA_WC_PLUGIN_FILE ));
      echo '
         <style>
            .woocommerce {
               border: 2px solid #446084;
               padding: 15px 30px;
            }
            input[type="submit"] { 
               background-color: #5fb946;
               color: #fff; 
            }
         </style>
      ';
		echo '<div class="esewa-content">';
			echo '<div class="esewa-np-logo">';
				echo '<img src="'.esc_url($this->icon).'" alt="eSewa" />';
			echo '</div>';
	      $this->description = $this->get_option('description');
	   	if ($this->testmode) {
				$this->description .= ' ' . __('SANDBOX ENABLED. Use testing accounts only.', 'esewa-woocommerce');
				echo '<p class="sandbox-text">';
					$description = trim($this->description);
					echo wp_kses_post($description);
				echo '</p>';
			}
		echo '</div>';

		/*
		*	Additional detail regarding order.
		*/
		$this->testmode =  $this->get_option( 'testmode', 'no' );
		if( $this->testmode == 'yes' ) {
			$this->sandbox_url = $this->get_option( 'sandbox_url' );
		}
		$this->testmode_url = ( empty($this->sandbox_url) ? 'https://esewa.com.np' : $this->sandbox_url );
		$this->test_mode_url = $this->testmode_url.'/epay/main';

		include_once dirname(__FILE__) . '/inc/source/esewa-wc-gateway-request.php';

		$esewa_request = new Esewa_WC_Gateway_Request($this);

		$url_notify =  $this->notify_url = WC()->api_request_url( 'WC_Gateway_eSewa' );
		$order_key = $order->get_order_key();
		$su_param = $url_notify.'?payment_status=success&key='.$order_key;

		$paymentForm = "";
		$paymentForm .= '<form method="POST" action="'.esc_url($this->test_mode_url).'" id="esewa_payment_form" name="esewa_load">';

		$paymentForm .= '<input name="tAmt" type="hidden" value="'.wc_format_decimal( $order->get_total(), 2 ).'">';

		$paymentForm .= '<input name="amt" type="hidden" value="'.wc_format_decimal( $order->get_subtotal() - $order->get_total_discount(), 2 ).'">';

		$paymentForm .= '<input name="txAmt" type="hidden" value="'.wc_format_decimal( $order->get_total_tax(), 2 ).'">';

		$paymentForm .= '<input name="psc" type="hidden" value="'.wc_format_decimal( $this->get_service_charge( $order ), 2 ).'">';

		$paymentForm .= '<input name="pdc" type="hidden" value="'.wc_format_decimal( $order->get_total_shipping(), 2 ).'">';

		$paymentForm .= '<input name="scd" type="hidden" value="'.esc_html($this->service_code).'">';

		$paymentForm .= '<input name="pid" type="hidden" value="'.esc_html($this->get_option( 'invoice_prefix' ).$order->get_order_number()).'">';

		$paymentForm .= '<input name="su" type="hidden" value="'.esc_url_raw( $su_param).'">';

		$paymentForm .= '<input name="fu" type="hidden" value="'.esc_url_raw( $order->get_cancel_order_url_raw() ).'">';

		$paymentForm .= '<input value="Proceed to Esewa" type="submit">';
		$paymentForm .= '</form>';

		echo $paymentForm;

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


	public function admin_scripts()
	{
		$screen    = get_current_screen();
		$screen_id = $screen ? $screen->id : '';

		if ($screen_id !== 'woocommerce_page_wc-settings') return;

		$script_include = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min';

		wp_enqueue_script('esewa_woocommerce_admin', plugins_url('/assets/js/esewa-admin' . $script_include . '.js', ESEWA_WC_PLUGIN_FILE), array(), WC_VERSION, true);
	}


	public function process_payment($order_id)
	{
		include_once dirname(__FILE__) . '/inc/source/esewa-wc-gateway-request.php';

		$order         = wc_get_order($order_id);
		$esewa_request = new Esewa_WC_Gateway_Request($this);

		/*
		 *	true = Shows confirmation form first. Use this to request a from with post request.
		 *	false = redirect directly to Esewa site using get approach.
		 */

		$show_form = true;

		$redirect = $show_form ? $order->get_checkout_payment_url(true) : $esewa_request->get_request_url($order, $this->testmode);

		return array(
			'result'   => 'success',
			'redirect' => $redirect
		);
	}

	public function process_admin_options()
	{
		$saved = parent::process_admin_options();

		if ('yes' !== $this->get_option('debug', 'no')) {
			if (empty(self::$log)) {
				self::$log = wc_get_logger();
			}
			self::$log->clear('esewa');
		}
		return $saved;
	}

	public function is_valid_for_use()
	{
		return in_array(get_woocommerce_currency(), apply_filters('woocommerce_esewa_supported_currencies', array('NPR')), true);
	}

	public function admin_options()
	{
		if ($this->is_valid_for_use()) {
			parent::admin_options();
		} else {
?>
			<div class="inline error">
				<p>
					<strong><?php esc_html_e('Gateway Disabled', 'esewa-woocommerce'); ?></strong>: <?php esc_html_e('eSewa does not support your store currency.', 'esewa-woocommerce'); ?>
				</p>
			</div>
<?php
		}
	}

	public function needs_setup()
	{
		return empty($this->service_code);
	}

	public static function log($message, $level = 'info')
	{
		if (self::$log_enabled) {
			if (empty(self::$log)) {
				self::$log = wc_get_logger();
			}
			self::$log->log($level, $message, array('source' => 'esewa'));
		}
	}

	public function init_form_fields()
	{
		$this->form_fields = array(
			'enabled'              => array(
				'title'   => __('Enable/Disable','esewa-woocommerce'),
				'type'    => 'checkbox',
				'label'   => __('Enable eSewa Payment', 'esewa-woocommerce'),
				'default' => 'yes',
			),
			'service_code'         => array(
				'title'       => __('Live Merchant/Service code','esewa-woocommerce'),
				'type'        => 'text',
				'desc_tip'    => true,
				'description' => __('Please enter the Merchant/Service code provided by eSewa in order to accept payments.', 'esewa-woocommerce'),
				'default'     => '',
			),
			'sandbox_service_code' => array(
				'title'       => __('Test Merchant/Service code','esewa-woocommerce'),
				'type'        => 'text',
				'desc_tip'    => true,
				'description' => __('Please enter the Merchant/Service code provided by eSewa in order to accept payments.', 'esewa-woocommerce'),
				'default'     => '',
			),
			'invoice_prefix'       => array(
				'title'       => __('Invoice prefix','esewa-woocommerce'),
				'type'        => 'text',
				'desc_tip'    => true,
				'description' => __('Enter unique prefix for your invoices. eSewa will not accept same invoice number if you have multiple stores.', 'esewa-woocommerce'),
				'default'     => 'WC-',
			),
			'description'          => array(
				'title'       => __('Description','esewa-woocommerce'),
				'type'        => 'text',
				'desc_tip'    => true,
				'description' => __('The description changes the text seen below the eSewa logo in the checkout page.', 'esewa-woocommerce'),
				'default'     => __('Pay via your eSewa account. Payment you make through eSewa account is completely secured.', 'esewa-woocommerce'),
			),
			'advanced'             => array(
				'title'       => __('Advanced options','esewa-woocommerce'),
				'type'        => 'title',
				'description' => '',
			),
			'testmode'             => array(
				'title'       => __('Sandbox mode','esewa-woocommerce'),
				'type'        => 'checkbox',
				'label'       => __('Enable Sandbox Mode','esewa-woocommerce'),
				'default'     => 'no',
				/* translators: %s: eSewa contact page */
				'description' => sprintf(__('Enable sandbox mode to test payments. Please contact eSewa Merchant/Service Provider for a <a href="%s" target="_blank">developer account</a>.', 'esewa-woocommerce'), 'https://blog.esewa.com.np/contact-us/'),
			),
			'sandbox_url'         => array(
				'title'       => __('Sandbox Test URL','esewa-woocommerce'),
				'type'        => 'text',
				'description' => __('Eg: https://uat.esewa.com.np<br/> Do not add any letter or symbol after .com.np','esewa-woocommerce'),
				'default'     => 'https://uat.esewa.com.np',
			),
			'debug'                => array(
				'title'       => __('Debug log','esewa-woocommerce'),
				'type'        => 'checkbox',
				'label'       => __('Enable logging','esewa-woocommerce'),
				'default'     => 'no',
				/* translators: %s: eSewa log file path */
				'description' => sprintf(__('Logs eSewa event. File Location: <code>%s</code>', 'esewa-woocommerce'), wc_get_log_file_path('esewa')),
			),
			'ipn_notification'     => array(
				'title'       => __('IPN Email Notification','esewa-woocommerce'),
				'type'        => 'checkbox',
				'label'       => __('Enable IPN email notification','esewa-woocommerce'),
				'default'     => 'yes',
				'description' => __('Send notifications when an IPN is received from eSewa indicating cancellations.','esewa-woocommerce'),
			)
		);
	}
}
