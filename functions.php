<?php
/**
 * curbcollege functions and definitions
 *
 * @package curbcollege
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 1100; /* pixels */

if ( ! function_exists( 'curbcollege_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function curbcollege_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on curbcollege, use a find and replace
	 * to change 'curbcollege' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'curbcollege', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	/*register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'curbcollege' ),
	) );*/

	/**
	 * Enable support for Post Formats
	 */
	//add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Enable support for Featured Images
	 */
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 300, 200, TRUE );

	if ( function_exists( 'add_image_size' ) ) { 
		add_image_size( 'home_thumb', 300, 200, TRUE );
	}

	/**
	 * Setup the WordPress core custom background feature.
	 */
	/*add_theme_support( 'custom-background', apply_filters( 'curbcollege_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );*/
}
endif; // curbcollege_setup
add_action( 'after_setup_theme', 'curbcollege_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function curbcollege_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'curbcollege' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'curbcollege_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function curbcollege_scripts() {
	wp_enqueue_style( 'curbcollege-style', get_stylesheet_uri() );

/*	wp_enqueue_script( 'curbcollege-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );*/

	wp_enqueue_script( 'curbcollege-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'curbcollege-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'curbcollege_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

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
 * Social Menus
 */
add_action( 'init', 'my_register_nav_menus' );

function my_register_nav_menus() {

	register_nav_menu( 'social', __( 'Social', 'curbcollege' ) );

}



/**
 * Customize footer
 */
function custom_footer_left() {

	get_template_part( 'menu', 'social' );

} // End of custom_footer_left()
add_action( 'footer_left', 'custom_footer_left' );

function custom_site_info() {

	printf( __( '<small class="copyright">All content &copy %1$s <a href="%2$s" title="Login">Belmont University</a> - All Rights Reserved<br />Mike Curb College of Entertainment and Music Business</small>', 'curbcollege' ), date( 'Y' ), get_admin_url() );

} // End of custom_site_info()
add_action( 'site_info', 'custom_site_info' );

function slushman_credits() {

	printf( __( '<a href="http://%1$s.com" class="%1$s" rel="designer" >%2$s</a>', 'curbcollege' ), 'slushman', 'Slushman' );

} // End of slushman_credits()
add_action( 'site_credits', 'slushman_credits' );



/**
 * Customize login page
 */
function curbcollege_login() { ?>
    <style type="text/css">
    	body.login {
    		background: #383737;
    	}
    	body.login div#login {
    		padding-top: 4%;
    	}
        body.login div#login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/vertical_logo.png);
            background-size: 200px 200px;
            height: 200px;
            width: 200px;
            padding-bottom: 30px;
        }
        body.login .button-primary {
        	background: #c9262d;
        	border-color: #b0151c;
        }
        body.login .button-primary:hover {
        	background: #b0151c;
        	border-color: #c9262d;
        }
        .login #nav a, 
        .login #backtoblog a {
        	color: #ffffff;
        }
        .login #nav a:hover, 
        .login #backtoblog a:hover {
        	color: #b0151c;
        }
    </style>
<?php } // End of curbcollege_login()
add_action( 'login_enqueue_scripts', 'curbcollege_login' );
