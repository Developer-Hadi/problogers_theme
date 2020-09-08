<?php

// Theme setup
function problogers_theme_setup(){

    /** automatic feed link*/
    add_theme_support( 'automatic-feed-links' );
    add_theme_support('custom-logo');
    /** tag-title **/
    add_theme_support( 'title-tag' );

    /** post formats */
    $post_formats = array('aside','image','gallery','video','audio','link','quote','status');
    add_theme_support( 'post-formats', $post_formats);

    /** post thumbnail **/
    add_theme_support( 'post-thumbnails' );

    /** HTML5 support **/
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    /** refresh widgest **/
    add_theme_support( 'customize-selective-refresh-widgets' );

    /** custom background **/
    $bg_defaults = array(
        'default-image'          => '',
        'default-preset'         => 'default',
        'default-size'           => 'cover',
        'default-repeat'         => 'no-repeat',
        'default-attachment'     => 'scroll',
    );
    add_theme_support( 'custom-background', $bg_defaults );

    /** custom header **/
    $header_defaults = array(
        'default-image'          => '',
        'width'                  => 300,
        'height'                 => 60,
        'flex-height'            => true,
        'flex-width'             => true,
        'default-text-color'     => '',
        'header-text'            => true,
        'uploads'                => true,
    );
    add_theme_support( 'custom-header', $header_defaults );

    /** custom logo **/
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

}
add_action('after_setup_theme', 'problogers_theme_setup');


// Loading css and js files
function problogers_scripts(){
    wp_enqueue_style('main-css', get_stylesheet_uri());
    wp_enqueue_style('custom-css', get_template_directory_uri(). '/assets/custom.css');
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css2?family=Long+Cang&display=swap');

}
add_action('wp_enqueue_scripts', 'problogers_scripts');

//Register Navigation Menu
register_nav_menus( array(
    'main-menu' => __('Main Menu', 'problogers'),
    'footer-menu' => __('Footer Menu', 'problogers'),
) );


// Register widgets

function problogers_widgets_init(){
    register_sidebar( [
        'name'          => __('Main Sidebar', 'problogers'),
        'id'            => 'main-sidebar',
        'description'   => __('Add your widgets'),
        'before_widget' => '<section class="widget">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>'
    ] );
}

add_action( 'widgets_init', 'problogers_widgets_init');

// controlling excerpt length
function problogers_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
            get_permalink( get_the_ID() ),
            __( ' Read More', 'textdomain' )
        );
    }
 
    return $more;
}
add_filter( 'excerpt_more', 'problogers_excerpt_more' );


?>