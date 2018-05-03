<?php

/**
 * @file
 * Form for shippingeasy Settings.
 */

/**
 * Admin form.
 */
function commerce_shippingeasy_commerce_admin_form($form, &$form_state) {
  $form['commerce_shippingeasy_apikey'] = array(
    '#type' => 'textfield',
    '#title' => t('API Key'),
    '#default_value' => variable_get('commerce_shippingeasy_apikey', ''),
    '#required' => TRUE,
  );

  $form['commerce_shippingeasy_apisecret'] = array(
    '#type' => 'textfield',
    '#title' => t('API Secret'),
    '#default_value' => variable_get('commerce_shippingeasy_apisecret', ''),
    '#required' => TRUE,
  );

  $form['commerce_shippingeasy_storekey'] = array(
    '#type' => 'textfield',
    '#title' => t('Store Key'),
    '#default_value' => variable_get('commerce_shippingeasy_storekey', ''),
    '#required' => TRUE,
  );

  return system_settings_form($form);
}
