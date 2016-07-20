/**
 * @file
 * Javascript for site_products module.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.site_products = {
    attach: function (context, settings) {
      var self = this;
      $('.view-shop').once('same-columns', function () {
        // $(window).on('resize orientationchange', $.debounce(500, self.resizeColumns));
        setTimeout(function () {
          self.resizeColumns();
        }, 1000);
      });

      $('.node-type-product-display').once('tabs', function () {
        self.enableTabs();
      })
    },

    enableTabs: function() {
      $('.product-body .nav-tabs a').on('click', function (event) {
        event.preventDefault();
        $(this).tab('show');
      });
    },

    resizeColumns: function () {
      $('.view-shop .views-row').matchHeight();
    }
  };
})(jQuery);
