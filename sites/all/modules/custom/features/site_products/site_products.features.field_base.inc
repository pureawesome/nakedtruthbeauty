<?php
/**
 * @file
 * site_products.features.field_base.inc
 */

/**
 * Implements hook_field_default_field_bases().
 */
function site_products_field_default_field_bases() {
  $field_bases = array();

  // Exported field_base: 'field_product'.
  $field_bases['field_product'] = array(
    'active' => 1,
    'cardinality' => 1,
    'deleted' => 0,
    'entity_types' => array(),
    'field_name' => 'field_product',
    'indexes' => array(
      'product_id' => array(
        0 => 'product_id',
      ),
    ),
    'locked' => 0,
    'module' => 'commerce_product_reference',
    'settings' => array(
      'options_list_limit' => '',
    ),
    'translatable' => 0,
    'type' => 'commerce_product_reference',
  );

  return $field_bases;
}
