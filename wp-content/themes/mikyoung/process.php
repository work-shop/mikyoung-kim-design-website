
<div class="container work page-body page-container">
	<div class="" id="process-content">
		<div class="page-content ">
			<section id="process">
				<?php if( have_rows('process_stories','option') ): ?>
					<?php  while ( have_rows('process_stories','option') ) : the_row(); ?>
						<div class="process-story grid-item">
							<?php if( get_sub_field('story_link') ): ?>
								<a href="<?php the_sub_field('story_link'); ?>">
								<?php endif; ?>
								<?php if( get_sub_field('story_image_1') ): ?>
									<?php $image = get_sub_field('story_image_1'); ?>
									<img src="<?php echo $image['sizes']['medium_large']; ?>" class="process-story-image process-story-image-1">
								<?php endif; ?>
								<?php if( get_sub_field('story_image_2') ): ?>
									<?php $image = get_sub_field('story_image_2'); ?>
									<img src="<?php echo $image['sizes']['medium_large']; ?>" class="process-story-image process-story-image-2">
								<?php endif; ?>
								<?php if( get_sub_field('story_heading') ): ?>
									<h4 class="process-story-heading">
										<?php the_sub_field('story_heading'); ?>
									</h4>
								<?php endif; ?>
								<?php if( get_sub_field('story_text') ): ?>
									<p class="process-story-text">
										<?php the_sub_field('story_text'); ?>
									</p>
								<?php endif; ?>
								<?php if( get_sub_field('story_link') ): ?>
								</a>
							<?php endif; ?>
						</div>
					<?php endwhile; ?>
				<?php endif; ?>
				<div class="grid-sizer"></div>
				<div class="gutter-sizer"></div>
			</section>											
		</div>
	</div>		
</div>
</div>	

