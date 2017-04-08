<?php

function deliver_scripts() {
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/styles/css/bootstrap.css');

    wp_enqueue_style( 'owl', get_template_directory_uri() . '/styles/css/owl.carousel.css');

    wp_enqueue_style( 'owl-defult', get_template_directory_uri() . '/styles/css/owl.theme.default.min.css');

    wp_enqueue_style( 'style', get_template_directory_uri() . '/styles/css/style.css');

    wp_enqueue_script( 'jquery', get_template_directory_uri(), false, true );

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array(), false, true );

    wp_enqueue_script( 'owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array(), false, true );

    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array(), false, true );

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'deliver_scripts' );



// Navigation Menus
register_nav_menu ('main-nav', 'header-menu');
register_nav_menu ('foot-nav', 'footer-menu');



add_theme_support( 'custom-logo' );



add_theme_support( 'custom-logo', array(
  'height'      => 240,
  'width'       => 240,
  'flex-height' => true,
));


// поддержка миниаютр
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 1200, 9999 );
add_theme_support( 'post-formats', array(
	'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
));


//content
function content($limit) {
    $content = explode(' ', get_the_content(), $limit);
    if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content).'...';
    } else {
        $content = implode(" ",$content);
    }
    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);
    return $content; }

/**
 * Register our sidebars and widgetized areas.
 *
 */


register_sidebar( array(
    'name'          => 'sidebar',
    'id'            => 'main-sidebar',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
    'description'   => 'create widgets here'
));

register_sidebar( array(
    'name'          => 'foot-sidebar',
    'id'            => 'footer-sidebar',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
    'description'   => 'create widgets here'
));

register_sidebar( array(
    'name'          => 'head-sidebar',
    'id'            => 'header-sidebar',
    'before_title'  => '<h2>',
    'after_title'   => '</h2>',
    'description'   => 'create widgets here'
));


function is_type_page() { // Check if the current post is a page
    global $post;

    if ($post->post_type == 'page') {
        return true;
    } else {
        return false;
    }
}


require get_template_directory() . '/inc/customizer.php';


add_filter( 'comment_form_fields', 'order_comment_form_fields' );

function order_comment_form_fields( $fields ) {

    $comment = $fields['comment'];

    unset( $fields['comment'] );

    $fields['comment'] = $comment;

    return $fields;

}

add_filter('wp_list_categories', 'cat_count_span');
function cat_count_span($links) {
    $links = str_replace('</a> (', '</a> <span>(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}

function register_offering_reviews() {
    $labels = array(
        'name'               => _x( 'Offering Section', 'post type general name', 'deliver' ),
        'singular_name'      => _x( 'Slide', 'post type singular name', 'deliver' ),
        'menu_name'          => _x( 'Offering Section', 'admin menu', 'deliver' ),
        'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'deliver' ),
        'add_new'            => _x( 'Add New', 'slide', 'deliver' ),
        'add_new_item'       => __( 'Add New Slide', 'deliver' ),
        'new_item'           => __( 'New Slide', 'deliver' ),
        'edit_item'          => __( 'Edit Slide', 'deliver' ),
        'view_item'          => __( 'View Slide', 'deliver' ),
        'all_items'          => __( 'All Slides', 'deliver' ),
        'search_items'       => __( 'Search Slides', 'deliver' ),
        'parent_item_colon'  => __( 'Parent Slides:', 'deliver' ),
        'not_found'          => __( 'No slides found.', 'deliver' ),
        'not_found_in_trash' => __( 'No slides found in Trash.', 'deliver' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'deliver' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'offering-reviews' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'offering-reviews', $args );
}
add_action( 'init', 'register_offering_reviews' );

function register_works_reviews() {
    $labels = array(
        'name'               => _x( 'Latest Works', 'post type general name', 'deliver' ),
        'singular_name'      => _x( 'Slide', 'post type singular name', 'deliver' ),
        'menu_name'          => _x( 'Latest Works', 'admin menu', 'deliver' ),
        'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'deliver' ),
        'add_new'            => _x( 'Add New', 'slide', 'deliver' ),
        'add_new_item'       => __( 'Add New Slide', 'deliver' ),
        'new_item'           => __( 'New Slide', 'deliver' ),
        'edit_item'          => __( 'Edit Slide', 'deliver' ),
        'view_item'          => __( 'View Slide', 'deliver' ),
        'all_items'          => __( 'All Slides', 'deliver' ),
        'search_items'       => __( 'Search Slides', 'deliver' ),
        'parent_item_colon'  => __( 'Parent Slides:', 'deliver' ),
        'not_found'          => __( 'No slides found.', 'deliver' ),
        'not_found_in_trash' => __( 'No slides found in Trash.', 'deliver' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'deliver' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'works-reviews' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'works-reviews', $args );
}
add_action( 'init', 'register_works_reviews' );

function register_clients_reviews() {
    $labels = array(
        'name'               => _x( 'Featured Clients', 'post type general name', 'deliver' ),
        'singular_name'      => _x( 'Slide', 'post type singular name', 'deliver' ),
        'menu_name'          => _x( 'Featured Clients', 'admin menu', 'deliver' ),
        'name_admin_bar'     => _x( 'Slide', 'add new on admin bar', 'deliver' ),
        'add_new'            => _x( 'Add New', 'slide', 'deliver' ),
        'add_new_item'       => __( 'Add New Slide', 'deliver' ),
        'new_item'           => __( 'New Slide', 'deliver' ),
        'edit_item'          => __( 'Edit Slide', 'deliver' ),
        'view_item'          => __( 'View Slide', 'deliver' ),
        'all_items'          => __( 'All Slides', 'deliver' ),
        'search_items'       => __( 'Search Slides', 'deliver' ),
        'parent_item_colon'  => __( 'Parent Slides:', 'deliver' ),
        'not_found'          => __( 'No slides found.', 'deliver' ),
        'not_found_in_trash' => __( 'No slides found in Trash.', 'deliver' )
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __( 'Description.', 'deliver' ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'featured-clients' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
    );

    register_post_type( 'featured-clients', $args );
}
add_action( 'init', 'register_clients_reviews' );



////// Creates Movie Reviews Custom Post Type //////

function clients_reviews_init() {
    $args = array(
        'label' => 'Clients',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'clients-reviews'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'clients-reviews', $args );
}
add_action( 'init', 'clients_reviews_init' );

////// Creates Movie Reviews Custom Post Type //////


function content_slider_init() {
    $args = array(
        'label' => 'Features',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'features-reviews'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'features-reviews', $args );
}
add_action( 'init', 'content_slider_init' );


function team_reviews_init() {
    $args = array(
        'label' => 'Team',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'team-reviews'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'team-reviews', $args );
}
add_action( 'init', 'team_reviews_init' );


function pricing_reviews_init() {
    $args = array(
        'label' => 'Pricing',
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'rewrite' => array('slug' => 'pricing-reviews'),
        'query_var' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'trackbacks',
            'custom-fields',
            'comments',
            'revisions',
            'thumbnail',
            'author',
            'page-attributes',)
    );
    register_post_type( 'pricing-reviews', $args );
}
add_action( 'init', 'pricing_reviews_init' );



/**
 * Filter the except length to 20 characters.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 10;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



function maks_filter_terms( $exclusions, $args ){
// Идентификаторы, которые будут исключены
    $exclude = "3, 5, 6"; // Изменить эти идентификаторы
// Генерация кода исключения SQL
    $exterms = wp_parse_id_list( $exclude );
    foreach ( $exterms as $exterm ) {
        if ( empty($exclusions) )
            $exclusions = ' AND ( t.term_id <> ' . intval($exterm) . ' ';
        else
            $exclusions .= ' AND t.term_id <> ' . intval($exterm) . ' ';
    }

    if ( !empty($exclusions) )
        $exclusions .= ')';

    return $exclusions;
}

// Наконец добавить наш фильтр
add_filter( 'list_terms_exclusions', 'maks_filter_terms', 10, 2 );

add_filter('navigation_markup_template', 'my_navigation_template', 10, 2 );
function my_navigation_template( $template, $class ){
    /*
    Вид базового шаблона:
    <nav class="navigation %1$s" role="navigation">
        <h2 class="screen-reader-text">%2$s</h2>
        <div class="nav-links">%3$s</div>
    </nav>
    */

    return '
	<nav class="navigation %1$s" role="navigation">
		<div class="nav-links">%3$s</div>
	</nav>
	';
}

function new_excerpt_length($length) {
    return 20;
}
add_filter('excerpt_length', 'new_excerpt_length');

add_filter('excerpt_more', function($more) {
    return '...';
});