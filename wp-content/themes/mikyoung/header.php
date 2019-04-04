<!DOCTYPE html>

<html>

<head>

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<?php if (is_search()) { ?>
	<meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title> 
		<?php
		if (is_home()) {
			bloginfo('name'); echo ' - '; bloginfo('description'); 
		}
		elseif (!(is_404()) && (is_single()) || (is_page())) {
			wp_title(''); echo ' | '; bloginfo('name'); echo ' - '; bloginfo('description'); 
		}
		elseif (is_404()) {
			echo 'Oops! Page not found.'; 
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
	<!-- moved this css file to /themes/mikyoung/_/css/main.scss -->
	 	<!-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"> -->	

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

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/_/fonts/MyFontsWebfontsKit.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/_/fonts/pictograms.css">
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/_/fonts/entypo.css">
 
	<!-- Removed lt ie 9 conditions here, 12-15-17 greg nemes -->

  <?php wp_head(); ?>

</head>

<body <?php body_class('before header-closed modal-off'); ?>>

<header id="header" class="closed  <?php if (is_home()) { echo 'loading-mykd'; } else{ } ?>">

	<div class="header-top-wrapper">
		<div class="container">
			<div class="row header-top">
				<a id="logo" class="logo left" href="<?php bloginfo('url'); ?>">
					<img src="<?php bloginfo('template_directory'); ?>/_/img/logo2.png" alt="logo">
				</a>
				<div class="nav-main right">
					<a href="<?php bloginfo('url'); ?>/work" id="work-nav-item" class="nav-main-link">work</a>
					<a href="<?php bloginfo('url'); ?>/news" id="blog-nav-item" class="nav-main-link">news</a>
					<a href="<?php bloginfo('url'); ?>/about" id="about-nav-item" class="nav-main-link">firm</a>
					<a href="<?php bloginfo('url'); ?>/awards" id="awards-nav-item" class="nav-main-link">awards</a>
					<a id="nav-toggle" href="#" class="right nav-toggle">index</a>
				</div>	
				<a id="nav-close" href="#" class="nav-toggle"><span class="icon" data-icon="’"></span></a>
			</div>
		</div>
	</div>

	<div class="header-nav-wrapper">
		<div class="container">
			<nav class="row header-nav">
				<div id="blanket"></div>
				<?php get_template_part('nav'); ?>			
			</nav>
		</div>
	</div>

</header>

<div id="content" class="loading-mykd">
