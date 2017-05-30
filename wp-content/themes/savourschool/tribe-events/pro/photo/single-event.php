<?php
/**
 * Photo View Single Event
 * This file contains one event in the photo view
 *
 * Override this template in your own theme by creating a file at [your-theme]/tribe-events/pro/photo/single_event.php
 *
 * @package TribeEventsCalendar
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php

global $post;

?>

<div class="tribe-events-photo-event-wrap">
	<div class="event-start-date">
		<div class="date-circle">
			<p><?php echo tribe_get_start_date($post->ID, false, 'M'); ?><br/><?php echo tribe_get_start_date($post->ID, false, 'd D'); ?></p>
		</div>
	</div>
	<?php echo tribe_event_featured_image( null, 'medium' ); ?>

	<div class="tribe-events-event-details tribe-clearfix">

		<!-- Event Title -->
		<?php do_action( 'tribe_events_before_the_event_title' ); ?>
		<h2 class="tribe-events-list-event-title">
			<a class="tribe-event-url" href="<?php echo esc_url( tribe_get_event_link() ); ?>" title="<?php the_title() ?>" rel="bookmark">
				<?php the_title(); ?>
			</a>
		</h2>
		<?php do_action( 'tribe_events_after_the_event_title' ); ?>

		<!-- Event Meta -->
		<?php //do_action( 'tribe_events_before_the_meta' ); ?>
		<!--<div class="tribe-events-event-meta">
			<div class="tribe-event-schedule-details">
				<?php //if ( ! empty( $post->distance ) ) : ?>
					<strong>[<?php //echo tribe_get_distance_with_unit( $post->distance ); ?>]</strong>
				<?php //endif; ?>
				
			</div>
		</div>--><!-- .tribe-events-event-meta -->
		<?php do_action( 'tribe_events_after_the_meta' ); ?>

		<!-- Event Content -->
		<?php do_action( 'tribe_events_before_the_content' ); ?>
		<div class="tribe-events-list-photo-description tribe-events-content">
			<?php echo get_the_excerpt(); ?>
		</div>
		<?php do_action( 'tribe_events_after_the_content' ) ?>
		<div class="tribe-events-list-category clearfix">
			<ul>
			<?php 
				$flag1 = 0;
				$cats = get_the_terms(get_the_id(), 'tribe_events_cat'); 
				
					foreach ($cats as $key => $value) {
						if($flag1 <= 2){
						$flag1 = $flag1 + 1;
						$terms_link = get_term_link($value->term_id);
						echo "<li><a href='".$terms_link."'>".$value->name."</a></li>";
						}
					}
				
			?>
			</ul>
		</div>


	</div><!-- /.tribe-events-event-details -->

</div><!-- /.tribe-events-photo-event-wrap -->
