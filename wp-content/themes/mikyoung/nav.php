		<div class="col-sm-2 nav-col-firm" >
			
			<h3 class="reg">firm + news</h3>
			<ul>					
				<li class="">
					<a href="<?php bloginfo('url'); ?>/work" class="small">							
						work				
					</a>
				</li>	
				<li class="">
					<a href="<?php bloginfo('url'); ?>/news" class="small">							
						news				
					</a>
				</li>				
				<li class="">
					<a href="<?php bloginfo('url'); ?>/about" class="small">							
						about				
					</a>
				</li>	
				<li class="">
					<a href="<?php bloginfo('url'); ?>/awards" class="small">							
						awards				
					</a>
				</li>
				<li class="">
					<a href="<?php bloginfo('url'); ?>/about#about_contact" class="small">							
						contact				
					</a>
				</li>
				<li class="social-item">
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
		
		<div class="col-sm-2">
			<?php 
			$args = array(
				'post_type' => 'project',
				'project_category' => 'civic-institutional',
				'posts_per_page' => '-1'
			);
			$nav_query = new WP_Query( $args );
			if ( $nav_query->have_posts() ) { ?>
			<h3 class="reg"><a href="/work">civic + institutional</a></h3>
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

			<div class="col-sm-2">
				<?php 
				$args = array(
					'post_type' => 'project',
					'project_category' => 'plaza-2',
					'posts_per_page' => '-1'
				);
				$nav_query = new WP_Query( $args );
				if ( $nav_query->have_posts() ) { ?>
				<h3 class="reg"><a href="/work">plaza</a></h3>
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

				<div class="col-sm-2">
					<?php 
					$args = array(
						'post_type' => 'project',
						'project_category' => 'garden-2',
						'posts_per_page' => '-1'
					);
					$nav_query = new WP_Query( $args );
					if ( $nav_query->have_posts() ) { ?>
					<h3 class="reg"><a href="/work">garden</a></h3>
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

					<div class="col-sm-2">
						<?php 
						$args = array(
							'post_type' => 'project',
							'project_category' => 'art-environments',
							'posts_per_page' => '-1'
						);
						$nav_query = new WP_Query( $args );
						if ( $nav_query->have_posts() ) { ?>
						<h3 class="reg"><a href="/work">environmental art</a></h3>
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

						<div class="col-sm-2 hidden">
							<?php 
							$args = array(
								'post_type' => 'project',
								'project_category' => 'healing-healthcare',
								'posts_per_page' => '-1'
							);
							$nav_query = new WP_Query( $args );
							if ( $nav_query->have_posts() ) { ?>
							<h3 class="reg"><a href="/work">healing + healthcare</a></h3>
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

							<div class="col-sm-2">
								<?php 
								$args = array(
									'post_type' => 'project',
									'project_category' => 'urban-masterplan',
									'posts_per_page' => '-1'
								);
								$nav_query = new WP_Query( $args );
								if ( $nav_query->have_posts() ) { ?>
								<h3 class="reg"><a href="/work">masterplan</a></h3>
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

