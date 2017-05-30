<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package savourschool
 */

?>
<?php if ( is_home() ) { ?>
	</div> <!-- #blog-conten -->
<?php } ?>
	</div><!-- #content -->
</div><!-- #page -->
</div><!-- .container -->
<?php if(is_singular( 'career' )){ ?>
	<div class="container-full" id="career-info">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<p class="text-head">READY TO APPLY?</p>
					<h2 class="job-name">Address the criteria and send your CV:</h2>
					<div class="career-buttons clearfix">
						<a class="mail_apply" href="mailto:<?php echo get_field('email_career'); ?>">Apply Now via Email</a> <span>OR</span> <a href="<?php echo site_url(); ?>/careers/" class="other_post">View Other Positions</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<footer id="colophon" class="site-footer" role="contentinfo">

	<div id="footer_top_center" class="secondary">
		<div id="sidebar">
			<div class="container-fluid">
				<div class="container">
					<div class="top_footer">
						<?php if ( is_active_sidebar( 'footer_top_center' ) ) : ?>
							<?php dynamic_sidebar( 'footer_top_center' ); ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>

    <div class="footer-center" id="footer-middle">		
		<div class="container-fluid">
			<div class="container">
				<div class="footer-center-wrapper">
					<div class="row">
						<div class="col-md-4 col-sm-4">
							<div class="left-column">
							<?php if ( is_active_sidebar( 'footer-middle-left' ) ) : ?>
						        <?php dynamic_sidebar( 'footer-middle-left' ); ?>
							<?php endif; ?>
							</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="center-column">
				            	<?php if ( is_active_sidebar( 'footer-middle-center' ) ) : ?>
								    <?php dynamic_sidebar( 'footer-middle-center' ); ?>
								<?php endif; ?>
				        	</div>
						</div>
						<div class="col-md-4 col-sm-4">
							<div class="right-column">
				            	<?php if ( is_active_sidebar( 'footer-middle-right' ) ) : ?>
								    <?php dynamic_sidebar( 'footer-middle-right' ); ?>
								<?php endif; ?>
				        	</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="container-fluid" id="footer-bottom">
		<div class="container">
			<div class="footer_bottom">
				<div class="row">
					<div class="col-md-12">
						<?php
				            wp_nav_menu( array(
				                'menu'              => '',
				                'theme_location'    => 'footer',
				                'depth'             => 2,
				                'container'         => '',
				                'container_class'   => 'clearfix',
				                'container_id'      => 'footer-menu',
				                'walker'            => new wp_bootstrap_navwalker()
			                )
			            	);
			            ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->	
<!-- <div class="container-fluid" id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p><i class="fa fa-copyright" aria-hidden="true"></i> <?php //echo of_get_option('footer_copyright'); ?></p>
			</div>	
		</div>
	</div>
</div> -->
<!-- </div> --><!-- #page -->

<?php wp_footer(); ?>
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="//v2.zopim.com/?4MC2K6vLLkyNlw1wDG6wokJ2M23McLL8";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->
</body>
</html>
