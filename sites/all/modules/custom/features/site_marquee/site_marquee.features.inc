<?php
/**
 * @file
 * site_marquee.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function site_marquee_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function site_marquee_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_image_default_styles().
 */
function site_marquee_image_default_styles() {
  $styles = array();

  // Exported image style: marquee_large.
  $styles['marquee_large'] = array(
    'label' => 'Marquee Large',
    'effects' => array(
      2 => array(
        'name' => 'image_scale',
        'data' => array(
          'width' => 1000,
          'height' => '',
          'upscale' => 0,
        ),
        'weight' => 2,
      ),
    ),
  );

  return $styles;
}

/**
 * Implements hook_node_info().
 */
function site_marquee_node_info() {
  $items = array(
    'marquee' => array(
      'name' => t('Marquee'),
      'base' => 'node_content',
      'description' => '',
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
