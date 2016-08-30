/**
 * @file
 * Javascript for site_products module.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.site_shop = {
    attach: function (context, settings) {
      var self = this;

      self.fadeInProducts();

      $('.view-shop').once('same-columns', function () {
        setTimeout(function () {
          self.resizeColumns();
        }, 400);
      });

      $('body').once('ajax-fades', function () {
        $(document).ajaxStart(function (event, request, settings) {
          $('.view-shop .views-row').fadeTo(200, 0);
        });
        $(document).ajaxSuccess(function (event, request, settings) {
          self.fadeInProducts();
        });
      });
    },

    resizeColumns: function () {
      $('.view-shop .views-row').matchHeight();
    },

    fadeInProducts: function () {
      $('.view-shop .views-row').each(function (index) {
        var item = this;
        $(this).css('opacity', 0);
        setTimeout(function () {
          $(item).fadeTo(500, 1);
        }, 200 * index);
      });
    }
  };
})(jQuery);
