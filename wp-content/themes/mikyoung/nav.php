		<div class="col-sm-2 nav-col-firm" >
			<ul>					
				<li class="">
					<a href="<?php bloginfo('url'); ?>/work" class="small">							
						work				
					</a>
				</li>
				<li class="">
					<a href="<?php bloginfo('url'); ?>/about" class="small">							
						about				
					</a>
				</li>		
				<li class="">
					<a href="<?php bloginfo('url'); ?>/process" class="small">							
						process				
					</a>
				</li>		
				<li class="">
					<a href="<?php bloginfo('url'); ?>/awards" class="small">							
						awards				
					</a>
				</li>
				<li class="">
					<a href="<?php bloginfo('url'); ?>/news" class="small">							
						news				
					</a>
				</li>	
				<li class="">
					<a href="<?php bloginfo('url'); ?>/about#about_contact" class="small">							
						contact				
					</a>
				</li>
				<li class="social-item hidden">
					<a href="https://www.facebook.com/mikyoungkimdesign" class="small social-link" target="_blank">		
						<span class="icon-facebook social icon-left" data-icon="&#62220;"></span> 
					</a>
					<a href="https://twitter.com/MikyoungKimDsgn" class="small social-link" target="_blank">	
						<span class="icon-twitter social icon-left" data-icon="&#62217;"></span> 											
					</a>
					<a href="https://www.linkedin.com/company/mikyoung-kim-design" class="small social-link social-link-linkedin" target="_blank">	
						<span class="icon-linkedin social icon-left" data-icon="&#62232;"></span> 															
					</a>
					<br>
					<a href="https://instagram.com/mikyoungkimdesign" class="small social-link" target="_blank">	
						<span class="icon-instagram social icon-left" data-icon=""></span> 															
					</a>					
					<a href="https://vimeo.com/user11371297" class="small social-link" target="_blank">		
						<span class="icon-vimeo social icon-left" data-icon="&#62214;"></span> 																		
					</a>
					<a href="http://www.pinterest.com/mykd/" class="small social-link" target="_blank">	
						<span class="icon-pinterest social icon-left" data-icon="&#62226;"></span> 																		
					</a>
				</li>										
			</ul>
		</div>	

		<div class="col-sm-2 nav-col-category">
			<?php 
			$args = array(
				'post_type' => 'project',
				'project_category' => 'learning',
				'posts_per_page' => '-1'
			);
			$nav_query = new WP_Query( $args );
			if ( $nav_query->have_posts() || true ) { ?>
				<?php 
				$category_id = 89;
				$category = get_the_category_by_ID($category_id); 
				?>
				<h3 class="reg"><?php echo $category; ?></h3>
				<ul>
					<?php while ( $nav_query->have_posts() ) {
						$nav_query->the_post(); ?>
						<li class="">
							<a href="<?php the_permalink(); ?>" class="small">							
								<?php the_title(); ?>				
							</a>
						</li>
					<?php } ?>
				</ul>
			<?php } else { }
			wp_reset_postdata(); ?>				
		</div>	

		<div class="col-sm-2 nav-col-category">
			<?php 
			$args = array(
				'post_type' => 'project',
				'project_category' => 'health-wellness',
				'posts_per_page' => '-1'
			);
			$nav_query = new WP_Query( $args );
			if ( $nav_query->have_posts() || true ) { ?>
				<?php 
				$category_id = 5;
				$category = get_the_category_by_ID($category_id); 
				?>
				<h3 class="reg"><?php echo $category; ?></h3>
				<ul>
					<?php while ( $nav_query->have_posts() ) {
						$nav_query->the_post(); ?>
						<li class="">
							<a href="<?php the_permalink(); ?>" class="small">							
								<?php the_title(); ?>				
							</a>
						</li>
					<?php } ?>
				</ul>
			<?php } else { }
			wp_reset_postdata(); ?>				
		</div>

		<div class="col-sm-2 nav-col-category">
			<?php 
			$args = array(
				'post_type' => 'project',
				'project_category' => 'civic-institutional',
				'posts_per_page' => '-1'
			);
			$nav_query = new WP_Query( $args );
			if ( $nav_query->have_posts() || true ) { ?>
				<?php 
				$category_id = 8;
				$category = get_the_category_by_ID($category_id); 
				?>
				<h3 class="reg"><?php echo $category; ?></h3>
				<ul>
					<?php while ( $nav_query->have_posts() ) {
						$nav_query->the_post(); ?>
						<li class="">
							<a href="<?php the_permalink(); ?>" class="small">							
								<?php the_title(); ?>				
							</a>
						</li>
					<?php } ?>
				</ul>
			<?php } else { }
			wp_reset_postdata(); ?>				
		</div>

		<div class="col-sm-2 nav-col-category">
			<?php 
			$args = array(
				'post_type' => 'project',
				'project_category' => 'mixed-use',
				'posts_per_page' => '-1'
			);
			$nav_query = new WP_Query( $args );
			if ( $nav_query->have_posts() || true ) { ?>
				<?php 
				$category_id = 90;
				$category = get_the_category_by_ID($category_id); 
				?>
				<h3 class="reg"><?php echo $category; ?></h3>
				<ul>
					<?php while ( $nav_query->have_posts() ) {
						$nav_query->the_post(); ?>
						<li class="">
							<a href="<?php the_permalink(); ?>" class="small">							
								<?php the_title(); ?>				
							</a>
						</li>
					<?php } ?>
				</ul>
			<?php } else { }
			wp_reset_postdata(); ?>				
		</div>

		<div class="col-sm-2 nav-col-category">
			<?php 
			$args = array(
				'post_type' => 'project',
				'project_category' => 'art-environments',
				'posts_per_page' => '-1'
			);
			$nav_query = new WP_Query( $args );
			if ( $nav_query->have_posts() || true ) { ?>
				<?php 
				$category_id = 4;
				$category = get_the_category_by_ID($category_id); 
				?>
				<h3 class="reg"><?php echo $category; ?></h3>
				<ul>
					<?php while ( $nav_query->have_posts() ) {
						$nav_query->the_post(); ?>
						<li class="">
							<a href="<?php the_permalink(); ?>" class="small">							
								<?php the_title(); ?>				
							</a>
						</li>
					<?php } ?>
				</ul>
			<?php } else { }
			wp_reset_postdata(); ?>				
		</div>

		<div class="col-sm-2 nav-col-category">
			<?php 
			$args = array(
				'post_type' => 'project',
				'project_category' => 'urban-masterplan',
				'posts_per_page' => '-1'
			);
			$nav_query = new WP_Query( $args );
			if ( $nav_query->have_posts() || true ) { ?>
				<?php 
				$category_id = 6;
				$category = get_the_category_by_ID($category_id); 
				?>
				<h3 class="reg"><?php echo $category; ?></h3>
				<ul>
					<?php while ( $nav_query->have_posts() ) {
						$nav_query->the_post(); ?>
						<li class="">
							<a href="<?php the_permalink(); ?>" class="small">							
								<?php the_title(); ?>				
							</a>
						</li>
					<?php } ?>
				</ul>
			<?php } else { }
			wp_reset_postdata(); ?>				
		</div>

