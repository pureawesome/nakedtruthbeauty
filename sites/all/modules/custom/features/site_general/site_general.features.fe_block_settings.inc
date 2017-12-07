<?php
/**
 * @file
 * site_general.features.fe_block_settings.inc
 */

/**
 * Implements hook_default_fe_block_settings().
 */
function site_general_default_fe_block_settings() {
  $export = array();

  $export['version'] = '2.0';

  $export['block-footer_menu'] = array(
    'cache' => -1,
    'custom' => 0,
    'machine_name' => 'footer_menu',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'bartik' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'bartik',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => 'footer',
        'status' => 1,
        'theme' => 'ntb',
        'weight' => -20,
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

  $export['block-line_break'] = array(
    'cache' => -1,
    'custom' => 0,
    'machine_name' => 'line_break',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'bartik' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'bartik',
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

  $export['block-ntb_mission'] = array(
    'cache' => -1,
    'custom' => 0,
    'machine_name' => 'ntb_mission',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'bartik' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'bartik',
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

  $export['block-social_footer'] = array(
    'cache' => -1,
    'custom' => 0,
    'machine_name' => 'social_footer',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'bartik' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'bartik',
        'weight' => 0,
      ),
      'ntb' => array(
        'region' => 'footer',
        'status' => 1,
        'theme' => 'ntb',
        'weight' => -21,
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

  $export['block-twitter'] = array(
    'cache' => -1,
    'custom' => 0,
    'machine_name' => 'twitter',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'bartik' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'bartik',
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
    'title' => 'NkdTruthBeauty',
    'visibility' => 0,
  );

  $export['instagram_block-instagram_block'] = array(
    'cache' => 8,
    'custom' => 0,
    'delta' => 'instagram_block',
    'module' => 'instagram_block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'bartik' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'bartik',
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
    'title' => '@nakedtruthbeauty',
    'visibility' => 0,
  );

  return $export;
}
