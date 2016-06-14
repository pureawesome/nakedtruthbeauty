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
      console.log('stick');
    }
  };
})(jQuery);
