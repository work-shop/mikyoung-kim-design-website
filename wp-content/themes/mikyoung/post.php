<div class="post page-body page-container">

	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-md-9">

				<article <?php post_class('single-article'); ?>>
					

					<?php if ( has_post_thumbnail() ) : ?>
						<div class="image-container">
							<?php the_post_thumbnail('project-large'); ?>
						</div>
					<?php endif; ?>	
					<div class="post-heading">
						<div class="container">
							<div class="row">
								<h3 class=" bold"><?php the_title(); ?></h3>
							</div>		
						</div>
					</div>
					<h2 class="post-title hidden bold">
						<?php the_title(); ?>
					</h2>		
					<p class="reg date"><?php echo get_the_date(); ?> | 
						<?php if(in_category('2')){
							echo 'News';
						}
						else{
							echo 'Blog';
						} ?>

					</p>
					<div class="post-content">			
						<?php the_content(); ?>
					</div>
					
					<div class="share-post">
						<h3 class="bold">Share 
							<a class="addthis_button_facebook" addthis:url="<?php the_permalink(); ?>"  addthis:title="Mikyoung Kim Design">
								<span class="icon-facebook social icon-left" data-icon="&#62220;"></span> 
							</a>							
							<a class="addthis_button_twitter" addthis:url="<?php the_permalink(); ?>" addthis:title="Mikyoung Kim Design">
								<span class="icon-twitter social icon-left" data-icon="&#62217;"></span>
							</a>
							<a class="addthis_button_linkedin" addthis:url="<?php the_permalink(); ?>" addthis:title="Mikyoung Kim Design">
								<span class="icon-linkedin social icon-left" data-icon="&#62232;"></span> 
							</a>	
							<a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'>
								<span class="icon-pinterest social icon-left" data-icon="&#62226;"></span>
							</a>

						</h3>

					</div>

				</article>	    	    			

			</div>
			<div class="col-sm-4 col-md-3 relatedarticles">
				<?php echo do_shortcode("	[related_posts_by_tax posts_per_page='4' format='excerpts' title='Related Articles' ]"); ?>
			</div>
		</div>		
	</div>	

</div>