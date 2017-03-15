<?php

/**
 * @file
 * Search Template.
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>


  <div class="content"<?php print $content_attributes; ?>>
    <?php if (isset($image)): ?>
      <div class="img">
        <?php print render($image); ?>
      </div>
    <?php endif; ?>

    <?php if (isset($body)): ?>
      <div class="body">
        <p>
          <?php print render($body); ?>
        </p>
      </div>
    <?php endif; ?>
  </div>


</div>
