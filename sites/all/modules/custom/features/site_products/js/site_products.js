/**
 * @file
 * Javascript for site_products module.
 */
(function ($) {
  Drupal.behaviors.site_products = {
    attach: function (context, settings) {
      var self = this;
      $('.view-shop').once('same-columns', function () {
        self.resizeColumns();
      });
    },

    resizeColumns: function() {
      console.log('resize column');
    }
  };
})(jQuery);
