<?php

add_action( 'wp_enqueue_scripts', 'buhala_styles');
add_action( 'wp_footer', 'buhala_scripts' );

function buhala_styles(){
    //wp_enqueue_style( 'bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' );
    wp_enqueue_style( 'select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css' );
    wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/assets/css/bootstrap-grid.v-4.min.css' );
    wp_enqueue_style( 'plyr', 'https://cdn.plyr.io/3.6.3/plyr.css' );
    //wp_enqueue_style( 'main-old', get_template_directory_uri() . '/assets/css/main-old.css' );
    wp_enqueue_style( 'main-css', get_template_directory_uri() . '/assets/css/main.css' );
    //wp_enqueue_style( 'styles-main-page', get_template_directory_uri() . '/assets/css/styles-main-page.css' );
    //wp_enqueue_style( 'media-old', get_template_directory_uri() . '/assets/css/media-old.css' );
    wp_enqueue_style( 'media-css', get_template_directory_uri() . '/assets/css/media.css' );
    
}

function buhala_scripts(){
    wp_enqueue_script( 'jquery');

    //wp_enqueue_script( 'buhala-navigation', get_template_directory_uri() . '/js/navigation.js');
    // if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
// 	// 	wp_enqueue_script( 'comment-reply' );
// 	// }

    //wp_enqueue_script( 'bootstrap-jquery', 'https://code.jquery.com/jquery-3.4.1.slim.min.js' );
    wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js',false , array('jquery') , true);
    wp_enqueue_script( 'bootstrap-popper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js' );
    wp_enqueue_script( 'bootstrapcdn-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js' );
    wp_enqueue_script( 'select2', 'https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js' );
    wp_enqueue_script( 'plyr', 'https://cdn.plyr.io/3.6.3/plyr.js' );
    wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/assets/js/slick.min.js' );
    wp_enqueue_script( 'script-js', get_template_directory_uri() . '/assets/js/script.js' );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js' );
    wp_enqueue_script( 'recaptcha', 'https://www.google.com/recaptcha/api.js' );
    wp_enqueue_script( 'recaptcha-api', 'https://www.google.com/recaptcha/api.js?render=6Lea_UsbAAAAAFHlkCF5taKFp9qNn5DwbkKBLC2u' );
}
