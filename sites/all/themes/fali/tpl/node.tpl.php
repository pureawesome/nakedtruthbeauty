<?php
/**
 * @file
 * Default theme implementation to display a node.
 */
global $base_root, $base_url;

  $style = 'large'; //image style
  if(isset($node->field_image)){
  $imageone = @$node->field_image['und'][0]['uri'];
  }else{
  $imageone = '';
  }

  if(!$page){ ?>

  <?php
  } else {
  ?>
  <?php if(@$node->field_image){ ?>
  <div class="page-entry-thumb">
    <?php print theme('image', array('path' => $imageone, 'style_name' => '', 'attributes'=>array('alt'=>$title)));?>
  </div>
  <?php } ?>
  <div class="page-entry-content content">
    <?php
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      hide($content['field_image']);
      hide($content['field_categories']);
      print render($content);
    ?>
    </div>
  <!-- End main content -->
  <?php
  }

?>