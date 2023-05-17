<?php
/**
 * project-nc functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package project-nc
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function project_nc_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on project-nc, use a find and replace
		* to change 'project-nc' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'project-nc', get_template_directory() . '/languages' );

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

	// added by Makiko :Our custom image crop sizes 
	add_image_size('portrait-blog',400,200,array( 'left', 'top' ));

	// This theme uses wp_nav_menu() in one location.
	// register_nav_menus(
	// 	array(
	// 		'menu-1' => esc_html__( 'Primary', 'project-nc' ),
	// 	)
	// );

	register_nav_menus(
		array(
			'header' => esc_html__( 'Header Menu Location', 'project-nc' ),
			'footer-top' => esc_html__('Footer - top','project-nc'),
			'footer-bottom' => esc_html__('Footer - bottom','project-nc'),
		)
	);

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
			'project_nc_custom_background_args',
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
add_action( 'after_setup_theme', 'project_nc_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function project_nc_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'project_nc_content_width', 640 );
}
add_action( 'after_setup_theme', 'project_nc_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function project_nc_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'project-nc' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'project-nc' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'project_nc_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function project_nc_scripts() {
	wp_enqueue_style( 'project-nc-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'project-nc-style', 'rtl', 'replace' );

	wp_enqueue_script( 'project-nc-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	/* Added by Makiko Ono:start 
	Google Map
	*/

	wp_enqueue_script(
		'project-nc-googlemap1',
		'https://maps.googleapis.com/maps/api/js?key=AIzaSyAyyrU0ObcAIIKpIrd-8A2kml3-A78x3NA',
	);

	wp_enqueue_script(
		'project-nc-googlemap2',
		get_template_directory_uri() . '/js/googlemap.js', array('jquery','project-nc-googlemap1'), _S_VERSION, true );

	/* Added by Makiko Ono:end */

}
add_action( 'wp_enqueue_scripts', 'project_nc_scripts' );

/* Added by Makiko Ono:start */
// require get_template_directory() . '/inc/cpt-taxonomy.php';
/* Added by Makiko Ono:end */

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
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/* Added by Makiko Ono:start */
/**
 * Lower Yoast SEO Metabox location
 */
function yoast_to_bottom(){
	return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoast_to_bottom' );

// change the excerpt length
function project_nc_excerpt_length($length) {
	return 40;
}
add_filter('excerpt_length','project_nc_excerpt_length',999);

// add a link to the end of the excerpt
function project_nc_excert_more($more) {
	$more = '... <a class="read-more" href="'. esc_url(get_permalink()) .'">'. __('続きを読む','project_nc') .'</a>';
	return $more;
}
add_filter('excerpt_more','project_nc_excert_more');

// Register Google Map API key
function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyAyyrU0ObcAIIKpIrd-8A2kml3-A78x3NA');
}
add_action('acf/init', 'my_acf_init');




/* Added by Makiko Ono:end */
