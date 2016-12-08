<?php

/**
 * Implements hook_preprocess_HOOK().
 */
function ntb_preprocess_page(&$vars) {
  drupal_add_js(libraries_get_path('bootstrap') . '/js/bootstrap.min.js');

// xdebug_break();
  $tree_output_prepare = menu_tree_output(menu_tree_all_data('main-menu'));
  dpm($tree_output_prepare);
  $test1 = drupal_render($tree_output_prepare);
  $test2 = render($tree_output_prepare);
  dpm($test1);
  dpm($test2);
  // dpm(drupal_render($tree_output_prepare));
  // $vars['main_menu_output'] = drupal_render(menu_tree_output(menu_tree_all_data('main-menu')));
//   dpm(menu_tree_all_data('main-menu'));
// dpm($tree_output_prepare);
  $menu_tree = array(
    '#theme' => 'div',
    'title' => t('Discover our Other Networks:'),
    'content' => $tree_output_prepare,
    'attributes' => array(
      'id' => 'main-menu',
      'class' => array(
        'links', 'inline', 'clearfix', 'nav', 'navbar-nav',
      ),
    ),
  );
  dpm($menu_tree);
  $test3 = drupal_render($menu_tree);
  $test4 = render($menu_tree);
  dpm($test3);
  dpm($test4);
// $menu_main_tree = drupal_render($tree_output_prepare);
// dpm($menu_main_tree);
  $vars['main_menu_output'] = render($tree_output_prepare);

  $vars['main_menu_output'] = theme_links(array(
    'links' => $tree_output_prepare,
    'attributes' => array(
      'id' => 'main-menu',
      'class' => array(
        'links', 'inline', 'clearfix', 'nav', 'navbar-nav',
      ),
    ),
    'heading' => array(),
  ));

  // dpm($vars['main_menu']);

  // $vars['main_menu_output'] = theme(
  //   'links__system_main_menu', array(
  //     'links' => $vars['main_menu'],
  //     'attributes' => array(
  //       'id' => 'main-menu',
  //       'class' => array(
  //         'links', 'inline', 'clearfix', 'nav', 'navbar-nav',
  //       ),
  //     ),
  //   )
  // );
  dpm($vars);
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

function ntb_menu_tree($tree) {
  // dpm($tree);
  // return '<div class="test">' . $tree . '</div>';
}
