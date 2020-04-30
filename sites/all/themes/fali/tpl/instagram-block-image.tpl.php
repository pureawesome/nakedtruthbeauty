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
<?php if($count==0): ?>
	<div class='jr-insta-thumb'>
		<ul class='no-bullet thumbnails jr_col_3'>
<?php endif; ?>
			<li>
				<a href="<?php print $href ?>" target="_blank" title="">
					<img src="<?php print $src ?>" alt="" title="" />
				</a>
			</li>
<?php
	$count++;
	if($count>=$limit):
?> 
		</ul>
	</div>
<?php endif; ?>
