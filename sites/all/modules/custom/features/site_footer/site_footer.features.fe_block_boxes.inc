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
  $fe_block_boxes->machine_name = 'footer_menu_copyright';
  $fe_block_boxes->body = '<div class="rtecenter" style="margin-bottom:1rem">2019 ©&nbsp;naked truth beauty</div>
';

  $export['footer_menu_copyright'] = $fe_block_boxes;

  $fe_block_boxes = new stdClass();
  $fe_block_boxes->info = 'Mail Chimp Signup Form';
  $fe_block_boxes->format = 'raw_html';
  $fe_block_boxes->machine_name = 'mailchimp';
  $fe_block_boxes->body = '<!-- Begin MailChimp Signup Form -->
<div id="mc_embed_signup">
<form action="https://nakedtruthbeauty.us14.list-manage.com/subscribe/post?u=3baeccb655642f2b779e11018&amp;id=2d3124e748" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<h3><span>Sign up for our newsletter</span></h3><p>and get 15% off your next order.</p>
<div class="mc-field-group">
<label class="sr-only" for="mce-EMAIL">Email Required</label>
	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
</div>
	<div id="mce-responses" class="clear">
		<div class="response" id="mce-error-response" style="display:none"></div>
		<div class="response" id="mce-success-response" style="display:none"></div>
	</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_3baeccb655642f2b779e11018_2d3124e748" tabindex="-1" value=""></div>
    <div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button btn form-submit submit"></div>
    </div>
</form>
</div>

<!--End mc_embed_signup-->';

  $export['mailchimp'] = $fe_block_boxes;

  return $export;
}
