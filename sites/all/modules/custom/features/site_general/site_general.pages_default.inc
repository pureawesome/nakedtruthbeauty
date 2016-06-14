<?php
/**
 * @file
 * site_general.pages_default.inc
 */

/**
 * Implements hook_default_page_manager_pages().
 */
function site_general_default_page_manager_pages() {
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
    ),
  );
  $display->cache = array();
  $display->title = 'Front Page';
  $display->uuid = 'c83c6cbe-1af5-45c2-85ae-78120a10dbef';
  $display->content = array();
  $display->panels = array();
    $pane = new stdClass();
    $pane->pid = 'new-5c210380-bc90-489c-b426-9abb3456426e';
    $pane->panel = 'top';
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
    $display->panels['top'][0] = 'new-5c210380-bc90-489c-b426-9abb3456426e';
    $pane = new stdClass();
    $pane->pid = 'new-6e807fcc-5d69-43b3-86dd-a2d49a1d2732';
    $pane->panel = 'top';
    $pane->type = 'block';
    $pane->subtype = 'block-2';
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
    $pane->position = 1;
    $pane->locks = array();
    $pane->uuid = '6e807fcc-5d69-43b3-86dd-a2d49a1d2732';
    $display->content['new-6e807fcc-5d69-43b3-86dd-a2d49a1d2732'] = $pane;
    $display->panels['top'][1] = 'new-6e807fcc-5d69-43b3-86dd-a2d49a1d2732';
    $pane = new stdClass();
    $pane->pid = 'new-f4fa07e5-5006-4268-a2f1-4d7c499e7151';
    $pane->panel = 'top';
    $pane->type = 'block';
    $pane->subtype = 'block-1';
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
    $pane->position = 2;
    $pane->locks = array();
    $pane->uuid = 'f4fa07e5-5006-4268-a2f1-4d7c499e7151';
    $display->content['new-f4fa07e5-5006-4268-a2f1-4d7c499e7151'] = $pane;
    $display->panels['top'][2] = 'new-f4fa07e5-5006-4268-a2f1-4d7c499e7151';
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
