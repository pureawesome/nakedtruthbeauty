<?php
	global $base_url;

	// CHECK LAYOUT TYPE

	$boxedBgImg = '';
	if(isset($node->field_boxed_content['und'][0]['value'])){
		if($node->field_boxed_content['und'][0]['value'])
			$layoutPageType = 'boxed';
		else
			$layoutPageType = 'full';
	}else{
		$layoutPageType = theme_get_setting('boxed_container', 'fali') ? 'boxed' : 'full';
	}
	if($layoutPageType == 'boxed'){

		if(theme_get_setting('boxed_bg_image', 'fali'))
			$boxedBgImg = file_create_url(file_load(theme_get_setting('boxed_bg_image', 'fali'))->uri);
		else
			$boxedBgImg = $base_url.'/'.path_to_theme().'/images/default-boxed-bg.jpg';
	}

	// CHECK ENABLE/DISABLE SIDE BAR
	if(isset($node->field_disable_side_bar['und'][0]['value'])){
		if($node->field_disable_side_bar['und'][0]['value'])
			$checkSidebar = 'fullwidth';
		else
			$checkSidebar = 'normal';	
	}else{
		$checkSidebar =  theme_get_setting('disable_sidebar', 'fali') ? 'fullwidth' : 'normal';
	}

	// CHECK ENABLE/DISABLE STICKY MENU
	if(isset($node->field_sticky_header['und'][0]['value'])){
		if($node->field_sticky_header['und'][0]['value'])
			$checkStickyHeader = '1';
		else
			$checkStickyHeader = '0';	
	}else{
		$checkStickyHeader = theme_get_setting('header_sticky', 'fali') ? '1' : '0';
	}
?>

<div id="wrapper" class="<?php print $layoutPageType; ?>" data-boxed-bg="<?php print $boxedBgImg; ?>">
	<!-- HEADER -->
	<?php require_once(drupal_get_path('theme','fali').'/tpl/header.tpl.php');?>

		<!-- SLIDERs & TRENDING POSTS -->
		<?php if($page['home_top_content']): ?>
			<?php print render($page['home_top_content']); ?>
		<?php endif; ?>

		<div id="post-wrapper" class="<?php print $checkSidebar; ?>" data-sticky-header="<?php print $checkStickyHeader; ?>">
			<div class="container">
				<?php 
					if (!empty($tabs['#primary']) || !empty($tabs['#secondary']))
						print render($tabs);
					print $messages;
		       		unset($page['content']['system_main']['default_message']);
					
					if(isset($node)):
				?>
					<span class="line-heading-single"></span>
				<?php endif; ?>
				
				<div class="post-container">
					<!-- MAIN CONTENT -->
					<?php
						if($page['content']):
				    ?>
						<div class="main-post">
							<?php
								$contentHTML = '';
								if(isset($page['content']['system_main']['pager']))
									$pager = $page['content']['system_main']['pager'];

								if(theme_get_setting('homepage_layout', 'fali')=='masonry' && drupal_is_front_page()){
									$contentHTML .= '<div class="post-result"><div class="post-line-heading"></div><div class="blog-masonry-wrapper"><div class="isotopewrapper">';
									if(isset($pager))
										hide($page['content']['system_main']['pager']);
								}
								
								$contentHTML .= render($page['content']);

								if(theme_get_setting('homepage_layout', 'fali')=='masonry' && drupal_is_front_page()){
									$contentHTML .= '</div></div>';
									if(isset($pager))
										$contentHTML .= render($pager);
									$contentHTML .= '</div>';
								}
								print $contentHTML;
							?>
						</div>
					<?php endif; ?>
					
					<!-- RIGHT SIDE BAR -->
					<?php if($page['sidebar_second'] && $checkSidebar=='normal'): ?>
						<div class="sidebar">	
							<div class="sidebar-container">
								<?php print render($page['sidebar_second']) ?>
							</div>
						</div>
					<?php endif; ?>
					<div class="clear"></div>
				</div>
			</div>
		</div>
					
	<!-- FOOTER -->
	<?php require_once(drupal_get_path('theme','fali').'/tpl/footer.tpl.php'); ?>
</div>