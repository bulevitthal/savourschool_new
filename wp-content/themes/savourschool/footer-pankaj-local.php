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

	</div><!-- #content -->
</div><!-- #page -->
</div><!-- .container -->
<footer id="colophon" class="site-footer" role="contentinfo">
	<div class="container-fluid" id="footer-full">
		<div class="container">
			<div class="row">
				<div class="footer-top-wrapper clearfix">
					<div class="col-md-3">
						<div class="footer-top-link">
							<div class="footer-link-section">
								<i class="fa fa-exclamation-circle" aria-hidden="true"></i>
								<p>About ILI</p>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="footer-top-link">
							<div class="footer-link-section">
								<i class="fa fa-commenting" aria-hidden="true"></i>
								<p>Talk to Us</p>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="footer-top-link">
							<div class="footer-link-section">
								<i class="fa fa-bar-chart" aria-hidden="true"></i>
								<p>Poll Results</p>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="footer-top-link last-row">
							<div class="footer-link-section">
								<i class="fa fa-television" aria-hidden="true"></i>
								<p>Video Newsletter</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="footer-top-link second-row">
						<div class="footer-link-section">
							<i class="fa fa-rss" aria-hidden="true"></i>
							<p>Subscribe</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-top-link second-row">
						<div class="footer-link-section">
							<i class="fa fa-comments-o" aria-hidden="true"></i>
							<p>Faculty Commons</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-top-link second-row">
						<div class="footer-link-section">
							<i class="fa fa-bars farotate" aria-hidden="true"></i>
							<p>RIT Online</p>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-top-link second-row last-row">
						<div class="footer-link-section">
							<i class="fa fa-bars farotate" aria-hidden="true"></i>
							<p>TLS</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid footer-widgetwrapper" id="footer-center">		
		<div class="container">
			<div class="row">
				<div class="col-md-3">
						<div class="footer-section-one">
							<?php dynamic_sidebar( 'sidebar-footer' ); ?>
						</div>
				</div>
				<div class="col-md-3">
						<div class="footer-section-two">
							<?php dynamic_sidebar( 'footer-second-section' ); ?>
						</div>
				</div>
				<div class="col-md-3">
						<div class="footer-section-three">
							<?php dynamic_sidebar( 'footer-third-section' ); ?>
						</div>
				</div>
				<div class="col-md-3" id="footer-social">
						<div class="footer-section-fourth">
							<?php dynamic_sidebar( 'footer-fourth-section' ); ?>
						</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid" id="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php
			            /*wp_nav_menu( array(
			                'menu'              => '',
			                'theme_location'    => 'footer',
			                'depth'             => 2,
			                'container'         => '',
			                'container_class'   => 'clearfix',
			                'container_id'      => 'footer-menu',
			                'walker'            => new wp_bootstrap_navwalker()
		                )
		            	);*/
		            ?>
		            <div class="copyright"> &copy; Copyright Rochester Institute of technology. All Rights Reserved | Disclaimer | Copyright Infringement </div>
				</div>
			</div>
		</div>
	</div>
</footer><!-- #colophon -->	
<!-- <div class="container-fluid" id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p><i class="fa fa-copyright" aria-hidden="true"></i> <?php echo of_get_option('footer_copyright'); ?></p>
			</div>	
		</div>
	</div>
</div> -->
</div><!-- #page -->

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
