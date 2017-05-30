<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package savourschool
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 
<link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
		<?php if(of_get_option('top_ribbon')){ ?>
		<div id="top_ribbon" class="container-fluid">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<?php echo of_get_option('top_ribbon'); ?>
					</div>
				</div>
			</div>
		</div>
		<?php } ?>
		<div class="header-wrapper">
			<?php 

			$image = get_field('header_image');

			if( !empty($image) && !is_front_page() ): ?>

				<img class="header-img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

			<?php else : ?>
				<?php if (!is_front_page()) { ?>
						
					<img class="header-img" src="<?php echo get_template_directory_uri(); ?>/images/subpage-bg.png" />		
				
				<?php	}	?>

			<?php endif; ?>
		
			<header id="header" class="header">
				<div class="container">
					<div id="page" class="row">
						<div class="col-md-4 col-lg-4 col-sm-4">
							<div class="top-logo-left" id="top-left">
								<div class="search-social"><?php echo do_shortcode('[wpbsearch]'); ?></div>
								<div class="social-wrapper">
									<ul class="clearfix">
										<?php if(of_get_option('facebook_url')){ ?>
										<li class="facebook-social">
											<a href="http://<?php echo of_get_option('facebook_url'); ?>" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>	
										</li>
									 	<?php } ?>	
									 	<?php if(of_get_option('twitter_url')){ ?>
										<li class="twitter-social">
											<a href="http://<?php echo of_get_option('twitter_url'); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>	
										</li>
									 	<?php } ?>
									 	<?php if(of_get_option('youtube_url')){ ?>
										<li class="youtube-social">
											<a href="http://<?php echo of_get_option('youtube_url'); ?>" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>	
										</li>
									 	<?php } ?>
									 	<?php if(of_get_option('pinterest_url')){ ?>
										<li class="pinterest-social">
											<a href="http://<?php echo of_get_option('pinterest_url'); ?>" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>	
										</li>
									 	<?php } ?>
									 	<?php if(of_get_option('instagram_url')){ ?>
										<li class="instagram-social">
											<a href="http://<?php echo of_get_option('instagram_url'); ?>" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>	
										</li>
									 	<?php } ?>
									 	<?php if(of_get_option('google_plus_url')){ ?>
										<li class="google_plus-social">
											<a href="http://<?php echo of_get_option('google_plus_url'); ?>" target="_blank"><i class="fa fa-google-plus" aria-hidden="true"></i></a>	
										</li>
									 	<?php } ?>
									 	<?php if(of_get_option('linkedin_url')){ ?>
										<li class="linkedin-social">
											<a href="http://<?php echo of_get_option('linkedin_url'); ?>" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>	
										</li>
									 	<?php } ?>
									</ul>
								</div>					
							</div>
						</div>
						<div class="col-md-4 col-lg-4 col-sm-4">
							<div id="masthead" class="site-header " role="banner">
								<div class="site-branding text-center">
									<?php
									if ( is_front_page() && is_home() ) : ?>
										<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
									<?php else : ?>
										<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo of_get_option('logo'); ?>" alt="logo"/></a></p>
									<?php
									endif;

									//$description = get_bloginfo( 'description', 'display' );
									//if ( $description || is_customize_preview() ) : ?>
										<p class="site-description"><?php //echo $description; /* WPCS: xss ok. */ ?></p>
									<?php
									//endif; ?>
								</div><!-- .site-branding -->
							</div><!-- #masthead -->					
						</div>
						<div class="col-md-4 col-lg-4 col-sm-4">
							<div class="top-logo-right" id="top-logo-right">
								<div class="account_links" id="login-section-right">
								 <?php if ( is_user_logged_in() ) { ?>
								 	<a class="account-btn" href="<?php echo home_url(); ?>/account-user" title="<?php _e('My Account','woothemes'); ?>">
								 		<?php _e('My Account','woothemes'); ?>
								  	</a>
								  	<a class="account-btn" href="<?php echo wp_logout_url(); ?>" title="<?php _e('Log Out','woothemes'); ?>">
								 		<?php _e('Log Out','woothemes'); ?>
								  	</a>
								 <?php } 
								 else { ?>
								 	<a class="account-btn" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Login','woothemes'); ?>"><?php _e('Login','woothemes'); ?></a>
								 	<a class="account-btn" href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('Register','woothemes'); ?>"><?php _e('Register','woothemes'); ?>
							 		</a>
								 <?php } ?>
								</div>
								<div class="cart_links">
									<div class="cart-box">
										<?php dynamic_sidebar( 'header-top-cart' ); ?>
									</div>							
								</div>
							</div>					
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="custom-header-menu">
								<nav class="navbar navbar-inverse " role="navigation">
								    
							        <!-- Brand and toggle get grouped for better mobile display -->
							        <div class="navbar-header">
							            <button type="button"  class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							                <span class="sr-only">Toggle navigation</span>
							                <span class="icon-bar"></span>
							                <span class="icon-bar"></span>
							                <span class="icon-bar"></span>
							            </button>
							        </div><!--end navbar-header-->
							        <div class="collapse navbar-collapse menu-primary" id="bs-example-navbar-collapse-1">
							            <?php
							            wp_nav_menu( array(
							                'menu'              => '',
							                'theme_location'    => 'primary',
							                'depth'             => 2,
							                'container'         => '',
							                'container_class'   => 'collapse navbar-collapse',
							                'container_id'      => 'bs-example-navbar-collapse-1',
							                'menu_class'        => 'nav navbar-nav',
							                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
							                'walker'            => new wp_bootstrap_navwalker())
							            );
							            ?>
							           
							        </div><!--end navbar-colapse-->
								    
								</nav>
							</div>
						</div>
					</div>
				</div>
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<?php if (!is_front_page()) { ?>
								<?php if ( is_single() && 'post' == get_post_type() ) { ?>
									<div class="page-title">
										<h1><?php the_title(); ?></h1>
										<p>Posted on <span><b><?php echo get_the_date('m/d/Y'); ?></b></span> in <?php $categories = get_the_category();
											$separator = ', ';
											$output = '';
											if ( ! empty( $categories ) ) {
											    foreach( $categories as $category ) {
											        $output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
											    }
											    echo trim( $output, $separator );
											} ?></p>
									</div>
								<?php } elseif (is_single()) { ?>
									<div class="page-title">
										<h1><?php the_title(); ?></h1>
									</div>
								<?php } elseif(is_shop()) { ?>
                                       <div class="page-title">
                                               <h1>New Products</h1>
                                       </div>
                               	<?php } elseif(is_category() || is_archive()) { ?>
                                       <div class="page-title">
                                               <h1><?php single_cat_title(); ?></h1>
                                       </div>
                               	 <?php } elseif( is_home() ) { ?>
                                       <div class="page-title">
                                               <h1><?php single_post_title(); ?></h1>
                                       </div>
                               <?php } else { ?>
									<div class="page-title">
										<h1><?php the_title(); ?></h1>
									</div>
								<?php } ?>
							<?php }?>
						</div>
					</div>
				</div>
			</header>
			<?php if(is_singular( 'post' ) ){ ?>
				<div class="blog-shadow hidden-xs hidden-sm"></div>
			<?php } ?>
		</div>
	<?php if (is_front_page()) { ?>
		<div class="container-fluid" id="home-slider">
			<?php
				echo do_shortcode('[rev_slider alias="Home"]');
			?>
		</div>
	<?php } ?>
	<?php if(is_front_page()){ ?>
		<div class="home-content-body">
	<?php } elseif ( is_singular('online_classes') || is_tax('video_category') ) { ?>
  		<div class="container-online-classes">
	<?php } elseif ( is_page_template('template-online-classes-video.php') ) { ?>
  		<div class="container-online-classes-video">
	<?php } elseif ( is_page_template('template-online-classes-subscription.php') ) { ?>
        <div class="container-online-classes-subscription">
	<?php } elseif ( is_shop() ) { ?>
        <div class="container">
    <?php } elseif ( is_home() ) { ?>
		<div id="blog-content" class="blog-site-content">
        <div class="container">
	<?php } else { ?>
		<div class="container">
	<?php } ?>
	<?php if(!is_front_page()){ ?>
		<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">
		    <?php if(function_exists('bcn_display'))
		    {
		        bcn_display();
		    }?>
		</div>
	<?php } ?>
		<div id="content" class="site-content">
