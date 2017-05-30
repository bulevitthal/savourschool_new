<?php
/*
 Template Name: Online Class Video Template
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="custom-loader" class="custon-loader"></div>
		<main id="main" class="site-main" role="main">
			<div class="taxonomy-video-category-wrapper all-video">

				<div class="container">
					<div class="row">
						<div class="col-md-2">

						</div>
						<div class="col-md-8">
							<div class="taxonomy-video-text-section text-center all-video">
								<div class="page-header">
									<p class="taxonomy-para-text">learn to create beautiful chocolate flower</p>
									<h1>Available now</h1>
									<div class="online-class-filter all-video">
										<div class="row">
											<div class="col-md-4 col-sm-4">
												<div class="filter-first text-center all-video">
													<p><a href="<?php echo get_permalink( ); ?>"><img class="header-img" src="<?php echo get_template_directory_uri(); ?>/images/video.png" /><span class="online-text all-video">Latest Videos</span></a></p>
												</div>
											</div>
											<div class="col-md-5 col-sm-5">
												<div class="filter-second text-center all-video">
													<div class="category-filter-wrapper all-video text-right">
												    	<?php 
															$terms = get_terms( array(
															    'taxonomy' => 'video_category',
															    'hide_empty' => false,
															) );

															if ($terms) {									      
													    ?>
													    
														<div class="taxonomy-video-category_listing all-video">
														    <div class="dropdown all-video">
														    	<button class="btn btn-default dropdown-toggle taxonomy-video all-video" type="button" data-toggle="dropdown"><img class="header-img all-video" src="<?php echo get_template_directory_uri(); ?>/images/category.png" /><span class="online-text">Search By Category</span><span class="caret"></span></button>
														    	<ul class="dropdown-menu all-video">
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
											<div class="col-md-3 col-sm-3">
												<div class="filter-third all-video text-center">
													<p><img class="header-img all-video" src="<?php echo get_template_directory_uri(); ?>/images/forum.png" /><span class="online-text">forum</span></p>
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
					
				<div class="all-video-section-wrapper all-video text-center">
					<div class="container">
						<div class="row">
							<div class="col-md-1">

							</div>
							<div class="col-md-10">
								<div class="row">
									<div class="taxonomy-video-section all-video text-center">
										<p class="taxonomy-para-text all-video">Latest videos</p>
									</div>
								    <?php $category = get_queried_object(); ?>

									<div id="ajax-all-video-post-list" class="">
								        <?php
								            $countargs = array(
							                    'post_type' => 'online_classes',
							                    'posts_per_page' => -1,							                    
								            );
								            $countloop = new WP_Query($countargs);

								            $postsPerPage = 3;
								            $args = array(
							                    'post_type' => 'online_classes',
							                    'posts_per_page' => $postsPerPage,
							                    
								            );
								            $loop = new WP_Query($args);
								          ?>
										<?php if ( $loop->have_posts() ) : ?>

											<!-- pagination here -->

											<!-- the loop -->
											<?php while ($loop->have_posts()) : $loop->the_post(); ?>

								        	<?php get_template_part( 'template-parts/content', 'online_class_video' ); ?>
								        
								        	<?php endwhile; ?>
								         <?php wp_reset_postdata(); ?>

										<?php else : ?>
											<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
										<?php endif; ?>   

										<?php if ($countloop->post_count > 3) { ?>
											<div class="more-article clearfix">
										        <div class="col-sm-12">
											        <a id="load_more_online_posts" class="btn btn-primary more-video-custom-btn all-video" >More Videos</a>
											    </div>
											</div>
										<?php }	?>
								    </div>
																	
								</div>
							</div>
							<div class="col-md-1">

							</div>
						</div>
					</div>

				</div>
				<div class="taxonomy-video-last-section-wrapper all-video">
					<div class="container">
						<div class="row">
							<div class="col-md-1">

							</div>
							<div class="col-md-10">
								<div class="page-header all-video">
									<h1>Latest Comments</h1>
								</div>
								<div class="online-class-video-iframe">
									<iframe id="id_description_iframe" src="http://www.savourschool.com.au/forum/recent_que_json.php">
						            </iframe>
					            </div>
					            <div class="online-class-video forum-data">
					            	<a id="more_posts_list" class="btn btn-primary more-video-custom-btn online-class-video-forum" data-category="<?php  ?>">Enter Forum</a>
					            </div>
					        </div>
					        <div class="col-md-1">

							</div>
					    </div>
					</div>
				</div>
			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->
		
<?php
//get_sidebar();
get_footer();
