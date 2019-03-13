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
  $fe_block_boxes->info = 'line_break';
  $fe_block_boxes->format = 'raw_html';
  $fe_block_boxes->machine_name = 'line_break';
  $fe_block_boxes->body = '<div class="line-break"></div>';

  $export['line_break'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'mission';
  $fe_block_boxes->format = 'full_html';
  $fe_block_boxes->machine_name = 'ntb_mission';
  $fe_block_boxes->body = '<div>
<h1 class="sr-only">Naked Truth Beauty</h1>

<p>&nbsp;</p>

<h2 class="rtecenter"><span class="color-secondary">SOCIALLY RESPONSIBLE COSMETICS</span></h2>

<h3 class="rtecenter">good for our bodies, communities, and environment</h3>

<p>&nbsp;</p>
</div>
';

  $export['ntb_mission'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'social_footer';
  $fe_block_boxes->format = 'raw_html';
  $fe_block_boxes->machine_name = 'social_footer';
  $fe_block_boxes->body = '<div class="social" id="social_footer">
<ul class="inline">
	<li><a class="fb" href="http://facebook.com/ntbeauty"><span class="sr-only">Facebook</span></a></li>
	
	<li><a class="insta" href="http://instagram.com/nakedtruthbeauty"><span class="sr-only">Instagram</span></a></li>
<li><a class="pinterest" href="https://www.pinterest.com/nkdtruthbeauty/"><span class="sr-only">Pinterest</span></a></li>
</ul>
</div>
';

  $export['social_footer'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Twitter';
  $fe_block_boxes->format = 'full_html';
  $fe_block_boxes->machine_name = 'twitter';
  $fe_block_boxes->body = '<a class="twitter-timeline" data-height="600" data-theme="light" data-link-color="#50a89f" href="https://twitter.com/NkdTruthBeauty">Tweets by NkdTruthBeauty</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>';

  $export['twitter'] = $fe_block_boxes;

  return $export;
}
