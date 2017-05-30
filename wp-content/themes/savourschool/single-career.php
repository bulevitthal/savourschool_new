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
		<div class="col-md-1 hidden-xs hidden-sm">
			<button class="back-button" onclick="goBack()"></button>
			<script>
				function goBack() {
				    window.history.back();
				}
			</script>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-10">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<p class="text-head" style="text-align: center;">POSITION</p>
					<h1 class="job-name"><?php echo get_the_title(); ?></h1>
					<?php
					while ( have_posts() ) : the_post();

						get_template_part( 'template-parts/content', 'post' );

					endwhile; // End of the loop.
					?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!--col-md-8 col-xs-12 -->
		<div class="col-md-1 hidden-xs hidden-sm"></div>
	</div>
<?php
//get_sidebar();
get_footer();
