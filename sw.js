(function() {
  'use strict';
  // Credit: filament -> adactio
  var version = 'v0.9::';
  var staticCacheName = version + 'static';
  var pagesCacheName = version + 'pages';
  var imagesCacheName = version + 'images';

  var offlinePages = [
    '/',
    '/shop/'
  ];

  function updateStaticCache() {
    return caches.open(staticCacheName)
      .then(function (cache) {
        // These items won't block the installation of the Service Worker
        cache.addAll([
          '/sites/all/themes/ntb/fonts/quicksand-regular-webfont.woff2',
          '/sites/all/themes/ntb/fonts/fontawesome-webfont.woff2?v=4.6.3',
          '/sites/all/themes/ntb/fonts/have_heart_one-webfont.woff2',
          '/sites/all/themes/ntb/fonts/quicksand-bold-webfont.woff2',
          '/sites/all/modules/custom/features/site_products/js/site_shop.min.js?v=1.0',
          '/sites/all/modules/custom/features/site_search/js/site_search.min.js?v=1',
          '/sites/all/modules/custom/features/site_products/js/site_products.min.js?v=1.0',
          '/sites/all/modules/contrib/dc_ajax_add_cart/js/dc_ajax_add_cart_html.js'
        ].concat(offlinePages));
        // These items must be cached for the Service Worker to complete installation
        return cache.addAll([
          '/misc/jquery.once.js?v=1.2',
          '/misc/drupal.js',
          '/misc/ajax.js?v=7.53',
          '/misc/progress.js?v=7.53',
          '/sites/all/libraries/bootstrap/js/bootstrap.min.js?v=3.3.6',
          '/sites/all/themes/ntb/js/ntb.behaviors.min.js?v=1.0',
          '/sites/all/modules/contrib/jquery_update/replace/jquery/1.10/jquery.min.js?v=1.10.2',
          '/sites/all/modules/contrib/google_analytics/googleanalytics.js',
          '/sites/all/themes/ntb/logo.png'
        ]);
      });
  }


  function stashInCache(cacheName, request, response) {
    caches.open(cacheName)
      .then(function (cache) {
        cache.put(request, response);
      });
  }

  // Limit the number of items in a specified cache.
  function trimCache(cacheName, maxItems) {
    caches.open(cacheName)
      .then(function (cache) {
        cache.keys()
          .then(function (keys) {
              if (keys.length > maxItems) {
                cache.delete(keys[0])
                  .then(trimCache(cacheName, maxItems));
              }
          });
      });
  }

  // Remove caches whose name is no longer valid
  function clearOldCaches() {
    return caches.keys()
      .then(function (cache) {
        return Promise.all(keys
          .filter(key => key.indexOf(version) !== 0)
          .map(key => caches.delete(key))
        );
      });
  }

  function clearOldCaches() {
    return caches.keys().then(function (cache) {
      return Promise.all(keys.filter(function (key) {
        return key.indexOf(version) !== 0;
      }).map(function (key) {
        return caches.delete(key);
      }));
    });
  }

  self.addEventListener('install', function (event) {
    event.waitUntil(updateStaticCache()
      .then( function() {
        self.skipWaiting()
      });
  });

  self.addEventListener('activate', function (event) {
    event.waitUntil(clearOldCaches()
      .then( function () {
        self.clients.claim()
      });
    );
  });

  self.addEventListener('message', function (event) {
    if (event.data.command == 'trimCaches') {
      trimCache(pagesCacheName, 35);
      trimCache(imagesCacheName, 20);
    }
  });

  self.addEventListener('fetch', function (event) {
    var request = event.request;
    var url = new URL(request.url);

    // Ignore requests to some directories
    if (request.url.indexOf('/admin') !== -1) {
      return;
    }

    // Ignore non-GET requests
    if (request.method !== 'GET') {
      return;
    }

    // For HTML requests, try the network first, fall back to the cache, finally the offline page
    if (request.headers.get('Accept').indexOf('text/html') !== -1) {
      event.respondWith(
        fetch(request)
          .then(function (response) {
            // NETWORK
            // Stash a copy of this page in the pages cache
            var copy = response.clone();
            if (offlinePages.includes(url.pathname) || offlinePages.includes(url.pathname + '/')) {
              stashInCache(staticCacheName, request, copy);
            } else {
              stashInCache(pagesCacheName, request, copy);
            }
            return response;
          })
          .catch( () => {
            // CACHE or FALLBACK
            return caches.match(request)
              .then( response => response || caches.match('/offline') );
          })
      );
      return;
    }

    // For non-HTML requests, look in the cache first, fall back to the network
    event.respondWith(
      caches.match(request)
        .then(function (response) {
          // CACHE
          return response || fetch(request)
            .then(function (response) {
              // NETWORK
              // If the request is for an image, stash a copy of this image in the images cache
              if (request.headers.get('Accept').indexOf('image') !== -1) {
                  var copy = response.clone();
                  stashInCache(imagesCacheName, request, copy);
              }
              return response;
            })
            .catch( function () {
              // OFFLINE
              // If the request is for an image, show an offline placeholder
              if (request.headers.get('Accept').indexOf('image') !== -1) {
                return new Response('<svg role="img" aria-labelledby="offline-title" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg"><title id="offline-title">Offline</title><g fill="none" fill-rule="evenodd"><path fill="#D8D8D8" d="M0 0h400v300H0z"/><text fill="#9B9B9B" font-family="Helvetica Neue,Arial,Helvetica,sans-serif" font-size="72" font-weight="bold"><tspan x="93" y="172">offline</tspan></text></g></svg>', {headers: {'Content-Type': 'image/svg+xml', 'Cache-Control': 'no-store'}});
              }
            });
        })
    );
  });


  // var urlsToCache = [
    // '/',
    // '/sites/all/themes/ntb/logo.png',
    // '/sites/all/themes/ntb/fonts/quicksand-regular-webfont.woff2',
    // '/sites/all/themes/ntb/fonts/fontawesome-webfont.woff2?v=4.6.3',
    // '/sites/all/themes/ntb/fonts/have_heart_one-webfont.woff2',
    // '/sites/all/themes/ntb/fonts/quicksand-bold-webfont.woff2',
    // '/misc/jquery.once.js?v=1.2',
    // '/misc/drupal.js',
    // '/misc/ajax.js?v=7.53',
    // '/misc/progress.js?v=7.53',
    // '/sites/all/modules/custom/features/site_products/js/site_shop.min.js?v=1.0',
    // '/sites/all/modules/custom/features/site_search/js/site_search.min.js?v=1',
    // '/sites/all/libraries/bootstrap/js/bootstrap.min.js?v=3.3.6',
    // '/sites/all/themes/ntb/js/ntb.behaviors.min.js?v=1.0',
    // '/sites/all/modules/custom/features/site_products/js/site_products.min.js?v=1.0',
    // '/sites/all/modules/contrib/dc_ajax_add_cart/js/dc_ajax_add_cart_html.js',
  // ];
  //
  // self.addEventListener('install', function (event) {
  //   event.waitUntil(
  //     caches.open(CACHE_NAME)
  //       .then(function (cache) {
  //         return cache.addAll(urlsToCache);
  //       })
  //   );
  // });
  //
  // self.addEventListener('activate', function (event) {
  //
  //   // Do activate stuff: This will come later on.
  // });
  //
  // self.addEventListener('fetch', function(event) {
  //   event.respondWith(
  //     caches.match(event.request)
  //       .then(function(response) {
  //         // Cache hit - return response
  //         if (response) {
  //           return response;
  //         }
  //
  //         // IMPORTANT: Clone the request. A request is a stream and
  //         // can only be consumed once. Since we are consuming this
  //         // once by cache and once by the browser for fetch, we need
  //         // to clone the response.
  //         var fetchRequest = event.request.clone();
  //
  //         return fetch(fetchRequest).then(
  //           function(response) {
  //             // Check if we received a valid response
  //             if(!response || response.status !== 200 || response.type !== 'basic') {
  //               return response;
  //             }
  //
  //             // IMPORTANT: Clone the response. A response is a stream
  //             // and because we want the browser to consume the response
  //             // as well as the cache consuming the response, we need
  //             // to clone it so we have two streams.
  //             var responseToCache = response.clone();
  //
  //             caches.open(CACHE_NAME)
  //               .then(function(cache) {
  //                 cache.put(event.request, responseToCache);
  //               });
  //
  //             return response;
  //           }
  //         );
  //       })
  //     );
  // });
});
