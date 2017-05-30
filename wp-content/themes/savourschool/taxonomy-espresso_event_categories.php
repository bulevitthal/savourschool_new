<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package savourschool
 */

get_header(); ?>
	<div class="row">
		<div class="col-sm-10 col-sm-offset-1">
			<div id="custom-loader" class="custon-loader"></div>
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
				<div id="event_category_list" class="event_category_post_list">
					<?php $term_slug = get_queried_object()->slug;	 ?>
					<?php
						$count_atts = array(
							'limit' => -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'espresso_event_categories',
									'field' => 'slug',
									'terms' => $term_slug,
								)
							),
						);


						$postsPerPage = 10;
						$atts = array(
							'limit' => $postsPerPage,
							'tax_query' => array(
								array(
									'taxonomy' => 'espresso_event_categories',
									'field' => 'slug',
									'terms' => $term_slug,
								)
							),
						);

					// run the query
					global $wp_query; 
					$count_query = new EE_Event_List_Query( $count_atts );
					
					$wp_query = new EE_Event_List_Query( $atts );
					?>

					<?php if ( $wp_query->have_posts() ) : ?>

						<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
								<?php get_template_part( 'template-parts/content', 'event-category' ); ?>
						<?php endwhile; ?>

							<?php if ($count_query->post_count > 10) { ?>
								<div class="more-event-category-post clearfix text-center">
							        <div class="col-sm-12">
								        <div id="event_category_post_loadmore" class="event_category" data-category="<?php echo $term_slug; ?>">Load More</div>
								    </div>
								</div>
							<?php }	?>

						<?php wp_reset_postdata(); ?>

					<?php else : ?>
						<p><?php _e( 'Sorry, no event matched your criteria.' ); ?></p>
					<?php endif; ?>					
				</div>

				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
<?php
get_footer();
