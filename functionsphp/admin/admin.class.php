<?php
/**
 * Admin area specific functionality of this theme.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/Admin
 */

namespace FunctionsPHP\Admin;


use \FunctionsPhp\Includes\Theme as Theme;


class Admin extends Theme {


    public function __construct() { 

        parent::__construct();

    }


    public function enqueue_styles( $page ) {

        if( $page == 'post.php' ) {

            // wp_enqueue_style( $this->text_domain . '-css' , $this->theme_path . '/public/css/admin.css' , array() , $this->version , 'all' );

        }

    }


    public function enqueue_scripts( $page ) {

        if( $page == 'post.php' ) {

           //  wp_enqueue_script( $this->text_domain . '-js' , $this->theme_path . '/public/js/admin.js' , array() , $this->version , true );

        }

    }


    public function register_nav_menus() {

        register_nav_menus(
            array(
                'header-menu' => __( 'Header Menu' ),
                'footer-menu' => __( 'Footer Menu' ),
                'mobile-menu' => __( 'Mobile Menu' )
            )
        );

    }


    function register_widget_areas() {

        register_sidebar( array(
            'name'          => 'Footer area one',
            'id'            => 'footer_area_one',
            'description'   => 'This widget area discription',
            'before_widget' => '<section class="footer-area footer-area-one">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        ));

        register_sidebar( array(
            'name'          => 'Footer area two',
            'id'            => 'footer_area_two',
            'description'   => 'This widget area discription',
            'before_widget' => '<section class="footer-area footer-area-two">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        ));

        register_sidebar( array(
            'name'          => 'Footer area three',
            'id'            => 'footer_area_three',
            'description'   => 'This widget area discription',
            'before_widget' => '<section class="footer-area footer-area-three">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        ));

        register_sidebar( array(
            'name'          => 'Footer area four',
            'id'            => 'footer_area_four',
            'description'   => 'This widget area discription',
            'before_widget' => '<section class="footer-area footer-area-three">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        ));

        register_sidebar( array(
            'name'          => 'Latest Tweets',
            'id'            => 'latest_tweets',
            'description'   => 'latest tweets',
            'before_widget' => '<section class="widget-area latest-tweets">',
            'after_widget'  => '</section>',
            'before_title'  => '<h4>',
            'after_title'   => '</h4>',
        ));

    }


    public function register_custom_posttypes() {

        // $args = array(
        // 	'label' => __('Portfolio'),
        // 	'singular_label' => __('Project'),
        // 	'public' => true,
        // 	'show_ui' => true,
        // 	'capability_type' => 'post',
        // 	'hierarchical' => false,
        // 	'rewrite' => array('slug' => 'POST-TYPE-SLUG-HERE'),
        // 	'supports' => array('title', 'editor', 'thumbnail')
        // );

        // register_post_type( 'custom-post-type' , $args );

    }

}
