<?php
/**
 * @file
 * Square Tile view mode node template.
 */
?>
<div class="tile <?php print $type; ?>">
  <?php if (isset($image)): ?>
    <div class="img">
      <?php print l(render($image), $node_url, array('html' => TRUE)); ?>
    </div>
  <?php endif; ?>
  <div class="title">
    <h3>
      <?php if (isset($title)): ?>
        <?php print l($title, $node_url, array('html' => TRUE)); ?>
      <?php else: ?>
        <?php print $title; ?>
      <?php endif; ?>
    </h3>
  </div>
</div>
