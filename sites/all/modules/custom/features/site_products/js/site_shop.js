/**
 * @file
 * Javascript for site_products module.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.site_shop = {
    attach: function (context, settings) {
      var self = this;

      self.fadeInProducts();

      $('body', context).once('ajax', function () {
        $('.view-product-type-taxonomy a').on('click', function (e) {
          e.preventDefault();

          if (!$(e.target).hasClass('active')) {
            self.clickChange(e);
          }
        });

        window.onpopstate = function (e) {
          self.popChange(e, event.state);
        };
      });

      $('.view-shop').once('same-columns', function () {
        setTimeout(function () {
          self.resizeColumns();
        }, 400);
      });

      $('body').once('ajax-fades', function () {
        $(document).ajaxStart(function (event, request, settings) {
          $('.view-shop .views-row').fadeTo(200, 0);
        });
        $(document).ajaxSuccess(function (event, request, settings) {
          self.fadeInProducts();
        });
      });
    },

    resizeColumns: function () {
      $('.view-shop .views-row').matchHeight();
    },

    fadeInProducts: function () {
      $('.view-shop .views-row').each(function (index) {
        var item = this;
        $(this).css('opacity', 0);
        setTimeout(function () {
          $(item).fadeTo(500, 1);
        }, 200 * index);
      });
    },

    clickChange: function (e) {
      var path = e.target.href;
      var path_array = path.split('/');
      var term = path_array.pop();

      Drupal.behaviors.site_shop.shopAjax(e, term, true);
    },

    popChange: function (e, term_pop) {
      Drupal.behaviors.site_shop.shopAjax(e, term_pop, false);
    },

    shopAjax: function (e, term, pop) {
      var $wrapper = $('.view-shop').parent();
      var url = Drupal.settings.basePath + 'ajax/shop/type/' + term;
      $wrapper.load(url, function () {
        // Update url
        var location = window.location.pathname;
        var location_array = location.split('/');
        var locations = location_array.filter(function (i) {
          return i.length > 0;
        });

        var prev = null;
        if (locations.length > 1) {
          prev = locations.pop();
          locations.push(term);
        }
        else {
          locations.push(term);
        }

        var new_url = '/' + locations.join('/');
        if (pop) {
          history.pushState(prev, term, new_url);
        }

        // Add active class to click target
        $('.view-product-type-taxonomy a').removeClass('active');
        $(e.target).addClass('active');
      });
    }
  };
})(jQuery);
