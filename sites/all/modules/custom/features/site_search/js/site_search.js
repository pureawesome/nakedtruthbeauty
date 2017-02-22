/**
 * @file
 * Javascript for site_search module.
 */
(function ($) {
  'use strict';

  Drupal.behaviors.site_search = {
    attach: function (context, settings) {
      var self = this;
      self.searchInit();

      $('.search-form', context).on('submit', function () {
        self.searchSubmit.call(this);
      });
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
        self.closeSearch($searchContainer, $inputSearch);
      });
      $('document').on('keyup', function (e) {
        if (e.keyCode === 27) {
          self.closeSearch();
        }
      });
    },

    openSearch: function ($searchContainer, $inputSearch) {
      $searchContainer.addClass('search--open');
      $inputSearch.focus();
    },

    closeSearch: function ($searchContainer, $inputSearch) {
      $searchContainer.removeClass('search--open');
      $inputSearch.blur();
      $inputSearch.value = '';
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
