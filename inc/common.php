<?php

// Custom CSS styles for Live Customizer

function writertheme_custom_customize_enqueue() {
	wp_enqueue_style( 'customizer-css', get_stylesheet_directory_uri() . '/assets/css/customizer.css' );
}

add_action( 'customize_controls_enqueue_scripts', 'writertheme_custom_customize_enqueue' );

// Posts pagination

function writertheme_pagination() {
	global $wp_query;

	$pagination = array(
		'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
		'format'    => '?page=%#%',
		'current'   => max( 1, get_query_var( 'paged' ) ),
		'total'     => $wp_query->max_num_pages,
		'prev_text' => '',
		'next_text' => '',
		'type'      => 'list'
	);

	return paginate_links( $pagination );
}

// Related posts

function writertheme_related_posts( $args = array() ) {
	global $post;

	// default args
	$args = wp_parse_args( $args, array(
		'post_id'   => ! empty( $post ) ? $post->ID : '',
		'taxonomy'  => 'category',
		'limit'     => 3,
		'post_type' => ! empty( $post ) ? $post->post_type : 'post',
		'orderby'   => 'date',
		'order'     => 'DESC'
	) );

	// check taxonomy
	$registered_taxonomies = get_taxonomies();

	if ( ! in_array( $args['taxonomy'], $registered_taxonomies ) ) {
		return;
	}

	// post taxonomies
	$taxonomies = wp_get_post_terms( $args['post_id'], $args['taxonomy'], array( 'fields' => 'ids' ) );

	if ( empty( $taxonomies ) ) {
		return;
	}

	// query
	$related_posts = get_posts( array(
		'post__not_in'   => (array) $args['post_id'],
		'post_type'      => $args['post_type'],
		'tax_query'      => array(
			array(
				'taxonomy' => $args['taxonomy'],
				'field'    => 'term_id',
				'terms'    => $taxonomies
			),
		),
		'posts_per_page' => $args['limit'],
		'orderby'        => $args['orderby'],
		'order'          => $args['order']
	) );

	include( locate_template( 'partials/related.php', false, false ) );

	wp_reset_postdata();
}

// Single page entry footer

if ( ! function_exists( 'writertheme_entry_footer' ) ) {
	function writertheme_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			// translators: used between list items, there is a space after the comma
			$tags_list = get_the_tag_list( '', esc_html__( ' ', 'writerflow' ) );
			if ( $tags_list ) {
				printf( '<span class="tags-links" itemscope itemtype="http://schema.org/keywords">' . esc_html__( ' Tagged %1$s', 'writerflow' ) . '</span>', $tags_list ); // WPCS: XSS OK.
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link( esc_html__( 'Leave a comment', 'writerflow' ), esc_html__( '1 Comment', 'writerflow' ), esc_html__( '% Comments', 'writerflow' ) );
			echo '</span>';
		}
	}
}

// Post author

if ( ! function_exists( 'writertheme_posted_by' ) ) {
	function writertheme_posted_by() {
		$byline = sprintf(
			esc_html_x( 'by %s', 'post author', 'writerflow' ),
			'<span class="author vcard" itemprop="author" itemscope itemtype="http://schema.org/Person"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline">' . $byline . '</span>'; // WPCS: XSS OK.

	}
}

// Post category

if ( ! function_exists( 'writertheme_posted_cat' ) ) {
	function writertheme_posted_cat() {
		foreach ( ( get_the_category() ) as $category ) {
			echo '<a href="' . get_category_link( $category ) . '" class="category-name" itemprop="articleSection">' . $category->cat_name . '</a> ';
		}
	}
}

// Post date

function writertheme_posted_on( $args = array() ) {

	$time_string = '<time class="entry-date published updated" datetime="%1$s" itemprop="datePublished">%2$s</time>';
	$time_string_1 = '<time class="entry-date published" datetime="%1$s" itemprop="datePublished">%2$s</time>';
	$time_string_2 = '<time class="updated" datetime="%1$s" itemprop="dateModified">%2$s</time>';

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( 'd M Y' ) )
	);

	$time_string_1 = sprintf( $time_string_1,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date( 'd M Y' ) )
	);

	$time_string_2 = sprintf( $time_string_2,
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date( 'd M Y' ) )
	);

	$posted_on = sprintf(
		esc_html( '%s', 'post date', 'writerflow' ),
		'<a href="' . esc_url( get_permalink() ) . '">' . $time_string_1 . '</a>'
	);

	$updated_on = sprintf(
		esc_html( '%s', 'post date', 'writerflow' ),
		'<a href="' . esc_url( get_permalink() ) . '">' . $time_string_2 . '</a>'
	);

	$postedupdated_on = sprintf(
		esc_html( '%s', 'post date', 'writerflow' ),
		'<a href="' . esc_url( get_permalink() ) . '">' . $time_string . '</a>'
	);

	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		echo '<p class="posted-on">Published on ' . $posted_on . ' &mdash; Last update: ' . $updated_on . '</p>';
	} else {
		echo '<p class="posted-on">Published on ' . $postedupdated_on . '</p>';
	}
}

/**
 * Class autoloader
 *
 * @param string $class_name
 *
 * @return
 */
function writertheme_autoloader( $class_name ) {
	if ( 0 !== strpos( $class_name, 'writertheme_' ) ) {
		return;
	}

	$file_name = str_replace( array( 'writertheme_', '_' ), array( '', '-' ), strtolower( $class_name ) );
	$file_path = get_template_directory() . '/inc/class-' . $file_name . '.php';

	if ( ! file_exists( $file_path ) ) {
		return;
	}

	require_once $file_path;
}

// Portfolio post category

function writertheme_portfolio_categories( $args = array() ) {
	writertheme_post_taxonomies( 'portfolio_category', $args );
}

/**
 * Display post taxonomies
 *
 * @param string $taxonomy_name
 * @param array $args
 *
 * @return
 */
function writertheme_post_taxonomies( $taxonomy_name, $args = array() ) {
	// check taxonomy
	$taxonomy = get_taxonomy( $taxonomy_name );

	if ( is_wp_error( $taxonomy ) ) {
		return;
	}

	// default args
	$args = wp_parse_args( $args, array(
		'post_id'        => get_the_ID(),
		'item_class'     => '',
		'item_separator' => ' ',
		'item_title'     => __( 'View all posts in %s', 'writerflow' ),
		'wrapper_tag'    => 'span',
		'wrapper_class'  => sprintf( 'item__%s', $taxonomy->name )
	) );

	$args['item_class'] = ! empty( $args['item_class'] ) ? $args['item_class'] . ' ' : '';

	// get terms
	$terms = wp_get_post_terms( $args['post_id'], $taxonomy->name );

	if ( is_wp_error( $terms ) ) {
		return;
	}

	$list = array();
	foreach ( $terms as $term ) {
		if ( $taxonomy->public ) {
			$item_title   = sprintf( $args['item_title'], $term->name );
			$item_classes = $args['item_class'] . sprintf( '%s-%s', $taxonomy->name, $term->slug );
			$item_link    = get_category_link( $term->term_id );

			$list[] = sprintf( '<a href="%s" title="%s" class="%s">%s</a>', esc_url( $item_link ), esc_attr( $item_title ), esc_attr( $item_classes ), esc_html( $term->name ) );
		} else {
			$list[] = esc_html( $term->name );
		}
	}

	printf( '<%s class="%s">%s</%s>', $args['wrapper_tag'], esc_attr( $args['wrapper_class'] ), implode( $args['item_separator'], $list ), $args['wrapper_tag'] );
}