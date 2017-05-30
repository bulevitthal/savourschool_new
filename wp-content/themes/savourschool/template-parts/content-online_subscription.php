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
		
	</header><!-- .entry-header --> 
	<div class="entry-content">
		<div class="online-class-subscription-wrapper">
			
			<div class="online-subscription-section">
				<div class="container">
					
					<div class="row">
						<div class="col-md-12">
							<div class="online-subscription-header">
								<h1 class="subscription-head">You chocolate patisserie journey starts here</h1>
							</div>
							<div class="online-subscription-video">
								<div class="row">
									<div class="col-md-4">
										
										<div class="online-subscription-text-section">
											<div class="text-section-first">
												<div class="text-section">
													<span class="subscription">12.95</span>
													<p>Monthly Subscription</p>
												</div>
											</div>
											<div class="text-section-second">
												<div class="text-section">
													<span class="subscription">99.00<sup><i class="fa fa-check-circle chk-subsc" aria-hidden="true"></i></sup></span>
													<p>Yearly Subscription</p>
													<span class="best-value">Best Value</span>
												</div>
											</div>	
											<div class="online-subscription-button text-center">
												<a href="<?php the_field('subscribe_now'); ?>" target="_blank" class="btn btn-primary subscribe-btn">
				                               	subscribe now</a>
				                            </div>
										</div>									

									</div>
									<div class="col-md-8">
										<div class="online-subscription-video-section">
											<div class="video-section">
												<p><?php echo get_field('video'); ?></p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="online-subscription-second-section">
								<div class="online-subscription-header-text">
									<p>your steps to culinary success</p>
									<h1 class="subscription-head"><?php echo get_field('title'); ?></h1>						
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-2">

						</div>

						<div class="col-md-8">					
							<div class="online-subscription-download-section">
								<div class="row">
									<div class="col-md-3">
										
										<div class="online-subscription-content text-center">
											<p>
												<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/download.png" /> 
											</p>
											<div class="online-subscription-content-text text-center">
												<h4>Download recipe</h4>
											</div>
										</div>
									
									</div>
									<div class="col-md-3">
										<div class="online-subscription-content text-center">
											<p>
												<img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/images/material.png"  />
											</p>
											<div class="online-subscription-content-text text-center">
												<h4>Preapre materials</h4>
											</div>
										</div>
									</div>
									<div class="col-md-3">
										<div class="online-subscription-content text-center">
											<p>
												<img alt="" src="<?php echo get_stylesheet_directory_uri(); ?>/images/watch.png" />
											</p>
											<div class="online-subscription-content-text text-center">
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
						<div class="col-md-2">

						</div>
					</div>
				</div>
			</div>

			<div class="online-subscription-middle-section text-center">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-2">

						</div>
						<div class="col-md-8">
							<div class="online-subscription-middle-first">
								<p>This decadent caramel entremet is sure to be a crowd-pleaser at your next event. Beautifully layered textures of cake, caramel mousse and an impressive glze.</p>
							</div>
							<div class="online-subscription-time-yield">
								<div class="row">
									<div class="col-md-4">
										<div class="online-subscription-middle-second">
											<p>
												Time to Prepare:
											</p>
											<p class="online-subscription-value">
												<?php echo get_field('time_to_prepare'); ?>
											</p>
										</div>					
									</div>
									<div class="col-md-4">
										<div class="online-subscription-middle-second">
											<p>
												Yield:&nbsp;
											</p>
											<p class="online-subscription-value">
												<?php echo the_field('yield'); ?>
											</p>
										</div>
									</div>
									<div class="col-md-4">
										<div class="online-subscription-middle-second">
											<p>
												Difficulty:
											</p>
											<p class="online-subscription-value">
												<?php echo the_field('difficulty'); ?>
											</p>
										</div>
									</div>
								</div>
							</div>
							<div class="online-subscription-last-second">
								<div class="row">
									<div class="col-md-12">
										<div class="online-subscription-last-first">
											<p>For all other enquires please visit our <a href="http://www.savourschool.com.au/online-classes/frequently-asked-questions.aspx">Frequency Asked Questions</a></p>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2">

						</div>
					</div>
				</div>

			</div>

			<div class="online-subscription-last-section text-center">
				<div class="container">
					<div class="row">
						<div class="col-md-2">

						</div>
						<div class="col-md-8">
							<div class="online-subscription-last-first">
								<h3>Having trouble with your video?</h3>
								<p>For Full Screen: Press the full screen <i class="fa fa-arrows-alt" aria-hidden="true"></i> icon then press Scaling Option in top right corner For High Definition: Pree the HD button on the toolbar</p>
							</div>
						</div>
						<div class="col-md-2">

						</div>
					</div>
				</div>
			</div>

		<!-- online-class-container-wrapper -->
	</div><!-- .entry-content -->
</article><!-- #post-## -->
