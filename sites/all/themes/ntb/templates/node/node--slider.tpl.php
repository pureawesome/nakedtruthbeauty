<?php
/**
 * @file
 * Slide view mode node template.
 */
?>
<div class="slider">
  <a href="/<?php print $link; ?>" class="slider-image panel-panel panel-col col-sm-6" style="background-image: url('<?php print $image; ?>')">
    <div class="sr-only">
      <?php print $title; ?>
    </div>
  </a>
  <div class="content panel-panel panel-col col-sm-6" style="background: <?php if (isset($hex0)): ?><?php print $hex0; ?><?php endif; ?>">
    <h3 class='title'<?php if (isset($hex1)): ?> style="color: <?php print $hex1; ?>"<?php endif; ?>>
      <?php print l($title, $link, array('html' => FALSE)); ?>
    </h3>
    <div class="marquee-body"<?php if (isset($hex2)): ?> style="<?php print $hex2; ?>"<?php endif; ?>>
      <?php print render($content['body']); ?>
    </div>
  </div>
</div>
