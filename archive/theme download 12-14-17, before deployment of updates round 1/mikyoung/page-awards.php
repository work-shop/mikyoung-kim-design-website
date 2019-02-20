<?php
/* 
Template Name: Awards
*/
?><?php get_header();?>

<?php while ( have_posts() ) : the_post(); ?>

	<div class="container work page-body page-container loading loaded">

		<div class="row">
		
			
			
			<div class="col-sm-12 " id="award-content">
				<div class="page-content ">
					
					
							<section class="about-section" id="about_awards">

						<h3 class="section-heading bg-brand">Awards</h3>						
						<h3 class="section-intro"><?php the_field('awards_introduction','option'); ?></h3>						
						<div class="section-body row">
							<div class="col-sm-12">
									<?php 
									$ac = 1;
									while(has_sub_field('awards','option')): 
									?>
										<div class="awardsContainer">
											<div style="float:left; width: 75px; margin-right: 4px;">
												<?php

													if(get_sub_field('award_icon'))
														{
															echo '<img src="' . get_sub_field('award_icon') . '" alt="award" style="width: 75px!important;height: auto" />'; 
														} 
												?>
	
											</div>
											<div id="award_info">
												<?php
													if(get_sub_field('award_year'))
														{
															echo '<span class="bold">' . get_sub_field('award_year','option') . '</span><br />'; 
														} 
												?>
											<?php the_sub_field('award_description','option'); ?>
											<br />
											
											<?php
													if(get_sub_field('award_url'))
														{
															echo '<a target="_blank" href="' . get_sub_field('award_url'). '" title="Award Logo">'; 
														} 
												?>
											
											
											<strong><?php the_sub_field('award_name','option'); ?></strong>
											<?php
													if(get_sub_field('award_url'))
														{
															echo '</a>'; 
														} 
												?>
											</div>
											<div style="clear:both;"></div>
										</div>
									<?php 
									$ac = $ac+1;
									endwhile; ?>
								
							</div>					
						</div>
							</section>											
								
				</div>
			</div>		
										
		</div>
		
	</div>	
		
	


<?php endwhile; ?>

<?php get_footer();?>
