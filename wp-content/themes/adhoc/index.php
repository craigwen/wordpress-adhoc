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

	<?php get_template_part( 'content', 'description' );	?>

	<!-- <?php get_template_part( 'content', 'residents' ); ?> -->

</div><!-- .wrapper -->

<!-- <?php get_template_part( 'content', 'music_player' ); ?> -->

<!-- <?php get_template_part( 'content', 'shows' ); ?> -->

<?php get_footer(); ?>