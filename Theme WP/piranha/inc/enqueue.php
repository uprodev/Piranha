<?php

add_action( 'wp_enqueue_scripts', 'add_styles' );
add_action( 'wp_enqueue_scripts', 'add_scripts' );

function add_styles() {
    wp_enqueue_style('styles', get_template_directory_uri().'/css/style.css', array(), rand(1111, 9999));
    wp_enqueue_style( 'theme', get_stylesheet_uri() );

}


function add_scripts() {

    wp_enqueue_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array('jquery'), false, true);
    wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), false, true);
    wp_enqueue_script( 'map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyBgSILt6_9GdKEZk_MMcXGifYXtzjPP_JI&callback=initMap&libraries=places&v=weekly', array(), false, true);
//    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/script.js', array('jquery'), rand(1111, 9999), true);
//
//    wp_localize_script('script', 'globals',
//        array(
//            'url' => admin_url('admin-ajax.php'),
//            'template' => get_template_directory_uri(),
//            'upload'=>admin_url( 'admin-ajax.php?action=handle_dropped_media' ),
//            'delete'=>admin_url( 'admin-ajax.php?action=handle_deleted_media' ),
//        )
//    );


}