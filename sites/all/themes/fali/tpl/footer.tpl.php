<div class="footer-margin"></div>

<?php
	$footerSubscribe = '';
    if($page['subscribe_footer'] && theme_get_setting('show_subscribe_form', 'fali')){
        $footerSubscribe .= '<div class="subscribe-footer">';
        $footerSubscribe .= render($page['subscribe_footer']);
        $footerSubscribe .= '</div>';
    }

    $footerCopyright =  theme_get_setting('copyright', 'fali');
?>

<?php print $footerSubscribe; ?>

<div id="footer" class="second-footer">
	<?php if($page['footer']): ?>
		<div class="footer-widget">
			<div class="container clearfix">
				<?php print render($page['footer']); ?>
			</div>
		<div class="clear"></div>
		</div>
	<?php
		endif;
		if($footerCopyright!=''):
	?>
		<div class="footer-bottom">
			<div class="container">
				<div class="social-copy"><span><?php print $footerCopyright; ?></span></div>
				<div class="clear"></div>
			</div>
		</div>
	<?php endif; ?>
</div>