<?php

/**
 * Implements hook_preprocess_HOOK().
 */
function ntb_preprocess_page(&$vars) {
  drupal_add_js(libraries_get_path('bootstrap') . '/js/bootstrap.min.js');

  $vars['main_menu_output'] = theme(
    'links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'id' => 'main-menu',
        'class' => array(
          'links', 'inline', 'clearfix', 'nav', 'navbar-nav',
        ),
      ),
    )
  );

  $secondary_classes = array(
    'links', 'inline', 'clearfix', 'nav', 'navbar-nav', 'secondary-menu',
  );

  if (!$vars['logged_in']) {
    $links[] = array(
      'href'  => '/user',
      'title' => t('Log In'),
    );

    $vars['secondary_menu_output'] = theme_links(array(
      'links' => $links,
      'attributes' => array(
        'id' => 'secondary-menu',
        'class' => $secondary_classes,
      ),
      'heading' => array(),
    ));

    $vars['secondary_menu_top'] = theme_links(array(
      'links' => $links,
      'attributes' => array(
        'id' => 'secondary-menu-top',
        'class' => $secondary_classes,
      ),
      'heading' => array(),
    ));
  }
  else {
    $vars['secondary_menu_output'] = theme(
      'links__system_secondary_menu', array(
        'links' => $vars['secondary_menu'],
        'attributes' => array(
          'id' => 'secondary-menu',
          'class' => $secondary_classes,
        ),
      )
    );

    $vars['secondary_menu_top'] = theme(
      'links__system_secondary_menu', array(
        'links' => $vars['secondary_menu'],
        'attributes' => array(
          'id' => 'secondary-menu-top',
          'class' => $secondary_classes,
        ),
      )
    );
  }
}
