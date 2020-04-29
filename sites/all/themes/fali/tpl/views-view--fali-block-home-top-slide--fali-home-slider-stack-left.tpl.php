<div class="container">
	<div class="stackcontent">
		<?php if ($rows): ?>
			<div class="firststack parentstack">
			    <?php print $rows; ?>
			</div>
		<?php endif; ?>
		<?php if ($header): ?>
			<?php print $header; ?>
		<?php endif; ?>
		<div class="clear"></div>
	</div>
</div>
