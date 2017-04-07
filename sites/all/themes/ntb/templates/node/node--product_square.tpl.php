<?php
/**
 * @file
 * Product Square Tile view mode node template.
 */
?>
<div class="tile product <?php print $type; ?>">
  <?php if (isset($image)): ?>
    <div class="img">
      <?php print render($image); ?>
    </div>
  <?php endif; ?>

  <div class="title">
    <div class="title-inner">
        <h3>
          <?php if (isset($title)): ?>
            <?php print l($title, $node_url, array('html' => TRUE)); ?>
          <?php else: ?>
            <?php print $title; ?>
          <?php endif; ?>
        </h3>
        <?php if (isset($product_category)): ?>
          <p>
            <?php print $product_category; ?>
          </p>
        <?php endif; ?>
        <div class="add-to-cart-block">
          <div class="price">
            <?php print render($price); ?>
          </div>
          <?php print render($cart); ?>
        </div>
    </div>
  </div>
</div>
