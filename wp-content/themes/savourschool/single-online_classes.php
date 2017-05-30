<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package savourschool
 */

get_header(); ?>
	<div class="online_classes_wrapper">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', online_classes );

				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
			</div><!-- #primary -->

<?php
//get_sidebar();
get_footer();
