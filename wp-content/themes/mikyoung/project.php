<div class="project project-body page-container">
	<div class="clip">
		<?php 
		$video_1 = get_field('project_gallery_video_first_slide'); 
		$video_2 = get_field('project_gallery_video_second_slide'); 
		?>
		<div class="flexslider-project container <?php if( $video_1 ): echo 'has-video-1'; endif; ?> <?php if( $video_2 ): echo 'has-video-2'; endif; ?>">
			<?php $images = get_field('project_gallery');
			if( $images ): ?>
			<ul class="slides flexslider-project-slides">
				<?php if( $video_1 ): ?>
					<li class="flexslider-project-slide flexslider-project-slide-video">
						<video autoplay muted loop src="<?php echo $video_1; ?>" class="video-full"  poster="" id="project-gallery-video-1"></video>
					</li>
				<?php endif; ?>
				<?php foreach( $images as $image ): ?>
					<?
					$image_src = $image['url'];
					$ext = pathinfo($image_src, PATHINFO_EXTENSION);
					if( $ext == 'gif' ) {
						$image_url = $image['url'];
					} else{
						$image_url = $image['sizes']['project-slideshow'];
					} 
					?>
					<li class="flexslider-project-slide">
						<img src="<?php echo $image_url; ?>" alt="<?php echo $image['alt']; ?>" />
						<?php echo $image['caption']; ?>
					</li>
				<?php endforeach; ?>
				<?php if( $video_2 ): ?>
					<li class="flexslider-project-slide flexslider-project-slide-video">
						<video autoplay muted loop src="<?php echo $video_2; ?>" class="video-full"  poster="" id="project-gallery-video-2"></video>
					</li>
				<?php endif; ?>
			</ul>				
			<div id="previous-project" class="flexslider-direction previous flex-previous">
				<span class="icon" data-icon="&#8216;"></span>
			</div>					

			<div id="next-project" class="flexslider-direction next flex-next">
				<span class="icon" data-icon="&#8212;"></span>
			</div>	
		<?php endif; ?>		
	</div>
</div>

<div class="project-info container">
	<div class="row">
		<div class="col-sm-8 col-md-9">
			<h3 class="bold"><?php the_title(); ?></h3>
			<?php if(get_field('project_location')): ?>
				<p class="location">Project Location: <?php the_field('project_location'); ?></p>		
			<?php endif; ?>	
			<?php if(get_field('project_client')): ?>						
				<p class="client">Client: <?php the_field('project_client'); ?></p>
			<?php endif; ?>					
			<?php if(get_field('project_misc_1')): ?>				
				<p class="date"><?php the_field('project_misc_1'); ?></p>
			<?php endif; ?>						
			<?php if(get_field('project_misc_2')): ?>							
				<p class="date"><?php the_field('project_misc_2'); ?></p>		
			<?php endif; ?>	
			<?php if(get_field('project_misc_3')): ?>							
				<p class="date"><?php the_field('project_misc_3'); ?></p>		
			<?php endif; ?>							

			<div class="project-description text">
				<?php the_content(); ?>							
			</div>		
		</div>

		<div class="col-sm-4 col-md-3 project-links">
			<div id="projectsharing " class="hidden">Share
				<a class="addthis_button_facebook" addthis:url="<?php the_permalink(); ?>"  addthis:title="Mikyoung Kim Design"><i class="fa fa-facebook fa-lg"></i></a>	
				<a class="addthis_button_twitter" addthis:url="<?php the_permalink(); ?>" addthis:title="Mikyoung Kim Design"><i class="fa fa-twitter fa-lg"></i></a>
				<a class="addthis_button_linkedin" addthis:url="<?php the_permalink(); ?>" addthis:title="Mikyoung Kim Design"><i class="fa fa-linkedin fa-lg"></i></a>	
				<a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'><i class="fa fa-pinterest-p fa-lg"></i></a>
			</div>
			<ul>
				<?php while( has_sub_field('project_links') ): ?>
					<li><a href="<?php the_sub_field('link_url'); ?>" target="_blank"><?php the_sub_field('link_text'); ?></a></li>
				<?php endwhile; ?>			
			</ul>
		</div>
	</div>

</div>	

<div class="container" id="related">
	<div class="page-heading bg-gray">
		<div class"row">
			<h3>Related Projects</h3>
		</div>	
	</div>
</div>		

<div class="container related">
	<div class="row">
		<div class="tiles clearfix">
			<ul>
				<?php

                // related posts logic.
				$tags = array_map(function( $x ) {
					return $x->term_id;
				}, wp_get_post_tags( get_the_ID() ));

				$posted = array( get_the_ID() );
				$posts = 0;
				if ( !empty($tags) ) {
					$RPQ = new WP_Query( array(
						"post_type" => 'project',
						"posts_per_page" => 4,
						"nopaging" => true,
						"tag__in" => $tags,
						"post__not_in" => $posted
					) );
					while ( $RPQ->have_posts()&&$posts<4 ) {
						$post = $RPQ->next_post(); ?>

						<li class="tile project-tile">
							<a href="<?php the_permalink(); ?>">
								<div class="overlay"></div>

								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail('project-tile');
								}
								else { } ?>
								<p class="project-title">
									<?php the_title(); ?>
								</p>						
							</a>
						</li>

						<?php array_push( $posted, $post->ID );
						$posts += 1;
					}
					wp_reset_query();
				}

				if ( $posts<4 ) {
					$AddQ = new WP_Query( array(
						"post_type" => 'project',
						"posts_per_page" => (4-$posts),
						"nopaging" => true,
						"post__not_in" => $posted
					)); 

					while ( $AddQ->have_posts()&&$posts<4 ) {
						$post = $AddQ->next_post(); ?>

						<li class="tile project-tile">
							<a href="<?php the_permalink(); ?>">
								<div class="overlay"></div>

								<?php if ( has_post_thumbnail() ) {
									the_post_thumbnail();
								}
								else { ?>
								<img src="<?php bloginfo('template_directory'); ?>/_/img/blank-small.jpg">											
								<?php } ?>
								<p class="project-title">
									<?php the_title(); ?>
								</p>						
							</a>
						</li>                    

						<?php $posts += 1;
					}
					wp_reset_query();
				}
				?>

			</ul>
		</div>
	</div>	
</div>



</div>
