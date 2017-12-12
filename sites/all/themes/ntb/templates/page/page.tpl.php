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
    <div id="header">
      <div class="section clearfix container-fluid">

        <?php if ($page['alert']): ?>
          <div class="row">
            <div class="alert-strip">
              <?php print render($page['alert']); ?>
            </div>
          </div>
        <?php endif; ?>

        <div class="row">
          <nav class="navbar">
            <?php if ($main_menu || $secondary_menu): ?>
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="nav-wrapper nav-primary-wrapper" id="navbar-1">
                <?php print render($main_menu_output); ?>
              </div><!-- /.navbar-collapse -->
              <div class="nav-wrapper nav-secondary-wrapper" id="navbar-2">
                <ul class="nav icon-menu-fixed custom-user-menu navbar-nav">
                  <li class="dropdown user-dropdown">
                    <button class="user-toggle fa-icon dropdown-toggle" type="button" data-toggle="dropdown" id="userMenu" aria-haspopup="true" aria-expanded="false">
                      <i class="fa fa-user"></i>
                      <span class="sr-only">User Menu Toggle</span>
                    </button>
                    <?php if (isset($secondary_menu_dropdown)): ?>
                      <?php print render($secondary_menu_dropdown); ?>
                    <?php endif; ?>
                  </li>

                  <li class="cart">
                    <a href="<?php print base_path(); ?>cart" class="cart-icon fa-icon cart-toggle">
                      <i class="fa fa-shopping-cart"></i>
                      <span class="sr-only">Cart</span>
                    </a>
                    <?php if (isset($cart)): ?>
                      <?php print render($cart['content']); ?>
                    <?php endif; ?>
                  </li>
                  <?php if (isset($search)): ?>
                    <?php print render($search); ?>
                  <?php endif; ?>
                </ul><!-- end custom-user-menu -->
              </div>
            <?php endif; ?>
          </nav>
        </div>

        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
            	 width="937.453px" height="197.992px" viewBox="0 0 937.453 197.992" enable-background="new 0 0 937.453 197.992"
            	 xml:space="preserve">
            <g>
            	<g>
            		<path fill="#4AA398" d="M76.914,82.027c0-18.164-14.605-32.395-32.208-32.395c-17.602,0-32.395,14.231-32.395,32.395v52.245
            			c0,0.562-0.187,1.123-0.562,1.498c-0.374,0.562-0.936,0.937-1.685,0.937H9.315c-0.187-0.188-0.375-0.188-0.562-0.375
            			c-0.187,0-0.374-0.188-0.562-0.373c-0.187-0.188-0.187-0.188-0.187-0.375c-0.234-0.258-0.367-0.59-0.374-0.938V47.197
            			c0-1.498,1.123-2.247,2.434-2.247s2.247,0.749,2.247,2.247V64.05c6.367-11.422,18.539-19.1,32.395-19.1
            			c20.224,0,36.89,16.479,36.89,37.077v52.245c0,1.312-1.124,2.435-2.435,2.435c-1.498,0-2.247-1.123-2.247-2.435V82.027z
            			 M199.943,47.386v86.886c0,1.498-0.937,2.435-2.247,2.435c-1.498,0-2.435-0.937-2.435-2.435v-22.847
            			c-7.115,14.98-21.722,25.279-38.574,25.279c-23.969,0-43.257-20.785-43.257-45.876c0-25.093,19.288-45.878,43.257-45.878
            			c16.852,0,31.459,10.486,38.574,25.279V47.386c0-1.124,0.938-2.435,2.435-2.435C199.006,44.951,199.943,46.262,199.943,47.386
            			 M195.261,90.829c0-22.658-17.415-41.009-38.574-41.009c-21.16,0-38.575,18.351-38.575,41.009
            			c0,22.844,17.415,41.196,38.575,41.196C177.846,132.025,195.261,113.673,195.261,90.829 M240.202,8.061
            			c0-1.311,0.937-2.434,2.435-2.434c1.123,0,2.247,1.123,2.247,2.434v97.187l60.296-60.295c0.936-0.937,2.247-0.937,3.371,0
            			c0.931,0.923,0.938,2.425,0.015,3.355c-0.005,0.005-0.01,0.01-0.015,0.015l-38.013,38.013l38.013,46.252
            			c0.937,1.311,0.562,2.621-0.375,3.558c-0.374,0.375-0.936,0.562-1.311,0.562c-0.749,0-1.498-0.188-1.872-0.937L266.98,89.892
            			l-21.535,21.533c-0.187,0.189-0.374,0.375-0.561,0.375v22.472c0,1.312-1.124,2.435-2.247,2.435c-1.498,0-2.435-1.123-2.435-2.435
            			V8.061L240.202,8.061z M334.77,90.829c0.375-25.467,20.035-45.878,44.566-45.878c23.407,0,42.32,18.538,44.006,42.32v0.749
            			c-0.188,1.124-1.124,2.247-2.247,2.247h-81.644v0.562c0,22.471,17.789,41.008,39.885,41.196c13.857,0,26.029-7.49,32.957-18.727
            			c0.749-1.123,2.061-1.123,3.371-0.562c0.936,0.562,1.31,2.06,0.561,3.183c-7.863,12.172-21.533,20.787-36.889,20.787
            			C354.805,136.332,335.144,115.919,334.77,90.829 M339.638,85.772h79.022c-2.436-20.411-19.287-35.953-39.324-35.953
            			C358.926,49.819,342.072,65.361,339.638,85.772 M536.445,136.707c-1.124,0-2.247-1.123-2.247-2.435v-22.657
            			c-7.304,14.793-22.284,25.092-39.511,25.092c-24.719,0-44.567-20.785-44.567-46.064c0-25.093,19.849-45.691,44.567-45.691
            			c17.227,0,32.207,10.299,39.511,25.279V8.436c0-1.311,1.123-2.809,2.247-2.809c1.498,0,2.434,1.498,2.434,2.809v125.836
            			C538.879,135.583,537.943,136.707,536.445,136.707 M534.198,88.956c-0.749-21.909-18.539-39.323-39.511-39.323
            			c-21.909,0-39.886,18.35-39.886,41.009c0,22.845,17.977,41.383,39.886,41.383c21.533,0,39.511-18.538,39.511-41.383V88.956z"/>
            	</g>
            	<g>
            		<path fill="#3D8079" d="M612.846,49.445c0,2.247-2.247,4.494-4.494,4.494h-11.797v66.852c0,4.494,4.494,6.74,6.741,6.74
            			s4.681,2.434,4.681,4.682c0,2.246-2.434,4.494-4.681,4.494c-9.176,0-16.104-6.742-16.104-15.916V53.939H575.77
            			c-4.494,0-4.494-2.247-4.494-4.494c0-2.247,0-4.494,4.494-4.494h11.423V10.87c0-2.247,2.247-4.494,4.493-4.494
            			c2.436,0,4.869,2.247,4.869,4.494v34.081h11.797C610.599,44.951,612.846,47.198,612.846,49.445 M628.576,49.632
            			c0-2.622,2.06-4.494,4.682-4.494c2.247,0,4.308,1.872,4.308,4.494v20.224c0.375-0.749,0.749-1.498,1.311-2.247
            			c6.929-10.862,19.101-22.471,36.702-22.471c2.435,0,4.495,1.872,4.495,4.494c0,2.434-2.062,4.494-4.495,4.494
            			c-11.984,0-20.223,6.741-26.59,14.981c-6.181,8.239-9.737,17.601-11.048,21.346c-0.375,0.749-0.375,1.124-0.375,1.498v40.261
            			c0,2.621-2.061,4.494-4.308,4.494c-2.622,0-4.682-1.873-4.682-4.494V49.632z M694.865,49.257c0-2.621,2.06-4.494,4.494-4.494
            			c2.434,0,4.494,1.873,4.494,4.494v49.998c-0.051,15.594,12.494,28.307,28.089,28.461c15.729-0.186,28.463-12.732,28.463-28.461
            			V49.257c0-2.621,2.247-4.494,4.494-4.494c2.62,0,4.681,1.873,4.681,4.494v49.998c0,20.598-16.665,37.452-37.638,37.452
            			c-20.6,0-37.077-16.854-37.077-37.452V49.257L694.865,49.257z M829.503,49.445c0,2.247-2.246,4.494-4.493,4.494h-11.799v66.852
            			c0,4.494,4.495,6.74,6.742,6.74s4.682,2.434,4.682,4.682c0,2.246-2.435,4.494-4.682,4.494c-9.176,0-16.104-6.742-16.104-15.916
            			V53.939h-11.423c-4.494,0-4.494-2.247-4.494-4.494c0-2.247,0-4.494,4.494-4.494h11.423V10.87c0-2.247,2.247-4.494,4.494-4.494
            			c2.435,0,4.867,2.247,4.867,4.494v34.081h11.799C827.257,44.951,829.503,47.198,829.503,49.445 M922.01,81.091
            			c0-16.104-13.107-26.965-29.212-26.965c-15.917,0-29.024,10.861-29.024,26.965v51.683c0,0.374-0.188,0.562-0.188,0.749
            			c-0.188,0.374-0.188,0.562-0.375,0.749c-0.562,1.123-1.498,1.872-2.809,2.247c0,0-0.188,0.188-0.375,0.188h-0.937
            			c-1.312,0-2.622-0.562-3.56-1.498c-0.373-0.562-0.562-0.937-0.748-1.498c-0.188-0.562-0.188-0.937-0.188-1.498V10.121
            			c0-2.434,2.061-4.494,4.494-4.494c2.621,0,4.682,2.06,4.682,4.494v48.312c7.21-8.558,17.834-13.493,29.024-13.483
            			c21.16,0,38.388,14.981,38.388,36.141v51.122c0,2.434-2.061,4.494-4.682,4.494c-2.435,0-4.494-2.062-4.494-4.494V81.091H922.01z"
            			/>
            	</g>
            	<g>
            		<path fill="#989898" d="M185.766,157.699c4.815,0,13.943,0.975,13.943,8.725c0,3.601-3.696,6.457-7.367,7.224
            			c6.492,0.688,11.262,4.556,11.262,9.241c0,7.604-8.318,9.789-14.921,9.789h-16.589l0.01-0.582h0.791
            			c2.255,0,3.953-1.418,4.015-3.146v-27.541c-0.068-1.892-1.764-3.132-4.014-3.132h-0.791l-0.01-0.579L185.766,157.699
            			L185.766,157.699z M188.638,190.927c5.773,0,10.163-2.481,10.163-8.04c0-7.445-8.335-8.693-15.554-8.693l-0.014-0.583
            			c4.877,0,11.768-0.785,11.768-7.191c0-4.883-3.449-6.977-9.321-6.977h-4.558v31.485L188.638,190.927z M309.488,192.677h-27.225
            			l0.012-0.582h0.92c2.162,0,3.788-1.375,3.869-3.096v-27.67c0-1.738-1.693-3.053-3.871-3.053h-0.92l-0.012-0.583h19.577
            			c2.696-0.019,6.32-0.521,7.487-0.915v6.598l-0.729-0.008v-0.896c0-1.636-1.319-2.964-3.36-2.997H291.34v14.833h11.449
            			c1.859-0.033,2.717-1.128,2.717-2.476v-0.74l0.729-0.008v8.189l-0.729-0.006v-0.74c0-1.311-0.81-2.38-2.56-2.472H291.34v14.834
            			h10.48c6.438-0.075,8.73-2.808,10.634-6.581h0.726L309.488,192.677L309.488,192.677z M426.219,188.694
            			c1.366,2.397,3.383,3.397,5.173,3.397h0.508v0.584h-13.768v-0.578h0.533c1.528,0,3.246-1.266,2.368-3.499l-3.661-7.759h-16.953
            			l-3.688,7.599c-1.025,2.333,0.736,3.66,2.301,3.66h0.533v0.577h-12.77v-0.584h0.531c1.784,0,3.88-0.99,5.255-3.366l13.875-25.843
            			c-0.021,0,2.44-4.48,2.579-6.006h0.636L426.219,188.694z M416.547,179.091l-7.529-15.957l-7.748,15.957H416.547z M545.429,157.692
            			v0.583h-0.995c-1.731,0-3.143,1.047-3.222,2.457v19.625c0,8.145-6.361,13.137-16.705,13.137c-10.35,0-16.763-4.959-16.763-13.049
            			V160.8c-0.034-1.445-1.462-2.525-3.225-2.525h-0.993v-0.583h12.721v0.583h-0.993c-1.761,0-3.189,1.08-3.23,2.525v18.904
            			c0,7.565,4.725,12.205,12.421,12.205c8.452,0,13.644-4.393,13.664-11.557v-19.592c-0.058-1.426-1.477-2.487-3.222-2.487h-0.995
            			v-0.583L545.429,157.692L545.429,157.692z M650.012,157.632c2.662,0,6.323-0.514,7.486-0.914v6.564l-0.714-0.007v-0.897
            			c-0.002-1.637-1.318-2.965-3.354-2.996h-12.127v29.621c0.086,1.719,1.811,3.09,3.93,3.09h0.777l0.011,0.582H632.21l0.01-0.582
            			h0.777c2.148,0,3.893-1.409,3.933-3.16v-29.551h-12.135c-2.035,0.031-3.352,1.359-3.352,2.996v0.897l-0.717,0.007v-6.564
            			c1.163,0.4,4.824,0.914,7.459,0.914H650.012z M774.342,157.692v0.583h-0.852c-2.553,0-4.831,1.411-6.153,2.967l-12.851,16.975
            			v10.717c0.039,1.751,1.767,3.16,3.896,3.16h0.771l0.008,0.582h-13.708l0.01-0.582h0.771c2.131,0,3.855-1.409,3.897-3.16v-10.799
            			l-12.409-16.926c-1.37-1.785-3.578-2.934-6.134-2.934h-0.827v-0.583h15.541v0.583h-0.768c-1.806,0-2.847,1.438-2.29,2.782
            			l9.741,15.106l10.399-15.043c0.692-1.449-0.459-2.847-2.287-2.847h-0.768v-0.583L774.342,157.692L774.342,157.692z"/>
            	</g>
            </g>
            </svg></a>
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

        <?php if ($page['header']): ?>
          <?php print render($page['header']); ?>
        <?php endif; ?>
      </div>
    </div> <!-- /.section, /#header -->

  <?php if ($page['marquee']): ?>
    <?php print render($page['marquee']); ?>
  <?php endif; ?>

  <?php print $messages; ?>

  <div id="main-wrapper"><div id="main" class="clearfix">

    <div id="content" class="column"><div class="section">
      <?php if ($page['highlighted']): ?>
        <div id="highlighted">
          <?php print render($page['highlighted']); ?>
        </div>
      <?php endif; ?>

      <a id="main-content"></a>

      <?php if ($tabs): ?>
        <div class="tabs">
          <?php print render($tabs); ?>
        </div>
      <?php endif; ?>

      <?php print render($page['help']); ?>

      <?php if ($action_links): ?>
        <ul class="action-links">
          <?php print render($action_links); ?>
        </ul>
      <?php endif; ?>

      <div class="container-fluid">
        <div class="row">
          <?php print render($title_prefix); ?>
          <?php if ($title): ?><h1 class="title col-sm-12" id="page-title"><?php print $title; ?></h1><?php endif; ?>
          <?php print render($title_suffix); ?>
        </div>

        <?php print render($page['content']); ?>
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
