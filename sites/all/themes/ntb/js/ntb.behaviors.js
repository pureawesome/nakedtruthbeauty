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

      if (!Modernizr.touch) {
        $('a.dropdown-toggle').on('click', function (e) {
          var url = $(this).attr('href');
          window.location.href = url;
        });
      }
    }
  };
})(jQuery);
