<?php

// Set the content width based on the theme's design and stylesheet
if ( ! isset( $content_width ) ) {
	$content_width = 580;
}

// Set version constant
define( 'WRITERFLOW_VERSION', '1.3' );

if ( ! function_exists( 'writerflow_setup' ) ) {
	function writerflow_setup() {
		// Menus
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'writerflow' ),
		) );

		// Add theme support
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'custom-background', array(
			'default-color'  => '#ffffff',
		) );
		add_theme_support( 'custom-logo', array(
			'width'       => 400,
			'height'      => 150,
			'flex-height' => true,
			'flex-width'  => true,
		) );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
        add_theme_support( 'wp-block-styles' );
        add_theme_support( 'responsive-embeds' );
        add_theme_support( 'align-wide' );

		// Available for translation
		load_theme_textdomain( 'writerflow', get_template_directory() . '/languages' );
	}
}
add_action( 'after_setup_theme', 'writerflow_setup' );

// Register widget area

function writerflow_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'writerflow' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}

add_action( 'widgets_init', 'writerflow_widgets_init' );

// Enqueue scripts and styles

function writerflow_scripts() {
	wp_enqueue_style( 'writerflow-style', get_template_directory_uri() . '/style.css', array(), WRITERFLOW_VERSION, "all" );

	wp_enqueue_script( 'writerflow-customjs', get_template_directory_uri() . '/assets/js/custom-min.js', array('jquery'), WRITERFLOW_VERSION, true );
	wp_localize_script( 'writerflow-ajax', 'ajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'writerflow_scripts' );

// Excerpt Read more link
function writerflow_new_excerpt_more($more) {
    global $post;
    return '<a class="nav-link" href="'. get_permalink($post->ID) . '" title="Read article">read</a>';
}
add_filter('excerpt_more', 'writerflow_new_excerpt_more');

// REQUIRES & CLASS AUTOLOADING

require_once dirname( __FILE__ ) . '/inc/common.php';
spl_autoload_register( 'writerflow_autoloader' );

// Customizer

require get_template_directory() . '/inc/customizer.php';