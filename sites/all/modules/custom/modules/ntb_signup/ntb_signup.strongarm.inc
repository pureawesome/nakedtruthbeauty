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
  $strongarm->value = 'UPDATEVALUE';
  $export['signup_code'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'signup_postmessage';
  $strongarm->value = array(
    'value' => '<p>Thanks for giving us your email. &nbsp;Here is your discount code.&nbsp;(we\'ll send it to your email as well, so you don\'t lose it)</p>

<p>&nbsp;</p>
',
    'format' => 'full_html',
  );
  $export['signup_postmessage'] = $strongarm;

  $strongarm = new stdClass();
  $strongarm->disabled = FALSE; /* Edit this to true to make a default strongarm disabled initially */
  $strongarm->api_version = 1;
  $strongarm->name = 'signup_premessage';
  $strongarm->value = array(
    'value' => '<p>Welcome to naked truth beauty! We make socially responsibly cosmetics that are good for our bodes, communities and enviroment. No parabens, dyes or toxic chemicals–ever!</p>

<p>Right now we are offing a 10% discount code for first time buyers–just fill out the email below!</p>
',
    'format' => 'full_html',
  );
  $export['signup_premessage'] = $strongarm;

  return $export;
}
