<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package savourschool
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('col-sm-4'); ?>>
	<!-- .entry-header -->

	<div class="entry-content">
		<div class="online-cls-video-section equalheight">
			<div class="video-cat-img-section  text-center">
				<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php echo get_permalink( ); ?>"><img src="<?php	the_post_thumbnail_url( 'cat-video-thumb' ); ?>" class="img-responsive"></a>
				<?php	} else { ?>
					<a href="<?php echo get_permalink( ); ?>"><img src="<?php	get_template_directory_uri() .'/images/dummy.png'; ?>" class="img-responsive"></a>
				<?php } 
				?>
			</div>
			<div class="video-cat-title-section">
				<a href="<?php echo get_permalink( ); ?>"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
			</div>
			<div class="video-cat-date-time-section">
				<div class="video-cat-date-section">
					<img class="online-class-video-img" src="<?php echo get_template_directory_uri(); ?>/images/date.png" />
					
					<?php $date = get_field('online_class_date');
					$new_date = date("d/m/Y", strtotime($date)); ?>

					<?php echo $new_date; ?>
				</div>
				<div class="video-cat-time-section">
					<img class="online-class-video-img" src="<?php echo get_template_directory_uri(); ?>/images/time.png" />
					<?php 
						echo  get_field('duration');
					?>
				</div>
			</div>
		</div>
	</div><!-- .entry-content -->

	<!-- <footer class="entry-footer">
		<?php savourschool_entry_footer(); ?>
	</footer> --><!-- .entry-footer -->
</article><!-- #post-## -->
