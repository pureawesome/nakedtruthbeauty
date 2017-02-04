var CACHE_NAME = 'ntb-cache-v1';
var urlsToCache = [
  '/',
  '/sites/all/themes/ntb/logo.png',
  '/sites/all/themes/ntb/fonts/quicksand-regular-webfont.woff2',
  '/sites/all/themes/ntb/fonts/fontawesome-webfont.woff2?v=4.6.3',
  '/sites/all/themes/ntb/fonts/have_heart_one-webfont.woff2',
  '/sites/all/themes/ntb/fonts/quicksand-bold-webfont.woff2',
  '/misc/jquery.once.js?v=1.2',
  '/misc/drupal.js',
  '/misc/ajax.js?v=7.53',
  '/misc/progress.js?v=7.53',
  '/sites/all/modules/custom/features/site_products/js/site_shop.min.js?v=1.0',
  '/sites/all/modules/custom/features/site_search/js/site_search.min.js?v=1',
  '/sites/all/libraries/bootstrap/js/bootstrap.min.js?v=3.3.6',
  '/sites/all/themes/ntb/js/ntb.behaviors.min.js?v=1.0',
  '/sites/all/modules/contrib/jquery_update/replace/jquery/1.10/jquery.min.js?v=1.10.2',
  '/sites/all/modules/contrib/google_analytics/googleanalytics.js',
  '/sites/all/modules/custom/features/site_products/js/site_products.min.js?v=1.0',
  '/sites/all/modules/contrib/dc_ajax_add_cart/js/dc_ajax_add_cart_html.js',
];

self.addEventListener('install', function (event) {
  'use strict';
  console.log('install');
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(function (cache) {
        console.log('Opened cache');
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('activate', function (event) {
  'use strict';
  // Do activate stuff: This will come later on.
});

self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Cache hit - return response
        if (response) {
          return response;
        }

        // IMPORTANT: Clone the request. A request is a stream and
        // can only be consumed once. Since we are consuming this
        // once by cache and once by the browser for fetch, we need
        // to clone the response.
        var fetchRequest = event.request.clone();

        return fetch(fetchRequest).then(
          function(response) {
            // Check if we received a valid response
            if(!response || response.status !== 200 || response.type !== 'basic') {
              return response;
            }

            // IMPORTANT: Clone the response. A response is a stream
            // and because we want the browser to consume the response
            // as well as the cache consuming the response, we need
            // to clone it so we have two streams.
            var responseToCache = response.clone();

            caches.open(CACHE_NAME)
              .then(function(cache) {
                cache.put(event.request, responseToCache);
              });

            return response;
          }
        );
      })
    );
});
