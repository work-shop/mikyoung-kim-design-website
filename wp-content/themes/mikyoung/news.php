<div class="blog page-body bg-gradient page-container">
	<div class="container" id="news-content">
		<div class="row first-row">
			
			<div class="col-sm-8">
				<?php 
				$exclude;
				if(is_single()){
					while ( have_posts() ) : the_post(); 
						$exclude = get_the_ID();
					endwhile;
				} else{ } 
				
				$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
			  $post_per_page = 0; // -1 shows all posts
			  $do_not_show_stickies = 1; // 0 to show stickies
			  $args=array(
			  	'orderby' => 'date',
			  	'order' => 'DESC',
			  	'paged' => $paged,
			  	'posts_per_page' => $post_per_page,
			  	'post__not_in' => array($exclude),
			  	'caller_get_posts' => $do_not_show_stickies,
			  );
			  $temp = $wp_query;  // assign orginal query to temp variable for later use
			  $wp_query = null;
			  $wp_query = new WP_Query($args);
				//echo var_dump($wp_query);
			  if( have_posts() ) :
			  	while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
			  	<article <?php post_class(); ?>>
			  		<div class="row clearfix">
			  			<?php if ( has_post_thumbnail() ) : ?>
			  				<div class="col-sm-12 col-md-4 col-lg-4 col-xs-12 article-left">
			  					<div class="news-image-container">
			  						<a href="<?php the_permalink(); ?>">
			  							<?php the_post_thumbnail('news'); ?>
			  						</a>
			  					</div>
			  				</div>
			  			<?php endif; ?>	
			  			<div class="col-sm-12 col-md-8 col-lg-8 col-xs-12 article-right">
			  				<a href="<?php the_permalink(); ?>">
			  					<h3 class="news-post-title bold">
			  						<?php the_title(); ?>
			  					</h3>
			  					<p class="reg news-date"><?php echo get_the_date(); ?>  
			  						<?php //if(in_category('2')){
			  							//echo '| News';
			  						//}
			  						//else{
			  							//echo '| Blog';
			  						//} ?>
			  					</p>
			  					<p class="news-excerpt"><?php echo get_the_excerpt(); ?></p>
			  					<p class="more"><span class="small highlight bold">Read More<span class="icon" data-icon="—"></span></span></p>
			  					<!-- not sure what this dash was for, removed by greg nemes 12-11-17	 -->
			  					<!-- <p class="dash">———————</p>	 -->
			  				</a>
			  			</div>
			  		</div>
			  		<div class="row">
			  			<div class="col-xs-12 col-sm-12">
			  				<hr>
			  			</div>
			  		</div>
			  	</article>	    	
			  <?php endwhile; ?>
			  <div class="navigation">
			  	<div class="left"><?php next_posts_link('<span class="icon icon-left" data-icon="&#8240;"></span> Older Entries') ?></div>
			  	<div class="right"><?php previous_posts_link('Newer Entries <span class="icon icon-right" data-icon="&#8222;"></span>') ?></div>
			  </div>
			  <?php 
			endif; 
			$wp_query = $temp;  //reset back to original query 
			?>
		</div>

		<div class="col-sm-4 col-lg-3 col-lg-offset-1">
			<div class="twitterfeed">
				<h4>Latest Tweets</h4>
				<?php echo do_shortcode("[really_simple_twitter username='MikyoungKimDsgn' consumer_key='Hdl38k2nf1wZG6ckqUbbaUTkg' consumer_secret='8fJL89kKdSFgkW7Uk37sXhQYBumlEeYhLcG6Z5mEYjgph1Bz94' access_token='8819182-gjBZuID7bueM7AflCQrvmxx8HOg2RT0Cbv2hGwG97a' access_token_secret='PeR9bJYVbFuFiARTITPQKVT9S07cHFWenF7fK9iKhi7DI']"); ?>
			</div>
			<?php  if( have_rows('upcoming_speaking', 'option') ): ?>
				<div class="upcoming-speaking">
					<h4>Upcoming</h4>
					<div class="speakings">
						<?php while( have_rows('upcoming_speaking', 'option') ): the_row(); ?>
							<div class="speaking">
								<?php 
								$link = get_sub_field('link'); 
								$speaking_title = get_sub_field('speaking_title');
								?>
								<?php if( $link ): ?>
									<a href="<?php echo $link; ?>">
									<?php endif; ?>
									<p class="speaking-title"><?php echo $speaking_title; ?></p>
									<?php if($link): ?>
									</a>
								<?php endif; ?>					
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="news-sidebar-social">
				<?php get_template_part( 'social_icons'); ?>
			</div>
		</div>
		
	</div>
</div>	
</div>