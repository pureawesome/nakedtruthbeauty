<?php

/**
 * @file
 * Forms for fulfilling orders.
 */

/**
 * Package form page callback.
 */
function commerce_shippingeasy_commerce_form($form, &$form_state, $order) {
  $form['external_order_identifier'] = array(
    '#type' => 'textfield',
    '#title' => 'Order ID',
    '#default_value' => $order->order_id,
  );

  $form['ordered_at'] = array(
    '#type' => 'textfield',
    '#title' => 'Created Timestamp',
    '#default_value' => $order->created,
  );

  $order_wrapper = entity_metadata_wrapper('commerce_order', $order);
  $profile = $order_wrapper->commerce_customer_shipping;
  $address = $profile->commerce_customer_address->value();

  $form['first_name'] = [
    '#type' => 'textfield',
    '#title' => 'First Name',
    '#default_value' => $address['first_name'],
  ];

  $form['last_name'] = [
    '#type' => 'textfield',
    '#title' => 'First Name',
    '#default_value' => $address['last_name'],
  ];

  $form['address'] = [
    '#type' => 'textfield',
    '#title' => 'Address',
    '#default_value' => $address['thoroughfare'],
  ];

  $form['state'] = [
    '#type' => 'textfield',
    '#title' => 'State',
    '#default_value' => $address['administrative_area'],
  ];

  $form['city'] = [
    '#type' => 'textfield',
    '#title' => 'City',
    '#default_value' => $address['locality'],
  ];

  $form['postal_code'] = [
    '#type' => 'textfield',
    '#title' => 'Postal Code',
    '#default_value' => $address['postal_code'],
  ];

  $form['country'] = [
    '#type' => 'textfield',
    '#title' => 'Country',
    '#default_value' => $address['country'],
  ];

  $line_items = $order_wrapper->commerce_line_items->value();
  $line_item_count = 0;

  $form['line_items'] = [
    '#type' => 'fieldset',
    '#title' => 'Line Items',
  ];

  foreach ($line_items as $key => $line_item) {
    if (empty($line_item->commerce_product)) {
      continue;
    }

    $line_item_count += 1;

    $form['line_items'][$key] = [
      '#type' => 'fieldset',
      '#attributes' => [
        'class' => ['container-inline'],
      ],
    ];

    $form['line_items'][$key][$key . '_sku'] = [
      '#type' => 'textfield',
      '#title' => 'SKU',
      '#size' => 10,
      '#default_value' => $line_item->line_item_label,
    ];

    $form['line_items'][$key][$key . '_quantity'] = [
      '#type' => 'textfield',
      '#title' => 'Quantity',
      '#size' => 10,
      '#default_value' => $line_item->quantity,
    ];

    $form['line_items'][$key][$key . '_weight'] = [
      '#type' => 'textfield',
      '#title' => 'Weight in Ounces',
      '#size' => 20,
      '#required' => TRUE,
    ];
  }

  $form['items_total'] = [
    '#type' => 'textfield',
    '#title' => 'Total Items',
    '#value' => $line_item_count,
  ];

  $form['commerce_shippingeasy_send'] = [
    '#type' => 'submit',
    '#default_value' => t('Send to ShippingEasy'),
    // '#submit' => ['commerce_shippingeasy_send_order'],
    // '#ajax' => [
    //   'callback' => 'commerce_fulfillment_content_callback',
    // ],
  ];

  return $form;
}

/**
 * Create order json and send to shippingeasy.
 */
function commerce_shippingeasy_commerce_form_submit($form, &$form_state) {
  if (($library = libraries_load('shipping_easy-php')) && !empty($library['loaded'])) {
    $apiKey = variable_get('commerce_shippingeasy_apikey', '');
    $apiSecret = variable_get('commerce_shippingeasy_apisecret', '');
    $storeKey = variable_get('commerce_shippingeasy_storekey', '');

    ShippingEasy::setApiKey($apiKey);
    ShippingEasy::setApiSecret($apiSecret);

    $values = $form_state['values'];

    $shipping_data = [
      "external_order_identifier" => $values["external_order_identifier"],
      "ordered_at" => format_date($values["ordered_at"], 'long'),
      "recipients" => [
        [
          "first_name" => $values["first_name"],
          "last_name" => $values["last_name"],
          "address" => $values["address"],
          "state" => $values["state"],
          "city" => $values["city"],
          "postal_code" => $values["postal_code"],
          "country" => $values["country"],
          "items_total" => $values["items_total"],
          "line_items" => [],
        ],
      ],
    ];

    for ($x = 0; $x < $values["items_total"]; $x++) {
      $line_item = [];
      $line_item['item_name'] = $values[$x . "_sku"];
      $line_item['sku'] = $values[$x . "_sku"];
      $line_item['quantity'] = $values[$x . "_quantity"];
      $line_item['weight_in_ounces'] = $values[$x . "_weight"];

      $shipping_data["recipients"][0]["line_items"][] = $line_item;
    }
    $order = new ShippingEasy_Order($storeKey, $shipping_data);

    try {
      $response = $order->create();
    }
    catch (Exception $e) {
      $message = $e->json_body['errors'];
      watchdog('commerce shippingeasy', $message);
      drupal_set_message($message, 'error');
    }

    if ($response && $response['order']) {
      $id = $response['order']['id'];
      drupal_set_message(t('The order has been created on EasyShipping. ID: @id', ['@id' => $id]));
    }
  }
}

/**
 * Ajax callback to replace entire form.
 */
function commerce_fulfillment_content_callback($form, &$form_state) {
  return $form;
}
