<?php

/**
 * @file
 * Default theme implementation to display a node.
 *
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <div class="submitted">
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>

  <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
  ?>
  <div class="row">
    <div class="panel-panel panel-col col-sm-6 col-sm-offset-3">
      <?php print render($content['field_primary_image']); ?>
    </div>
  </div>
  <div class="row">
    <div class="panel-panel panel-col col-sm-10 col-sm-offset-1">
      <?php print render($content['body']); ?>
    </div>
  </div>

  <?php print render($content['links']); ?>

  <?php print render($content['comments']); ?>

</div>
