
(function($) {
	'use strict';
  $ = jQuery.noConflict();
  $(window).on('load', function () {
    // Init Color Picker
    $('.color-field').wpColorPicker();
  });
})( jQuery );