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
        self.closeCart();
      });
    },

    openCart: function ($cartContainer) {
      $cartContainer.addClass('cart--open');
      $(document).on('keyup', Drupal.behaviors.dc_ajax_enhancements.escCloseCart);
    },

    closeCart: function () {
      $('.cart-container.cart--open').removeClass('cart--open');
      $(document).off('keyup', Drupal.behaviors.dc_ajax_enhancements.escCloseCart);
    },

    escCloseCart: function (event) {
      if (event.keyCode === 27) {
        Drupal.behaviors.dc_ajax_enhancements.closeCart();
      }
    }
  };
})(jQuery);
