<?php
/*
 Template Name: Online Class Subscription Template
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="custom-loader" class="custon-loader"></div>
		<main id="main" class="site-main" role="main">
			
			<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', online_subscription );

				endwhile; // End of the loop.
			?>
			
		</main><!-- #main -->
	</div><!-- #primary -->
		
<?php
//get_sidebar();
get_footer();
