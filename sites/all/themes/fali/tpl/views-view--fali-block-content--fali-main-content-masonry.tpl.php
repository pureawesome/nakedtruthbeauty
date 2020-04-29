<?php
	$urlOptions = array('absolute' => TRUE);
	$resultHTML = '';

	if ($rows){

		$resultHTML .= '<div class="post-result"><div class="post-line-heading"></div><div class="blog-masonry-wrapper"><div class="isotopewrapper">';
		foreach ($view->result as $nodeData){

			$nodeFData = $nodeData->_field_data['nid']['entity'];
			
			$title = $nodeFData->title;
			$node_url = url('node/'.$nodeData->nid,$urlOptions);

			// SET CLASS, DATA 'data-article-type' FOR article html element
			// AND
			// SET CLASS FOR Div 'feature-holder'
			$articleType = 'standard';
			if(isset($nodeFData->field_format_type['und'][0]['value']) && $nodeFData->field_format_type['und'][0]['value']!='')
				$articleType = $nodeFData->field_format_type['und'][0]['value'];
			$classFormat = '';

			if($articleType=='standard')
				$classFormat = 'format-standard';
			elseif($articleType=='gallery')
				$classFormat = 'format-gallery post_format-post-format-gallery';
			elseif($articleType=='vimeo' || $articleType=='youtube' || $articleType=='soundcloud' || $articleType=='music')
				$classFormat = 'format-video post_format-post-format-video';

			// LIST CATEGORY
			$nodeCate = '';
			foreach ($nodeData->field_field_category as $category) {
				if($nodeCate != '')
					$nodeCate .= ', ';
				$taxTerm = taxonomy_term_uri($category['raw']['taxonomy_term']);
				$nodeCate .= '<a href="'.url($taxTerm['path'], $urlOptions).'">';
				$nodeCate .= $category['raw']['taxonomy_term']->name;
				$nodeCate .= '</a>';
			}

			// CREATE CONTENT FOR Div "feature-holder"
			$featureHolderHTML = '';
			$imageStyleName = 'image_540x317';

			$nodeStandardImgURI = $nodeFData->field_image['und'][0]['uri'];
			$nodeStandardImgALT = $nodeFData->field_image['und'][0]['alt'];
			$featureHolderHTML .= '<a href="'.$node_url.'" title="'.$title.'">';
			$featureHolderHTML .= theme('image_style', array('path' => $nodeStandardImgURI, 'style_name' => $imageStyleName, 'attributes'=>array('alt'=>$nodeStandardImgALT)));
			$featureHolderHTML .= '</a>';

			// RETURN HTML
			$resultHTML .= '<div class="article-masonry-container">';
			$resultHTML .= '<article class="'.$classFormat.' article-masonry-box post type-post status-publish has-post-thumbnail hentry">';
			$resultHTML .= '<div class="article-masonry-wrapper clearfix">';

			$resultHTML .= '<div class="feature-holder">';
			$resultHTML .= $featureHolderHTML;
			$resultHTML .= '</div>';

			if($nodeCate!=''){
				$resultHTML .= '<div class="content-meta"><span class="meta-category">';
				$resultHTML .= $nodeCate;
				$resultHTML .= '</span></div>';
			}

			$resultHTML .= '<h2><a href="'.$node_url.'" rel="bookmark">'.$title.'</a></h2>';

			
			if(strlen($nodeFData->body['und'][0]['summary'])>135)
				$summary = substr($nodeFData->body['und'][0]['summary'],0,135).'...';
			else
				$summary = $nodeFData->body['und'][0]['summary'];
			$resultHTML .= '<div class="article-masonry-summary"><p>';
			$resultHTML .= $summary;
			$resultHTML .= '</p></div></div></article></div>';

		}
		$resultHTML .= '</div></div></div>';

	}elseif($empty){

		$resultHTML .= '<div class="view-empty">'.$empty.'</div>';
	}

	print $resultHTML;

	if($pager) print $pager;
?>