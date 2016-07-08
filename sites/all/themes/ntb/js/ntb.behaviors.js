/**
 * @file
 * Javascript related to the NTB theme.
 */
(function ($) {
  Drupal.behaviors.ntb = {
    attach: function (context) {
      var self = this;
      self.stickyNav();
      $('.search-toggle', context).on('click', function () {
        self.searchToggle();
      });

      $('.user-icon', context).on('click', function () {
        self.userNavToggle();
      });
    },

    stickyNav: function () {
      var hdr = $('#header').height() + $('#navigation').height();
      var $sticky = $('.navbar-fixed-top');

      $(window).scroll(function () {
        if ($(this).scrollTop() > hdr) {
          $sticky.addClass('visible');
        }
        else {
          $sticky.removeClass('visible');
        }
      });
    },

    searchToggle: function () {
      $('.navbar-search').slideToggle();
    },

    userNavToggle: function () {
      $('#secondary-menu').slideToggle();
    }
  };
})(jQuery);
