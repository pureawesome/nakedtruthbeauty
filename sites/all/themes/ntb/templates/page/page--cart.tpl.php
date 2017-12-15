<?php
/**
 * @file
 * Cart page.
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
            <svg xmlns="http://www.w3.org/2000/svg" width="937.453" height="197.992" viewBox="0 0 937.453 197.992"><path fill="#4AA398" d="M76.914 82.027c0-18.164-14.605-32.395-32.208-32.395-17.602 0-32.395 14.231-32.395 32.395v52.245c0 .562-.187 1.123-.562 1.498-.374.562-.936.937-1.685.937h-.749c-.187-.188-.375-.188-.562-.375-.187 0-.374-.188-.562-.373-.187-.188-.187-.188-.187-.375a1.438 1.438 0 0 1-.374-.938V47.197c0-1.498 1.123-2.247 2.434-2.247s2.247.749 2.247 2.247V64.05c6.367-11.422 18.539-19.1 32.395-19.1 20.224 0 36.89 16.479 36.89 37.077v52.245c0 1.312-1.124 2.435-2.435 2.435-1.498 0-2.247-1.123-2.247-2.435V82.027zm123.029-34.641v86.886c0 1.498-.937 2.435-2.247 2.435-1.498 0-2.435-.937-2.435-2.435v-22.847c-7.115 14.98-21.722 25.279-38.574 25.279-23.969 0-43.257-20.785-43.257-45.876 0-25.093 19.288-45.878 43.257-45.878 16.852 0 31.459 10.486 38.574 25.279V47.386c0-1.124.938-2.435 2.435-2.435 1.31 0 2.247 1.311 2.247 2.435m-4.682 43.443c0-22.658-17.415-41.009-38.574-41.009-21.16 0-38.575 18.351-38.575 41.009 0 22.844 17.415 41.196 38.575 41.196 21.159 0 38.574-18.352 38.574-41.196m44.941-82.768c0-1.311.937-2.434 2.435-2.434 1.123 0 2.247 1.123 2.247 2.434v97.187l60.296-60.295c.936-.937 2.247-.937 3.371 0 .931.923.938 2.425.015 3.355l-.015.015-38.013 38.013 38.013 46.252c.937 1.311.562 2.621-.375 3.558-.374.375-.936.562-1.311.562-.749 0-1.498-.188-1.872-.937L266.98 89.892l-21.535 21.533c-.187.189-.374.375-.561.375v22.472c0 1.312-1.124 2.435-2.247 2.435-1.498 0-2.435-1.123-2.435-2.435V8.061zm94.568 82.768c.375-25.467 20.035-45.878 44.566-45.878 23.407 0 42.32 18.538 44.006 42.32v.749c-.188 1.124-1.124 2.247-2.247 2.247h-81.644v.562c0 22.471 17.789 41.008 39.885 41.196 13.857 0 26.029-7.49 32.957-18.727.749-1.123 2.061-1.123 3.371-.562.936.562 1.31 2.06.561 3.183-7.863 12.172-21.533 20.787-36.889 20.787-24.531-.374-44.192-20.787-44.566-45.877m4.868-5.057h79.022c-2.436-20.411-19.287-35.953-39.324-35.953-20.41 0-37.264 15.542-39.698 35.953m196.807 50.935c-1.124 0-2.247-1.123-2.247-2.435v-22.657c-7.304 14.793-22.284 25.092-39.511 25.092-24.719 0-44.567-20.785-44.567-46.064 0-25.093 19.849-45.691 44.567-45.691 17.227 0 32.207 10.299 39.511 25.279V8.436c0-1.311 1.123-2.809 2.247-2.809 1.498 0 2.434 1.498 2.434 2.809v125.836c0 1.311-.936 2.435-2.434 2.435m-2.247-47.751c-.749-21.909-18.539-39.323-39.511-39.323-21.909 0-39.886 18.35-39.886 41.009 0 22.845 17.977 41.383 39.886 41.383 21.533 0 39.511-18.538 39.511-41.383v-1.686z"/><path fill="#3D8079" d="M612.846 49.445c0 2.247-2.247 4.494-4.494 4.494h-11.797v66.852c0 4.494 4.494 6.74 6.741 6.74s4.681 2.434 4.681 4.682c0 2.246-2.434 4.494-4.681 4.494-9.176 0-16.104-6.742-16.104-15.916V53.939H575.77c-4.494 0-4.494-2.247-4.494-4.494s0-4.494 4.494-4.494h11.423V10.87c0-2.247 2.247-4.494 4.493-4.494 2.436 0 4.869 2.247 4.869 4.494v34.081h11.797c2.247 0 4.494 2.247 4.494 4.494m15.73.187c0-2.622 2.06-4.494 4.682-4.494 2.247 0 4.308 1.872 4.308 4.494v20.224c.375-.749.749-1.498 1.311-2.247 6.929-10.862 19.101-22.471 36.702-22.471 2.435 0 4.495 1.872 4.495 4.494 0 2.434-2.062 4.494-4.495 4.494-11.984 0-20.223 6.741-26.59 14.981-6.181 8.239-9.737 17.601-11.048 21.346-.375.749-.375 1.124-.375 1.498v40.261c0 2.621-2.061 4.494-4.308 4.494-2.622 0-4.682-1.873-4.682-4.494v-82.58zm66.289-.375c0-2.621 2.06-4.494 4.494-4.494 2.434 0 4.494 1.873 4.494 4.494v49.998c-.051 15.594 12.494 28.307 28.089 28.461 15.729-.186 28.463-12.732 28.463-28.461V49.257c0-2.621 2.247-4.494 4.494-4.494 2.62 0 4.681 1.873 4.681 4.494v49.998c0 20.598-16.665 37.452-37.638 37.452-20.6 0-37.077-16.854-37.077-37.452V49.257zm134.638.188c0 2.247-2.246 4.494-4.493 4.494h-11.799v66.852c0 4.494 4.495 6.74 6.742 6.74s4.682 2.434 4.682 4.682c0 2.246-2.435 4.494-4.682 4.494-9.176 0-16.104-6.742-16.104-15.916V53.939h-11.423c-4.494 0-4.494-2.247-4.494-4.494s0-4.494 4.494-4.494h11.423V10.87c0-2.247 2.247-4.494 4.494-4.494 2.435 0 4.867 2.247 4.867 4.494v34.081h11.799c2.248 0 4.494 2.247 4.494 4.494m92.507 31.646c0-16.104-13.107-26.965-29.212-26.965-15.917 0-29.024 10.861-29.024 26.965v51.683c0 .374-.188.562-.188.749-.188.374-.188.562-.375.749-.562 1.123-1.498 1.872-2.809 2.247 0 0-.188.188-.375.188h-.937c-1.312 0-2.622-.562-3.56-1.498-.373-.562-.562-.937-.748-1.498-.188-.562-.188-.937-.188-1.498V10.121c0-2.434 2.061-4.494 4.494-4.494 2.621 0 4.682 2.06 4.682 4.494v48.312a37.908 37.908 0 0 1 29.024-13.483c21.16 0 38.388 14.981 38.388 36.141v51.122c0 2.434-2.061 4.494-4.682 4.494-2.435 0-4.494-2.062-4.494-4.494V81.091h.004z"/><path fill="#989898" d="M185.766 157.699c4.815 0 13.943.975 13.943 8.725 0 3.601-3.696 6.457-7.367 7.224 6.492.688 11.262 4.556 11.262 9.241 0 7.604-8.318 9.789-14.921 9.789h-16.589l.01-.582h.791c2.255 0 3.953-1.418 4.015-3.146v-27.541c-.068-1.892-1.764-3.132-4.014-3.132h-.791l-.01-.579 13.671.001zm2.872 33.228c5.773 0 10.163-2.481 10.163-8.04 0-7.445-8.335-8.693-15.554-8.693l-.014-.583c4.877 0 11.768-.785 11.768-7.191 0-4.883-3.449-6.977-9.321-6.977h-4.558v31.485l7.516-.001zm120.85 1.75h-27.225l.012-.582h.92c2.162 0 3.788-1.375 3.869-3.096v-27.67c0-1.738-1.693-3.053-3.871-3.053h-.92l-.012-.583h19.577c2.696-.019 6.32-.521 7.487-.915v6.598l-.729-.008v-.896c0-1.636-1.319-2.964-3.36-2.997H291.34v14.833h11.449c1.859-.033 2.717-1.128 2.717-2.476v-.74l.729-.008v8.189l-.729-.006v-.74c0-1.311-.81-2.38-2.56-2.472H291.34v14.834h10.48c6.438-.075 8.73-2.808 10.634-6.581h.726l-3.692 8.369zm116.731-3.983c1.366 2.397 3.383 3.397 5.173 3.397h.508v.584h-13.768v-.578h.533c1.528 0 3.246-1.266 2.368-3.499l-3.661-7.759h-16.953l-3.688 7.599c-1.025 2.333.736 3.66 2.301 3.66h.533v.577h-12.77v-.584h.531c1.784 0 3.88-.99 5.255-3.366l13.875-25.843c-.021 0 2.44-4.48 2.579-6.006h.636l16.548 31.818zm-9.672-9.603l-7.529-15.957-7.748 15.957h15.277zm128.882-21.399v.583h-.995c-1.731 0-3.143 1.047-3.222 2.457v19.625c0 8.145-6.361 13.137-16.705 13.137-10.35 0-16.763-4.959-16.763-13.049V160.8c-.034-1.445-1.462-2.525-3.225-2.525h-.993v-.583h12.721v.583h-.993c-1.761 0-3.189 1.08-3.23 2.525v18.904c0 7.565 4.725 12.205 12.421 12.205 8.452 0 13.644-4.393 13.664-11.557V160.76c-.058-1.426-1.477-2.487-3.222-2.487h-.995v-.583l11.537.002zm104.583-.06c2.662 0 6.323-.514 7.486-.914v6.564l-.714-.007v-.897c-.002-1.637-1.318-2.965-3.354-2.996h-12.127v29.621c.086 1.719 1.811 3.09 3.93 3.09h.777l.011.582H632.21l.01-.582h.777c2.148 0 3.893-1.409 3.933-3.16v-29.551h-12.135c-2.035.031-3.352 1.359-3.352 2.996v.897l-.717.007v-6.564c1.163.4 4.824.914 7.459.914h21.827zm124.33.06v.583h-.852c-2.553 0-4.831 1.411-6.153 2.967l-12.851 16.975v10.717c.039 1.751 1.767 3.16 3.896 3.16h.771l.008.582h-13.708l.01-.582h.771c2.131 0 3.855-1.409 3.897-3.16v-10.799l-12.409-16.926c-1.37-1.785-3.578-2.934-6.134-2.934h-.827v-.583h15.541v.583h-.768c-1.806 0-2.847 1.438-2.29 2.782l9.741 15.106 10.399-15.043c.692-1.449-.459-2.847-2.287-2.847h-.768v-.583l14.013.002z"/></svg>
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

        <?php if ($page['header']): ?>
          <?php print render($page['header']); ?>
        <?php endif; ?>
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
