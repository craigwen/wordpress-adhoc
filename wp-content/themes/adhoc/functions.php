<?php
	function adhoc_register_theme_menu() {
	    register_nav_menu( 'primary', 'Main Navigation Menu' );
	}
	add_action( 'init', 'adhoc_register_theme_menu' );
?>