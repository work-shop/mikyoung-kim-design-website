<?php while ( have_posts() ) : the_post(); ?>

	<div class="container work page-body page-container">
		<div id="award-content">
			<div class="page-content">
				<section class="about-section" id="about_awards">

					<!-- 	<h3 class="section-heading bg-brand">Awards</h3> -->						
					<h3 class="section-intro"><?php the_field('awards_introduction','option'); ?></h3>						
					<div class="section-body">
						<div class="multi-column" id="awards">
							<?php 
							$ac = 1;
							$awards = get_sub_field('awards','option');
							$awards_length = count($awards);
							while( have_rows('awards', 'option') ): the_row(); 

								?>
								<div class="award">
									<div class="award-left">
										<?php if(get_sub_field('award_icon')){
											echo '<img src="' . get_sub_field('award_icon') . '" alt="award" class="award-icon" />'; 
										} ?>
									</div>
									<div class="award-right">
										<?php if(get_sub_field('award_url')) {
											echo '<a target="_blank" href="' . get_sub_field('award_url'). '" class="award-link" title="Award">'; 
										} ?>
										<h4 class="award-title">
											<?php if(get_sub_field('award_year')) {
												echo '<span class="award-year bold">' . get_sub_field('award_year','option') . '</span> '; 
											} ?>
											<?php if(get_sub_field('award_name')) {
												echo '<span class="award-name bold"> ' . get_sub_field('award_name','option') . '</span>'; 
											} ?>
										</h4>
										<h4 class="award-description">
											<?php if(get_sub_field('award_description')) {
												echo '<span class="award-description"> ' . get_sub_field('award_description','option') . '</span>'; 
											} ?>
										</h4>
										<?php if(get_sub_field('award_url')) {
											echo '</a>'; 
										} ?>
									</div>
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

	<?php endwhile; ?>