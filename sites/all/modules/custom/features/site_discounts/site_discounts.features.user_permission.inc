<?php
/**
 * @file
 * site_discounts.features.user_permission.inc
 */

/**
 * Implements hook_user_default_permissions().
 */
function site_discounts_user_default_permissions() {
  $permissions = array();

  // Exported permission: 'redeem coupons of type discount_coupon'.
  $permissions['redeem coupons of type discount_coupon'] = array(
    'name' => 'redeem coupons of type discount_coupon',
    'roles' => array(
      'administrator' => 'administrator',
      'anonymous user' => 'anonymous user',
      'authenticated user' => 'authenticated user',
    ),
    'module' => 'commerce_coupon',
  );

  return $permissions;
}
