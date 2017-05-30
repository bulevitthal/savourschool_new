<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package savourschool
 */

get_header(); ?>
	<div class="row">
		<div class="col-md-2 hidden-xs hidden-sm">
			<button class="back-button" onclick="goBack()"></button>
			<script>
				function goBack() {
				    window.history.back();
				}
			</script>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-8">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', 'post' );

					//the_post_navigation();

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!--col-md-8 col-xs-12 -->
		<div class="col-md-2 hidden-xs hidden-sm"></div>
	</div>
<?php
//get_sidebar();
get_footer();
