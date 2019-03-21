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
  $page->access = array(
    'type' => 'none',
    'settings' => NULL,
  );
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
    ),
  );
  $display->cache = array();
  $display->title = 'shop';
  $display->uuid = 'f2226584-0746-4627-b4d8-64355198218a';
  $display->storage_type = 'page_manager';
  $display->storage_id = 'page_shop__panel_context_fa584574-6e39-4a4a-81d2-357236f9f62a';
  $display->content = array();
  $display->panels = array();
  $pane = new stdClass();
  $pane->pid = 'new-701ee71d-4212-4963-b6aa-14283284057a';
  $pane->panel = 'top';
  $pane->type = 'views';
  $pane->subtype = 'product_type_taxonomy';
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
    'display' => 'default',
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
  $pane->uuid = '701ee71d-4212-4963-b6aa-14283284057a';
  $display->content['new-701ee71d-4212-4963-b6aa-14283284057a'] = $pane;
  $display->panels['top'][0] = 'new-701ee71d-4212-4963-b6aa-14283284057a';
  $pane = new stdClass();
  $pane->pid = 'new-6057eec0-ac17-4871-bb3f-2ac145b69f10';
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
  $pane->position = 1;
  $pane->locks = array();
  $pane->uuid = '6057eec0-ac17-4871-bb3f-2ac145b69f10';
  $display->content['new-6057eec0-ac17-4871-bb3f-2ac145b69f10'] = $pane;
  $display->panels['top'][1] = 'new-6057eec0-ac17-4871-bb3f-2ac145b69f10';
  $display->hide_title = PANELS_TITLE_FIXED;
  $display->title_pane = '0';
  $handler->conf['display'] = $display;
  $page->default_handlers[$handler->name] = $handler;
  $pages['shop'] = $page;

  return $pages;

}
