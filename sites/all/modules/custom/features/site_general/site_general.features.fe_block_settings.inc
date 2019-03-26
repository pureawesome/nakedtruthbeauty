<?php

/**
 * @file
 * site_general.features.fe_block_settings.inc
 */

/**
 * Implements hook_default_fe_block_settings().
 */
function site_general_default_fe_block_settings() {
  $export = array();

  $export['version'] = '2.0';

  $export['block-css_fixes'] = array(
    'cache' => -1,
    'custom' => 0,
    'machine_name' => 'css_fixes',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => 'footer',
        'status' => 1,
        'theme' => 'ntb',
        'weight' => -33,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['block-line_break'] = array(
    'cache' => -1,
    'custom' => 0,
    'machine_name' => 'line_break',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['block-ntb_mission'] = array(
    'cache' => -1,
    'custom' => 0,
    'machine_name' => 'ntb_mission',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['block-social_footer'] = array(
    'cache' => -1,
    'custom' => 0,
    'machine_name' => 'social_footer',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => 'footer',
        'status' => 1,
        'theme' => 'ntb',
        'weight' => -35,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['block-twitter'] = array(
    'cache' => -1,
    'custom' => 0,
    'machine_name' => 'twitter',
    'module' => 'block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => 'NkdTruthBeauty',
    'visibility' => 0,
  );

  $export['instagram_block-instagram_block'] = array(
    'cache' => 8,
    'custom' => 0,
    'delta' => 'instagram_block',
    'module' => 'instagram_block',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => 'footer',
        'status' => 1,
        'theme' => 'ntb',
        'weight' => -37,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '<none>',
    'visibility' => 0,
  );

  $export['ntb_top-ntb_top_3'] = array(
    'cache' => 1,
    'custom' => 0,
    'delta' => 'ntb_top_3',
    'module' => 'ntb_top',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['ntb_top-ntb_top_4'] = array(
    'cache' => 1,
    'custom' => 0,
    'delta' => 'ntb_top_4',
    'module' => 'ntb_top',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['ntb_top-ntb_top_blog_3'] = array(
    'cache' => 1,
    'custom' => 0,
    'delta' => 'ntb_top_blog_3',
    'module' => 'ntb_top',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => 'popular articles',
    'visibility' => 0,
  );

  $export['views-4268140b6622172a11e71205b400fc58'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => '4268140b6622172a11e71205b400fc58',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-article_type_taxonomy-block'] = array(
    'cache' => 8,
    'custom' => 0,
    'delta' => 'article_type_taxonomy-block',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-blog-block'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'blog-block',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-blog-block_1'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'blog-block_1',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-blog-block_2'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'blog-block_2',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-blog_authored-block'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'blog_authored-block',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-blog_related-block'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'blog_related-block',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-blog_related-block_1'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'blog_related-block_1',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-front_tiles-block_1'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'front_tiles-block_1',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-front_tiles-block_2'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'front_tiles-block_2',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-front_tiles-block_3'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'front_tiles-block_3',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-front_tiles-block_4'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'front_tiles-block_4',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-front_tiles-front_tile_article'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'front_tiles-front_tile_article',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-product_type_taxonomy-block'] = array(
    'cache' => 8,
    'custom' => 0,
    'delta' => 'product_type_taxonomy-block',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-recent_blog_posts-block'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'recent_blog_posts-block',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  $export['views-recent_blog_posts-block_1'] = array(
    'cache' => -1,
    'custom' => 0,
    'delta' => 'recent_blog_posts-block_1',
    'module' => 'views',
    'node_types' => array(),
    'pages' => '',
    'roles' => array(),
    'themes' => array(
      'ntb' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'ntb',
        'weight' => 0,
      ),
      'seven' => array(
        'region' => '',
        'status' => 0,
        'theme' => 'seven',
        'weight' => 0,
      ),
    ),
    'title' => '',
    'visibility' => 0,
  );

  return $export;
}
