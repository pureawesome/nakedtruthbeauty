<?php

/**
 * @file
 * site_footer.strongarm.inc
 */

/**
 * Implements hook_strongarm().
 */
function site_footer_strongarm() {
  $export = array();

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'xmlsitemap_settings_menu_link_menu-footer-menu';
  $strongarm->value = array(
    'status' => '1',
    'priority' => '0.3',
  );
  $export['xmlsitemap_settings_menu_link_menu-footer-menu'] = $strongarm;

  return $export;
}
