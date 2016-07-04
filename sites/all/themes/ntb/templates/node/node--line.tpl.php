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
        <?php print $title; ?>
      <?php endif; ?>
    </h3>
  </div>
  <div class="content">
    <?php print render($content['body']); ?>
  </div>
</div>
