/**
 * @file
 * Javascript related to the NTB theme.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.ntb = {
    attach: function (context, settings) {
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

      $('.lazy-img').each(function () {
        self.loadImg(this);
      });

      if (settings.loadCSS) {
        loadCSS(settings.ntb_css.path);
        document.cookie = 'STYXKEY_ntb_css=' + settings.ntb_css.version + ';expires=Thu, 18 Dec 2020 12:00:00 UTC';
      }

      if (!Modernizr.touch) {
        $('a.dropdown-toggle').on('click', function (e) {
          var url = $(this).attr('href');
          window.location.href = url;
        });
      }
    },

    /**
      * Lazy Load Image
      *
      * @param {object} img
      *   The img to load
      *
      */
    loadImg: function (img) {
      if ($(img).attr('data-src') !== 'undefined') {
        var src = $(img).attr('data-src');
        var preload_image = new Image();
        preload_image.src = src;
        preload_image.onload = function () {
          $(img).removeClass('fa fa-spin fa-spinner fa-2x');
          $(img).attr('src', src);
        };
      }
    }
  };
})(jQuery);
