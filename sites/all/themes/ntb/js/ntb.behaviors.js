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
        if (!Modernizr.touchevents) {
          $('ul.nav li.dropdown').on('mouseover', function () {
            $(this).addClass('open');
            $(this).children('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
          });
          $('ul.nav li.dropdown').on('mouseout', function () {
            $(this).removeClass('open');
            $(this).children('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
          });
        }
        else {
          $('ul.nav li.dropdown > a').on('touchstart click', function (e) {
            e.preventDefault();
            if ($(this).hasClass('open')) {
              $(this).removeClass('open');
              $(this).siblings('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
            }
            else {
              $(this).addClass('open');
              $(this).siblings('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
            }
          });
        }

        $(window).on('resize load', $.throttle(100, self.calcWidth));
      });

      self.enableLazyImages(context);
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
      var morewidth = $('.primary-nav > .more').outerWidth(true);

      $('.primary-nav > li:not(.more)').each(function () {
        navwidth += $(this).outerWidth(true);
      });
      var availablespace = $('.nav-primary-wrapper').outerWidth(true) - morewidth - 15;
      if (navwidth > availablespace) {
        var lastItem = $('.primary-nav > li:not(.more)').last();
        lastItem.attr('data-width', lastItem.outerWidth(true));
        lastItem.prependTo($('.primary-nav > .more > ul'));
        Drupal.behaviors.ntb.calcWidth();
      }
      else {
        var firstMoreElement = $('.primary-nav > li.more li').first();
        if (firstMoreElement.length > 0) {
          var firstWidth = firstMoreElement.data('width') || firstMoreElement.outerWidth(true);
          if ((navwidth + firstWidth) < availablespace) {
            firstMoreElement.insertBefore($('.primary-nav > .more'));
            Drupal.behaviors.ntb.calcWidth();
          }
        }

        var $moreText = $('.primary-nav > .more > a');
        if ($('.primary-nav > li').length === 1) {
          $moreText.text('menu');
        }
        else {
          $moreText.text('more');
        }
      }

      if ($('.primary-nav > .more li').length > 0) {
        $('.primary-nav > .more').css('display', 'inline-block');
      }
      else {
        $('.primary-nav > .more').css('display', 'none');
      }

      if ($('.primary-nav > li').length === 1) {
        $('.primary-nav > .more > a').text = 'menu';
      }
      else {
        $('.primary-nav > li').last().find('a').html = 'more';
      }
    },

    enableLazyImages: function (context) {
      if (context !== document) {
        lazyLoad();
      }
      var lazy = [];
      var images = [];
      var src = [];
      var queue = [];

      function setLazy() {
        lazy = document.getElementsByClassName('lazy-img');
      }

      function lazyLoad() {
        setLazy();
        for (var i = 0; i < lazy.length; i++) {
          if ((lazy[i].getAttribute('data-rand') && queue.indexOf(lazy[i].getAttribute('data-rand')) == -1) && isInViewport(lazy[i])) {
            if (lazy[i].getAttribute('data-src')) {
              if (src.indexOf(lazy[i].getAttribute('data-src')) != -1) {
                lazy[i].src = lazy[i].getAttribute('data-src')
                lazy[i].removeAttribute('data-src');
                lazy[i].classList.remove('lazy-img');
              }
              images[i] = {};
              images[i]['image'] = lazy[i];
              images[i]['src'] = lazy[i].getAttribute('data-src');
              images[i]['preload_image'] = new Image();
              images[i]['preload_image'].src = images[i]['src'];
              images[i]['preload_image'].data = i;
              images[i]['preload_image'].onload = function () {
                images[this.data]['image'].src = images[this.data]['src'];
                images[this.data]['image'].removeAttribute('data-src');
                images[this.data]['image'].classList.remove('lazy-img');
                src.push(images[this.data]['src']);
              };
              queue.push(lazy[i].getAttribute('data-rand'));
            }
          }
        }

        cleanLazy();
      }

      function cleanLazy() {
        lazy = Array.prototype.filter.call(lazy, function (l) {
          return l.getAttribute('data-src');
        });
      }

      function isInViewport(el) {
        var rect = el.getBoundingClientRect();

        return (
          rect.bottom >= 0 &&
          rect.right >= 0 &&
          rect.top <= (window.innerHeight || document.documentElement.clientHeight) &&
          rect.left <= (window.innerWidth || document.documentElement.clientWidth)
        );
      }

      $(window).on('load', lazyLoad);
      $(window).on('resize load scroll', $.throttle(100, lazyLoad));
    }
  };
})(jQuery);
