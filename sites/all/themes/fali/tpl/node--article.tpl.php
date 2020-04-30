<?php

  /**
  * @file
  * Default theme implementation to display a node.
  *
  * Available variables:
  * - $title: the (sanitized) title of the node.
  * - $content: An array of node items. Use render($content) to print them all,
  *   or print a subset such as render($content['field_example']). Use
  *   hide($content['field_example']) to temporarily suppress the printing of a
  *   given element.
  * - $user_picture: The node author's picture from user-picture.tpl.php.
  * - $date: Formatted creation date. Preprocess functions can reformat it by
  *   calling format_date() with the desired parameters on the $created variable.
  * - $name: Themed username of node author output from theme_username().
  * - $node_url: Direct URL of the current node.
  * - $display_submitted: Whether submission information should be displayed.
  * - $submitted: Submission information created from $name and $date during
  *   template_preprocess_node().
  * - $classes: String of classes that can be used to style contextually through
  *   CSS. It can be manipulated through the variable $classes_array from
  *   preprocess functions. The default values can be one or more of the
  *   following:
  *   - node: The current template type; for example, "theming hook".
  *   - node-[type]: The current node type. For example, if the node is a
  *     "Blog entry" it would result in "node-blog". Note that the machine
  *     name will often be in a short form of the human readable label.
  *   - node-teaser: Nodes in teaser form.
  *   - node-preview: Nodes in preview mode.
  *   The following are controlled through the node publishing options.
  *   - node-promoted: Nodes promoted to the front page.
  *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser
  *     listings.
  *   - node-unpublished: Unpublished nodes visible only to administrators.
  * - $title_prefix (array): An array containing additional output populated by
  *   modules, intended to be displayed in front of the main title tag that
  *   appears in the template.
  * - $title_suffix (array): An array containing additional output populated by
  *   modules, intended to be displayed after the main title tag that appears in
  *   the template.
  *
  * Other variables:
  * - $node: Full node object. Contains data that may not be safe.
  * - $type: Node type; for example, story, page, blog, etc.
  * - $comment_count: Number of comments attached to the node.
  * - $uid: User ID of the node author.
  * - $created: Time the node was published formatted in Unix timestamp.
  * - $classes_array: Array of html class attribute values. It is flattened
  *   into a string within the variable $classes.
  * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
  *   teaser listings.
  * - $id: Position of the node. Increments each time it's output.
  *
  * Node status variables:
  * - $view_mode: View mode; for example, "full", "teaser".
  * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
  * - $page: Flag for the full page state.
  * - $promote: Flag for front page promotion state.
  * - $sticky: Flags for sticky post setting.
  * - $status: Flag for published status.
  * - $comment: State of comment settings for the node.
  * - $readmore: Flags true if the teaser content of the node cannot hold the
  *   main body content.
  * - $is_front: Flags true when presented in the front page.
  * - $logged_in: Flags true when the current user is a logged-in member.
  * - $is_admin: Flags true when the current user is an administrator.
  *
  * Field variables: for each field instance attached to the node a corresponding
  * variable is defined; for example, $node->body becomes $body. When needing to
  * access a field's raw values, developers/themers are strongly encouraged to
  * use these variables. Otherwise they will have to explicitly specify the
  * desired field language; for example, $node->body['en'], thus overriding any
  * language negotiation rule that was previously applied.
  *
  * @see template_preprocess()
  * @see template_preprocess_node()
  * @see template_process()
  *
  * @ingroup themeable
  */
  $urlOptions = array('absolute' => TRUE);

  // SET CLASS, DATA 'data-article-type' FOR article html element
  // AND
  // SET CLASS FOR Div 'feature-holder'
  $articleType = 'standard';
  if(isset($node->field_format_type['und'][0]['value']) && $node->field_format_type['und'][0]['value']!='')
    $articleType = $node->field_format_type['und'][0]['value'];
  $classFormat = '';
  $dataArticleType = '';
  $classFeatureHolder = '';
  if($articleType=='standard' || $articleType=='soundcloud' || $articleType=='music'){

    $classFormat = 'format-standard';
    if($articleType=='music') $classFeatureHolder = 'audio';
    if($articleType=='soundcloud') $classFeatureHolder = 'video';

  }elseif($articleType=='vimeo' || $articleType=='youtube'){

    $classFormat = 'format-video';
    $dataArticleType = 'video';
    $classFeatureHolder = 'video';

  }elseif($articleType=='gallery'){

    $classFormat = 'format-gallery';
    $dataArticleType = 'gallery';
    $classFeatureHolder = 'galleries';
  }

  // Author
  $authorLink = url('user/'.$uid,$urlOptions);
  $authorName = $node->name;

  // GET CREATED DATE format: F j, Y (January 5, 2015)
  $createdDate = format_date($created,'medium','F j, Y',NULL,NULL);

  // LIST CATEGORY
  $nodeCate = '';
  foreach($node->field_category['und'] as $categories){

    if($nodeCate != '')
      $nodeCate .= ', ';

    $category = taxonomy_term_load($categories['tid']);
    $taxTerm = taxonomy_term_uri($category);
    $nodeCate .= '<a href="'.url($taxTerm['path'], $urlOptions).'">';
    $nodeCate .= $category->name;
    $nodeCate .= '</a>';
  }

  // CREATE CONTENT FOR Div "feature-holder"
  $featureHolderHTML = '';
  if(!$page){
    $imageStyleName = 'image_1024x710';
    if(theme_get_setting('homepage_layout', 'fali')=='masonry' && drupal_is_front_page())
      $imageStyleName = 'image_540x317';
  }else{
    $imageStyleName = 'image_1024x768';
  }

  $nodeStandardImg ='';
  $nodeStandardImgALT ='';
  if(isset($node->field_image['und'][0]['alt']))
    $nodeStandardImgALT = $node->field_image['und'][0]['alt'];
  if(isset($node->field_image['und'][0]['uri']))
    $nodeStandardImg= theme('image_style', array('path' => $node->field_image['und'][0]['uri'], 'style_name' => $imageStyleName, 'attributes'=>array('alt'=>$nodeStandardImgALT)));

  if(theme_get_setting('homepage_layout', 'fali')=='masonry' && drupal_is_front_page()){

    $featureHolderHTML .= '<a href="'.$node_url.'" title="'.$title.'">';
    $featureHolderHTML .= $nodeStandardImg;
    $featureHolderHTML .= '</a>';

  }else{

    if(($articleType=='soundcloud' && isset($node->field_soundcloud_url['und'][0]['value'])) || ($articleType=='vimeo'  && isset($node->field_vimeo_video_url['und'][0]['value'])) || ($articleType=='youtube' && isset($node->field_youtube_video_url['und'][0]['value']))){

      $videoSrc = '';
      $videoContainerClass = '';

      if($articleType=='soundcloud'){
        $videoSrc = $node->field_soundcloud_url['und'][0]['value'];
        $videoContainerClass = 'music-container';

      }elseif($articleType=='vimeo'){
        $videoSrc = $node->field_vimeo_video_url['und'][0]['value'];
        $videoContainerClass = 'video-container';

      }elseif($articleType=='youtube'){
        $videoSrc = $node->field_youtube_video_url['und'][0]['value'];
        $videoContainerClass = 'video-container';
      }

      $featureHolderHTML .= '<div data-src="'.$videoSrc.'" data-type="'.$articleType.'" data-repeat="false" data-autoplay="false" class="'.$articleType.'-class">';
      $featureHolderHTML .= '<div class="'.$videoContainerClass.'"></div>';
      $featureHolderHTML .= '</div>';

    }elseif($articleType=='gallery' && count($node->field_image['und'])>1){

      $featureHolderHTML .= '<div class="flexslider"><ul class="slides">';
      foreach ($node->field_image['und'] as $gallery) {
        $featureHolderHTML .= '<li>';
        $featureHolderHTML .= theme('image_style', array('path' => $gallery['uri'], 'style_name' => $imageStyleName, 'attributes'=>array('alt'=>$gallery['alt'])));
        $featureHolderHTML .= '</li>';
      }
      $featureHolderHTML.= '</ul></div>';

    }else{

      if(!$page)
        $featureHolderHTML .= '<a href="'.$node_url.'" title="'.$title.'">';
      $featureHolderHTML .= $nodeStandardImg;
      if(!$page)
        $featureHolderHTML .= '</a>';

      if($articleType=='music' && isset($node->field_music['und'][0]['uri'])){
        $musicURI = $node->field_music['und'][0]['uri'];
        $featureHolderHTML .= '<div data-mp3="'.file_create_url($musicURI).'" data-type="audio" class="audio-class"></div>';
      }
    }

  }

  // SOCIALS SHARE BLOCK
  $socialShare = '';
  $socialShareBlockTitle = t('Share this article');
  $socialShareURL = urlencode(url('node/'.$node->nid,$urlOptions));
  $socialShareSummary = urlencode($node->body['und'][0]['summary']);
  $socialShareTitle = urlencode($title);
  $socialShareImage = urlencode($nodeStandardImg);
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

<?php
  if(!$page){
    if(theme_get_setting('homepage_layout', 'fali')=='masonry' && drupal_is_front_page()){
?>
    <!-- PRINT DATA FOR ARTICLE LIST PAGE -->
    <!-- MASONRY LAYOUT -->
    <div class="article-masonry-container">
      <article class="<?php print $classFormat; ?> article-masonry-box post type-post status-publish has-post-thumbnail hentry">
        <div class="article-masonry-wrapper clearfix">
          <div class="feature-holder">
            <?php print $featureHolderHTML; ?>
          </div>
          <?php if($nodeCate!=''): ?>
            <div class="content-meta"><span class="meta-category">
              <?php print $nodeCate; ?>
            </span></div>
          <?php endif; ?>
          <h2><a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a></h2>
          <div class="article-masonry-summary"><p>
            <?php
              if(strlen($node->body['und'][0]['summary'])>135)
                $summary = substr($node->body['und'][0]['summary'],0,135).'...';
              else
                $summary = $node->body['und'][0]['summary'];
              print $summary;
            ?>
          </p></div>
        </div>
      </article>
    </div>
<?php
    }else{
?>
    <!-- NORNAL LAYOUT -->
    <article class="<?php print $classFormat; ?> short-content post type-post status-publish has-post-thumbnail hentry" data-article-type="<?php print $dataArticleType; ?>">
      <div class="content-header-single">
        <div class="content-meta">
          <span class="meta-author"><?php print t("By"); ?> <a href="<?php print $authorLink ?>"><?php print $authorName; ?></a></span>
          <span class="meta-date"><?php print $createdDate; ?></span>
          <?php if($nodeCate!=''): ?><span class="meta-category"><?php print t('in ').$nodeCate ?></span><?php endif; ?>
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
        <?php print $node->body['und'][0]['summary']; ?>
        <div class="readmore-wrap">
          <a href="<?php print $node_url; ?>" class="readmore"><?php print t("Continue Reading"); ?></a>
        </div>
      </div>
      <?php print $socialShare; ?>
    </article>
<?php
    }
  } else {

    // LIST TAGS
    $listTagsHTML = '';
    if(isset($node->field_tags['und'])){
      $tags = $node->field_tags['und'];
      $listTagsTitle = t('Article Tags');
      $listTags = '';
      $listTagsHTML .= '<div class="tag-wrapper"><i class="fa fa-tag"></i><strong>'.$listTagsTitle.'</strong> : ';
      foreach ($tags as $tag) {
        $tagId = $tag['tid'];
        $tagObj = taxonomy_term_load($tagId);
        $tagTermUri = taxonomy_term_uri($tagObj);
        if($listTags != '')
          $listTags .= ', ';
        $listTags .= '<a href="'.url($tagTermUri['path'], $urlOptions).'">';
        $listTags .= $tagObj->name;
        $listTags .= '</a>';
      }
      $listTagsHTML .= $listTags;
      $listTagsHTML .= '</div>';
    }
    // PREVIOUS & NEXT POST LINK
    $prevnextPostHTML = '';
    $nextPostHTML = '';
    $prevPostHTML = '';
    $nextPostData = node_sibling('next',$node);
    $prevPostData = node_sibling('previous',$node);
    if(is_array($nextPostData)){
      $nextPostUrl = url('node/' .$nextPostData['nid'], $urlOptions);
      $nextPostLabel = t('Next post');
      $nextPostHTML .= '<a href="'.$nextPostUrl.'" class="post next-post"><span class="caption">'.$nextPostLabel.'</span><h3 class="post-title">'.$nextPostData["title"].'</h3></a>';
    }
    if(is_array($prevPostData)){
      $prevPostUrl = url('node/' .$prevPostData['nid'], $urlOptions);
      $prevPostLabel = t('Prev post');
      $prevPostHTML .= '<a href="'.$prevPostUrl.'" class="post prev-post"><span class="caption">'.$prevPostLabel.'</span><h3 class="post-title">'.$prevPostData["title"].'</h3></a>';
    }
    $prevnextPostHTML .= '<div class="prevnext-post">';
    $prevnextPostHTML .= $prevPostHTML;
    $prevnextPostHTML .= $nextPostHTML;
    $prevnextPostHTML .= '<div class="clear"></div></div>';
    // RELATED ARTICLE
    $relatedArtcleHTML = '';
    if(!theme_get_setting('disable_right_related_box', 'fali')){
      $relatedArtcleTitle = t('Related ').$type;
      $relatedArtcleImageStyleName = 'image_120x120';
      $relatedAData = random_related_node_by_content_type($node,1,true);
      if(is_array($relatedAData)){
        $relatedArtcleHTML .= '<div class="related"><div class="arrow"><i class="fa fa-angle-left"></i></div><div class="content"><span>'.$relatedArtcleTitle.'</span>';
        
        foreach ($relatedAData as $article) {
          $replatedArticleURL = url('node/' .$article->nid, $urlOptions);
          $relatedArtcleHTML .= '<a href="'.$replatedArticleURL.'"><article>';
          if(isset($article->field_image['und'][0]['uri']))
            $relatedArtcleHTML .= '<div class="thumb">'.theme('image_style', array('path' => $article->field_image['und'][0]['uri'], 'style_name' => $relatedArtcleImageStyleName, 'attributes'=>array('alt'=>$article->field_image['und'][0]['alt']))).'</div>';
          $relatedArtcleHTML.= '<div class="summary" style=""><h2 class="heading" title="'.$article->title.'">'.$article->title.'</h2></div>';
          $relatedArtcleHTML .= '</article></a>';
        }
        
        $relatedArtcleHTML .='</div></div><div class="related-flag"></div>';
      } 
    }
    // AUTHOR INFORMATION
    $authorInfoHTML = '';
    $authorInfo = '';
    $authorFb = '';
    $authorTw = '';
    $authorGl = '';
    $authorPic = '';
    $authorImgStyleName = 'image_150x150';
    $authorData = user_load($uid);
    if($authorData){
      if(isset($authorData->field_user_info['und'][0]['value']) && $authorData->field_user_info['und'][0]['value']!='')
        $authorInfo = $authorData->field_user_info['und'][0]['value'];
      if(isset($authorData->field_facebook_link['und'][0]['value']) && $authorData->field_facebook_link['und'][0]['value']!='')
        $authorFb .= '<a href="'.$authorData->field_facebook_link['und'][0]['value'].'" class="facebook"><i class="fa fa-facebook-square"></i></a>';
      if(isset($authorData->field_twitter_link['und'][0]['value']) && $authorData->field_twitter_link['und'][0]['value']!='')
        $authorTw .= '<a href="'.$authorData->field_twitter_link['und'][0]['value'].'" class="twitter"><i class="fa fa-twitter"></i></a>';
      if(isset($authorData->field_google_link['und'][0]['value']) && $authorData->field_google_link['und'][0]['value']!='')
        $authorFb .= '<a href="'.$authorData->field_google_link['und'][0]['value'].'" class="google-plus"><i class="fa fa-google-plus"></i></a>';
      if(isset($authorData->picture->uri) && $authorData->picture->uri!='')
        $authorPic = theme('image_style', array('path' => $authorData->picture->uri, 'style_name' => $authorImgStyleName, 'attributes'=>array('alt'=>$authorName)));   
      $authorInfoHTML .= '<div class="author-box clearfix">';
      $authorInfoHTML .= $authorPic;
      $authorInfoHTML .= '<div class="author-box-wrap">';
      $authorInfoHTML .= '<h5>'.$authorName.'</h5><p>'.$authorInfo.'</p>';
      $authorInfoHTML .= '<p class="author-link"><a target="_blank" href="'.$authorLink.'"><i class="fa fa-link"></i></a></p>';
      $authorInfoHTML .= '<div class="author-socials">';
      $authorInfoHTML .= $authorFb.$authorTw.$authorGl;    
      $authorInfoHTML .= '</div></div></div>';
    }
    // RELATED POSTS
    $relatedPostsHTML = '';
    $relatedPostsTitle = t('Related Posts');
    $relatedPostsImageStyleName = 'image_348x278';
    $relatedAData = random_related_node_by_taxonomy($node,4,true);
    if(is_array($relatedAData)){
      $relatedPostsHTML .= '<div id="related-post">';
      $relatedPostsHTML .= '<div class="meta-article-header"><span>'.$relatedPostsTitle.'</span></div>';
      $relatedPostsHTML .= '<div class="related-post-bottom">';

      $i=1;
      foreach ($relatedAData as $relatedPost){
        $relatedPostImg = '';
        $relatedPostURL = url('node/'.$relatedPost->nid,$urlOptions);
        $relatedPostCreated = t('On').' '.format_date($relatedPost->created,'medium','F j, Y',NULL,NULL);

        if(isset($relatedPost->field_image['und'][0]['uri']) && $relatedPost->field_image['und'][0]['uri']!='')
          $relatedPostImg .= theme('image_style', array('path' => $relatedPost->field_image['und'][0]['uri'], 'style_name' => $relatedPostsImageStyleName, 'attributes'=>array('alt'=>$relatedPost->title)));

        $relatedPostsHTML .= '<div class="grid one-forth item';
        if($i==1||$i%4==1)
          $relatedPostsHTML .= ' first';
        elseif($i%4==0)
          $relatedPostsHTML .= ' last';
        $i++;
        $relatedPostsHTML .= '"><div class="feature-holder"><a href="'.$relatedPostURL.'">'.$relatedPostImg.'</a></div>';
        $relatedPostsHTML .= '<div class="related-excerpt"><h3><a href="'.$relatedPostURL.'">'.$relatedPost->title.'</a></h3><i>'.$relatedPostCreated.'</i></div>';
        $relatedPostsHTML .= '</div>';
      }

      $relatedPostsHTML .= '</div></div>';
    }
?>
  <!-- PRINT DATA FOR ARTICLE DETAILS PAGE -->
    <article class="format-standard full-content post type-post status-publish has-post-thumbnail hentry enable-pin-share">
      <div class="content-header-single">
        <div class="content-meta">
          <span class="meta-author"><?php print t("By")?> <a href="<?php print $authorLink; ?>"><?php print $authorName; ?></a></span>
          <span class="meta-date"><?php print $createdDate; ?></span>
          <?php if($nodeCate!=''): ?><span class="meta-category"><?php print t('in ').$nodeCate ?></span><?php endif; ?>
        </div>
        <h1 class="content-title"><?php print $title; ?></h1>
        <span class="content-separator"></span>
        <div class="feature-holder <?php print $classFeatureHolder; ?>">
          <?php print $featureHolderHTML; ?>
        </div>
      </div>
      <aside class="aside-post">
        <h6 class="aside-heading"><?php print t("People Also Read"); ?></h6>
        <div class="aside-post-list">
          <?php echo views_embed_view('fali_block_content', $display_id = 'fali_people_also_read'); ?>
        </div>
      </aside>
      <div class="entry clearfix">
        <?php 
          // hide($content['comments']);
          // print render($content);
          print check_markup($node->body['und'][0]['value'],$node->body['und'][0]['format']);
        ?>
      </div>
    </article>
    <?php print $listTagsHTML; ?>
    <?php print $socialShare; ?>
    <?php print $prevnextPostHTML; ?>
    <?php print $relatedArtcleHTML; ?>
    <?php print $authorInfoHTML; ?>
    <?php print $relatedPostsHTML; ?>
    <?php print render($content['comments']); ?>
<?php
  }
?>