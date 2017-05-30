<?php
/**
 * savourschool functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package savourschool
 */

if ( ! function_exists( 'savourschool_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function savourschool_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on savourschool, use a find and replace
	 * to change 'savourschool' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'savourschool', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'savourschool' ),
		'footer' => esc_html__( 'Footer', 'savourschool' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'savourschool_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'savourschool_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function savourschool_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'savourschool_content_width', 640 );
}
add_action( 'after_setup_theme', 'savourschool_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function savourschool_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'savourschool' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
				
	register_sidebar( array(
		'name'          => esc_html__( 'Home Featured Section', 'savourschool' ),
		'id'            => 'sidebar-home_featured',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="sidebar-home_featured" class="row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );	
	register_sidebar( array(
		'name'          => esc_html__( 'Home Popular Products Section', 'savourschool' ),
		'id'            => 'sidebar-popular_products',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="sidebar-popular_products" class="row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Upcoming Classes Section', 'savourschool' ),
		'id'            => 'sidebar-upcoming_class',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="sidebar-upcoming_class" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Product Category Section', 'savourschool' ),
		'id'            => 'sidebar-product_category',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="sidebar-product_category" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Online Classes Section', 'savourschool' ),
		'id'            => 'sidebar-online_class',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="sidebar-online_class" class="%2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Latest News Section', 'savourschool' ),
		'id'            => 'sidebar-latest_news',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="sidebar-latest_news" class="row %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Featured Products Section', 'savourschool' ),
		'id'            => 'sidebar-featured_product',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="sidebar-featured_product" class="%2$s col-sm-4">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="section-title">',
		'after_title'   => '</h2><span class="footer-custom-title-border">&nbsp</span>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Sidebar', 'savourschool' ),
		'id'            => 'sidebar-footer',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Social savourschool', 'savourschool' ),
		'id'            => 'home-social-savourschool',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Social Images', 'savourschool' ),
		'id'            => 'home-social-images',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home New Product', 'savourschool' ),
		'id'            => 'home-new-product',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Sale Product', 'savourschool' ),
		'id'            => 'home-sale-product',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Home Top Product', 'savourschool' ),
		'id'            => 'home-top-ptoduct',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Second Section', 'savourschool' ),
		'id'            => 'footer-second-section',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Third Section', 'savourschool' ),
		'id'            => 'footer-third-section',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Footer Fourth Section', 'savourschool' ),
		'id'            => 'footer-fourth-section',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Header Top Cart', 'savourschool' ),
		'id'            => 'header-top-cart',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Woocommerce Sidebar', 'savourschool' ),
		'id'            => 'woocommerce-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'savourschool' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s clearfix">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	/* ============================= Shailaja ================================== */

	register_sidebar( array(
        'name' => __( 'Footer Top Center', 'theme-slug' ),
        'id' => 'footer_top_center',
        'description' => __( 'this will add footer to the top section of main footer.', 'theme-slug' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>',
    ) );

	register_sidebar(array(
        'name' => 'Footer Left',
        'id'   => 'footer-middle-left',
        'description'   => 'Left Footer widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));

    register_sidebar(array(
        'name' => 'Footer Center',
        'id'   => 'footer-middle-center',
        'description'   => 'Centre Footer widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));

    register_sidebar(array(
        'name' => 'Footer Right',
        'id'   => 'footer-middle-right',
        'description'   => 'Right Footer widget position.',
        'before_widget' => '<div id="%1$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2>',
        'after_title'   => '</h2>'
    ));
	
}
add_action( 'widgets_init', 'savourschool_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function savourschool_scripts() {
	wp_enqueue_style( 'savourschool-style', get_stylesheet_uri() );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() .'/css/bootstrap.min.css',array(),'3.3.7' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome-4.6.3/css/font-awesome.min.css',array(),'4.6.3' );

	
	wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '3.3.7', true );
	wp_enqueue_script( 'savourschool-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'savourschool-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'custom-js', get_template_directory_uri() . '/js/custom-js.js', array(), '1.0', true );


	wp_register_script( 'matchHeight_js', get_template_directory_uri() . '/js/jquery.matchHeight-min.js', array(), '1.0.0', true);
    wp_enqueue_script( 'matchHeight_js' );
	

    wp_register_style( 'second-style', get_template_directory_uri() .'/css/second-style.css', array(), '21');
    wp_enqueue_style( 'second-style' );

    wp_register_style( 'media-style', get_template_directory_uri() .'/css/media.css', array(), '21');
    wp_enqueue_style( 'media-style' );

    wp_register_style( 'responsive-menu-style', get_template_directory_uri() .'/css/responsive-menu.css', array(), '21');
    wp_enqueue_style( 'responsive-menu-style' );

    wp_register_style( 'bootstrap-multiselect', get_template_directory_uri() .'/css/bootstrap-multiselect.css', array(), '21');
    wp_enqueue_style( 'bootstrap-multiselect' );
     
	wp_register_script( 'isotope_js', get_template_directory_uri() . '/js/isotope.pkgd.min.js', array(), '1.0.0', true);
	wp_enqueue_script( 'isotope_js' );

	wp_register_script( 'multiselect_js', get_template_directory_uri() . '/js/bootstrap-multiselect.js', array(), '1.0.0', true);
	wp_enqueue_script( 'multiselect_js' );

	wp_register_script( 'custom_js', get_template_directory_uri() . '/js/custom_js.js', array(), '1.0.0', true);
    wp_enqueue_script( 'custom_js' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'savourschool_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * navigation bootstrap
 */
require get_template_directory() . '/inc/wp_bootstrap_navwalker.php';

if ( !function_exists( 'of_get_option' ) ) {
	function of_get_option($name, $default = false) {
	    $optionsframework_settings = get_option('optionsframework');
	    // Gets the unique option id
	    $option_name = $optionsframework_settings['id'];
	    if ( get_option($option_name) ) {
	        $options = get_option($option_name);
	    }
	    if ( isset($options[$name]) ) {
	        return $options[$name];
	    } else {
	        return $default;
	    }
	}
}

add_theme_support('html5', array('search-form'));
add_shortcode('wpbsearch', 'get_search_form');

remove_action( 'woocommerce_before_main_co*ntent', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}


add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
 
function my_show_extra_profile_fields( $user ) { ?>
 
    <h3>Extra profile information</h3>
 
    <table class="form-table">
 
        <tr>
            <th><label for="Company Name">Company Name</label></th>
 
            <td>
                <input type="text" name="Company Name" id="companyname" value="<?php echo esc_attr( get_the_author_meta( 'Company Name', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Company Name.</span>
            </td>
        </tr>
        <tr>
            <th><label for="Date of Birth">Date of Birth</label></th>
 
            <td>
                <input type="text" name="Date of Birth" id="dob" value="<?php echo esc_attr( get_the_author_meta( 'Date of Birth', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Date of Birth.</span>
            </td>
        </tr>
        <tr>
            <th><label for="Gender">Gender</label></th>
 
            <td>
                <input type="text" name="Gender" id="Gender" value="<?php echo esc_attr( get_the_author_meta( 'Gender', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Gender.</span>
            </td>
        </tr>
        <tr>
            <th><label for="Phone">Phone</label></th>
 
            <td>
                <input type="text" name="Phone" id="Phone" value="<?php echo esc_attr( get_the_author_meta( 'Phone', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Phone.</span>
            </td>
        </tr>
        <tr>
            <th><label for="Street Address">Street Address</label></th>
 
            <td>
                <input type="text" name="Street Address" id="StreetAddress" value="<?php echo esc_attr( get_the_author_meta( 'Street Address', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Street Address.</span>
            </td>
        </tr>
        <tr>
            <th><label for="Country">Country</label></th>
 
            <td>
                <input type="text" name="Country" id="Country" value="<?php echo esc_attr( get_the_author_meta( 'Country', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Country.</span>
            </td>
        </tr>
        <tr>
            <th><label for="State">State</label></th>
 
            <td>
                <input type="text" name="State" id="State" value="<?php echo esc_attr( get_the_author_meta( 'State', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your State.</span>
            </td>
        </tr>
        <tr>
            <th><label for="Suburb">Suburb</label></th>
 
            <td>
                <input type="text" name="Suburb" id="Suburb" value="<?php echo esc_attr( get_the_author_meta( 'Suburb', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Suburb.</span>
            </td>
        </tr>
        <tr>
            <th><label for="Postcode">Postcode</label></th>
 
            <td>
                <input type="text" name="Postcode" id="Postcode" value="<?php echo esc_attr( get_the_author_meta( 'Postcode', $user->ID ) ); ?>" class="regular-text" /><br />
                <span class="description">Please enter your Postcode.</span>
            </td>
        </tr>
        <tr>
            <th><label for="Accept Privacy Policy">Accept Privacy Policy</label></th>
 
            <td>
                <input type="text" name="Accept Privacy Policy" id="privacy" value="<?php echo esc_attr( get_the_author_meta( 'Accept Privacy Policy', $user->ID ) ); ?>" class="regular-text" /><br />
                
            </td>
        </tr>
        <tr>
            <th><label for="Newsletter Subscription">Newsletter Subscription</label></th>
 
            <td>
                <input type="text" name="Newsletter Subscription" id="Newslettersubscription" value="<?php echo esc_attr( get_the_author_meta( 'Newsletter Subscription', $user->ID ) ); ?>" class="regular-text" /><br />
              
            </td>
        </tr>
 
    </table>
<?php }


// Get And Cache Vimeo Thumbnails
function get_vimeo_thumb($vURL, $size = 'thumbnail_small') {
	$pieces = explode("/", $vURL);
	$id = end($pieces);
	 
	if(get_transient('vimeo_' . $size . '_' . $id)) {
		$thumb_image = get_transient('vimeo_' . $size . '_' . $id);
	} else {
		$json = json_decode(file_get_contents( "http://vimeo.com/api/v2/video/" . $id . ".json" ));
		$thumb_image = $json[0]->$size;
		set_transient('vimeo_' . $size . '_' . $id, $thumb_image, 2629743);
	}
	return $thumb_image;
}

// Creating the widget 
class biz_widget extends WP_Widget {

	function __construct() {
		parent::__construct(
			// Base ID of your widget
			'biz_widget', 

			// Widget name will appear in UI
			__('Online Class  		  	 Widget', 'biz_widget_domain'), 

			// Widget description
			array( 'description' => __( 'Online Class Video Widget', 'biz_widget_domain' ), ) 
		);
	}

	// Creating widget front-end
	// This is where the action happens
	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		// before and after widget arguments are defined by themes
		echo $args['before_widget'];
		if ( ! empty( $title ) )
			echo $args['before_title'] . $title . $args['after_title'];

		// This is where you run the code and display the output
		// WP_Query arguments
		$flag = 0;
		$args = array (
			'post_type'              => array( 'online_classes' ),
			'post_status'            => array( 'publish' ),
			'posts_per_page'         => '-1',
		);

		// The Query
		$query = new WP_Query( $args );

		// The Loop
		if ( $query->have_posts() ) {
			while ( $query->have_posts() ) {
				$query->the_post();
				if($flag == 0){
					echo "<div class='col-md-8'>";
					the_field('video');
					echo "</div>";
					echo "<div class='col-md-4' id='home-video-list'>";
					echo "<div class='row'>";
					echo "<div class='col-md-12'>";
					echo "<a class='btn btn-default online-login' href='".get_permalink( get_option('woocommerce_myaccount_page_id') )."'>Login / Sign Up</a>";
					echo "</div>";
					echo "</div>";
					echo "<div class='row video-list'>";
				}else{
					echo "<div class='col-md-6'>";
					echo "<a href='".get_the_permalink()."'>";
					the_post_thumbnail();
					echo "<p class='video_title'>";
					the_title();
					echo "</p>";
					echo "</a>";
					echo "</div>";

				}
				
				
				$flag++;
			}
			echo "</div>";
			echo "</div>";

		} else {
			// no posts found
		}

		// Restore original Post Data
		wp_reset_postdata();
		//echo __( 'Hello, World!', 'biz_widget_domain' );
		echo $args['after_widget'];
	}
		
	// Widget Backend 
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'biz_widget_domain' );
		}
		// Widget admin form
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}
	
	// Updating widget replacing old instances with new
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		return $instance; 		  	
	}
} // Class wpb_widget ends here

// Register and load the widget
function biz_load_widget() {
	register_widget( 'biz_widget' );
}
add_action( 'widgets_init', 'biz_load_widget' );

function custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

add_action('wp_print_scripts','example_dequeue_photoscript',100);
function example_dequeue_photoscript(){
	// remove isotope js on photo view:
	if(wp_script_is('tribe-events-pro-isotope', $list = 'enqueued' )){
                        global $wp_scripts;
                        // modifiyng global scripts, removing dependency for photo-view (was dependend on isotope.js)
                        $wp_scripts->registered["tribe-events-pro-photo"]->deps =array();
                        // dequeue isotope
                        wp_dequeue_script('tribe-events-pro-isotope');
                        wp_deregister_script('tribe-events-pro-isotope');
	}
}

add_action('admin_head', 'my_custom_fonts');

function my_custom_fonts() {
  echo '<style>
    #event_tribe_organizer, #event_url, #event_cost{
  		display:none;
	}
  </style>';
}

define('TRIBE_DISABLE_TOOLBAR_ITEMS', true);

add_role(
    'VIP',
    __( 'VIP' ),
    array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => true,
        'delete_posts' => false, // Use false to explicitly deny
    )
);
add_role(
    'video_subscriber',
    __( 'Video Subscriber' ),
    array(
        'read'         => true,  // true allows this capability
        'edit_posts'   => true,
        'delete_posts' => false, // Use false to explicitly deny
    )
);

function load_custom_wp_admin_style() {
	    wp_register_script('datatable', 'https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js', false,'1.10.13',false);
	    wp_enqueue_script('datatable');
	    wp_register_script('datatablebutton', 'https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js', false,'1.2.4',false);
	    wp_enqueue_script('datatablebutton');
	    wp_register_script('datatableprint', 'https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js', false,'1.2.4',false);
	    wp_enqueue_script('datatableprint');
	    wp_register_script('flash', 'https://cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js', false,'1.2.4',false);
	    wp_enqueue_script('flash');
	    wp_register_script('jszip', 'https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js', false,'2.5.0',false);
	    wp_enqueue_script('jszip');
	    wp_register_script('html5btn', 'https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js', false,'1.2.4',false);
	    wp_enqueue_script('html5btn');


	    wp_enqueue_style( 'datatablecss', 'https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css',array(),'1.10.13' );
	    wp_enqueue_style( 'datatableprintcss', 'https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css',array(),'1.2.4' );
}
add_action( 'admin_enqueue_scripts', 'load_custom_wp_admin_style' );

add_action( 'event_tickets_attendees_table_ticket_column', 'tribe_add_phone_to_attendee_ticket_details' );
function tribe_add_phone_to_attendee_ticket_details( $item ) {
	if ( ! isset( $item['order_id'] ) )
		return;
	$phone_number = get_post_meta( $item['order_id'], '_billing_phone', true );
	$address_1 = get_post_meta( $item['order_id'], '_billing_address_1', true );
	$address_2 = get_post_meta( $item['order_id'], '_billing_address_2', true );
	$address_city = get_post_meta( $item['order_id'], '_billing_city', true );
	$address_postcode = get_post_meta( $item['order_id'], '_billing_postcode', true );
	$address_country = get_post_meta( $item['order_id'], '_billing_country', true );

	$address = $address_1.", ".$address_2.", ".$address_city.", ".$address_postcode.", ".$address_country;

	if ( ! empty( $phone_number ) ) {
		printf( '<div class="event-tickets-ticket-purchaser">Phone: %s</div>', sanitize_text_field($phone_number));
	}
	if( ! empty( $address ) ) {
		printf( '<div class="event-tickets-ticket-purchaser">Address: %s</div>', sanitize_text_field($address));
	}
}

/**
* Add billing phone to CSV export
*/
function tribe_csv_export_add_phone_column ( $columns ){
 
    return array_merge ( $columns, array('phone' => 'Phone') );
}
 
function tribe_csv_export_populate_phone_column ( $existing, $item, $column ) {
 
    if ( 'phone' == $column ) {
 
        $phone = get_post_meta( $item['order_id'], '_billing_phone', true );
 
        return $phone;
    }
 
    return $existing;
}
 
function tribe_csv_export_add_phone ( $post_id ) {
 
    add_filter( 'manage_' . get_current_screen()->id . '_columns', 'tribe_csv_export_add_phone_column', 20 );
 
    add_filter( 'tribe_events_tickets_attendees_table_column', 'tribe_csv_export_populate_phone_column', 10, 3 );
     
}
add_action( 'tribe_events_tickets_generate_filtered_attendees_list', 'tribe_csv_export_add_phone' );

/**
* Add billing address to CSV export
*/
function tribe_csv_export_add_address_column ( $columns ){
 
    return array_merge ( $columns, array('address' => 'Address') );
}
 
function tribe_csv_export_populate_address_column ( $existing, $item, $column ) {
 
    if ( 'address' == $column ) {
 
        $address_1 = get_post_meta( $item['order_id'], '_billing_address_1', true );
		$address_2 = get_post_meta( $item['order_id'], '_billing_address_2', true );
		$address_city = get_post_meta( $item['order_id'], '_billing_city', true );
		$address_postcode = get_post_meta( $item['order_id'], '_billing_postcode', true );
		$address_country = get_post_meta( $item['order_id'], '_billing_country', true );

		$address = $address_1.", ".$address_2.", ".$address_city.", ".$address_postcode.", ".$address_country;
 
        return $address;
    }
 
    return $existing;
}
 
function tribe_csv_export_add_address ( $post_id ) {
 
    add_filter( 'manage_' . get_current_screen()->id . '_columns', 'tribe_csv_export_add_address_column', 20 );
 
    add_filter( 'tribe_events_tickets_attendees_table_column', 'tribe_csv_export_populate_address_column', 10, 3 );
     
}
add_action( 'tribe_events_tickets_generate_filtered_attendees_list', 'tribe_csv_export_add_address' );

// REPORT GENERATION
// create top level admin menu
add_action('admin_menu', 'report_admin_menu');
function report_admin_menu() {
  add_menu_page('Reports', 'Reports', 10, 'report_page', 'report_page');
  add_submenu_page('report_page', 'Income Reports', 'Income Reports', 10, 'report_page', 'report_page');
  add_submenu_page('report_page', 'All Class Customer Report', 'All Class Customer Report', 10, 'all_class_customer', 'all_class_customer');
  add_submenu_page('report_page', 'Best Customer Report - Product', 'Best Customer Report - Product', 10, 'best_customer_product', 'best_customer_product');
  add_submenu_page('report_page', 'Stock Level Report', 'Stock Level Report', 10, 'stock_level_report', 'stock_level_report');
  add_submenu_page('report_page', 'Product Notification Report‎', 'Product Notification Report‎', 10, 'product_notification_report', 'product_notification_report');
  add_submenu_page('report_page', 'Student Name Label Report', 'Student Name Label Report', 10, 'student_name_label_report', 'student_name_label_report');
}
function report_page() {
	?>
	<div class="wrap">

    <?php // get all simple products where stock is managed
    	global $wpdb, $post;
       	$events = get_posts(array(
			'post_type' => 'espresso_events',
			'post_status' => 'publish',
			'posts_per_page' => -1,
		));
	?>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function() {
	    jQuery('#income_report').DataTable({
	    	"scrollX": true,
	    	initComplete: function () {
	            this.api().columns([0]).every( function () {
	                var column = this;
	                var select = jQuery('<select><option value=""></option></select>')
	                    .appendTo( jQuery(column.footer()).empty() )
	                    .on( 'change', function () {
	                        var val = jQuery.fn.dataTable.util.escapeRegex(
	                            jQuery(this).val()
	                        );
	 
	                        column
	                            .search( val ? '^'+val+'$' : '', true, false )
	                            .draw();
	                    } );
	 
	                column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
	                    select.append( '<option value="'+d+'">'+d+'</option>' )
	                } );
	            } );
	        },
	    	dom: 'Bfrtip',
	        buttons: [ 'excel','print' ]
	    }
    	);
	} );
    </script>
    <table id="income_report" class="display" cellspacing="0" width="100%" data-order='[[ 1, "desc" ]]' data-page-length='25'>
        <thead>
            <tr>
                <th>Class Details</th>
                <th>Class Date</th>
                <th>Class cost</th>
                <th>Space</th>
                <th>Booking</th>
                <th>VIPs</th>
                <th>Student Bookings</th>
                <th>Potential</th>
                <th>Gross Virtual</th>
                <th>VIPs Virtual</th>
                <th>Students Virtual</th>
                <th>Lost Revenue</th>
                <th>Fill Ratio</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Class Details</th>
                <th>Class Date</th>
                <th>Class cost</th>
                <th>Space</th>
                <th>Booking</th>
                <th>VIPs</th>
                <th>Student Bookings</th>
                <th>Potential</th>
                <th>Gross Virtual</th>
                <th>VIPs Virtual</th>
                <th>Students Virtual</th>
                <th>Lost Revenue</th>
                <th>Fill Ratio</th>
            </tr>
        </tfoot>
        <tbody>
        <?php if ($events): 
	 		foreach ($events as $post): ?>
	 			<?php 
	 				$event_id = get_the_ID(); 

	 				$sql = "SELECT DTT_ID, DTT_EVT_start, DTT_EVT_end ";
			        $sql .= "FROM {$wpdb->prefix}esp_datetime ";
			        $sql .= "WHERE EVT_ID = %d";			

			        $event_times = $wpdb->get_results( $wpdb->prepare( $sql, $event_id ));
			       	foreach($event_times as $event_time){

			       		$utc_date = DateTime::createFromFormat(
						    'Y-m-d H:i:s',
						    $event_time->DTT_EVT_start,
						    new DateTimeZone('UTC')
						);

						$acst_date = clone $utc_date; // we don't want PHP's default pass object by reference here
						$acst_date->setTimeZone(new DateTimeZone('Australia/Melbourne'));
						$startdate = $acst_date->format('Y-m-d g:i A'); 

						$utc_date1 = DateTime::createFromFormat(
						    'Y-m-d H:i:s',
						    $event_time->DTT_EVT_end,
						    new DateTimeZone('UTC')
						);

						$acst_date1 = clone $utc_date1; // we don't want PHP's default pass object by reference here
						$acst_date1->setTimeZone(new DateTimeZone('Australia/Melbourne'));
						$enddate = $acst_date1->format('Y-m-d g:i A');

						
				       	$eventstart = date('d/m/Y', strtotime($startdate));
				       	$eventend = date('d/m/Y', strtotime($enddate));

				       	$sql = "SELECT TKT_ID ";
				        $sql .= "FROM {$wpdb->prefix}esp_datetime_ticket ";
				        $sql .= "WHERE DTT_ID = %d";			

				        $ticket = $wpdb->get_results( $wpdb->prepare( $sql, $event_time->DTT_ID ));

			        	$sql = "SELECT TKT_qty, TKT_sold, TKT_price ";
				        $sql .= "FROM {$wpdb->prefix}esp_ticket ";
				        $sql .= "WHERE TKT_ID = %d";

				        $ticket_info = $wpdb->get_results( $wpdb->prepare( $sql, $ticket[0]->TKT_ID ));
		 			?>
		 			<tr>
		                <td><?php echo get_the_title().' '.$eventstart.' to '.$eventend; ?></td>
		                <td><?php echo $eventstart; ?></td>
		                <td><?php echo '$'.$ticket_info[0]->TKT_price; ?></td>
		                <td><?php echo $ticket_info[0]->TKT_qty; ?></td>
		                <td><?php echo $ticket_info[0]->TKT_sold; ?></td>
		                <td><?php 
		                	$vip_count = 0;
		                	$sql = "SELECT ATT_ID ";
					        $sql .= "FROM {$wpdb->prefix}esp_registration ";
					        $sql .= "WHERE EVT_ID = %d AND TKT_ID = %d";

					        $attendee = $wpdb->get_results( $wpdb->prepare( $sql, $event_id, $ticket[0]->TKT_ID));
					        
			                foreach($attendee  as $key => $value){
			                	
			                	$sql = "SELECT ATT_email ";
						        $sql .= "FROM {$wpdb->prefix}esp_attendee_meta ";
						        $sql .= "WHERE ATT_ID = %d";

						        $attendee_mail = $wpdb->get_results( $wpdb->prepare( $sql, $value->ATT_ID));

						        $user = get_user_by( 'email', $attendee_mail[0]->ATT_email );
	                			if($user->data->ID <= 0){
									$users_data = get_userdata($value['user_id']);
				                	$user_role = $users_data->roles;
				                	if($user_role[0] == 'VIP'){
										$vip_count++;
									}
			                	}
		                	}
		                	echo $vip_count;	
		                ?></td>
		                <td><?php echo $ticket_info[0]->TKT_sold - $vip_count; ?> </td>
		                <td><?php echo '$'.($ticket_info[0]->TKT_price * $ticket_info[0]->TKT_qty); ?> </td>
		                <td><?php echo '$'.($ticket_info[0]->TKT_price * $ticket_info[0]->TKT_qty); ?> </td>
		                <td><?php echo '$'.($ticket_info[0]->TKT_price * $vip_count); ?> </td>
		                <td><?php echo '$'.($ticket_info[0]->TKT_price * ($ticket_info[0]->TKT_sold - $vip_count)); ?> </td>
		                <td><?php echo '$'.(($ticket_info[0]->TKT_price * $ticket_info[0]->TKT_qty) - ($ticket_info[0]->TKT_price * $ticket_info[0]->TKT_sold)); ?></td>
		                <td><?php 
		                		if($ticket_info[0]->TKT_qty == 0){
		                			echo '0%';
		                		}else{
		                			echo intval(($ticket_info[0]->TKT_sold / $ticket_info[0]->TKT_qty) * 100).'%';
		                		}
		                ?></td>
		            </tr>
	 		<?php } 
		 		endforeach;
	    		endif; 
    		?>
            
        </tbody>
    </table>
    <?php 
}

function all_class_customer() {

	global $wpdb, $post;
    ?>
	<div class="wrap">

    <?php // get all simple products where stock is managed
 		

        $sql1 = "SELECT TXN_ID, ATT_ID, REG_date, EVT_ID, REG_final_price, TKT_ID, REG_ID ";
        $sql1 .= "FROM {$wpdb->prefix}esp_registration ";
        //$sql1 .= "WHERE REG_count = 1 AND STS_ID = %s";
        $sql1 .= "WHERE STS_ID = %s";
        
        
        $transactions = $wpdb->get_results( $wpdb->prepare( $sql1, 'RAP'));
	?>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function() {
	    jQuery('#income_report').DataTable({
	    	"scrollX": true,
	    	initComplete: function () {
	            this.api().columns([22]).every( function () {
	                var column = this;
	                var select = jQuery('<select><option value=""></option></select>')
	                    .appendTo( jQuery(column.footer()).empty() )
	                    .on( 'change', function () {
	                        var val = jQuery.fn.dataTable.util.escapeRegex(
	                            jQuery(this).val()
	                        );
	 
	                        column
	                            .search( val ? '^'+val+'$' : '', true, false )
	                            .draw();
	                    } );
	 
	                column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
	                    select.append( '<option value="'+d+'">'+d+'</option>' )
	                } );
	            } );
	        },
	    	dom: 'Bfrtip',
	        buttons: [ 'excel','print' ]
	    }
    	);
	} );
    </script>
    <table id="income_report" class="display" cellspacing="0" width="100%" data-order='[[ 0, "asc" ]]' data-page-length='25'>
        <thead>
            <tr>
                <th>Order No‎.‎</th>
                <th>First ‎Name‎</th>
                <th>Last ‎Name</th>
                <th>Compan‎y</th>
                <th>Gender</th>
                <th>DOB‎</th>
                <th>Email Address‎</th>
                <th>Phone‎</th>
                <th>Street Address‎</th>
                <th>Suburb‎</th>
                <th>State‎</th>
                <th>Country‎</th>
                <th>Post‎code‎</th>
                <th>Order Date‎</th>
                <th>Online Class‎</th>
                <th>News‎ Letter ‎Subscribe‎</th>
                <th>Registere‎d User‎</th>
                <th>Promo‎tional ‎Disc‎</th>
                <th>Promo‎tional ‎Code‎</th>
                <th>Gift ‎Vouche‎r</th>
                <th>Gift ‎Vouche‎r Code‎</th>
                <th>Payme‎nt ‎Status‎</th>
                <th>Class Name‎</th>
                <th>Class Categor‎y</th>
                <th>Cost‎</th>
                <th>Day‎s‎</th>
                <th>Start Date‎</th>
                <th>End ‎Date‎</th>
                <th>Week ‎No‎</th>
                <th>Month‎</th>
                <th>Yea‎r‎</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Order No‎.‎</th>
                <th>First ‎Name‎</th>
                <th>Last ‎Name</th>
                <th>Compan‎y</th>
                <th>Gender</th>
                <th>DOB‎</th>
                <th>Email Address‎</th>
                <th>Phone‎</th>
                <th>Street Address‎</th>
                <th>Suburb‎</th>
                <th>State‎</th>
                <th>Country‎</th>
                <th>Postcode‎</th>
                <th>Order Date‎</th>
                <th>Online Class‎</th>
                <th>News‎ Letter ‎Subscribe‎</th>
                <th>Registere‎d User‎</th>
                <th>Promo‎tional ‎Disc‎</th>
                <th>Promo‎tional ‎Code‎</th>
                <th>Gift ‎Vouche‎r</th>
                <th>Gift ‎Vouche‎r Code‎</th>
                <th>Payme‎nt ‎Status‎</th>
                <th>Class Name‎</th>
                <th>Class Categor‎y</th>
                <th>Cost‎</th>
                <th>Day‎s‎</th>
                <th>Start Date‎</th>
                <th>End ‎Date‎</th>
                <th>Week ‎No‎</th>
                <th>Month‎</th>
                <th>Yea‎r‎</th>
            </tr>
        </tfoot>
        <tbody>
        <?php if ($transactions): 
      
	 		 foreach($transactions as $transaction){ ?>
	 			<?php
	 			
	 				$sql = "SELECT DTT_ID ";
			        $sql .= "FROM {$wpdb->prefix}esp_datetime_ticket ";
			        $sql .= "WHERE TKT_ID = %d";			

			        $ticket = $wpdb->get_results( $wpdb->prepare( $sql, $transaction->TKT_ID ));
			        
			        $sql = "SELECT DTT_EVT_start, DTT_EVT_end ";
			        $sql .= "FROM {$wpdb->prefix}esp_datetime ";
			        $sql .= "WHERE DTT_ID = %d";			

			        $evet_time = $wpdb->get_results( $wpdb->prepare( $sql, $ticket[0]->DTT_ID ));

			 		$day_diff = dateDifference($evet_time[0]->DTT_EVT_start, $evet_time[0]->DTT_EVT_end) + 1;
			 		$ddate = date('Y-m-d', strtotime($evet_time[0]->DTT_EVT_start));
			 		$month = date('F', strtotime($ddate));
			 		$year = date('Y', strtotime($ddate));
			 		$date = new DateTime($ddate);
					$week = $date->format("W");

	 				$sql = "SELECT * ";
			        $sql .= "FROM {$wpdb->prefix}esp_attendee_meta ";
			        $sql .= "WHERE {$wpdb->prefix}esp_attendee_meta.ATT_ID = %d";			

			        $attendees = $wpdb->get_results( $wpdb->prepare( $sql, $transaction->ATT_ID ));
			        $terms = get_the_terms( $transaction->EVT_ID, 'espresso_event_categories');
					$class_cat = array();
				 	if ( ! empty( $terms ) ) {
				 		foreach ( $terms as $term ) {
			                $class_cat[] = $term->name ;
			            }
			 		}

			 		$sql = "SELECT STS_ID ";
			        $sql .= "FROM {$wpdb->prefix}esp_transaction ";
			        $sql .= "WHERE TXN_ID = %d";			

			        $trans_status = $wpdb->get_results( $wpdb->prepare( $sql, $transaction->TXN_ID ));
			        if($trans_status[0]->STS_ID == 'TCM'){
			        	$status= 'Complete';
			        }elseif($trans_status[0]->STS_ID == 'TFL'){
			        	$status= 'Fail';
			        }elseif($trans_status[0]->STS_ID == 'TIN'){
			        	$status= 'Incomplete';
			        }

			        $sql = "SELECT CNT_name ";
			        $sql .= "FROM {$wpdb->prefix}esp_country ";
			        $sql .= "WHERE CNT_ISO = %s";			

			        $eve_country = $wpdb->get_results( $wpdb->prepare( $sql, $attendees[0]->CNT_ISO ));

			        $sql = "SELECT STA_name ";
			        $sql .= "FROM {$wpdb->prefix}esp_state ";
			        $sql .= "WHERE STA_ID = %d";			

			        $eve_state = $wpdb->get_results( $wpdb->prepare( $sql, $attendees[0]->STA_ID ));

			        $sql = "SELECT QST_ID, ANS_value ";
			        $sql .= "FROM {$wpdb->prefix}esp_answer ";
			        $sql .= "WHERE REG_ID = %d";			

			        $extra_info = $wpdb->get_results( $wpdb->prepare( $sql, $transaction->REG_ID ));
			        foreach($extra_info as $key => $value){
			        	if($value->QST_ID == 11){
			        		$company_name = $value->ANS_value;
			        	}elseif($value->QST_ID == 12){
			        		$gender = $value->ANS_value;
			        	}elseif($value->QST_ID == 13){
			        		$dob = $value->ANS_value;
			        	}
			        }

			        $sql = "SELECT LIN_name ";
			        $sql .= "FROM {$wpdb->prefix}esp_line_item ";
			        $sql .= "WHERE OBJ_TYPE = 'Promotion' AND TXN_ID = %d";			

			        $promo_info = $wpdb->get_results( $wpdb->prepare( $sql, $transaction->TXN_ID ));		

			        
	 			?>
	 			<tr>
	                <td><?php echo $transaction->TXN_ID; ?></td>
	                <td><?php echo $attendees[0]->ATT_fname; ?></td>
	                <td><?php echo $attendees[0]->ATT_lname; ?></td>
	                <td><?php echo $company_name; ?></td>
	                <td><?php echo $gender; ?></td>
	                <td><?php echo $dob; ?></td>
	                <td><?php echo $attendees[0]->ATT_email; ?></td>
	                <td><?php echo $attendees[0]->ATT_phone; ?></td>
	                <td><?php echo $attendees[0]->ATT_address; ?></td>
	                <td><?php echo $attendees[0]->ATT_city; ?></td>
	                <td><?php echo $eve_state[0]->STA_name; ?></td>
	                <td><?php echo $eve_country[0]->CNT_name; ?></td>
	                <td><?php echo $attendees[0]->ATT_zip; ?></td>
	                <td><?php echo date('d/m/Y',strtotime($transaction->REG_date)); ?></td>
	                <td></td>
	                <td></td>
	                <td><?php 
	                	$user = get_user_by( 'email', $attendees[0]->ATT_email );
	                if($user->data->ID <= 0){
	                	echo "N";
	                }else{
	                	echo "Y";
	                } ?></td>
	                <td><?php 
	                if($promo_info[0]->LIN_name){
	                	echo "Y";
	                }else{
	                	echo "N";
	                } ?></td>
	                <td><?php echo $promo_info[0]->LIN_name; ?></td>
	                <td></td>
	                <td></td>
	                <td><?php echo $status; ?></td>
	                <td><?php echo get_the_title($transaction->EVT_ID); ?></td>
	                <td><?php echo implode(', ', $class_cat); ?></td>
	                <td><?php echo '$'.$transaction->REG_final_price; ?></td>
	                <td><?php echo $day_diff; ?></td>
	                <td><?php echo date('d/m/Y', strtotime($evet_time[0]->DTT_EVT_start)); ?></td>
                 	<td><?php echo date('d/m/Y', strtotime($evet_time[0]->DTT_EVT_end)); ?></td>
	                <td><?php echo $week; ?></td>
	                <td><?php echo $month; ?></td>
	                <td><?php echo $year; ?></td>
	            </tr>
	            <?php } ?>
	 		<?php endif; ?>
            
        </tbody>
    </table>
    <?php 
}

function best_customer_product() {
	?>
	<div class="wrap">

    <?php // get all simple products where stock is managed
    	global $wpdb;
		global $post;


		$pageposts = get_users();
		
	?>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function() {
	    jQuery('#income_report').DataTable({
	    	"scrollX": true,
	    	responsive: true,
	    	initComplete: function () {
	            this.api().columns([22]).every( function () {
	                var column = this;
	                var select = jQuery('<select><option value=""></option></select>')
	                    .appendTo( jQuery(column.footer()).empty() )
	                    .on( 'change', function () {
	                        var val = jQuery.fn.dataTable.util.escapeRegex(
	                            jQuery(this).val()
	                        );
	 
	                        column
	                            .search( val ? '^'+val+'$' : '', true, false )
	                            .draw();
	                    } );
	 
	                column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
	                    select.append( '<option value="'+d+'">'+d+'</option>' )
	                } );
	            } );
	        },
	    	dom: 'Bfrtip',
	        buttons: [ 'excel','print' ]
	    }
    	);
	} );
    </script>
    <table id="income_report" class="display" cellspacing="0" width="100%" data-order='[[ 14, "desc" ]]' data-page-length='25'>
        <thead>
            <tr>
                <th>First ‎Name‎</th>
                <th>Last ‎Name</th>
                <th>Compan‎y</th>
                <th>Gender</th>
                <th>DOB‎</th>
                <th>Email Address‎</th>
                <th>Street Address‎</th>
                <th>Suburb‎</th>
                <th>State‎</th>
                <th>Country‎</th>
                <th>Post‎code‎</th>
                <th>Online Class‎</th>
                <th>News‎ Letter ‎Subscribe‎</th>
                <th>Registere‎d User‎</th>
                <th>Amount Spent</th>
                <th>Most Purchased</th>
                <th>Most Purchased Category</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
              	<th>First ‎Name‎</th>
                <th>Last ‎Name</th>
                <th>Compan‎y</th>
                <th>Gender</th>
                <th>DOB‎</th>
                <th>Email Address‎</th>
                <th>Street Address‎</th>
                <th>Suburb‎</th>
                <th>State‎</th>
                <th>Country‎</th>
                <th>Post‎code‎</th>
                <th>Online Class‎</th>
                <th>News‎ Letter ‎Subscribe‎</th>
                <th>Registere‎d User‎</th>
                <th>Amount Spent</th>
                <th>Most Purchased</th>
                <th>Most Purchased Category</th>
            </tr>
        </tfoot>
        <tbody>
        <?php if ($pageposts): 
	 		foreach ($pageposts as $key => $value):
	 
	 				$user_id = $value->data->ID;
 					$total_spent = wc_get_customer_total_spent($user_id);
 					//print_r(get_user_meta($user_id));
 					//exit();
					if($total_spent > 0 ){
						$news = get_field('newsletter_subscription', 'user_'. $user_id );

							$customer_orders = get_posts(array(
                                'numberposts' => -1,
                                'meta_key'    => '_customer_user',
                                'meta_value'  => $user_id,
                                'post_type'   => 'shop_order',
                                'post_status' => array_keys(wc_get_order_statuses() ),
                            ));
                            $loop = new WP_Query($customer_orders);
                            foreach ($customer_orders as $orderItem){
                                $order = wc_get_order($orderItem->ID);

                                foreach ($order->get_items() as $key => $lineItem) {
                                  
                                    $product_arr[] = $lineItem['item_meta']['_product_id'][0];
                                    $product_qty[] = $lineItem['item_meta']['_qty'][0];
                                   
                                }
                               
                            }
                            
                             $heavy_purch = array();
                             foreach ($product_arr as $key => $value) {
                             	if (array_key_exists($value,$heavy_purch))  
								{  
									$heavy_purch[$value] = $heavy_purch[$value] + $product_qty[$key];
								}  
								else  
								{  
									$heavy_purch[$value] = $product_qty[$key];
								}  
                             	
                             }
                            $maxs = array_keys($heavy_purch, max($heavy_purch));
                            $terms = get_the_terms( $maxs[0], 'product_cat' );
                            if($terms){
								foreach ($terms as $term) {
								    $product_cat_id = $term->term_id;
								    
								    $product_cat = get_term_by('id', $product_cat_id, 'product_cat');
								    break;
								}
							}
	 			?>
	 			<tr>
	                <td><?php echo get_user_meta( $user_id, 'billing_first_name', true ); ?></td>
	                <td><?php echo get_user_meta( $user_id, 'billing_last_name', true ); ?></td>
	                <td><?php echo get_user_meta( $user_id, 'billing_company', true ); ?></td>
	                <td><?php if(get_field('date_of_birth', 'user_'. $user_id )){echo date("F j, Y", strtotime(get_field('date_of_birth', 'user_'. $user_id ))); } ?></td>
	                <td><?php echo get_field('gender', 'user_'. $user_id ); ?></td>
	                <td><?php echo get_user_meta( $user_id, 'billing_email', true ); ?></td>
	                <td><?php echo get_user_meta( $user_id, 'billing_address_1', true ); ?></td>
	                <td><?php echo get_user_meta( $user_id, 'billing_city', true ); ?></td>
	                <td><?php echo WC()->countries->states[ get_user_meta( $user_id, 'billing_country', true )][ get_user_meta( $user_id, 'billing_state', true )]; ?></td>
	                <td><?php echo WC()->countries->countries[ get_user_meta( $user_id, 'billing_country', true ) ]; ?></td>
	                <td><?php echo get_user_meta( $user_id, 'billing_postcode', true ); ?></td>
	                <td></td>
	                <td><?php if(empty($news[0])) {
	                	echo "N";
	                }else{
	                	echo "Y";
	                } ?></td>
	                <td><?php if($user_id <= 0){
	                	echo "N";
	                }else{
	                	echo "Y";
	                } ?></td>
	                <td><?php echo  wc_price(wc_get_customer_total_spent($user_id)); ?></td>
	                <td><?php echo get_the_title($maxs[0]); ?></td>
	                <td><?php echo $product_cat->name; ?></td>
	            </tr>
	            <?php } ?>
	 		<?php endforeach;
    	endif; ?>
            
        </tbody>
    </table>
    <?php 
}


function stock_level_report() {
	?>
	<div class="wrap">

    <?php // get all simple products where stock is managed
    	global $wpdb;
		global $post;
		$querystr = "
	    SELECT $wpdb->posts.* 
	    FROM $wpdb->posts, $wpdb->postmeta
	    WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id 
	    AND $wpdb->posts.post_status = 'publish' 
	    AND $wpdb->posts.post_type = 'product'
	    AND $wpdb->postmeta.meta_key = '_virtual'
	    AND $wpdb->postmeta.meta_value = 'no'
	    ORDER BY $wpdb->posts.ID DESC
	 	";
		$pageposts = $wpdb->get_results($querystr, OBJECT); 
	?>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function() {
	    jQuery('#income_report').DataTable({
	    	"scrollX": true,
	    	initComplete: function () {
	            this.api().columns([1]).every( function () {
	                var column = this;
	                var select = jQuery('<select><option value=""></option></select>')
	                    .appendTo( jQuery(column.footer()).empty() )
	                    .on( 'change', function () {
	                        var val = jQuery.fn.dataTable.util.escapeRegex(
	                            jQuery(this).val()
	                        );
	 
	                        column
	                            .search( val ? '^'+val+'$' : '', true, false )
	                            .draw();
	                    } );
	 
	                column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
	                    select.append( '<option value="'+d+'">'+d+'</option>' )
	                } );
	            } );
	        },
	    	dom: 'Bfrtip',
	        buttons: [ 'excel','print' ]
	    }
    	);
	} );
    </script>
    <table id="income_report" class="display" cellspacing="0" width="100%" data-order='[[ 1, "asc" ]]' data-page-length='25'>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Category Name</th>
                <th>Stock Level</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Product Name</th>
                <th>Category Name</th>
                <th>Stock Level</th>
            </tr>
        </tfoot>
        <tbody>
        <?php if ($pageposts): 
	 		foreach ($pageposts as $post): ?>
	 			<?php 
	 				$product_id = get_the_ID(); 
	 				$terms = get_the_terms( $product_id, 'product_cat');
					$product_cat = array();
				 	if ( ! empty( $terms ) ) {
				 		foreach ( $terms as $term ) {
			                $product_cat[] = $term->name ;
			            }
			 		}
	 			?>
	 			<tr>
	                <td><?php echo get_the_title(); ?></td>
	                <td><?php echo implode(', ', $product_cat); ?></td>
	                <td><?php echo floor(get_post_meta($product_id, '_stock', 'true')); ?></td>
	            </tr>
	 		<?php endforeach;
    	endif; ?>
            
        </tbody>
    </table>
    <?php 
}
function product_notification_report() {
	?>
	<div class="wrap">

    <?php // get all simple products where stock is managed
    	global $wpdb;
		global $post;
		$querystr = "
	    SELECT $wpdb->posts.* 
	    FROM $wpdb->posts, $wpdb->postmeta
	    WHERE $wpdb->posts.ID = $wpdb->postmeta.post_id 
	    AND $wpdb->posts.post_status = 'publish' 
	    AND $wpdb->posts.post_type = 'product'
	    AND $wpdb->postmeta.meta_key = '_virtual'
	    AND $wpdb->postmeta.meta_value = 'no'
	    ORDER BY $wpdb->posts.ID DESC
	 	";
		$pageposts = $wpdb->get_results($querystr, OBJECT); 
	?>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function() {
	    jQuery('#income_report').DataTable({
	    	"scrollX": true,
	    	initComplete: function () {
	            this.api().columns([1]).every( function () {
	                var column = this;
	                var select = jQuery('<select><option value=""></option></select>')
	                    .appendTo( jQuery(column.footer()).empty() )
	                    .on( 'change', function () {
	                        var val = jQuery.fn.dataTable.util.escapeRegex(
	                            jQuery(this).val()
	                        );
	 
	                        column
	                            .search( val ? '^'+val+'$' : '', true, false )
	                            .draw();
	                    } );
	 
	                column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
	                    select.append( '<option value="'+d+'">'+d+'</option>' )
	                } );
	            } );
	        },
	    	dom: 'Bfrtip',
	        buttons: [ 'excel','print' ]
	    }
    	);
	} );
    </script>
    <table id="income_report" class="display" cellspacing="0" width="100%" data-order='[[ 1, "asc" ]]' data-page-length='25'>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Paramete‎r Name‎</th>
                <th>Category Name</th>
                <th>Date ‎Added‎</th>
                <th>First ‎Name‎</th>
                <th>Last ‎Name</th>
                <th>Email Address‎</th>
                <th>Phone‎</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Product Name</th>
                <th>Paramete‎r Name‎</th>
                <th>Category Name</th>
                <th>Date ‎Added‎</th>
                <th>First ‎Name‎</th>
                <th>Last ‎Name</th>
                <th>Email Address‎</th>
                <th>Phone‎</th>
            </tr>
        </tfoot>
        <tbody>
        <?php if ($pageposts): 
	 		foreach ($pageposts as $post): ?>
	 			<?php 
	 				$product_id = get_the_ID(); 
	 				$terms = get_the_terms( $product_id, 'product_cat');
					$product_cat = array();
				 	if ( ! empty( $terms ) ) {
				 		foreach ( $terms as $term ) {
			                $product_cat[] = $term->name ;
			            }
			 		}
	 			?>
	 			<tr>
	                <td><?php echo get_the_title(); ?></td>
	                <td><?php echo implode(', ', $product_cat); ?></td>
	                <td><?php echo floor(get_post_meta($product_id, '_stock', 'true')); ?></td>
	            </tr>
	 		<?php endforeach;
    	endif; ?>
            
        </tbody>
    </table>
    <?php 
}

function student_name_label_report() {
	?>
	<div class="wrap">

    <?php // get all registrations
    	global $wpdb, $post;
    	$sql1 = "SELECT EVT_ID, ATT_ID, TKT_ID ";
        $sql1 .= "FROM {$wpdb->prefix}esp_registration ";
        $sql1 .= "WHERE STS_ID = %s";
        
        
        $transactions = $wpdb->get_results( $wpdb->prepare( $sql1, 'RAP'));
	?>
    </div>
    <script type="text/javascript">
    jQuery(document).ready(function() {
	    jQuery('#income_report').DataTable({
	    	"scrollX": true,
	    	initComplete: function () {
	            this.api().columns([1, 2]).every( function () {
	                var column = this;
	                var select = jQuery('<select><option value=""></option></select>')
	                    .appendTo( jQuery(column.footer()).empty() )
	                    .on( 'change', function () {
	                        var val = jQuery.fn.dataTable.util.escapeRegex(
	                            jQuery(this).val()
	                        );
	 
	                        column
	                            .search( val ? '^'+val+'$' : '', true, false )
	                            .draw();
	                    } );
	 
	                column.cells('', column[0]).render('display').sort().unique().each( function ( d, j ) {
	                    select.append( '<option value="'+d+'">'+d+'</option>' )
	                } );
	            } );
	        },
	    	dom: 'Bfrtip',
	        buttons: [ {
	           	extend: 'excel',
	           	footer: false,
	           	exportOptions: {
	                columns: [0]
            	}
	       },
	       {
	           	extend: 'print',
	           	footer: false,
	           	exportOptions: {
	                columns: [0]
            	}
	       }
	       ]
	    }
    	);
	} );
    </script>
    <table id="income_report" class="display" cellspacing="0" width="100%" data-order='[[ 1, "desc" ]]' data-page-length='50'>
        <thead>
            <tr>
            	<th>Student Name</th>
                <th>Class Details</th>
                <th>Class Date</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Student Name</th>
                <th>Class Details</th>
                <th>Class Date</th>
            </tr>
        </tfoot>
        <tbody>
        <?php if ($transactions): 
	 		foreach ($transactions as $transaction): ?>
	 			<?php 
 					$sql = "SELECT * ";
			        $sql .= "FROM {$wpdb->prefix}esp_attendee_meta ";
			        $sql .= "WHERE {$wpdb->prefix}esp_attendee_meta.ATT_ID = %d";			

			        $attendees = $wpdb->get_results( $wpdb->prepare( $sql, $transaction->ATT_ID ));

			        $sql = "SELECT DTT_ID ";
			        $sql .= "FROM {$wpdb->prefix}esp_datetime_ticket ";
			        $sql .= "WHERE TKT_ID = %d";			

			        $ticket = $wpdb->get_results( $wpdb->prepare( $sql, $transaction->TKT_ID ));
			        
			        $sql = "SELECT DTT_EVT_start, DTT_EVT_end ";
			        $sql .= "FROM {$wpdb->prefix}esp_datetime ";
			        $sql .= "WHERE DTT_ID = %d";			

			        $evet_time = $wpdb->get_results( $wpdb->prepare( $sql, $ticket[0]->DTT_ID ));
                    ?>
                	<tr>
	                	<td><?php echo $attendees[0]->ATT_fname; ?> <?php echo $attendees[0]->ATT_lname; ?></td>
	                	<td><?php echo get_the_title($transaction->EVT_ID); ?></td>
	                	 <td><?php echo date('d/m/Y', strtotime($evet_time[0]->DTT_EVT_start)); ?> to <?php echo date('d/m/Y', strtotime($evet_time[0]->DTT_EVT_end)); ?></td>
	                </tr>
                <?php endforeach;
    		endif; ?>
        </tbody>
    </table>
    <?php 
}

function dateDifference($date_1 , $date_2 , $differenceFormat = '%a' )
{
    $datetime1 = date('Y-m-d', strtotime($date_1));
    $datetime1 = strtotime($datetime1);
    $datetime2 = date('Y-m-d', strtotime($date_2));
    $datetime2 = strtotime($datetime2);
    $datediff = $datetime2 - $datetime1;
    $interval = ceil($datediff / (60 * 60 * 24));
    
    return $interval;
    
}

add_filter( 'manage_edit-shop_coupon_columns', 'add_total_column', 99 );
add_action( 'manage_shop_coupon_posts_custom_column', 'content_total_column', 99, 2 );


function add_total_column( $defaults )
{
	$defaults[ 'coupon_total' ] = apply_filters( 'wcum_total_column_title', 'Total Used' );
	$defaults[ 'coupon_minimum' ] = apply_filters( 'wcum_minimum_column_title', 'Minimum Amount' );
	return $defaults;
}

function content_total_column( $column_name, $post_ID )
{
	if( $column_name == 'coupon_total' )
	{
		$total = get_post_meta( $post_ID, 'usage_count', true );
		echo apply_filters( 'wcum_total_column_content', $total, $post_ID );
	}
	if( $column_name == 'coupon_minimum' )
	{
		$total1 = get_post_meta( $post_ID, 'minimum_amount', true );
		echo apply_filters( 'wcum_minimum_column_content', $total1, $post_ID );
	}
}

add_filter( 'wcwl_persistent_waitlists_are_disabled', '__return_false' );	

function add_featured_galleries_to_ctp( $post_types ) {
    array_push($post_types, 'espresso_events'); // ($post_types comes in as array('post','page'). If you don't want FGs on those, you can just return a custom array instead of adding to it. )
    return $post_types;
}
add_filter('fg_post_types', 'add_featured_galleries_to_ctp' );

// Set custom image size for home page product
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'isotope-thumb', 270 ); // 300 pixels wide (and unlimited height)
    add_image_size( 'cat-video-thumb', 172, 97, true );
    add_image_size( 'blog-thumb', 750, 390, true );
}

add_action('wp_footer','pluginname_ajaxurl');
function pluginname_ajaxurl() {
?>
	<script type="text/javascript">
	var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
	</script>
<?php
}

//* Adjust register now button text in Event Espresso 4
add_filter ('FHEE__EE_Ticket_Selector__display_ticket_selector_submit__btn_text', 'ee_register_now_button');

function ee_register_now_button() {
 return 'BOOK NOW';
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'loop_columns');
if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 3; // 3 products per row
	}
}

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 20;' ), 20 );

add_filter( 'woocommerce_pagination_args', 	'rocket_woo_pagination' );
function rocket_woo_pagination( $args ) {
	$args['prev_text'] = 'Previous Page';
	$args['next_text'] = 'Next Page';
	return $args;
}

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title_wrapper', 0 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title_wrapper_end', 15 );


add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_wrapper', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 20 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 25 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_wrapper_end', 35 );

// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_cart_wrapper', 30 );
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_cart_wrapper_end', 40 );

// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
// add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );


remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'woocommerce_after_single_product_summary', 'woocommerce_single_page_related_products', 20 );


function woocommerce_template_single_title_wrapper() {
	echo '<div class="title_wrapper">';
}

function woocommerce_template_single_title_wrapper_end() {
	echo '</div>';
}

function woocommerce_template_single_wrapper() {
	echo '<div class="price_add_to_cart_wrapper">';
}

function woocommerce_template_single_wrapper_end() {
	echo '</div>';
}


if ( ! function_exists( 'woocommerce_single_page_related_products' ) ) {

	/**
	 * Output the related products.
	 *
	 * @subpackage	Product
	 */
	function woocommerce_single_page_related_products() {

		$args = array(
			'posts_per_page' 	=> 2,
			'columns' 			=> 2,
			'orderby' 			=> 'rand',
		);

		woocommerce_related_products( apply_filters( 'woocommerce_output_related_products_args', $args ) );
	}
}

add_filter( 
  'FHEE__ticket_selector_chart_template__table_header_qty',
  function(){ return 'No. of Persons'; }
);

 function placeholder_comment_form_field($fields) {
    $replace_comment = __('Start typing...', 'yourdomain');
     
    $fields['comment_field'] = '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" placeholder="'.$replace_comment.'" aria-required="true"></textarea></p>';
    
    return $fields;
 }
add_filter( 'comment_form_defaults', 'placeholder_comment_form_field' );

function placeholder_author_email_url_form_fields($fields) {
    $replace_author = __('Name', 'yourdomain');
    $replace_email = __('Email', 'yourdomain');
    $replace_url = __('Website', 'yourdomain');
    
    $fields['author'] = '<p class="comment-form-author">' . ( $req ? '<span class="required">*</span>' : '' ) .
                    '<input id="author" name="author" type="text" placeholder="'.$replace_author.'" value="' . esc_attr( $commenter['comment_author'] ) . '" size="20"' . $aria_req . ' /></p>';
                    
    $fields['email'] = '<p class="comment-form-email">' .
    ( $req ? '<span class="required">*</span>' : '' ) .
    '<input id="email" name="email" type="text" placeholder="'.$replace_email.'" value="' . esc_attr(  $commenter['comment_author_email'] ) .
    '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url">' .
    '<input id="url" name="url" type="text" placeholder="'.$replace_url.'" value="' . esc_attr( $commenter['comment_author_url'] ) .
    '" size="30" /></p>';
    
    return $fields;
}
add_filter('comment_form_default_fields','placeholder_author_email_url_form_fields');


// Career Post type

// Register Custom Post Type
function career_post_type() {

	$labels = array(
		'name'                  => _x( 'Careers', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Career', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Careers', 'text_domain' ),
		'name_admin_bar'        => __( 'Career', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Career', 'text_domain' ),
		'description'           => __( 'Post Type Description', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions', ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'career', $args );

}
add_action( 'init', 'career_post_type', 0 );

add_filter('woocommerce_login_redirect', 'pro_login_redirect');

function pro_login_redirect( $redirect_to ) {
	$redirect_to = site_url().'/account-user/';
	return $redirect_to;
}

add_filter('show_admin_bar', '__return_false');
