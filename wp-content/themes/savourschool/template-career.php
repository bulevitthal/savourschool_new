<?php
/*
 Template Name: Career Page Template
 */

get_header(); ?>

		<div class="career-wrapper">
			<div id="primary" class="content-area">
				<main id="main" class="site-main" role="main">
					<div class="row">
						<div class="col-md-1 hidden-sm hidden-xs">
						</div>
						<div id="career-main" class="col-md-10 col-sm-12 col-xs-12">
							<div class="savour-job row">
								<p class="text-head" style="text-align: center;">SAVOUR</p>
								<h2 class="job-name">Opportunities at Savour</h2> 
								<?php
									$args = array(
										'post_type' => 'career',
										'meta_key' => 'opportunity_type',
    									'orderby' => 'opportunity_type',
										'order' => 'DESC',
										'meta_query'     => array(
											array(
												'key'     => 'opportunity_type',
												'compare' => 'LIKE',
												'value'   => 'savour',
											)
										)
									);
									// The Query
									$the_query = new WP_Query( $args );

									// The Loop
									if ( $the_query->have_posts() ) {
										
										while ( $the_query->have_posts() ) {
											$the_query->the_post(); ?>
											<div class="career-slot clearfix">
												<div class="desc col-md-8">
													<h3><?php echo  get_the_title() ; ?></h3>
													<p class="job-location"> <?php echo get_field('location'); ?></p>
													<div class="short-desc"><?php echo get_field('short_description'); ?></div>
												</div>
												<div class="buttons col-md-4">
													<?php if(get_field('status') == 'open'){ ?>
														<a href="<?php echo get_permalink(); ?>" class="open">Learn More</a>
													<?php }else{ ?>
														<a class="closed">Closed</a>
													<?php } ?>
													<p class="posted-date">Posted On <b><?php echo get_the_date('d/m/Y') ?></b></p>	
												</div>
											</div>
										<?php }
										
										/* Restore original Post Data */
										wp_reset_postdata();
									} 
								?>
							</div>
							<div class="other-job row">
								<p class="text-head" style="text-align: center;">SAVOUR</p>
								<h2 class="job-name">Other Opportunities</h2> 
								<?php
									$args = array(
										'post_type' => 'career',
										'meta_key' => 'opportunity_type',
    									'orderby' => 'opportunity_type',
										'order' => 'DESC',
										'meta_query'     => array(
											array(
												'key'     => 'opportunity_type',
												'compare' => 'LIKE',
												'value'   => 'other',
											)
										)
									);
									// The Query
									$the_query = new WP_Query( $args );

									// The Loop
									if ( $the_query->have_posts() ) {
										
										while ( $the_query->have_posts() ) {
											$the_query->the_post(); ?>
											<div class="career-slot clearfix">
												<div class="desc col-md-8">
													<h3><?php echo  get_the_title() ; ?></h3>
													<p class="job-location"><?php echo get_field('comapny'); ?><?php if(get_field('comapny')){echo ',';}?> <?php echo get_field('location'); ?></p>
													<div class="short-desc"><?php echo get_field('short_description'); ?></div>
												</div>
												<div class="buttons col-md-4">
													<?php if(get_field('status') == 'open'){ ?>
														<a href="<?php echo get_permalink(); ?>" class="open">Learn More</a>
													<?php }else{ ?>
														<a class="closed">Closed</a>
													<?php } ?>
													<p class="posted-date">Posted On <b><?php echo get_the_date('d/m/Y') ?></b></p>	
												</div>
											</div>
										<?php }
										
										/* Restore original Post Data */
										wp_reset_postdata();
									} 
								?>
							</div>
						</div>
						<div class="col-md-1 hidden-sm hidden-xs">
						</div>
					</div>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div>
<?php
get_footer();