/**
 * @file
 * Javascript for cart module.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.dc_ajax_enhancements = {
    attach: function (context, settings) {
      var self = this;
      self.cartInit();

    },

    cartInit: function () {
      var self = this;
      var $openCtrl = $('.cart-toggle');
      var $closeCtrl = $('#btn-cart-close');
      var $cartContainer = $('.cart-container');

      $openCtrl.on('click', function (e) {
        e.preventDefault();
        self.openCart($cartContainer);
      });
      $closeCtrl.on('click', function () {
        self.closeCart($cartContainer);
      });
      $('document').on('keyup', function (e) {
        if (e.keyCode === 27) {
          self.closeSearch();
        }
      });
    },

    openCart: function ($cartContainer) {
      $cartContainer.addClass('cart--open');
    },

    closeCart: function ($cartContainer) {
      $cartContainer.removeClass('cart--open');
    }
  };
})(jQuery);
