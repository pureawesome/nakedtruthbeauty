var CACHE_NAME = 'ntb-cache-v1';
var urlsToCache = [
  '/',
  '/sites/all/themes/ntb/logo.png',
  '/shop',
  '/about',
  '/ingredients'
  // '/styles/main.css',
  // '/script/main.js'
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

self.addEventListener('fetch', function (event) {
  'use strict';
  event.respondWith(
    caches.match(event.request)
      .then(function (response) {
        // Cache hit - return response
        if (response) {
          return response;
        }
        return fetch(event.request);
      }
    )
  );
});
