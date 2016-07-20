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

      $('.user-icon', context).on('click', function (e) {
        self.userNavToggle(e);
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

          if ($('.secondary-menu', $sticky).hasClass('open')) {
            $('.user-icon', $sticky).trigger('click');
          }
        }
      });
    },

    searchToggle: function () {
      $('.navbar-search').slideToggle();
    },

    userNavToggle: function (e) {
      var menu = $(e.currentTarget).attr('data-menu');
      $('#' + menu).slideToggle();
      $('#' + menu).toggleClass('open');
    }
  };
})(jQuery);
