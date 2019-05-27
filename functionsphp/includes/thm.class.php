<?php
/**
 * Theme utility class.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    FunctionsPhp
 * @subpackage FunctionsPhp/Includes/Theme
 */

namespace FunctionsPhp\Includes;


use \Exception;


class Thm {


    public function __construct() {


    }


    // Public Posts methods.


    public function get_title( $post = null , $tag = null , $link = false ) {

        $post = $this->determine_post( $post );

        $title =  $this->filter( 'the_title' , $post->post_title );

        if( $link ) {

            $url = get_permalink( $post->ID );
            $title = "\n<a href=\"{$url}\" title=\"{$title}\">{$title}</a>\n";

        }

        return $tag != null ? "<{$tag}>" . $title . "</{$tag}> \n" : $title;

    }


    public function get_content( $post = null ) {

        $post = $this->determine_post( $post );

        return $this->filter( 'the_content' , $post->post_content );

    }


    // Maybe use? https://codex.wordpress.org/Class_Reference/WP_Query
    public function get_children( $post = null , $callback = null ) {

        $post = $this->determine_post( $post );

        $children = $this->get_page_data( array(
            'sort_order' => 'asc',
            'child_of' => $post->ID,
            'parent' => $post->ID
        ));

        if( ! $callback ) {

            return $children;

        } else if ( is_callable( $callback ) ) {

            foreach( $children as $child ) {

                call_user_func( $callback , $child );

            }

        } else {

            throw new Exception('Get_Children: Passed argument is not a function.');

        }
        
    }


    public function get_posts( $post = null , $callback = null ) {

        $args = array(
            'posts_per_page'   => 20,
            'orderby'          => 'date',
            'order'            => 'DESC',
            'post_type'        => 'post',
            'post_status'      => 'publish',
        );

        $children = get_posts( $args );

        if( ! $callback ) {

            return $children;

        } else if ( is_callable( $callback ) ) {

            foreach( $children as $child ) {

                call_user_func( $callback , $child );

            }

        } else {

            throw new Exception('Get_Children: Passed argument is not a function.');

        }
        
    }


    // Public Image methods.


    public function get_image_src( $id = null , $size = 'full' ) {

        $id = $this->determine_img_id( $id );

        return $this->get_image_data( $id , $size , true );

    }


    public function get_image_tag( $id = null , $size = 'full', $class = null ) {

        $id = $this->determine_img_id( $id );

        $img_data = $this->get_image_data( $id , $size , true );

        $class_string = $class != null ? " class=\"{$class}\"" : "";

        return "<img itemprop=\"image\" src=\"{$img_data['src']}\"{$class_string} width=\"{$img_data['width']}\" height=\"{$img_data['height']}\" alt=\"{$img_data['alt']}\" />\n";

    }


    public function get_image_srcset( $id = null , $size = array( 'full' ) ) {

        $id = $this->determine_img_id( $id );

        $img_data = $this->get_image_data( $id , $size , true );

        $output = "";

        foreach( $img_data['sizes'] as $size ) {

            $output .= "<img src=\"{$img_data['src']}\" width=\"{$img_data['width']}\" height=\"{$img_data['height']}\" alt=\"{$img_data['alt']}\" title=\"{$img_data['title']}\" />";

        }
        
        return $output;

    }


    // Private Post methods.


    private function get_page_data( $options ) {

        // 'sort_order' => 'asc'
        // 'sort_column' => 'post_title'
        // 'hierarchical' => 1
        // 'exclude' => ''
        // 'include' => ''
        // 'meta_key' => ''
        // 'meta_value' => ''
        // 'authors' => ''
        // 'child_of' => 0
        // 'parent' => -1
        // 'exclude_tree' => ''
        // 'number' => ''
        // 'offset' => 0
        // 'post_type' => 'page'
        // 'post_status' => 'publish'

        return get_pages( $options );

    }


    private function determine_post( $testpost ) {

        if ( is_int( $testpost ) ) {

            return get_page( $testpost );

        } else if ( get_class( $testpost ) == 'WP_Post' ) {

            return $testpost;

        } else if ( $testpost == null ) {

            global $post;
            return $post;

        } else {

            throw new Exception('Determine_Post: Post can\'t be determined');

        }

    }


    private function filter( $type , $content ) {

        return do_shortcode( apply_filters( $type , $content ) );

    }


    // Private Image methods.


    private function determine_img_id( $testid ) {

        if ( is_int( $testid ) ) {

            return $testid;

        } else if ( get_class( $testid ) == 'WP_Post' ) {

            return get_post_thumbnail_id( $testid->ID );

        } else if ( $testid == null )  {

            global $post;
            return get_post_thumbnail_id( $post->ID );

        } else {

            throw new Exception('Determine_Img_Id: Image id can\'t be determined.');

        }
        
    }


    private function get_image_data( $id , $sizes = 'full' , $extended = true  ) {

        if( $extended ) {

            // Image meta values.
            $img_meta = get_post( $id );
            $img_data['description'] = $img_meta->post_content;
            $img_data['title'] = $img_meta->post_title;
            $img_data['caption'] = $img_meta->post_excerpt;

            // image alt text.
            $img_data['alt'] = get_post_meta( $id , '_wp_attachment_image_alt' , true );
        
        }  

        // Image source data.
        if( is_string ( $sizes ) ) {

            $img_src = wp_get_attachment_image_src( $id , $sizes );
            $img_data['src'] = $img_src[0];
            $img_data['width'] = $img_src[1];
            $img_data['height'] = $img_src[2];

        } else if( is_array ( $sizes ) ) {

            $i = 0;
            foreach( $sizes as $size ) {

                $img_src = wp_get_attachment_image_src( $id , $size );
                $img_data['sizes'][$i]['src'] = $img_src[0];
                $img_data['sizes'][$i]['width'] = $img_src[1];
                $img_data['sizes'][$i]['height'] = $img_src[2];
                $i++;

            }

        }

        return $img_data;

    }
    
}