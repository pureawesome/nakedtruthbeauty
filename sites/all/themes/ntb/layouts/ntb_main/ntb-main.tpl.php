<div class="panel-display clearfix" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
  <?php if ($content['top']): ?>
    <div class="container-fluid">
      <div class="row">
        <div class="panel-panel panel-col">
          <div class="inside"><?php print $content['top']; ?></div>
        </div>
      </div>
    </div>
  <?php endif ?>

  <div class="container-fluid">
    <div class="row">
      <div class="panel-panel panel-col col-sm-4">
        <div class="inside"><?php print $content['upper-left']; ?></div>
      </div>

      <div class="panel-panel panel-col col-sm-4">
        <div class="inside"><?php print $content['upper-middle']; ?></div>
      </div>

      <div class="panel-panel panel-col col-sm-4">
        <div class="inside"><?php print $content['upper-right']; ?></div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="panel-panel panel-col col-md-6">
        <div class="inside"><?php print $content['middle-left']; ?></div>
      </div>

      <div class="panel-panel panel-col col-md-6">
        <div class="inside"><?php print $content['middle-right']; ?></div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="panel-panel panel-col col-md-2">
        <div class="inside"><?php print $content['lower-left']; ?></div>
      </div>

      <div class="panel-panel panel-col col-md-8">
        <div class="inside"><?php print $content['lower-middle']; ?></div>
      </div>

      <div class="panel-panel panel-col col-md-2">
        <div class="inside"><?php print $content['lower-right']; ?></div>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <div class="row">
      <div class="panel-panel panel-col col-md-3">
        <div class="inside"><?php print $content['bottom-left']; ?></div>
      </div>

      <div class="panel-panel panel-col col-md-9">
        <div class="inside"><?php print $content['bottom-right']; ?></div>
      </div>
    </div>
  </div>


  <?php if ($content['bottom']): ?>
    <div class="container-fluid">
      <div class="panel-panel panel-col">
        <div class="inside"><?php print $content['bottom']; ?></div>
      </div>
    </div>
  <?php endif ?>
</div>
