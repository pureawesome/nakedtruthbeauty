<div class="panel-display clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>

  <?php if ($content['full-width']): ?>
    <div class="row full-width">
      <div class="panel-panel panel-col">
        <?php print $content['full-width']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['top']): ?>
    <div class="row">
      <div class="panel-panel panel-col">
        <?php print $content['top']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['upper-left'] || $content['upper-middle'] || $content['upper-right']): ?>
    <div class="row">
      <div class="panel-panel panel-col col-sm-4">
        <?php print $content['upper-left']; ?>
      </div>

      <div class="panel-panel panel-col col-sm-4">
        <?php print $content['upper-middle']; ?>
      </div>

      <div class="panel-panel panel-col col-sm-4">
        <?php print $content['upper-right']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['middle-left'] || $content['middle-right']): ?>
    <div class="row">
      <div class="panel-panel panel-col col-sm-6">
        <?php print $content['middle-left']; ?>
      </div>

      <div class="panel-panel panel-col col-sm-6">
        <?php print $content['middle-right']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['lower-left'] || $content['lower-middle'] || $content['lower-right']): ?>
    <div class="row">
      <div class="panel-panel panel-col col-sm-2">
        <?php print $content['lower-left']; ?>
      </div>

      <div class="panel-panel panel-col col-sm-8">
        <?php print $content['lower-middle']; ?>
      </div>

      <div class="panel-panel panel-col col-sm-2">
        <?php print $content['lower-right']; ?>
      </div>
    </div>
  <?php endif; ?>

  <?php if ($content['bottom-left'] || $content['bottom-right']): ?>
    <div class="row">
      <div class="panel-panel panel-col col-sm-3">
        <?php print $content['bottom-left']; ?>
      </div>

      <div class="panel-panel panel-col col-sm-9">
        <?php print $content['bottom-right']; ?>
      </div>
    </div>
  <?php endif; ?>


  <?php if ($content['bottom']): ?>
    <div class="panel-panel panel-col col-sm-12">
      <?php print $content['bottom']; ?>
    </div>
  <?php endif; ?>
</div>
