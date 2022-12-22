<?php
/*
Plugin Name: ACF Slider Block
Description: A standalone distributable ACF 6.0 block that provides a slider.
Version: 1.0
Author: Patrick Hazard
Author URI: https://hazardawareness.com.au/
Text domain: hzd-slider-block
*/

// namespace Hazardawareness\Blocks;

define( 'HZD_PLUGIN_LOCATION', plugin_dir_path( __FILE__ ) );

/*
 * Load blocks
 *
 */
function hzd_register_acf_block() {
    // BUGFU not working with namespace - need to figure out
    // BUGFU::log( plugin_dir_path( __FILE__ ) . '/blocks/slider/block.json' );
    wp_register_script( 'hzd-slick', plugin_dir_url( __FILE__ ) . '/blocks/slider/slick/slick.js', [ 'jquery' ], '1.8.1', true );

    wp_enqueue_style( 'hzd-slick', plugin_dir_url( __FILE__ ) . '/blocks/slider/slick/slick.css', );
    wp_enqueue_style( 'hzd-slick-theme', plugin_dir_url( __FILE__ ) . '/blocks/slider/slick/slick-theme.css', );
    // wp_enqueue_style( 'hzd-slider', plugin_dir_url( __FILE__ ) . '/blocks/slider/slider.css', );
    // wp_enqueue_style( 'hzd-slide', plugin_dir_url( __FILE__ ) . '/blocks/slide/slide.css', );

    register_block_type(  HZD_PLUGIN_LOCATION . '/blocks/slider/block.json' );
    register_block_type(  HZD_PLUGIN_LOCATION . '/blocks/slide/block.json' );
}
add_action( 'init', 'hzd_register_acf_block', 5 );

 /**
  * Load ACF field groups for blocks
  */
 function hzd_load_acf_field_group( $paths ) {
     $paths[]=HZD_PLUGIN_LOCATION . '/blocks/slider';

     return $paths;
 }
 add_filter( 'acf/settings/load_json',  'hzd_load_acf_field_group' );

 // use Hazardawareness\Blocks
 // add_action( 'change_0_1', __NAMESPACE__ . '\change_0_1' );
