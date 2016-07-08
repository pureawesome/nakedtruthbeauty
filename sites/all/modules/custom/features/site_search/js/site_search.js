/**
 * @file
 * Javascript for site_products module.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.site_products = {
    attach: function (context, settings) {
      var self = this;
      $('.search-form', context).on('submit', function () {
        self.searchSubmit.call(this);
      });
    },

    searchSubmit: function () {
      event.preventDefault();
      var key = $('input', this).val();
      key = encodeURIComponent(key);
      var url = '/search/';
      url += key.replace(/\//, ' ');
      window.location.replace(url);
    }
  };
})(jQuery);
