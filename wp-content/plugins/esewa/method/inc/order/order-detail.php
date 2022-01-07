<?php 

/*
*
* Include file displaying order-details on different payment status. 
*
*/
add_action( 'woocommerce_admin_order_data_after_order_details', 'esewa_wc_display_data_order_detail' );
function esewa_wc_display_data_order_detail( $order ) {
   $transactionID = $order->get_transaction_id();
   $transaction_message = ''; 
   $order_status = $order->status;

   if ( $order_status != 'processing' ) { ?>

      <div class="order_data_col">

         <?php $txnID = get_post_meta($order->get_id(),'txnID',true);
         $order_url = get_post_meta($order->get_id(),'order_url',true);

         if( ! empty($txnID)) {
            if( empty($order_url)) {
               $transaction_message .= esc_html('Payment via ').'('.$txnID.').';
            } else {
               $transaction_message .= esc_html('Payment via ').'<a href="'.esc_url($order_url).'">('.$txnID.')</a>.';
            }
         }

         $order_paid_date = $order->get_date_paid();
         if( ! empty( $order_paid_date) ) {
           	$transaction_message .= esc_html(' Paid on ').wc_format_datetime( $order_paid_date ).' @ '
           	   .wc_format_datetime( $order_paid_date, get_option( 'time_format' )).'.'; 
         } else { 
            $transaction_message .=  esc_html(' Order created on: ').wc_format_datetime( $order->get_date_created() ).' @ '
               .wc_format_datetime( $order->get_date_created(), get_option( 'time_format' )).'.';
         }
         $order_customer_ip = $order->get_customer_ip_address();
         if( $order_customer_ip ) {
            $transaction_message .= ' Customer IP: <span class="woocommerce-Order-customerIP">'.$order_customer_ip.'</span>';
         } ?>

      </div>
      <style>
      .woocommerce-order-data_meta_txn {
         margin: 0;
         font-family: HelveticaNeue-Light,"Helvetica Neue Light","Helvetica Neue",sans-serif;
         font-weight: 400;
         line-height: 1.6em;
         font-size: 16px;
      }
      </style>
      <script>
      var transMsg = '<?php echo wp_kses_post($transaction_message); ?>';
      jQuery(document).ready(function($){
         $( ".woocommerce-order-data__meta" ).replaceWith( "<div class='woocommerce-order-data_meta_txn'>"+transMsg+"</div>" );
      });
      </script>
   <?php }
}