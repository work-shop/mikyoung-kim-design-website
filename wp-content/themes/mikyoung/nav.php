<div class="col-sm-2">
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
		<h3 class="reg"><a href="/work"><?php echo $category; ?></a></h3>
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
		'project_category' => 'health-wellness',
		'posts_per_page' => '-1'
	);
	$nav_query = new WP_Query( $args );
	if ( $nav_query->have_posts() || true ) { ?>
		<?php 
		$category_id = 5;
		$category = get_the_category_by_ID($category_id); 
		?>
		<h3 class="reg"><a href="/work"><?php echo $category; ?></a></h3>
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
		'project_category' => 'civic-institutional',
		'posts_per_page' => '-1'
	);
	$nav_query = new WP_Query( $args );
	if ( $nav_query->have_posts() || true ) { ?>
		<?php 
		$category_id = 8;
		$category = get_the_category_by_ID($category_id); 
		?>
		<h3 class="reg"><a href="/work"><?php echo $category; ?></a></h3>
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
		'project_category' => 'mixed-use',
		'posts_per_page' => '-1'
	);
	$nav_query = new WP_Query( $args );
	if ( $nav_query->have_posts() || true ) { ?>
		<?php 
		$category_id = 90;
		$category = get_the_category_by_ID($category_id); 
		?>
		<h3 class="reg"><a href="/work"><?php echo $category; ?></a></h3>
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
	if ( $nav_query->have_posts() || true ) { ?>
		<?php 
		$category_id = 4;
		$category = get_the_category_by_ID($category_id); 
		?>
		<h3 class="reg"><a href="/work"><?php echo $category; ?></a></h3>
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
	if ( $nav_query->have_posts() || true ) { ?>
		<?php 
		$category_id = 6;
		$category = get_the_category_by_ID($category_id); 
		?>
		<h3 class="reg"><a href="/work"><?php echo $category; ?></a></h3>
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

