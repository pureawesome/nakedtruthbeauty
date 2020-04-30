<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-US"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en-US"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en-US"> <![endif]-->
<!--[if IE 9]>    <html class="no-js lt-ie10" lang="en-US"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php print $language->language; ?>"> <!--<![endif]-->

<head>
	<meta name='viewport' content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' />
	<title><?php print $head_title; ?></title>
	<!-- Stylesheet -->
	<?php print $styles; ?>
	<?php print $head; ?>
	<?php
		$tracking_code = theme_get_setting('tracking_code', 'fali');
		$custom_js = theme_get_setting('custom_js', 'fali');
		$custom_css = theme_get_setting('custom_css', 'fali');
		print $tracking_code;
		if(!empty($custom_css)):
	?>
		<style type="text/css" media="all">
			<?php print $custom_css;?>
		</style>
	<?php
		endif;
	?>
</head>
<body class="<?php print $classes;?>" <?php print $attributes;?>>
	<div id="skip-link">
		<a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
	</div>

	<!-- SITE CONTENT -->
		<?php print $page_top; ?><?php print $page; ?><?php print $page_bottom; ?>
	<!-- end #site-content -->

	<?php
		print $scripts;
		if(!empty($custom_js)){
	?>
	<script type="text/javascript">
		<?php print_r($custom_js); ?>
	</script>
	<?php
		}
	?>
</body>
</html>