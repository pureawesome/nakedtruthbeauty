<?php

/**
 * @file
 * site_metatag.features.metatag.inc
 */

/**
 * Implements hook_metatag_export_default().
 */
function site_metatag_metatag_export_default() {
  $config = array();

  // Exported Metatag config instance: global.
  $config['global'] = array(
    'instance' => 'global',
    'disabled' => FALSE,
    'config' => array(
      'title' => array(
        'value' => '[current-page:title] | [current-page:pager][site:name]',
      ),
      'description' => array(
        'value' => 'socially responsible cosmetics: good for our bodies, communities, and environment.',
      ),
      'abstract' => array(
        'value' => '',
      ),
      'keywords' => array(
        'value' => 'makeup, make up, lipstick, eye shadow, eyeshadow, all natural, all natural makeup, organic makeup, cruelty free cosmetics, safe cosmetics, mineral makeup, natural makeup, non-toxic makeup, green beauty, cream eyeshadow, cream blush, lip-tint, cruelty free makeup, eye makeup, beauty products, sustainable beauty, safe cosmetics, free shipping',
      ),
      'robots' => array(
        'value' => array(
          'index' => 0,
          'follow' => 0,
          'noindex' => 0,
          'nofollow' => 0,
          'noarchive' => 0,
          'nosnippet' => 0,
          'noodp' => 0,
          'noydir' => 0,
          'noimageindex' => 0,
          'notranslate' => 0,
        ),
      ),
      'news_keywords' => array(
        'value' => '',
      ),
      'standout' => array(
        'value' => '',
      ),
      'rating' => array(
        'value' => '',
      ),
      'referrer' => array(
        'value' => '',
      ),
      'generator' => array(
        'value' => 'Drupal 7 (http://drupal.org)',
      ),
      'rights' => array(
        'value' => '',
      ),
      'image_src' => array(
        'value' => '',
      ),
      'canonical' => array(
        'value' => '[current-page:url:absolute]',
      ),
      'set_cookie' => array(
        'value' => '',
      ),
      'shortlink' => array(
        'value' => '[current-page:url:unaliased]',
      ),
      'original-source' => array(
        'value' => '',
      ),
      'prev' => array(
        'value' => '',
      ),
      'next' => array(
        'value' => '',
      ),
      'content-language' => array(
        'value' => '',
      ),
      'geo.position' => array(
        'value' => '',
      ),
      'geo.placename' => array(
        'value' => '',
      ),
      'geo.region' => array(
        'value' => '',
      ),
      'icbm' => array(
        'value' => '',
      ),
      'refresh' => array(
        'value' => '',
      ),
      'revisit-after' => array(
        'value' => '',
        'period' => '',
      ),
      'pragma' => array(
        'value' => '',
      ),
      'cache-control' => array(
        'value' => '',
      ),
      'expires' => array(
        'value' => '',
      ),
      'shortcut icon' => array(
        'value' => '',
      ),
      'mask-icon' => array(
        'value' => '',
        'color' => '',
      ),
      'icon_16x16' => array(
        'value' => '',
      ),
      'icon_32x32' => array(
        'value' => '',
      ),
      'icon_96x96' => array(
        'value' => 'https://nakedtruthbeauty.com/offline/logo-96.png',
      ),
      'icon_192x192' => array(
        'value' => 'https://nakedtruthbeauty.com/offline/logo-192.png',
      ),
      'apple-touch-icon' => array(
        'value' => 'https://nakedtruthbeauty.com/offline/logo-60.png',
      ),
      'apple-touch-icon_72x72' => array(
        'value' => '',
      ),
      'apple-touch-icon_76x76' => array(
        'value' => 'https://nakedtruthbeauty.com/offline/logo-76.png',
      ),
      'apple-touch-icon_114x114' => array(
        'value' => '',
      ),
      'apple-touch-icon_120x120' => array(
        'value' => 'https://nakedtruthbeauty.com/offline/logo-120.png',
      ),
      'apple-touch-icon_144x144' => array(
        'value' => '',
      ),
      'apple-touch-icon_152x152' => array(
        'value' => 'https://nakedtruthbeauty.com/offline/logo-152.png',
      ),
      'apple-touch-icon_180x180' => array(
        'value' => 'https://nakedtruthbeauty.com/offline/logo-180.png',
      ),
      'apple-touch-icon-precomposed' => array(
        'value' => '',
      ),
      'apple-touch-icon-precomposed_72x72' => array(
        'value' => '',
      ),
      'apple-touch-icon-precomposed_76x76' => array(
        'value' => '',
      ),
      'apple-touch-icon-precomposed_114x114' => array(
        'value' => '',
      ),
      'apple-touch-icon-precomposed_120x120' => array(
        'value' => '',
      ),
      'apple-touch-icon-precomposed_144x144' => array(
        'value' => '',
      ),
      'apple-touch-icon-precomposed_152x152' => array(
        'value' => '',
      ),
      'apple-touch-icon-precomposed_180x180' => array(
        'value' => '',
      ),
      'theme-color' => array(
        'value' => '#91cdc5',
      ),
      'MobileOptimized' => array(
        'value' => '',
      ),
      'HandheldFriendly' => array(
        'value' => '',
      ),
      'viewport' => array(
        'value' => '',
      ),
      'cleartype' => array(
        'value' => '',
      ),
      'amphtml' => array(
        'value' => '',
      ),
      'alternate_handheld' => array(
        'value' => '',
      ),
      'apple-itunes-app' => array(
        'value' => '',
      ),
      'apple-mobile-web-app-capable' => array(
        'value' => '',
      ),
      'apple-mobile-web-app-status-bar-style' => array(
        'value' => '',
      ),
      'apple-mobile-web-app-title' => array(
        'value' => '',
      ),
      'format-detection' => array(
        'value' => '',
      ),
      'ios-app-link-alternative' => array(
        'value' => '',
      ),
      'android-app-link-alternative' => array(
        'value' => '',
      ),
      'android-manifest' => array(
        'value' => '',
      ),
      'x-ua-compatible' => array(
        'value' => 'ie=edge',
      ),
      'application-name' => array(
        'value' => '',
      ),
      'msapplication-allowDomainApiCalls' => array(
        'value' => '',
      ),
      'msapplication-allowDomainMetaTags' => array(
        'value' => '',
      ),
      'msapplication-badge' => array(
        'value' => '',
      ),
      'msapplication-config' => array(
        'value' => '',
      ),
      'msapplication-navbutton-color' => array(
        'value' => '',
      ),
      'msapplication-notification' => array(
        'value' => '',
      ),
      'msapplication-square150x150logo' => array(
        'value' => '',
      ),
      'msapplication-square310x310logo' => array(
        'value' => '',
      ),
      'msapplication-square70x70logo' => array(
        'value' => '',
      ),
      'msapplication-wide310x150logo' => array(
        'value' => '',
      ),
      'msapplication-starturl' => array(
        'value' => '',
      ),
      'msapplication-task' => array(
        'value' => '',
      ),
      'msapplication-task-separator' => array(
        'value' => '',
      ),
      'msapplication-tilecolor' => array(
        'value' => '',
      ),
      'msapplication-tileimage' => array(
        'value' => '',
      ),
      'msapplication-tooltip' => array(
        'value' => '',
      ),
      'msapplication-window' => array(
        'value' => '',
      ),
      'og:site_name' => array(
        'value' => '[site:name]',
      ),
      'og:type' => array(
        'value' => 'article',
      ),
      'og:url' => array(
        'value' => '[current-page:url:absolute]',
      ),
      'og:title' => array(
        'value' => '[current-page:title]',
      ),
      'og:determiner' => array(
        'value' => '',
      ),
      'og:description' => array(
        'value' => '',
      ),
      'og:updated_time' => array(
        'value' => '',
      ),
      'og:see_also' => array(
        'value' => '',
      ),
      'og:image' => array(
        'value' => 'http://nakedtruthbeauty.com/sites/default/files/ntb_facebook.jpg',
      ),
      'og:image:url' => array(
        'value' => '',
      ),
      'og:image:secure_url' => array(
        'value' => 'https://nakedtruthbeauty.com/sites/default/files/ntb_facebook.jpg',
      ),
      'og:image:type' => array(
        'value' => 'image/jpg',
      ),
      'og:image:width' => array(
        'value' => 1085,
      ),
      'og:image:height' => array(
        'value' => 1085,
      ),
      'og:latitude' => array(
        'value' => '',
      ),
      'og:longitude' => array(
        'value' => '',
      ),
      'og:street_address' => array(
        'value' => '',
      ),
      'og:locality' => array(
        'value' => '',
      ),
      'og:region' => array(
        'value' => '',
      ),
      'og:postal_code' => array(
        'value' => '',
      ),
      'og:country_name' => array(
        'value' => '',
      ),
      'og:email' => array(
        'value' => '',
      ),
      'og:phone_number' => array(
        'value' => '',
      ),
      'og:fax_number' => array(
        'value' => '',
      ),
      'og:locale' => array(
        'value' => '',
      ),
      'og:locale:alternate' => array(
        'value' => '',
      ),
      'article:author' => array(
        'value' => '',
      ),
      'article:publisher' => array(
        'value' => '',
      ),
      'article:section' => array(
        'value' => '',
      ),
      'article:tag' => array(
        'value' => '',
      ),
      'article:published_time' => array(
        'value' => '',
      ),
      'article:modified_time' => array(
        'value' => '',
      ),
      'article:expiration_time' => array(
        'value' => '',
      ),
      'profile:first_name' => array(
        'value' => '',
      ),
      'profile:last_name' => array(
        'value' => '',
      ),
      'profile:username' => array(
        'value' => '',
      ),
      'profile:gender' => array(
        'value' => '',
      ),
      'og:audio' => array(
        'value' => '',
      ),
      'og:audio:secure_url' => array(
        'value' => '',
      ),
      'og:audio:type' => array(
        'value' => '',
      ),
      'book:author' => array(
        'value' => '',
      ),
      'book:isbn' => array(
        'value' => '',
      ),
      'book:release_date' => array(
        'value' => '',
      ),
      'book:tag' => array(
        'value' => '',
      ),
      'og:video:url' => array(
        'value' => '',
      ),
      'og:video:secure_url' => array(
        'value' => '',
      ),
      'og:video:width' => array(
        'value' => '',
      ),
      'og:video:height' => array(
        'value' => '',
      ),
      'og:video:type' => array(
        'value' => '',
      ),
      'video:actor' => array(
        'value' => '',
      ),
      'video:actor:role' => array(
        'value' => '',
      ),
      'video:director' => array(
        'value' => '',
      ),
      'video:writer' => array(
        'value' => '',
      ),
      'video:duration' => array(
        'value' => '',
      ),
      'video:release_date' => array(
        'value' => '',
      ),
      'video:tag' => array(
        'value' => '',
      ),
      'video:series' => array(
        'value' => '',
      ),
      'product:price:amount' => array(
        'value' => '',
      ),
      'product:price:currency' => array(
        'value' => '',
      ),
      'product:availability' => array(
        'value' => '',
      ),
      'product:brand' => array(
        'value' => '',
      ),
      'product:upc' => array(
        'value' => '',
      ),
      'product:ean' => array(
        'value' => '',
      ),
      'product:isbn' => array(
        'value' => '',
      ),
      'product:plural_title' => array(
        'value' => '',
      ),
      'product:retailer' => array(
        'value' => '',
      ),
      'product:retailer_title' => array(
        'value' => '',
      ),
      'product:retailer_part_no' => array(
        'value' => '',
      ),
      'product:mfr_part_no' => array(
        'value' => '',
      ),
      'product:size' => array(
        'value' => '',
      ),
      'product:product_link' => array(
        'value' => '',
      ),
      'product:category' => array(
        'value' => '',
      ),
      'product:color' => array(
        'value' => '',
      ),
      'product:material' => array(
        'value' => '',
      ),
      'product:pattern' => array(
        'value' => '',
      ),
      'product:shipping_cost:amount' => array(
        'value' => '',
      ),
      'product:shipping_cost:currency' => array(
        'value' => '',
      ),
      'product:weight:value' => array(
        'value' => '',
      ),
      'product:weight:units' => array(
        'value' => '',
      ),
      'product:shipping_weight:value' => array(
        'value' => '',
      ),
      'product:shipping_weight:units' => array(
        'value' => '',
      ),
      'product:expiration_time' => array(
        'value' => '',
      ),
      'product:condition' => array(
        'value' => '',
      ),
      'msvalidate.01' => array(
        'value' => '',
      ),
      'baidu-site-verification' => array(
        'value' => '',
      ),
      'google-site-verification' => array(
        'value' => '',
      ),
      'norton-safeweb-site-verification' => array(
        'value' => '',
      ),
      'p:domain_verify' => array(
        'value' => '8f6f36dbc459f1b660234927a2a4d366',
      ),
      'yandex-verification' => array(
        'value' => '',
      ),
    ),
  );

  // Exported Metatag config instance: global:403.
  $config['global:403'] = array(
    'instance' => 'global:403',
    'disabled' => FALSE,
    'config' => array(
      'canonical' => array(
        'value' => '[site:url]',
      ),
      'shortlink' => array(
        'value' => '[site:url]',
      ),
      'og:title' => array(
        'value' => '[site:name]',
      ),
      'og:type' => array(
        'value' => 'website',
      ),
      'og:url' => array(
        'value' => '[site:url]',
      ),
    ),
  );

  // Exported Metatag config instance: global:404.
  $config['global:404'] = array(
    'instance' => 'global:404',
    'disabled' => FALSE,
    'config' => array(
      'canonical' => array(
        'value' => '[site:url]',
      ),
      'shortlink' => array(
        'value' => '[site:url]',
      ),
      'og:title' => array(
        'value' => '[site:name]',
      ),
      'og:type' => array(
        'value' => 'website',
      ),
      'og:url' => array(
        'value' => '[site:url]',
      ),
    ),
  );

  // Exported Metatag config instance: global:frontpage.
  $config['global:frontpage'] = array(
    'instance' => 'global:frontpage',
    'disabled' => FALSE,
    'config' => array(
      'title' => array(
        'value' => '[site:name] | [current-page:pager]',
      ),
      'canonical' => array(
        'value' => '[site:url]',
      ),
      'shortlink' => array(
        'value' => '',
      ),
      'og:type' => array(
        'value' => 'website',
      ),
      'og:url' => array(
        'value' => '[site:url]',
      ),
      'og:title' => array(
        'value' => '[site:name]',
      ),
      'og:description' => array(
        'value' => '[site:slogan]',
      ),
    ),
  );

  // Exported Metatag config instance: node.
  $config['node'] = array(
    'instance' => 'node',
    'disabled' => FALSE,
    'config' => array(
      'title' => array(
        'value' => '[node:title] | [current-page:pager][site:name]',
      ),
      'description' => array(
        'value' => '[node:summary]',
      ),
      'article:modified_time' => array(
        'value' => '[node:changed:custom:c]',
      ),
      'article:published_time' => array(
        'value' => '[node:created:custom:c]',
      ),
      'og:description' => array(
        'value' => '[node:summary]',
      ),
      'og:title' => array(
        'value' => '[node:title]',
      ),
      'og:updated_time' => array(
        'value' => '[node:changed:custom:c]',
      ),
    ),
  );

  // Exported Metatag config instance: node:product_display.
  $config['node:product_display'] = array(
    'instance' => 'node:product_display',
    'disabled' => FALSE,
    'config' => array(
      'og:type' => array(
        'value' => 'product',
      ),
      'og:image' => array(
        'value' => '[node:field_primary_image]',
      ),
      'og:image:secure_url' => array(
        'value' => '[node:field_primary_image]',
      ),
      'product:price:amount' => array(
        'value' => '[node:field-product:commerce-price:amount_decimal]',
      ),
      'product:price:currency' => array(
        'value' => 'USD',
      ),
      'product:availability' => array(
        'value' => 'instock',
      ),
    ),
  );

  // Exported Metatag config instance: taxonomy_term.
  $config['taxonomy_term'] = array(
    'instance' => 'taxonomy_term',
    'disabled' => FALSE,
    'config' => array(
      'title' => array(
        'value' => '[term:name] | [current-page:pager][site:name]',
      ),
      'description' => array(
        'value' => '[term:description]',
      ),
      'og:description' => array(
        'value' => '[term:description]',
      ),
      'og:title' => array(
        'value' => '[term:name]',
      ),
    ),
  );

  // Exported Metatag config instance: user.
  $config['user'] = array(
    'instance' => 'user',
    'disabled' => FALSE,
    'config' => array(
      'title' => array(
        'value' => '[user:name] | [site:name]',
      ),
      'image_src' => array(
        'value' => '[user:picture:url]',
      ),
      'og:title' => array(
        'value' => '[user:name]',
      ),
      'og:type' => array(
        'value' => 'profile',
      ),
      'profile:username' => array(
        'value' => '[user:name]',
      ),
      'og:image' => array(
        'value' => '[user:picture:url]',
      ),
    ),
  );

  return $config;
}
