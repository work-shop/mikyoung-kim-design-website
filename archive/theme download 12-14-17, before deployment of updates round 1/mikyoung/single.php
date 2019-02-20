<?php get_header();?>

<?php while ( have_posts() ) : the_post(); ?>

	
		
	<?php get_template_part('post'); ?>

<?php endwhile; ?>

	<div class="page-heading separator bg-gray hidden">
		<div class="container">
			<div class="row">
				<h3 class="bold">More from the Blog</h3>
			</div>		
		</div>
	</div>
		

<?php get_footer();?>
