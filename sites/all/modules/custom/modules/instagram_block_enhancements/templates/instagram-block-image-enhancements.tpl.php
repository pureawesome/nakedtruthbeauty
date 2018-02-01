<?php

/**
 * @file
 * Default theme implementation of an Instagram image link.
 *
 * Available variables:
 * - post: The entire data array returned from the Instagram API request.
 * - href: The url to the Instagram post page.
 * - src: The source url to the instagram image.
 * - width: The display width of the image.
 * - height: The display height of the image.
 */
?>
<a class="group" target="_blank" data-instagram-rel="1" href="<?php print $href ?>" rel="noopener">
  <img class="lazy-img" alt="<?php print $post->caption->text; ?>" style="float: left; margin: 0 5px 5px 0px; width: <?php print $width ?>px; height: <?php print $height ?>px;" src="<?php print $loading ?>" data-src="<?php print $src ?>">
  <span class="sr-only"><?php print $post->caption->text; ?></span>
</a>
