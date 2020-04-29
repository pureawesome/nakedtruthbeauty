<?php

/**
 * @file
 * fali.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function fali_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "strongarm" && $api == "strongarm") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function fali_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_image_default_styles().
 */
function fali_image_default_styles() {
  $styles = array();

  // Exported image style: image_1024x640.
  $styles['image_1024x640'] = array(
    'label' => 'Image 1024x640',
    'effects' => array(
      2 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 1024,
          'height' => 640,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: image_1024x710.
  $styles['image_1024x710'] = array(
    'label' => 'Image 1024x710',
    'effects' => array(
      3 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 1024,
          'height' => 710,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: image_1024x768.
  $styles['image_1024x768'] = array(
    'label' => 'Image 1024x768',
    'effects' => array(
      4 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 1024,
          'height' => 768,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: image_1080x635.
  $styles['image_1080x635'] = array(
    'label' => 'Image 1080x635',
    'effects' => array(
      5 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 1080,
          'height' => 635,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: image_120x120.
  $styles['image_120x120'] = array(
    'label' => 'Image 120x120',
    'effects' => array(
      6 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 120,
          'height' => 120,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: image_1280x720.
  $styles['image_1280x720'] = array(
    'label' => 'Image 1280x720',
    'effects' => array(
      7 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 1280,
          'height' => 720,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: image_150x150.
  $styles['image_150x150'] = array(
    'label' => 'Image 150x150',
    'effects' => array(
      8 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 150,
          'height' => 150,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: image_348x278.
  $styles['image_348x278'] = array(
    'label' => 'Image 348x278',
    'effects' => array(
      9 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 348,
          'height' => 278,
        ),
        'weight' => 1,
      ),
    ),
  );

  // Exported image style: image_540x317.
  $styles['image_540x317'] = array(
    'label' => 'Image 540x317',
    'effects' => array(
      10 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 540,
          'height' => 317,
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
function fali_node_info() {
  $items = array(
    'header_socials' => array(
      'name' => t('Header Socials'),
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
