<!DOCTYPE html>

<html>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<?php if (is_search()) { ?>
		<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title> 
	   <?php
		   if (!(is_404()) && (is_single()) || (is_page())) {
	          	bloginfo('name'); echo ' - '; wp_title('');
	          }
	      elseif (is_404()) {
	         	echo 'Oops!'; 
	         }
	      if (is_home()) {
	         	bloginfo('name'); echo ' - '; bloginfo('description'); 
	         }
	      else {
	         	bloginfo('name'); echo ' - '; bloginfo('description'); 
	         }
	   ?>
	</title>
				   
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta name="google-site-verification" content="">
	<meta name="author" content="Greg Nemes">
		
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico" />
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_directory'); ?>/_/img/favicon-152.png">
<meta name="msapplication-TileColor" content="#FFFFFF">
<meta name="msapplication-TileImage" content="<?php bloginfo('template_directory'); ?>/_/img/favicon-144.png">
<!-- For iPad with high-resolution Retina display running iOS ≥ 7: -->
<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php bloginfo('template_directory'); ?>/_/img/favicon-152.png">

<!-- For iPad with high-resolution Retina display running iOS ≤ 6: -->
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php bloginfo('template_directory'); ?>/_/img/favicon-144.png">

<!-- For iPhone with high-resolution Retina display running iOS ≥ 7: -->
<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php bloginfo('template_directory'); ?>/_/img/favicon-120.png">

<!-- For iPhone with high-resolution Retina display running iOS ≤ 6: -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php bloginfo('template_directory'); ?>/_/img/favicon-114.png">

<!-- For first- and second-generation iPad: -->
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php bloginfo('template_directory'); ?>/_/img/favicon-72.png">

<!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_directory'); ?>/_/img/favicon-57.png">
<link rel="icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon-32.png" sizes="32x32">
    
    
    
    
    
    
	<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/_/img/favicon.ico">
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <!--[if lt IE 9]>
      <script src="<?php bloginfo('template_directory'); ?>/_/js/html5shiv.js"></script>
      <script src="<?php bloginfo('template_directory'); ?>/_/js/respond.js"></script>
    <![endif]-->		
    	
	<?php wp_head(); ?>
			
</head>

<body <?php body_class('before header-closed'); ?>>

	<!--[if lt IE 9]>
	
	<div id="ie-warning">
			<div class="ie-warning-container">
			<h4>Hey! Looks like you're using an older browser.<br/>
			Some features on this site will not be available to you, or you can upgrade your browser to a newer version. <br/>
			We recommend google chrome or firefox. <a href="#hide" id="ie-close"></span> Ok, got it. <span class="icon icon-right" data-icon="x"></a>
			</h4>
		</div>
	</div>	
	
	<![endif]-->


	<header id="header" class="closed  <?php if (is_home()) { echo 'loading'; } else{ } ?>">
				
		<div class="container">
			<div class="row header-top">
				<a id="logo" class="logo left" href="<?php bloginfo('url'); ?>">
					<img src="<?php bloginfo('template_directory'); ?>/_/img/logo2.png" alt="logo">
				</a>

				<a id="nav-toggle" href="#" class="right">
					<span class="small white transparent" id="toggle-help">type m for menu</span><br/>
					menu<span class="icon" data-icon="x"></span>
				</a>
				<div class="nav-main right hidden-xs">
					<a href="<?php bloginfo('url'); ?>/work" id="work-nav-item">work</a>
					<a href="<?php bloginfo('url'); ?>/news" id="blog-nav-item">news</a>																	
					<a href="<?php bloginfo('url'); ?>/about" id="about-nav-item">firm</a>

					<a href="<?php bloginfo('url'); ?>/awards" id="awards-nav-item">awards</a>
				</div>	

			</div>
			
			<nav class="row header-nav">
				<div id="blanket"></div>
				<?php get_template_part('nav'); ?>			
			</nav>
		</div>		
	</header>
		
	<div id="content" class="">
