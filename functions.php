<?php
/**
 * fastwp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fastwp
 */

if ( ! defined('ABSPATH') ) {
    exit; // Exit if accessed directly.
}

if ( ! defined( 'FASTWP_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'FASTWP_VERSION', '1.0.3' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function fastwp_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on fastwp, use a find and replace
		* to change 'fastwp' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'fastwp', get_template_directory() . '/languages' );

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
		'primary_menu' => __( 'Primary Menu', 'fastwp' ),
	) );
	

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'fastwp_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'fastwp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fastwp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'fastwp_content_width', 640 );
}
add_action( 'after_setup_theme', 'fastwp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fastwp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'fastwp' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'fastwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'fastwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fastwp_custom_scripts() {
	// Google Fonts
	wp_enqueue_style( 'fastwp-google-fonts', 'https://fonts.googleapis.com/css2?family=Hind:wght@300;400;500;600;700&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap', array(), FASTWP_VERSION );

	// revolution slider
	wp_enqueue_style( 'fastwp-revolution-slider', get_template_directory_uri().'/themefile/assets/revolution/css/settings.css', array(), FASTWP_VERSION );
	// Library CSS
	wp_enqueue_style( 'fastwp-library', get_template_directory_uri().'/themefile/assets/css/lib.css', array(), FASTWP_VERSION );
	// rtl CSS
	wp_enqueue_style( 'fastwp-rtl', get_template_directory_uri().'/themefile/assets/css/rtl.css', array(), FASTWP_VERSION );
	wp_style_add_data( 'practice-style', 'rtl', 'replace' );
	wp_enqueue_style( 'fastwp-style', get_stylesheet_uri(), array(), FASTWP_VERSION );

	// keyboard control js
	wp_enqueue_script( 'fastwp-menu-navigation', get_template_directory_uri() . '/themefile/assets/js/navigation.js', array('jquery'), FASTWP_VERSION, true );

	// popper
	wp_enqueue_script( 'fastwp-propperjs', get_template_directory_uri() . '/themefile/assets/js/popper.min.js', array('jquery'), FASTWP_VERSION, true );
	// lib
	wp_enqueue_script( 'fastwp-libjs', get_template_directory_uri() . '/themefile/assets/js/lib.js', array('jquery'), FASTWP_VERSION, true );

	// slider
	wp_enqueue_script( 'fastwp-tools', get_template_directory_uri() . '/themefile/assets/revolution/js/jquery.themepunch.tools.min.js', array('jquery'), FASTWP_VERSION, true );
	wp_enqueue_script( 'fastwp-themepunch', get_template_directory_uri() . '/themefile/assets/revolution/js/jquery.themepunch.revolution.min.js', array('jquery'), FASTWP_VERSION, true );
	// revolution
	wp_enqueue_script( 'fastwp-action', get_template_directory_uri() . '/themefile/assets/revolution/js/extensions/revolution.extension.actions.min.js', array('jquery'), FASTWP_VERSION, true );
	wp_enqueue_script( 'fastwp-carousel', get_template_directory_uri() . '/themefile/assets/revolution/js/extensions/revolution.extension.carousel.min.js', array('jquery'), FASTWP_VERSION, true );
	wp_enqueue_script( 'fastwp-kenburn', get_template_directory_uri() . '/themefile/assets/revolution/js/extensions/revolution.extension.kenburn.min.js', array('jquery'), FASTWP_VERSION, true );
	wp_enqueue_script( 'fastwp-layeranimation', get_template_directory_uri() . '/themefile/assets/revolution/js/extensions/revolution.extension.layeranimation.min.js', array('jquery'), FASTWP_VERSION, true );
	wp_enqueue_script( 'fastwp-migration', get_template_directory_uri() . '/themefile/assets/revolution/js/extensions/revolution.extension.migration.min.js', array('jquery'), FASTWP_VERSION, true );
	wp_enqueue_script( 'fastwp-navigation', get_template_directory_uri() . '/themefile/assets/revolution/js/extensions/revolution.extension.navigation.min.js', array('jquery'), FASTWP_VERSION, true );
	wp_enqueue_script( 'fastwp-slideanims', get_template_directory_uri() . '/themefile/assets/revolution/js/extensions/revolution.extension.slideanims.min.js', array('jquery'), FASTWP_VERSION, true );
	wp_enqueue_script( 'fastwp-video', get_template_directory_uri() . '/themefile/assets/revolution/js/extensions/revolution.extension.video.min.js', array('jquery'), FASTWP_VERSION, true );
	wp_enqueue_script( 'fastwp-main-function', get_template_directory_uri() . '/themefile/assets/js/functions.js', array('jquery'), FASTWP_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fastwp_custom_scripts' );

/**
 * Slider Action
 */
function fastwp_slider_funcation(){
	require get_template_directory() . '/inc/slider.php';
}
add_action('fastwp_slider', 'fastwp_slider_funcation');

/**
 * Nav Walker Class
 */
require get_template_directory() . '/inc/classes/Fastwp_Nav_Walker.php';

/**
 * Comment List Design
 */
require get_template_directory() . '/inc/classes/Fastwp_CommentHelp.php';

/**
 * Customization
 */
require get_template_directory() . '/inc/customization/kirki.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Required plugins
 */
require get_template_directory() . '/inc/required-plugins.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Add Class Children Nav Link
 */
function fastwp_add_menu_link_class($atts, $item, $args)
{	
	$fastwp_hasChildren = (in_array('menu-item-has-children', $item->classes));
		
	if ($fastwp_hasChildren) {
   		$atts['class'] = 'nav-link dropdown-toggle'; 
   	}else{
   		$atts['class'] = 'nav-link';
   	}	
			
    
    return $atts;
}
add_filter('nav_menu_link_attributes', 'fastwp_add_menu_link_class', 1, 3);





