<?php

	$args = array(
		'post_type' => "adhoc_about",
		'post_title' => "about",
		'posts_per_page' => 1,
		);

	$the_query = new WP_Query( $args );

?>

<?php if ( $the_query -> have_posts() ): while ( $the_query -> have_posts() ): $the_query -> the_post(); ?>

	<section id="about" class="row">
		<div class="column half centered">
			<a id="about-anchor"></a>
			<h1>about</h1>
			<p><?php the_content(); ?></p>
			<p>Interested in joining Adhoc as a resident or guest?</p>
			<p><a class="drop-line" href="mailto:hello@adhoc-ny.com" title="Email Adhoc">Drop us a line.</a></p>
		</div>

		<!-- <div class="column centered two-thirds space-top clearfix">
			<h2>Residents</h2>
			<ul>
				<li>
					<dt><img src="img/tina.jpg" alt="Tina Scepanovic"></dt>
					<dd>Tina Scepanovic</dd>
				</li>
				<li>
					<dt><img src="img/joe.jpg" alt="Joe Tesoro"></dt>
					<dd>Joe Tesoro</dd>
				</li>
				<li>
					<dt><img src="img/carol.jpg" alt="Carol Szwei"></dt>
					<dd>Carol Szwei</dd>
				</li>
				<li>
					<dt><img src="img/lynn.jpg" alt="Lynn Kiang"></dt>
					<dd>Lynn Kiang</dd>
				</li>
				<li>
					<dt><img src="img/val.jpg" alt="Valerie Madamba"></dt>
					<dd>Valerie Madamba</dd>
				</li>
			</ul>
		</div> -->
	</section>	

<?php endwhile; ?>

<?php endif;
wp_reset_postdata(); ?>