<?php
/**
 * Template part for displaying Online Classes.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package savourschool
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<!-- <header class="entry-header">
		<?php //the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header --> 
	<div class="entry-content">
		<div class="online-class-container-wrapper">
			
			<div class="class-single-video-section">
				<div class="container">
					<div class="row">
						<div class="col-md-2">

						</div>

						<div class="col-md-8">
							<div class="online-class-filter">
								<div class="row">
									<div class="col-md-4 col-sm-4">
										<div class="filter-first text-center">
											<p><a href="<?php echo get_permalink( ); ?>"><img class="header-img" src="<?php echo get_template_directory_uri(); ?>/images/video.png" /><span class="online-text">Latest Videos</span></a></p>
										</div>
									</div>
									<div class="col-md-5 col-sm-5">
										
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
												    	<button class="btn btn-default dropdown-toggle taxonomy-video" type="button" data-toggle="dropdown"><img class="header-img" src="<?php echo get_template_directory_uri(); ?>/images/category.png" /><span class="online-text"> Search By Category</span><span class="caret"></span></button>
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
									<div class="col-md-3 col-sm-3">
										<div class="filter-third text-center">
											<p><img class="header-img" src="<?php echo get_template_directory_uri(); ?>/images/forum.png" /><span class="online-text">forum</span></p>
										</div>
									</div>
								</div>
							</div>
							<div class="online_classes_content_wrapper">
								<div class="video-section">
									<p><?php echo get_field('video'); ?></p>
								</div>

								<div class="online-classe-header">
									<h1 class="class-head">Your steps to culinary success</h1>
								</div>
								<div class="online-class-download-section">
									<div class="row">
										<div class="col-md-3">
											
											<div class="online-class-content text-center">
												<p>
													<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/download.png" /> 
												</p>
												<div class="online-class-content-text text-center">
													<h4>Download recipe</h4>
												</div>
											</div>
										
										</div>
										<div class="col-md-3">
											<div class="online-class-content text-center">
												<p>
													<img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/images/material.png"  />
												</p>
												<div class="online-class-content-text text-center">
													<h4>Prepare materials</h4>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="online-class-content text-center">
												<p>
													<img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/images/watch.png" />
												</p>
												<div class="online-class-content-text text-center">
													<h4>Watch Video</h4>
												</div>
											</div>
										</div>
										<div class="col-md-3">
											<div class="online-class-content text-center">
												<p>
													<img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/images/get.png"  />
												</p>
												<div class="online-class-content-text text-center">
													<h4>Get creating!</h4>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="download-recipe text-center">
									<a href="<?php the_field('pdf_link'); ?>" target="_blank" class="btn btn-primary download-receipe-btn">
		                               	Download Recipe
		                            </a>                                                
								</div>								
							</div>
						</div>
						
					</div>
				</div>
			</div>

			<div class="online-class-middle-section text-center">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-2">

						</div>
						<div class="col-md-8">
							<div class="online-class-middle-first">
								<p>This decadent caramel entremet is sure to be a crowd-pleaser at your next event. Beautifully layered textures of cake, caramel mousse and an impressive glze.</p>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="online-class-middle-second">
										<p>
											Time to Prepare:
										</p>
										<p class="online-class-value">
											<?php echo get_field('time_to_prepare'); ?>
										</p>
									</div>					
								</div>
								<div class="col-md-4">
									<div class="online-class-middle-second">
										<p>
											Yield:&nbsp;
										</p>
										<p class="online-class-value">
											<?php echo the_field('yield'); ?>
										</p>
									</div>
								</div>
								<div class="col-md-4">
									<div class="online-class-middle-second">
										<p>
											Difficulty:
										</p>
										<p class="online-class-value">
											<?php echo the_field('difficulty'); ?>
											<?php // echo get_field('short_description', get_the_ID()); ?>
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2">

						</div>
					</div>
				</div>

			</div>

			<div class="online-class-last-section text-center">
				<div class="container">
					<div class="row">
						<div class="col-md-2">

						</div>
						<div class="col-md-8">
							<div class="online-class-last-first">
								<h3>Having trouble with your video?</h3>
								<p>Visit our forum or our <a href="<?php echo site_url(); ?>/about/frequently-asked-questions/">Frequency Asked Questions</a></p>
							</div>
						</div>
						<div class="col-md-2">

						</div>
					</div>
				</div>
			</div>

		</div><!-- online-class-container-wrapper -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->
