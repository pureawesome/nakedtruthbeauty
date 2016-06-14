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
  <div class="title">
    <h3>
      <?php if (isset($title)): ?>
        <?php print l($title, $node_url, array('html' => FALSE)); ?>
      <?php else: ?>
        <?php print $title; ?>
      <?php endif; ?>
    </h3>
  </div>
</div>
