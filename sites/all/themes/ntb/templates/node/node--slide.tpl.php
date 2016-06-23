<?php
/**
 * @file
 * Slide mode node template.
 */
?>
<div class="slide">
  <?php dpm($content); ?>
  <a href="<?php print $link; ?>">
    <?php if (isset($image)): ?>
      <div class="img">
        <?php print render($image); ?>
      </div>
    <?php endif; ?>
  </a>
  <div class="title">
    <h3>
      <?php print l($title, $link, array('html' => FALSE)); ?>
    </h3>
    <p>
      <?php print render($body); ?>
    </p>
  </div>
</div>
