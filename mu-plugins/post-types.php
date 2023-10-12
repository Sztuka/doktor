<?php 
function drartur_post_types() {
  register_post_type('zabieg', array(
    'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
    'rewrite' => array('slug' => 'zabiegi'),
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Zabiegi',
      'add_new_item' => 'Dodaj Zabiej',
      'edit_item' => 'Edytuj Zabieg',
      'all_items' => 'Wszystkie Zabiegi',
      'singular_name' => 'Zabieg'
    ),
    'show_in_menu' => true,
    'menu_icon' => 'dashicons-clipboard',
    'taxonomies' => array('category'),
  ));
  register_post_type('opinie', array(
    'supports' => array('title', 'editor'),
    'rewrite' => array('slug' => 'opinie'),
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Opinie',
      'add_new_item' => 'Dodaj Opinię',
      'edit_item' => 'Edytuj Opinię',
      'all_items' => 'Wszystkie Opinie',
      'singular_name' => 'Opinia'
    ),
    'menu_icon' => 'dashicons-format-quote',
  ));
  register_post_type('badanie', array(
    'supports' => array('title', 'editor', 'thumbnail'),
    'rewrite' => array('slug' => 'badania'),
    'public' => true,
    'show_in_rest' => true,
    'labels' => array(
      'name' => 'Badania',
      'add_new_item' => 'Dodaj Badanie',
      'edit_item' => 'Edytuj Badanie',
      'all_items' => 'Wszystkie Badania',
      'singular_name' => 'Badanie'
    ),
    'menu_icon' => 'dashicons-list-view',
  ));
}

add_action( 'init', 'drartur_post_types');
