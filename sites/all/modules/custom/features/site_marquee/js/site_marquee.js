/**
 * @file
 * Javascript for site_marquee module.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.site_marquee = {
    attach: function (context, settings) {
      var self = this;

      $('.view-marquee .flexslider').once('tabs', function () {
        self.loadImg(this);
      });
    },

    loadImg: function (slider) {
      var $slides = $(slider).find('.slides').children();
      $slides.each(function () {
        var $image = $('.slider-image', this);
        var img_url = $image.attr('data-img');
        var preload_image = new Image();
        preload_image.src = img_url;
        preload_image.onload = function () {
          var css_string = 'url(' + img_url + ')';
          $image.css('background-image', css_string);
          $image.removeClass('fa fa-spin fa-spinner fa-2x');
        };
      });
    }
  };
})(jQuery);
