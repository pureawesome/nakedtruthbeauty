/**
 * @file
 * Javascript related to the NTB theme.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.ntb = {
    attach: function (context) {
      var self = this;
      self.stickyNav();

      $('.custom-user-menu', context).on('click', function (e) {
        if (!$(e.target).hasClass('fa')) {
          return;
        }

        var $item = $(e.target).parent();

        if (!$item.hasClass('active')) {
          var $this = $(this);
          self.siblingToggle($this);
        }

        if ($item.hasClass('search-toggle')) {
          self.searchToggle($item);
        }

        if ($item.hasClass('user-icon')) {
          self.userNavToggle($item);
        }
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

          Drupal.behaviors.ntb.siblingToggle($('.custom-user-menu'));
        }
      });
    },

    siblingToggle: function (menu) {
      var $actives = $(menu).find('.active');

      if ($actives.length > 0) {
        if ($actives.hasClass('search-toggle')) {
          Drupal.behaviors.ntb.searchToggle($actives);
        }

        if ($actives.hasClass('user-icon')) {
          Drupal.behaviors.ntb.userNavToggle($actives);
        }
      }
    },

    searchToggle: function (icon) {
      $(icon).toggleClass('active').next('.navbar-search').slideToggle();
    },

    userNavToggle: function (icon) {
      $(icon).toggleClass('active');
      var menu = icon.attr('data-menu');
      $('#' + menu).slideToggle().toggleClass('open');
    }
  };
})(jQuery);
