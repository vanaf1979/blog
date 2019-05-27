<?php
/**
 * Fontend specific functionality of this theme.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/FrontEnd
 */

namespace FunctionsPhp\FrontEnd;


use \FunctionsPhp\Includes\Theme as Theme;


class FrontEnd extends Theme {


    public function __construct() { 

        parent::__construct();

    }


    public function enqueue_styles() {

        // Purecss
        wp_enqueue_style( $this->text_domain . '-purecss', 'https://unpkg.com/purecss@1.0.0/build/pure-min.css', array(), $this->version , 'all' );
        wp_enqueue_style( $this->text_domain . '-purecss-ie8' , 'https://unpkg.com/purecss@1.0.0/build/grids-responsive-old-ie-min.css', array() , $this->version , 'all' );
        wp_style_add_data( $this->text_domain . '-purecss-ie8' , 'conditional' , 'lte IE 8' );
        wp_enqueue_style( $this->text_domain . '-purecss-ie9' , 'https://unpkg.com/purecss@1.0.0/build/grids-responsive-min.css', array() , $this->version , 'all' );

        wp_enqueue_style( $this->text_domain . '-fontawesome' , 'https://use.fontawesome.com/releases/v5.8.2/css/all.css', array() , '5.8.2' , 'all' );

        // App
        wp_enqueue_style( $this->text_domain  . '-app' , $this->theme_path . '/public/css/app.css' , array() , $this->version , 'all' );

    }


    public function enqueue_scripts() {

        // jQuery
        wp_enqueue_script( $this->text_domain . '-jquery' , 'https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js' , array() , $this->version , true );
        
        // App
        wp_enqueue_script( $this->text_domain . '-app' , $this->theme_path . '/public/js/app.js' , array() , $this->version , true );

    }


    public function return_maintanance_headers() {

        
    }


    public function register_thumbnail_sizes() {

        add_theme_support( 'post-thumbnails' );

        add_image_size( 'post-thumb-large' , 1000 , 9999 , false );
        add_image_size( 'post-thumb-medium' , 700 , 9999 , false );
        add_image_size( 'post-thumb-small' , 334 , 9999 , false );


    }


    public function add_theme_support() {

        add_theme_support( 'html5' , array( 'comment-list' , 'comment-form' , 'search-form' , 'gallery' , 'caption' ) );

        add_theme_support( 'menus' );

        add_theme_support( 'post-formats' , array( 'aside' , 'gallery' , 'link' , 'image' , 'quote' , 'status' , 'video' , 'audio' , 'chat' ) );

    }


    public function load_theme_textdomain() {

        load_theme_textdomain( $this->text_domain , $this->theme_path . '/languages' );

    }

}