<?php

/**
 * Implements hook_preprocess_HOOK().
 */
function ntb_preprocess_page(&$variables) {
  drupal_add_js(libraries_get_path('bootstrap') . '/js/bootstrap.min.js');
}
