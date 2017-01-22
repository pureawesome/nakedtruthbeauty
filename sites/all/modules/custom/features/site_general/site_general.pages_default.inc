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
    'pipeline' => 'standard',
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
  $display->storage_id = 'node_view__panel_context_3e674d82-53cb-4e2e-adec-45fe0237c4a4';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-d6f9d076-6509-44e5-98dc-eec9dae3e0ec';
  $pane->panel = 'lower-left';
  $pane->type = 'views';
  $pane->subtype = 'blog_authored';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_pager_settings' => 0,
    'use_pager' => 0,
    'nodes_per_page' => '1',
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
  $pane->uuid = 'd6f9d076-6509-44e5-98dc-eec9dae3e0ec';
  $display->content['new-d6f9d076-6509-44e5-98dc-eec9dae3e0ec'] = $pane;
  $display->panels['lower-left'][0] = 'new-d6f9d076-6509-44e5-98dc-eec9dae3e0ec';
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
  $pane = new stdClass();
  $pane->pid = 'new-ad18dbfc-2327-4da0-8f46-2c1032841d74';
  $pane->panel = 'lower-right';
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
  $pane->uuid = 'ad18dbfc-2327-4da0-8f46-2c1032841d74';
  $display->content['new-ad18dbfc-2327-4da0-8f46-2c1032841d74'] = $pane;
  $display->panels['lower-right'][0] = 'new-ad18dbfc-2327-4da0-8f46-2c1032841d74';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = 'new-480df0aa-1301-46ac-8c6a-c8902eff5c65';
  $handler->conf['display'] = $display;
  $export['node_view__panel_context_3e674d82-53cb-4e2e-adec-45fe0237c4a4'] = $handler;

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
  $pane->pid = 'new-67bfa194-91f3-4339-9ef5-94f757d3c358';
  $pane->panel = 'lower-left';
  $pane->type = 'block';
  $pane->subtype = 'instagram_block-instagram_block';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => 'nakedtruthbeauty',
    'override_title_heading' => 'h5',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '67bfa194-91f3-4339-9ef5-94f757d3c358';
  $display->content['new-67bfa194-91f3-4339-9ef5-94f757d3c358'] = $pane;
  $display->panels['lower-left'][0] = 'new-67bfa194-91f3-4339-9ef5-94f757d3c358';
  $pane = new stdClass();
  $pane->pid = 'new-2e5cbfeb-bbd5-483b-a5ea-74129cd3c400';
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
  $display->panels['lower-middle'][0] = 'new-2e5cbfeb-bbd5-483b-a5ea-74129cd3c400';
  $pane = new stdClass();
  $pane->pid = 'new-5bf40376-7624-4e92-bee5-37f34869720f';
  $pane->panel = 'lower-right';
  $pane->type = 'block';
  $pane->subtype = 'block-4';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => 'NkdTruthBeauty',
    'override_title_heading' => 'h5',
  );
  $pane->cache = array();
  $pane->style = array(
    'settings' => NULL,
  );
  $pane->css = array();
  $pane->extras = array();
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = '5bf40376-7624-4e92-bee5-37f34869720f';
  $display->content['new-5bf40376-7624-4e92-bee5-37f34869720f'] = $pane;
  $display->panels['lower-right'][0] = 'new-5bf40376-7624-4e92-bee5-37f34869720f';
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
  $pane->pid = 'new-d61dedd9-9a81-49bb-bd29-c93dc19a6cdb';
  $pane->panel = 'bottom-left';
  $pane->type = 'block';
  $pane->subtype = 'block-4';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_title' => 1,
    'override_title_text' => 'NkdTruthBeauty',
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
  $pane->uuid = 'd61dedd9-9a81-49bb-bd29-c93dc19a6cdb';
  $display->content['new-d61dedd9-9a81-49bb-bd29-c93dc19a6cdb'] = $pane;
  $display->panels['bottom-left'][0] = 'new-d61dedd9-9a81-49bb-bd29-c93dc19a6cdb';
  $pane = new stdClass();
  $pane->pid = 'new-a6285544-bb31-42d5-9875-a403654a3a3b';
  $pane->panel = 'bottom-right';
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
  $pane->position = 0;
  $pane->locks = array();
  $pane->uuid = 'a6285544-bb31-42d5-9875-a403654a3a3b';
  $display->content['new-a6285544-bb31-42d5-9875-a403654a3a3b'] = $pane;
  $display->panels['bottom-right'][0] = 'new-a6285544-bb31-42d5-9875-a403654a3a3b';
  $pane = new stdClass();
  $pane->pid = 'new-5c210380-bc90-489c-b426-9abb3456426e';
  $pane->panel = 'full-width';
  $pane->type = 'views';
  $pane->subtype = 'marquee';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_pager_settings' => 0,
    'use_pager' => 1,
    'nodes_per_page' => '0',
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
  $pane->uuid = '5c210380-bc90-489c-b426-9abb3456426e';
  $display->content['new-5c210380-bc90-489c-b426-9abb3456426e'] = $pane;
  $display->panels['full-width'][0] = 'new-5c210380-bc90-489c-b426-9abb3456426e';
  $pane = new stdClass();
  $pane->pid = 'new-8d886347-1326-48d3-b158-46f228e0c7f5';
  $pane->panel = 'lower-middle';
  $pane->type = 'block';
  $pane->subtype = 'block-5';
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
  $pane->uuid = '8d886347-1326-48d3-b158-46f228e0c7f5';
  $display->content['new-8d886347-1326-48d3-b158-46f228e0c7f5'] = $pane;
  $display->panels['lower-middle'][0] = 'new-8d886347-1326-48d3-b158-46f228e0c7f5';
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
  $pane = new stdClass();
  $pane->pid = 'new-db329443-c4e5-48d2-91ff-986534b28036';
  $pane->panel = 'upper-left';
  $pane->type = 'views';
  $pane->subtype = 'front_tiles';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_pager_settings' => 0,
    'use_pager' => 0,
    'nodes_per_page' => '1',
    'pager_id' => '0',
    'offset' => '0',
    'more_link' => 0,
    'feed_icons' => 0,
    'panel_args' => 0,
    'link_to_view' => 0,
    'args' => '',
    'url' => '',
    'display' => 'block_1',
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
  $pane->uuid = 'db329443-c4e5-48d2-91ff-986534b28036';
  $display->content['new-db329443-c4e5-48d2-91ff-986534b28036'] = $pane;
  $display->panels['upper-left'][0] = 'new-db329443-c4e5-48d2-91ff-986534b28036';
  $pane = new stdClass();
  $pane->pid = 'new-2668a037-0d46-40f8-b213-8bbdef059dcb';
  $pane->panel = 'upper-middle';
  $pane->type = 'views';
  $pane->subtype = 'front_tiles';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_pager_settings' => 0,
    'use_pager' => 0,
    'nodes_per_page' => '1',
    'pager_id' => '0',
    'offset' => '0',
    'more_link' => 0,
    'feed_icons' => 0,
    'panel_args' => 0,
    'link_to_view' => 0,
    'args' => '',
    'url' => '',
    'display' => 'front_tile_ingredient',
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
  $pane->uuid = '2668a037-0d46-40f8-b213-8bbdef059dcb';
  $display->content['new-2668a037-0d46-40f8-b213-8bbdef059dcb'] = $pane;
  $display->panels['upper-middle'][0] = 'new-2668a037-0d46-40f8-b213-8bbdef059dcb';
  $pane = new stdClass();
  $pane->pid = 'new-24f2ea61-92e1-4fc5-b77b-294044531ad4';
  $pane->panel = 'upper-right';
  $pane->type = 'views';
  $pane->subtype = 'front_tiles';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_pager_settings' => 0,
    'use_pager' => 0,
    'nodes_per_page' => '1',
    'pager_id' => '0',
    'offset' => '0',
    'more_link' => 0,
    'feed_icons' => 0,
    'panel_args' => 0,
    'link_to_view' => 0,
    'args' => '',
    'url' => '',
    'display' => 'front_tile_article',
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
  $pane->uuid = '24f2ea61-92e1-4fc5-b77b-294044531ad4';
  $display->content['new-24f2ea61-92e1-4fc5-b77b-294044531ad4'] = $pane;
  $display->panels['upper-right'][0] = 'new-24f2ea61-92e1-4fc5-b77b-294044531ad4';
  $display->hide_title = PANELS_TITLE_NONE;
  $display->title_pane = 'new-5c210380-bc90-489c-b426-9abb3456426e';
  $handler->conf['display'] = $display;
  $page->default_handlers[$handler->name] = $handler;
  $pages['front_page'] = $page;

  return $pages;

}