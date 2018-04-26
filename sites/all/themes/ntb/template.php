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
  $preload_fonts = [
    'quicksand-regular-webfont.woff2',
    'fontawesome-webfont.woff2?v=4.6.3',
    'quicksand-bold-webfont.woff2',
    'lato-bold-webfont.woff2',
    'lato-light-webfont.woff2',
    'lato-regular-webfont.woff2',
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

  $secondary_dropdown = ['dropdown-menu', 'dropdown-menu-right', 'nav'];

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
  return '<ul class="links clearfix nav navbar-nav primary-nav"><li class="more dropdown"><a href="#">Menu</a><ul class="dropdown-menu">' . $variables['tree'] . '</ul></li></ul>';
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
  $libraries['throttle.debounce'] = [
    'title' => 'Throttle Debounce',
    'version' => '1.1',
    'js' => [
      libraries_get_path('jquery-throttle-debounce') . '/jquery.ba-throttle-debounce.min.js' => [
        'defer' => TRUE,
        'scope' => 'footer',
      ],
    ],
  ];

  $libraries['loadcss'] = [
    'title' => 'loadCSS',
    'version' => '2.0.1',
    'js' => [
      file_get_contents(libraries_get_path('node_modules') . '/fg-loadcss/dist/cssrelpreload.min.js') => [
        'type' => 'inline',
      ],
    ],
  ];

  $libraries['ntb'] = [
    'title' => 'NTB',
    'version' => '1.3',
    'js' => [
      drupal_get_path('theme', 'ntb') . '/js/ntb.behaviors.min.js' => [
        'defer' => TRUE,
        'scope' => 'footer',
      ],
    ],
    'css' => [
      drupal_get_path('theme', 'ntb') . '/css/ntb.css?v=1.4' => [
        'weight' => 9999,
        'preprocess' => FALSE,
        'every_page' => TRUE,
        'group' => CSS_THEME,
      ],
      file_get_contents(drupal_get_path('theme', 'ntb') . '/css/ntb_critical.css') => [
        'type' => 'inline',
        'weight' => -9999,
        'preprocess' => FALSE,
        'every_page' => TRUE,
        'group' => CSS_SYSTEM,
      ],
    ],
    'dependencies' => [
      ['ntb', 'modernizr'],
      ['ntb', 'loadcss'],
      ['ntb', 'throttle.debounce'],
    ],
  ];

  $libraries['modernizr'] = [
    // Currently only touch
    'title' => 'Modernizr ',
    'version' => '2.3.8',
    'js' => [
      libraries_get_path('modernizr') . '/modernizr-2.8.3.min.js' => [
        'defer' => TRUE,
        'scope' => 'footer',
      ],
    ],
  ];

  return $libraries;
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

/**
 * Implements hook_element_info_alter().
 */
function ntb_element_info_alter(&$type) {
  if (!isset($type['styles']['#pre_render'])) {
    $type['styles']['#pre_render'] = [];
  }
  $type['styles']['#pre_render'][] = 'ntb_pre_render_styles';
}

function ntb_pre_render_styles($elements) {
  $children = [];
  foreach ($elements as $key => &$value) {
    if ($key !== '' && $key[0] === '#') {
      continue;
    }
    $children[$key] = &$value;
    unset($elements[$key]);
  }

  foreach ($elements['#groups'] as $key => $value) {
    if ($value['preprocess'] == FALSE) {
      foreach ($value['items'] as $_ => $item) {
        if ($item['type'] == 'inline') {
          $crit = [
            '#theme' => 'html_tag',
            '#tag' => 'style',
            '#value' => $item['data'],
            '#attributes' => [
              'type' => 'text/css',
            ],
          ];
          $elements[] = $crit;
        }
        else {
          [$preload, $noscript_wrapper] = ntb_make_lazy_css('/' . $item['data']);
          $elements[] = $preload;
          $elements[] = $noscript_wrapper;
        }
      }
    }
    else {
      $url = file_create_url($value['data']);
      $url = parse_url($url);
      [$preload, $noscript_wrapper] = ntb_make_lazy_css($url['path']);
      $elements[] = $preload;
      $elements[] = $noscript_wrapper;
    }
  }

  return $elements;
}

function ntb_make_lazy_css($url) {
  $preload = [
    '#theme' => 'html_tag',
    '#tag' => 'link',
    '#attributes' => [
      'rel' => 'preload',
      'as' => 'style',
      'href' => $url,
      'onload' => "this.onload=null;this.rel='stylesheet'",
    ],
  ];

  $noscript = [
    '#theme' => 'html_tag',
    '#tag' => 'link',
    '#attributes' => [
      'rel' => 'stylesheet',
      'type' => 'text/css',
      'href' => $url,
    ],
  ];

  $noscript_wrapper = [
    '#theme' => 'html_tag',
    '#tag' => 'noscript',
    '#value' => render($noscript),
  ];

  return [$preload, $noscript_wrapper];
}
