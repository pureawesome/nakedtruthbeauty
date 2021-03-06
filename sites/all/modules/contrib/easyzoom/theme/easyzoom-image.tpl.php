<?php

/**
 * @file
 * Template for an Image Zoom image.
 *
 * Available variables:
 * - $image: The image.
 * - $zoom_image_url: The path to the zoom image.
 * - $class: The wrapper div classes.
 */
?>

<div class="<?php print $class; ?>">
  <a href="<?php print $zoom_image_url; ?>">
    <?php print render($image); ?>
  </a>
</div>
