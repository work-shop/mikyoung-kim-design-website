
<?php
$show_announcement = get_field('show_announcement_section','option'); 
$show_news_stories = get_field('show_news_stories_section','option'); 
?>

<div id="announcements-and-news">

	<?php if($show_announcement): ?>
		<?php $announcement = get_field('home_page_announcement','option'); ?>
		<section id="announcement" class="block bg-gradient">
			<div class="container announcement-container">
				<div class="announcement">
					<?php $link = $announcement['announcement_link']; ?>
					<?php if( $link ): ?>
						<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
						<?php endif; ?>
						<div class="row">
							<div class="col-lg-8">
								<h1 class="announcement-heading reg">
									<?php echo $announcement['announcement_heading']; ?>
								</h1>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6">
								<img src="<?php echo $announcement['announcement_image']['sizes']['medium_large']; ?>" />
							</div>
							<div class="col-sm-6 col-md-6 col-lg-6 announcements-subheading-col">
								<h2 class="announcement-subheading">
									<?php echo $announcement['announcement_subheading']; ?>
								</h2>
								<?php 
								if( $link ): ?>
									<div class="announcement-link-container">
										<a class="an-link reg" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?> <span class="icon" data-icon="—"></span></a>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<?php if( $link ): ?>
						</a>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

	<?php if( $show_news_stories ) : ?>
		<section id="news-stories" class="block bg-medium">
			<div class="container">
				<div class="row">
					<?php if( have_rows('home_page_news_stories','option') ): ?>
						<?php  while ( have_rows('home_page_news_stories','option')  ) : the_row(); ?>
							<div class="col-sm-6 home-news-story">
								<?php $link = get_sub_field('news_story_link'); ?>
								<?php if( $link ): ?>
									<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
									<?php endif; ?>
									<h2 class="news-story-heading reg">
										<?php the_sub_field('news_story_heading'); ?>
									</h2>
									<?php $image = get_sub_field('news_story_image'); ?>

									<img src="<?php echo $image['sizes']['project-tile']; ?>" />
									<h3 class="news-story-subheading">
										<?php the_sub_field('news_story_subheading'); ?>
									</h3>
									<?php 
									if( $link ): ?>
										<div class="news-story-link-container">
											<a class="an-link reg" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>"><?php echo $link['title']; ?> <span class="icon" data-icon="—"></span></a>
										</div>
									<?php endif; ?>
									<?php if( $link ): ?>
									</a>
								<?php endif; ?>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>

</div>