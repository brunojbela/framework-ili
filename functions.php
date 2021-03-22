<?php

DEFINE('CONTENT_URI', get_stylesheet_directory_uri());

require_once get_template_directory() . '/core/classes/class-bootstrap-nav.php';
require_once get_template_directory() . '/core/classes/class-shortcodes.php';
require_once get_template_directory() . '/core/classes/class-thumbnail-resizer.php';
require_once get_template_directory() . '/core/classes/class-post-type.php';
require_once get_template_directory() . '/core/classes/class-taxonomy.php';
require_once get_template_directory() . '/core/mestre/functions-mestre.php';

if ( ! function_exists( 'odin_setup_features' ) ) {
	function odin_setup_features() {
		load_theme_textdomain( 'odin', get_template_directory() . '/languages' );
		register_nav_menus(
			array(
				'main-menu' => __( 'Main Menu', 'odin' )
			)
		);

		add_theme_support( 'post-thumbnails' );
        add_image_size( 'blog-thumbnails', 586, 350, array( 'center', 'center' ) );
        add_image_size( 'post-thumbnail', 200, 220, array( 'center', 'center' ) );
		add_theme_support(
			'infinite-scroll',
			array(
				'type'           => 'scroll',
				'footer_widgets' => false,
				'container'      => 'content',
				'wrapper'        => false,
				'render'         => false,
				'posts_per_page' => get_option( 'posts_per_page' )
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption'
			)
		);
		add_theme_support( 'title-tag' );
	}
}
add_action( 'after_setup_theme', 'odin_setup_features' );


function odin_widgets_init() {
	register_sidebar(
		array(
			'name' => __( 'Main Sidebar', 'odin' ),
			'id' => 'main-sidebar',
			'description' => __( 'Site Main Sidebar', 'odin' ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle widget-title">',
			'after_title' => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'odin_widgets_init' );


function odin_flush_rewrite() {
	flush_rewrite_rules();
}

add_action( 'after_switch_theme', 'odin_flush_rewrite' );

/**
 * Load site scripts.
 *
 * @since 2.2.0
 */
function odin_enqueue_scripts() {
	$template_url = get_template_directory_uri();

	//CSS
	wp_enqueue_style( 'odin-style', get_stylesheet_uri(), array(), null, 'all' );

	//JS
	wp_enqueue_script( 'odin-main-min', $template_url . '/assets/js/main.min.js', array(), null, true );
	wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'odin_enqueue_scripts', 1 );

function odin_stylesheet_uri( $uri, $dir ) {
	return $dir . '/assets/css/style.css';
}
add_filter( 'stylesheet_uri', 'odin_stylesheet_uri', 10, 2 );

if ( ! function_exists( 'is_woocommerce_activated' ) ) {
	function is_woocommerce_activated() {
		return class_exists( 'woocommerce' ) ? true : false;
	}
}

require_once get_template_directory() . '/core/helpers.php';
require_once get_template_directory() . '/inc/admin.php';
require_once get_template_directory() . '/inc/comments-loop.php';
require_once get_template_directory() . '/inc/optimize.php';
require_once get_template_directory() . '/inc/template-tags.php';

if ( is_woocommerce_activated() ) {
	add_theme_support( 'woocommerce' );
	require get_template_directory() . '/inc/woocommerce/hooks.php';
	require get_template_directory() . '/inc/woocommerce/functions.php';
	require get_template_directory() . '/inc/woocommerce/template-tags.php';
}


if( function_exists( 'acf_add_options_page' ) ) {

    acf_add_options_page(array(
        'page_title'  => 'Opções do Tema',
        'menu_title'  => 'Opções do Tema',
        'menu_slug'   => 'amdt-opcoes',
        'capability'  => 'edit_posts',
        'redirect'    => false
    ));
    acf_add_options_sub_page(array(
        'page_title'  => 'Home',
        'menu_title'  => 'Home',
        'parent_slug' => 'amdt-opcoes'
    ));
}

function remove_menus(){
 // remove_menu_page( 'edit.php?post_type=acf-field-group' );    //Dashboard
}
add_action( 'admin_menu', 'remove_menus' );

function setPostViews($postID) {
	$countKey = 'post_views_count';
	$count = get_post_meta($postID, $countKey, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $countKey);
		add_post_meta($postID, $countKey, '0');
	}else{
		$count++;
		update_post_meta($postID, $countKey, $count);
	}
}
