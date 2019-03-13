<?php

/**
 * @file
 * site_ingredients.pages_default.inc
 */

/**
 * Implements hook_default_page_manager_pages().
 */
function site_ingredients_default_page_manager_pages() {
  $page = new stdClass();
  $page->disabled = FALSE; /* Edit this to true to make a default page disabled initially */
  $page->api_version = 1;
  $page->name = 'ingredients';
  $page->task = 'page';
  $page->admin_title = 'Ingredients';
  $page->admin_description = '';
  $page->path = 'ingredients';
  $page->access = array(
    'type' => 'none',
    'settings' => NULL,
  );
  $page->menu = array(
    'type' => 'normal',
    'title' => 'Ingredients',
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
  $handler->name = 'page_ingredients__panel';
  $handler->task = 'page';
  $handler->subtask = 'ingredients';
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
      'lower-left' => NULL,
      'lower-middle' => NULL,
      'lower-right' => NULL,
      'bottom-left' => NULL,
      'bottom-right' => NULL,
      'bottom' => NULL,
    ),
  );
  $display->cache = array();
  $display->title = 'ingredients';
  $display->uuid = '15c7e1ab-45c9-46f5-8469-5a06980037ba';
  $display->storage_type = 'page_manager';
  $display->storage_id = 'page_ingredients__panel';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-a580a4e7-48ad-4412-9eaf-e6fb3b65c6a4';
  $pane->panel = 'bottom';
  $pane->type = 'views';
  $pane->subtype = 'ingredients';
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
    'display' => 'block',
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
  $pane->uuid = 'a580a4e7-48ad-4412-9eaf-e6fb3b65c6a4';
  $display->content['new-a580a4e7-48ad-4412-9eaf-e6fb3b65c6a4'] = $pane;
  $display->panels['bottom'][0] = 'new-a580a4e7-48ad-4412-9eaf-e6fb3b65c6a4';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = 'new-a580a4e7-48ad-4412-9eaf-e6fb3b65c6a4';
  $handler->conf['display'] = $display;
  $page->default_handlers[$handler->name] = $handler;
  $pages['ingredients'] = $page;

  return $pages;

}
