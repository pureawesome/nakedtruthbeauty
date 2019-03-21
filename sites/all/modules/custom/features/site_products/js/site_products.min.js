/**
 * @file
 * Javascript for site_products module.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.site_products = {
    attach: function (context, settings) {
      var self = this;

      if (context === document) {
        var $items = $('.product-desc-list .product-desc-item');

        $items.on('click touchstart', function(e) {
          var $target = $(e.target);
          if (!$target.hasClass('.product-desc-item')) {
            $target = $target.parents('.product-desc-item');
          }
          if ($target.hasClass('active')) {
            return;
          }
          else {
            $items.removeClass('active');
            $target.addClass('active');
          }
        })
      }
    },
  };
})(jQuery);
