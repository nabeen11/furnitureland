<?php
/*
* Plugin Name: eSewa - Nepal's First Payment Gateway
* Description: eSewa official plugin for WooCommerce
* Version: 0.2
* Text Domain: esewa-woocommerce
*/

if( ! defined( 'ABSPATH' )) exit;

/* 
*
* Plugin File Path. 
*
*/
if ( ! defined( 'ESEWA_WC_PLUGIN_FILE' ))
	define( 'ESEWA_WC_PLUGIN_FILE', __FILE__ );

/*
*
* Include Esewa_WooCommerce_Init class. 
*
*/
if ( ! class_exists( 'Esewa_WooCommerce_Init' ))
	include_once dirname( __FILE__ ) . '/method/esewa-woocommerce-init.php';

add_action( 'plugins_loaded', array( 'Esewa_WooCommerce_Init', 'get_instance' ) );

/* 
*
* Include file displaying order-details on different payment status. 
*
*/
include_once dirname( __FILE__ ) . '/method/inc/order/order-detail.php';

/*
*
* Update Thankyou page with a message. 
*
*/
add_filter('woocommerce_thankyou_order_received_text', 'esewa_woocommerce_change_order_received_text', 10, 2 );
function esewa_woocommerce_change_order_received_text( $txnID, $order ) {
   	$txnID = '';
	if( ! empty( $order->get_transaction_id() ) ) {
	   $txnID = '<b> Transaction ID: '.$order->get_transaction_id().'<b/>';
	}
   return $txnID;
}

/*
*
* Virtual product payment complete status.  
*
*/
add_filter( 'woocommerce_payment_complete_order_status', 'esewa_woocommerce_virtual_order_payment_complete_order_status', 10, 2 );
function esewa_woocommerce_virtual_order_payment_complete_order_status( $order_status, $order_id ) {

  $order = wc_get_order( $order_id );

  if ( 'processing' == $order_status &&
       ( 'on-hold' == $order->status || 'pending' == $order->status || 'failed' == $order->status ) ) {

    $virtual_order = null;

    if ( count( $order->get_items() ) > 0 ) {

      foreach( $order->get_items() as $item ) {

        if ( 'line_item' == $item['type'] ) {

          $_product = $order->get_product_from_item( $item );

          if ( ! $_product->is_virtual() ) {
            // once we've found one non-virtual product we know we're done, break out of the loop
            $virtual_order = false;
            break;
          } else {
            $virtual_order = true;
          }
        }
      }
    }

    // virtual order, mark as completed
    if ( $virtual_order ) {
      return 'completed';
    }
  }

  // non-virtual order, return original status
  return $order_status;
}
