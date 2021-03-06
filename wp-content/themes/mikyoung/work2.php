
<div class="container work page-body page-container">

	<nav id="filters" class="option-set">	
		<ul id="options" data-option-key="filter">
			<li class="sort">Filter By:</li>
			<li class="filter selected" data-option-value="*"><a href="#filter">all</a></li>
			<li class="filter" data-option-value=".learning"><a href="#filter"><?php $category_id = 89; $category = get_the_category_by_ID($category_id); echo $category; ?></a></li>
			<li class="filter" data-option-value=".health-wellness"><a href="#filter"><?php $category_id = 5; $category = get_the_category_by_ID($category_id); echo $category; ?></a></li>                        
			<li class="filter" data-option-value=".civic-institutional"><a href="#filter"><?php $category_id = 8; $category = get_the_category_by_ID($category_id); echo $category; ?></a></li>                        
			<li class="filter" data-option-value=".mixed-use"><a href="#filter"><?php $category_id = 90; $category = get_the_category_by_ID($category_id); echo $category; ?></a></li>
			<li class="filter" data-option-value=".art-environments"><a href="#filter"><?php $category_id = 4; $category = get_the_category_by_ID($category_id); echo $category; ?></a></li>
			<li class="filter" data-option-value=".urban-masterplan"><a href="#filter"><?php $category_id = 6; $category = get_the_category_by_ID($category_id); echo $category; ?></a></li>
			<li class="nav-toggle-projects exclude" ><a href="#">project index</a></li> 
			<li class="nav-toggle-social hidden"><?php get_template_part( 'social_icons'); ?></li>           
		</ul>
	</nav>

	<div id="grid" class="clearfix">
		
		<?php
		$args = array(
			'post_type' => 'project',
			'project_category' => '',
			'posts_per_page' => '-1'
		);
		$work_query = new WP_Query( $args ); 
		
		if ( $work_query->have_posts() ) { ?>

			<?php while ( $work_query->have_posts() ) {

				$work_query->the_post(); 
				$terms = get_the_terms( $post->ID, 'project_category' );				
				$term_IDs = '';
				foreach ( $terms as $term  ) {
					if($term->term_id != 9) { 
						$term_IDs .= $term->slug . ' ';
					}
				} ?>	

				<article class="element <?php if( has_term( 'featured-2', 'project_category' ) ) { echo 'featured element-large '; } else { echo 'element-small '; } echo $term_IDs; ?>">
					<a href="<?php the_permalink(); ?>">
						<div class="overlay"></div>
						<div class="image-container">
							<?php if ( has_post_thumbnail() ) {
								if( has_term( 'featured-2', 'project_category') ){  
								//changed for 3 column layout
								//the_post_thumbnail('project-large'); 
									the_post_thumbnail('project-large');
								}
								else{
									the_post_thumbnail('project-large');
								}
							}
							else { 
								if( has_term( 'featured-2', 'project_category') ){  ?>
									<img src="<?php bloginfo('template_directory'); ?>/_/img/blank-large.jpg" alt="blank">		
								<? }
								else{ ?>
									<img src="<?php bloginfo('template_directory'); ?>/_/img/blank-small.jpg" alt="blank">		
								<?php }
							} ?>
						</div>			 
						<p class="project-title">
							<?php the_title(); ?> 
							<?php 
						//removed project location 1-12-18
						//if(get_field('project_location')):
							//echo ' - ';
							//the_field('project_location'); 
							// endif; ?>
						</p>						
					</a>
				</article>	    	    			

			<?php } ?>

		<?php } else { } wp_reset_postdata(); ?>	

	</div>


</div>