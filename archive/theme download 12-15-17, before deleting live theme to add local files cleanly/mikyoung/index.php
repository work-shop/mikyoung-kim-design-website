
<?php get_header();?>

<?php  
	//removed landing screen 12-9-17
	//get_template_part('landing'); 
?>

<section id="home" class="block flexslider-full crop loading">

	<?php if(get_field('home_page_slideshow','option')): ?>

		<ul class="slides"> 			

			<?php while(has_sub_field('home_page_slideshow','option')): ?>
				<?php 
				$slide_image = get_sub_field('slide_image'); 
				$image_src = $slide_image['url'];
				$ext = pathinfo($image_src, PATHINFO_EXTENSION);
				if( $ext == 'gif' ) {
					$image_url = $slide_image['url'];
				} else{
					$image_url = $slide_image['sizes']['slideshow'];
				} 
				?>
				<li style="background-image: url('<?php echo $image_url; ?>'); background-size: cover; background-position: center;">
					<a href="<?php the_sub_field('slide_link'); ?>" class="home-slides-link">										
						<!--removed slideshow captions 12-9-17 -->
								<!-- <div class="flex-caption">
									<p class="">
										<span><?php // the_sub_field('slide_description'); ?></span>
									</p>
								</div>	 -->				
							</a>
						</li>	
						
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

			<div class="section-footer bg-white">
				<a href="#news" class="jump">
					<h4>learn more</h4>
					<span class="icon" data-icon="&rdquo;"></span>
				</a>
			</div>

		</section>

		<div class="homefix"></div>

		<div id="home-lift">

			<section id="news" class="block bg-gray loading">

				<div class="tiles container">

					<?php
					$args = array(
						'post_type' => 'post',
						'cat' => '3', 
						'posts_per_page' => '6'
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
										<p class="small category-link">
											<?php if(in_category('2')){
												echo 'News';
											}
											else{
												echo 'Blog';
											} ?>							
										</p>

									</div>		
								</a>
							</li>
							<?php } ?>
							<li class="title-tile clear">
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
								<a href="/about">Learn more about us <span class="icon" data-icon="&#8212;"></span></a>
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
									<h3>See all projects ></h3>
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
									<a href="/about">Learn more about us <span class="icon" data-icon="&#8212;"></span></a>
								</div>
							</div>
						</div>

					</section>	

				</div>	

				<?php get_footer(); ?>
