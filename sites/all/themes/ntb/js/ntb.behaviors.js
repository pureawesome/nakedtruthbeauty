/**
 * @file
 * Javascript related to the NTB theme.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.ntb = {
    attach: function (context) {
      var self = this;

      $('body').once('nav-script', function () {
        if (!$('html').hasClass('touch')) {
          $('ul.nav li.dropdown').on('mouseover', function () {
            $(this).addClass('open');
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
          });
          $('ul.nav li.dropdown').on('mouseout', function () {
            $(this).removeClass('open');
            $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
          });
        }

      });

      $('.navbar-toggle').on('click', function (e) {
        if ($(this).hasClass('collapsed')) {
          Drupal.behaviors.ntb.siblingToggle($('.custom-user-menu'));
        }
      });

      $('.custom-user-menu', context).on('click', function (e) {
        if (!$(e.target).hasClass('fa')) {
          return;
        }

        var $item = $(e.target).parent();

        if (!$item.hasClass('active')) {
          var $this = $(this);
          self.siblingToggle($this);
        }

        if ($item.hasClass('user-icon')) {
          self.userNavToggle($item);
        }
      });
    },

    siblingToggle: function (menu) {
      var $actives = $(menu).find('.active');

      if ($actives.length > 0) {
        if ($actives.hasClass('user-icon')) {
          Drupal.behaviors.ntb.userNavToggle($actives);
        }
      }
      else {
        if (!$('.navbar-toggle').hasClass('collapsed')) {
          $('.navbar-toggle').trigger('click');
        }
      }
    },

    userNavToggle: function (icon) {
      $(icon).toggleClass('active');
      var menu = icon.attr('data-menu');
      $('#' + menu).slideToggle().toggleClass('open');
    }
  };
})(jQuery);
