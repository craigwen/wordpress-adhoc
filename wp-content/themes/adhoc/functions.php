<?php 
	add_action('wp_enqueue_scripts', 'init_css_scripts'); 
	function init_css_scripts() {
		 wp_enqueue_style('my-script-slug',  get_stylesheet_directory_uri() . '/style.css');
		 wp_enqueue_script('my-script-slug', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js');
		 wp_enqueue_script('my-script-slug', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js');
	}

	add_action( 'init', 'create_post_type' );
	function create_post_type() {
	  // register_post_type( 'section',
	  //   array(
	  //     'labels' => array(
	  //       'name' => __( 'Sections' ),
	  //       'singular_name' => __( 'Section' )
	  //     ),
	  //   'public' => true,
	  //   'has_archive' => true,
	  //   )

	    register_post_type( 'adhoc_section',
	    array(
	      'labels' => array(
	        'name' => __( 'Sections' ),
	        'singular_name' => __( 'Section' )
	      ),
	    'taxonomies' => array('category'),
	    'public' => true,
	    'has_archive' => true,
	    )
	  );

	}

	function adhoc_register_theme_menu() {
	    register_nav_menu( 'primary', 'Main Navigation Menu' );
	}
	add_action( 'init', 'adhoc_register_theme_menu' );
?>