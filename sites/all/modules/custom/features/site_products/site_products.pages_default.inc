<?php
/**
 * @file
 * site_products.pages_default.inc
 */

/**
 * Implements hook_default_page_manager_pages().
 */
function site_products_default_page_manager_pages() {
  $page = new stdClass();
  $page->disabled = FALSE; /* Edit this to true to make a default page disabled initially */
  $page->api_version = 1;
  $page->name = 'shop';
  $page->task = 'page';
  $page->admin_title = 'Shop';
  $page->admin_description = '';
  $page->path = 'shop';
  $page->access = array();
  $page->menu = array(
    'type' => 'normal',
    'title' => 'Shop',
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
  $page->conf = array();
  $page->default_handlers = array();
  $handler = new stdClass();
  $handler->disabled = FALSE; /* Edit this to true to make a default handler disabled initially */
  $handler->api_version = 1;
  $handler->name = 'page_shop__panel_context_fa584574-6e39-4a4a-81d2-357236f9f62a';
  $handler->task = 'page';
  $handler->subtask = 'shop';
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
    ),
  );
  $display->cache = array();
  $display->title = 'Shop';
  $display->uuid = 'f2226584-0746-4627-b4d8-64355198218a';
  $display->content = array();
  $display->panels = array();
    $pane = new stdClass();
    $pane->pid = 'new-b0eac843-cc2f-4328-b4fc-6afd75a5fff1';
    $pane->panel = 'top';
    $pane->type = 'views';
    $pane->subtype = 'shop';
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
    $pane->uuid = 'b0eac843-cc2f-4328-b4fc-6afd75a5fff1';
    $display->content['new-b0eac843-cc2f-4328-b4fc-6afd75a5fff1'] = $pane;
    $display->panels['top'][0] = 'new-b0eac843-cc2f-4328-b4fc-6afd75a5fff1';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = 'new-b0eac843-cc2f-4328-b4fc-6afd75a5fff1';
  $handler->conf['display'] = $display;
  $page->default_handlers[$handler->name] = $handler;
  $pages['shop'] = $page;

  return $pages;

}
