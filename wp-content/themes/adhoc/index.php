<?php
/**
* The main template file
*
* This is the main website
*
* @package WordPress
* @subpackage Adhoc
* @since Adhoc 1.0
*/

get_header(); ?>

<div class="wrapper">

	<?php get_template_part( 'about_description' );	?>

	<?php get_template_part( 'about_residents' ); ?>

</div><!-- .wrapper -->

<?php get_template_part( 'music_player' ); ?>

<?php get_template_part( 'shows' ); ?>

<?php get_footer(); ?>