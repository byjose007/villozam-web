jQuery(document).ready(function($) {
	"use strict";

    $('.vc-notice-dismiss').on('click', function() {
        $(this).closest('.vc_notice').fadeOut(300, function() {
            $(this).remove();
        });
    });


});
