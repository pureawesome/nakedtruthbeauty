<?php

/**
 * @file
 * Default rules for Commerce Coupon Auto Generate.
 */

/**
 * Implement hook_rules_action_info().
 */
function commerce_coupon_auto_generate_rules_action_info() {
  return array(
    'commerce_coupon_auto_generate_rules_action_create_user_coupon' => array(
      'label' => t('Generate Individual User Coupon'),
      'group' => t('Commerce Coupon Custom'),
      'parameter' => array(
        'account' => array(
          'type' => 'user',
          'label' => t('registered user'),
        ),
        'type' => array(
          'type' => 'text',
          'label' => t('Coupon Type'),
          'description' => t('The type of discount.'),
          'options list' => 'commerce_coupon_auto_generate_coupon_types',
          'restriction' => 'input',
        ),
      ),
      'callbacks' => array(
        'execute' => 'commerce_coupon_auto_generate_rules_action_create_user_coupon_create',
      ),
    ),
  );
}

/**
 * Gets a list of coupon types available.
 */
function commerce_coupon_auto_generate_coupon_types() {
  $types = commerce_discount_entity_list();
  return $types;
}

/**
 * Generate coupon code with selected discount rule.
 */
function commerce_coupon_auto_generate_rules_action_create_user_coupon_create($account, $type) {

  $user_id = $account->uid;
  $name = $account->name;
  $email = $account->mail;
  xdebug_break();
}
