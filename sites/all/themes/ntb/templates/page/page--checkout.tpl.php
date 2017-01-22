<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

  <div id="page-wrapper">
    <div id="page">
      <nav class="navbar navbar-default navbar-fixed-top">
        <?php if ($main_menu || $secondary_menu): ?>
          <div>
            <div class="section container-fluid">
              <div class="icon-menu-fixed custom-user-menu">
                <button class="user-icon fa-icon" data-menu="secondary-menu">
                  <i class="fa fa-user"></i>
                  <span class="sr-only">My Account</span>
                </button>

                <div class="cart">
                  <a href="<?php print base_path(); ?>cart" class="cart-icon fa-icon">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="sr-only">Cart</span>
                  </a>
                  <?php if (isset($cart)): ?>
                    <?php print render($cart['content']); ?>
                  <?php endif; ?>
                </div>

                <div class="search-block">
                  <button class="search-toggle fa-icon">
                    <i class="fa fa-search"></i>
                    <span class="sr-only">Search Toggle</span>
                  </button>
                  <form class="navbar-form navbar-left pull-right navbar-search search-form" role="search">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                  </form>
                </div>
              </div><!-- end custom-user-menu -->

              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="h3 mobile-logo" href="<?php print $front_page; ?>">naked<span>truth</span></a>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="navbar-1">
                <?php print $main_menu_output; ?>

                <?php print $secondary_menu_output; ?>
              </div><!-- /.navbar-collapse -->
            </div>
          </div> <!-- /.section, /#navigation -->
        <?php endif; ?>
      </nav>

      <div id="header">
        <div class="section clearfix container-fluid">
          <div class="icon-menu custom-user-menu">
        <button class="user-icon fa-icon" data-menu="secondary-menu-top">
          <i class="fa fa-user"></i>
          <span class="sr-only">My Account</span>
        </button>

        <?php print $secondary_menu_top; ?>

        <div class="cart">
          <a href="<?php print base_path(); ?>cart" class="cart-icon fa-icon">
            <i class="fa fa-shopping-cart"></i>
            <span class="sr-only">Cart</span>
          </a>
          <?php if (isset($cart)): ?>
            <?php print render($cart['content']); ?>
          <?php endif; ?>
        </div>

        <div class="search-block">
          <button class="search-toggle fa-icon">
            <i class="fa fa-search"></i>
            <span class="sr-only">Search Toggle</span>
          </button>
          <form class="navbar-form navbar-left pull-right search-form navbar-search" role="search">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default sr-only">Submit</button>
          </form>
        </div>
      </div>

      <?php if ($logo): ?>
        <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
          <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
        </a>
      <?php endif; ?>

      <?php if ($site_name || $site_slogan): ?>
        <div id="name-and-slogan">
          <?php if ($site_name): ?>
            <?php if ($title): ?>
              <div id="site-name"><strong>
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </strong></div>
            <?php else: /* Use h1 when the content title is empty */ ?>
              <h1 id="site-name">
                <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
              </h1>
            <?php endif; ?>
          <?php endif; ?>

          <?php if ($site_slogan): ?>
            <div id="site-slogan"><?php print $site_slogan; ?></div>
          <?php endif; ?>
        </div> <!-- /#name-and-slogan -->
      <?php endif; ?>

      <?php print render($page['header']); ?>

    </div></div> <!-- /.section, /#header -->

    <?php if ($main_menu): ?>
      <div id="navigation"><div class="section container-fluid">
        <nav class="navbar-default">
          <?php print $main_menu_output; ?>
        </nav>
      </div></div> <!-- /.section, /#navigation -->
    <?php endif; ?>

    <?php print $messages; ?>

    <div id="main-wrapper"><div id="main" class="clearfix">

      <div id="content" class="column"><div class="section">
        <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
        <a id="main-content"></a>
        <div class="container-fluid">
          <div class="row">
            <?php print render($title_prefix); ?>
            <?php if ($title): ?><h1 class="title col-sm-12" id="page-title"><?php print $title; ?></h1><?php endif; ?>
            <?php print render($title_suffix); ?>
          </div>
        </div>

        <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-12">
              <?php print render($page['content']); ?>
            </div>
          </div>
        </div>

        <?php print $feed_icons; ?>
      </div></div> <!-- /.section, /#content -->

      <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="column sidebar"><div class="section">
          <?php print render($page['sidebar_first']); ?>
        </div></div> <!-- /.section, /#sidebar-first -->
      <?php endif; ?>

      <?php if ($page['sidebar_second']): ?>
        <div id="sidebar-second" class="column sidebar"><div class="section">
          <?php print render($page['sidebar_second']); ?>
        </div></div> <!-- /.section, /#sidebar-second -->
      <?php endif; ?>

    </div></div> <!-- /#main, /#main-wrapper -->

    <div id="footer"><div class="section container-fluid">
      <?php print render($page['footer']); ?>
    </div></div> <!-- /.section, /#footer -->

  </div></div> <!-- /#page, /#page-wrapper -->