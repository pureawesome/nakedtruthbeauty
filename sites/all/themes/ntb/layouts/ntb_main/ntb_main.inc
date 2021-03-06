<?php

// Plugin definition
$plugin = array(
  'title' => t('NTB Main'),
  'category' => t('NTB'),
  'icon' => 'ntb_main.png',
  'theme' => 'ntb-main',
  'css' => 'ntb_main.css',
  'regions' => array(
    'full-width' => t('Full Width'),
    'top' => t('Top'),
    'upper-left' => t('Upper Left 1/3'),
    'upper-middle' => t('Upper Middle 1/3'),
    'upper-right' => t('Upper Right 1/3'),
    'middle-left' => t('Middle Left 1/2'),
    'middle-right' => t('Middle Right 1/2'),
    'middle-bottom-left' => t('Middle Bottom Left 2/3'),
    'middle-bottom-right' => t('Middle Bottom Right 1/3'),
    'lower-left' => t('Lower Left 1/6'),
    'lower-middle' => t('Lower Middle 2/3'),
    'lower-right' => t('Lower Right 1/6'),
    'lower-bottom-left' => t('Lower Bottom Left 1/12'),
    'lower-bottom-middle' => t('Lower Bottom Middle 5/6'),
    'lower-bottom-right' => t('Lower Bottom Right 1/12'),
    'bottom-left' => t('Bottom Left 1/4'),
    'bottom-right' => t('Bottom Right 3/4'),
    'bottom' => t('Bottom')
  ),
);
