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

      if (!Modernizr.touch) {
        $('a.dropdown-toggle').on('click', function (e) {
          var url = $(this).attr('href');
          window.location.href = url;
        });
      }

      $(window).on('resize load', function () {
        self.calcWidth();
      });
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
    },

    calcWidth: function () {
      var navwidth = 0;
      var morewidth = $('#main .more').outerWidth(true);
      $('#main > li:not(.more)').each(function () {
        navwidth += $(this).outerWidth(true);
      });
      var availablespace = $('nav').outerWidth(true) - morewidth;

      if (navwidth > availablespace) {
        var lastItem = $('#main > li:not(.more)').last();
        lastItem.attr('data-width', lastItem.outerWidth(true));
        lastItem.prependTo($('#main .more ul'));
        Drupal.behaviors.ntb.calcWidth();
      }
      else {
        var firstMoreElement = $('#main li.more li').first();
        if (navwidth + firstMoreElement.data('width') < availablespace) {
          firstMoreElement.insertBefore($('#main .more'));
        }
      }

      if ($('.more li').length > 0) {
        $('.more').css('display', 'inline-block');
      }
      else {
        $('.more').css('display', 'none');
      }
    }
  };
})(jQuery);
