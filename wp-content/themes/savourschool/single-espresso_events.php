<?php
/**
 * The template for displaying all events.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package savourschool
 */

get_header(); ?>
	<div class="row">
		<div class="col-md-12 col-xs-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

					<?php
					while ( have_posts() ) : the_post();

						espresso_get_template_part( 'content', 'espresso_events' );

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>

<?php
//get_sidebar();
get_footer();
