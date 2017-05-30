<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package savourschool
 */

get_header(); ?>
	
		<div id="primary" class="content-area">
			<div id="custom-loader" class="custon-loader"></div>
			<main id="main" class="site-main" role="main">
				<div class="taxonomy-video-category-wrapper">

					<div class="container">
							<div class="row">
								<div class="col-md-2">

								</div>
								<div class="col-md-8">
									<div class="taxonomy-video-text-section text-center">
										<div class="page-header">
											<p class="taxonomy-para-text">leaen to create beautiful chocolate flower</p>
											<h1>Available now</h1>
											<div class="online-class-filter">
												<div class="row">
													<div class="col-md-4">
														<div class="filter-first text-center">
															<p><a href="<?php echo get_permalink( ); ?>"><img class="header-img" src="<?php echo get_template_directory_uri(); ?>/images/video.png" /><span class="online-text">Latest Videos</span></a></p>
														</div>
													</div>
													<div class="col-md-4">
														<div class="filter-second text-center">
															<div class="category-filter-wrapper text-right">
														    	<?php 
																	$terms = get_terms( array(
																	    'taxonomy' => 'video_category',
																	    'hide_empty' => false,
																	) );

																	if ($terms) {									      
															    ?>
															    
																<div class="taxonomy-video-category_listing">
																    <div class="dropdown">
																    	<button class="btn btn-default dropdown-toggle taxonomy-video" type="button" data-toggle="dropdown"><img class="header-img" src="<?php echo get_template_directory_uri(); ?>/images/category.png" />  Search By Category<span class="caret"></span></button>
																    	<ul class="dropdown-menu">
																    		<?php 
																    		echo '<ul class="video-category-ul-list">';
				 															foreach ( $terms as $term ) {
																			 
																			    // The $term is an object, so we don't need to specify the $taxonomy.
																			    $term_link = get_term_link( $term );
																			    
																			    // If there was an error, continue to the next term.
																			    if ( is_wp_error( $term_link ) ) {
																			        continue;
																			    }
																			 
																			    // We successfully got a link. Print it out.
																			    echo '<li class="video-category-list"><a href="' . esc_url( $term_link ) . '">' . $term->name . '</a></li>';
																			}
																			 
																			echo '</ul>';
																    		 ?>
																    		
																    	</ul>
																    </div>
														    	</div>
																<?php } ?>
													    	</div>
													    </div>
												    	
													</div>
													<div class="col-md-4">
														<div class="filter-third text-center">
															<p><img class="header-img" src="<?php echo get_template_directory_uri(); ?>/images/forum.png" /><span class="online-text">forum</span></p>
														</div>
													</div>
												</div>
											</div>
										</div><!-- .page-header -->

									</div>		
								</div>
								
								<div class="col-md-2">

								</div>
							</div>
					</div>
						
					<div class="taxonomy-video-section-wrapper text-center">
						<div class="container">
							<div class="row">
								<div class="col-md-1">

								</div>
								<div class="col-md-10">
									<div class="row">
										<div class="taxonomy-video-section text-center">
											<p class="taxonomy-para-text">Latest videos</p>
										</div>
									    <?php $category = get_queried_object(); ?>

										<div id="ajax-category-post" class="row">
									        <?php
									        	$count_args = array(
								                    'post_type' => 'online_classes',
								                    'posts_per_page' => -1,
								                    'tax_query' => array(
														array(
															'taxonomy' => 'video_category',
															'field'    => 'term_id',
															'terms'    => $category->term_id,
														),
													),
									            );
									            $count_video_category = new WP_Query($count_args);

									            $postsPerPage = 3;
									            $args = array(
								                    'post_type' => 'online_classes',
								                    'posts_per_page' => $postsPerPage,
								                    'tax_query' => array(
														array(
															'taxonomy' => 'video_category',
															'field'    => 'term_id',
															'terms'    => $category->term_id,
														),
													),
									            );
									            $loop = new WP_Query($args);
									           ?>
											<?php if ( $loop->have_posts() ) : ?>

												<!-- pagination here -->

												<!-- the loop -->
												<?php while ($loop->have_posts()) : $loop->the_post(); ?>

									        	<?php get_template_part( 'template-parts/content', 'online_class_video' ); ?>
									        
									        	<?php endwhile; ?>
											    <?php if ($count_video_category->post_count > 3) { ?>
											    	<a id="more_category_posts" class="btn btn-primary more-video-custom-btn" data-category="<?php echo $category->term_id; ?>">Load More</a>
											    <?php }	?>
									         <?php wp_reset_postdata(); ?>

											<?php else : ?>
												<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
											<?php endif; ?>   

									    </div>
																		
									</div>
								</div>
								<div class="col-md-1">

								</div>
							</div>
							<!-- <div class="row">
						        <div class="col-sm-12">
							        <a href="" class="btn btn-primary more-video-custom-btn">
					                    Load More
					                </a> 
							    </div>
						    </div> -->
						</div>

					</div>
				</div>
				
			</main><!-- #main -->
		</div><!-- #primary -->
		
<?php
//get_sidebar();
get_footer();
