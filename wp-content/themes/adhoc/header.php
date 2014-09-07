<?php
/**
* The Header for Adhoc theme
*
* Displays all of the <head> section and everything up through <div id="hero-img"></div>
*
* @package WordPress
* @subpackage Adhoc
* @since Adhoc 1.0
*/
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Adhoc is a growing ensemble of vocalists and musicians living and performing in New York City. We explore the traditions of early music and also play with its possibilities, drawing from an eclectic array of influences to keep it fresh." />
	<meta property="og:image" content="http://www.adhoc-ny.com/img/newyork.jpg"/>
	<meta property="og:image:type" content="image/jpeg">
	<meta property="og:image:width" content="1200">
	<meta property="og:image:height" content="506">
	<meta property="og:description" content="Adhoc is a growing ensemble of vocalists and musicians living and performing in New York City. We explore the traditions of early music and also play with its possibilities, drawing from an eclectic array of influences to keep it fresh.">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" title="General styles">
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
	<link href='http://fonts.googleapis.com/css?family=Lora:400,400,400italic,700italic,800|Montserrat:400,700' rel='stylesheet' type='text/css'> <!-- Google fonts -->
</head>

<body>

<div class="wrapper">		
	<header class="row clearfix">
		<nav class="column full centered">
			<img id="logo" src="img/adhoc-logo.svg">
			<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<!-- <ul>
				<li><a class="scroll" href="#about-anchor">about</a></li>
				<li><a class="scroll" href="#music-anchor">music</a></li>
				<li><a class="scroll" href="#shows-anchor">shows</a></li>
				<li><a class="scroll" href="#contact-anchor">contact</a></li>
			</ul> -->
		</nav>
	</header>
</div> <!-- end .wrapper -->

<div id="hero-img"></div>