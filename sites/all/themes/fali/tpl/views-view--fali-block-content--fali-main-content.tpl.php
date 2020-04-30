<?php
$urlOptions = array('absolute' => TRUE);

if ($rows):
	foreach ($view->result as $nodeData):

		$nodeFData = $nodeData->_field_data['nid']['entity'];

		$title = $nodeFData->title;
		$authorName = $nodeData->users_node_name;
		$authorLink = url('user/'.$nodeData->users_node_uid,$urlOptions);
		$node_url = url('node/'.$nodeData->nid,$urlOptions);

		// SET CLASS, DATA 'data-article-type' FOR article html element
		// AND
		// SET CLASS FOR Div 'feature-holder'
		$articleType = 'standard';
		if(isset($nodeFData->field_format_type['und'][0]['value']) && $nodeFData->field_format_type['und'][0]['value']!='')
			$articleType = $nodeFData->field_format_type['und'][0]['value'];
		$classFormat = '';
		$dataArticleType = '';
		$classFeatureHolder = '';
		if($articleType=='standard' || $articleType=='soundcloud' || $articleType=='music'){

			$classFormat = 'format-standard';
			if($articleType=='soundcloud')
				$classFeatureHolder = 'video';

		}elseif($articleType=='vimeo' || $articleType=='youtube'){

			$classFormat = 'format-video';
			$dataArticleType = 'video';
			$classFeatureHolder = 'video';

		}elseif($articleType=='gallery'){

			$classFormat = 'format-gallery';
			$dataArticleType = 'gallery';
			$classFeatureHolder = 'galleries';
		}

		// GET CREATED DATE format: F j, Y (January 5, 2015)
		$createdDate = format_date($nodeData->node_created, $type = 'medium', $format = 'F j, Y', $timezone = NULL, $langcode = NULL);

		// LIST CATEGORY
		$nodeCate = '';
		foreach ($nodeData->field_field_category as $category) {

			if($nodeCate != '')
				$nodeCate .= ', ';
			else
				$nodeCate .= 'in ';
			
			$taxTerm = taxonomy_term_uri($category['raw']['taxonomy_term']);
			$nodeCate .= '<a href="'.url($taxTerm['path'], $urlOptions).'">';
			$nodeCate .= $category['raw']['taxonomy_term']->name;
			$nodeCate .= '</a>';
		}

		// CREATE CONTENT FOR Div "feature-holder"
		$featureHolderHTML = '';
		$imageStyleName = 'image_1024x710';

		if($articleType=='soundcloud' && is_array($nodeFData->field_soundcloud_url)){

			$soundcloudURL = $nodeFData->field_soundcloud_url['und'][0]['value'];
			$featureHolderHTML .= '<div data-src="'.$soundcloudURL.'" data-type="soundcloud" data-repeat="false" data-autoplay="false" class="soundcloud-class"><div class="music-container"></div></div>';

		}elseif($articleType=='vimeo' && is_array($nodeFData->field_vimeo_video_url)){

			$vimeoURL = $nodeFData->field_vimeo_video_url['und'][0]['value'];
			$featureHolderHTML .= '<div data-src="'.$vimeoURL.'" data-repeat="false" data-autoplay="false" data-type="vimeo" class="vimeo-class"><div class="video-container"></div></div>';

		}elseif($articleType=='youtube' && is_array($nodeFData->field_youtube_video_url)){

			$youtubeURL = $nodeFData->field_youtube_video_url['und'][0]['value'];
			$featureHolderHTML .= '<div data-src="'.$youtubeURL.'" data-type="youtube" data-repeat="false" data-autoplay="false" class="youtube-class"><div class="video-container"></div></div>';

		}elseif($articleType=='gallery' && count($nodeFData->field_image['und'])>1){

			$featureHolderHTML .= '<div class="flexslider"><ul class="slides">';
			foreach ($nodeFData->field_image['und'] as $gallery) {
				$featureHolderHTML .= '<li>';
				$featureHolderHTML .= theme('image_style', array('path' => $gallery['uri'], 'style_name' => $imageStyleName, 'attributes'=>array('alt'=>$gallery['alt'])));
				$featureHolderHTML .= '</li>';
			}
			$featureHolderHTML.= '</ul></div>';

		}else{

			$nodeStandardImgURI = $nodeFData->field_image['und'][0]['uri'];
			$nodeStandardImgALT = $nodeFData->field_image['und'][0]['alt'];
			$featureHolderHTML .= '<a href="'.$node_url.'" title="'.$title.'">';
			$featureHolderHTML .= theme('image_style', array('path' => $nodeStandardImgURI, 'style_name' => $imageStyleName, 'attributes'=>array('alt'=>$nodeStandardImgALT)));
			$featureHolderHTML .= '</a>';

			if($articleType=='music'){
				$musicURI = $nodeFData->field_music['und'][0]['uri'];
				$featureHolderHTML .= '<div data-mp3="'.file_create_url($musicURI).'" data-type="audio" class="audio-class"></div>';
			}

		}
		// SOCIALS SHARE BLOCK
		$socialShare = '';
		$socialShareBlockTitle = t('Share this article');
		$socialShareURL = urlencode($node_url);
		$socialShareSummary = urlencode($nodeFData->body['und'][0]['summary']);
		$socialShareTitle = urlencode($title);
		$nodeStandardImgURL = '';
		if(isset($nodeFData->field_image['und'][0]['uri'])) 
			$nodeStandardImgURL = theme('image_style', array('path' => $nodeFData->field_image['und'][0]['uri'], 'style_name' => $imageStyleName, 'attributes'=>array('alt'=>$nodeFData->field_image['und'][0]['alt'])));
		$socialShareImage = urlencode($nodeStandardImgURL);
		$socialShare .= '<div class="sharing-wrapper bottom circle">';
		$socialShare .= '<div class="meta-article-header"><span>'.$socialShareBlockTitle.'</span></div>';
		$socialShare .= '<div class="sharing">';
		$socialShare .= '<div class="sharing-facebook"><a data-shareto="Facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u='.$socialShareURL.'"><i class="fa fa-facebook"></i></a></div>';
		$socialShare .= '<div class="sharing-twitter"><a data-shareto="Twitter" target="_blank" href="https://twitter.com/intent/tweet?source=webclient&amp;text='.$socialShareTitle.'&amp;url='.$socialShareURL.'"><i class="fa fa-twitter"></i></a></div>';
		$socialShare .= '<div class="sharing-google"><a data-shareto="Google" target="_blank" href="https://plus.google.com/share?url='.$socialShareURL.'&amp;title='.$socialShareTitle.'"><i class="fa fa-google"></i></a></div>';
		$socialShare .= '<div class="sharing-pinterest"><a data-shareto="Pinterest" target="_blank" href="#" data-href="http://www.pinterest.com/pin/create/button/?source_url='.$socialShareURL.'&amp;media='.$socialShareImage.'&amp;description='.$socialShareTitle.'"><i class="fa fa-pinterest"></i></a></div>';
		$socialShare .= '<div class="sharing-linkedin"><a data-shareto="Linkedin" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.$socialShareURL.'&amp;title='.$socialShareTitle.'&amp;summary='.$socialShareSummary.'&amp;source=Fali"><i class="fa fa-linkedin"></i></a></div>';
		$socialShare .= '</div></div>';
?>
		<article class="<?php print $classFormat; ?> short-content post type-post status-publish has-post-thumbnail hentry" data-article-type="<?php print $dataArticleType; ?>">
			<div class="content-header-single">
				<div class="content-meta">
					<span class="meta-author">
						By <a href="<?php print $authorLink; ?>"><?php print $authorName; ?></a>
					</span>
					<span class="meta-date"><?php print $createdDate; ?></span>
					<?php if($nodeCate!=''): ?>
						<span class="meta-category">
							<?php print $nodeCate ?>
						</span>
					<?php endif; ?>
				</div>
				<h2 class="content-title">
					<a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a>
				</h2>
				<span class="content-separator"></span>
				<div class="feature-holder <?php print $classFeatureHolder; ?>">
					<?php print $featureHolderHTML; ?>
				</div>
			</div>
			<div class="entry">
				<p>
					<?php print $nodeFData->body['und'][0]['summary']; ?>
				</p>
				<div class="readmore-wrap">
					<a href="<?php print $node_url; ?>" class="readmore">Continue Reading</a>
				</div>
			</div>
			<?php print $socialShare; ?>
		</article>
<?php
	endforeach;
elseif($empty):
	print '<div class="view-empty">'.$empty.'</div>';
endif;

if($pager) print $pager;
?>