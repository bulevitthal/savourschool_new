<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package savourschool
 */

get_header(); ?>
	<div class="front-page-wrapper">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="feature-section">
					<div class="container">
						<div class="row">
							<div class="col-sm-4 no-padding-right">
								<a href="<?php echo of_get_option('classes_url'); ?>">
									<div class="classes-section">
										<div class="row">
											<div class="col-sm-8 no-padding-right">
												<div class="feature_title"><h5><?php echo of_get_option('classes_title'); ?></h5></div>
												<div class="feature_name"><h1><?php echo of_get_option('classes_text_name'); ?></h1></div>
											</div>
											<div class="col-sm-4">
												<img src="<?php echo of_get_option('classes_image'); ?>" class="img-responsive feature_img">
												<img src="<?php echo of_get_option('classes_image_hover'); ?>" class="img-responsive feature_img_hover">
											</div>
										</div>
									</div>
								</a>
							</div>
							<div class="col-sm-4 no-padding-right">
								<a href="<?php echo of_get_option('online_classes_url'); ?>">
									<div class="classes-section">
										<div class="row">
											<div class="col-sm-8 no-padding-right">
												<div class="feature_title"><h5><?php echo of_get_option('online_classes_title'); ?></h5></div>
												<div class="feature_name"><h1><?php echo of_get_option('online_classes_text_name'); ?></h1></div>
											</div>
											<div class="col-sm-4">
												<img src="<?php echo of_get_option('online_classes_image'); ?>" class="img-responsive feature_img">
												<img src="<?php echo of_get_option('online_classes_image_hover'); ?>" class="img-responsive feature_img_hover">
											</div>
										</div>
									</div>
								</a>
							</div>
							<div class="col-sm-4">
								<a href="<?php echo of_get_option('online_store_url'); ?>">
									<div class="classes-section">
										<div class="row">
											<div class="col-sm-8 no-padding-right">
												<div class="feature_title"><h5><?php echo of_get_option('online_store_title'); ?></h5></div>
												<div class="feature_name"><h1><?php echo of_get_option('online_store_text_name'); ?></h1></div>
											</div>
											<div class="col-sm-4">
												<img src="<?php echo of_get_option('online_store_image'); ?>" class="img-responsive feature_img">
												<img src="<?php echo of_get_option('online_store_image_hover'); ?>" class="img-responsive feature_img_hover">
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
				<div class="newsletter-section" name="email_signup" id="email_signup">
					<div class="container">
						<div class="newsletter-wrapper">
							<div class="row">
								<div class="col-sm-12">
									<h6 class="newsletter-heading">NEWSLETTER</h6>
									<h1 class="title">Get a $20 class voucher</h1>
									<p class="newsletter-subtext">Sign up to our newsletter for class updates, <br />discounts and the latest Savour School news</p>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-2"></div>
								<div class="col-sm-8">
									<?php echo do_shortcode('[gravityform id="2" title="false" description="false" ajax="true"]'); ?>
								</div>
								<div class="col-sm-2"></div>
							</div>
						</div>
					</div>				
				</div>
				<div class="upcoming-hand-on-classes-section">
					<div class="container">
						<?php dynamic_sidebar( 'sidebar-upcoming_class' ); ?>
						
						<?php			
						$atts = array(
							'title' => NULL,
							'limit' => 3,
							'css_class' => NULL,
							'show_expired' => FALSE,
							'month' => NULL,
							'category_slug' => NULL,
							'order_by' => 'start_date',
							'sort' => 'ASC'
						);
						// run the query
						global $wp_query; ?>
						<div class="upcomming-wrapper row">
							<?php 
								$wp_query = new EE_Event_List_Query( $atts );
								if (have_posts()) : while (have_posts()) : the_post();
							        ?>
							        <div class="col-sm-4 no-padding">
						        		<div class="upcomming-inner">
									        <a href="<?php echo get_permalink(); ?>">
									        	<img src="<?php echo the_post_thumbnail_url( 'full' ); ?>" class="img-responsive upcomming-img">
										        <div class="upcomming-inner-text">
											        <div class="upcomming-meta-date">
											        	<?php $x = $post->EE_Event->first_datetime();  ?>
												        <div class="meta-month"><?php echo date("M", strtotime($x->start_date())); ?></div>
												        <div class="meta-day"><?php echo date("d", strtotime($x->start_date())); ?></div>
											        </div>
											        <div class="upcomming-meta-title">
											        	<div class="upcomming-title"><?php the_title(); ?></div>
											        </div>
										        </div>
									        </a>
						        		</div>
							        </div>   	
							<?php endwhile;  ?>
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
						<div class="row">
							<div class="col-sm-12">
								<div class="all-calender-links">
									<a href="<?php echo home_url().'/class-calendar/'; ?>" class="upcoming-all-calender-links">View Calendar</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="home-product-section">
					<div class="container">
						<?php dynamic_sidebar( 'sidebar-product_category' ); ?>					
					</div>
					<div class="container">
						<?php 

					    $product_args = array(
					        'post_type' => 'product',
					        'posts_per_page'=> 8,
					        'tax_query' => array(
					        		array(
										'taxonomy' => 'product_cat',
										'field' => 'slug',
										'terms' => 'popular'
									)
					        	)
					    );

					    // the query
					    $product_query = new WP_Query( $product_args ); ?>

					    <?php if ( $product_query->have_posts() ) : ?>

					        <!-- pagination here -->

						<div class="row">
							<div class="col-sm-12">
								<div class="grid">
							        <!-- the loop -->
							        <?php while ( $product_query->have_posts() ) : $product_query->the_post(); ?>
							            <div class="grid-item">
							            	<div class="grid-inner">
							            		<img src="<?php echo the_post_thumbnail_url( 'isotope-thumb' ); ?>" class="img-responsive">
							            		<div class="hover-wrapper">
							            			<h3 class="hover-title"><?php echo get_the_title(); ?></h3>
							            			<div class="hover-link">
							            				<a href="<?php echo get_permalink(); ?>" class="">Show Details</a>
							            			</div>
							            			<div class="product-price">
							            				<?php
															global $woocommerce;
															$currency = get_woocommerce_currency_symbol();
															$price = get_post_meta( get_the_ID(), '_regular_price', true);
															$sale = get_post_meta( get_the_ID(), '_sale_price', true);
															?>
															 
															<?php if($sale) : ?>
															<p class="product-price-tickr"><del><?php echo $currency; echo round($price, 2); ?></del> <?php echo $currency; echo round($sale, 2); ?></p>    
															<?php elseif($price) : ?>
															<p class="product-price-tickr"><?php echo $currency; echo round($price, 2); ?></p>    
															<?php endif; ?>
							            			</div>
							            		</div>
							            	</div>
							            </div>
							        <?php endwhile; ?>
							        <!-- end of the loop -->
								</div>
							</div>
						</div>

					        <!-- pagination here -->

					        <?php wp_reset_postdata(); ?>

					    <?php else : ?>
					        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
					    <?php endif; ?>
					</div>					
				</div>
				<div class="home-online-class-section">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div id="online-class-title-wrapper">
									<?php dynamic_sidebar( 'sidebar-online_class' ); ?>
								</div>
							</div>
						</div>
						<div class="row">
							<?php 
							$count_posts = wp_count_posts('online_classes');
							$published_posts = $count_posts->publish;

						    $online_classes_args = array(
						        'post_type' => 'online_classes',
						        'posts_per_page'=> 1,
						    );

						    // the query
						    $online_classes_query = new WP_Query( $online_classes_args ); 
						    $count = $online_classes_query->post_count; ?>

						    <?php if ( $online_classes_query->have_posts() ) : ?>

						        <!-- pagination here -->

						        <!-- the loop -->
						        <?php while ( $online_classes_query->have_posts() ) : $online_classes_query->the_post(); ?>
						            <div class="col-sm-8">
						            	<img src="<?php echo the_post_thumbnail_url( 'full' ); ?>" class="online-class-img img-responsive">
						            </div>
						            <div class="col-sm-4">
							            <div class="online-class-meta">
							            	<div class="online-class-duration">
								            	<div class="row">
								            		<div class="col-sm-3">
									            		<div class="online-class-icon">
									            			<img src="<?php echo get_template_directory_uri().'/images/clock.png'; ?>" class="img-responsive">
									            		</div>								            			
								            		</div>
								            		<div class="col-sm-9">
									            		<div class="online-classes-text">
										            		<div class="online-classes-title">Cooking time</div>
											            	<div class="online-classes-desc"><h2><?php echo get_post_meta( get_the_ID(), 'duration', true); ?></h2></div>
									            		</div>								            			
								            		</div>
								            	</div>
							            	</div>
							            	<div class="online-class-difficulty">
							            		<div class="row">
													<div class="col-sm-3">
									            		<div class="online-class-icon">
									            			<img src="<?php echo get_template_directory_uri().'/images/speedometer.png'; ?>" class="img-responsive">
									            		</div>
													</div>
													<div class="col-sm-9">
									            		<div class="online-classes-text">
										            		<div class="online-classes-title">Difficulty</div>
												            <div class="online-classes-desc"><h2><?php $difficulty = get_post_meta( get_the_ID(), 'difficulty', true); 
													            if($difficulty){
													            	foreach ($difficulty as $value) {
													            	 	echo $value;
													            	 } 

													            }	 ?></h2></div>
												            
												        </div>
													</div>
												</div>
							            	</div>
							            	<div class="online-class-people">
							            		<div class="row">
													<div class="col-sm-3">
									            		<div class="online-class-icon">
									            			<img src="<?php echo get_template_directory_uri().'/images/dishes.png'; ?>" class="img-responsive">
									            		</div>														
													</div>
													<div class="col-sm-9">
									            		<div class="online-classes-text">
										            		<div class="online-classes-title">Recommended for</div>
											            	<div class="online-classes-desc"><h2><?php $people = get_post_meta( get_the_ID(), 'people', true);
											            		echo $people.' People' ?></h2></div>
											           	</div>														
													</div>
												</div>
							            	</div>
							            </div>
							            <div class="total-video-section">
							            	<div class="row">
							            		<!--<div class="col-sm-4"></div>-->
							            		<div class="col-sm-12">
							            			<div class="online-post-count"><?php echo $published_posts; ?></div>
							            			<div><h5>VIDEO RECIPES</h5><p>…and growing!</p></div>
							            		</div>
							            	</div>
							            	<div class="row">
							            		<div class="col-sm-12 text-center">
							            			<a href="<?php echo get_permalink( get_page_by_path( 'online-classes' ) ); ?>" class="custom-black-btn">Learn more</a>
							            		</div>
							            	</div>
							            </div>							            
						            </div>
						        <?php endwhile; ?>
						        <!-- end of the loop -->

						        <!-- pagination here -->

						        <?php wp_reset_postdata(); ?>

						    <?php else : ?>
						        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						    <?php endif; ?>
						</div>
					</div>
				</div>
				<div class="blog-section">
					<div class="container">
						<?php dynamic_sidebar( 'sidebar-popular_products' ); ?>	
						<?php 
						    $post_args = array(
						        'post_type' => 'post',
						        'posts_per_page'=> 3
						    );

						    // the query
						    $post_query = new WP_Query( $post_args ); ?>

						    <?php if ( $post_query->have_posts() ) : ?>

						        <!-- pagination here -->
						        <div class="row">
							        <div class="blog-head">
							        	<h1 class="blog-heading">Blog</h1>
							        </div>
							        <!-- the loop -->
							        <div class="blog-post">
								        <?php while ( $post_query->have_posts() ) : $post_query->the_post(); ?>
								        	<div class="col-sm-4 no-padding">
								        		<div class="blog-div">
								        			<a href="<?php echo get_permalink(); ?>">
											        	<img src="<?php echo the_post_thumbnail_url( 'full' ); ?>"/>
												        <div class="recent-post">
													        <div class="recent-post-date">
													        	<div class="post-month">
														        	<span><?php echo date("M", strtotime(get_the_date())); ?></span>
														        </div>
														        <div class="post-date">
														        	<span><?php echo date("d", strtotime(get_the_date())); ?></span>
														        </div>
													        </div>
													        <div class="recent-post-title">
													        	<span class="post-title"><?php the_title(); ?></span>
													        </div>
												        </div>
											        </a>
								        		</div>
								        	</div>
								        <?php endwhile; ?>
							        </div>
							        <div class="more-article">
									    <div class="col-sm-12">
									        
									        <div class="more">
										        <a href="<?php echo home_url('blog'); ?>">
										        	<button class="button-more-article">MORE ARTICLES</button>
										    	</a>
									        </div>
										    
									    </div>
									</div>
							        <!-- end of the loop -->
						        </div>

						        <!-- pagination here -->

						        <?php wp_reset_postdata(); ?>

						    <?php else : ?>
						        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						    <?php endif; ?>
					</div>
				</div>
				<div class="instagram-block">
					<div class="container">
						<div class="row">
							<?php dynamic_sidebar( 'sidebar-home_featured' ); ?>					
						</div>
					</div>
				</div>
			</main><!-- #main -->
		</div><!-- #primary -->
		
<?php get_footer(); ?>