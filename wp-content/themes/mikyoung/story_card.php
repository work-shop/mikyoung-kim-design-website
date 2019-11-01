<a href="<?php the_permalink(); ?>" class="story-tile-link">
	<?php 
	$thumb_id = get_post_thumbnail_id();
	$thumb_url_array = wp_get_attachment_image_src($thumb_id, 'post-thumbnail', true);
	$thumb_url = $thumb_url_array[0];
	?>
	<div class="story-tile-image <?php the_sub_field('row_height'); ?>" style="background-image: url('<?php echo $thumb_url; ?>');">
	</div>
	<div class="story-tile-text">
		<h5 class="story-tile-label">
			<?php $type = get_post_type(); ?>
			<?php if ($type == 'project'): $type = 'Projects'; endif; ?>
			<?php if ($type == 'post'): $type = 'News'; endif; ?>
			<?php echo $type; ?>
		</h5>
		<h4 class="story-tile-title">
			<?php the_title(); ?>
		</h4>
	</div>
</a>