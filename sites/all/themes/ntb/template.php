<?php

/**
 * Implements hook_preprocess_HOOK().
 */
function ntb_preprocess_page(&$variables) {
  drupal_add_js(libraries_get_path('bootstrap') . '/js/bootstrap.min.js');
}

/**
 * Implements hook_preprocess_HOOK().
 */
function ntb_preprocess_form_element(&$vars) {
  // $element = $vars['element'];
  // if ($element['#type'] == 'textfield') {
  //   $vars['element']['#attributes']['class'][] = 'form-control';
  // }
}

/**
 * Implements hook_preprocess_HOOK().
 */
function ntb_theme_form_element(&$vars) {

}
