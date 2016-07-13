<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'author', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'author' ) );

//* Add Color Selection to WordPress Theme Customizer
require_once( get_stylesheet_directory() . '/lib/customize.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', __( 'Author Pro Theme', 'author' ) );
define( 'CHILD_THEME_URL', 'http://my.studiopress.com/themes/author/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'author_enqueue_scripts_styles' );
function author_enqueue_scripts_styles() {

	wp_enqueue_script( 'author-global', get_bloginfo( 'stylesheet_directory' ) . '/js/global.js', array( 'jquery' ), '1.0.0' );

	wp_enqueue_style( 'dashicons' );
	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,900,400italic', array(), CHILD_THEME_VERSION );

}


//change woocommerce 'out of stock' product status to any text status you want
add_filter('woocommerce_get_availability', 'custom_get_availability');

function custom_get_availability($availability)
{
$availability['availability'] = str_ireplace('Out of stock', 'Coming Soon...', $availability['availability']);
//$availability['availability'] = str_ireplace('Out of stock', 'Sold Out!', $availability['availability']);
//$availability['availability'] = str_ireplace('Out of stock', 'Call for Price', $availability['availability']);

return $availability;
}




add_theme_support( 'genesis-connect-woocommerce' );

//* Add new image sizes
add_image_size( 'featured-content', 800, 800, TRUE );

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 4 );

//* Unregister layout settings
genesis_unregister_layout( 'content-sidebar-sidebar' );
genesis_unregister_layout( 'sidebar-content-sidebar' );
genesis_unregister_layout( 'sidebar-sidebar-content' );

//* Unregister secondary sidebar
unregister_sidebar( 'sidebar-alt' );

//* Unregister the header right widget area
unregister_sidebar( 'header-right' );

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'flex-height'     => true,
	'width'           => 430,
	'height'          => 78,
	'header-selector' => '.site-title a',
	'header-text'     => false,
) );

//* Rename Primary Menu
add_theme_support ( 'genesis-menus' , array ( 'primary' => __( 'Header Navigation Menu', 'author' ), 'secondary' => __( 'Secondary Navigation Menu', 'author' ) ) );

//* Remove output of primary navigation right extras
remove_filter( 'genesis_nav_items', 'genesis_nav_right', 10, 2 );
remove_filter( 'wp_nav_menu_items', 'genesis_nav_right', 10, 2 );

//* Reposition the navigation
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_header', 'genesis_do_nav', 12 );
add_action( 'genesis_before_content_sidebar_wrap', 'genesis_do_subnav' );

//* Setup widget counts
function author_count_widgets( $id ) {
	global $sidebars_widgets;

	if ( isset( $sidebars_widgets[ $id ] ) ) {
		return count( $sidebars_widgets[ $id ] );
	}

}

function author_widget_area_class( $id ) {
	$count = author_count_widgets( $id );

	$class = '';

	if( $count == 1 ) {
		$class .= ' widget-full';
	} elseif( $count % 3 == 0 ) {
		$class .= ' widget-thirds';
	} elseif( $count % 4 == 0 ) {
		$class .= ' widget-fourths';
	} elseif( $count % 2 == 1 ) {
		$class .= ' widget-halves uneven';
	} else {
		$class .= ' widget-halves';
	}

	return $class;

}

add_action( 'genesis_right_header', 'bg_right_header_widget_area' );
function bg_right_header_widget_area() {

	genesis_widget_area( 'right-header', array(
		'before' => '<div class="right-header widget-area"><div class="wrap">',
		'after'  => '</div></div>',
	) );

}

add_filter( 'woocommerce_product_tabs', 'wcs_woo_remove_reviews_tab', 98 );
function wcs_woo_remove_reviews_tab($tabs) {
 unset($tabs['reviews']);
 return $tabs;
}

//* [Site-wide] Modify the Excerpt read more link
add_filter('excerpt_more', 'hof_excerpt_more');
function hof_excerpt_more($more) {
	return '... <a class="more-link button" href="' . get_permalink() . '">Read More</a>';
}

//* Remove comment form allowed tags
add_filter( 'comment_form_defaults', 'author_remove_comment_form_allowed_tags' );
function author_remove_comment_form_allowed_tags( $defaults ) {

	$defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun', 'author' ) . '</label> <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';
	$defaults['comment_notes_after'] = '';

	return $defaults;

}

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'right-header',
	'name'        => __( 'Right Header', 'house-of-funk' ),
	'description' => __( 'This is the right header widget area.', 'house-of-funk' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-1',
	'name'        => __( 'Front Page 1', 'author' ),
	'description' => __( 'This is the front page 1 section.', 'author' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-2',
	'name'        => __( 'Front Page 2', 'author' ),
	'description' => __( 'This is the front page 2 section.', 'author' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-3',
	'name'        => __( 'Front Page 3', 'author' ),
	'description' => __( 'This is the front page 3 section.', 'author' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-4',
	'name'        => __( 'Front Page 4', 'author' ),
	'description' => __( 'This is the front page 4 section.', 'author' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-5',
	'name'        => __( 'Front Page 5', 'author' ),
	'description' => __( 'This is the front page 5 section.', 'author' ),
) );

/**
 * Display links to previous and next post, from a single post.
 *
 * @since 1.5.1
 *
 * @return null Return early if not a post.
 */
add_action('genesis_entry_footer', 'hof_prev_next_post_nav');
function hof_prev_next_post_nav() {

	if ( ! is_singular( 'post' ) )
		return;

	genesis_markup( array(
		'html5'   => '<div %s>',
		'xhtml'   => '<div class="navigation">',
		'context' => 'adjacent-entry-pagination',
	) );

	echo '<div class="pagination-previous alignleft">';
	previous_post_link('<div class="previous-post-link">&laquo; %link</div>', '<strong>%title</strong>', FALSE, '34');
	echo '</div>';

	echo '<div class="pagination-next alignright">';
	next_post_link('<div class="next-post-link">%link &raquo;</div>', '<strong>%title</strong>', FALSE, '34');
	echo '</div>';

	echo '</div>';

}

