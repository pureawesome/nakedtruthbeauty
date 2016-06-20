/**
 * @file
 * Javascript related to the NTB theme.
 */
(function ($) {
  Drupal.behaviors.ntb = {
    attach: function (context) {
      this.stickyNav();
    },

    stickyNav: function() {
      var hdr = $('#header').height() + $('#navigation').height();
      var $sticky = $('.navbar-fixed-top');
      console.log(hdr);
      $(window).scroll(function() {
        if( $(this).scrollTop() > hdr ) {
          $sticky.addClass('visible');
        } else {
          $sticky.removeClass('visible');
        }
      });
    }
  };
})(jQuery);
