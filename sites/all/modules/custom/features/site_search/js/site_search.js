/**
 * @file
 * Javascript for site_search module.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.site_search = {
    attach: function (context, settings) {
      var self = this;

      if (context === document) {
        self.searchInit();

        $('.search-form', context).on('submit', function () {
          self.searchSubmit.call(this);
        });
      }
    },

    searchInit: function () {
      var self = this;
      var $openCtrl = $('.search-toggle');
      var $closeCtrl = $('#btn-search-close');
      var $searchContainer = $('.search-container');
      var $inputSearch = $searchContainer.find('.search__input');

      $openCtrl.on('click', function () {
        self.openSearch($searchContainer, $inputSearch);
      });
      $closeCtrl.on('click', function () {
        self.closeSearch();
      });
    },

    openSearch: function ($searchContainer, $inputSearch) {
      $searchContainer.addClass('search--open');
      $inputSearch.focus();
      $(document).on('keyup', Drupal.behaviors.site_search.escCloseSearch);
    },

    closeSearch: function () {
      var $searchContainerOpen = $('.search-container.search--open');
      var $input = $searchContainerOpen.find('.search_enhancements_form .form-autocomplete');
      $input.blur();
      $input.val('');
      $searchContainerOpen.removeClass('search--open');
      $(document).off('keyup', Drupal.behaviors.site_search.escCloseSearch);
    },

    escCloseSearch: function (event) {
      if (event.keyCode === 27) {
        Drupal.behaviors.site_search.closeSearch();
      }
    },

    searchSubmit: function () {
      event.preventDefault();
      var key = $('input', this).val();
      key = encodeURIComponent(key);
      var url = '/search/';
      url += key.replace(/\//, ' ');
      window.location.replace(url);
    }
  };
})(jQuery);
