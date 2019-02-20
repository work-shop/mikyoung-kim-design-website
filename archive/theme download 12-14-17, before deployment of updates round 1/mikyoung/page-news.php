<?php
/* 
Template Name: News
*/
?><?php get_header();?>

	<div class="page-heading bg-gray hidden">
		<div class="container">
			<div class="row">
				<h3><?php the_title(); ?></h3>
			</div>		
		</div>
	</div>
		
	<?php get_template_part('news'); ?>
	
<?php get_footer();?>
