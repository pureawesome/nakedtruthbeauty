<?php

/**
 * @file
 * site_footer.features.fe_block_settings.inc
 */

/**
 * Implements hook_default_fe_block_settings().
 */
function site_footer_default_fe_block_settings() {
  $export = array();

  $export['version'] = '2.0';

  $export['block-footer_menu_copyright'] = array(
    'cache' => -1,
    'custom' => 0,
    'machine_name' => 'footer_menu_copyright',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => 'footer',
        'status' => 1,
        'theme' => 'ntb',
        'weight' => -32,
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

  $export['block-mailchimp'] = array(
    'cache' => -1,
    'custom' => 0,
    'machine_name' => 'mailchimp',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => 'footer',
        'status' => 1,
        'theme' => 'ntb',
        'weight' => -35,
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
