<?php
/**
 * savourschool Theme Customizer.
 *
 * @package savourschool
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function savourschool_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'savourschool_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function savourschool_customize_preview_js() {
	wp_enqueue_script( 'savourschool_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'savourschool_customize_preview_js' );



/* Create shortcode for upcoming event for home page */
function custom_widget_featured_image() {
	global $post;

	echo tribe_event_featured_image( $post->ID, 'full' );
}
add_action( 'tribe_events_list_widget_before_the_event_title', 'custom_widget_featured_image' );


/* ===========================================================================================================================================================
																Ajax for class page filteration
 =============================================================================================================================================================  */

// Sort by date
add_action( 'wp_ajax_nopriv_filter_sort_by', 'filter_sort_by_function' );
add_action( 'wp_ajax_filter_sort_by', 'filter_sort_by_function' );

function filter_sort_by_function() {
	$sort_by_val = $_POST['sort_val'];
	$category_val = $_POST['category_val'];
	$difficulty_val = $_POST['difficulty_val'];

	if ($sort_by_val != '' && $category_val != '' && $difficulty_val != '') {
			if ($sort_by_val == "ASC") {
				$atts = array(
					'title' => NULL,
					'limit' => 10,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'espresso_event_categories',
							'field' => 'slug',
							'terms' => $category_val,
						)
					),
					'meta_query' => array(
						array(
							'key'     => 'class_difficulty_level',
							'value'   => $difficulty_val,
						),
					),
				);

			} else {

				$atts = array(
					'title' => NULL,
					'limit' => 10,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'DESC',
					'tax_query' => array(
						array(
							'taxonomy' => 'espresso_event_categories',
							'field' => 'slug',
							'terms' => $category_val,
						)
					),
					'meta_query' => array(
						array(
							'key'     => 'class_difficulty_level',
							'value'   => $difficulty_val,
						),
					),
				);
				
			}


	} elseif ($sort_by_val != '' && $category_val == '' && $difficulty_val == '' ) {
			if ($sort_by_val == "ASC") {
				$atts = array(
					'title' => NULL,
					'limit' => 10,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'ASC',			
				);
			} else {
				$atts = array(
					'title' => NULL,
					'limit' => 10,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'DESC',			
				);
				
			}
	
	} elseif ($sort_by_val == '' && $category_val != '' && $difficulty_val == '' ) {
			
			$atts = array(
				'title' => NULL,
				'limit' => 10,
				'css_class' => NULL,
				'show_expired' => FALSE,
				'month' => NULL,
				'category_slug' => NULL,
				'order_by' => 'start_date',
				'sort' => 'DESC',
				'tax_query' => array(
					array(
						'taxonomy' => 'espresso_event_categories',
						'field' => 'slug',
						'terms' => $category_val,
					)
				),
			);

	} elseif ($sort_by_val == '' && $category_val == '' && $difficulty_val != '' ) {
		
		// echo "only difficulty_val";
		// echo 'difficulty_val'.$difficulty_val;

		$atts = array(
			'title' => NULL,
			'limit' => 10,
			'css_class' => NULL,
			'show_expired' => FALSE,
			'month' => NULL,
			'category_slug' => NULL,
			'order_by' => 'start_date',
			'sort' => 'DESC',
			'meta_query' => array(
				array(
					'key'     => 'class_difficulty_level',
					'value'   => $difficulty_val,
				),
			),
		);
	
	} elseif ($sort_by_val != '' && $category_val != ''  && $difficulty_val == '' ) {
			// echo " only in Sort by val and category_val ";
			// echo 'sort_by_val'.$sort_by_val;
			// echo '$category_val';
			// print_r($category_val);

			if ($sort_by_val == 'ASC') {
				$atts = array(
					'title' => NULL,
					'limit' => 10,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'espresso_event_categories',
							'field' => 'slug',
							'terms' => $category_val,
						)
					),
				);				
			} else {
				$atts = array(
					'title' => NULL,
					'limit' => 10,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'DESC',
					'tax_query' => array(
						array(
							'taxonomy' => 'espresso_event_categories',
							'field' => 'slug',
							'terms' => $category_val,
						)
					),
				);
			}

	
	} elseif ($sort_by_val != '' && $category_val == '' && $difficulty_val != '' ) {
	
		// echo " only in difficulty_val and sort ";
		// echo 'difficulty_val'.$difficulty_val;
		// echo "<br/>";
		// 		echo '$sort_by_val';
		// 	print_r($sort_by_val);

		if ($sort_by_val == 'ASC' ) {
			$atts = array(
				'title' => NULL,
				'limit' => 10,
				'css_class' => NULL,
				'show_expired' => FALSE,
				'month' => NULL,
				'category_slug' => NULL,
				'order_by' => 'start_date',
				'sort' => 'ASC',
				'meta_query' => array(
					array(
						'key'     => 'class_difficulty_level',
						'value'   => $difficulty_val,
					),
				),
			);

		} else {
			$atts = array(
				'title' => NULL,
				'limit' => 10,
				'css_class' => NULL,
				'show_expired' => FALSE,
				'month' => NULL,
				'category_slug' => NULL,
				'order_by' => 'start_date',
				'sort' => 'DESC',
				'meta_query' => array(
					array(
						'key'     => 'class_difficulty_level',
						'value'   => $difficulty_val,
					),
				),
			);
		}

	
	} elseif ($sort_by_val == '' && $category_val != '' && $difficulty_val != '' ) {
		
		// echo "in category_val and difficulty_val";
		// echo 'difficulty_val'.$difficulty_val;
		// echo "<br/>";
		// echo 'difficulty_val '.$difficulty_val;

		$atts = array(
			'title' => NULL,
			'limit' => 10,
			'css_class' => NULL,
			'show_expired' => FALSE,
			'month' => NULL,
			'category_slug' => NULL,
			'order_by' => 'start_date',
			'sort' => 'DESC',
			'tax_query' => array(
				array(
					'taxonomy' => 'espresso_event_categories',
					'field' => 'slug',
					'terms' => $category_val,
				)
			),
			'meta_query' => array(
				array(
					'key'     => 'class_difficulty_level',
					'value'   => $difficulty_val,
				),
			),
		);
	
	} else {
		$atts = array(
			'title' => NULL,
			'limit' => 10,
			'css_class' => NULL,
			'show_expired' => FALSE,
			'month' => NULL,
			'category_slug' => NULL,
			'order_by' => 'start_date',
			'sort' => 'ASC',
		);
	}
	
	// run the query
	global $wp_query; 
	$wp_query = new EE_Event_List_Query( $atts );
	?>

	<?php if ( $wp_query->have_posts() ) : ?>

		<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
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
		<?php endwhile; ?>

			<?php 
			 if ($wp_query->post_count >= 3) { ?>
				<div class="more-article clearfix">
			        <div class="col-sm-12">
				        <div id="loadmore_classes">Load More</div>
				    </div>
				</div>
			<?php }	?>

		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<p style="margin-top:20px;"><center><?php _e( 'Sorry, no class matched your criteria.' ); ?></center></p>
	<?php endif; ?>
	
	<?php	


	echo '';
	die();
}

/* ========================== Classes page Load more function  ========================== */
function more_classes_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 10;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    $sort_by_val = (isset($_POST['sort_val'])) ? $_POST['sort_val'] : '';
    $category_val = (isset($_POST['category_val'])) ? $_POST['category_val'] : '';
    $difficulty_val = (isset($_POST['difficulty'])) ? $_POST['difficulty'] : '';
    $classcount_val = $page * 10;
    set_query_var( 'paged', $page );
    header("Content-Type: text/html");


    if ($sort_by_val != '' && $category_val != 'null' && $difficulty_val != '') {
			if ($sort_by_val == "ASC") {
				$coountatts = array(
					'title' => NULL,
					'limit' => -1,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'espresso_event_categories',
							'field' => 'slug',
							'terms' => $category_val,
						)
					),
					'meta_query' => array(
						array(
							'key'     => 'class_difficulty_level',
							'value'   => $difficulty_val,
						),
					),
				);

				$atts = array(
					'title' => NULL,
					'limit' => 10,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'espresso_event_categories',
							'field' => 'slug',
							'terms' => $category_val,
						)
					),
					'meta_query' => array(
						array(
							'key'     => 'class_difficulty_level',
							'value'   => $difficulty_val,
						),
					),
				);

			} else {

				$coountatts = array(
					'title' => NULL,
					'limit' => -1,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'DESC',
					'tax_query' => array(
						array(
							'taxonomy' => 'espresso_event_categories',
							'field' => 'slug',
							'terms' => $category_val,
						)
					),
					'meta_query' => array(
						array(
							'key'     => 'class_difficulty_level',
							'value'   => $difficulty_val,
						),
					),
				);

				$atts = array(
					'title' => NULL,
					'limit' => 10,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'DESC',
					'tax_query' => array(
						array(
							'taxonomy' => 'espresso_event_categories',
							'field' => 'slug',
							'terms' => $category_val,
						)
					),
					'meta_query' => array(
						array(
							'key'     => 'class_difficulty_level',
							'value'   => $difficulty_val,
						),
					),
				);
				
			}


	} elseif ($sort_by_val != '' && $category_val == 'null' && $difficulty_val == '' ) {
			if ($sort_by_val == "ASC") {
				$coountatts = array(
					'title' => NULL,
					'limit' => -1,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'ASC',			
				);

				$atts = array(
					'title' => NULL,
					'limit' => 10,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'ASC',			
				);
			} else {

				$coountatts = array(
					'title' => NULL,
					'limit' => -1,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'DESC',			
				);

				$atts = array(
					'title' => NULL,
					'limit' => 10,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'DESC',			
				);
				
			}
	
	} elseif ($sort_by_val == '' && $category_val != 'null' && $difficulty_val == '' ) {
			
			$coountatts = array(
				'title' => NULL,
				'limit' => -1,
				'css_class' => NULL,
				'show_expired' => FALSE,
				'month' => NULL,
				'category_slug' => NULL,
				'order_by' => 'start_date',
				'sort' => 'DESC',
				'tax_query' => array(
					array(
						'taxonomy' => 'espresso_event_categories',
						'field' => 'slug',
						'terms' => $category_val,
					)
				),
			);

			$atts = array(
				'title' => NULL,
				'limit' => 10,
				'css_class' => NULL,
				'show_expired' => FALSE,
				'month' => NULL,
				'category_slug' => NULL,
				'order_by' => 'start_date',
				'sort' => 'DESC',
				'tax_query' => array(
					array(
						'taxonomy' => 'espresso_event_categories',
						'field' => 'slug',
						'terms' => $category_val,
					)
				),
			);

	} elseif ($sort_by_val == '' && $category_val == 'null' && $difficulty_val != '' ) {
		
		// echo "only difficulty_val";
		// echo 'difficulty_val'.$difficulty_val;

		$coountatts = array(
			'title' => NULL,
			'limit' => -1,
			'css_class' => NULL,
			'show_expired' => FALSE,
			'month' => NULL,
			'category_slug' => NULL,
			'order_by' => 'start_date',
			'sort' => 'DESC',
			'meta_query' => array(
				array(
					'key'     => 'class_difficulty_level',
					'value'   => $difficulty_val,
				),
			),
		);

		$atts = array(
			'title' => NULL,
			'limit' => 10,
			'css_class' => NULL,
			'show_expired' => FALSE,
			'month' => NULL,
			'category_slug' => NULL,
			'order_by' => 'start_date',
			'sort' => 'DESC',
			'meta_query' => array(
				array(
					'key'     => 'class_difficulty_level',
					'value'   => $difficulty_val,
				),
			),
		);
	
	} elseif ($sort_by_val != '' && $category_val != 'null'  && $difficulty_val == '' ) {
			// echo " only in Sort by val and category_val ";
			// echo 'sort_by_val'.$sort_by_val;
			// echo '$category_val';
			// print_r($category_val);

			if ($sort_by_val == 'ASC') {
				$coountatts = array(
					'title' => NULL,
					'limit' => -1,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'espresso_event_categories',
							'field' => 'slug',
							'terms' => $category_val,
						)
					),
				);

				$atts = array(
					'title' => NULL,
					'limit' => 10,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'ASC',
					'tax_query' => array(
						array(
							'taxonomy' => 'espresso_event_categories',
							'field' => 'slug',
							'terms' => $category_val,
						)
					),
				);				
			} else {
				$coountatts = array(
					'title' => NULL,
					'limit' => 10,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'DESC',
					'tax_query' => array(
						array(
							'taxonomy' => 'espresso_event_categories',
							'field' => 'slug',
							'terms' => $category_val,
						)
					),
				);

				$atts = array(
					'title' => NULL,
					'limit' => 10,
					'css_class' => NULL,
					'show_expired' => FALSE,
					'month' => NULL,
					'category_slug' => NULL,
					'order_by' => 'start_date',
					'sort' => 'DESC',
					'tax_query' => array(
						array(
							'taxonomy' => 'espresso_event_categories',
							'field' => 'slug',
							'terms' => $category_val,
						)
					),
				);
			}

	
	} elseif ($sort_by_val != '' && $category_val == 'null' && $difficulty_val != '' ) {
	
		// echo " only in difficulty_val and sort ";
		// echo 'difficulty_val'.$difficulty_val;
		// echo "<br/>";
		// 		echo '$sort_by_val';
		// 	print_r($sort_by_val);

		if ($sort_by_val == 'ASC' ) {
			$coountatts = array(
				'title' => NULL,
				'limit' => -1,
				'css_class' => NULL,
				'show_expired' => FALSE,
				'month' => NULL,
				'category_slug' => NULL,
				'order_by' => 'start_date',
				'sort' => 'ASC',
				'meta_query' => array(
					array(
						'key'     => 'class_difficulty_level',
						'value'   => $difficulty_val,
					),
				),
			);

			$atts = array(
				'title' => NULL,
				'limit' => 10,
				'css_class' => NULL,
				'show_expired' => FALSE,
				'month' => NULL,
				'category_slug' => NULL,
				'order_by' => 'start_date',
				'sort' => 'ASC',
				'meta_query' => array(
					array(
						'key'     => 'class_difficulty_level',
						'value'   => $difficulty_val,
					),
				),
			);

		} else {
			$coountatts = array(
				'title' => NULL,
				'limit' => -1,
				'css_class' => NULL,
				'show_expired' => FALSE,
				'month' => NULL,
				'category_slug' => NULL,
				'order_by' => 'start_date',
				'sort' => 'DESC',
				'meta_query' => array(
					array(
						'key'     => 'class_difficulty_level',
						'value'   => $difficulty_val,
					),
				),
			);

			$atts = array(
				'title' => NULL,
				'limit' => 10,
				'css_class' => NULL,
				'show_expired' => FALSE,
				'month' => NULL,
				'category_slug' => NULL,
				'order_by' => 'start_date',
				'sort' => 'DESC',
				'meta_query' => array(
					array(
						'key'     => 'class_difficulty_level',
						'value'   => $difficulty_val,
					),
				),
			);
		}

	
	} elseif ($sort_by_val == '' && $category_val != 'null' && $difficulty_val != '' ) {
		
		// echo "in category_val and difficulty_val";
		// echo 'difficulty_val'.$difficulty_val;
		// echo "<br/>";
		// echo 'difficulty_val '.$difficulty_val;

		$coountatts = array(
			'title' => NULL,
			'limit' => -1,
			'css_class' => NULL,
			'show_expired' => FALSE,
			'month' => NULL,
			'category_slug' => NULL,
			'order_by' => 'start_date',
			'sort' => 'DESC',
			'tax_query' => array(
				array(
					'taxonomy' => 'espresso_event_categories',
					'field' => 'slug',
					'terms' => $category_val,
				)
			),
			'meta_query' => array(
				array(
					'key'     => 'class_difficulty_level',
					'value'   => $difficulty_val,
				),
			),
		);

		$atts = array(
			'title' => NULL,
			'limit' => 10,
			'css_class' => NULL,
			'show_expired' => FALSE,
			'month' => NULL,
			'category_slug' => NULL,
			'order_by' => 'start_date',
			'sort' => 'DESC',
			'tax_query' => array(
				array(
					'taxonomy' => 'espresso_event_categories',
					'field' => 'slug',
					'terms' => $category_val,
				)
			),
			'meta_query' => array(
				array(
					'key'     => 'class_difficulty_level',
					'value'   => $difficulty_val,
				),
			),
		);
	
	} else {
		$coountatts = array(
			'title' => NULL,
			'limit' => -1,
			'css_class' => NULL,
			'show_expired' => FALSE,
			'month' => NULL,
			'category_slug' => NULL,
			'order_by' => 'start_date',
			'sort' => 'ASC',
		);

		$atts = array(
			'title' => NULL,
			'limit' => 10,
			'css_class' => NULL,
			'show_expired' => FALSE,
			'month' => NULL,
			'category_slug' => NULL,
			'order_by' => 'start_date',
			'sort' => 'ASC',
		);
	}



 

    $countloop = new EE_Event_List_Query( $coountatts );
    $loop = new EE_Event_List_Query( $atts );

    $out = '';

    if ($loop -> have_posts()) :  while ($loop -> have_posts()) : $loop -> the_post(); ?>
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

	<?php 
	endwhile; ?>
		<?php if (($countloop->post_count - $classcount_val) > 0) { ?>
			<div class="more-article clearfix">
		        <div class="col-sm-12">
			        <div id="loadmore_classes">Load More</div>
			    </div>
			</div>
		<?php } ?>
	<?php else: ?>
		<div class="col-sm-10 col-sm-offset-1">
	        <div><h3>No more upcoming events</h3></div>
	    </div>
    <?php 
    endif;
    wp_reset_postdata();
    die();
}

add_action('wp_ajax_nopriv_more_classes_ajax', 'more_classes_ajax');
add_action('wp_ajax_more_classes_ajax', 'more_classes_ajax');



/* ===================================================================================================================================
													Video category post load more 
=================================================================================================================================== */
function more_category_post_ajax(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    $cat = (isset($_POST['cat'])) ? $_POST['cat'] : 0;
    $count_val = $page * 3;
    
    header("Content-Type: text/html");
    
    $count = array(
        'suppress_filters' => true,
        'post_type' => 'online_classes',
        'posts_per_page' => -1,
        'tax_query' => array(
			array(
				'taxonomy' => 'video_category',
				'field'    => 'term_id',
				'terms'    => $cat,
			),
		),
    );


    $args = array(
        'suppress_filters' => true,
        'post_type' => 'online_classes',
        'posts_per_page' => $ppp,
        'tax_query' => array(
			array(
				'taxonomy' => 'video_category',
				'field'    => 'term_id',
				'terms'    => $cat,
			),
		),
        'paged'    => $page,
    );


    $countloop = new WP_Query($count);

    $loop = new WP_Query($args); ?>
		<?php if ( $loop->have_posts() ) : ?>

			<!-- pagination here -->

			<!-- the loop -->
			<?php while ($loop->have_posts()) : $loop->the_post(); ?>

	    	<?php get_template_part( 'template-parts/content', 'online_class_video' ); ?>
	    
	    	<?php endwhile; ?>
	    	<?php if (($countloop->post_count - $count_val) > 0) { ?>
		    	<a id="more_category_postslist" class="btn btn-primary more-video-custom-btn" data-category="<?php echo $cat; ?>">Load More</a>
		    <?php }	?>
	     <?php wp_reset_postdata(); ?>

		<?php else : ?>

			<article class="col-sm-4">
				<!-- .entry-header -->
				<div class="entry-content">
					<div class="online-cls-video-section equalheight">
						<div class="video-cat-title-section">
						<h1 class="entry-title">
							<?php _e( 'Sorry, no more posts available in this category.' ); ?>
						</h1>
						</div>
					</div>
				</div><!-- .entry-content -->
			</article>

		<?php endif; ?>   
    <?php 
    die();
}

add_action('wp_ajax_nopriv_category_post_ajax', 'more_category_post_ajax');
add_action('wp_ajax_category_post_ajax', 'more_category_post_ajax');


/* ===================================================================================================================================
													All Video Post load more 
=================================================================================================================================== */
function online_classes_post_function(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 3;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    $all_videocount_val = $page * 3;
    
    header("Content-Type: text/html");
    $countargs = array(
        'suppress_filters' => true,
        'post_type' => 'online_classes',
        'posts_per_page' => -1,
    );
    $allcountloop = new WP_Query($countargs);

    $args = array(
        'suppress_filters' => true,
        'post_type' => 'online_classes',
        'posts_per_page' => $ppp,
        'paged'    => $page,
    );


    $loop = new WP_Query($args); ?>
		<?php if ( $loop->have_posts() ) : ?>

			<!-- pagination here -->

			<!-- the loop -->
			<?php while ($loop->have_posts()) : $loop->the_post(); ?>

	    	<?php get_template_part( 'template-parts/content', 'online_class_video' ); ?>
	    
	    	<?php endwhile; ?>
	     <?php wp_reset_postdata(); ?>
	    <?php if (($allcountloop->post_count - $all_videocount_val) > 0) { ?>
	     <div class="more-article clearfix">
	        <div class="col-sm-12">
		        <a id="load_more_all_online_posts" class="btn btn-primary more-video-custom-btn all-video" >More Videos</a>
		    </div>
		</div>
		<?php }	?>
		<?php else : ?>

			<article class="col-sm-4">
				<!-- .entry-header -->
				<div class="entry-content">
					<div class="online-cls-video-section equalheight">
						<div class="video-cat-title-section">
						<h1 class="entry-title">
							<?php _e( 'Sorry, no more posts available in this category.' ); ?>
						</h1>
						</div>
					</div>
				</div><!-- .entry-content -->
			</article>

		<?php endif; ?>   
    <?php 
    die();
}

add_action('wp_ajax_nopriv_online_classes_post_ajax', 'online_classes_post_function');
add_action('wp_ajax_online_classes_post_ajax', 'online_classes_post_function');


/* ===================================================================================================================================
													Event single Category Listing page 
=================================================================================================================================== */
function event_category_page_listing_function(){

    $ppp = (isset($_POST["ppp"])) ? $_POST["ppp"] : 10;
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 0;
    $term_slug = (isset($_POST['category_name'])) ? $_POST['category_name'] : '';
    $cat_videocount_val = $page * 10;

    set_query_var( 'paged', $page );
    
    header("Content-Type: text/html");

    $count = array(
		'limit' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'espresso_event_categories',
				'field' => 'slug',
				'terms' => $term_slug,
			)
		),
	);
    $count_query = new EE_Event_List_Query( $count );

    $atts = array(
		'limit' => $ppp,
		'tax_query' => array(
			array(
				'taxonomy' => 'espresso_event_categories',
				'field' => 'slug',
				'terms' => $term_slug,
			)
		),
	);

    $wp_query = new EE_Event_List_Query( $atts );
	?>

	<?php if ( $wp_query->have_posts() ) : ?>

		<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'event-category' ); ?>
		<?php endwhile; ?>

		<?php if (($count_query->post_count - $cat_videocount_val) > 0) { ?>
			<div class="more-event-category-post clearfix text-center">
		        <div class="col-sm-12">
			        <div id="event_category_post_btn" class="event_category" data-category="<?php echo $term_slug; ?>">Load More</div>
			    </div>
			</div>
		<?php }	?>

		<?php wp_reset_postdata(); ?>

	<?php else : ?>
		<p><?php _e( 'Sorry, no class matched your criteria.' ); ?></p>
	<?php endif; ?>   
    <?php 
    die();
}

add_action('wp_ajax_nopriv_event_category_page_listing', 'event_category_page_listing_function');
add_action('wp_ajax_event_category_page_listing', 'event_category_page_listing_function');