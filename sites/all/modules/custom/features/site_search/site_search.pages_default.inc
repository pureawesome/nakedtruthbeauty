<?php
/**
 * @file
 * site_search.pages_default.inc
 */

/**
 * Implements hook_default_page_manager_pages().
 */
function site_search_default_page_manager_pages() {
  $page = new stdClass();
  $page->disabled = FALSE; /* Edit this to true to make a default page disabled initially */
  $page->api_version = 1;
  $page->name = 'search';
  $page->task = 'page';
  $page->admin_title = 'Search';
  $page->admin_description = '';
  $page->path = 'search';
  $page->access = array();
  $page->menu = array();
  $page->arguments = array();
  $page->conf = array(
    'admin_paths' => FALSE,
  );
  $page->default_handlers = array();
  $handler = new stdClass();
  $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
  $handler->api_version = 1;
  $handler->name = 'page_search__panel';
  $handler->task = 'page';
  $handler->subtask = 'search';
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
  $display->title = 'Search Results';
  $display->uuid = '2395854d-5a7a-4e95-8421-5f42e3963ea8';
  $display->storage_type = 'page_manager';
  $display->storage_id = 'page_search__panel';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-76b030c2-7e78-4006-9716-f8fb443825d3';
  $pane->panel = 'lower-middle';
  $pane->type = 'views';
  $pane->subtype = 'search';
  $pane->shown = TRUE;
  $pane->access = array();
  $pane->configuration = array(
    'override_pager_settings' => 0,
    'use_pager' => 0,
    'nodes_per_page' => '10',
    'pager_id' => '0',
    'offset' => '0',
    'more_link' => 0,
    'feed_icons' => 0,
    'panel_args' => 0,
    'link_to_view' => 0,
    'args' => '',
    'url' => '',
    'display' => 'block',
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
  $pane->uuid = '76b030c2-7e78-4006-9716-f8fb443825d3';
  $display->content['new-76b030c2-7e78-4006-9716-f8fb443825d3'] = $pane;
  $display->panels['lower-middle'][0] = 'new-76b030c2-7e78-4006-9716-f8fb443825d3';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = '0';
  $handler->conf['display'] = $display;
  $page->default_handlers[$handler->name] = $handler;
  $pages['search'] = $page;

  return $pages;

}
