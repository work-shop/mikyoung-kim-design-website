
<div id="home-lift">
	<section class="block padded" id="home-stories">
		<div class="container">
			<?php if( have_rows('stories','option') ): ?>
				<?php  while ( have_rows('stories','option') ) : the_row(); ?>
					<div class="story-row <?php the_sub_field('row_layout'); ?>">

						<div class="story-tile story-tile-1 story-tile-<?php the_sub_field('tile_1_type'); ?>">
							<?php if( get_sub_field('tile_1_type') === 'project' || get_sub_field('tile_1_type') === 'news' ): ?>
							<?php if( get_sub_field('tile_1_type') === 'project' ): ?>
								<?php $post_object = get_sub_field('tile_1_project'); ?>
								<?php elseif( get_sub_field('tile_1_type') === 'news' ): ?>	
									<?php $post_object = get_sub_field('tile_1_news'); ?>
								<?php endif; ?>
								<?php if( $post_object ): ?>	
									<?php $post = $post_object;	setup_postdata( $post );  ?>
									<?php get_template_part('story_card'); ?>
									<?php wp_reset_postdata(); ?>
								<?php endif; ?>
								<?php else: ?>
									<?php if( get_sub_field('tile_1_custom_link') ): ?>
										<a href="<?php the_sub_field('tile_1_custom_link'); ?>" class="story-tile-link">
										<?php endif; ?>
										<?php 
										$image = get_sub_field('tile_1_custom_image');
										$thumb_url = $image['sizes']['post_thumbnail'];
										?>
										<div class="story-tile-image <?php the_sub_field('row_height'); ?>" style="background-image: url('<?php echo $thumb_url; ?>');">
										</div>
										<div class="story-tile-text">
											<h5 class="story-tile-label">
												<?php the_sub_field('tile_1_custom_label'); ?>
											</h5>
											<h4 class="story-tile-title">
												<?php the_sub_field('tile_1_custom_title'); ?>
											</h4>
										</div>
										<?php if( get_sub_field('tile_1_custom_link') ): ?>
										</a>
									<?php endif; ?>
								<?php endif; ?>
							</div>

							<?php if( get_sub_field('row_layout') === 'two-even' || get_sub_field('row_layout') === 'two-left' || get_sub_field('row_layout') === 'two-right' || get_sub_field('row_layout') === 'three' ): ?>
							<div class="col story-tile story-tile-2 story-tile-<?php the_sub_field('tile_2_type'); ?>">
								<?php if( get_sub_field('tile_2_type') === 'project' || get_sub_field('tile_2_type') === 'news' ): ?>
								<?php if( get_sub_field('tile_2_type') === 'project' ): ?>
									<?php $post_object = get_sub_field('tile_2_project'); ?>
									<?php elseif( get_sub_field('tile_2_type') === 'news' ): ?>	
										<?php $post_object = get_sub_field('tile_1_news'); ?>
									<?php endif; ?>
									<?php if( $post_object ): ?>	
										<?php $post = $post_object;	setup_postdata( $post );  ?>
										<?php get_template_part('story_card'); ?>
										<?php wp_reset_postdata(); ?>
									<?php endif; ?>
									<?php else: ?>
										<?php if( get_sub_field('tile_2_custom_link') ): ?>
											<a href="<?php the_sub_field('tile_2_custom_link'); ?>" class="story-tile-link">
											<?php endif; ?>
											<?php 
											$image = get_sub_field('tile_2_custom_image');
											$thumb_url = $image['sizes']['post_thumbnail'];
											?>
											<div class="story-tile-image <?php the_sub_field('row_height'); ?>" style="background-image: url('<?php echo $thumb_url; ?>');">
											</div>
											<div class="story-tile-text">
												<h5 class="story-tile-label">
													<?php the_sub_field('tile_2_custom_label'); ?>
												</h5>
												<h4 class="story-tile-title">
													<?php the_sub_field('tile_2_custom_title'); ?>
												</h4>
											</div>
											<?php if( get_sub_field('tile_2_custom_link') ): ?>
											</a>
										<?php endif; ?>
									<?php endif; ?>
								</div>
							<?php endif; ?>

							<?php if( get_sub_field('row_layout') === 'three' ): ?>
								<div class="col story-tile story-tile-3 story-tile-<?php the_sub_field('tile_3_type'); ?>">
									<?php if( get_sub_field('tile_3_type') === 'project' || get_sub_field('tile_3_type') === 'news' ): ?>
									<?php if( get_sub_field('tile_3_type') === 'project' ): ?>
										<?php $post_object = get_sub_field('tile_3_project'); ?>
										<?php elseif( get_sub_field('tile_3_type') === 'news' ): ?>	
											<?php $post_object = get_sub_field('tile_3_news'); ?>
										<?php endif; ?>
										<?php if( $post_object ): ?>	
											<?php $post = $post_object;	setup_postdata( $post );  ?>
											<?php get_template_part('story_card'); ?>
											<?php wp_reset_postdata(); ?>
										<?php endif; ?>
										<?php else: ?>
											<?php if( get_sub_field('tile_3_custom_link') ): ?>
												<a href="<?php the_sub_field('tile_3_custom_link'); ?>" class="story-tile-link">
												<?php endif; ?>
												<?php 
												$image = get_sub_field('tile_3_custom_image');
												$thumb_url = $image['sizes']['post-thumbnail'];
												?>
												<div class="story-tile-image <?php the_sub_field('row_height'); ?>" style="background-image: url('<?php echo $thumb_url; ?>');">
												</div>
												<div class="story-tile-text">
													<h5 class="story-tile-label">
														<?php the_sub_field('tile_3_custom_label'); ?>
													</h5>
													<h4 class="story-tile-title">
														<?php the_sub_field('tile_3_custom_title'); ?>
													</h4>
												</div>
												<?php if( get_sub_field('tile_3_custom_link') ): ?>
												</a>
											<?php endif; ?>
										<?php endif; ?>
									</div>
								<?php endif; ?>

							</div>
						<?php endwhile; ?>
					<?php endif; ?>

				</div>
			</section>
		</div>	