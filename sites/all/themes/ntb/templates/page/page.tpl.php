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
          <nav class="navbar navbar-default">
            <?php if ($main_menu || $secondary_menu): ?>
              <div class="section container-fluid">
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
                  <?php print render($main_menu_output); ?>

                  <?php print $secondary_menu_output; ?>
                </div><!-- /.navbar-collapse -->
              </div><!-- /.section, /#navigation -->
            <?php endif; ?>
          </nav>
        </div>

        <?php if ($logo): ?>
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo">
            <!-- <svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" data-name="Layer 1" viewBox="0 0 1200 300"><defs><style>.cls-1{font-size:187.26px;fill:#94cbc4;font-family:Quicksand-Light, Quicksand;letter-spacing:0em;}.cls-2{letter-spacing:-0.02em;}.cls-3{letter-spacing:0.01em;}.cls-4,.cls-5,.cls-6,.cls-7{fill:#54a79e;font-family:Quicksand-Regular, Quicksand;}.cls-4{letter-spacing:-0.14em;}.cls-5{letter-spacing:-0.07em;}.cls-6{letter-spacing:-0.09em;}.cls-7{letter-spacing:-0.07em;}.cls-8{font-size:67.01px;fill:#989899;font-family:Cinzel-Regular, Cinzel;letter-spacing:1.07em;}.cls-9{letter-spacing:1.03em;}.cls-10{letter-spacing:1.07em;}.cls-11{letter-spacing:1.08em;}.cls-12{fill:none;}</style></defs><text class="cls-1" transform="translate(116.83 183.8)">na<tspan x="232.57" y="0" class="cls-2">k</tspan><tspan x="333.69" y="0" class="cls-3">ed</tspan><tspan x="573.2" y="0" class="cls-4">t</tspan><tspan x="620.95" y="0" class="cls-5">ru</tspan><tspan x="789.85" y="0" class="cls-6">t</tspan><tspan x="846.97" y="0" class="cls-7">h</tspan></text><text class="cls-8" transform="matrix(1 0 0 .87 295.02 239.77)">be<tspan x="218.72" y="0" class="cls-9">a</tspan><tspan x="332.44" y="0" class="cls-10">u</tspan><tspan x="451.31" y="0" class="cls-11">t</tspan><tspan x="562.69" y="0">y</tspan></text><path d="M388.5 104.14h4.87v59.14h-4.87z" class="cls-12"/></svg> -->

            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="937.453" height="197.991" viewBox="0 0 937.453 197.991"><defs><path id="a" d="M-126.614-47.095h1200v300h-1200z"/></defs><clipPath id="b"><use xlink:href="#a" overflow="visible"/></clipPath><path clip-path="url(#b)" fill="#93CAC4" d="M76.914 82.027c0-18.164-14.605-32.395-32.208-32.395-17.602 0-32.395 14.231-32.395 32.395v52.245c0 .562-.187 1.123-.562 1.498-.374.562-.936.937-1.685.937h-.749c-.187-.188-.375-.188-.562-.375-.187 0-.374-.188-.562-.374-.187-.188-.187-.188-.187-.375a1.434 1.434 0 0 1-.374-.937V47.197c0-1.498 1.123-2.247 2.434-2.247s2.247.749 2.247 2.247V64.05c6.367-11.422 18.539-19.1 32.395-19.1 20.224 0 36.89 16.479 36.89 37.077v52.245c0 1.311-1.124 2.435-2.435 2.435-1.498 0-2.247-1.124-2.247-2.435V82.027zM199.943 47.386v86.886c0 1.498-.937 2.434-2.247 2.434-1.498 0-2.435-.936-2.435-2.434v-22.846c-7.115 14.98-21.722 25.279-38.574 25.279-23.969 0-43.257-20.785-43.257-45.877 0-25.093 19.288-45.878 43.257-45.878 16.852 0 31.459 10.486 38.574 25.279V47.386c0-1.124.937-2.435 2.435-2.435 1.31 0 2.247 1.311 2.247 2.435m-4.682 43.443c0-22.658-17.415-41.009-38.574-41.009-21.16 0-38.575 18.351-38.575 41.009 0 22.845 17.415 41.196 38.575 41.196 21.159 0 38.574-18.352 38.574-41.196M240.202 8.061c0-1.311.937-2.434 2.435-2.434 1.123 0 2.247 1.123 2.247 2.434v97.187l60.296-60.296c.936-.937 2.247-.937 3.371 0a2.373 2.373 0 0 1 0 3.37l-38.013 38.013 38.013 46.252c.936 1.311.561 2.622-.375 3.558-.374.375-.936.562-1.311.562-.749 0-1.498-.188-1.872-.937L266.98 89.892l-21.535 21.534c-.187.188-.374.375-.561.375v22.471c0 1.311-1.124 2.435-2.247 2.435-1.498 0-2.435-1.124-2.435-2.435V8.061zM334.769 90.829c.375-25.467 20.036-45.878 44.567-45.878 23.407 0 42.32 18.538 44.006 42.32V88.02c-.188 1.124-1.124 2.247-2.247 2.247h-81.644v.562c0 22.471 17.789 41.009 39.885 41.196 13.857 0 26.029-7.49 32.957-18.726.749-1.124 2.06-1.124 3.371-.562.936.562 1.31 2.06.561 3.183-7.864 12.172-21.534 20.786-36.889 20.786-24.531-.374-44.192-20.786-44.567-45.877m4.869-5.057h79.022c-2.435-20.411-19.287-35.953-39.324-35.953-20.41 0-37.264 15.542-39.698 35.953M536.445 136.706c-1.124 0-2.247-1.123-2.247-2.434v-22.658c-7.303 14.793-22.284 25.092-39.511 25.092-24.718 0-44.567-20.785-44.567-46.064 0-25.093 19.849-45.691 44.567-45.691 17.227 0 32.208 10.299 39.511 25.279V8.436c0-1.311 1.123-2.809 2.247-2.809 1.498 0 2.434 1.498 2.434 2.809V134.272c0 1.311-.936 2.434-2.434 2.434m-2.247-47.75c-.749-21.909-18.539-39.323-39.511-39.323-21.909 0-39.885 18.35-39.885 41.009 0 22.845 17.976 41.383 39.885 41.383 21.534 0 39.511-18.538 39.511-41.383v-1.686z"/><path clip-path="url(#b)" fill="#54A79E" d="M612.846 49.445c0 2.247-2.247 4.494-4.494 4.494h-11.797v66.851c0 4.494 4.494 6.741 6.741 6.741s4.681 2.434 4.681 4.681-2.434 4.494-4.681 4.494c-9.176 0-16.104-6.741-16.104-15.916V53.939h-11.423c-4.494 0-4.494-2.247-4.494-4.494s0-4.494 4.494-4.494h11.423V10.87c0-2.247 2.247-4.494 4.494-4.494 2.435 0 4.869 2.247 4.869 4.494v34.081h11.797c2.247 0 4.494 2.247 4.494 4.494M628.576 49.632c0-2.622 2.06-4.494 4.682-4.494 2.247 0 4.307 1.872 4.307 4.494v20.224c.375-.749.749-1.498 1.311-2.247 6.929-10.862 19.101-22.471 36.702-22.471 2.435 0 4.495 1.872 4.495 4.494 0 2.434-2.061 4.494-4.495 4.494-11.984 0-20.223 6.741-26.59 14.981-6.18 8.239-9.737 17.601-11.048 21.346-.375.749-.375 1.124-.375 1.498v40.261c0 2.621-2.06 4.494-4.307 4.494-2.622 0-4.682-1.873-4.682-4.494v-82.58zM694.865 49.257c0-2.621 2.06-4.494 4.494-4.494s4.494 1.873 4.494 4.494v49.998a28.372 28.372 0 0 0 28.089 28.462c15.729-.187 28.463-12.733 28.463-28.462V49.257c0-2.621 2.247-4.494 4.494-4.494 2.621 0 4.681 1.873 4.681 4.494v49.998c0 20.598-16.665 37.451-37.638 37.451-20.599 0-37.077-16.854-37.077-37.451V49.257zM829.503 49.445c0 2.247-2.246 4.494-4.493 4.494h-11.799v66.851c0 4.494 4.495 6.741 6.742 6.741s4.682 2.434 4.682 4.681-2.435 4.494-4.682 4.494c-9.176 0-16.104-6.741-16.104-15.916V53.939h-11.423c-4.494 0-4.494-2.247-4.494-4.494s0-4.494 4.494-4.494h11.423V10.87c0-2.247 2.247-4.494 4.494-4.494 2.434 0 4.867 2.247 4.867 4.494v34.081h11.799c2.248 0 4.494 2.247 4.494 4.494M922.01 81.091c0-16.104-13.108-26.965-29.212-26.965-15.917 0-29.025 10.861-29.025 26.965v51.683c0 .374-.187.562-.187.749-.188.374-.188.562-.375.749-.562 1.123-1.498 1.872-2.809 2.247 0 0-.188.188-.375.188h-.936c-1.312 0-2.622-.562-3.56-1.498-.373-.562-.561-.937-.748-1.498-.187-.562-.187-.937-.187-1.498V10.121c0-2.434 2.06-4.494 4.494-4.494 2.621 0 4.681 2.06 4.681 4.494v48.312a37.91 37.91 0 0 1 29.025-13.483c21.16 0 38.387 14.981 38.387 36.141v51.121c0 2.434-2.06 4.494-4.681 4.494-2.435 0-4.494-2.061-4.494-4.494V81.091z"/><path clip-path="url(#b)" fill="#979797" d="M185.766 157.699c4.815 0 13.943.974 13.943 8.724 0 3.601-3.696 6.458-7.367 7.224 6.492.688 11.262 4.555 11.262 9.241 0 7.604-8.318 9.79-14.921 9.79h-16.589l.01-.583h.791c2.255 0 3.953-1.418 4.015-3.146v-27.542c-.068-1.891-1.764-3.131-4.014-3.131h-.791l-.01-.58 13.671.003zm2.872 33.228c5.773 0 10.163-2.481 10.163-8.04 0-7.445-8.335-8.693-15.554-8.693l-.014-.583c4.877 0 11.768-.786 11.768-7.192 0-4.883-3.449-6.976-9.321-6.976h-4.558v31.485l7.516-.001zM309.488 192.678h-27.225l.012-.583h.92c2.162 0 3.788-1.375 3.869-3.095v-27.67c0-1.738-1.693-3.053-3.871-3.053h-.92l-.012-.583h19.577c2.696-.018 6.32-.521 7.487-.915v6.598l-.729-.008v-.896c0-1.636-1.32-2.963-3.36-2.997H291.34v14.833h11.449c1.859-.033 2.717-1.128 2.717-2.476v-.74l.729-.007v8.189l-.729-.006v-.74c0-1.311-.81-2.38-2.56-2.472H291.34v14.834h10.48c6.438-.075 8.73-2.808 10.634-6.581h.726l-3.692 8.368zM426.219 188.694c1.366 2.398 3.383 3.398 5.173 3.398h.507v.583h-13.767v-.578h.533c1.528 0 3.246-1.266 2.368-3.499l-3.661-7.758h-16.953l-3.689 7.598c-1.025 2.333.737 3.66 2.301 3.66h.533v.577h-12.769v-.583h.531c1.784 0 3.88-.991 5.255-3.367l13.875-25.843c-.021 0 2.441-4.48 2.579-6.005h.636l16.548 31.817zm-9.672-9.603l-7.529-15.956-7.749 15.956h15.278zM545.429 157.692v.583h-.995c-1.732 0-3.143 1.047-3.222 2.457v19.625c0 8.144-6.361 13.136-16.705 13.136-10.35 0-16.763-4.958-16.763-13.048V160.8c-.034-1.445-1.462-2.525-3.224-2.525h-.994v-.583h12.721v.583h-.993c-1.761 0-3.19 1.08-3.231 2.525v18.905c0 7.565 4.725 12.204 12.421 12.204 8.452 0 13.644-4.392 13.664-11.556v-19.592c-.057-1.426-1.476-2.487-3.221-2.487h-.995v-.583h11.537zM650.012 157.632c2.662 0 6.323-.514 7.486-.914v6.565l-.714-.007v-.897c-.002-1.637-1.318-2.966-3.354-2.997h-12.127v29.622c.086 1.718 1.81 3.089 3.929 3.089h.778l.01.583h-13.81l.01-.583h.777c2.148 0 3.893-1.409 3.933-3.16v-29.551h-12.135c-2.035.031-3.352 1.36-3.352 2.997v.897l-.716.007v-6.565c1.163.4 4.824.914 7.459.914h21.826zM774.342 157.692v.583h-.852c-2.553 0-4.831 1.411-6.153 2.966l-12.851 16.976v10.716c.039 1.751 1.767 3.16 3.896 3.16h.771l.008.583h-13.708l.01-.583h.77c2.131 0 3.856-1.409 3.898-3.16v-10.798l-12.409-16.927c-1.37-1.785-3.578-2.933-6.134-2.933h-.827v-.583h15.541v.583h-.768c-1.805 0-2.847 1.437-2.29 2.782l9.741 15.106 10.4-15.043c.692-1.448-.459-2.846-2.287-2.846h-.768v-.583h14.012z"/><g><defs><path id="c" d="M-126.614-47.095h1200v300h-1200z"/></defs><clipPath id="d"><use xlink:href="#c" overflow="visible"/></clipPath><path clip-path="url(#d)" fill="#4AA398" d="M76.914 82.027c0-18.164-14.605-32.395-32.208-32.395-17.602 0-32.395 14.231-32.395 32.395v52.245c0 .562-.187 1.123-.562 1.498-.374.562-.936.937-1.685.937h-.749c-.187-.188-.375-.188-.562-.375-.187 0-.374-.188-.562-.374-.187-.188-.187-.188-.187-.375a1.434 1.434 0 0 1-.374-.937V47.197c0-1.498 1.123-2.247 2.434-2.247s2.247.749 2.247 2.247V64.05c6.367-11.422 18.539-19.1 32.395-19.1 20.224 0 36.89 16.479 36.89 37.077v52.245c0 1.311-1.124 2.435-2.435 2.435-1.498 0-2.247-1.124-2.247-2.435V82.027zM199.943 47.386v86.886c0 1.498-.937 2.434-2.247 2.434-1.498 0-2.435-.936-2.435-2.434v-22.846c-7.115 14.98-21.722 25.279-38.574 25.279-23.969 0-43.257-20.785-43.257-45.877 0-25.093 19.288-45.878 43.257-45.878 16.852 0 31.459 10.486 38.574 25.279V47.386c0-1.124.937-2.435 2.435-2.435 1.31 0 2.247 1.311 2.247 2.435m-4.682 43.443c0-22.658-17.415-41.009-38.574-41.009-21.16 0-38.575 18.351-38.575 41.009 0 22.845 17.415 41.196 38.575 41.196 21.159 0 38.574-18.352 38.574-41.196M240.202 8.061c0-1.311.937-2.434 2.435-2.434 1.123 0 2.247 1.123 2.247 2.434v97.187l60.296-60.296c.936-.937 2.247-.937 3.371 0a2.373 2.373 0 0 1 0 3.37l-38.013 38.013 38.013 46.252c.936 1.311.561 2.622-.375 3.558-.374.375-.936.562-1.311.562-.749 0-1.498-.188-1.872-.937L266.98 89.892l-21.535 21.534c-.187.188-.374.375-.561.375v22.471c0 1.311-1.124 2.435-2.247 2.435-1.498 0-2.435-1.124-2.435-2.435V8.061zM334.769 90.829c.375-25.467 20.036-45.878 44.567-45.878 23.407 0 42.32 18.538 44.006 42.32V88.02c-.188 1.124-1.124 2.247-2.247 2.247h-81.644v.562c0 22.471 17.789 41.009 39.885 41.196 13.857 0 26.029-7.49 32.957-18.726.749-1.124 2.06-1.124 3.371-.562.936.562 1.31 2.06.561 3.183-7.864 12.172-21.534 20.786-36.889 20.786-24.531-.374-44.192-20.786-44.567-45.877m4.869-5.057h79.022c-2.435-20.411-19.287-35.953-39.324-35.953-20.41 0-37.264 15.542-39.698 35.953M536.445 136.706c-1.124 0-2.247-1.123-2.247-2.434v-22.658c-7.303 14.793-22.284 25.092-39.511 25.092-24.718 0-44.567-20.785-44.567-46.064 0-25.093 19.849-45.691 44.567-45.691 17.227 0 32.208 10.299 39.511 25.279V8.436c0-1.311 1.123-2.809 2.247-2.809 1.498 0 2.434 1.498 2.434 2.809V134.272c0 1.311-.936 2.434-2.434 2.434m-2.247-47.75c-.749-21.909-18.539-39.323-39.511-39.323-21.909 0-39.885 18.35-39.885 41.009 0 22.845 17.976 41.383 39.885 41.383 21.534 0 39.511-18.538 39.511-41.383v-1.686z"/><path clip-path="url(#d)" fill="#3D8079" d="M612.846 49.445c0 2.247-2.247 4.494-4.494 4.494h-11.797v66.851c0 4.494 4.494 6.741 6.741 6.741s4.681 2.434 4.681 4.681-2.434 4.494-4.681 4.494c-9.176 0-16.104-6.741-16.104-15.916V53.939h-11.423c-4.494 0-4.494-2.247-4.494-4.494s0-4.494 4.494-4.494h11.423V10.87c0-2.247 2.247-4.494 4.494-4.494 2.435 0 4.869 2.247 4.869 4.494v34.081h11.797c2.247 0 4.494 2.247 4.494 4.494M628.576 49.632c0-2.622 2.06-4.494 4.682-4.494 2.247 0 4.307 1.872 4.307 4.494v20.224c.375-.749.749-1.498 1.311-2.247 6.929-10.862 19.101-22.471 36.702-22.471 2.435 0 4.495 1.872 4.495 4.494 0 2.434-2.061 4.494-4.495 4.494-11.984 0-20.223 6.741-26.59 14.981-6.18 8.239-9.737 17.601-11.048 21.346-.375.749-.375 1.124-.375 1.498v40.261c0 2.621-2.06 4.494-4.307 4.494-2.622 0-4.682-1.873-4.682-4.494v-82.58zM694.865 49.257c0-2.621 2.06-4.494 4.494-4.494s4.494 1.873 4.494 4.494v49.998a28.372 28.372 0 0 0 28.089 28.462c15.729-.187 28.463-12.733 28.463-28.462V49.257c0-2.621 2.247-4.494 4.494-4.494 2.621 0 4.681 1.873 4.681 4.494v49.998c0 20.598-16.665 37.451-37.638 37.451-20.599 0-37.077-16.854-37.077-37.451V49.257zM829.503 49.445c0 2.247-2.246 4.494-4.493 4.494h-11.799v66.851c0 4.494 4.495 6.741 6.742 6.741s4.682 2.434 4.682 4.681-2.435 4.494-4.682 4.494c-9.176 0-16.104-6.741-16.104-15.916V53.939h-11.423c-4.494 0-4.494-2.247-4.494-4.494s0-4.494 4.494-4.494h11.423V10.87c0-2.247 2.247-4.494 4.494-4.494 2.434 0 4.867 2.247 4.867 4.494v34.081h11.799c2.248 0 4.494 2.247 4.494 4.494M922.01 81.091c0-16.104-13.108-26.965-29.212-26.965-15.917 0-29.025 10.861-29.025 26.965v51.683c0 .374-.187.562-.187.749-.188.374-.188.562-.375.749-.562 1.123-1.498 1.872-2.809 2.247 0 0-.188.188-.375.188h-.936c-1.312 0-2.622-.562-3.56-1.498-.373-.562-.561-.937-.748-1.498-.187-.562-.187-.937-.187-1.498V10.121c0-2.434 2.06-4.494 4.494-4.494 2.621 0 4.681 2.06 4.681 4.494v48.312a37.91 37.91 0 0 1 29.025-13.483c21.16 0 38.387 14.981 38.387 36.141v51.121c0 2.434-2.06 4.494-4.681 4.494-2.435 0-4.494-2.061-4.494-4.494V81.091z"/><path clip-path="url(#d)" fill="#989898" d="M185.766 157.699c4.815 0 13.943.974 13.943 8.724 0 3.601-3.696 6.458-7.367 7.224 6.492.688 11.262 4.555 11.262 9.241 0 7.604-8.318 9.79-14.921 9.79h-16.589l.01-.583h.791c2.255 0 3.953-1.418 4.015-3.146v-27.542c-.068-1.891-1.764-3.131-4.014-3.131h-.791l-.01-.58 13.671.003zm2.872 33.228c5.773 0 10.163-2.481 10.163-8.04 0-7.445-8.335-8.693-15.554-8.693l-.014-.583c4.877 0 11.768-.786 11.768-7.192 0-4.883-3.449-6.976-9.321-6.976h-4.558v31.485l7.516-.001zM309.488 192.678h-27.225l.012-.583h.92c2.162 0 3.788-1.375 3.869-3.095v-27.67c0-1.738-1.693-3.053-3.871-3.053h-.92l-.012-.583h19.577c2.696-.018 6.32-.521 7.487-.915v6.598l-.729-.008v-.896c0-1.636-1.32-2.963-3.36-2.997H291.34v14.833h11.449c1.859-.033 2.717-1.128 2.717-2.476v-.74l.729-.007v8.189l-.729-.006v-.74c0-1.311-.81-2.38-2.56-2.472H291.34v14.834h10.48c6.438-.075 8.73-2.808 10.634-6.581h.726l-3.692 8.368zM426.219 188.694c1.366 2.398 3.383 3.398 5.173 3.398h.507v.583h-13.767v-.578h.533c1.528 0 3.246-1.266 2.368-3.499l-3.661-7.758h-16.953l-3.689 7.598c-1.025 2.333.737 3.66 2.301 3.66h.533v.577h-12.769v-.583h.531c1.784 0 3.88-.991 5.255-3.367l13.875-25.843c-.021 0 2.441-4.48 2.579-6.005h.636l16.548 31.817zm-9.672-9.603l-7.529-15.956-7.749 15.956h15.278zM545.429 157.692v.583h-.995c-1.732 0-3.143 1.047-3.222 2.457v19.625c0 8.144-6.361 13.136-16.705 13.136-10.35 0-16.763-4.958-16.763-13.048V160.8c-.034-1.445-1.462-2.525-3.224-2.525h-.994v-.583h12.721v.583h-.993c-1.761 0-3.19 1.08-3.231 2.525v18.905c0 7.565 4.725 12.204 12.421 12.204 8.452 0 13.644-4.392 13.664-11.556v-19.592c-.057-1.426-1.476-2.487-3.221-2.487h-.995v-.583h11.537zM650.012 157.632c2.662 0 6.323-.514 7.486-.914v6.565l-.714-.007v-.897c-.002-1.637-1.318-2.966-3.354-2.997h-12.127v29.622c.086 1.718 1.81 3.089 3.929 3.089h.778l.01.583h-13.81l.01-.583h.777c2.148 0 3.893-1.409 3.933-3.16v-29.551h-12.135c-2.035.031-3.352 1.36-3.352 2.997v.897l-.716.007v-6.565c1.163.4 4.824.914 7.459.914h21.826zM774.342 157.692v.583h-.852c-2.553 0-4.831 1.411-6.153 2.966l-12.851 16.976v10.716c.039 1.751 1.767 3.16 3.896 3.16h.771l.008.583h-13.708l.01-.583h.77c2.131 0 3.856-1.409 3.898-3.16v-10.798l-12.409-16.927c-1.37-1.785-3.578-2.933-6.134-2.933h-.827v-.583h15.541v.583h-.768c-1.805 0-2.847 1.437-2.29 2.782l9.741 15.106 10.4-15.043c.692-1.448-.459-2.846-2.287-2.846h-.768v-.583h14.012z"/></g></svg>
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
      </div>
    </div> <!-- /.section, /#header -->

  <?php print render($page['marquee']); ?>

  <?php print $messages; ?>

  <div id="main-wrapper"><div id="main" class="clearfix">

    <div id="content" class="column"><div class="section">
      <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
      <a id="main-content"></a>

      <?php if ($tabs): ?><div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

      <div class="container-fluid">
        <div class="row">
          <?php print render($title_prefix); ?>
          <?php if ($title): ?><h1 class="title col-sm-12" id="page-title"><?php print $title; ?></h1><?php endif; ?>
          <?php print render($title_suffix); ?>
        </div>

        <div class="row">
          <div class="col-sm-12">
            <div class="row">
              <?php print render($page['content']); ?>
            </div>
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
