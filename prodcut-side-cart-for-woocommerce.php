<?php 
/**
* Plugin Name: Product Side Cart For Woocommerce
* Description: This plugin allows you to Create Product Sidebar cart in WooCommerce. 
* Version: 1.0
* Copyright: 2023
* Text Domain: prodcut-side-cart-for-woocommerce
*/


if (!defined('ABSPATH')) {
    die('-1');
}


// define for base name
if (!defined('PSCFW_BASE_NAME')) {
    define('PSCFW_BASE_NAME', plugin_basename(__FILE__));
}

// define for plugin file
if (!defined('pscfw_plugin_file')) {
    define('pscfw_plugin_file', __FILE__);
}

// define for plugin dir path
if (!defined('PSCFW_PLUGIN_URL')) {
    define('PSCFW_PLUGIN_URL',plugins_url('', __FILE__));
}
if (!defined('PSCFW_PLUGIN_DIR')) {
    define('PSCFW_PLUGIN_DIR', plugin_dir_path(__FILE__));
}


// Include function files
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

include_once(PSCFW_PLUGIN_DIR.'includes/frontend.php');
include_once(PSCFW_PLUGIN_DIR.'includes/admin.php');


function PSCFW_load_script_style(){
    wp_enqueue_script('jquery', false, array(), false, false);
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_script( 'owlcarousel', PSCFW_PLUGIN_URL . '/public/js/owl.carousel.min.js', false, '1.0.0' );
    wp_enqueue_style( 'owlcarousel-min', PSCFW_PLUGIN_URL . '/public/css/owl.carousel.min.css', false, '1.0.0' );
    wp_enqueue_style( 'owlcarousel-theme', PSCFW_PLUGIN_URL . '/public/css/owl.theme.default.min.css', false, '1.0.0' );
    wp_enqueue_script( 'jquery-cartsidebar', PSCFW_PLUGIN_URL. '/public/js/design.js', array('jquery'), '1.0');
    wp_enqueue_script( 'jquery-effects-core' );
    $passarray =  array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'product' => get_option('atcaiofw_product'),
        'basekt_position' => get_option('basekt_position'),
        'product_sidebar_width' => get_option('atcmax_width','385'),
        'product_img_fly_to_cart' => get_option('pscfw_fly_to_cart','true'),
    );
    wp_localize_script( 'jquery-cartsidebar', 'addtocart_sidebar',$passarray);
    wp_enqueue_style( 'jquery-cartsidebar-style', PSCFW_PLUGIN_URL. '/public/css/design.css', '', '1.0' );
    wp_enqueue_script( 'jquery-cartsidebars', PSCFW_PLUGIN_URL. '/public/js/fontawesome.js', array('jquery'), '1.0');
}
add_action( 'wp_enqueue_scripts', 'PSCFW_load_script_style' );

function PSCFW_load_admin_script(){
    wp_enqueue_script('jquery', false, array(), false, false);
    wp_enqueue_script( 'wc-enhanced-select' );
    wp_enqueue_style( 'woocommerce_admin_styles' );
    wp_enqueue_style( 'woocommerce_admin_menu_styles' );
    wp_enqueue_script('jquery-ui-sortable');
    wp_enqueue_media();
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-alpha', PSCFW_PLUGIN_URL . '/admin/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '3.0.2', true );
    wp_add_inline_script(
        'wp-color-picker-alpha',
        'jQuery( function() { jQuery( ".color-picker" ).wpColorPicker(); } );'
    );
    wp_enqueue_style( 'jquery-admin-style', PSCFW_PLUGIN_URL. '/admin/css/design.css', '', '1.0' );
    // wp_enqueue_style( 'jquery-admin-select', PSCFW_PLUGIN_URL. '/admin/css/select2.min.css', '', '4.1.0' );
    // wp_enqueue_script( 'jquery-admin-select', PSCFW_PLUGIN_URL. '/admin/js/select2.min.js', '', '4.0.3');
    wp_enqueue_script( 'jquery-admin-cartsidebar', PSCFW_PLUGIN_URL. '/admin/js/design.js', array('jquery'), '1.0');
    $passarrays =  array( 
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
    );
    wp_localize_script( 'jquery-admin-cartsidebar', 'addtocart_backend', $passarrays);
}
add_action( 'admin_enqueue_scripts', 'PSCFW_load_admin_script' );
?>