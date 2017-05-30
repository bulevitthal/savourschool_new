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
		<div class="col-md-8 col-xs-12">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">

				<?php
				while ( have_posts() ) : the_post();

					get_template_part( 'template-parts/content', get_post_format() );

					$rows = get_field('class_time');


					if($rows)
					{
						foreach($rows as $row)
						{
							//print_r($row['price']);
						}
					}

				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!--col-md-8 col-xs-12 -->
<?php wc_print_notices() ?>
<?php
get_sidebar();
get_footer();
