<?php
	add_action( 'init', 'create_post_type' );
	function create_post_type() {
	  register_post_type( 'adhoc_section',
	    array(
	      'labels' => array(
	        'name' => __( 'Section' ),
	        'singular_name' => __( 'Section' )
	      ),
	    'public' => true,
	    'has_archive' => true,
	    )
	  );
	}
?>

<?php
	function adhoc_register_theme_menu() {
	    register_nav_menu( 'primary', 'Main Navigation Menu' );
	}
	add_action( 'init', 'adhoc_register_theme_menu' );
?>

