<?php
/**
 * @file
 * Blog Teaser view mode node template.
 */
?>
<div class="blog-teaser <?php print $type; ?>">
  <?php if (isset($title)): ?>
    <div class="title">
      <h3>
        <?php print l($title, $node_url, array('html' => TRUE)); ?>
      </h3>
    </div>
  <?php endif; ?>
  <?php if (isset($image)): ?>
    <div class="img">
      <?php print l(render($image), $node_url, array('html' => TRUE)); ?>
    </div>
  <?php endif; ?>
  <div class="content">
    <div class="description">
      <?php print render($text); ?>
      <span class="read-more"><?php print l(t('Read More'), $node_url); ?></span>
    </div>
  </div>
</div>
