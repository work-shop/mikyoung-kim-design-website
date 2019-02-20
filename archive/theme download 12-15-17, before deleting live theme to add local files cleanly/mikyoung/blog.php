<div class="blog page-body bg-gradient page-container">

	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-md-9">
			
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
                      <?php if ( has_post_thumbnail() ) : ?>
									<a href="<?php the_permalink(); ?>"><div class="image-container">
										<?php the_post_thumbnail('project-small'); ?>
									</div></a>
								<?php endif; ?>	
							<a href="<?php the_permalink(); ?>">
								<h3 class="post-title bold">
									<?php the_title(); ?>
										
								<p class="reg date"><?php echo get_the_date(); ?> | 
									<?php if(in_category('2')){
										echo 'News';
									}
									else{
										echo 'Blog';
									} ?>
																
								</p>
								</h3>

								
								<p class="excerpt"><?php echo get_the_excerpt(); ?></p>
								<p class="more"><span class="bg-brand small highlight bold">Read More</span></p>		
								<p class="dash">———————</p>									
							</a>
						</article>	    	
			    <?php endwhile; ?>
			    <div class="navigation">
			      <div class="left"><?php next_posts_link('<span class="icon icon-left" data-icon="&#8240;"></span> Older Entries') ?></div>
			      <div class="right"><?php previous_posts_link('Newer Entries <span class="icon icon-right" data-icon="&#8222;"></span>') ?></div>
			    </div>
			
				<?php endif; 
			
				$wp_query = $temp;  //reset back to original query ?>
	    
				
			</div>
            
            
            
            <div class="col-sm-4 col-md-3 twitterfeed"><h4>Latest Tweets</h4>
            <?php echo do_shortcode("[really_simple_twitter username='MikyoungKimDsgn' consumer_key='Hdl38k2nf1wZG6ckqUbbaUTkg' consumer_secret='8fJL89kKdSFgkW7Uk37sXhQYBumlEeYhLcG6Z5mEYjgph1Bz94' access_token='8819182-gjBZuID7bueM7AflCQrvmxx8HOg2RT0Cbv2hGwG97a' access_token_secret='PeR9bJYVbFuFiARTITPQKVT9S07cHFWenF7fK9iKhi7DI']"); ?>
            
			</div>
		</div>
		</div>		
	</div>	
	
	

</div>