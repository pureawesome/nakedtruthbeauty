<?php
/**
 * @file
 * Line view mode node template.
 */
?>
<div class="line <?php print $type; ?>">
  <?php if (isset($image)): ?>
    <div class="img">
      <?php print render($image); ?>
    </div>
  <?php endif; ?>
  <div class="content">
    <div class="title">
      <h3>
        <?php if (isset($title)): ?>
          <?php print l($title, $node_url, array('html' => FALSE)); ?>
        <?php endif; ?>
      </h3>
    </div>
    <div class="description">
      <?php print render($text); ?>
      <span class="read-more"><?php print l(t('Read More'), $node_url); ?></span>
    </div>
  </div>
</div>
