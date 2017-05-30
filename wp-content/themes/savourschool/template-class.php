<?php
/*
 Template Name: Class Page Template
 */

get_header(); ?>

		<div class="upcomming-class-wrapper">
			<div id="custom-loader" class="custon-loader"></div>
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<?php
					$count_class_atts = array(
						'title' => NULL,
						'limit' => $postsPerPage,
						'css_class' => NULL,
						'show_expired' => FALSE,
						'month' => NULL,
						'category_slug' => NULL,
						'order_by' => 'start_date',
						'sort' => 'DSC',
					);

					$postsPerPage = 10;			
					$atts = array(
						'title' => NULL,
						'limit' => $postsPerPage,
						'css_class' => NULL,
						'show_expired' => FALSE,
						'month' => NULL,
						'category_slug' => NULL,
						'order_by' => 'start_date',
						'sort' => 'DSC',
					);
					// run the query
					global $wp_query; ?>


					<div class="class-category">
						<div class="container">
							<div class="row">
							    <div class="col-md-4">
							    	<div class="category-filter-wrapper text-right">
								    	<?php 
											$terms = get_terms( array(
											    'taxonomy' => 'espresso_event_categories',
											    'hide_empty' => false,
											) );

											if ($terms) {									      
									    ?>
								    	<div class="classes-dropdown">
								    		<select id="category_list" name="category_list" multiple="multiple">
												<?php foreach ($terms as $key => $value) { ?>
													<option value="<?php echo $value->slug; ?>"><?php echo $value->name; ?></option>
												<?php  } ?>
											</select>
										</div>
										<?php } ?>
							    	</div>
							    </div>
							    <div class="col-md-4">
							    	<div class="classes-level-dropdown text-center">
									    <?php $difficulty = get_field_object('field_58e479f52b740');
									       if( $difficulty )
										        {
										            echo '<select class="difficulty-values" name="difficulty_values">';
										                echo '<option value="">All</option>';
										                foreach( $difficulty['choices'] as $k => $v ) {
										                    echo '<option value="'.$k.'">' . $v . '</option>';
										                }
										            echo '</select>';
										        }
									      	?>
									</div>
							    </div>
							    <div class="col-md-4">
							    	<div class="classes-sort-by-dropdown text-left">
									    <select class="sort-by" name="sort_by">
									    	<option value="">All</option>
									    	<option value="ASC">Date Ascending (A-Z)</option>
									    	<option value="DESC">Date Descending (Z-A)</option>
									    </select>
									</div>
							    </div>
							</div>
						</div>
					</div>
					<div class="custom-details-wrapper">
						<div id="ajax" class="upcomming-wrapper-inner">
							<?php 
								$count_class_query = new EE_Event_List_Query( $count_class_atts );
								$wp_query = new EE_Event_List_Query( $atts );
								if (have_posts()) : while (have_posts()) : the_post();
							        ?>
					        <div class="row">
					        	<div class="col-sm-10 col-sm-offset-1">
							        <div class="event-details">
							        	<div class="row">
							        		<div class="col-sm-4">
								        		<div class="upcomming-class-inner">
											        <a href="<?php echo get_permalink(); ?>">
											        	<img src="<?php echo the_post_thumbnail_url( 'full' ); ?>" class="img-responsive upcomming-img">
												    </a>
								        		</div>
									        </div> 
									        <div class="col-sm-8">
												<div class="upcomming-inner-class">
											        <div class="upcomming-class-inner-text">
												        <div class="upcomming-class-meta-title">
												        	<div class="event-class-title">
												        		<h3>
												        			<?php the_title(); ?>
												        		</h3>
												        		<?php
												        		if (get_field('short_description', get_the_ID())) {
												        			echo get_field('short_description', get_the_ID());	
												        		} else {
												        			echo the_excerpt();
												        		}
												        		?>
											        			<?php // echo get_field('short_description', get_the_ID()); ?>
											    				<?php // echo the_excerpt(); ?>
											        				
												        	</div>
												        </div>
												        <div class="upcomming-class-meta-date">
												        	<div class="more-about-event">
														        <a href="<?php echo get_permalink(); ?>" class="btn btn-primary custom-btn">
														        	Learn More
																</a>										        
															</div>
														</div>
												    </div>
											    </div>
											</div>
									    </div>
							        </div>
							    </div>
							</div>
							<?php endwhile;  ?>
							<?php if ($count_class_query->post_count > 3) { ?>
								<div class="more-article clearfix">
							        <div class="col-sm-12">
								        <div id="more_classes">Load More</div>
								    </div>
								</div>								
							<?php }	?>
						</div>
						<?php else:
						?>
							<div>No Upcoming Events</div>
						<?php 
						    endif;
							// now reset the query and postdata
							wp_reset_query();
							wp_reset_postdata();
						?>
					</div>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
<?php
get_footer();