<?php



add_action( 'wp_enqueue_scripts', 'beaverbuilder_css_styles', 899);
/**
 * BeaverBuilder CSS styles.
 */
function beaverbuilder_css_styles() {
        wp_enqueue_style( 'bbcss' , get_stylesheet_directory_uri() . '/css/beaver.css', array(), '1.0.0', 'all' );
}


add_filter( 'image_size_names_choose', 'gc_custom_image_sizes' );
// Helps Beaver Builder see custom sizes.
function gc_custom_image_sizes( $sizes ) {
        global $_wp_additional_image_sizes;
        if ( empty($_wp_additional_image_sizes) )
                return $sizes;

        foreach ( $_wp_additional_image_sizes as $id => $data ) {
                if ( !isset($sizes[$id]) )
                        $sizes[$id] = ucfirst( str_replace( '-', ' ', $id ) );
        }
        return $sizes;
}
