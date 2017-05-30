<?php
/**
 * This template will display a single event - copy it to your theme folder
 *
 * @ package		Event Espresso
 * @ author		Seth Shoultes
 * @ copyright	(c) 2008-2013 Event Espresso  All Rights Reserved.
 * @ license		http://eventespresso.com/support/terms-conditions/   * see Plugin Licensing *
 * @ link			http://www.eventespresso.com
 * @ version		4+
 */

/*************************** IMPORTANT *************************
 * if you are creating a custom template based on this file,
 * and do not wish to use the template display order controls in the admin,
 * then remove the following filter and position the additional template parts
 * that are loaded via the espresso_get_template_part() function to your liking
 * and/or use any of the template tags functions found in:
 * \wp-content\plugins\event-espresso-core\public\template_tags.php
 ************************** IMPORTANT **************************/
add_filter( 'FHEE__content_espresso_events__template_loaded', '__return_true' );

//echo '<br/><h6 style="color:#2EA2CC;">'. __FILE__ . ' &nbsp; <span style="font-weight:normal;color:#E76700"> Line #: ' . __LINE__ . '</span></h6>';

global $post;
$event_class = has_excerpt( $post->ID ) ? ' has-excerpt' : '';
$event_class = apply_filters( 'FHEE__content_espresso_events__event_class', $event_class );
?>
<?php do_action( 'AHEE_event_details_before_post', $post ); ?>
<div id="post-<?php the_ID(); ?>" <?php post_class( $event_class ); ?>>
	<div class="row">
		<div class="col-md-1 hidden-sm hidden-xs">
			<button class="back-button" onclick="goBack()"></button>
			<script>
				function goBack() {
				    window.history.back();
				}
			</script>
		</div>
		<?php 
			$galleryArray = get_post_gallery_ids($post->ID); 
			$thumb_count = 0;
			$main_count = 0;
		?>
		<?php if($galleryArray){ ?>		
		<div class="col-md-4 col-sm-6 col-xs-12" id="class-main-content">
			<div id="espresso-event-header-dv-<?php echo $post->ID;?>" class="espresso-event-header-dv">
				
	  		    <div id="slider">
		            <div id="carousel-bounding-box">
	                    <div id="myCarousel" class="carousel slide">
	                        <!-- main slider carousel items -->
	                        <div class="carousel-inner">
	                        	<?php foreach ($galleryArray as $id) { ?>
		                            <div class="item <?php if($main_count == 0){ echo 'active'; } ?>" data-slide-number="<?php echo $main_count; ?>">
		                                <img src="<?php echo wp_get_attachment_url( $id ); ?>" class="img-responsive">
		                            </div>
		                            <?php $main_count++; ?>
	                            <?php } ?>
	                        </div>
	                   	</div>
	                </div>
				</div>
		    	<div id="slider-thumbs">
					<ul class="list-inline">
						<?php foreach ($galleryArray as $id) { ?>
							<li> 
								<a id="carousel-selector-<?php echo $thumb_count; ?>" class="<?php if($thumb_count == 0){ echo 'selected'; } ?>">
					            	<img src="<?php echo wp_get_attachment_url( $id ); ?>" class="img-responsive">
					          	</a>
				          	</li>
				          	<?php $thumb_count++; ?>
		      			<?php } ?>
		          	</ul>
		          	 <a class="carousel-control left" href="#myCarousel" data-slide="prev">‹</a>
		             <a class="carousel-control right" href="#myCarousel" data-slide="next">›</a>
			   	</div>

				<?php //espresso_get_template_part( 'content', 'espresso_events-thumbnail' ); ?>
				<?php //espresso_get_template_part( 'content', 'espresso_events-header' ); ?>
			</div>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-12">
		<?php }else{ ?>
		<div class="col-md-10 col-sm-6">
		<?php } ?>
			<?php espresso_get_template_part( 'content', 'espresso_events-tickets' ); ?>
		</div>
	 	<div class="col-md-1 hidden-xs hidden-sm">
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="espresso-event-wrapper-dv">
				<div id="exTab1">	
					<ul  class="nav nav-pills">
						<li class="active">
				        	<a  href="#1a" data-toggle="tab">Info</a>
						</li>
						<li>
							<a href="#2a" data-toggle="tab">FAQ</a>
						</li>
						<li>
							<a href="#3a" data-toggle="tab">Cancellation Policy</a>
						</li>
					</ul>
					<div class="tab-content clearfix">
					  	<div class="tab-pane active" id="1a">
				          	<p><b>Level:</b></p>
				          	<p><?php echo get_field('class_difficulty_level'); ?></p>
				          	<p></p>
				          	<p><b>Class Location:</b></p>
			          		<p><?php echo get_field('class_location'); ?></p>
				          	<p></p>
			          		<p><b>Class Details:</b></p>
				          	<?php espresso_get_template_part( 'content', 'espresso_events-details' ); ?>
						</div>
						<div class="tab-pane" id="2a">
				          	<?php echo get_field('faqs'); ?>
						</div>
						<div class="tab-pane" id="3a">
				          	<h3><a href="<?php echo home_url(); ?>/cancellation-policy/">Link to Cancellation Policy</a></h3>
						</div>
				  	</div>
				</div>
			</div>
		</div>
		<div class="col-md-10 col-md-offset-1" id="related-classes">
		<?php 
		
			$post_objects = get_field('related_classes');

			if( $post_objects ): ?>
				<h4>You may also like</h4>
			    <div class="row">
			    <?php foreach( $post_objects as $post_object): ?>
			        <div class="col-md-6 clearfix">
			        	<div class="class_image">
			        		<?php echo get_the_post_thumbnail($post_object->ID, array(200, 200)); ?>
			        	</div>
			        	<div class="class_details">
			        		<h3><?php echo get_the_title($post_object->ID); ?></h3>
			            	<a href="<?php echo get_permalink($post_object->ID); ?>" class="learn_more">Learn More</a>
			            </div>
			        </div>
			    <?php endforeach; ?>
			    </div>
			<?php endif; ?>
			<!--<footer class="event-meta">
				<?php //do_action( 'AHEE_event_details_footer_top', $post ); ?>
				<?php //do_action( 'AHEE_event_details_footer_bottom', $post ); ?>
			</footer>-->
		</div>
	</div>
</div>
<!-- #post -->
<?php do_action( 'AHEE_event_details_after_post', $post );

