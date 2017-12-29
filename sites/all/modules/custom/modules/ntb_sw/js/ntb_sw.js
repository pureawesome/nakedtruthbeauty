(function () {
  'use strict';

  if (navigator.serviceWorker) {
    navigator.serviceWorker.register('/sw.js', {
      scope: '/'
    });
    window.addEventListener('load', function () {
      if (navigator.serviceWorker.controller) {
        navigator.serviceWorker.controller.postMessage({command: 'trimCaches'});
      }
    });
  }
})();
