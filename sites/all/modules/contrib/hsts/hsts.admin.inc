<?php
// $Id$

/**
 * @file
 * Admininstrative forms for hsts module.
 */

/**
 * Implements hook_form().
 *
 * Settings form
 */
function hsts_admin_settings_form() {
  $form = array();

  $form['hsts_enabled'] = array(
    '#type' => 'checkbox',
    '#title' => t('Enable HTTP Strict Transport Security'),
    '#description' => t('Whether to start adding the HSTS header information or not.'),
    '#default_value' => variable_get('hsts_enabled', FALSE),
  );

  $form['hsts_https_only'] = array(
    '#type' => 'checkbox',
    '#title' => t('Restrict the HSTS header only for HTTPS (a.k.a. do not include on HTTP only requests).'),
    '#description' => t('!url. Check this off only if you are behind an SSL terminated load balancer.', array(
      '!url' => l(t('For security reasons, an HSTS Host MUST NOT include the STS header field in HTTP responses conveyed over non-secure transport'), 'http://tools.ietf.org/html/draft-ietf-websec-strict-transport-sec-14#section-7.2', array('external' => TRUE)),
    )),
    '#default_value' => variable_get('hsts_https_only', TRUE),
    '#states' => array(
      'disabled' => array(
        ':input[name=hsts_enabled]' => array('checked' => FALSE),
      ),
    ),
  );

  $form['hsts_max_age'] = array(
    '#type' => 'textfield',
    '#title' => t('Max Age'),
    '#description' => t('The maximum age value for the header in seconds. See the <a href="http://lists.w3.org/Archives/Public/www-archive/2009Sep/att-0051/draft-hodges-strict-transport-sec-05.plain.html#syntax">Strict Transport Security Definition</a> for more information.'),
    '#default_value' => variable_get('hsts_max_age', 500),
    '#maxlength' => 9,
    '#size' => 11,
  );

  $form['hsts_subdomains'] = array(
    '#type' => 'checkbox',
    '#title' => t('Include subdomains'),
    '#description' => t('Whether to include the subdomains as part of the HSTS implementation.'),
    '#default_value' => variable_get('hsts_subdomains', FALSE),
  );

  $form['hsts_preload'] = array(
    '#type' => 'checkbox',
    '#title' => t('Preload'),
    '#description' => t('The preload directive allows your domain to be submitted for inclusion by browsers at <a href="https://hstspreload.appspot.com/">hstspreload.appspot.com</a>. Do not enable preload unless you are sure you want all sites on your domain to be HTTPS-only for the long term.'),
    '#default_value' => variable_get('hsts_preload', FALSE),
  );

  return system_settings_form($form);
}

/**
 * Implements hook_validate().
 *
 * @param $form
 * @param $form_state
 */
function hsts_admin_settings_form_validate($form, &$form_state) {
  if (!is_numeric($form_state['values']['hsts_max_age']) || $form_state['values']['hsts_max_age'] < 0) {
    form_set_error('hsts_max_age', t('Value is not a number or out of bounds.'));
  }
}
