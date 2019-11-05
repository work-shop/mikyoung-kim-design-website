<?php
/* 
Template Name: About
*/
?><?php get_header();?>

<?php while ( have_posts() ) : the_post(); ?>

	<section id="about-home" class="block flexslider-full crop loading-mykd">
		<div id="previous-about" class="flexslider-full-direction previous flex-previous">
			<span class="icon" data-icon="&#8216;"></span>
		</div>				
		<?php if(get_field('about_page_slideshow','option')): ?>

			<ul class="slides"> 

				<?php while(has_sub_field('about_page_slideshow','option')): ?>

					<?php $slide_image = get_sub_field('slide_image'); ?>
					<li style="background-image: url('<?php echo $slide_image[sizes][slideshow]; ?>'); background-size: cover; background-position: center;">
						<?php if(get_sub_field('slide_link')){ ?>
							<a href="<?php the_sub_field('slide_link'); ?>">
							<?php } else{ } ?>											
							<?php if(get_sub_field('slide_description')): ?>
								<div class="flex-caption">
									<h1 class="white">

										<?php the_sub_field('slide_description'); ?>
									</h1>
								</div>	
							<?php endif; ?>												
							<?php if(get_sub_field('slide_link')): ?>
							</a>
						<?php endif; ?>
					</li>	

				<?php endwhile; ?>	 

			</ul>	

			<div class="flexslider-full-controls"></div> 		

		<?php endif; ?>
		<div id="next-about" class="flexslider-full-direction next flex-next">
			<span class="icon" data-icon="&#8212;"></span>
		</div>			

		<div class="section-footer bg-gray">
			<a href="#about" class="jump">
				<h4 class="hidden">learn more</h4>
				<span class="icon" data-icon="&rdquo;"></span>
			</a>
		</div>
		
	</section>
	
	<div class="homefix"></div>
	
	<div id="about-intro" class="bg-brand block loading padded hidden">

		<div class="container">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<h1 class=""><?php the_field('about_page_introduction','option'); ?></h1>
				</div>
			</div>	
		</div>

	</div>	

	<section class="loading block bg-gradient padded fixed-nav-container" id="about">

		<div class="container">

			<div class="row">

				<div class="col-sm-3 page-nav fixed-nav" id="about-nav">
					<ul>
						<li><a href="#about_about"class="jump-about ">about</a></li>
						<li><a href="#about_team"class="jump-about">our team</a></li>
						<!-- <li><a href="#about_clients"class="jump-about hidden">clients</a></li> -->
						<li><a href="#about_publications"class="jump-about">publications</a></li>
						<li><a href="#about_jobs"class="jump-about">jobs</a></li>						
						<li><a href="#about_contact"class="jump-about">contact</a></li>
					</ul>
				</div>	

				<div class="col-sm-9 col-sm-offset-3" id="about-content">
					<div class="page-content about">

						<section class="about-section" id="about_about">
							<h3 class="section-heading bg-brand">About</h3>						
							<h3 class="section-intro"><?php the_field('about_introduction','option'); ?></h3>						
							<div class="section-body row">
								<div class="col-sm-9">
									<p class="text"><?php the_field('about_body','option'); ?></p>
								</div>
								<div class="col-sm-3 ">
									<p><?php the_field('contact_info','option'); ?></p>
									<p class="about-about-social">
										<?php get_template_part( 'social_icons'); ?>
									</p>
								</div>							
							</div>
						</section>	

						<section class="about-section" id="about_team">
							<h3 class="section-heading bg-brand">Our Team</h3>						
							<h3 class="section-intro"><?php the_field('people_introduction','option'); ?></h3>						
							<div class="section-body row" id="team">
								<?php if( have_rows('team','option') ): ?>
									<?php $team_count = 1; ?>
									<?php while( have_rows('team','option') ): the_row(); ?>
										<?php
										$image = get_sub_field('photo');
										$bio = get_sub_field('bio');
										$name = get_sub_field('name');
										$title = get_sub_field('title');
										$active = get_sub_field('active'); ?>
										<?php if( $active ): ?>
											<div class="team-member person <?php if($bio): echo 'modal-toggle'; endif; ?> <?php if (($team_count % 3) == 0): echo 'person-third'; endif; ?>" id="person-<?php echo $team_count; ?>" data-modal-target="modal-person-<?php echo $team_count; ?>">
												<img src="<?php echo $image['sizes']['person']; ?>" alt="<?php echo $image['alt'] ?>" class="person-image" />
												<h4 class="person-name ">
													<span class="bold"><?php echo $name; ?></span>
													<br class="visible-xs">
													<?php echo $title; ?>
												</h4>
												<a class="small bio-link modal-toggle hidden" href="#" data-modal-target="modal-person-<?php echo $team_count; ?>">
													Click for Bio
												</a>
											</div>
											<?php $team_count = $team_count + 1; ?>
										<?php endif; ?>
									<?php endwhile; ?>
									<?php $team_count = 1; ?>
									<?php while( have_rows('team','option') ): the_row(); ?>
										<?php
										$image = get_sub_field('photo');
										$bio = get_sub_field('bio');
										$name = get_sub_field('name');
										$title = get_sub_field('title');
										$active = get_sub_field('active'); ?>
										<?php if( $active && $bio ): ?>
											<div class="modal-mk modal-person off" id="modal-person-<?php echo $team_count; ?>">
												<div class="modal-body">
													<div class="container">
														<div class="row">
															<div class="col-sm-10 col-sm-offset-3">
																<h4 class="person-name "><span class="bold"><?php echo $name; ?></span>,
																	<?php echo $title; ?>
																</h4>
																<p class="person-bio">
																	<?php echo $bio; ?>
																</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php $team_count = $team_count + 1; ?>
										<?php endif; ?>
									<?php endwhile; ?>
								<?php endif; ?>
							</div>
							<div class="modal-blanket"></div>
						</section>	


						<!-- <section class="about-section hidden" id="about_clients">
							<h3 class="section-heading bg-brand">Clients</h3>						
							<h3 class="section-intro"><?php the_field('clients_introduction','option'); ?></h3>						
							<div class="section-body row">
								<?php the_field('clients_body','option'); ?>				
							</div>
						</section>	 -->

						<section class="about-section" id="about_publications">
							<h3 class="section-heading bg-brand">Publications</h3>						
							<h3 class="section-intro"><?php the_field('publications_introduction','option'); ?></h3>						
							<div class="section-body row">
								<?php while(has_sub_field('publications','option')): ?>
									<div class="col-lg-3 col-md-4 col-sm-4 col-xs-6 publication">
										<?php $slide_image_2 = get_sub_field('publication_image','option'); ?>
									<?php if(get_sub_field('publication_link')): ?>
										<a href="<?php the_sub_field('publication_link','option'); ?>" target="_blank">
										<?php endif; ?>
										<img src="<?php echo $slide_image_2[sizes][publications]; ?>" alt="publication">
										<h5 class="publication-source">
											<?php the_sub_field('publication_source','option'); ?>
										</h5>
										<p class="publication-title">
											<?php the_sub_field('publication_title','option'); ?>
										</p>
										<?php if(get_sub_field('publication_link')): ?>
										</a>
									<?php endif; ?>
								</div>
							<?php endwhile; ?>	
						</div>
					</section>	

					<section class="about-section" id="about_jobs">
						<h3 class="section-heading bg-brand">Jobs</h3>						
						<h3 class="section-intro"><?php the_field('jobs_introduction','option'); ?></h3>						
						<div class="section-body row">
							<ul class="col-sm-12">
								<?php while(has_sub_field('jobs','option')): ?>
									<li>
										<p><?php the_sub_field('job_title','option'); ?></p>
										<p><?php the_sub_field('job_description','option'); ?>
										<?php if(get_sub_field('job_link')): ?>
											<a href="<?php the_sub_field('job_link','option'); ?>" target="_blank" class="bold">More Info</a>
										<?php endif; ?>
									</li>
								<?php endwhile; ?>
							</ul>			
						</div>
					</section>

					<section class="about-section" id="about_contact">
						<h3 class="section-heading bg-brand">Contact</h3>			
						<div class="section-body row">
							<div class="col-sm-5">
								<p>
									<?php the_field('contact_info_2','option'); ?>
								</p>
								<p class="about-contact-social">
									<?php get_template_part( 'social_icons'); ?>
								</p>
							</div>
							<div class="col-sm-7">
								<p class="section-intro-contact">
									<?php the_field('contact_introduction','option'); ?>
								</p>	
							</div>
						</div>
					</section>																	
				</div>
			</div>		

		</div>

	</div>	

</section>	

<section id="callout-firm" class="block callout min-small loading">

	<?php $background_image_2 = get_field('callout_2_background_image','option'); ?>
	<section id="callout-clients" class="block callout min padded" style="background-image: url('<?php echo $background_image_2[sizes][slideshow]; ?>')">	

		<div class="callout-overlay dark"></div>	

		<div class="container">
			<div class="row">	
				<div class="callout-text">
					<h1><?php the_field('callout_2_text','option'); ?></h1>
				</div>
			</div>
		</div>

	</section>		


<?php endwhile; ?>

<?php get_footer();?>
