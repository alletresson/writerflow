<?php

// Set the content width based on the theme's design and stylesheet
if ( ! isset( $content_width ) ) {
	$content_width = 580;
}

// Set version constant
define( 'WRITERTHEME_VERSION', '1.0' );

if ( ! function_exists( 'writertheme_setup' ) ) {
	function writertheme_setup() {
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

		// Custom image size for displaying in posts
		add_image_size( 'article', 580, 700, true );

		// Available for translation
		load_theme_textdomain( 'writerflow', get_template_directory() . '/languages' );
	}
}
add_action( 'after_setup_theme', 'writertheme_setup' );

// Register widget area

function writertheme_widgets_init() {
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

add_action( 'widgets_init', 'writertheme_widgets_init' );

// Enqueue scripts and styles

function writertheme_scripts() {
	wp_enqueue_style( 'writertheme-style', get_template_directory_uri() . '/style.css', array(), WRITERTHEME_VERSION, "all" );

	wp_enqueue_script( 'writertheme-customjs', get_template_directory_uri() . '/assets/js/custom-min.js', array('jquery'), WRITERTHEME_VERSION, true );
	wp_localize_script( 'writertheme-ajax', 'ajax', array( 'url' => admin_url( 'admin-ajax.php' ) ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'writertheme_scripts' );

// Excerpt Read more link
function new_excerpt_more($more) {
    global $post;
    return '<a class="nav-link" href="'. get_permalink($post->ID) . '" title="Read article">read</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// REQUIRES & CLASS AUTOLOADING

require_once dirname( __FILE__ ) . '/inc/common.php';
spl_autoload_register( 'writertheme_autoloader' );

// Customizer

require get_template_directory() . '/inc/customizer.php';