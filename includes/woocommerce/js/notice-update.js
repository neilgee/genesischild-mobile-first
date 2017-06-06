jQuery(document).on( 'click', '.gc-woocommerce-notice .notice-dismiss', function() {

	jQuery.ajax({
	    url: ajaxurl,
	    data: {
	        action: 'gc_dismiss_woocommerce_notice'
	    }
	});

});
