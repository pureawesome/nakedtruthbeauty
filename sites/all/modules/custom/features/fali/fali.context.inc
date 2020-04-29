<?php

/**
 * @file
 * fali.context.inc
 */

/**
 * Implements hook_context_default_contexts().
 */
function fali_context_default_contexts() {
  $export = array();

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'home_page_default';
  $context->description = '';
  $context->tag = 'For home page';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        '<front>' => '<front>',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'views-e8b0d66378371d401e84cd307c87eabc' => array(
          'module' => 'views',
          'delta' => 'e8b0d66378371d401e84cd307c87eabc',
          'region' => 'home_top_content',
          'weight' => '-10',
        ),
        'views-5ea779eab5e7f7d0e47684b280a920d5' => array(
          'module' => 'views',
          'delta' => '5ea779eab5e7f7d0e47684b280a920d5',
          'region' => 'home_top_content',
          'weight' => '-9',
        ),
      ),
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('For home page');
  $export['home_page_default'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'home_page_header_2';
  $context->description = '';
  $context->tag = 'For home page';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'header-type-2' => 'header-type-2',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'views-4f2fc212fe2d9ba53a77748f0c48a6c5' => array(
          'module' => 'views',
          'delta' => '4f2fc212fe2d9ba53a77748f0c48a6c5',
          'region' => 'home_top_content',
          'weight' => '-10',
        ),
        'views-5ea779eab5e7f7d0e47684b280a920d5' => array(
          'module' => 'views',
          'delta' => '5ea779eab5e7f7d0e47684b280a920d5',
          'region' => 'home_top_content',
          'weight' => '-9',
        ),
        'views-f9c9c64fe8f59add86ef31e75d30ab42' => array(
          'module' => 'views',
          'delta' => 'f9c9c64fe8f59add86ef31e75d30ab42',
          'region' => 'content',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('For home page');
  $export['home_page_header_2'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'home_page_header_3';
  $context->description = '';
  $context->tag = 'For home page';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'header-type-3' => 'header-type-3',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'views-4f2fc212fe2d9ba53a77748f0c48a6c5' => array(
          'module' => 'views',
          'delta' => '4f2fc212fe2d9ba53a77748f0c48a6c5',
          'region' => 'home_top_content',
          'weight' => '-10',
        ),
        'views-5ea779eab5e7f7d0e47684b280a920d5' => array(
          'module' => 'views',
          'delta' => '5ea779eab5e7f7d0e47684b280a920d5',
          'region' => 'home_top_content',
          'weight' => '-9',
        ),
        'views-a26a79a73e00c875550f5e349c72e67a' => array(
          'module' => 'views',
          'delta' => 'a26a79a73e00c875550f5e349c72e67a',
          'region' => 'content',
          'weight' => '-8',
        ),
      ),
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('For home page');
  $export['home_page_header_3'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'home_page_header_4';
  $context->description = '';
  $context->tag = 'For home page';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'header-type-4' => 'header-type-4',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'views-e8b0d66378371d401e84cd307c87eabc' => array(
          'module' => 'views',
          'delta' => 'e8b0d66378371d401e84cd307c87eabc',
          'region' => 'home_top_content',
          'weight' => '-10',
        ),
        'views-5ea779eab5e7f7d0e47684b280a920d5' => array(
          'module' => 'views',
          'delta' => '5ea779eab5e7f7d0e47684b280a920d5',
          'region' => 'home_top_content',
          'weight' => '-9',
        ),
        'views-f9c9c64fe8f59add86ef31e75d30ab42' => array(
          'module' => 'views',
          'delta' => 'f9c9c64fe8f59add86ef31e75d30ab42',
          'region' => 'content',
          'weight' => '-10',
        ),
      ),
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('For home page');
  $export['home_page_header_4'] = $context;

  $context = new stdClass();
  $context->disabled = FALSE; /* Edit this to true to make a default context disabled initially */
  $context->api_version = 3;
  $context->name = 'home_page_header_5';
  $context->description = '';
  $context->tag = 'For home page';
  $context->conditions = array(
    'path' => array(
      'values' => array(
        'header-type-5' => 'header-type-5',
      ),
    ),
  );
  $context->reactions = array(
    'block' => array(
      'blocks' => array(
        'views-c3e3c5d487cf2265dd1f9116da311eaa' => array(
          'module' => 'views',
          'delta' => 'c3e3c5d487cf2265dd1f9116da311eaa',
          'region' => 'home_top_content',
          'weight' => '-20',
        ),
        'views-5ea779eab5e7f7d0e47684b280a920d5' => array(
          'module' => 'views',
          'delta' => '5ea779eab5e7f7d0e47684b280a920d5',
          'region' => 'home_top_content',
          'weight' => '-19',
        ),
        'views-a26a79a73e00c875550f5e349c72e67a' => array(
          'module' => 'views',
          'delta' => 'a26a79a73e00c875550f5e349c72e67a',
          'region' => 'content',
          'weight' => '-9',
        ),
      ),
    ),
  );
  $context->condition_mode = 0;

  // Translatables
  // Included for use with string extractors like potx.
  t('For home page');
  $export['home_page_header_5'] = $context;

  return $export;
}
