<?php
/**
 * EA functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package EA
 */

if ( ! function_exists( 'ea_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function ea_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on EA, use a find and replace
		 * to change 'ea' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'ea', get_template_directory() . '/languages' );

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
			'primary' => esc_html__( 'Primary', 'ea' ),
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
		add_theme_support( 'custom-background', apply_filters( 'ea_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'ea_theme_setup' );

function ea_theme_add_editor_style(){
	add_editor_style('dist/css/editor-style.css');
}
add_action('admin_init', 'ea_theme_add_editor_style');
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

 function ea_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'ea_theme_content_width', 1140 );
}
add_action( 'after_setup_theme', 'ea_theme_content_width', 0 );


function new_excerpt_more($more) {
	global $post;
   return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read More...</a>';
  }
  add_filter('excerpt_more', 'new_excerpt_more');

  
/**
 * Enqueue scripts and styles.
 */
function ea_theme_scripts() {
	wp_enqueue_style( 'ea_bootstrap_css', get_template_directory_uri() . '/assets/css/bootstrap.min.css' );

	wp_enqueue_style( 'ea_fontawesome', get_template_directory_uri() . '/assets/font/fonts/css/font-awesome.min.css' );
	

	wp_enqueue_style( 'ea-style', get_stylesheet_uri() );

	wp_register_script('popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), '20170710', true );

	wp_enqueue_script( 'ea-tether', get_template_directory_uri() . '/assets/js/tether.min.js', array(), '20170115', true );
	 
	wp_enqueue_script( 'ea_bootstrap_js', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '20170915', true );


	wp_enqueue_script( 'ea-bootstrap-hover', get_template_directory_uri() . '/assets/js/bootstrap-hover.js', array('jquery'), '20170115', true ); 

	wp_enqueue_script( 'ea-nav-scroll', get_template_directory_uri() . '/assets/js/nav-scroll.js', array('jquery'), '20170115', true );


	wp_enqueue_script( 'ea-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'ea_theme_scripts' );

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
 * Widget File.
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Bootstrap Navwalker File.
 */
require get_template_directory() . '/inc/bootstrap-wp-navwalker.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
add_action( 'init', 'ea_theme_setup' );
add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnail' );




