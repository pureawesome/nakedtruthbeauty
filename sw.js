(function () {
  'use strict';

  // Credit: filament -> adactio -> ponyfoo
  var version = 'v1.17::';

  self.addEventListener("install", function(event) {
    console.log('WORKER: install event in progress.');
    event.waitUntil(
      /* The caches built-in is a promise-based API that helps you cache responses,
         as well as finding and deleting them.
      */
      caches
        /* You can open a cache by name, and this method returns a promise. We use
           a versioned cache name here so that we can remove old cache entries in
           one fell swoop later, when phasing out an older service worker.
        */
        .open(version + 'fundamentals')
        .then(function(cache) {
          /* After the cache is opened, we can fill it with the offline fundamentals.
             The method below will add all resources we've indicated to the cache,
             after making HTTP requests for each of them.
          */
          return cache.addAll([
            '/'
          ]);
        })
        .then(function() {
          console.log('WORKER: install completed');
        })
    );
  });

  self.addEventListener("fetch", function(event) {
    console.log('WORKER: fetch event in progress.');

    /* We should only cache GET requests, and deal with the rest of method in the
       client-side, by handling failed POST,PUT,PATCH,etc. requests.
    */
    if (event.request.method !== 'GET') {
      /* If we don't block the event as shown below, then the request will go to
         the network as usual.
      */
      console.log('WORKER: fetch event ignored.', event.request.method, event.request.url);
      return;
    }
    /* Similar to event.waitUntil in that it blocks the fetch event on a promise.
       Fulfillment result will be used as the response, and rejection will end in a
       HTTP response indicating failure.
    */
    event.respondWith(
      caches
        /* This method returns a promise that resolves to a cache entry matching
           the request. Once the promise is settled, we can then provide a response
           to the fetch request.
        */
        .match(event.request)
        .then(function(cached) {
          /* Even if the response is in our cache, we go to the network as well.
             This pattern is known for producing "eventually fresh" responses,
             where we return cached responses immediately, and meanwhile pull
             a network response and store that in the cache.
             Read more:
             https://ponyfoo.com/articles/progressive-networking-serviceworker
          */
          var networked = fetch(event.request)
            // We handle the network request with success and failure scenarios.
            .then(fetchedFromNetwork, unableToResolve)
            // We should catch errors on the fetchedFromNetwork handler as well.
            .catch(unableToResolve);

          /* We return the cached response immediately if there is one, and fall
             back to waiting on the network as usual.
          */
          console.log('WORKER: fetch event', cached ? '(cached)' : '(network)', event.request.url);
          return cached || networked;

          function fetchedFromNetwork(response) {
            /* We copy the response before replying to the network request.
               This is the response that will be stored on the ServiceWorker cache.
            */
            var cacheCopy = response.clone();

            console.log('WORKER: fetch response from network.', event.request.url);

            caches
              // We open a cache to store the response for this request.
              .open(version + 'pages')
              .then(function add(cache) {
                /* We store the response for this request. It'll later become
                   available to caches.match(event.request) calls, when looking
                   for cached responses.
                */
                cache.put(event.request, cacheCopy);
              })
              .then(function() {
                console.log('WORKER: fetch response stored in cache.', event.request.url);
              });

            // Return the response so that the promise is settled in fulfillment.
            return response;
          }

          /* When this method is called, it means we were unable to produce a response
             from either the cache or the network. This is our opportunity to produce
             a meaningful response even when all else fails. It's the last chance, so
             you probably want to display a "Service Unavailable" view or a generic
             error response.
          */
          function unableToResolve () {
            /* There's a couple of things we can do here.
               - Test the Accept header and then return one of the `offlineFundamentals`
                 e.g: `return caches.match('/some/cached/image.png')`
               - You should also consider the origin. It's easier to decide what
                 "unavailable" means for requests against your origins than for requests
                 against a third party, such as an ad provider
               - Generate a Response programmaticaly, as shown below, and return that
            */

            console.log('WORKER: fetch request failed in both cache and network.');

            /* Here we're creating a response programmatically. The first parameter is the
               response body, and the second one defines the options for the response.
            */
            return new Response('<h1>Service Unavailable</h1>', {
              status: 503,
              statusText: 'Service Unavailable',
              headers: new Headers({
                'Content-Type': 'text/html'
              })
            });
          }
        })
    );
  });

  self.addEventListener("activate", function(event) {
    /* Just like with the install event, event.waitUntil blocks activate on a promise.
       Activation will fail unless the promise is fulfilled.
    */
    console.log('WORKER: activate event in progress.');

    event.waitUntil(
      caches
        /* This method returns a promise which will resolve to an array of available
           cache keys.
        */
        .keys()
        .then(function (keys) {
          // We return a promise that settles when all outdated caches are deleted.
          return Promise.all(
            keys
              .filter(function (key) {
                // Filter by keys that don't start with the latest version prefix.
                return !key.startsWith(version);
              })
              .map(function (key) {
                /* Return a promise that's fulfilled
                   when each outdated cache is deleted.
                */
                return caches.delete(key);
              })
          );
        })
        .then(function() {
          console.log('WORKER: activate completed.');
        })
    );
  });



  // var staticCacheName = version + 'static';
  // var pagesCacheName = 'pages';
  // var imagesCacheName = 'images';
  //
  // var cacheList = [
  //   staticCacheName,
  //   pagesCacheName,
  //   imagesCacheName
  // ];
  //
  // var offlinePages = [
  //   '/',
  //   '/shop/',
  //   '/ingredients/',
  //   '/about/',
  //   '/shop/beam/',
  //   '/shop/lid/',
  //   '/shop/lip-cheek/',
  //   '/shop/sets/'
  // ];
  //
  // function updateStaticCache() {
  //   return caches.open(staticCacheName).then(function (cache) {
  //     // These items won't block the installation of the Service Worker
  //     cache.addAll([
  //       '/sites/all/themes/ntb/fonts/fontawesome-webfont.woff2?v=4.6.3',
  //       '/sites/all/themes/ntb/fonts/lato-bold-webfont.woff2',
  //       '/sites/all/themes/ntb/fonts/lato-light-webfont.woff2',
  //       '/sites/all/themes/ntb/fonts/lato-regular-webfont.woff2',
  //       '/sites/all/themes/ntb/fonts/Merriweather-Light.ttf',
  //       '/sites/all/themes/ntb/fonts/Merriweather-Regular.ttf',
  //       '/sites/all/themes/ntb/fonts/Merriweather-Bold.ttf',
  //       '/sites/all/modules/custom/features/site_products/js/site_shop.min.js?v=1.1',
  //       '/sites/all/modules/custom/features/site_products/js/site_products.min.js?v=1.1',
  //       '/sites/all/modules/custom/features/site_search/js/site_search.min.js?v=1.1',
  //       '/sites/all/modules/contrib/dc_ajax_add_cart/js/dc_ajax_add_cart_html.js?v=1.0.0',
  //       '/sites/all/modules/custom/modules/dc_ajax_enhancements/js/dc_ajax_enhancements.min.js?v=1.0'
  //     ].concat(offlinePages));
  //     // These items must be cached for the Service Worker to complete installation
  //     return cache.addAll([
  //       '/misc/jquery.once.js?v=1.2',
  //       '/misc/drupal.js?v=7.65',
  //       '/misc/ajax.js?v=7.65',
  //       '/misc/progress.js?v=7.65',
  //       '/sites/all/libraries/modernizr/modernizr.min.js?v=3.6.0',
  //       '/sites/all/modules/contrib/jquery_update/replace/jquery/1.10/jquery.min.js?v=1.10.2',
  //       '/sites/all/modules/contrib/google_analytics/googleanalytics.js',
  //       '/sites/all/themes/ntb/js/ntb.behaviors.min.js?v=1.6',
  //       '/sites/all/themes/ntb/css/ntb.css?v=1.44',
  //       '/offline/'
  //     ]);
  //   });
  // }
  //
  // function stashInCache(cacheName, request, response) {
  //   caches.open(cacheName).then(function (cache) {
  //     return cache.put(request, response);
  //   });
  // }
  //
  // // Limit the number of items in a specified cache.
  // function trimCache(cacheName, maxItems) {
  //   caches.open(cacheName).then(function (cache) {
  //     cache.keys().then(function (keys) {
  //       if (keys.length > maxItems) {
  //         cache.delete(keys[0]).then(trimCache(cacheName, maxItems));
  //       }
  //     });
  //   });
  // }
  //
  // // Remove caches whose name is no longer valid
  // function clearOldCaches() {
  //   return caches.keys().then(function (keys) {
  //     return Promise.all(keys.filter(function (key) {
  //       return !cacheList.includes(key);
  //     }).map(function (key) {
  //       return caches.delete(key);
  //     }));
  //   });
  // }
  //
  // self.addEventListener('install', function (event) {
  //   event.waitUntil(updateStaticCache().then(function () {
  //     return self.skipWaiting();
  //   }));
  // });
  //
  // self.addEventListener('activate', function (event) {
  //   event.waitUntil(clearOldCaches().then(function () {
  //     return self.clients.claim();
  //   }));
  // });
  //
  // self.addEventListener('message', function (event) {
  //   if (event.data.command === 'trimCaches') {
  //     trimCache(pagesCacheName, 35);
  //     trimCache(imagesCacheName, 75);
  //   }
  // });
  //
  // self.addEventListener('fetch', function (event) {
  //
  //   var request = event.request;
  //   var url = new URL(request.url);
  //
  //   // Ignore requests to some directories
  //   if (request.url.includes('/admin')) {
  //     return;
  //   }
  //
  //   // Ignore non-GET requests
  //   if (request.method !== 'GET') {
  //     return;
  //   }
  //
  //   // For HTML requests, try the network first, fall back to the cache, finally the offline page
  //   if (request.headers.get('Accept').includes('text/html')) {
  //     event.respondWith(fetch(request).then(function (response) {
  //       // NETWORK
  //       // Stash a copy of this page in the pages cache
  //       var copy = response.clone();
  //       if (offlinePages.includes(url.pathname) || offlinePages.includes(url.pathname + '/')) {
  //         stashInCache(staticCacheName, request, copy);
  //       }
  //       else {
  //         stashInCache(pagesCacheName, request, copy);
  //       }
  //       return response;
  //     }).catch(function () {
  //       // CACHE or FALLBACK
  //       return caches.match(request).then(function (response) {
  //         return response || caches.match('/offline/');
  //       });
  //     }));
  //     return;
  //   }
  //
  //   // For non-HTML requests, look in the cache first, fall back to the network
  //   event.respondWith(caches.match(request).then(function (response) {
  //     // CACHE
  //     return response || fetch(request).then(function (response) {
  //       var copy;
  //       // NETWORK
  //       // If the request is for an image, stash a copy of this image in the images cache
  //       if (request.headers.get('Accept').includes('image')) {
  //         copy = response.clone();
  //         stashInCache(imagesCacheName, request, copy);
  //       }
  //       else if (request.headers.get('Accept').includes('css') || request.headers.get('Accept').includes('javascript')) {
  //         copy = response.clone();
  //         stashInCache(staticCacheName, request, copy);
  //       }
  //       return response;
  //     }).catch(function () {
  //       // OFFLINE
  //       // If the request is for an image, show an offline placeholder
  //       if (request.headers.get('Accept').includes('image')) {
  //         return new Response('<svg role="img" aria-labelledby="offline-title" viewBox="0 0 400 300" xmlns="http://www.w3.org/2000/svg"><title id="offline-title">Offline</title><g fill="none" fill-rule="evenodd"><path fill="#D8D8D8" d="M0 0h400v300H0z"/><text fill="#9B9B9B" font-family="Helvetica Neue,Arial,Helvetica,sans-serif" font-size="72" font-weight="bold"><tspan x="93" y="172">offline</tspan></text></g></svg>', {headers: {'Content-Type': 'image/svg+xml', 'Cache-Control': 'no-store'}});
  //       }
  //     });
  //   }));
  // });
})();
