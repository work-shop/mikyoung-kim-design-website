</div>

<footer id="footer" class="bg-gradient loading">
	<div class="container">
		<div class="row">
			<div id="footer-social" class="left">
				<a href="https://www.facebook.com/mikyoungkimdesign" class="small social-link" target="_blank">		
					<span class="icon-facebook social icon-left" data-icon="&#62220;"></span> 
				</a>
				<a href="https://twitter.com/MikyoungKimDsgn" class="small social-link" target="_blank">	
					<span class="icon-twitter social icon-left" data-icon="&#62217;"></span> 											
				</a>
				<a href="https://www.linkedin.com/company/mikyoung-kim-design" class="small social-link social-link-linkedin" target="_blank">	
					<span class="icon-linkedin social icon-left" data-icon="&#62232;"></span> 															
				</a>
				<a href="https://instagram.com/mikyoungkimdesign" class="small social-link" target="_blank">	
					<span class="icon-instagram social icon-left" data-icon=""></span> 															
				</a>					
				<a href="https://vimeo.com/user11371297" class="small social-link" target="_blank">		
					<span class="icon-vimeo social icon-left" data-icon="&#62214;"></span> 																		
				</a>
				<a href="http://www.pinterest.com/mykd/" class="small social-link" target="_blank">	
					<span class="icon-pinterest social icon-left" data-icon="&#62226;"></span> 																		
				</a>
			</div>
			<div id="footer-right" class="right">
				<a id="backtotop" href="#">back to top <span class="icon" data-icon="&#8220;"></span></a>		 
			</div>			
		</div>
		<div class="row footer-nav">
			<?php get_template_part('nav'); ?>										
		</div>
		<div class="row footer-info">
			<div class="col-sm-12">
				<p class="small centered">
					mikyoung kim design • 119 braintree street, suite 103 • boston, MA 02134 • 617-782-9130 • <a href="mailto:office@myk-d.com" target="_blank">office@myk-d.com</a>
				</p>
			</div>			
			<div class="col-sm-12">
				<p class="small centered">
					Copyright <?php echo date("Y"); ?>, mikyoung kim design. •
					
					<a href="<?php bloginfo('url'); ?>/wp-admin" target="_blank">Log In</a>
				</p>
			</div>	
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

<div id="foot" class="hidden">

	<script src="<?php bloginfo('template_directory'); ?>/_/js/jquery.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/_/js/flexslider-updated.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/_/js/isotope.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/_/js/iso2.js"></script>

	<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-50f20b8a658458ce"></script>	
	<script type="text/javascript">var addthis_config = {"data_track_clickback":true};</script>	
	
</div>


<?php
if( in_array( $_SERVER['HTTP_HOST'], array( 'localhost', '127.0.0.1' ) ) ) : ?>
	<script src="//localhost:35729/livereload.js"></script>
<?php endif; ?>

<!-- Twitter universal website tag code -->
<script>
	!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
	},s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
	a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
// Insert Twitter Pixel ID and Standard Event data below
twq('init','nz9o4');
twq('track','PageView');
</script>
<!-- End Twitter universal website tag code -->

<!-- Start of HubSpot Embed Code -->
<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/4488136.js"></script>
<!-- End of HubSpot Embed Code -->

</body>

</html>