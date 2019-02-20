
<?php get_header();?>

<?php  
	//removed landing screen 12-9-17
	//get_template_part('landing'); 
?>

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
								<div class="flex-caption">
									<p class="<?php the_sub_field('slide_text_position'); ?>">
										<span><?php echo $slide_description; ?></span>
									</p>
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
			<a href="#announcements-and-news" class="jump">
		<?php else: ?>
			<a href="#news" class="jump">
		<?php endif; ?>
			<h4 class="hidden">learn more</h4>
			<span class="icon" data-icon="&rdquo;"></span>
		</a>
	</div>
</section>

		<div class="homefix" class="<?php if( $video_slides === true ) : echo 'home-slideshow-has-video'; endif; ?>"></div>
		<div id="home-lift">

			<?php get_template_part( 'announcements_and_news' ); ?>

			<section id="news" class="block bg-gray loading <?php if( $show_announcement || $show_news_stories ): echo 'hidden'; endif; ?>">
				<div class="tiles container">
					<?php
					$args = array(
						'post_type' => 'post',
						'cat' => '3', 
						'posts_per_page' => '2'
					);
					$news_query = new WP_Query( $args );
					if ( $news_query->have_posts() ) { ?>
						<ul class="row">
							<li class="title-tile">
								<a href="<?php bloginfo('url'); ?>/news">
									<h1>News</h1>
									<h3>Read more ></h3>
								</a>
							</li>
							<?php while ( $news_query->have_posts() ) {
								$news_query->the_post(); ?>
								<li class="tile">
									<a href="<?php the_permalink(); ?>">
										<?php if ( has_post_thumbnail() ) {
										//the_post_thumbnail();
										}
										else { } ?>
											<div class="textbox">
												<h3 class="post-title bold"><?php echo get_the_title(); ?></h3>
											</div>		
										</a>
									</li>
								<?php } ?>
								<li class="title-tile clear bg-medium">
									<a href="#work" class="jump">
										<h1>More</h1>
										<h3>See our work<span class="icon icon-right" data-icon="&rdquo;"></span></h3>
									</a>
								</li>
							</ul>
						<?php } else { }
						wp_reset_postdata(); ?>	
					</div>
					<div class="section-footer bg-brand hidden">
						<a href="#news" class="jump">
							<h4>Learn more</h4>
							<span class="icon" data-icon="&rdquo;"></span>
						</a>
					</div>
				</section>	

				<?php $background_image_1 = get_field('callout_1_background_image','option'); ?>
				<section id="callout-clients" class="block callout min-small loading padded" style="background-image: url('<?php echo $background_image_1[sizes][slideshow]; ?>')">	
					<div class="callout-overlay dark loading"></div>	
					<div class="container">
						<div class="row">	
							<div class="callout-text">
								<h1><?php the_field('callout_1_text','option'); ?></h1>
								<a href="/about" class="an-link">Learn more about us <span class="icon" data-icon="&#8212;"></span></a>
							</div>
						</div>
					</div>

				</section>	

				<section id="work" class="block bg-gradient padded loading">

					<div class="tiles container">

						<?php
						$args = array(
							'post_type' => 'project',
							'project_category' => 'featured-2',
							'posts_per_page' => '7'
						);
						$work_query = new WP_Query( $args );
						if ( $work_query->have_posts() ) { ?>
							<ul class="row">
								<li class="title-tile">
									<a href="<?php bloginfo('url'); ?>/work">
										<h1>Work</h1>
										<h3>See all projects <span class="icon" data-icon="—"></span></h3>
									</a>
								</li>
								<?php while ( $work_query->have_posts() ) {
									$work_query->the_post(); ?>
									<li class="tile project-tile">
										<a href="<?php the_permalink(); ?>">
											<div class="overlay"></div>

											<?php if ( has_post_thumbnail() ) {
												the_post_thumbnail('project-tile');
											}
											else { } ?>
												<p class="project-title">
													<?php the_title(); ?> - <?php the_field('project_location'); ?>
												</p>						
											</a>
										</li>
									<?php } ?>
								</ul>
							<?php } else { }
							wp_reset_postdata(); ?>	

						</div>

						<div class="section-footer bg-brand hidden">
							<a href="#news" class="jump">
								<h4>Learn more</h4>
								<span class="icon" data-icon="&rdquo;"></span>
							</a>
						</div>

					</section>		

					<?php $background_image_2 = get_field('callout_2_background_image','option'); ?>
					<section id="callout-firm" class="block callout min padded loading" style="background-image: url('<?php echo $background_image_2[sizes][slideshow]; ?>')">	

						<div class="callout-overlay dark"></div>	

						<div class="container">
							<div class="row">	
								<div class="callout-text">
									<h1><?php the_field('callout_2_text','option'); ?></h1>
									<a href="/about" class="an-link">Learn more about us <span class="icon" data-icon="&#8212;"></span></a>
								</div>
							</div>
						</div>

					</section>	

				</div>	

				<?php get_footer(); ?>
