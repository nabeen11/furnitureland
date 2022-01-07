jQuery( function( $ ) {
	'use strict';

	/**
	 * Object to handle eSewa admin functions.
	 */
	var esewa_wc_admin = {
		isTestMode: function() {
			return $( '#woocommerce_esewa_testmode' ).is( ':checked' );
		},

		/**
		 * Initialize.
		 */
		init: function() {
			$( document.body ).on( 'change', '#woocommerce_esewa_testmode', function() {
				var test_service_code = $( '#woocommerce_esewa_sandbox_service_code' ).parents( 'tr' ).eq( 0 ),
					test_sandbox_url = $( '#woocommerce_esewa_sandbox_url' ).parents( 'tr' ).eq( 0 ),
					live_service_code = $( '#woocommerce_esewa_service_code' ).parents( 'tr' ).eq( 0 );

				if ( $( this ).is( ':checked' ) ) {
					test_service_code.show();
					test_sandbox_url.show();
					live_service_code.hide();
				} else {
					test_service_code.hide();
					test_sandbox_url.hide();
					live_service_code.show();
				}
			} );

			$( '#woocommerce_esewa_testmode' ).change();
		}
	};

	esewa_wc_admin.init();
});
