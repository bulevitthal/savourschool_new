<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package savourschool
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="event-category">
		<div class="event-category-wrapper">
			<div class="row">
				<div class="col-sm-4">
					<div class="event-category-inner">
						<a href="<?php echo get_permalink(); ?>">
							<img src='<?php echo the_post_thumbnail_url( "full" ); ?>' class="img-responsive">
						</a>
					</div>
				</div>
				<div class="col-sm-8">
					<div class="event-category-title-description">
						<div class="event-category-data">
							<div class="event-category-title">
								<h3><?php echo get_the_title(); ?></h3>		
								
								<?php
					        		if (get_field('short_description', get_the_ID())) {
					        			echo get_field('short_description', get_the_ID());	
					        		} else {
					        			echo the_excerpt(); 
					        		}
				        		?>
							</div>
						</div>
						<div class="upcomming-class-meta-date">
							<div class="learn-more-btn">
								<a class="event-category-btn" href="<?php echo get_permalink(); ?>" class="btn btn-primary custom-btn">Learn More</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</article><!-- #post-## -->