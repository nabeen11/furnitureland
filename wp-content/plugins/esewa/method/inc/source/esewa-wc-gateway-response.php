<?php

if( ! defined( 'ABSPATH' )) exit;

abstract class Esewa_WC_gateway_response {

	protected $sandbox = false;

	protected function get_esewa_order( $orderID, $order_key ) {
		if ( is_string( $order_key ) ) {
			$order = wc_get_order( $orderID );

			if ( ! $order ) {
				$orderID = wc_get_order_id_by_order_key( $order_key );
				$order    = wc_get_order( $orderID );
			}

			if ( ! $order || $order->get_order_key() !== $order_key ) {
				WC_Gateway_eSewa::log( 'Order Keys do not match.', 'error' );
				return false;
			}
		} else {
			WC_Gateway_eSewa::log( 'Order ID and key were not found.', 'error' );
			return false;
		}

		return $order;
	}

	protected function payment_complete( $order, $txnID = '', $note = '' ) {
		$order->add_order_note( $note );
		$order->payment_complete( $txnID );
		WC()->cart->empty_cart();
	}

	protected function payment_on_hold( $order, $reason = '' ) {
		$order->update_status( 'on-hold', $reason );
		$order->reduce_order_stock();
		WC()->cart->empty_cart();
	}
}
