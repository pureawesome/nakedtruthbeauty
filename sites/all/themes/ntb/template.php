<?php

define('CSS_VERSION', '1.02');

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
  $ntb_css = drupal_get_path('theme', 'ntb') . '/css/ntb.css?v=' . CSS_VERSION;

  $noscript = array(
    '#theme' => 'html_tag',
    '#tag' => 'link',
    '#attributes' => array(
      'rel' => 'stylesheet',
      'type' => 'text/css',
      'href' => '/' . $ntb_css,
    ),
  );

  $noscript_wrapper = array(
    '#theme' => 'html_tag',
    '#tag' => 'noscript',
    '#value' => drupal_render($noscript),
  );

  drupal_add_html_head($noscript_wrapper, 'noscript');

  $preload_fonts = [
    'quicksand-regular-webfont.woff2',
    'fontawesome-webfont.woff2?v=4.6.3',
    'quicksand-bold-webfont.woff2',
    'have_heart_one-webfont.woff2',
  ];

  $theme_path = drupal_get_path('theme', 'ntb');

  foreach ($preload_fonts as $font) {
    $attributes = [
      'rel' => 'preload',
      'href' => '/' . $theme_path . '/fonts/' . $font,
      'as' => 'font',
      'crossorigin' => 'anonymous',
    ];
    drupal_add_html_head_link($attributes);
  }

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
 * Implements THEMENAME_menu_tree__MENU_NAME().
 */
function ntb_menu_tree__main_menu($variables) {
  return '<ul class="links inline clearfix nav navbar-nav">' . $variables['tree'] . '</ul>';
}

/**
 * Implements THEMENAME_menu_link__MENU_NAME().
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
    'version' => '4.0.0-beta.2',
    'js' => array(
      libraries_get_path('bootstrap') . '/js/dist/tab.min.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
    ),
  );

  $libraries['bootstrap_tooltip'] = array(
    'title' => 'Bootstrap ',
    'version' => '4.0.0-beta.2',
    'js' => array(
      libraries_get_path('bootstrap') . '/js/dist/tooltip.min.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
    ),
  );

  $libraries['bootstrap_dropdown'] = array(
    'title' => 'Bootstrap ',
    'version' => '4.0.0-beta.2',
    'js' => array(
      libraries_get_path('bootstrap') . '/js/dist/dropdown.min.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
    ),
    'dependencies' => [
      ['ntb', 'boostrap_tooltip'],
    ],
  );

  $libraries['bootstrap_collapse'] = array(
    'title' => 'Bootstrap ',
    'version' => '4.0.0-beta.2',
    'js' => array(
      libraries_get_path('bootstrap') . '/js/dist/collapse.min.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
    ),
  );

  $libraries['loadcss'] = array(
    'title' => 'loadCSS',
    'version' => '1.3.1',
    'js' => array(
      file_get_contents(libraries_get_path('node_modules') . '/fg-loadcss/src/loadCSS.min.js') => array(
        'type' => 'inline',
      ),
      file_get_contents(libraries_get_path('node_modules') . '/fg-loadcss/src/cssrelpreload.min.js') => array(
        'type' => 'inline',
      ),
    ),
  );


  $libraries['ntb'] = array(
    'title' => 'NTB',
    'version' => '1.2',
    'js' => array(
      drupal_get_path('theme', 'ntb') . '/js/ntb.behaviors.min.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
      'loadCSS("/' . drupal_get_path('theme', 'ntb') . '/css/ntb.css?v=' . CSS_VERSION . '");' => array(
        'type' => 'inline',
      ),
    ),
    'dependencies' => [
      // ['ntb', 'bootstrap_collapse'],
      // ['ntb', 'bootstrap_dropdown'],
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
 * Implements hook_preprcess_html().
 */
function ntb_preprocess_html(&$vars) {
  $critical = file_get_contents(drupal_get_path('theme', 'ntb') . '/css/critical/ntb_critical.css');
  $vars['critical'] = '<style type="text/css" media="all">' . $critical . '</style>';
}

/**
 * Implements hook_html_head_alter().
 */
function ntb_html_head_alter(&$head_elements) {
  unset($head_elements['system_meta_content_type']);
}

/**
 * Implements hook_js_alter().
 */
function ntb_js_alter(&$javascript) {
  foreach ($javascript as $key => &$script) {
    if ($script['scope'] == 'header' && $script['type'] != 'inline') {
      $script['scope'] = 'footer';
    }
  }
}
