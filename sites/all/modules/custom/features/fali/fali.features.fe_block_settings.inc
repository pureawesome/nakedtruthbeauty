<?php

/**
 * @file
 * fali.features.fe_block_settings.inc
 */

/**
 * Implements hook_default_fe_block_settings().
 */
function fali_default_fe_block_settings() {
  $export = array();

  $export['version'] = '2.0';

  $export['block-fali_footer_about'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'machine_name' => 'fali_footer_about',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => 'footer',
        'status' => 1,
        'theme' => 'fali',
        'weight' => -48,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => 'About Blog',
    'visibility' => 0,
  );

  $export['block-fali_footer_fb'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'machine_name' => 'fali_footer_fb',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => 'footer',
        'status' => 1,
        'theme' => 'fali',
        'weight' => -46,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => 'Facebook Fans',
    'visibility' => 0,
  );

  $export['block-fali_right_sidebar_about'] = array(
    'cache' => -1,
    'css_class' => 'widget_jeg_about_me',
    'custom' => 0,
    'machine_name' => 'fali_right_sidebar_about',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => 'sidebar_second',
        'status' => 1,
        'theme' => 'fali',
        'weight' => -47,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => 'About Blog',
    'visibility' => 0,
  );

  $export['block-fali_right_sidebar_advert'] = array(
    'cache' => -1,
    'css_class' => 'widget_jeg_ads_widget',
    'custom' => 0,
    'machine_name' => 'fali_right_sidebar_advert',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => 'sidebar_second',
        'status' => 1,
        'theme' => 'fali',
        'weight' => -46,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => 'Advertising',
    'visibility' => 0,
  );

  $export['multiblock-1'] = array(
    'cache' => -1,
    'css_class' => 'block-search',
    'custom' => 0,
    'delta' => 1,
    'module' => 'multiblock',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => 'sidebar_second',
        'status' => 1,
        'theme' => 'fali',
        'weight' => -48,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['multiblock-2'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'delta' => 2,
    'module' => 'multiblock',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => 'header_search',
        'status' => 1,
        'theme' => 'fali',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['multiblock-3'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'delta' => 3,
    'module' => 'multiblock',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'fali',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['multiblock-4'] = array(
    'cache' => 8,
    'css_class' => '',
    'custom' => 0,
    'delta' => 4,
    'module' => 'multiblock',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => 'footer',
        'status' => 1,
        'theme' => 'fali',
        'weight' => -47,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-020ede4b08f7fb0eedfd2699317c55e3'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'delta' => '020ede4b08f7fb0eedfd2699317c55e3',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'fali',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-181247bfb27012ab19e9febaa4345125'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'delta' => '181247bfb27012ab19e9febaa4345125',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => 'header_socials',
        'status' => 1,
        'theme' => 'fali',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '<none>',
    'visibility' => 0,
  );

  $export['views-29dc1bbc87d59aa24b1f7382354365fb'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'delta' => '29dc1bbc87d59aa24b1f7382354365fb',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'fali',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-4f2fc212fe2d9ba53a77748f0c48a6c5'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'delta' => '4f2fc212fe2d9ba53a77748f0c48a6c5',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'fali',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-5ea779eab5e7f7d0e47684b280a920d5'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'delta' => '5ea779eab5e7f7d0e47684b280a920d5',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'fali',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-79c34eedf6a121bedb96e880bf2cae69'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'delta' => '79c34eedf6a121bedb96e880bf2cae69',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'fali',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-a26a79a73e00c875550f5e349c72e67a'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'delta' => 'a26a79a73e00c875550f5e349c72e67a',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'fali',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-c3e3c5d487cf2265dd1f9116da311eaa'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'delta' => 'c3e3c5d487cf2265dd1f9116da311eaa',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'fali',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-e66309f03a2f139ef8a8410680d7099e'] = array(
    'cache' => -1,
    'css_class' => 'widget_jeg_last_post',
    'custom' => 0,
    'delta' => 'e66309f03a2f139ef8a8410680d7099e',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => 'sidebar_second',
        'status' => 1,
        'theme' => 'fali',
        'weight' => -44,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => 'Latest Post',
    'visibility' => 0,
  );

  $export['views-e8b0d66378371d401e84cd307c87eabc'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'delta' => 'e8b0d66378371d401e84cd307c87eabc',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'fali',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-f9c9c64fe8f59add86ef31e75d30ab42'] = array(
    'cache' => -1,
    'css_class' => '',
    'custom' => 0,
    'delta' => 'f9c9c64fe8f59add86ef31e75d30ab42',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'fali' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'fali',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  return $export;
}
