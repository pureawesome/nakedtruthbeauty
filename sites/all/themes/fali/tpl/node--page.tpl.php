<?php
	if(!$page){
		print '<div class="view-empty">'.$empty.'</div>';
	}else{
		$basicPageHTML = '';
		$bacsicPageBody = '';
		if(isset($node->body['und'])) 
			$bacsicPageBody = check_markup($node->body['und'][0]['value'],$node->body['und'][0]['format']);

		if(!$node->field_disable_page_title){
			$postHasThumbnail = false;
			$classForArticle = '';
			if(isset($node->field_image['und'][0]['uri']) && $node->field_image['und'][0]['uri']!=''){
				$imageURI = $node->field_image['und'][0]['uri'];
				$imageALT = $node->field_image['und'][0]['alt'];
				$postHasThumbnail = true;
				$classForArticle = 'has-post-thumbnail ';
			}

			$basicPageHTML .= '<article class="'.$classForArticle.'full-content enable-pin-share page type-page status-publish hentry">';

			if($node->title != '' || $postHasThumbnail){
				$basicPageHTML .= '<div class="content-header-single">';
				if($node->title != '')
					$basicPageHTML .= '<h1 class="content-title">'.$node->title.'</h1><span class="content-separator"></span>';
				
				if ($postHasThumbnail){
					$basicPageHTML .= '<div class="feature-holder">';
					$basicPageHTML .= theme('image_style', array('path' => $imageURI,  'style_name' => 'image_1024x640', 'attributes'=>array('alt'=>$imageALT)));
					$basicPageHTML .= '</div>';
				}
				$basicPageHTML .= '</div>';
			}
			
			$basicPageHTML .= '<div class="entry clearfix">'.$bacsicPageBody.'</div>';
			$basicPageHTML .= '</article>';
		}else{
			$basicPageHTML .= $bacsicPageBody;
		}
		
		print $basicPageHTML;
	}
?>