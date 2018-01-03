<div class="panel-display clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <?php if ($content['full-width']): ?>
    <div class="row full-width">
      <div class="panel-panel panel-col col-sm-12 g-st-1">
        <?php print $content['full-width']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['top']): ?>
    <div class="row">
      <div class="panel-panel panel-col col-sm-12 g-st-1">
        <?php print $content['top']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['upper-left'] || $content['upper-middle'] || $content['upper-right']): ?>
    <div class="row">
      <div class="panel-panel panel-col col-sm-4 g-st-1">
        <?php if ($content['upper-left']): ?><?php print $content['upper-left']; ?><?php endif; ?>
      </div>

      <div class="panel-panel panel-col col-sm-4 g-st-5">
        <?php if ($content['upper-middle']): ?><?php print $content['upper-middle']; ?><?php endif; ?>
      </div>

      <div class="panel-panel panel-col col-sm-4 g-st-9">
        <?php if ($content['upper-right']): ?><?php print $content['upper-right']; ?><?php endif; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['middle-left'] || $content['middle-right']): ?>
    <div class="row">
      <div class="panel-panel panel-col col-sm-6 g-st-1">
        <?php if ($content['middle-left']): ?><?php print $content['middle-left']; ?><?php endif; ?>
      </div>

      <div class="panel-panel panel-col col-sm-6 g-st-7">
        <?php if ($content['middle-right']): ?><?php print $content['middle-right']; ?><?php endif; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['lower-left'] || $content['lower-middle'] || $content['lower-right']): ?>
    <div class="row">
      <div class="panel-panel panel-col col-sm-2 g-st-1">
        <?php if ($content['lower-left']): ?><?php print $content['lower-left']; ?><?php endif; ?>
      </div>

      <div class="panel-panel panel-col col-sm-8 g-st-3">
        <?php if ($content['lower-middle']): ?><?php print $content['lower-middle']; ?><?php endif; ?>
      </div>

      <div class="panel-panel panel-col col-sm-2 g-st-11">
        <?php if ($content['lower-right']): ?><?php print $content['lower-right']; ?><?php endif; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['lower-bottom-left'] || $content['lower-bottom-middle'] || $content['lower-bottom-right']): ?>
    <div class="row">
      <div class="panel-panel panel-col col-sm-1 g-st-1">
        <?php if ($content['lower-bottom-left']): ?><?php print $content['lower-bottom-left']; ?><?php endif; ?>
      </div>

      <div class="panel-panel panel-col col-sm-10 g-st-2">
        <?php if ($content['lower-bottom-middle']): ?><?php print $content['lower-bottom-middle']; ?><?php endif; ?>
      </div>

      <div class="panel-panel panel-col col-sm-1 g-st-12">
        <?php if ($content['lower-bottom-right']): ?><?php print $content['lower-bottom-right']; ?><?php endif; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['bottom-left'] || $content['bottom-right']): ?>
    <div class="row">
      <div class="panel-panel panel-col col-sm-3 g-st-1">
        <?php if ($content['bottom-left']): ?><?php print $content['bottom-left']; ?><?php endif; ?>
      </div>

      <div class="panel-panel panel-col col-sm-9 g-st-4">
        <?php if ($content['bottom-right']): ?><?php print $content['bottom-right']; ?><?php endif; ?>
      </div>
    </div>
  <?php endif; ?>


  <?php if ($content['bottom']): ?>
    <div class="panel-panel panel-col col-sm-12 g-st-1">
      <?php print $content['bottom']; ?>
    </div>
  <?php endif; ?>
</div>
