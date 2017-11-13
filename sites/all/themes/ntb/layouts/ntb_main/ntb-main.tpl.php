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
      <?php if ($content['upper-left']): ?>
        <div class="panel-panel panel-col col-sm-4 g-st-1">
          <?php print $content['upper-left']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['upper-middle']): ?>
        <div class="panel-panel panel-col col-sm-4 g-st-5">
          <?php print $content['upper-middle']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['upper-right']): ?>
        <div class="panel-panel panel-col col-sm-4 g-st-9">
          <?php print $content['upper-right']; ?>
        </div>
      <?php endif; ?>

    </div>
  <?php endif; ?>

  <?php if ($content['middle-left'] || $content['middle-right']): ?>
    <div class="row">
      <?php if ($content['middle-left']): ?>
        <div class="panel-panel panel-col col-sm-6 g-st-1">
          <?php print $content['middle-left']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['middle-right']): ?>
        <div class="panel-panel panel-col col-sm-6 g-st-7">
          <?php print $content['middle-right']; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if ($content['lower-left'] || $content['lower-middle'] || $content['lower-right']): ?>
    <div class="row">
      <?php if ($content['lower-left']): ?>
        <div class="panel-panel panel-col col-sm-2 g-st-1">
          <?php print $content['lower-left']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['lower-middle']): ?>
        <div class="panel-panel panel-col col-sm-8 g-st-3">
          <?php print $content['lower-middle']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['lower-right']): ?>
        <div class="panel-panel panel-col col-sm-2 g-st-11">
          <?php print $content['lower-right']; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if ($content['lower-bottom-left'] || $content['lower-bottom-middle'] || $content['lower-bottom-right']): ?>
    <div class="row">
      <?php if ($content['lower-bottom-left']): ?>
        <div class="panel-panel panel-col col-sm-1 g-st-1">
          <?php print $content['lower-bottom-left']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['lower-bottom-middle']): ?>
        <div class="panel-panel panel-col col-sm-10 g-st-2">
          <?php print $content['lower-bottom-middle']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['lower-bottom-right']): ?>
        <div class="panel-panel panel-col col-sm-1 g-st-12">
          <?php print $content['lower-bottom-right']; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>

  <?php if ($content['bottom-left'] || $content['bottom-right']): ?>
    <div class="row">
      <?php if ($content['bottom-left']): ?>
        <div class="panel-panel panel-col col-sm-3 g-st-1">
          <?php print $content['bottom-left']; ?>
        </div>
      <?php endif; ?>

      <?php if ($content['bottom-right']): ?>
        <div class="panel-panel panel-col col-sm-9 g-st-4">
          <?php print $content['bottom-right']; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>


  <?php if ($content['bottom']): ?>
    <div class="panel-panel panel-col col-sm-12 g-st-1">
      <?php print $content['bottom']; ?>
    </div>
  <?php endif; ?>
</div>
