<?php

function drartur_files() {
    wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js', array( 'jquery' ), '2.9.3', true);
    wp_enqueue_script('drartur-bootstrap-js', get_theme_file_uri('/assets/js/bootstrap.js'), array(), '5.3.1', true);
    wp_enqueue_script('drartur-owl-js', get_theme_file_uri('/assets/js/owl.carousel.min.js'), array(), '2.3.4', true);
    wp_enqueue_script('drartur-main-js', get_theme_file_uri('/assets/js/main.js'), array('jquery'), '1.0', true);
    wp_enqueue_script('font-awesome-js', '//kit.fontawesome.com/8325714222.js', null, '6.4.2', false);
    wp_enqueue_style('custom-google-fonts-1', '//fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800');
    wp_enqueue_style('drartur-bootstrap', get_theme_file_uri('/assets/css/bootstrap.css'));
    wp_enqueue_style('drartur-owl', get_theme_file_uri('/assets/css/owl.carousel.min.css'));
    wp_enqueue_style('drartur-owl-default', get_theme_file_uri('/assets/css/owl.carousel.min.css'));
    wp_enqueue_style('drartur-index', get_theme_file_uri('/assets/css/index.css'));
    wp_enqueue_style('drartur-main', get_theme_file_uri('/assets/css/main.css'));
}

add_action( 'wp_enqueue_scripts', 'drartur_files');


function drartur_features() {
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}

add_action('after_setup_theme', 'drartur_features');


function register_menus() {
    register_nav_menus(
        array(
        'header-menu' => __( 'Header Menu' ),
        'piersi-menu' => __( 'Piersi Menu' ),
        'twarz-menu' => __( 'Twarz Menu' ),
        'sylwetka-menu' => __( 'Sylwetka Menu' ),
        'pozostale-menu' => __( 'Pozostałe Menu' ),
        )
    );
}

add_action( 'init', 'register_menus' );


function my_footer_widgets() {
    for ($i = 1; $i <= 5; $i++) {
        register_sidebar( array(
            'name'          => "Footer Column $i",
            'id'            => "footer-$i",
            'description'   => "Widgets for footer column $i.",
            'before_widget' => '<div class="col-md-2 col-sm-12">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5>',
            'after_title'   => '</h5>',
        ) );
    }
}
add_action( 'widgets_init', 'my_footer_widgets' );

function my_custom_widgets_init() {
    register_sidebar( array(
        'name'          => 'Social Icons',
        'id'            => 'social_icons',
        'before_widget' => '<div class="social-icons-widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => 'Contact Info',
        'id'            => 'contact_info',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="rounded">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => 'Przeciwwskazania Męskie',
        'id'            => 'przeciwwskazania_meskie',
        'before_widget' => '<div class="przeciwwskazania">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar( array(
        'name'          => 'Przeciwwskazania Nierealne',
        'id'            => 'przeciwwskazania_nierealne',
        'before_widget' => '<div class="przeciwwskazania">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
    register_sidebar( array(
        'name'          => 'Przeciwwskazania',
        'id'            => 'przeciwwskazania',
        'before_widget' => '<div class="przeciwwskazania">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action( 'widgets_init', 'my_custom_widgets_init' );



function theme_prefix_setup() {
    // Adding support for custom logo.
    if( is_admin() ) {
        add_theme_support( 'custom-logo', array(
            'height'      => 100, // Set the height you desire (optional).
            'width'       => 400, // Set the width you desire (optional).
            'flex-height' => true, // Allow flexible height (optional).
            'flex-width'  => true, // Allow flexible width (optional).
            'header-text' => array( 'site-title', 'site-description' ), // Class names for header text (optional).
        ) );
    }
}
add_action( 'after_setup_theme', 'theme_prefix_setup', 11 );



// BOOTSRAP NAV WALKER
class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
    
    function start_lvl(&$output, $depth = 0, $args = null) {
        $output .= '<ul class="dropdown-menu">';
    }

    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $has_children = isset($args->walker->has_children) && $args->walker->has_children;
        if($depth === 0 && $has_children) {
            $output .= '<li class="nav-item dropdown">';
            $output .= '<a class="nav-link dropdown-toggle" href="' . $item->url . '" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">' . $item->title . '</a>';
        } elseif($depth === 1 && $has_children) {
            $output .= '<li class="dropdown-submenu">';
            $output .= '<a class="dropdown-item dropdown-toggle" href="' . $item->url . '">' . $item->title . '</a>';
        } else {
            $output .= '<li class="nav-item">';
            $output .= '<a class="dropdown-item" href="' . $item->url . '">' . $item->title . '</a>';
        }
    }

    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= '</li>';
    }

    function end_lvl(&$output, $depth = 0, $args = null) {
        $output .= '</ul>';
    }
}



// HIDE POST TYPE FROM ADMIN
function remove_menus(){
    remove_menu_page('edit.php'); // Removes the 'Posts' menu
    remove_menu_page('edit-comments.php'); // Removes the 'Comments' menu
}
add_action('admin_menu', 'remove_menus');


function add_excerpts_to_pages() {
    add_post_type_support( 'page', 'excerpt' );
}
add_action( 'init', 'add_excerpts_to_pages' );

// function change_input_type( $field ) {
//     if ( $field['name'] == 'numer_telefonu' ) {
//         $field['type'] = 'tel';
//     }
//     return $field;
// }
// add_filter('acf/load_field', 'change_input_type');

function my_acf_init() {
    acf_update_setting('google_api_key', 'AIzaSyA4UKsuI0HLZUFZSXDhmgstZ7IdZa8GZjQ');
}
add_action('acf/init', 'my_acf_init');


// function my_acf_google_map_api( $api ){
//     $api['key'] = 'AIzaSyA4UKsuI0HLZUFZSXDhmgstZ7IdZa8GZjQ';
//     return $api;
// }
// add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');