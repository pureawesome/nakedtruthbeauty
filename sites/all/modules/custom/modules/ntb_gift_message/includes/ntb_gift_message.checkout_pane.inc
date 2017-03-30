<?php

/**
 * @file
 * Code for the naked truth beauty signup gift message pane.
 */

/**
 * Implements base_settings_form().
 */
function ntb_gift_message_pane_settings_form($checkout_pane) {
  $form['ntb_gift_message_field'] = array(
    '#type' => 'textfield',
    '#title' => t('Gift Message'),
    '#default_value' => variable_get('ntb_gift_message_field', ''),
  );
  return $form;
}

/**
 * Implements base_checkout_form()
 */
function ntb_gift_message_pane_checkout_form($form, $form_state, $checkout_pane, $order) {
  $checkout_form['ntb_gift_message_pane_invoice'] = [
    '#type' => 'checkbox',
    '#title' => t('Do not send invoice.'),
    '#default_value' => isset($order->data['ntb_gift_message']) ? $order->data['ntb_gift_message'][LANGUAGE_NONE][0]['ntb_gift_message_pane_invoice'] : 0,
  ];
  $checkout_form['ntb_gift_message_pane_gift'] = [
    '#type' => 'checkbox',
    '#title' => t('Add a gift message.'),
    '#default_value' => isset($order->data['ntb_gift_message']) ? $order->data['ntb_gift_message'][LANGUAGE_NONE][0]['ntb_gift_message_pane_gift'] : 0,
  ];
  $checkout_form['ntb_gift_message_pane_message'] = [
    '#type' => 'textarea',
    '#title' => t('Gift Message'),
    '#default_value' => isset($order->data['ntb_gift_message']) ? check_plain($order->data['ntb_gift_message'][LANGUAGE_NONE][0]['ntb_gift_message_pane_message']) : '',
    '#states' => [
      'visible' => [
        ':input[name="ntb_gift_message[ntb_gift_message_pane_gift]"]' => ['checked' => TRUE],
      ],
    ],
  ];

  // $checkout_form['ntb_gift_message_pane_field_display'] = array(
  //   '#markup' => variable_get('ntb_gift_message_pane_field', ''),
  // );
  // $checkout_form['ntb_gift_message_pane_field2'] = array(
  //   '#type' => 'textfield',
  //   '#title' => t('My Module Pane Field 2'),
  // );
  return $checkout_form;
}

/**
 * Implements base_checkout_form_validate().
 */
function ntb_gift_message_pane_checkout_form_validate($form, &$form_state) {
  if ($form_state['values']['ntb_gift_message']['ntb_gift_message_pane_gift'] == TRUE && empty($form_state['values']['ntb_gift_message']['ntb_gift_message_pane_message'])) {
    form_set_error('ntb_gift_message_pane_gift', t('Please add a gift message or uncheck the box.'));
    return FALSE;
  }
  else {
    return TRUE;
  }
}

/**
 * Implements base_checkout_form_submit().
 */
function ntb_gift_message_pane_checkout_form_submit($form, &$form_state, $checkout_pane, $order) {
  if (!isset($form[$checkout_pane['pane_id']])) {
    return;
  }
  $values = ['ntb_gift_message_pane_invoice', 'ntb_gift_message_pane_gift', 'ntb_gift_message_pane_message'];
  foreach ($values as $value) {
    $order->data['ntb_gift_message'][LANGUAGE_NONE][0][$value] = $form_state['values']['ntb_gift_message'][$value];
  }
}

/**
 * Implements base_review().
 */
function ntb_gift_message_pane_review($form, $form_state, $checkout_pane, $order) {
  $content['gift_invoice'] = array(
    '#type' => 'item',
    '#title' => t('Send Invoice:'),
    '#markup' => $order->data['ntb_gift_message']['und'][0]['ntb_gift_message_pane_invoice'] ? t('Yes') : t('No'),
  );

  $content['gift_status'] = array(
    '#type' => 'item',
    '#title' => t('Is gift?:'),
    '#markup' => $order->data['ntb_gift_message']['und'][0]['ntb_gift_message_pane_gift'] ? t('Yes') : t('No'),
  );

  $content['gift_message'] = array(
    '#type' => 'item',
    '#title' => t('Gift Message:'),
    '#markup' => check_plain($order->data['ntb_gift_message']['und'][0]['ntb_gift_message_pane_message']),
  );

  return drupal_render($content);
}
