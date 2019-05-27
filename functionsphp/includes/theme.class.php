<?php
/**
 * Store and provide theme inforation.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/Includes/Theme
 */

namespace FunctionsPhp\Includes;


class Theme {

    protected $theme_name = null;

    protected $version = null;

    protected $text_domain = null;

    protected $theme_path = null;

    private $template = null;


    public function __construct() {

        $theme = wp_get_theme();

        $this->theme_name = $theme->get( 'Name' );

        $this->version = $theme->get( 'Version' );

        $this->text_domain = $theme->get( 'TextDomain' );

        $this->theme_path = str_replace( 'http://' , 'https://', get_stylesheet_directory_uri() );

    }


    public function get_template() {

        if( $this->template ) {

            return $this->template;

        } else {

            global $template;
            return $this->template = basename( $template );
            
        }

    }

}