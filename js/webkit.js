(function($){
    /* Adjustments for Safari on Mac */
    if (navigator.userAgent.indexOf('Safari') != -1 && navigator.userAgent.indexOf('Mac') != -1 && navigator.userAgent.indexOf('Chrome') == -1) {
        $('body').addClass('safari-mac'); // provide a class for the safari-mac specific css to filter with
    }
})(jQuery);