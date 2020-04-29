<?php

/**
 * @file
 * fali.features.fe_block_boxes.inc
 */

/**
 * Implements hook_default_fe_block_boxes().
 */
function fali_default_fe_block_boxes() {
  $export = array();

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Block: Footer About Blog';
  $fe_block_boxes->format = 'raw_html';
  $fe_block_boxes->machine_name = 'fali_footer_about';
  $fe_block_boxes->body = '<?php global $base_url; ?>
<div class="about-us-widget">
<img src="<?php print $base_url.\'/\'.path_to_theme(); ?>/images/camera-photography-vintage-technology-small.jpg" alt="">
	<p>Kreuzberg Apartment to talk with him about his career and his influences. In his award-winning thesis work, a photo series titled “Leuchtpunktordnungen"</p>
</div>';

  $export['fali_footer_about'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Blog: Footer Facebook Fans';
  $fe_block_boxes->format = 'raw_html';
  $fe_block_boxes->machine_name = 'fali_footer_fb';
  $fe_block_boxes->body = '<div class="blog-fb-likebox">
<div class="fb-like-box" data-show-border="true" data-stream="false" data-header="false" data-show-faces="true" data-height="300" data-width="240" data-href="https://www.facebook.com/MotivationKing"></div>
</div>';

  $export['fali_footer_fb'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Block: Right Sidebar Blog About';
  $fe_block_boxes->format = 'raw_html';
  $fe_block_boxes->machine_name = 'fali_right_sidebar_about';
  $fe_block_boxes->body = '<?php global $base_url; ?>
<div class="about-us-widget">
<img src="<?php print $base_url.\'/\'.path_to_theme(); ?>/images/person-beach-holiday-vacation-small.jpg" alt="">
	<p>Kreuzberg Apartment to talk with him about his career and his influences. In his award-winning thesis work, a photo series titled “Leuchtpunktordnungen&quot;</p>
</div>';

  $export['fali_right_sidebar_about'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Block: Right Sidebar Advertising';
  $fe_block_boxes->format = 'raw_html';
  $fe_block_boxes->machine_name = 'fali_right_sidebar_advert';
  $fe_block_boxes->body = '<?php global $base_url; ?>
<div class="blog-sidebar-square-ads"><a href=""><img src="<?php print $base_url.\'/\'.path_to_theme(); ?>/images/300x250.png" alt="Pinterest"></a></div>';

  $export['fali_right_sidebar_advert'] = $fe_block_boxes;

  return $export;
}
