/**
 * @file
 * Javascript for site_products module.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.site_products = {
    attach: function (context, settings) {
      var self = this;
      $('.view-shop').once('same-columns', function () {
        // TODO: do this with images loaded
        setTimeout(function () {
          self.resizeColumns();
        }, 2500);
      });

      $('.node-type-product-display').once('tabs', function () {
        self.enableTabs();
      })
    },

    enableTabs: function() {
      $('.product-body .nav-tabs a').on('click', function (event) {
        event.preventDefault();
        $(this).tab('show');
      });
      // var $bodys = $('.product-body-wrapper .product-body');
      // var $tabs = $('.product-body-tabs li');
      //
      // $('.product-body-tabs li').on('click', function (event) {
      //   // event.preventDefault();
      //
      //   if (!$(this).hasClass('active')) {
      //     $.each($bodys, function () {
      //       $(this).fadeOut();
      //     });
      //
      //     $.each($tabs, function () {
      //       $(this).removeClass('active');
      //     });
      //
      //     var tab_class = $(this).attr('class');
      //     $('.product-body-tabs .' + tab_class).addClass('active');
      //     $('.product-body-wrapper .' + tab_class).fadeIn();
      //   }
      // });
    },

    resizeColumns: function () {
      var cols = $('.view-shop .views-row').toArray();
      var col_arrays = [];

      while (cols.length > 0) {
        col_arrays.push(cols.splice(0, 3));
      }

      col_arrays.forEach(function (array) {
        var height = 0;
        array.forEach(function (col) {
          height = $(col).outerHeight(true) > height ? $(col).outerHeight(true) : height;
        });
        array.forEach(function (col) {
          $(col).css('height', height);
        });
      });
    }
  };
})(jQuery);
