<section id="home" class="block flexslider-full crop">
	<?php if(get_field('home_page_slideshow','option')): ?>
		<ul class="slides"> 			
			<?php while(has_sub_field('home_page_slideshow','option')): ?>
				<?php 
				$slide_type = get_sub_field('slide_type');
				if( $slide_type === 'image' ):
					$slide_image = get_sub_field('slide_image'); 
					$image_src = $slide_image['url'];
					$ext = pathinfo($image_src, PATHINFO_EXTENSION);
					if( $ext == 'gif' ) {
						$image_url = $slide_image['url'];
					} else{
						$image_url = $slide_image['sizes']['slideshow'];
					} 
					?>
					<li class="home-slide home-slide-image" style="background-image: url('<?php echo $image_url; ?>'); background-size: cover; background-position: center;">
						<a href="<?php the_sub_field('slide_link'); ?>" class="home-slides-link">										
							<!--removed slideshow captions 12-9-17, restored 5-16-18 -->
							<?php $slide_description = get_sub_field('slide_description'); ?>
							<?php if( $slide_description ): ?>
								<div class="flex-caption-new">
									<div class="container">
										<p class="flex-caption-text">
											<span><?php echo $slide_description; ?></span>
										</p>
									</div>
								</div>		
							<?php endif; ?>			
						</a>
					</li>
				<?php endif; ?>	
				<?php if( $slide_type === 'video' ): 
					$video_slides = true;
					$slide_video = get_sub_field('slide_video');
					?>
					<li class="home-slide home-slide-video">
						<video autoplay playsinline muted loop src="<?php echo $slide_video; ?>" class="video-full"  poster=""></video>
					</li>
				<?php endif; ?>		
			<?php endwhile; ?>							
		</ul>	
		<?php //removed slideshow controls 12-9-17 ?>
		<!-- <div class="flexslider-full-controls"></div>  -->
		<div id="previous-home" class="flexslider-full-direction previous flex-previous">
			<span class="icon" data-icon="&#8216;"></span>
		</div>					
		<div id="next-1" class="flexslider-full-direction next flex-next">
			<span class="icon" data-icon="&#8212;"></span>
		</div>	
	<?php endif; ?>	

	<?php
	$show_announcement = get_field('show_announcement_section','option'); 
	$show_news_stories = get_field('show_news_stories_section','option'); 
	?>

	<div class="section-footer">
		<?php if( $show_announcement || $show_news_stories ): ?>
			<a href="#home-stories" class="jump">
				<?php else: ?>
					<a href="#news" class="jump">
					<?php endif; ?>
					<h4 class="hidden">learn more</h4>
					<span class="icon" data-icon="&rdquo;"></span>
				</a>
			</div>
		</section>
		<div class="homefix" class="<?php if( $video_slides === true ) : echo 'home-slideshow-has-video'; endif; ?>"></div>
