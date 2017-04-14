<?php
/**
 * @file
 * ntb_picture.features.inc
 */

/**
 * Implements hook_image_default_styles().
 */
function site_picture_image_default_styles() {
  $styles = array();

  $styles['marquee_mobile'] = array(
    'label' => 'marquee_mobile_1x',
    'effects' => array(
      3 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 400,
          'height' => 100,
        ),
        'weight' => 1,
      ),
    ),
  );

  $styles['marquee_mobile'] = array(
    'label' => 'marquee_mobile_15x',
    'effects' => array(
      3 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 600,
          'height' => 150,
        ),
        'weight' => 1,
      ),
    ),
  );

  $styles['marquee_mobile'] = array(
    'label' => 'marquee_mobile_2x',
    'effects' => array(
      3 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 800,
          'height' => 200,
        ),
        'weight' => 1,
      ),
    ),
  );

  $styles['marquee_narrow_1x'] = array(
    'label' => 'marquee_mobile',
    'effects' => array(
      3 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 600,
          'height' => 150,
        ),
        'weight' => 1,
      ),
    ),
  );

  $styles['marquee_narrow_15x'] = array(
    'label' => 'marquee_mobile',
    'effects' => array(
      3 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 900,
          'height' => 225,
        ),
        'weight' => 1,
      ),
    ),
  );

  $styles['marquee_narrow_2x'] = array(
    'label' => 'marquee_mobile',
    'effects' => array(
      3 => array(
        'name' => 'image_scale_and_crop',
        'data' => array(
          'width' => 1200,
          'height' => 300,
        ),
        'weight' => 1,
      ),
    ),
  );

//   breakpoints[mobile] = (min-width: 0px)
// breakpoints[narrow] = (min-width: 560px)
// breakpoints[nav] = (min-width: 768px)
// breakpoints[wide] = (min-width: 851px)
// breakpoints[main] = (min-width: 1200px)
// breakpoints[tv] = only screen and (min-width: 3456px)
//
// multipliers[mobile][] = 1.5x
// multipliers[mobile][] = 2x

  return $styles;
}
