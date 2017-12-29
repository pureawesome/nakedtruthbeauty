<?php
/**
 * @file
 * site_footer.features.fe_block_boxes.inc
 */

/**
 * Implements hook_default_fe_block_boxes().
 */
function site_footer_default_fe_block_boxes() {
  $export = array();

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Footer Copyright';
  $fe_block_boxes->format = 'full_html';
  $fe_block_boxes->machine_name = 'footer_menu';
  $fe_block_boxes->body = '<div class="rtecenter">2017 ©&nbsp;naked truth beauty</div>

';

  $export['footer_menu'] = $fe_block_boxes;

  return $export;
}
