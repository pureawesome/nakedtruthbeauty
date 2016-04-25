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
    'label' => 'Marquee Large (1440 x 500)',
    'effects' => array(
      1 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 1440,
          'height' => 500,
        ),
        'weight' => 1,
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
