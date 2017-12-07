/**
 * @file
 * Javascript for site_products module.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.site_products = {
    attach: function (context, settings) {
      var self = this;

      // $('.node-type-product-display').once('tabs', function () {
      //   self.enableTabs();
      // });
    },

    // enableTabs: function () {
    //   $('.product-body .nav-tabs a').on('click', function (event) {
    //     event.preventDefault();
    //     $(this).tab('show');
    //   });
    // }
  };
})(jQuery);
