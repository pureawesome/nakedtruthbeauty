<?php
/**
 * @file
 * site_products.features.metatag.inc
 */

/**
 * Implements hook_metatag_export_default().
 */
function site_products_metatag_export_default() {
  $config = array();

  // Exported Metatag config instance: node:product_display.
  $config['node:product_display'] = array(
    'instance' => 'node:product_display',
    'config' => array(
      'og:image' => array(
        'value' => '[node:field_primary_image]',
      ),
      'og:image:secure_url' => array(
        'value' => '[node:field_primary_image]',
      ),
    ),
  );

  return $config;
}
