<?php

/**
 * @file
 * site_general.pages_default.inc
 */

/**
 * Implements hook_default_page_manager_handlers().
 */
function site_general_default_page_manager_handlers() {
  $export = array();

  $handler = new stdClass();
  $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
  $handler->api_version = 1;
  $handler->name = 'node_view__page';
  $handler->task = 'node_view';
  $handler->subtask = '';
  $handler->handler = 'panel_context';
  $handler->weight = -28;
  $handler->conf = array(
    'title' => 'page',
    'no_blocks' => 0,
    'pipeline' => 'standard',
    'body_classes_to_remove' => '',
    'body_classes_to_add' => '',
    'css_id' => '',
    'css' => '',
    'contexts' => array(),
    'relationships' => array(),
    'name' => 'page',
    'access' => array(
      'plugins' => array(
        0 => array(
          'name' => 'node_type',
          'settings' => array(
            'type' => array(
              'page' => 'page',
            ),
          ),
          'context' => 'argument_entity_id:node_1',
          'not' => FALSE,
        ),
      ),
      'logic' => 'and',
    ),
  );
  $display = new panels_display();
  $display->layout = 'ntb_main';
  $display->layout_settings = array();
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'top' => NULL,
      'upper-left' => NULL,
      'upper-middle' => NULL,
      'upper-right' => NULL,
      'middle-left' => NULL,
      'middle-right' => NULL,
      'lower-left' => NULL,
      'lower-middle' => NULL,
      'lower-right' => NULL,
      'bottom' => NULL,
      'bottom-left' => NULL,
      'bottom-right' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = '';
  $display->uuid = 'd2cc3530-4f6a-4e3a-ba32-10fbefeed7d2';
  $display->storage_type = 'page_manager';
  $display->storage_id = 'node_view__page';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-480df0aa-1301-46ac-8c6a-c8902eff5c65';
  $pane->panel = 'lower-middle';
  $pane->type = 'node_body';
  $pane->subtype = 'node_body';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'context' => 'argument_entity_id:node_1',
    'override_title' => 1,
    'override_title_text' => '',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '480df0aa-1301-46ac-8c6a-c8902eff5c65';
  $display->content['new-480df0aa-1301-46ac-8c6a-c8902eff5c65'] = $pane;
  $display->panels['lower-middle'][0] = 'new-480df0aa-1301-46ac-8c6a-c8902eff5c65';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = 'new-480df0aa-1301-46ac-8c6a-c8902eff5c65';
  $handler->conf['display'] = $display;
  $export['node_view__page'] = $handler;

  $handler = new stdClass();
  $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
  $handler->api_version = 1;
  $handler->name = 'node_view__panel_context_3e674d82-53cb-4e2e-adec-45fe0237c4a4';
  $handler->task = 'node_view';
  $handler->subtask = '';
  $handler->handler = 'panel_context';
  $handler->weight = -29;
  $handler->conf = array(
    'title' => 'article',
    'no_blocks' => 0,
    'pipeline' => 'ipe',
    'body_classes_to_remove' => '',
    'body_classes_to_add' => '',
    'css_id' => '',
    'css' => '',
    'contexts' => array(),
    'relationships' => array(),
    'name' => '',
    'access' => array(
      'plugins' => array(
        0 => array(
          'name' => 'node_type',
          'settings' => array(
            'type' => array(
              'article' => 'article',
            ),
          ),
          'context' => 'argument_entity_id:node_1',
          'not' => FALSE,
        ),
      ),
      'logic' => 'and',
    ),
    'metatag_panels' => array(
      'enabled' => 1,
      'metatags' => array(
        'og:image' => array(
          'value' => '[node:field_primary_image]',
        ),
        'og:image:secure_url' => array(
          'value' => '[node:field_primary_image]',
        ),
        'og:image:width' => array(
          'value' => '',
        ),
        'og:image:height' => array(
          'value' => '',
        ),
      ),
    ),
  );
  $display = new panels_display();
  $display->layout = 'ntb_main';
  $display->layout_settings = array();
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'top' => NULL,
      'upper-left' => NULL,
      'upper-middle' => NULL,
      'upper-right' => NULL,
      'middle-left' => NULL,
      'middle-right' => NULL,
      'lower-left' => NULL,
      'lower-middle' => NULL,
      'lower-right' => NULL,
      'bottom' => NULL,
      'bottom-left' => NULL,
      'bottom-right' => NULL,
      'full-width' => NULL,
      'middle-bottom-left' => NULL,
      'middle-bottom-right' => NULL,
      'lower-bottom-left' => NULL,
      'lower-bottom-middle' => NULL,
      'lower-bottom-right' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = '';
  $display->uuid = 'd2cc3530-4f6a-4e3a-ba32-10fbefeed7d2';
  $display->storage_type = 'page_manager';
  $display->storage_id = 'node_view__panel_context_3e674d82-53cb-4e2e-adec-45fe0237c4a4';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-480df0aa-1301-46ac-8c6a-c8902eff5c65';
  $pane->panel = 'middle-bottom-left';
  $pane->type = 'node_body';
  $pane->subtype = 'node_body';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'context' => 'argument_entity_id:node_1',
    'override_title' => 1,
    'override_title_text' => '',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '480df0aa-1301-46ac-8c6a-c8902eff5c65';
  $display->content['new-480df0aa-1301-46ac-8c6a-c8902eff5c65'] = $pane;
  $display->panels['middle-bottom-left'][0] = 'new-480df0aa-1301-46ac-8c6a-c8902eff5c65';
  $pane = new stdClass();
  $pane->pid = 'new-7843d8e6-75b3-4fec-a1cb-23077ffb194a';
  $pane->panel = 'middle-bottom-left';
  $pane->type = 'views';
  $pane->subtype = 'blog_related';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_pager_settings' => 0,
    'use_pager' => 0,
    'nodes_per_page' => '3',
    'pager_id' => '0',
    'offset' => '0',
    'more_link' => 0,
    'feed_icons' => 0,
    'panel_args' => 0,
    'link_to_view' => 0,
    'args' => '',
    'url' => '',
    'display' => 'block',
    'context' => array(
      0 => '',
      1 => '',
    ),
    'override_title' => 1,
    'override_title_text' => 'Related Posts',
    'override_title_heading' => 'h3',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 1;
  $pane->locks = array();
  $pane->uuid = '7843d8e6-75b3-4fec-a1cb-23077ffb194a';
  $display->content['new-7843d8e6-75b3-4fec-a1cb-23077ffb194a'] = $pane;
  $display->panels['middle-bottom-left'][1] = 'new-7843d8e6-75b3-4fec-a1cb-23077ffb194a';
  $pane = new stdClass();
  $pane->pid = 'new-98fd4786-4a8d-42f8-bebd-7d0036c20ffe';
  $pane->panel = 'middle-bottom-right';
  $pane->type = 'block';
  $pane->subtype = 'ntb_blog_meta-ntb_blog_meta';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 0,
    'override_title_text' => '',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '98fd4786-4a8d-42f8-bebd-7d0036c20ffe';
  $display->content['new-98fd4786-4a8d-42f8-bebd-7d0036c20ffe'] = $pane;
  $display->panels['middle-bottom-right'][0] = 'new-98fd4786-4a8d-42f8-bebd-7d0036c20ffe';
  $pane = new stdClass();
  $pane->pid = 'new-4883355f-a17e-45b0-8108-5983f5f63cba';
  $pane->panel = 'middle-bottom-right';
  $pane->type = 'block';
  $pane->subtype = 'ntb_top-ntb_top_blog_3';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => 'popular articles',
    'override_title_heading' => 'h3',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 1;
  $pane->locks = array();
  $pane->uuid = '4883355f-a17e-45b0-8108-5983f5f63cba';
  $display->content['new-4883355f-a17e-45b0-8108-5983f5f63cba'] = $pane;
  $display->panels['middle-bottom-right'][1] = 'new-4883355f-a17e-45b0-8108-5983f5f63cba';
  $pane = new stdClass();
  $pane->pid = 'new-ad18dbfc-2327-4da0-8f46-2c1032841d74';
  $pane->panel = 'middle-bottom-right';
  $pane->type = 'node_terms';
  $pane->subtype = 'node_terms';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'vid' => '0',
    'term_format' => 'term-links',
    'link' => 1,
    'term_delimiter' => ', ',
    'context' => 'argument_entity_id:node_1',
    'override_title' => 1,
    'override_title_text' => 'article tags',
    'override_title_heading' => 'h3',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 2;
  $pane->locks = array();
  $pane->uuid = 'ad18dbfc-2327-4da0-8f46-2c1032841d74';
  $display->content['new-ad18dbfc-2327-4da0-8f46-2c1032841d74'] = $pane;
  $display->panels['middle-bottom-right'][2] = 'new-ad18dbfc-2327-4da0-8f46-2c1032841d74';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = 'new-480df0aa-1301-46ac-8c6a-c8902eff5c65';
  $handler->conf['display'] = $display;
  $export['node_view__panel_context_3e674d82-53cb-4e2e-adec-45fe0237c4a4'] = $handler;

  $handler = new stdClass();
  $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
  $handler->api_version = 1;
  $handler->name = 'term_view__panel_context_924b7f3e-6e77-4005-affa-84e0acc80a38';
  $handler->task = 'term_view';
  $handler->subtask = '';
  $handler->handler = 'panel_context';
  $handler->weight = 0;
  $handler->conf = array(
    'title' => 'Blog Tags',
    'no_blocks' => 0,
    'pipeline' => 'ipe',
    'body_classes_to_remove' => '',
    'body_classes_to_add' => '',
    'css_id' => '',
    'css' => '',
    'contexts' => array(),
    'relationships' => array(),
    'name' => '',
  );
  $display = new panels_display();
  $display->layout = 'ntb_main';
  $display->layout_settings = array();
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'full-width' => NULL,
      'top' => NULL,
      'upper-left' => NULL,
      'upper-middle' => NULL,
      'upper-right' => NULL,
      'middle-left' => NULL,
      'middle-right' => NULL,
      'lower-left' => NULL,
      'lower-middle' => NULL,
      'lower-right' => NULL,
      'lower-bottom-left' => NULL,
      'lower-bottom-middle' => NULL,
      'lower-bottom-right' => NULL,
      'bottom-left' => NULL,
      'bottom-right' => NULL,
      'bottom' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = '';
  $display->uuid = 'c1a1157f-bca5-43b4-9c98-8586d3852d17';
  $display->storage_type = 'page_manager';
  $display->storage_id = 'term_view__panel_context_924b7f3e-6e77-4005-affa-84e0acc80a38';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-a556f3b0-4eca-40ee-9110-198a7c82cb93';
  $pane->panel = 'lower-middle';
  $pane->type = 'views';
  $pane->subtype = 'blog';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_pager_settings' => 0,
    'use_pager' => 1,
    'nodes_per_page' => '10',
    'pager_id' => '0',
    'offset' => '0',
    'more_link' => 0,
    'feed_icons' => 0,
    'panel_args' => 0,
    'link_to_view' => 0,
    'args' => '',
    'url' => '',
    'display' => 'block_1',
    'context' => array(
      0 => 'argument_term_1.tid',
    ),
    'override_title' => 0,
    'override_title_text' => '',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = 'a556f3b0-4eca-40ee-9110-198a7c82cb93';
  $display->content['new-a556f3b0-4eca-40ee-9110-198a7c82cb93'] = $pane;
  $display->panels['lower-middle'][0] = 'new-a556f3b0-4eca-40ee-9110-198a7c82cb93';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = 'new-a556f3b0-4eca-40ee-9110-198a7c82cb93';
  $handler->conf['display'] = $display;
  $export['term_view__panel_context_924b7f3e-6e77-4005-affa-84e0acc80a38'] = $handler;

  return $export;
}

/**
 * Implements hook_default_page_manager_pages().
 */
function site_general_default_page_manager_pages() {
  $page = new stdClass();
  $page->disabled = FALSE; /* Edit this to true to make a default page disabled initially */
  $page->api_version = 1;
  $page->name = 'blog';
  $page->task = 'page';
  $page->admin_title = 'Blog';
  $page->admin_description = '';
  $page->path = 'blog';
  $page->access = array();
  $page->menu = array(
    'type' => 'normal',
    'title' => 'Blog',
    'name' => 'main-menu',
    'weight' => '0',
    'parent' => array(
      'type' => 'none',
      'title' => '',
      'name' => 'navigation',
      'weight' => '0',
    ),
  );
  $page->arguments = array();
  $page->conf = array(
    'admin_paths' => FALSE,
  );
  $page->default_handlers = array();
  $handler = new stdClass();
  $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
  $handler->api_version = 1;
  $handler->name = 'page_blog__panel';
  $handler->task = 'page';
  $handler->subtask = 'blog';
  $handler->handler = 'panel_context';
  $handler->weight = 0;
  $handler->conf = array(
    'title' => 'Panel',
    'no_blocks' => 0,
    'pipeline' => 'standard',
    'body_classes_to_remove' => '',
    'body_classes_to_add' => '',
    'css_id' => '',
    'css' => '',
    'contexts' => array(),
    'relationships' => array(),
    'name' => 'panel',
  );
  $display = new panels_display();
  $display->layout = 'ntb_main';
  $display->layout_settings = array();
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'top' => NULL,
      'upper-left' => NULL,
      'upper-middle' => NULL,
      'upper-right' => NULL,
      'middle-left' => NULL,
      'middle-right' => NULL,
      'bottom' => NULL,
      'lower-left' => NULL,
      'lower-middle' => NULL,
      'lower-right' => NULL,
      'bottom-left' => NULL,
      'bottom-right' => NULL,
      'full-width' => NULL,
      'lower-bottom-left' => NULL,
      'lower-bottom-middle' => NULL,
      'lower-bottom-right' => NULL,
      'middle-bottom-left' => NULL,
      'middle-bottom-right' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = 'blog';
  $display->uuid = 'ca9ff854-4e5f-4d0d-8950-2e3d3403e0bc';
  $display->storage_type = 'page_manager';
  $display->storage_id = 'page_blog__panel';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-2e5cbfeb-bbd5-483b-a5ea-74129cd3c400';
  $pane->panel = 'middle-bottom-left';
  $pane->type = 'views';
  $pane->subtype = 'blog';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_pager_settings' => 0,
    'use_pager' => 1,
    'nodes_per_page' => '10',
    'pager_id' => '0',
    'offset' => '0',
    'more_link' => 0,
    'feed_icons' => 0,
    'panel_args' => 0,
    'link_to_view' => 0,
    'args' => '',
    'url' => '',
    'display' => 'default',
    'override_title' => 0,
    'override_title_text' => '',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '2e5cbfeb-bbd5-483b-a5ea-74129cd3c400';
  $display->content['new-2e5cbfeb-bbd5-483b-a5ea-74129cd3c400'] = $pane;
  $display->panels['middle-bottom-left'][0] = 'new-2e5cbfeb-bbd5-483b-a5ea-74129cd3c400';
  $pane = new stdClass();
  $pane->pid = 'new-e6bd6a5c-ebee-4db0-860f-410632295be1';
  $pane->panel = 'middle-bottom-right';
  $pane->type = 'views';
  $pane->subtype = 'tags';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_pager_settings' => 0,
    'use_pager' => 0,
    'nodes_per_page' => '0',
    'pager_id' => '0',
    'offset' => '0',
    'more_link' => 0,
    'feed_icons' => 0,
    'panel_args' => 0,
    'link_to_view' => 0,
    'args' => '',
    'url' => '',
    'display' => 'block_1',
    'override_title' => 1,
    'override_title_text' => '',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = 'e6bd6a5c-ebee-4db0-860f-410632295be1';
  $display->content['new-e6bd6a5c-ebee-4db0-860f-410632295be1'] = $pane;
  $display->panels['middle-bottom-right'][0] = 'new-e6bd6a5c-ebee-4db0-860f-410632295be1';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = '0';
  $handler->conf['display'] = $display;
  $page->default_handlers[$handler->name] = $handler;
  $pages['blog'] = $page;

  $page = new stdClass();
  $page->disabled = FALSE; /* Edit this to true to make a default page disabled initially */
  $page->api_version = 1;
  $page->name = 'front_page';
  $page->task = 'page';
  $page->admin_title = 'Front Page';
  $page->admin_description = '';
  $page->path = 'home';
  $page->access = array();
  $page->menu = array(
    'type' => 'none',
    'title' => '',
    'weight' => '0',
    'name' => 'navigation',
    'parent' => array(
      'type' => 'none',
      'title' => '',
      'weight' => 0,
      'name' => 'navigation',
    ),
  );
  $page->arguments = array();
  $page->conf = array(
    'admin_paths' => FALSE,
  );
  $page->default_handlers = array();
  $handler = new stdClass();
  $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
  $handler->api_version = 1;
  $handler->name = 'page_front_page__panel_context_8fbea702-280d-4749-b937-50d5a87be360';
  $handler->task = 'page';
  $handler->subtask = 'front_page';
  $handler->handler = 'panel_context';
  $handler->weight = 0;
  $handler->conf = array(
    'title' => 'Landing page',
    'no_blocks' => FALSE,
    'pipeline' => 'ipe',
    'body_classes_to_remove' => '',
    'body_classes_to_add' => '',
    'css_id' => '',
    'css' => '',
    'contexts' => array(),
    'relationships' => array(),
    'name' => '',
    'metatag_panels' => array(
      'enabled' => 1,
      'metatags' => array(
        'title' => array(
          'value' => '[site:name] | socially responsible cosmetics',
        ),
        'canonical' => array(
          'value' => '[site:url]',
        ),
        'shortlink' => array(
          'value' => '',
        ),
        'og:url' => array(
          'value' => '[site:url]',
        ),
      ),
    ),
  );
  $display = new panels_display();
  $display->layout = 'ntb_main';
  $display->layout_settings = array();
  $display->panel_settings = array(
    'style_settings' => array(
      'default' => NULL,
      'top' => NULL,
      'left' => NULL,
      'middle' => NULL,
      'right' => NULL,
      'bottom' => NULL,
      'upper-left' => NULL,
      'upper-middle' => NULL,
      'upper-right' => NULL,
      'middle-left' => NULL,
      'middle-right' => NULL,
      'lower-left' => NULL,
      'lower-middle' => NULL,
      'lower-right' => NULL,
      'bottom-left' => NULL,
      'bottom-right' => NULL,
      'full-width' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = 'Front Page';
  $display->uuid = 'c83c6cbe-1af5-45c2-85ae-78120a10dbef';
  $display->storage_type = 'page_manager';
  $display->storage_id = 'page_front_page__panel_context_8fbea702-280d-4749-b937-50d5a87be360';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-835a10c4-daa7-4409-a33f-7279b092f4e1';
  $pane->panel = 'full-width';
  $pane->type = 'block';
  $pane->subtype = 'block-10';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => '',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array();
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '835a10c4-daa7-4409-a33f-7279b092f4e1';
  $display->content['new-835a10c4-daa7-4409-a33f-7279b092f4e1'] = $pane;
  $display->panels['full-width'][0] = 'new-835a10c4-daa7-4409-a33f-7279b092f4e1';
  $pane = new stdClass();
  $pane->pid = 'new-179a4ed8-a4e9-4334-925a-ea4a66c4990c';
  $pane->panel = 'lower-middle';
  $pane->type = 'block';
  $pane->subtype = 'ntb_top-ntb_top_3';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => 'winter favorites',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array();
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '179a4ed8-a4e9-4334-925a-ea4a66c4990c';
  $display->content['new-179a4ed8-a4e9-4334-925a-ea4a66c4990c'] = $pane;
  $display->panels['lower-middle'][0] = 'new-179a4ed8-a4e9-4334-925a-ea4a66c4990c';
  $pane = new stdClass();
  $pane->pid = 'new-a6285544-bb31-42d5-9875-a403654a3a3b';
  $pane->panel = 'lower-middle';
  $pane->type = 'block';
  $pane->subtype = 'instagram_block-instagram_block';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => 'nakedtruthbeauty',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 1;
  $pane->locks = array();
  $pane->uuid = 'a6285544-bb31-42d5-9875-a403654a3a3b';
  $display->content['new-a6285544-bb31-42d5-9875-a403654a3a3b'] = $pane;
  $display->panels['lower-middle'][1] = 'new-a6285544-bb31-42d5-9875-a403654a3a3b';
  $pane = new stdClass();
  $pane->pid = 'new-f0e27d82-4fbf-4efb-8235-0f3393ca9b9d';
  $pane->panel = 'top';
  $pane->type = 'block';
  $pane->subtype = 'block-1';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => '',
    'override_title_heading' => 'h2',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = 'f0e27d82-4fbf-4efb-8235-0f3393ca9b9d';
  $display->content['new-f0e27d82-4fbf-4efb-8235-0f3393ca9b9d'] = $pane;
  $display->panels['top'][0] = 'new-f0e27d82-4fbf-4efb-8235-0f3393ca9b9d';
  $display->hide_title = PANELS_TITLE_NONE;
  $display->title_pane = '0';
  $handler->conf['display'] = $display;
  $page->default_handlers[$handler->name] = $handler;
  $pages['front_page'] = $page;

  return $pages;

}
