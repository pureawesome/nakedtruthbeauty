/**
 * @file
 * Javascript for ntb_signup module.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.ntb_signup = {
    attach: function (context, settings) {
      var self = this;
      $('body').once('signup-popup', function () {
        $('.signup-trigger').on('click', function (e) {
          e.preventDefault();
          self.triggerOverlay();
        });
      });
    },

    triggerOverlay: function () {
      $('.ntb-signup').fadeIn();
      $('.ntb-signup input').focus();
      $('.ntb-signup .btn').on('click', Drupal.behaviors.ntb_signup.submit);
      $('.ntb-signup .close').on('click', Drupal.behaviors.ntb_signup.close);
      $('.ntb-signup-overlay').on('click', Drupal.behaviors.ntb_signup.close);
    },

    validateEmail: function (email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    },

    submit: function () {
      var input = $('.ntb-signup input').val();
      var valid = Drupal.behaviors.ntb_signup.validateEmail(input);
      if (!valid) {
        $('.ntb-signup .errors').html(Drupal.t('That is not a valid email address.'));
        return;
      }
      else {
        $.ajax({
          type: 'POST',
          dataType: 'json',
          url: '/signup/ajax/submit/',
          data: {
            email: input
          }
        }).done(function (resp) {
          Drupal.behaviors.ntb_signup.submit_response(resp);
        }).fail(function () {
          $('.ntb-signup .errors').html(Drupal.t("We're sorry. We were unable to process your email"));
        });
      }
    },

    close: function () {
      $('.ntb-signup').fadeOut();
    },

    submit_response: function (response) {
      var msg = response;
      var $text = $('.ntb-signup-form-wrapper');

      $text.fadeOut(function () {
        $(this).html(msg);
      }).fadeIn();
    }
  };
})(jQuery);
