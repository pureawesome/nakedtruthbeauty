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
        var cookie = self.getCookie();
        Drupal.settings.ntb_signup.cookie_length = 7;

        if (!cookie) {
          setTimeout(function () {
            self.buildForm();
            self.triggerOverlay();
          }, 5000);
        }
      });
    },

    buildForm: function () {
      var form = '';
      form += '<div class="ntb-signup">';
      form += '<div class="ntb-signup-overlay"></div>';
      form += '<div class="ntb-signup-form">';
      form += '<div class="close"><i class="fa fa-times" aria-hidden="true"></i></div>';
      form += '<div class="ntb-signup-form-wrapper">';
      form += '<div class="title">' + Drupal.settings.ntb_signup.premessage + '</div>';
      form += '<div class="errors"></div>';
      form += '<div class="input-group">';
      form += '<input type="email" title="Please, provide an e-mail" placeholder="Email" class="form-control form-text">';
      form += '<span class="input-group-btn"><button class="btn form-submit button">Submit</button></div>';
      form += '</div>';
      form += '</div>';
      form += '</div>';
      form += '</div>';

      $('body').append(form);
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
        })
        .done(function (resp) {
          Drupal.behaviors.ntb_signup.submit_response(resp);
        })
        .fail(function () {
          $('.ntb-signup .errors').html(Drupal.t("We're sorry. We were unable to process your email"));
        });
      }
    },

    close: function () {
      $('.ntb-signup').fadeOut();
      Drupal.behaviors.ntb_signup.setCookie();
    },

    submit_response: function (response) {
      var msg = '';
      if (response === '23000') {
        msg = Drupal.settings.ntb_signup.alreadymessage;
      }
      else if (response === 'success') {
        msg = Drupal.settings.ntb_signup.postmessage;
      }

      var $text = $('.ntb-signup-form-wrapper');

      $text.fadeOut(function () {
        $(this).html(msg);
      }).fadeIn();

      Drupal.settings.ntb_signup.cookie_length = 3650;
    },

    getCookie: function () {
      var regex = new RegExp('(?:(?:^|.*;\\s*)' + Drupal.settings.ntb_signup.cookie + '\\s*\\=\\s*([^;]*).*$)|^.*$');
      return document.cookie.replace(regex, '$1');
    },

    setCookie: function () {
      var name = Drupal.settings.ntb_signup.cookie;
      var value = 1;
      var days = Drupal.settings.ntb_signup.cookie_length;
      var d = new Date();
      d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
      var expires = 'expires=' + d.toUTCString();
      document.cookie = name + '=' + value + '; ' + expires;
    }
  };
})(jQuery);
