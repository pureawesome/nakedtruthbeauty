/**
 * @file
 * Javascript for site_products module.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.site_shop = {
    attach: function (context, settings) {
      var self = this;

      if (context === document) {
        self.fadeInProducts();

        $('.view-product-type-taxonomy a').on('click', function (e) {
          e.preventDefault();

          if (!$(e.target).hasClass('active')) {
            self.clickChange(e);
          }
        });

        self.activeMenu();

        window.onpopstate = function (e) {
          self.popChange(e, event.state);
          self.activeMenu();
        };

        $(document).ajaxSuccess(function (event, request, settings) {
          if (request.responseText.indexOf('view-shop') !== -1) {
            Drupal.attachBehaviors(request.responseText);
            self.fadeInProducts();
          }
        });
      }
    },

    activeMenu: function () {
      var url_array = window.location.pathname.split('/').filter(function (i) {
        return i.length > 0;
      });
      var location = url_array.pop();
      $('.view-product-type-taxonomy a').each(function () {
        if ($(this).attr('data') === location) {
          $('.view-product-type-taxonomy a').removeClass('active');
          $(this).addClass('active');
        }
      });
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
          history.pushState(term, term, new_url);
          // Add active class to click target
          $('.view-product-type-taxonomy a').removeClass('active');
          $(e.target).addClass('active');
        }
      });
    }
  };
})(jQuery);
