<?php

/**
 * Implements hook_theme().
 */
function ntb_theme() {
  $items['search'] = array(
    'template' => 'templates/misc/search',
  );
  return $items;
}

/**
 * Implements hook_preprocess_HOOK().
 */
function ntb_preprocess_page(&$vars) {
  $ntb_css = drupal_get_path('theme', 'ntb') . '/css/ntb.css?v=1.01';
  $preload_css = array(
    '#type' => 'markup',
    '#markup' => '<link rel="preload" href="/' . $ntb_css . '" as="style" onload="this.rel=\'stylesheet\'">',
  );

  $noscript_css = array(
    '#type' => 'markup',
    '#markup' => '<noscript><link rel="stylesheet" href="/' . $ntb_css . '"></noscript>',
  );

  drupal_add_html_head($preload_css, 'preload_css');
  drupal_add_html_head($noscript_css, 'noscript_css');
  drupal_add_library('ntb', 'ntb');

  // Get the entire main menu tree.
  $vars['main_menu_output'] = menu_tree_output(menu_tree_all_data('main-menu'));

  // Custom split templates.
  $vars['search'] = theme('search');

  $secondary_classes = [
    'links', 'inline', 'clearfix', 'nav', 'navbar-nav', 'secondary-menu',
  ];

  $secondary_dropdown = ['dropdown-menu', 'dropdown-menu-right'];

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

    $vars['secondary_menu_dropdown'] = theme_links(array(
      'links' => $links,
      'attributes' => array(
        'id' => 'secondary-menu-dropdown',
        'class' => $secondary_dropdown,
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

    $vars['secondary_menu_dropdown'] = theme(
      'links__system_secondary_menu', array(
        'links' => $vars['secondary_menu'],
        'attributes' => array(
          'id' => 'secondary-dropdown',
          'class' => $secondary_dropdown,
          'aria-labelledby' => 'userMenu',
        ),
      )
    );
  }
}

/**
 * Implements THEMENAME_menu_tree__MENU_NAME()().
 */
function ntb_menu_tree__main_menu($variables) {
  return '<ul class="links inline clearfix nav navbar-nav">' . $variables['tree'] . '</ul>';
}

/**
 * Implements THEMENAME_menu_link__MENU_NAME()().
 */
function ntb_menu_link__main_menu($variables) {
  $element = $variables['element'];
  $sub_menu = '';

  if ($element['#below']) {
    // Prevent dropdown functions from being added to management menu so it
    // does not affect the navbar module.
    if (($element['#original_link']['menu_name'] == 'management') && (module_exists('navbar'))) {
      $sub_menu = drupal_render($element['#below']);
    }
    elseif ((!empty($element['#original_link']['depth'])) && $element['#original_link']['depth'] > 1) {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
      $element['#attributes']['class'][] = 'dropdown-submenu';
      $element['#localized_options']['html'] = TRUE;
      $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    }
    else {
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
      $element['#title'] .= ' <i class="fa fa-angle-down"></i>';
      $element['#attributes']['class'][] = 'dropdown';
      $element['#localized_options']['html'] = TRUE;
      $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    }
  }
  if (($element['#href'] == $_GET['q'] || ($element['#href'] == '<front>' && drupal_is_front_page())) && (empty($element['#localized_options']['language']))) {
    $element['#attributes']['class'][] = 'active';
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Implements hook_library().
 */
function ntb_library() {
  $libraries['bootstrap_tabs'] = array(
    'title' => 'Bootstrap Tabs',
    'version' => '3.3.6',
    'js' => array(
      libraries_get_path('bootstrap') . '/js/lib/tab.min.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
    ),
  );

  $libraries['bootstrap_dropdown'] = array(
    'title' => 'Bootstrap ',
    'version' => '3.3.6',
    'js' => array(
      libraries_get_path('bootstrap') . '/js/lib/dropdown.min.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
    ),
  );

  $libraries['bootstrap_collapse'] = array(
    'title' => 'Bootstrap ',
    'version' => '3.3.6',
    'js' => array(
      libraries_get_path('bootstrap') . '/js/lib/collapse.min.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
    ),
  );

  $libraries['loadcss'] = array(
    'title' => 'loadCSS',
    'version' => '1.3.1',
    'js' => array(
      libraries_get_path('node_modules') . '/fg-loadcss/src/loadCSS.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
      libraries_get_path('node_modules') . '/fg-loadcss/src/cssrelpreload.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
    ),
  );

  $critical_css = file_get_contents(drupal_get_path('theme', 'ntb') . '/css/critical/ntb_critical.css');

  $libraries['ntb'] = array(
    'title' => 'NTB',
    'version' => '1.2',
    'js' => array(
      drupal_get_path('theme', 'ntb') . '/js/ntb.behaviors.min.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
    ),
    'css' => array(
      $critical_css => array(
        'group' => CSS_THEME,
        'every_page' => TRUE,
        'preprocess' => FALSE,
        'type' => 'inline',
      ),
    ),
    'dependencies' => [
      ['ntb', 'bootstrap_collapse'],
      ['ntb', 'bootstrap_dropdown'],
      ['ntb', 'modernizr'],
      ['ntb', 'loadcss'],
    ],
  );

  $libraries['modernizr'] = array(
    'title' => 'Modernizr ',
    'version' => '2.3.8',
    'js' => array(
      libraries_get_path('modernizr') . '/modernizr-2.8.3.min.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
    ),
  );

  return $libraries;
}

/**
 * Implements hook_js_alter().
 */
function ntb_js_alter(&$javascript) {
  foreach ($javascript as $key => &$script) {
    if ($script['scope'] == 'header') {
      $script['scope'] = 'footer';
      $script['defer'] = TRUE;
    }
  }
}
