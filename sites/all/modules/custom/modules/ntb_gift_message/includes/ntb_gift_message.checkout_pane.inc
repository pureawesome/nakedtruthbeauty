<?php

/**
 * @file
 * Code for the naked truth beauty signup gift message pane.
 */

/**
 * Implements base_checkout_form()
 */
function ntb_gift_message_pane_checkout_form($form, $form_state, $checkout_pane, $order) {
  $checkout_form['ntb_gift_message_pane_gift'] = [
    '#type' => 'checkbox',
    '#title' => t('Add a gift message.'),
    '#description' => t('Packing slips for gifts do not include prices.'),
    '#default_value' => isset($order->data['ntb_gift_message']) ? $order->data['ntb_gift_message'][LANGUAGE_NONE][0]['ntb_gift_message_pane_gift'] : 0,
  ];
  $checkout_form['ntb_gift_message_pane_message'] = [
    '#type' => 'textarea',
    '#title' => t('Gift Message'),
    '#description' => t('250 character max.'),
    '#attributes' => [
      'maxlength' => 250,
    ],
    '#default_value' => isset($order->data['ntb_gift_message']) ? check_plain($order->data['ntb_gift_message'][LANGUAGE_NONE][0]['ntb_gift_message_pane_message']) : '',
    '#states' => [
      'visible' => [
        ':input[name="ntb_gift_message[ntb_gift_message_pane_gift]"]' => ['checked' => TRUE],
      ],
    ],
  ];
  return $checkout_form;
}

/**
 * Implements base_checkout_form_validate().
 */
function ntb_gift_message_pane_checkout_form_validate($form, &$form_state) {
  $gift_message_values = $form_state['values']['ntb_gift_message'];
  if ($gift_message_values['ntb_gift_message_pane_gift'] == TRUE && empty($gift_message_values['ntb_gift_message_pane_message'])) {
    form_set_error('ntb_gift_message_pane_gift', t('Please add a gift message or uncheck the box.'));
    return FALSE;
  }

  if ($gift_message_values['ntb_gift_message_pane_gift'] == TRUE && strlen($gift_message_values['ntb_gift_message_pane_message']) > 250) {
    form_set_error('ntb_gift_message_pane_gift', t('Please reduce the length of your gift message.'));
    return FALSE;
  }
  return TRUE;
}

/**
 * Implements base_checkout_form_submit().
 */
function ntb_gift_message_pane_checkout_form_submit($form, &$form_state, $checkout_pane, $order) {
  if (!isset($form[$checkout_pane['pane_id']])) {
    return;
  }
  $values = ['ntb_gift_message_pane_gift', 'ntb_gift_message_pane_message'];
  foreach ($values as $value) {
    $order->data['ntb_gift_message'][LANGUAGE_NONE][0][$value] = $form_state['values']['ntb_gift_message'][$value];
  }
}

/**
 * Implements base_review().
 */
function ntb_gift_message_pane_review($form, $form_state, $checkout_pane, $order) {
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
