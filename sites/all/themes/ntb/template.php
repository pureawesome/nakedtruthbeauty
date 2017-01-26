<?php

/**
 * Implements hook_preprocess_HOOK().
 */
function ntb_preprocess_page(&$vars) {
  drupal_add_library('ntb', 'bootstrap');
  drupal_add_library('ntb', 'ntb');

  // Get the entire main menu tree
  $vars['main_menu_output'] = menu_tree_output(menu_tree_all_data('main-menu'));

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
    } elseif ((!empty($element['#original_link']['depth'])) && $element['#original_link']['depth'] > 1) {
      // Add our own wrapper.
      unset($element['#below']['#theme_wrappers']);
      $sub_menu = '<ul class="dropdown-menu">' . drupal_render($element['#below']) . '</ul>';
      $element['#attributes']['class'][] = 'dropdown-submenu';
      $element['#localized_options']['html'] = TRUE;
      $element['#localized_options']['attributes']['class'][] = 'dropdown-toggle';
      $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    } else {
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
  $libraries['bootstrap'] = array(
    'title' => 'Bootstrap JS',
    'website' => 'http://getbootstrap.com/',
    'version' => '3.3.6',
    'js' => array(
      libraries_get_path('bootstrap') . '/js/bootstrap.min.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
    ),
  );
  $libraries['ntb'] = array(
    'title' => 'NTB Behaviors',
    'version' => '1.0',
    'js' => array(
      drupal_get_path('theme', 'ntb') . '/js/ntb.behaviors.js' => array(
        'defer' => TRUE,
        'scope' => 'footer',
      ),
    ),
  );
  return $libraries;
}
