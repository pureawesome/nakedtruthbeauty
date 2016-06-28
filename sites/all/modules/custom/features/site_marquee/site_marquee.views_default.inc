<?php
/**
 * @file
 * site_marquee.views_default.inc
 */

/**
 * Implements hook_views_default_views().
 */
function site_marquee_views_default_views() {
  $export = array();

  $view = new view();
  $view->name = 'marquee';
  $view->description = '';
  $view->tag = 'default';
  $view->base_table = 'node';
  $view->human_name = 'Marquee';
  $view->core = 7;
  $view->api_version = '3.0';
  $view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

  /* Display: Master */
  $handler = $view->new_display('default', 'Master', 'default');
  $handler->display->display_options['use_more_always'] = FALSE;
  $handler->display->display_options['access']['type'] = 'perm';
  $handler->display->display_options['cache']['type'] = 'none';
  $handler->display->display_options['query']['type'] = 'views_query';
  $handler->display->display_options['exposed_form']['type'] = 'basic';
  $handler->display->display_options['pager']['type'] = 'some';
  $handler->display->display_options['pager']['options']['items_per_page'] = '5';
  $handler->display->display_options['pager']['options']['offset'] = '0';
  $handler->display->display_options['style_plugin'] = 'flexslider';
  $handler->display->display_options['row_plugin'] = 'entity';
  $handler->display->display_options['row_options']['view_mode'] = 'slider';
  /* Field: Content: Marquee Image */
  $handler->display->display_options['fields']['field_marquee_image']['id'] = 'field_marquee_image';
  $handler->display->display_options['fields']['field_marquee_image']['table'] = 'field_data_field_marquee_image';
  $handler->display->display_options['fields']['field_marquee_image']['field'] = 'field_marquee_image';
  $handler->display->display_options['fields']['field_marquee_image']['label'] = '';
  $handler->display->display_options['fields']['field_marquee_image']['exclude'] = TRUE;
  $handler->display->display_options['fields']['field_marquee_image']['element_label_colon'] = FALSE;
  $handler->display->display_options['fields']['field_marquee_image']['click_sort_column'] = 'fid';
  $handler->display->display_options['fields']['field_marquee_image']['settings'] = array(
    'image_style' => 'marquee_large',
    'image_link' => '',
  );
  /* Field: Content: Marquee Link */
  $handler->display->display_options['fields']['field_marquee_link']['id'] = 'field_marquee_link';
  $handler->display->display_options['fields']['field_marquee_link']['table'] = 'field_data_field_marquee_link';
  $handler->display->display_options['fields']['field_marquee_link']['field'] = 'field_marquee_link';
  $handler->display->display_options['fields']['field_marquee_link']['label'] = '';
  $handler->display->display_options['fields']['field_marquee_link']['alter']['alter_text'] = TRUE;
  $handler->display->display_options['fields']['field_marquee_link']['alter']['text'] = '[field_marquee_image]';
  $handler->display->display_options['fields']['field_marquee_link']['alter']['make_link'] = TRUE;
  $handler->display->display_options['fields']['field_marquee_link']['alter']['path'] = '[field_marquee_link]';
  $handler->display->display_options['fields']['field_marquee_link']['element_label_colon'] = FALSE;
  /* Sort criterion: Content: Post date */
  $handler->display->display_options['sorts']['created']['id'] = 'created';
  $handler->display->display_options['sorts']['created']['table'] = 'node';
  $handler->display->display_options['sorts']['created']['field'] = 'created';
  $handler->display->display_options['sorts']['created']['order'] = 'DESC';
  /* Filter criterion: Content: Published */
  $handler->display->display_options['filters']['status']['id'] = 'status';
  $handler->display->display_options['filters']['status']['table'] = 'node';
  $handler->display->display_options['filters']['status']['field'] = 'status';
  $handler->display->display_options['filters']['status']['value'] = 1;
  $handler->display->display_options['filters']['status']['group'] = 1;
  $handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
  /* Filter criterion: Content: Type */
  $handler->display->display_options['filters']['type']['id'] = 'type';
  $handler->display->display_options['filters']['type']['table'] = 'node';
  $handler->display->display_options['filters']['type']['field'] = 'type';
  $handler->display->display_options['filters']['type']['value'] = array(
    'marquee' => 'marquee',
  );
  $export['marquee'] = $view;

  return $export;
}
