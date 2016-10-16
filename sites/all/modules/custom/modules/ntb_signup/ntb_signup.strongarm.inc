<?php
/**
 * @file
 * ntb_signup.strongarm.inc
 */

/**
 * Implements hook_strongarm().
 */
function ntb_signup_strongarm() {
  $export = array();

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'signup_code';
  $strongarm->value = 'code';
  $export['signup_code'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'signup_postmessage';
  $strongarm->value = array(
    'value' => '<p>asd &nbsp;asdasdf asdasdf</p>
',
    'format' => 'full_html',
  );
  $export['signup_postmessage'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'signup_premessage';
  $strongarm->value = array(
    'value' => '<p>hhsadfhasdf</p>
',
    'format' => 'full_html',
  );
  $export['signup_premessage'] = $strongarm;

  return $export;
}
