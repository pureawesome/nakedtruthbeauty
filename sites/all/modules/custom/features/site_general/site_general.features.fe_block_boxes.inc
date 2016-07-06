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
  $fe_block_boxes->info = 'Footer menu';
  $fe_block_boxes->format = 'full_html';
  $fe_block_boxes->machine_name = 'footer_menu';
  $fe_block_boxes->body = '<div class="col-sm-12" style="margin-top: 150px">
<div style="display:inline; float:right">2016 ©&nbsp;naked truth beauty |&nbsp;<a href="/details#contact">Contact Us</a> | <a href="/details#shipping">Shipping Policy</a> | <a href="/details#returns">Return Policy</a> | <a href="/details#privacy">Privacy Policy</a></div>
</div>
';

  $export['footer_menu'] = $fe_block_boxes;

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
