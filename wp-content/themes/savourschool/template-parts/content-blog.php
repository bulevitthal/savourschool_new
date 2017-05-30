<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package savourschool
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('custom-blog'); ?>>
	<?php if ( has_post_thumbnail() ) { ?>
	    <div class="blog-images">
			<div class="post-image">
				<img src="<?php the_post_thumbnail_url( 'blog-thumb' ); ?>" class="img-responsive">
				<div class="post-date">
					<div class="month"><?php 
						echo get_the_date('M');
					?></div>
					<div class="date"><?php 
						echo get_the_date('j');
					?></div>
				</div>
				<div class="post-title">
					<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>		
				</div>
			</div>
		</div>
	<?php } ?>
	<div class="entry-content">
		<?php if ( !has_post_thumbnail() ) { ?>
			<div class="custom-post-title">
				<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			</div>
		<?php } ?>
		<?php
			the_excerpt();
			/*the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'savourschool' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			echo do_shortcode('[ssba]');
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'savourschool' ),
				'after'  => '</div>',
			) );*/
		?>
		<div class="read-morelink">
			<a href="<?php echo get_the_permalink(); ?>" class="blog-readmore-link">Read More</a>
		</div>
	</div><!-- .entry-content -->
	
</article><!-- #post-## -->
