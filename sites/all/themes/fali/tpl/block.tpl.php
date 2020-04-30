<?php
	$out = '';

	if($block->region == 'home_top_content' || $block->region == 'header_socials' || ($block->region == 'content' && $is_front)){
		$out .= '<div class="'.$classes.'"  '.$attributes.' >';
		$out .= render($title_suffix);
		$out .= $content;
		$out .= '</div>';

	}elseif($block->region == 'main_menu'){
		$out .= '<div class="navigation '.$classes.'"  '.$attributes.' >';
		$out .= render($title_suffix);
		$out .= $content;
		$out .= '</div>';

	}elseif($block->region == 'related_posts'){
		$out .= '<div class="'.$classes.'"  '.$attributes.' >';
		$out .= render($title_suffix);

		if ($block->subject):
			$out .= '<div class="wrap">';
			$out .= '<div class="post-section-title">'.$block->subject.'</div></div>';
		endif;

		$out .= $content;
		$out .= '<div class="cleared"></div></div><div class="cleared"></div>';

	}elseif($block->region == 'sidebar_first' || $block->region == 'sidebar_second'){
		$out .= '<aside class="widget '.$classes.'" '.$attributes.'>';
		$out .= render($title_suffix);

		if($block->subject)
			$out .= '<h3 class="widget-title"><span>'.$block->subject.'</span></h3>';

		$out .= $content;
		$out .= '</aside>';

	}elseif($block->region == 'contact'){
		$out .= '<div class="'.$classes.'" '.$attributes.' >';
		$out .= render($title_suffix);

	   	if ($block->subject)
			$out .= '<h3>'.$block->subject.'</h3>';

		$out .= $content;

		$out .= '</div>';

	}elseif($block->region == 'subscribe_footer'){
		$out .= '<div class="' .$classes.'" '.$attributes.'>';
		$out .= render($title_suffix);

		if ($block->subject)
			$out .= '<h2>'.$block->subject.'</h2>';
		
		$out .= $content;
		$out .= '</div>';

	}elseif($block->region == 'footer'){
		$out .= '<div class="grid one-third">';
		$out .= '<div class="footerwidget '.$classes.'" '.$attributes.'>';
		$out .= render($title_suffix);
		
		if ($block->subject)
			$out .= '<h3 class="footerwidget-title"><span>'.$block->subject.'</span></h3>';
		
		$out .= $content;
		$out .= '</div></div>';

	}elseif($block->region == 'content_end'){
		$out .= '<div class="'.$classes.'"  '.$attributes.'>';
		$out .= render($title_suffix);
		
		if ($block->subject)
			$out .= '<h2>'.$block->subject.'</h2>';

		$out .= $content;
		$out .= '</div>';


	}else{
		$out .= '<div id="'.$block_html_id.'" class="'.$classes.'" '.$attributes.'>';
		$out .= render($title_suffix);

		if ($block->subject)
			$out .= '<h5>'.$block->subject.'</h5>';

		$out .= $content;
		$out .= '</div>';
	}

	print $out;
?>