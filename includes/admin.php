<?php
add_action('admin_menu','pscfw_menu_settings');
function pscfw_menu_settings(){
    add_menu_page( 
        'Prodcut Side Cart', // page <title>Title</title>
        'Prodcut Side Cart', // menu link text
        'manage_options', // capability to access the page
        'pscfw_add_to_cart_generator', // page URL slug
        'pscfw_add_to_cart_settings', // callback function /w content
        'dashicons-cart', // menu icon
        5
    );
}
function pscfw_add_to_cart_settings(  ) { 

    global $pscfw_icon, $woocommerce;
    ?>
<?php 
if(isset($_REQUEST['message'])  && $_REQUEST['message'] == 'success'){ ?>
    <div class="notice notice-success is-dismissible"> 
        <p><strong><?php echo __( 'Setting saved successfully.', 'prodcut-side-cart-for-woocommerce' );?></strong></p>
    </div>
<?php } ?>

<div class="pscfw_main_container">
    <ul class="nav-tab-wrapper woo-nav-tab-wrapper">
        <li class="nav-tab nav-tab-active" data-tab="pscfw-tab-general"><?php echo __('General','prodcut-side-cart-for-woocommerce');?></li>
        <li class="nav-tab" data-tab="pscfw-tab-style-settings"><?php echo __('Side Cart Style','prodcut-side-cart-for-woocommerce');?></li>
        <li class="nav-tab" data-tab="pscfw-tab-text-url-settings"><?php echo __('Text/ Url','prodcut-side-cart-for-woocommerce');?></li>
    </ul>
    
<?php
settings_fields( 'pscfw_add_to_cart_generator' );
do_settings_sections( 'pscfw_add_to_cart_generator' );
?>
    <form action='<?php echo get_permalink(); ?>' id="pscfw-add-to-cart" method='post'>
        <div id="pscfw-tab-general" class="tab-content current"> 
            <h1><?php echo esc_html('Side Cart Basket','prodcut-side-cart-for-woocommerce'); ?></h1>
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row"><?php echo esc_html('Enable','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>

                            <input type="checkbox" name="atc_enable" value="true" <?php checked('true', get_option("atc_enable",'true')); ?> ><label><?php echo esc_html('Enable this option cart button will show.','prodcut-side-cart-for-woocommerce'); ?> </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Enable Mobile','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="checkbox" name="mobile_en" value="true" <?php checked('true', get_option("mobile_en",'true')); ?> ><label><?php echo esc_html('Enable this option mobile view.','prodcut-side-cart-for-woocommerce'); ?> </label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Show Product Count','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="checkbox" name="show_product_count" value="true" <?php checked('true', get_option("show_product_count",'true')); ?>><label><?php echo esc_html('Show Product Count','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Fly To Cart Animation','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="checkbox" name="pscfw_fly_to_cart" value="true" <?php checked('true', get_option("pscfw_fly_to_cart",'true')); ?>><label><?php echo esc_html('Enable/ Disable Product Image Fly To Cart Animation','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Basket Count','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <select name="backet_product_count">
                                <option value="count_quantity" <?php selected('count_quantity', get_option("backet_product_count","count_items")); ?>><?php echo esc_html('Sum of Quantity of all the products','prodcut-side-cart-for-woocommerce');?></option>
                                <option value="count_items" <?php selected('count_items', get_option("backet_product_count","count_items")); ?>><?php echo esc_html('Number of products','prodcut-side-cart-for-woocommerce');?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Cart Order','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <select name="pscfw_cart_order">
                                <option value="cart_order_asc" <?php selected('cart_order_asc', get_option("pscfw_cart_order","cart_order_asc")); ?>><?php echo esc_html('Recently added item at last (Asc)','prodcut-side-cart-for-woocommerce');?></option>
                                <option value="cart_order_desc" <?php selected('cart_order_desc', get_option("pscfw_cart_order","cart_order_asc")); ?>><?php echo esc_html('Recently added item on top (Desc)','prodcut-side-cart-for-woocommerce');?></option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="sidecart_header">
                <table class="form-table">
                    <h1><?php echo esc_html('Show Cart Basket','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('Do not show cart on pages','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <textarea name="pscfw_hide_basket_pages" rows="4" cols="50"><?php echo get_option('pscfw_hide_basket_pages'); ?></textarea><br><label><?php echo esc_html('Use post type/page id/slug separated by comma. For eg: post -> hello-world,contact-us .For page -> cart,checkout'); ?></label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="sidecart_header">
                <table class="form-table">
                    <h1><?php echo esc_html('Side Cart Header','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('Show','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="enable_header_close" value="true" <?php checked('true', get_option("enable_header_close",'true')); ?>><label><?php echo esc_html('Close Icon','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="sidecart_body">
                <table class="form-table">
                    <h1><?php echo esc_html('Side Cart Body','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('Show','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="enable_pro_img" value="true" <?php checked('true', get_option("enable_pro_img",'true')); ?>><label><?php echo esc_html('Product Image','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="enable_pro_name" value="true" <?php checked('true', get_option("enable_pro_name",'true')); ?>><label><?php echo esc_html('Product Name','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="enable_pro_price" value="true" <?php checked('true', get_option("enable_pro_price",'true')); ?>><label><?php echo esc_html('Product Price','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="enable_pro_total" value="true" <?php checked('true', get_option("enable_pro_total",'true')); ?>><label><?php echo esc_html('Product Total','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="enable_pro_qty" value="true" <?php checked('true', get_option("enable_pro_qty",'true')); ?>><label><?php echo esc_html('Product qty box','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="enable_pro_delete" value="true" <?php checked('true', get_option("enable_pro_delete",'true')); ?>><label><?php echo esc_html('Product Delete','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="enable_product_link" value="true" <?php checked('true', get_option("enable_product_link",'true')); ?>><label><?php echo esc_html('Link to Product Page','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="sidecart_slider">
                <table class="form-table">
                    <h1><?php echo esc_html('Side Cart Product Slider','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th><?php echo esc_html('Select Product','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <select class="pscfw_product_select_slider" name="pscfw_product_slider[]" multiple="multiple" style="width:100%;max-width:15em;">
                                <?php
                                    $product = get_option('pscfw_product_slider');
                                    if(!empty($product)){
                                    foreach ($product as $value) {
                                        $productc = wc_get_product( $value );
                                        if ( !empty($productc) && $productc->is_in_stock() && $productc->is_purchasable() ) {
                                            $title = $productc->get_name();
                                            if(isset($value)){
                                                $select = "selected";
                                            }else{
                                                $select = "";
                                            }
                                     ?>
                                        <option value="<?php echo esc_attr($value); ?>" <?php //echo $select; ?>selected="selected"><?php echo esc_attr($title); ?></option>
                                        <?php
                                            }
                                        }
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Enable On Desktop','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>

                            <input type="checkbox" name="slid_enable_desk" value="true" <?php checked('true', get_option("slid_enable_desk",'true')); ?>><label><?php echo esc_html('Enable This Option Product Slider Will Display On Desktop.','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Enable On Mobile','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>

                            <input type="checkbox" name="slid_enable_mob" value="true" <?php checked('true', get_option("slid_enable_mob",'true')); ?>><label><?php echo esc_html('Enable This Option Product Slider Will Display On Mobile.','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Show','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="enable_slider_img" value="true" <?php checked('true', get_option("enable_slider_img",'true')); ?>><label><?php echo esc_html('Product Image','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="enable_slider_pro_name" value="true" <?php checked('true', get_option("enable_slider_pro_name",'true')); ?>><label><?php echo esc_html('Product Name','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="enable_slider_pro_price" value="true" <?php checked('true', get_option("enable_slider_pro_price",'true')); ?>><label><?php echo esc_html('Product Price','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="enable_slider_btn" value="true" <?php checked('true', get_option("enable_slider_btn",'true')); ?>><label><?php echo esc_html('Add To Cart Button','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="sidecart_footer">
                <table class="form-table">
                    <h1><?php echo esc_html('Side Cart Footer','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('Show','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="display_subtotal" value="true" <?php checked('true', get_option("display_subtotal",'true')); ?>><label><?php echo esc_html('Subtotal','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="display_shipping_total" value="true" <?php checked('true', get_option("display_shipping_total",'true')); ?>><label><?php echo esc_html('Shipping Total','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                            <label class="pscfw_cart_body">
                                <input type="checkbox" name="display_total" value="true" <?php checked('true', get_option("display_total",'true')); ?>><label><?php echo esc_html('Total','prodcut-side-cart-for-woocommerce'); ?></label>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div id="pscfw-tab-style-settings" class="tab-content">
            <div class="sidecart_body">
                <table class="form-table">
                    <h1><?php echo esc_html('Side Cart','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('sidebar Width','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="number" name="atcmax_width" value="<?php echo esc_attr(get_option('atcmax_width','385')); ?>"><label class="pscfw_input_desc"><?php echo esc_html('Value in px (Default: 385).','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="sidecart_width">
                <table class="form-table">
                    <h1><?php echo esc_html('Side Cart Header','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('Heading Font Size','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="number" name="head_font_size" value="<?php echo esc_attr(get_option('head_font_size','28')); ?>"><label class="pscfw_input_desc"><?php echo esc_html('Value in px (Default: 28).','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Heading Position','prodcut-side-cart-for-woocommerce');?></th>
                        <td>
                            <select name="header_heading_position">
                                <option value="center" <?php selected('center', get_option("header_heading_position","center")); ?>><?php echo esc_html('Center','prodcut-side-cart-for-woocommerce');?></option>
                                <option value="left" <?php selected('left', get_option("header_heading_position","center")); ?>><?php echo esc_html('Left','prodcut-side-cart-for-woocommerce');?></option>
                                <option value="right" <?php selected('right', get_option("header_heading_position","center")); ?>><?php echo esc_html('Right','prodcut-side-cart-for-woocommerce');?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Close Icon Position','prodcut-side-cart-for-woocommerce');?></th>
                        <td>
                            <select name="header_close_position">
                                <option value="left" <?php selected('left', get_option("header_close_position","right")); ?>><?php echo esc_html('Left','prodcut-side-cart-for-woocommerce');?></option>
                                <option value="right" <?php selected('right', get_option("header_close_position","right")); ?>><?php echo esc_html('Right','prodcut-side-cart-for-woocommerce');?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Background Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#f8f8f8" name="shead_color" value="<?php echo esc_attr(get_option('shead_color','#f8f8f8')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Header Border Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#b7b7b7" name="shborder_color" value="<?php echo esc_attr(get_option('shborder_color','#b7b7b7')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Header Border style','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                          <select name="shb_style" class="shb_border">
                            <option value="solid" <?php selected('solid', get_option("shb_style","solid")) ?>><?php echo esc_html('Solid','prodcut-side-cart-for-woocommerce'); ?></option>
                            <option value="dotted" <?php selected('dotted', get_option("shb_style","solid")) ?>><?php echo esc_html('Dotted','prodcut-side-cart-for-woocommerce'); ?></option>
                            <option value="dashed" <?php selected('dashed', get_option("shb_style","solid")) ?>><?php echo esc_html('Dashed','prodcut-side-cart-for-woocommerce'); ?></option>
                          </select>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Header Title Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#000000" name="shthead_color" value="<?php echo esc_attr(get_option('shthead_color','#000000')); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="sidecart_body">
                <table class="form-table">
                    <h1><?php echo esc_html('Side Cart Body','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('Background Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#fff" name="clpback_color" value="<?php echo esc_attr(get_option('clpback_color','#fff')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Image Width','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="number" name="clpimg_width" value="<?php echo esc_attr(get_option('clpimg_width','100')); ?>"><label class="pscfw_input_desc"><?php echo esc_html('Value in px (Default: 100).','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Product Image Border Radius','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="number" name="pib_radious" value="<?php echo esc_attr(get_option('pib_radious','0')); ?>"><label class="pscfw_input_desc"><?php echo esc_html('Value in px.','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Product Title Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#000000" name="ptc_color" value="<?php echo esc_attr(get_option('ptc_color','#000000')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Product Title Hover Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#ff9065" name="pth_hover" value="<?php echo esc_attr(get_option('pth_hover','#ff9065')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Product Price Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#000000" name="prop_color" value="<?php echo esc_attr(get_option('prop_color','#000000')); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="sidecart_slider">
                <table class="form-table">
                    <h1><?php echo esc_html('Side Cart Product Slider','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('Image Width','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="number" name="slider_img_width" value="<?php echo esc_attr(get_option('slider_img_width','90')); ?>"><label class="pscfw_input_desc"><?php echo esc_html('Value in px (Default: 90).','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Font Size','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="number" name="slider_font_size" value="<?php echo esc_attr(get_option('slider_font_size','16')); ?>"><label class="pscfw_input_desc"><?php echo esc_html('Value in px (Default: 16).','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Product Title Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#046bd2" name="slider_pro_title_color" value="<?php echo esc_attr(get_option('slider_pro_title_color','#046bd2')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Background Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#f8f8f8" name="slider_back_color" value="<?php echo esc_attr(get_option('slider_back_color','#f8f8f8')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Button Background Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#000000" name="slider_btn_back_color" value="<?php echo esc_attr(get_option('slider_btn_back_color','#000000')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Button Text Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#ffffff" name="slider_btn_text_color" value="<?php echo esc_attr(get_option('slider_btn_text_color','#ffffff')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Button Background Hover Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#045cb4" name="slider_btn_back_hover_color" value="<?php echo esc_attr(get_option('slider_btn_back_hover_color','#045cb4')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Button Hover Text Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#ffffff" name="slider_btn_hover_text_color" value="<?php echo esc_attr(get_option('slider_btn_hover_text_color','#ffffff')); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="sidecart_footer">
                <table class="form-table">
                    <h1><?php echo esc_html('Side Cart Footer (button)','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('Button Font Size','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="number" name="btn_font_size" value="<?php echo esc_attr(get_option('btn_font_size','15')); ?>"><label class="pscfw_input_desc"><?php echo esc_html('Value in px (Default: 16).','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Button Row','prodcut-side-cart-for-woocommerce');?></th>
                        <td>
                            <select name="pscfw_btn_row" class="pscfw_btn_row">
                                <option value="one_row" <?php selected('one_row', get_option("pscfw_btn_row","one_row")); ?>><?php echo esc_html('One in a row ( 1+1+1 )','prodcut-side-cart-for-woocommerce');?></option>
                                <option value="two_one_row" <?php selected('two_one_row', get_option("pscfw_btn_row","one_row")); ?>><?php echo esc_html('Two in first row ( 2 + 1 )','prodcut-side-cart-for-woocommerce');?></option>
                                <option value="one_two_row" <?php selected('one_two_row', get_option("pscfw_btn_row","one_row")); ?>><?php echo esc_html('Two in last row ( 1 + 2 )','prodcut-side-cart-for-woocommerce');?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Button Padding','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" name="pscfw_fbtn_padding" value="<?php echo esc_attr(get_option('pscfw_fbtn_padding','8px 20px')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Button Position', 'prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <ul class="sortable ui-sortable">
                            <?php
                                $button_positions = get_option('pscfw_button_position', array());
                                $button_positions = array_unique($button_positions);
                                /*echo "<pre>";
                                print_r(get_option('pscfw_button_position', array()));
                                print_r($button_positions);
                                echo "</pre>";*/
                                foreach ($button_positions as $position) {
                                    switch ($position) {
                                        case 'cart':
                                            ?>
                                            <li class="pscfw-sortable-handle">
                                                <input name="pscfw_button_position[]" type="hidden" value="cart">
                                                View Cart
                                            </li>
                                            <?php
                                            break;
                                        case 'checkout':
                                            ?>
                                            <li class="pscfw-sortable-handle">
                                                <input name="pscfw_button_position[]" type="hidden" value="checkout">
                                                Checkout Now
                                            </li>
                                            <?php
                                            break;
                                        case 'keepshopping':
                                            ?>
                                            <li class="pscfw-sortable-handle">
                                                <input name="pscfw_button_position[]" type="hidden" value="keepshopping">
                                                Keep Shopping
                                            </li>
                                            <?php
                                            break;
                                    }
                                }
                                ?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Background Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#f8f8f8" name="atcfb_color" value="<?php echo esc_attr(get_option('atcfb_color','#f8f8f8')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Button background Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#000000" name="cbc_color" value="<?php echo esc_attr(get_option('cbc_color','#000000')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Button background Hover Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#3cb247" name="cbh_color" value="<?php echo esc_attr(get_option('cbh_color','#3cb247')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Button Text Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#ffffff" name="btn_text_color" value="<?php echo esc_attr(get_option('btn_text_color','#ffffff')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Button Text Hover Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#000" name="btnh_color" value="<?php echo esc_attr(get_option('btnh_color','#000')); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="footer_contain">
                <table class="form-table">
                    <h1><?php echo esc_html('Basket Setting','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th><?php echo esc_html('Basket Position','prodcut-side-cart-for-woocommerce');?></th>
                        <td>
                            <select name="basekt_position">
                                <option value="right" <?php selected('right', get_option("basekt_position","right")); ?>><?php echo esc_html('Right','prodcut-side-cart-for-woocommerce');?></option>
                                <option value="left" <?php selected('left', get_option("basekt_position","right")); ?>><?php echo esc_html('Left','prodcut-side-cart-for-woocommerce');?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Basket Shape','prodcut-side-cart-for-woocommerce');?></th>
                        <td>
                            <select name="basekt_shape">
                                <option value="square" <?php selected('square', get_option("basekt_shape","round")); ?>><?php echo esc_html('Square','prodcut-side-cart-for-woocommerce');?></option>
                                <option value="round" <?php selected('round', get_option("basekt_shape","round")); ?>><?php echo esc_html('Round','prodcut-side-cart-for-woocommerce');?></option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Basket Offset ↨','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="number" name="basket_up_offset" value="<?php echo esc_attr(get_option('basket_up_offset','15')); ?>"><label class="pscfw_input_desc"><?php echo esc_html('Value in px (Default: 15).','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Basket Offset ⟷','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="number" name="basket_down_offset" value="<?php echo esc_attr(get_option('basket_down_offset','15')); ?>"><label class="pscfw_input_desc"><?php echo esc_html('Value in px (Default: 15).','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Select Cart','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="radio" name="basket_icon" value="cart_1" <?php checked('cart_1',get_option('basket_icon')); ?> checked><label for="label-1"><?php echo $pscfw_icon['cart_1']; ?></label>
                            <input type="radio" name="basket_icon" value="cart_2" <?php checked('cart_2',get_option('basket_icon')); ?>><label for="label-1"><?php echo $pscfw_icon['cart_2']; ?></label>
                            <input type="radio" name="basket_icon" value="cart_3" <?php checked('cart_3',get_option('basket_icon')); ?>><label for="label-1"><?php echo $pscfw_icon['cart_3']; ?></label>
                            <input type="radio" name="basket_icon" value="cart_4" <?php checked('cart_4',get_option('basket_icon')); ?>><label for="label-1"><?php echo $pscfw_icon['cart_4']; ?></label>
                            <input type="radio" name="basket_icon" value="cart_5" <?php checked('cart_5',get_option('basket_icon')); ?>><label for="label-1"><?php echo $pscfw_icon['cart_5']; ?></label>
                            <input type="radio" name="basket_icon" value="cart_6" <?php checked('cart_6',get_option('basket_icon')); ?>><label for="label-1"><?php echo $pscfw_icon['cart_6']; ?></label>
                            <input type="radio" name="basket_icon" value="cart_7" <?php checked('cart_7',get_option('basket_icon')); ?>><label for="label-1"><?php echo $pscfw_icon['cart_7']; ?></label>
                            <input type="radio" name="basket_icon" value="cart_8" <?php checked('cart_8',get_option('basket_icon')); ?>><label for="label-1"><?php echo $pscfw_icon['cart_8']; ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Custom Backet Icon','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <div>
                                <input type="hidden" name="pscfw_cart_image" id="pscfw_cart_image" value="<?php echo get_option('pscfw_cart_image'); ?>">
                                <input type="button" name="pscfw_image_upload_button" id="pscfw_image_upload_button" class="button-primary" value="Upload Image">
                                <input type="button" name="pscfw_image_remove_button" id="pscfw_image_remove_button" class="button-secondary" value="Remove Image">
                            </div>
                            <div>
                                <img src="<?php echo get_option('pscfw_cart_image'); ?>" id="pscfw_image_preview" style="max-width: 100px; max-height: 100px;">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Basket Icon Size','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="number" name="basket_size" value="<?php echo esc_attr(get_option('basket_size','30')); ?>"><label class="pscfw_input_desc"><?php echo esc_html('Value in px (Default: 30).','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Basket Background Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#000000" name="basket_bg_color" value="<?php echo esc_attr(get_option('basket_bg_color','#000000')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Basket Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#ffffff" name="basket_color" value="<?php echo esc_attr(get_option('basket_color','#ffffff')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th><?php echo esc_html('Basket Count Position','prodcut-side-cart-for-woocommerce');?></th>
                        <td>
                            <select name="basket_count_position">
                                <option value="top_right" <?php selected('top_right', get_option("basket_count_position","top_right")); ?>><?php echo esc_html('Top right','prodcut-side-cart-for-woocommerce');?></option>
                                <option value="top_left" <?php selected('top_left', get_option("basket_count_position","top_right")); ?>><?php echo esc_html('Top Left','prodcut-side-cart-for-woocommerce');?></option>
                            </select>
                        </td>
                    </tr>  
                    <tr>
                        <th scope="row"><?php echo esc_html('Count Text Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#ffffff" name="count_text_color" value="<?php echo esc_attr(get_option('count_text_color','#ffffff')); ?>">
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Count Background Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#12b99a" name="count_bg_color" value="<?php echo esc_attr(get_option('count_bg_color','#12b99a')); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="footer_contain">
                <table class="form-table">
                    <h1><?php echo esc_html('Trash Icon Setting','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th><?php echo esc_html('Delete Type','prodcut-side-cart-for-woocommerce');?></th>
                        <td>
                            <select name="pscfw_delete_type" id="pscfw_delete_type" class="pscfw_delete_type">
                                <option value="pscfw_delete_icon" <?php selected('pscfw_delete_icon', get_option("pscfw_delete_type","pscfw_delete_icon")); ?>><?php echo esc_html('Icon','prodcut-side-cart-for-woocommerce');?></option>
                                <option value="pscfw_delete_text" <?php selected('pscfw_delete_text', get_option("pscfw_delete_type","pscfw_delete_icon")); ?>><?php echo esc_html('Text','prodcut-side-cart-for-woocommerce');?></option>
                            </select>
                        </td>
                    </tr>
                    <tr id="pscfw_remove_icon" class="pscfw_remove_icon">
                        <th scope="row"><?php echo esc_html('Select Trash Icon','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="radio" name="trash_icon" value="trash_icon1" <?php checked('trash_icon1',get_option('trash_icon')); ?> checked><label for="label-1" class="trash_radio"><?php echo $pscfw_icon['trash_icon1']; ?></label>
                            <input type="radio" name="trash_icon" value="trash_icon2" <?php checked('trash_icon2',get_option('trash_icon')); ?>><label for="label-1" class="trash_radio"><?php echo $pscfw_icon['trash_icon2']; ?></label>
                            <input type="radio" name="trash_icon" value="trash_icon3" <?php checked('trash_icon3',get_option('trash_icon')); ?>><label for="label-1" class="trash_radio"><?php echo $pscfw_icon['trash_icon3']; ?></label>
                            <input type="radio" name="trash_icon" value="trash_icon4" <?php checked('trash_icon4',get_option('trash_icon')); ?>><label for="label-1" class="trash_radio"><?php echo $pscfw_icon['trash_icon4']; ?></label>
                            <input type="radio" name="trash_icon" value="trash_icon5" <?php checked('trash_icon5',get_option('trash_icon')); ?>><label for="label-1" class="trash_radio"><?php echo $pscfw_icon['trash_icon5']; ?></label>
                            <input type="radio" name="trash_icon" value="trash_icon6" <?php checked('trash_icon6',get_option('trash_icon')); ?>><label for="label-1" class="trash_radio"><?php echo $pscfw_icon['trash_icon6']; ?></label>
                            <input type="radio" name="trash_icon" value="trash_icon7" <?php checked('trash_icon7',get_option('trash_icon')); ?>><label for="label-1" class="trash_radio"><?php echo $pscfw_icon['trash_icon7']; ?></label>
                            <input type="radio" name="trash_icon" value="trash_icon8" <?php checked('trash_icon8',get_option('trash_icon')); ?>><label for="label-1" class="trash_radio"><?php echo $pscfw_icon['trash_icon8']; ?></label>
                        </td>
                    </tr>
                    <tr class="pscfw_remove_icon">
                        <th scope="row"><?php echo esc_html('Trash Icon Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#808b97" name="pd_color" value="<?php echo esc_attr(get_option('pd_color','#808b97')); ?>">
                        </td>
                    </tr>
                    <tr class="pscfw_remove_icon">
                        <th scope="row"><?php echo esc_html('Trash Icon Hover Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#ff0000" name="pdc_hover" value="<?php echo esc_attr(get_option('pdc_hover','#ff0000')); ?>">
                        </td>
                    </tr>
                    <tr id="pscfw_remove_text" class="pscfw_remove_text">
                        <th><?php echo esc_html('Delete Button Text','prodcut-side-cart-for-woocommerce');?></th>
                        <td>
                            <input type="text" name="delete_btn_text" value="<?php echo esc_attr(get_option('delete_btn_text','REMOVE')); ?>">
                        </td>
                    </tr>
                    <tr class="pscfw_remove_text">
                        <th scope="row"><?php echo esc_html('Text Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#000000" name="pscfw_remove_text_color" value="<?php echo esc_attr(get_option('pscfw_remove_text_color','#000000')); ?>">
                        </td>
                    </tr>
                    <tr class="pscfw_remove_text">
                        <th scope="row"><?php echo esc_html('Text Hover Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#000000" name="pscfw_remove_text_hover_color" value="<?php echo esc_attr(get_option('pscfw_remove_text_hover_color','#000000')); ?>">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="footer_contain">
                <table class="form-table">
                    <h1><?php echo esc_html('Close Icon Setting','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('Select Close Icon','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="radio" name="close_icon" value="close_icon_1" <?php checked('close_icon_1',get_option('close_icon')); ?> checked><label for="label-1" class="close_radio"><?php echo $pscfw_icon['close_icon_1']; ?></label>
                            <input type="radio" name="close_icon" value="close_icon_2" <?php checked('close_icon_2',get_option('close_icon')); ?>><label for="label-1" class="close_radio"><?php echo $pscfw_icon['close_icon_2']; ?></label>
                            <input type="radio" name="close_icon" value="close_icon_3" <?php checked('close_icon_3',get_option('close_icon')); ?>><label for="label-1" class="close_radio"><?php echo $pscfw_icon['close_icon_3']; ?></label>
                            <input type="radio" name="close_icon" value="close_icon_4" <?php checked('close_icon_4',get_option('close_icon')); ?>><label for="label-1" class="close_radio"><?php echo $pscfw_icon['close_icon_4']; ?></label>
                            <input type="radio" name="close_icon" value="close_icon_5" <?php checked('close_icon_5',get_option('close_icon')); ?>><label for="label-1" class="close_radio"><?php echo $pscfw_icon['close_icon_5']; ?></label>
                            <input type="radio" name="close_icon" value="close_icon_6" <?php checked('close_icon_6',get_option('close_icon')); ?>><label for="label-1" class="close_radio"><?php echo $pscfw_icon['close_icon_6']; ?></label>
                            <input type="radio" name="close_icon" value="close_icon_7" <?php checked('close_icon_7',get_option('close_icon')); ?>><label for="label-1" class="close_radio"><?php echo $pscfw_icon['close_icon_7']; ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Close Icon Size','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="number" name="head_close_size" value="<?php echo esc_attr(get_option('head_close_size','28')); ?>"><label class="pscfw_input_desc"><?php echo esc_html('Value in px (Default: 28).','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Close Icon Color','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" data-alpha-enabled="true" class="color-picker" data-default-color="#000000" name="close_icon_color" value="<?php echo esc_attr(get_option('close_icon_color','#000000')); ?>"/>
                        </td>
                    </tr>
                    
                </table>
            </div>
        </div>
        <div id="pscfw-tab-text-url-settings" class="tab-content"> 
            <span class="pscfw_desc_element"><?php echo esc_html('To Remove Element Leave text or Link Empty','prodcut-side-cart-for-woocommerce'); ?></span>
            <h1><?php echo esc_html('Text','prodcut-side-cart-for-woocommerce'); ?></h1>
            <table class="form-table" role="presentation">
                <tbody>
                    <tr>
                        <th scope="row"><?php echo esc_html('Cart Heading','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" name="cart_head_text" value="<?php echo esc_attr(get_option('cart_head_text','Your Cart')); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Cart Button','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" name="cart_btn_text" value="<?php echo esc_attr(get_option('cart_btn_text','View Cart')); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Checkout Text','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" name="checkout_btn_text" value="<?php echo esc_attr(get_option('checkout_btn_text','Checkout Now')); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Keep Shopping Text','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" name="shopping_btn_text" value="<?php echo esc_attr(get_option('shopping_btn_text','Keep Shopping')); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Empty Cart Text','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" name="empty_cart_text" value="<?php echo esc_attr(get_option('empty_cart_text','Your cart is empty.')); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Return To Shop Button','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" name="return_shop_text" value="<?php echo esc_attr(get_option('return_shop_text','Return to Shop')); ?>"/>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="sidecart_url">
                <table class="form-table">
                    <h1><?php echo esc_html('Url','prodcut-side-cart-for-woocommerce'); ?></h1>
                    <tr>
                        <th scope="row"><?php echo esc_html('Cart Url','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" name="cart_btn_url" value="<?php echo esc_attr(get_option('cart_btn_url',wc_get_cart_url())); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Checkout Url','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" name="checkout_btn_url" value="<?php echo esc_attr(get_option('checkout_btn_url',wc_get_checkout_url())); ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row"><?php echo esc_html('Continue Shopping','prodcut-side-cart-for-woocommerce'); ?></th>
                        <td>
                            <input type="text" name="continue_shopping_btn_url" value="<?php echo esc_attr(get_option('continue_shopping_btn_url','#')); ?>"/><label class="pscfw_input_desc"><?php echo esc_html('Use # to close side cart & remain on the same page','prodcut-side-cart-for-woocommerce'); ?></label>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <p class="submit">
            <input type="hidden" name="action" value="pscfw_save_option">
            <input type="submit" value="Save changes" name="submit" class="button-primary" id="pscfw-btn-space">
        </p>
    </form>
</div>

  <?php
}

function pscfw_recursive_sanitize_text_field($array) {
    if(!empty($array)) {
        foreach ( $array as $key => $value ) {
            if ( is_array( $value ) ) {
                $value = pscfw_recursive_sanitize_text_field($value);
            }else{
                $value = sanitize_text_field( $value );
            }
        }
    }
    return $array;
}

add_action('init','pscfw_atcaiofw_add_setting_type');

function pscfw_atcaiofw_add_setting_type(){
    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'pscfw_save_option') {

        if (isset($_REQUEST['pscfw_cart_image'])) {
            update_option('pscfw_cart_image', sanitize_text_field($_POST['pscfw_cart_image']));
        }

        if (isset($_REQUEST['atcmax_width'])) {
            update_option('atcmax_width',sanitize_text_field($_REQUEST['atcmax_width']));
        }else{
            update_option('atcmax_width','');
        }
        if(!empty($_REQUEST['atc_enable'])) {
            update_option('atc_enable',sanitize_text_field($_REQUEST['atc_enable']));
        }else{
            update_option('atc_enable','');
        }
        if(!empty($_REQUEST['mobile_en'])) {
            update_option('mobile_en',sanitize_text_field($_REQUEST['mobile_en']));
        }else{
            update_option('mobile_en','');
        }
        update_option('shead_color',sanitize_text_field($_REQUEST['shead_color']));
        update_option('shborder_color',sanitize_text_field($_REQUEST['shborder_color']));
        update_option('shb_style',sanitize_text_field($_REQUEST['shb_style']));
        update_option('shthead_color',sanitize_text_field($_REQUEST['shthead_color']));
        update_option('clpback_color',sanitize_text_field($_REQUEST['clpback_color']));
        update_option('clpimg_width',sanitize_text_field($_REQUEST['clpimg_width']));
        update_option('pib_radious',sanitize_text_field($_REQUEST['pib_radious']));
        update_option('ptc_color',sanitize_text_field($_REQUEST['ptc_color']));
        update_option('pth_hover',sanitize_text_field($_REQUEST['pth_hover']));
        update_option('prop_color',sanitize_text_field($_REQUEST['prop_color']));
        update_option('pd_color',sanitize_text_field($_REQUEST['pd_color']));
        update_option('pdc_hover',sanitize_text_field($_REQUEST['pdc_hover']));
        if(!empty($_REQUEST['pscfw_product_slider'])) {
            update_option('pscfw_product_slider',pscfw_recursive_sanitize_text_field($_REQUEST['pscfw_product_slider']));
        }else{
            update_option('pscfw_product_slider','');
        }

        update_option('slider_img_width',sanitize_text_field($_REQUEST['slider_img_width']));
        update_option('slider_font_size',sanitize_text_field($_REQUEST['slider_font_size']));
        update_option('slider_pro_title_color',sanitize_text_field($_REQUEST['slider_pro_title_color']));
        update_option('slider_back_color',sanitize_text_field($_REQUEST['slider_back_color']));
        update_option('slider_btn_back_color',sanitize_text_field($_REQUEST['slider_btn_back_color']));
        update_option('slider_btn_text_color',sanitize_text_field($_REQUEST['slider_btn_text_color']));
        update_option('slider_btn_back_hover_color',sanitize_text_field($_REQUEST['slider_btn_back_hover_color']));
        update_option('slider_btn_hover_text_color',sanitize_text_field($_REQUEST['slider_btn_hover_text_color']));
        if(!empty($_REQUEST['slid_enable_desk'])){
            update_option('slid_enable_desk',sanitize_text_field($_REQUEST['slid_enable_desk']));
        }else{
            update_option('slid_enable_desk','');
        }

        if(!empty($_REQUEST['slid_enable_mob'])){
            update_option('slid_enable_mob',sanitize_text_field($_REQUEST['slid_enable_mob']));
        }else{
            update_option('slid_enable_mob','');
        }

        if(!empty($_REQUEST['display_subtotal'])){
            update_option('display_subtotal',sanitize_text_field($_REQUEST['display_subtotal']));
        }else{
            update_option('display_subtotal','');
        }

        if(!empty($_REQUEST['display_shipping_total'])){
            update_option('display_shipping_total',sanitize_text_field($_REQUEST['display_shipping_total']));
        }else{
            update_option('display_shipping_total','');
        }

        if(!empty($_REQUEST['display_total'])){
            update_option('display_total',sanitize_text_field($_REQUEST['display_total']));
        }else{
            update_option('display_total','');
        }

        if(!empty($_REQUEST['enable_pro_img'])){
            update_option('enable_pro_img',sanitize_text_field($_REQUEST['enable_pro_img']));
        }else{
            update_option('enable_pro_img','');
        }

        if(!empty($_REQUEST['enable_pro_name'])){
            update_option('enable_pro_name',sanitize_text_field($_REQUEST['enable_pro_name']));
        }else{
            update_option('enable_pro_name','');
        }

        if(!empty($_REQUEST['enable_pro_price'])){
            update_option('enable_pro_price',sanitize_text_field($_REQUEST['enable_pro_price']));
        }else{
            update_option('enable_pro_price','');
        }

        if(!empty($_REQUEST['enable_pro_total'])){
            update_option('enable_pro_total',sanitize_text_field($_REQUEST['enable_pro_total']));
        }else{
            update_option('enable_pro_total','');
        }

        if(!empty($_REQUEST['enable_pro_qty'])){
            update_option('enable_pro_qty',sanitize_text_field($_REQUEST['enable_pro_qty']));
        }else{
            update_option('enable_pro_qty','');
        }

        if(!empty($_REQUEST['enable_pro_delete'])){
            update_option('enable_pro_delete',sanitize_text_field($_REQUEST['enable_pro_delete']));
        }else{
            update_option('enable_pro_delete','');
        }

        if(!empty($_REQUEST['enable_product_link'])){
            update_option('enable_product_link',sanitize_text_field($_REQUEST['enable_product_link']));
        }else{
            update_option('enable_product_link','');
        }

        if(!empty($_REQUEST['enable_header_close'])){
            update_option('enable_header_close',sanitize_text_field($_REQUEST['enable_header_close']));
        }else{
            update_option('enable_header_close','');
        }

        if(!empty($_REQUEST['show_product_count'])){
            update_option('show_product_count',sanitize_text_field($_REQUEST['show_product_count']));
        }else{
            update_option('show_product_count','');
        }

        if(!empty($_REQUEST['pscfw_fly_to_cart'])){
            update_option('pscfw_fly_to_cart',sanitize_text_field($_REQUEST['pscfw_fly_to_cart']));
        }else{
            update_option('pscfw_fly_to_cart','');
        }

        if(!empty($_REQUEST['enable_slider_img'])){
            update_option('enable_slider_img',sanitize_text_field($_REQUEST['enable_slider_img']));
        }else{
            update_option('enable_slider_img','');
        }

        if(!empty($_REQUEST['enable_slider_pro_name'])){
            update_option('enable_slider_pro_name',sanitize_text_field($_REQUEST['enable_slider_pro_name']));
        }else{
            update_option('enable_slider_pro_name','');
        }

        if(!empty($_REQUEST['enable_slider_pro_price'])){
            update_option('enable_slider_pro_price',sanitize_text_field($_REQUEST['enable_slider_pro_price']));
        }else{
            update_option('enable_slider_pro_price','');
        }

        if(!empty($_REQUEST['enable_slider_btn'])){
            update_option('enable_slider_btn',sanitize_text_field($_REQUEST['enable_slider_btn']));
        }else{
            update_option('enable_slider_btn','');
        }
        update_option('atcfb_color',sanitize_text_field($_REQUEST['atcfb_color']));
        update_option('cbc_color',sanitize_text_field($_REQUEST['cbc_color']));
        update_option('cbh_color',sanitize_text_field($_REQUEST['cbh_color']));
        update_option('btn_text_color',sanitize_text_field($_REQUEST['btn_text_color']));
        update_option('btnh_color',sanitize_text_field($_REQUEST['btnh_color']));
        update_option('cart_head_text',sanitize_text_field($_REQUEST['cart_head_text']));
        update_option('cart_btn_text',sanitize_text_field($_REQUEST['cart_btn_text']));
        update_option('checkout_btn_text',sanitize_text_field($_REQUEST['checkout_btn_text']));
        update_option('shopping_btn_text',sanitize_text_field($_REQUEST['shopping_btn_text']));
        update_option('empty_cart_text',sanitize_text_field($_REQUEST['empty_cart_text']));
        update_option('return_shop_text',sanitize_text_field($_REQUEST['return_shop_text']));
        update_option('cart_btn_url',sanitize_text_field($_REQUEST['cart_btn_url']));
        update_option('checkout_btn_url',sanitize_text_field($_REQUEST['checkout_btn_url']));
        update_option('continue_shopping_btn_url',sanitize_text_field($_REQUEST['continue_shopping_btn_url']));
        update_option('basket_bg_color',sanitize_text_field($_REQUEST['basket_bg_color']));
        update_option('basket_color',sanitize_text_field($_REQUEST['basket_color']));
        update_option('basket_count_position',sanitize_text_field($_REQUEST['basket_count_position']));
        update_option('count_text_color',sanitize_text_field($_REQUEST['count_text_color']));
        update_option('count_bg_color',sanitize_text_field($_REQUEST['count_bg_color']));
        update_option('close_icon',sanitize_text_field($_REQUEST['close_icon']));
        update_option('close_icon_color',sanitize_text_field($_REQUEST['close_icon_color']));
        update_option('trash_icon',sanitize_text_field($_REQUEST['trash_icon']));
        update_option('pscfw_delete_type',sanitize_text_field($_REQUEST['pscfw_delete_type']));
        update_option('delete_btn_text',sanitize_text_field($_REQUEST['delete_btn_text']));
        update_option('pscfw_remove_text_color',sanitize_text_field($_REQUEST['pscfw_remove_text_color']));
        update_option('pscfw_remove_text_hover_color',sanitize_text_field($_REQUEST['pscfw_remove_text_hover_color']));
        update_option('basket_icon',sanitize_text_field($_REQUEST['basket_icon']));
        update_option('basket_size',sanitize_text_field($_REQUEST['basket_size']));
        update_option('basket_up_offset',sanitize_text_field($_REQUEST['basket_up_offset']));
        update_option('basket_down_offset',sanitize_text_field($_REQUEST['basket_down_offset']));
        update_option('head_font_size',sanitize_text_field($_REQUEST['head_font_size']));
        update_option('head_close_size',sanitize_text_field($_REQUEST['head_close_size']));
        update_option('header_heading_position',sanitize_text_field($_REQUEST['header_heading_position']));
        update_option('header_close_position',sanitize_text_field($_REQUEST['header_close_position']));
        update_option('basekt_position',sanitize_text_field($_REQUEST['basekt_position']));
        update_option('basekt_shape',sanitize_text_field($_REQUEST['basekt_shape']));
        update_option('backet_product_count',sanitize_text_field($_REQUEST['backet_product_count']));
        update_option('pscfw_cart_order',sanitize_text_field($_REQUEST['pscfw_cart_order']));
        

        update_option('pscfw_hide_basket_pages',sanitize_text_field($_REQUEST['pscfw_hide_basket_pages']));
        
        update_option('btn_font_size',sanitize_text_field($_REQUEST['btn_font_size']));
        update_option('pscfw_btn_row',sanitize_text_field($_REQUEST['pscfw_btn_row']));
        update_option('pscfw_fbtn_padding',sanitize_text_field($_REQUEST['pscfw_fbtn_padding']));

        wp_redirect( admin_url( '/admin.php?page=pscfw_add_to_cart_generator&message=success' ));
    }
}

register_activation_hook(pscfw_plugin_file, 'pscfw_install_default_value');

function pscfw_install_default_value() {
    update_option('atcmax_width','385');
    update_option('atc_enable','true');
    update_option('mobile_en','true');
    update_option('shead_color','#f8f8f8');
    update_option('shborder_color','#b7b7b7');
    update_option('shb_style','solid');
    update_option('shthead_color','#000000');
    update_option('clpback_color','#fff');
    update_option('clpimg_width','100');
    update_option('pib_radious','0');
    update_option('ptc_color','#000000');
    update_option('pth_hover','#ff9065');
    update_option('prop_color','#000000');
    update_option('pd_color','#808b97');
    update_option('pdc_hover','#ff0000');
    update_option('slider_img_width','90');
    update_option('slider_font_size','16');
    update_option('slider_pro_title_color','#046bd2');
    update_option('slider_back_color','#f8f8f8');
    update_option('slider_btn_back_color','#000000');
    update_option('slider_btn_text_color','#ffffff');
    update_option('slider_btn_back_hover_color','#045cb4');
    update_option('slider_btn_hover_text_color','#ffffff');
    update_option('slid_enable_desk','true');
    update_option('slid_enable_mob','true');
    update_option('display_subtotal','true');
    update_option('display_shipping_total','true');
    update_option('display_total','true');
    update_option('btn_font_size','15');
    update_option('pscfw_btn_row','one_row');
    update_option('pscfw_fbtn_padding','8px 20px');
    update_option('atcfb_color','#f8f8f8');
    update_option('cbc_color','#000000');
    update_option('cbh_color','#3cb247');
    update_option('btn_text_color','#ffffff');
    update_option('btnh_color','#000');
    update_option('cart_head_text','Your Cart');
    update_option('cart_btn_text','View Cart');
    update_option('checkout_btn_text','Checkout Now');
    update_option('shopping_btn_text','Keep Shopping');
    update_option('empty_cart_text','Your cart is empty.');
    update_option('return_shop_text','Return to Shop');
    update_option('cart_btn_url',wc_get_cart_url());
    update_option('checkout_btn_url',wc_get_checkout_url());
    update_option('continue_shopping_btn_url','#');
    update_option('head_font_size','28');
    update_option('head_close_size','28');
    update_option('header_heading_position','center');
    update_option('header_close_position','right');
    update_option('basekt_position','right');
    update_option('basekt_shape','round');
    update_option('show_product_count','true');
    update_option('pscfw_fly_to_cart','true');
    update_option('backet_product_count','cart_order_asc');
    update_option('pscfw_cart_order','count_items');
    update_option('basket_size','30');
    update_option('basket_up_offset','15');
    update_option('basket_down_offset','15');
    update_option('basket_icon','cart_1');
    update_option('basket_bg_color','#000000');
    update_option('basket_color','#ffffff');
    update_option('basket_count_position','top_right');
    update_option('count_text_color','#ffffff');
    update_option('count_bg_color','#12b99a');
    update_option('trash_icon','trash_icon1');
    update_option('pscfw_delete_type','pscfw_delete_icon');
    update_option('delete_btn_text','REMOVE');
    update_option('close_icon','close_icon_1');
    update_option('close_icon_color','#000000');
    update_option('enable_pro_img','true');
    update_option('enable_pro_name','true');
    update_option('enable_pro_price','true');
    update_option('enable_pro_total','true');
    update_option('enable_pro_qty','true');
    update_option('enable_pro_delete','true');
    update_option('enable_product_link','true');
    update_option('enable_header_close','true');
    update_option('pscfw_button_position', array('cart','checkout','keepshopping'));
    update_option('enable_slider_img', 'true');
    update_option('enable_slider_pro_name', 'true');
    update_option('enable_slider_pro_price', 'true');
    update_option('enable_slider_btn', 'true');
}

/* Product Slider */
function pscfw_product_slider_search() {
    $search = $_GET['term'];
    $post_types = array( 'product','product_variation');
      $args = array(
        'post_type' => $post_types,
        's' => $search,
        'posts_per_page' => -1
      );
      $query = new WP_Query( $args );
      $products = array();
      if ( $query->have_posts() ) {
        while ( $query->have_posts() ) {
          $query->the_post();
          $productc = wc_get_product( $query->post->ID );
          if ( $productc && $productc->is_in_stock() && $productc->is_purchasable() ) {
              $products[] = array(
                'id' => $query->post->ID,
                'text' => $query->post->post_title,
                'price' => $productc->get_price_html(),
              );
            }
          }
        }
      // wp_reset_postdata();
      wp_send_json( $products );
}
add_action('wp_ajax_pscfw_product_slider_search', 'pscfw_product_slider_search');
add_action('wp_ajax_nopriv_pscfw_product_slider_search', 'pscfw_product_slider_search');

/* Sorting Button Callback */
function pscfw_button_sorting_callback() {
    $button_order = stripslashes($_POST['order']);
    $positions = json_decode($button_order);

    // Save the button order in the backend settings or database
    update_option('pscfw_button_position', $positions);

    // Return a success response
    wp_send_json_success();
}
add_action('wp_ajax_pscfw_save_button_order', 'pscfw_button_sorting_callback');
add_action('wp_ajax_nopriv_pscfw_save_button_order', 'pscfw_button_sorting_callback');



/* Icon svgs */
add_action('init','pscfw_svg');
function pscfw_svg(){
    global $pscfw_icon;

    $pscfw_icon = [
        'close_icon_1' => '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25" height="25" viewBox="0 0 122.881 122.88" enable-background="new 0 0 122.881 122.88" xml:space="preserve"><g><path d="M61.44,0c16.966,0,32.326,6.877,43.445,17.996c11.119,11.118,17.996,26.479,17.996,43.444 c0,16.967-6.877,32.326-17.996,43.444C93.766,116.003,78.406,122.88,61.44,122.88c-16.966,0-32.326-6.877-43.444-17.996 C6.877,93.766,0,78.406,0,61.439c0-16.965,6.877-32.326,17.996-43.444C29.114,6.877,44.474,0,61.44,0L61.44,0z M80.16,37.369 c1.301-1.302,3.412-1.302,4.713,0c1.301,1.301,1.301,3.411,0,4.713L65.512,61.444l19.361,19.362c1.301,1.301,1.301,3.411,0,4.713 c-1.301,1.301-3.412,1.301-4.713,0L60.798,66.157L41.436,85.52c-1.301,1.301-3.412,1.301-4.713,0c-1.301-1.302-1.301-3.412,0-4.713 l19.363-19.362L36.723,42.082c-1.301-1.302-1.301-3.412,0-4.713c1.301-1.302,3.412-1.302,4.713,0l19.363,19.362L80.16,37.369 L80.16,37.369z M100.172,22.708C90.26,12.796,76.566,6.666,61.44,6.666c-15.126,0-28.819,6.13-38.731,16.042 C12.797,32.62,6.666,46.314,6.666,61.439c0,15.126,6.131,28.82,16.042,38.732c9.912,9.911,23.605,16.042,38.731,16.042 c15.126,0,28.82-6.131,38.732-16.042c9.912-9.912,16.043-23.606,16.043-38.732C116.215,46.314,110.084,32.62,100.172,22.708 L100.172,22.708z"/></g></svg>',

        'close_icon_2' => '<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="25" height="25" viewBox="0 0 122.878 122.88" enable-background="new 0 0 122.878 122.88" xml:space="preserve"><g><path d="M1.426,8.313c-1.901-1.901-1.901-4.984,0-6.886c1.901-1.902,4.984-1.902,6.886,0l53.127,53.127l53.127-53.127 c1.901-1.902,4.984-1.902,6.887,0c1.901,1.901,1.901,4.985,0,6.886L68.324,61.439l53.128,53.128c1.901,1.901,1.901,4.984,0,6.886 c-1.902,1.902-4.985,1.902-6.887,0L61.438,68.326L8.312,121.453c-1.901,1.902-4.984,1.902-6.886,0 c-1.901-1.901-1.901-4.984,0-6.886l53.127-53.128L1.426,8.313L1.426,8.313z"/></g></svg>',

        'close_icon_3' => '<svg width="25" height="25" id="Icons" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path class="cls-1" d="M12,1A11,11,0,1,0,23,12,11,11,0,0,0,12,1Zm4.707,14.293a1,1,0,1,1-1.414,1.414L12,13.414,8.707,16.707a1,1,0,1,1-1.414-1.414L10.586,12,7.293,8.707A1,1,0,1,1,8.707,7.293L12,10.586l3.293-3.293a1,1,0,1,1,1.414,1.414L13.414,12Z"/></svg>',

        'close_icon_4' => '<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" width="31px" height="25px" data-name="Layer 1" viewBox="0 0 122.88 119.8"><title>minus-sign</title><path d="M23.59,0h75.7a23.63,23.63,0,0,1,23.59,23.59V96.21A23.64,23.64,0,0,1,99.29,119.8H23.59a23.53,23.53,0,0,1-16.67-6.93l-.38-.42A23.49,23.49,0,0,1,0,96.21V23.59A23.63,23.63,0,0,1,23.59,0Zm59.7,53.51a6.39,6.39,0,1,1,0,12.77H39.59a6.39,6.39,0,1,1,0-12.77Zm16-40.74H23.59A10.86,10.86,0,0,0,12.77,23.59V96.21a10.77,10.77,0,0,0,2.9,7.37l.28.26A10.76,10.76,0,0,0,23.59,107h75.7a10.87,10.87,0,0,0,10.82-10.82V23.59A10.86,10.86,0,0,0,99.29,12.77Z"/></svg>',

        'close_icon_5' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="25" height="25" viewBox="0 0 256 256" xml:space="preserve">
            <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
                <path d="M 84.568 73.986 H 5.431 C 2.437 73.986 0 71.55 0 68.555 V 37.728 c 0 -2.995 2.437 -5.431 5.431 -5.431 h 4.723 c 0.552 0 1 0.448 1 1 s -0.448 1 -1 1 H 5.431 C 3.539 34.297 2 35.836 2 37.728 v 30.827 c 0 1.893 1.539 3.432 3.431 3.432 h 79.137 c 1.893 0 3.432 -1.539 3.432 -3.432 V 37.728 c 0 -1.892 -1.539 -3.431 -3.432 -3.431 H 71.58 c -0.553 0 -1 -0.448 -1 -1 s 0.447 -1 1 -1 h 12.988 c 2.995 0 5.432 2.437 5.432 5.431 v 30.827 C 90 71.55 87.563 73.986 84.568 73.986 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                <path d="M 45 23.55 c -2.078 0 -3.768 -1.69 -3.768 -3.769 c 0 -2.078 1.69 -3.768 3.768 -3.768 c 2.078 0 3.769 1.69 3.769 3.768 C 48.769 21.86 47.078 23.55 45 23.55 z M 45 18.014 c -0.975 0 -1.768 0.793 -1.768 1.768 S 44.025 21.55 45 21.55 s 1.769 -0.793 1.769 -1.769 S 45.975 18.014 45 18.014 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                <path d="M 18.564 34.297 c -0.364 0 -0.714 -0.199 -0.892 -0.545 c -0.251 -0.492 -0.056 -1.094 0.436 -1.346 l 23.982 -12.26 c 0.492 -0.25 1.094 -0.057 1.346 0.436 c 0.251 0.492 0.056 1.094 -0.436 1.346 l -23.982 12.26 C 18.873 34.262 18.717 34.297 18.564 34.297 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                <path d="M 71.579 34.297 c -0.153 0 -0.309 -0.035 -0.454 -0.109 L 47.03 21.87 c -0.492 -0.251 -0.687 -0.854 -0.436 -1.346 s 0.855 -0.686 1.346 -0.436 l 24.095 12.318 c 0.492 0.251 0.687 0.854 0.436 1.346 C 72.294 34.098 71.943 34.297 71.579 34.297 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                <path d="M 59.233 34.297 h -40.67 c -0.552 0 -1 -0.448 -1 -1 s 0.448 -1 1 -1 h 40.67 c 0.553 0 1 0.448 1 1 S 59.786 34.297 59.233 34.297 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                <path d="M 46.199 63.084 h -3.208 c -2.565 0 -4.652 -2.087 -4.652 -4.651 V 48.8 c 0 -2.565 2.087 -4.652 4.652 -4.652 h 3.208 c 2.565 0 4.652 2.086 4.652 4.652 v 9.633 C 50.852 60.997 48.765 63.084 46.199 63.084 z M 42.991 46.148 c -1.462 0 -2.652 1.189 -2.652 2.651 v 9.633 c 0 1.462 1.189 2.651 2.652 2.651 h 3.208 c 1.463 0 2.652 -1.189 2.652 -2.651 V 48.8 c 0 -1.462 -1.189 -2.651 -2.652 -2.651 H 42.991 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                <path d="M 79.525 63.084 h -7.508 c -0.553 0 -1 -0.447 -1 -1 V 45.148 c 0 -0.552 0.447 -1 1 -1 h 7.508 c 0.553 0 1 0.448 1 1 s -0.447 1 -1 1 h -6.508 v 14.936 h 6.508 c 0.553 0 1 0.447 1 1 S 80.078 63.084 79.525 63.084 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                <path d="M 76.929 54.616 h -4.911 c -0.553 0 -1 -0.447 -1 -1 s 0.447 -1 1 -1 h 4.911 c 0.553 0 1 0.447 1 1 S 77.481 54.616 76.929 54.616 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                <path d="M 17.335 63.084 h -3.209 c -2.565 0 -4.651 -2.087 -4.651 -4.651 V 48.8 c 0 -2.565 2.086 -4.652 4.651 -4.652 h 3.209 c 2.565 0 4.651 2.086 4.651 4.652 c 0 0.553 -0.448 1 -1 1 s -1 -0.447 -1 -1 c 0 -1.462 -1.189 -2.651 -2.651 -2.651 h -3.209 c -1.462 0 -2.651 1.189 -2.651 2.651 v 9.633 c 0 1.462 1.189 2.651 2.651 2.651 h 3.209 c 1.462 0 2.651 -1.189 2.651 -2.651 c 0 -0.553 0.448 -1 1 -1 s 1 0.447 1 1 C 21.986 60.997 19.9 63.084 17.335 63.084 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                <path d="M 35.16 63.084 h -7.508 c -0.552 0 -1 -0.447 -1 -1 V 45.148 c 0 -0.552 0.448 -1 1 -1 s 1 0.448 1 1 v 15.936 h 6.508 c 0.552 0 1 0.447 1 1 S 35.712 63.084 35.16 63.084 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
                <path d="M 62.439 63.343 h -5.61 c -0.553 0 -1 -0.447 -1 -1 s 0.447 -1 1 -1 h 5.61 c 1.096 0 1.987 -0.891 1.987 -1.986 v -2.624 c 0 -1.096 -0.892 -1.987 -1.987 -1.987 h -3.124 c -2.198 0 -3.986 -1.788 -3.986 -3.986 v -2.624 c 0 -2.198 1.788 -3.987 3.986 -3.987 h 4.027 c 0.553 0 1 0.448 1 1 s -0.447 1 -1 1 h -4.027 c -1.096 0 -1.986 0.892 -1.986 1.987 v 2.624 c 0 1.096 0.891 1.986 1.986 1.986 h 3.124 c 2.198 0 3.987 1.789 3.987 3.987 v 2.624 C 66.427 61.555 64.638 63.343 62.439 63.343 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" /></g>
                </svg>',

        'close_icon_6' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="25px" height="25px" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.875 28.489" enable-background="new 0 0 122.875 28.489" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M108.993,0c7.683-0.059,13.898,6.12,13.882,13.805 c-0.018,7.682-6.26,13.958-13.942,14.018c-31.683,0.222-63.368,0.444-95.051,0.666C6.2,28.549-0.016,22.369,0,14.685 C0.018,7.002,6.261,0.726,13.943,0.667C45.626,0.445,77.311,0.223,108.993,0L108.993,0z"/></g></svg>',

        'close_icon_7' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 122.881 9.737" enable-background="new 0 0 122.881 9.737" xml:space="preserve"><g><path d="M117.922,0.006C117.951,0.002,117.982,0,118.012,0c0.656,0,1.285,0.132,1.861,0.371c0.014,0.005,0.025,0.011,0.037,0.017 c0.584,0.248,1.107,0.603,1.543,1.039c0.881,0.88,1.428,2.098,1.428,3.441c0,0.654-0.133,1.283-0.371,1.859 c-0.248,0.6-0.609,1.137-1.057,1.583c-0.445,0.445-0.98,0.806-1.58,1.055v0.001c-0.576,0.238-1.205,0.37-1.861,0.37 c-0.029,0-0.061-0.002-0.09-0.006c-37.654,0-75.309,0.001-112.964,0.001c-0.029,0.004-0.059,0.006-0.09,0.006 c-0.654,0-1.283-0.132-1.859-0.371c-0.6-0.248-1.137-0.609-1.583-1.056C0.981,7.865,0.621,7.33,0.372,6.73H0.371 C0.132,6.154,0,5.525,0,4.869C0,4.215,0.132,3.586,0.371,3.01c0.249-0.6,0.61-1.137,1.056-1.583 c0.881-0.881,2.098-1.426,3.442-1.426c0.031,0,0.061,0.002,0.09,0.006C42.613,0.006,80.268,0.006,117.922,0.006L117.922,0.006z"/></g></svg>',

        'trash_icon1' => '<svg width="25px" height="25px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="512px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M413.7,133.4c-2.4-9-4-14-4-14c-2.6-9.3-9.2-9.3-19-10.9l-53.1-6.7c-6.6-1.1-6.6-1.1-9.2-6.8c-8.7-19.6-11.4-31-20.9-31   h-103c-9.5,0-12.1,11.4-20.8,31.1c-2.6,5.6-2.6,5.6-9.2,6.8l-53.2,6.7c-9.7,1.6-16.7,2.5-19.3,11.8c0,0-1.2,4.1-3.7,13   c-3.2,11.9-4.5,10.6,6.5,10.6h302.4C418.2,144.1,417,145.3,413.7,133.4z"/><path d="M379.4,176H132.6c-16.6,0-17.4,2.2-16.4,14.7l18.7,242.6c1.6,12.3,2.8,14.8,17.5,14.8h207.2c14.7,0,15.9-2.5,17.5-14.8   l18.7-242.6C396.8,178.1,396,176,379.4,176z"/></g></svg>',

        'trash_icon2' => '<svg width="25px" height="25px" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 110.61 122.88"><title>trash</title><path d="M39.27,58.64a4.74,4.74,0,1,1,9.47,0V93.72a4.74,4.74,0,1,1-9.47,0V58.64Zm63.6-19.86L98,103a22.29,22.29,0,0,1-6.33,14.1,19.41,19.41,0,0,1-13.88,5.78h-45a19.4,19.4,0,0,1-13.86-5.78l0,0A22.31,22.31,0,0,1,12.59,103L7.74,38.78H0V25c0-3.32,1.63-4.58,4.84-4.58H27.58V10.79A10.82,10.82,0,0,1,38.37,0H72.24A10.82,10.82,0,0,1,83,10.79v9.62h23.35a6.19,6.19,0,0,1,1,.06A3.86,3.86,0,0,1,110.59,24c0,.2,0,.38,0,.57V38.78Zm-9.5.17H17.24L22,102.3a12.82,12.82,0,0,0,3.57,8.1l0,0a10,10,0,0,0,7.19,3h45a10.06,10.06,0,0,0,7.19-3,12.8,12.8,0,0,0,3.59-8.1L93.37,39ZM71,20.41V12.05H39.64v8.36ZM61.87,58.64a4.74,4.74,0,1,1,9.47,0V93.72a4.74,4.74,0,1,1-9.47,0V58.64Z"/></svg>',

        'trash_icon3' => '<svg width="25" height="25" viewBox="0 0 448 512" xmlns="http://www.w3.org/2000/svg"><path d="M32 464C32 490.5 53.5 512 80 512h288c26.5 0 48-21.5 48-48V128H32V464zM304 208C304 199.1 311.1 192 320 192s16 7.125 16 16v224c0 8.875-7.125 16-16 16s-16-7.125-16-16V208zM208 208C208 199.1 215.1 192 224 192s16 7.125 16 16v224c0 8.875-7.125 16-16 16s-16-7.125-16-16V208zM112 208C112 199.1 119.1 192 128 192s16 7.125 16 16v224C144 440.9 136.9 448 128 448s-16-7.125-16-16V208zM432 32H320l-11.58-23.16c-2.709-5.42-8.25-8.844-14.31-8.844H153.9c-6.061 0-11.6 3.424-14.31 8.844L128 32H16c-8.836 0-16 7.162-16 16V80c0 8.836 7.164 16 16 16h416c8.838 0 16-7.164 16-16V48C448 39.16 440.8 32 432 32z"/></svg>',

        'trash_icon4' => '<svg width="25" height="25" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/></svg>',

        'trash_icon5' => '<svg enable-background="new -0.5 -0.7 31 32" width="31px" height="25px" version="1.1" viewBox="-0.5 -0.7 31 32" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><defs/><path clip-rule="evenodd" d="M29.8,8.3C29.8,8.3,29.8,8.3,29.8,8.3L29.8,8.3  C29.8,8.3,29.8,8.3,29.8,8.3z M27.8,10.3h-1v18c0,1.1-0.9,2-2,2h-19c-1.1,0-2-0.9-2-2v-18H2c-1.1,0-2-0.9-2-2c0-1.1,0.9-2,2-2h6.9  C9.2,2.8,12,0,15.4,0s6.3,2.8,6.5,6.3h5.8c1.1,0,2,0.9,2,2C29.8,9.4,28.9,10.3,27.8,10.3z M15.4,3.2c-1.8,0-3.2,1.3-3.4,3.1h6.9  C18.6,4.6,17.2,3.2,15.4,3.2z M23.8,11.5c0-0.5-0.2-0.9-0.5-1.1H7.3C7,10.6,6.8,11,6.8,11.5v14.7c0,0.9,0.7,1.6,1.6,1.6h13.8  c0.9,0,1.6-0.7,1.6-1.6V11.5z M18.8,12.3h3v14h-3V12.3z M13.8,12.3h3v14h-3V12.3z M8.8,12.3h3v14h-3V12.3z M0,8.3C0,8.3,0,8.3,0,8.3  C0,8.3,0,8.3,0,8.3L0,8.3z" fill-rule="evenodd"/></svg>',

        'trash_icon6' => '<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" width="31px" height="25px" data-name="Layer 1" viewBox="0 0 122.88 119.8"><title>minus-sign</title><path d="M23.59,0h75.7a23.63,23.63,0,0,1,23.59,23.59V96.21A23.64,23.64,0,0,1,99.29,119.8H23.59a23.53,23.53,0,0,1-16.67-6.93l-.38-.42A23.49,23.49,0,0,1,0,96.21V23.59A23.63,23.63,0,0,1,23.59,0Zm59.7,53.51a6.39,6.39,0,1,1,0,12.77H39.59a6.39,6.39,0,1,1,0-12.77Zm16-40.74H23.59A10.86,10.86,0,0,0,12.77,23.59V96.21a10.77,10.77,0,0,0,2.9,7.37l.28.26A10.76,10.76,0,0,0,23.59,107h75.7a10.87,10.87,0,0,0,10.82-10.82V23.59A10.86,10.86,0,0,0,99.29,12.77Z"/></svg>',

        'trash_icon7' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="31px" height="25px" viewBox="0 0 122.879 122.88" enable-background="new 0 0 122.879 122.88" xml:space="preserve"><g><path d="M17.995,17.995C29.992,5.999,45.716,0,61.439,0s31.448,5.999,43.445,17.995c11.996,11.997,17.994,27.721,17.994,43.444 c0,15.725-5.998,31.448-17.994,43.445c-11.997,11.996-27.722,17.995-43.445,17.995s-31.448-5.999-43.444-17.995 C5.998,92.888,0,77.164,0,61.439C0,45.716,5.998,29.992,17.995,17.995L17.995,17.995z M91.704,58.564 c1.84,0,3.332,1.492,3.332,3.332c0,1.841-1.492,3.333-3.332,3.333c-20.477,0-40.954,0-61.431,0c-1.84,0-3.333-1.492-3.333-3.333 c0-1.84,1.492-3.332,3.333-3.332C50.75,58.564,71.228,58.564,91.704,58.564L91.704,58.564z M61.439,6.665 c-14.018,0-28.035,5.348-38.731,16.044C12.013,33.404,6.665,47.422,6.665,61.439c0,14.018,5.348,28.036,16.043,38.731 c10.696,10.696,24.713,16.044,38.731,16.044s28.035-5.348,38.731-16.044c10.695-10.695,16.044-24.714,16.044-38.731 c0-14.017-5.349-28.035-16.044-38.73C89.475,12.013,75.457,6.665,61.439,6.665L61.439,6.665z"/></g></svg>',

        'trash_icon8' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="25px" height="25px" id="Layer_1" x="0px" y="0px" viewBox="0 0 122.875 28.489" enable-background="new 0 0 122.875 28.489" xml:space="preserve"><g><path fill-rule="evenodd" clip-rule="evenodd" d="M108.993,0c7.683-0.059,13.898,6.12,13.882,13.805 c-0.018,7.682-6.26,13.958-13.942,14.018c-31.683,0.222-63.368,0.444-95.051,0.666C6.2,28.549-0.016,22.369,0,14.685 C0.018,7.002,6.261,0.726,13.943,0.667C45.626,0.445,77.311,0.223,108.993,0L108.993,0z"/></g></svg>',

        'cart_1' => '<svg id="Layer_1" width="30" height="30" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 128.12 106.26"><title>shopping-basket</title><path d="M6.45,30.68h14a7.88,7.88,0,0,1,1-1.66L41.68,3.23a7.89,7.89,0,1,1,12.44,9.71L40.22,30.68H88.08L74,12.75A7.89,7.89,0,0,1,86.47,3L106.65,28.8a8,8,0,0,1,1.1,1.88h13.92a6.45,6.45,0,0,1,6.45,6.45V51a6.45,6.45,0,0,1-1.89,4.55h0a6.41,6.41,0,0,1-4.54,1.89H117l-2.27,43.13a6.11,6.11,0,0,1-1.74,4h0a5.66,5.66,0,0,1-4,1.68H21.57a5.52,5.52,0,0,1-3.78-1.48l-.2-.17a6.5,6.5,0,0,1-1.79-3.88L11.25,57.47H6.45A6.45,6.45,0,0,1,0,51V37.13a6.45,6.45,0,0,1,6.45-6.45ZM79.34,64.26h8.17a.89.89,0,0,1,.88.89V92.1a.89.89,0,0,1-.88.89H79.34a.88.88,0,0,1-.88-.89V65.15a.88.88,0,0,1,.88-.89ZM60,64.26h8.16a.89.89,0,0,1,.89.89V92.1a.89.89,0,0,1-.89.89H60a.89.89,0,0,1-.89-.89V65.15a.89.89,0,0,1,.89-.89Zm-19.37,0h8.17a.88.88,0,0,1,.88.89V92.1a.88.88,0,0,1-.88.89H40.61a.89.89,0,0,1-.88-.89V65.15a.89.89,0,0,1,.88-.89Zm71.12-6.79H16.54L21,100.2a1.12,1.12,0,0,0,.29.67l.05,0a.31.31,0,0,0,.19.06H109a.43.43,0,0,0,.3-.12h0a.78.78,0,0,0,.22-.52l2.26-42.86ZM121.67,36H6.45a1.18,1.18,0,0,0-1.17,1.17V51a1.2,1.2,0,0,0,1.17,1.17H121.67a1.14,1.14,0,0,0,.82-.34h0a1.14,1.14,0,0,0,.34-.82V37.13A1.18,1.18,0,0,0,121.67,36Z"/></svg>',

        'cart_2' => '<svg version="1.1" width="30" height="30" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 122.9 107.5" style="enable-background:new 0 0 122.9 107.5" xml:space="preserve"><g><path d="M3.9,7.9C1.8,7.9,0,6.1,0,3.9C0,1.8,1.8,0,3.9,0h10.2c0.1,0,0.3,0,0.4,0c3.6,0.1,6.8,0.8,9.5,2.5c3,1.9,5.2,4.8,6.4,9.1 c0,0.1,0,0.2,0.1,0.3l1,4H119c2.2,0,3.9,1.8,3.9,3.9c0,0.4-0.1,0.8-0.2,1.2l-10.2,41.1c-0.4,1.8-2,3-3.8,3v0H44.7 c1.4,5.2,2.8,8,4.7,9.3c2.3,1.5,6.3,1.6,13,1.5h0.1v0h45.2c2.2,0,3.9,1.8,3.9,3.9c0,2.2-1.8,3.9-3.9,3.9H62.5v0 c-8.3,0.1-13.4-0.1-17.5-2.8c-4.2-2.8-6.4-7.6-8.6-16.3l0,0L23,13.9c0-0.1,0-0.1-0.1-0.2c-0.6-2.2-1.6-3.7-3-4.5 c-1.4-0.9-3.3-1.3-5.5-1.3c-0.1,0-0.2,0-0.3,0H3.9L3.9,7.9z M96,88.3c5.3,0,9.6,4.3,9.6,9.6c0,5.3-4.3,9.6-9.6,9.6 c-5.3,0-9.6-4.3-9.6-9.6C86.4,92.6,90.7,88.3,96,88.3L96,88.3z M53.9,88.3c5.3,0,9.6,4.3,9.6,9.6c0,5.3-4.3,9.6-9.6,9.6 c-5.3,0-9.6-4.3-9.6-9.6C44.3,92.6,48.6,88.3,53.9,88.3L53.9,88.3z M33.7,23.7l8.9,33.5h63.1l8.3-33.5H33.7L33.7,23.7z"/></g></svg>',

        'cart_3' => '<svg id="Layer_1" width="30" height="30" data-name="Layer_1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><title>cart-outline</title><path class="cls-1" d="M512,204.69a51.27,51.27,0,0,0-51.2-51.22H427.7L287.18,12.9a44.12,44.12,0,0,0-62.36,0L84.3,153.47H51.2a51.21,51.21,0,0,0-24.55,96.15L66.76,450.23A77,77,0,0,0,142.07,512H369.93a77,77,0,0,0,75.31-61.76l40.11-200.62A51.26,51.26,0,0,0,512,204.69ZM242.92,31a18.52,18.52,0,0,1,26.16,0L391.5,153.47h-271ZM51.2,179.08H460.8a25.61,25.61,0,0,1,0,51.22H51.2a25.61,25.61,0,0,1,0-51.22ZM420.14,445.22a51.34,51.34,0,0,1-50.21,41.17H142.07a51.34,51.34,0,0,1-50.21-41.18L54,255.91H458ZM243.2,409.56V332.74a12.8,12.8,0,1,1,25.6,0v76.83a12.8,12.8,0,1,1-25.6,0Zm-64,0V332.74a12.8,12.8,0,1,1,25.6,0v76.83a12.8,12.8,0,1,1-25.6,0Zm128,0V332.74a12.8,12.8,0,1,1,25.6,0v76.83a12.8,12.8,0,1,1-25.6,0Z"/></svg>',

        'cart_4' => '<svg width="30" height="30" data-name="Layer 1" id="Layer_1" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><path d="M29.75,10.34A1,1,0,0,0,29,10H23v2h4.88L26.11,27H5.89L4.12,12H9V10H3a1,1,0,0,0-.75.34,1,1,0,0,0-.24.78l2,17A1,1,0,0,0,5,29H27a1,1,0,0,0,1-.88l2-17A1,1,0,0,0,29.75,10.34ZM19,10H13v2h6Z"/><path d="M21,16a1,1,0,0,1-1-1V9a4,4,0,0,0-8,0v6a1,1,0,0,1-2,0V9A6,6,0,0,1,22,9v6A1,1,0,0,1,21,16Z"/></svg>',

        'cart_5' => '<svg id="Layer_1" width="30" height="30" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"><defs><linearGradient id="linear-gradient" x1="383.26" y1="473.14" x2="383.26" y2="35.76" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#231f20"/><stop offset="1" stop-color="#58595b"/></linearGradient><linearGradient id="linear-gradient-2" x1="185.6" y1="473.14" x2="185.6" y2="35.76" xlink:href="#linear-gradient"/><linearGradient id="linear-gradient-3" x1="256" y1="473.13" x2="256" y2="35.81" xlink:href="#linear-gradient"/></defs><title>shopping_cart</title><path d="M383.26,416.6a29.79,29.79,0,1,0,29.67,29.77A29.72,29.72,0,0,0,383.26,416.6Z"/><path d="M185.6,416.6a29.79,29.79,0,1,0,29.65,29.77A29.71,29.71,0,0,0,185.6,416.6Z"/><path d="M502,114.51H141.87a10.67,10.67,0,0,0-2,.4L129.14,37.71V35.82H12.74A12.81,12.81,0,0,0,0,48.61V74.08A12.8,12.8,0,0,0,12.74,86.89H84.66L129.14,406v1.89H443.65a12.8,12.8,0,0,0,12.73-12.8V369.61a12.81,12.81,0,0,0-12.73-12.79h-270l-3.51-25.17H448.26c7,0,14.13-5.57,15.82-12.42l47.56-192.3C513.33,120.1,509,114.51,502,114.51ZM154.14,184.18A17.82,17.82,0,1,1,172,202,17.82,17.82,0,0,1,154.14,184.18Zm26.7,89.64A17.82,17.82,0,1,1,198.66,256,17.82,17.82,0,0,1,180.84,273.82ZM237,166.37a17.82,17.82,0,1,1-17.82,17.82A17.82,17.82,0,0,1,237,166.37Zm2.2,107.46A17.82,17.82,0,1,1,257,256,17.82,17.82,0,0,1,239.21,273.82Zm58.37,0A17.82,17.82,0,1,1,315.42,256,17.81,17.81,0,0,1,297.58,273.82ZM302.06,202a17.82,17.82,0,1,1,17.83-17.83A17.84,17.84,0,0,1,302.06,202ZM356,273.82A17.82,17.82,0,1,1,373.8,256,17.83,17.83,0,0,1,356,273.82ZM367.12,202A17.82,17.82,0,1,1,385,184.18,17.84,17.84,0,0,1,367.12,202Zm47.22,71.81A17.82,17.82,0,1,1,432.17,256,17.81,17.81,0,0,1,414.34,273.82ZM432.17,202A17.82,17.82,0,1,1,450,184.18,17.84,17.84,0,0,1,432.17,202Z"/></svg>',

        'cart_6' => '<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" width="30" height="30" data-name="Layer 1" viewBox="0 0 512 512"><title>bag-outline</title><path class="cls-1" d="M460.43,427.76,433.5,159c-3.87-38.64-36.26-68-75.89-69.3a102.4,102.4,0,0,0-203.22,0C114.76,91,82.37,120.32,78.5,159L51.57,427.76a74.68,74.68,0,0,0,19.31,58.15A80.1,80.1,0,0,0,130.24,512H381.76a80.1,80.1,0,0,0,59.36-26.09A74.68,74.68,0,0,0,460.43,427.76ZM256,25.6a76.91,76.91,0,0,1,75.71,64H180.29A76.91,76.91,0,0,1,256,25.6ZM104,161.51c2.53-25.26,23.57-44.56,49.63-46.19v54.51a25.6,25.6,0,1,0,25.6,0V115.2H332.8v54.63a25.6,25.6,0,1,0,25.6,0V115.32c26.05,1.63,47.1,20.93,49.63,46.19L431.59,396.8H80.41ZM422.14,468.73a54.43,54.43,0,0,1-40.38,17.67H130.24a54.43,54.43,0,0,1-40.38-17.67,49.33,49.33,0,0,1-12.81-38.42l.79-7.91H434.16l.79,7.91A49.33,49.33,0,0,1,422.14,468.73Z"/></svg>',

        'cart_7' => '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" width="30" height="30" x="0px" y="0px" viewBox="0 0 122.88 119.43" style="enable-background:new 0 0 122.88 119.43" xml:space="preserve"><style type="text/css">.st0{fill-rule:evenodd;clip-rule:evenodd;}</style><g><path class="st0" d="M10.38,0H112.5c1.1,0,1.91,0.9,1.99,1.99l8.38,115.46c0.08,1.08-0.9,1.99-1.99,1.99H1.99 c-1.08,0-2.07-0.89-1.99-1.99L8.38,1.99C8.46,0.89,9.28,0,10.38,0L10.38,0z M33.18,23.77V39.1v0.01h-0.01 c0,7.44,3.06,14.21,7.96,19.12c4.91,4.91,11.68,7.97,19.11,7.97v-0.01h0.03l0,0h0.02v0.01c7.44,0,14.21-3.05,19.12-7.96 c4.91-4.91,7.96-11.68,7.97-19.11h-0.02V39.1V23.59c-3.3-1.08-5.68-4.18-5.68-7.84c0-4.56,3.69-8.26,8.25-8.26 c4.56,0,8.25,3.7,8.25,8.26c0,2.95-1.56,5.55-3.89,7.01V39.1v0.03h-0.01c-0.01,9.34-3.83,17.84-9.97,23.98 c-6.16,6.16-14.67,9.99-24.02,10v0.02h-0.02l0,0h-0.03v-0.02c-9.34-0.01-17.83-3.83-23.99-9.97c-6.16-6.16-9.99-14.67-10-24.02 h-0.01V39.1V22.33c-1.99-1.51-3.28-3.89-3.28-6.58c0-4.56,3.7-8.26,8.26-8.26c4.56,0,8.25,3.7,8.25,8.26 C39.49,19.64,36.8,22.89,33.18,23.77L33.18,23.77z"/></g></svg>',

        'cart_8' => '<svg xmlns="http://www.w3.org/2000/svg" id="Layer_1" width="30" height="30" data-name="Layer 1" viewBox="0 0 122.88 111.85"><title>cart</title><path d="M4.06,8.22A4.15,4.15,0,0,1,0,4.06,4.13,4.13,0,0,1,4.06,0h6A19.12,19.12,0,0,1,20,2.6c5.44,3.45,6.41,8.38,7.8,13.94h91a4.07,4.07,0,0,1,4.06,4.06,5,5,0,0,1-.21,1.25L112.06,64.61a4,4,0,0,1-4,3.13H41.51c1.46,5.41,2.92,8.32,4.89,9.67C48.8,79,53,79.08,59.93,79h47.13a4.06,4.06,0,0,1,0,8.12H60c-8.63.1-13.94-.11-18.2-2.91s-6.66-7.91-8.95-17h0L18.94,14.46c0-.1,0-.1-.11-.21a7.26,7.26,0,0,0-3.12-4.68A10.65,10.65,0,0,0,10,8.22H4.06Zm80.32,25a2.89,2.89,0,0,1,5.66,0V48.93a2.89,2.89,0,0,1-5.66,0V33.24Zm-16.95,0a2.89,2.89,0,0,1,5.67,0V48.93a2.89,2.89,0,0,1-5.67,0V33.24Zm-16.94,0a2.89,2.89,0,0,1,5.66,0V48.93a2.89,2.89,0,0,1-5.66,0V33.24Zm41.72-8.58H30.07l9.26,34.86H105l8.64-34.86Zm2.68,67.21a10,10,0,1,1-10,10,10,10,0,0,1,10-10Zm-43.8,0a10,10,0,1,1-10,10,10,10,0,0,1,10-10Z"/></svg>',
    ];
}