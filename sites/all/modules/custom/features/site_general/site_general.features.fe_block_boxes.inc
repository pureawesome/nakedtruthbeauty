<?php
/**
 * @file
 * site_general.features.fe_block_boxes.inc
 */

/**
 * Implements hook_default_fe_block_boxes().
 */
function site_general_default_fe_block_boxes() {
  $export = array();

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'mission';
  $fe_block_boxes->format = 'full_html';
  $fe_block_boxes->machine_name = 'ntb_mission';
  $fe_block_boxes->body = '<div class="col-md-10 col-md-offset-1">
<h2>Naked Truth Beauty is an all-out commitment to socially responsible beauty: Good for our bodies, environment, and communities.</h2>
</div>
';

  $export['ntb_mission'] = $fe_block_boxes;

  return $export;
}
