<?php
function pscfw_add_to_cart_popup(){
    global $pscfw_icon, $woocommerce;

    $atcmax_width = get_option('atcmax_width','385');
    $atc_enable = get_option('atc_enable','true');
    $mobile_en = get_option('mobile_en','true');
    $shead_color = get_option('shead_color','#f8f8f8');
    $shborder_color = get_option('shborder_color','#b7b7b7');
    $shb_style = get_option('shb_style','solid');
    $shthead_color = get_option('shthead_color','#000');
    $head_font_size = get_option('head_font_size','28');
    $head_close_size = get_option('head_close_size','28');
    $clpback_color =get_option('clpback_color','#fff');
    $clpimg_width = get_option('clpimg_width','100');
    $pib_radious = get_option('pib_radious','0');
    $ptc_color = get_option('ptc_color','#000');
    $pth_hover = get_option('pth_hover','#ff9065');
    $prop_color = get_option('prop_color','#000');
    $pd_color = get_option('pd_color','#808b97');
    $pdc_hover = get_option('pdc_hover','#ff0000');
    $slider_img_width = get_option('slider_img_width','90');
    $slider_font_size = get_option('slider_font_size','16');
    $slider_pro_title_color = get_option('slider_pro_title_color','#046bd2');
    $slider_back_color = get_option('slider_back_color','#f8f8f8');
    $slider_btn_back_color = get_option('slider_btn_back_color','#000000');
    $slider_btn_text_color = get_option('slider_btn_text_color','#ffffff');
    $slider_btn_back_hover_color = get_option('slider_btn_back_hover_color','#045cb4');
    $slider_btn_hover_text_color = get_option('slider_btn_hover_text_color','#ffffff');
    $slid_enable_desk = get_option('slid_enable_desk','true');
    $slid_enable_mob = get_option('slid_enable_mob','true');
    $display_subtotal = get_option('display_subtotal','true');
    $display_shipping_total = get_option('display_shipping_total','true');
    $display_total = get_option('display_total','true');
    $btn_font_size = get_option('btn_font_size','15');
    $pscfw_btn_row = get_option('pscfw_btn_row','one_row');
    $pscfw_fbtn_padding = get_option('pscfw_fbtn_padding','8px 20px');
    $atcfb_color = get_option('atcfb_color','#f8f8f8');
    $cbc_color = get_option('cbc_color','#000000');
    $cbh_color = get_option('cbh_color','#3cb247');
    $btn_text_color = get_option('btn_text_color','#ffffff');
    $btnh_color = get_option('btnh_color','#000');
    $cart_head_text = get_option('cart_head_text','Your Cart');
    $cart_btn_text = get_option('cart_btn_text','View Cart');
    $checkout_btn_text = get_option('checkout_btn_text','Checkout Now');
    $shopping_btn_text = get_option('shopping_btn_text','Keep Shopping');
    $empty_cart_text = get_option('empty_cart_text','Your cart is empty.');
    $return_shop_text = get_option('return_shop_text','Return to Shop');
    $cart_btn_url = get_option('cart_btn_url',wc_get_cart_url());
    $checkout_btn_url = get_option('checkout_btn_url',wc_get_checkout_url());
    $continue_shopping_btn_url = get_option('continue_shopping_btn_url','#');
    $basket_bg_color = get_option('basket_bg_color','#000000');
    $basket_color = get_option('basket_color','#ffffff');
    $basket_count_position = get_option('basket_count_position','top_right');
    $count_text_color = get_option('count_text_color','#ffffff');
    $count_bg_color = get_option('count_bg_color','#12b99a');
    $close_icon = get_option('close_icon','close_icon_1');
    $close_icon_color = get_option('close_icon_color','#000000');
    $pscfw_delete_type = get_option('pscfw_delete_type','pscfw_delete_icon');
    $delete_btn_text = get_option('delete_btn_text','REMOVE');
    $pscfw_remove_text_color = get_option('pscfw_remove_text_color','#000000');
    $pscfw_remove_text_hover_color = get_option('pscfw_remove_text_hover_color','#000000');
    $trash_icon = get_option('trash_icon','trash_icon1');
    $basket_icon = get_option('basket_icon','cart_1');
    $basket_size = get_option('basket_size','30');
    $basket_up_offset = get_option('basket_up_offset','15');
    $basket_down_offset = get_option('basket_down_offset','15');
    $header_heading_position = get_option('header_heading_position','center');
    $header_close_position = get_option('header_close_position','right');
    $basekt_position = get_option('basekt_position','right');
    $basekt_shape = get_option('basekt_shape','round');
    $show_product_count = get_option('show_product_count','true');
    $backet_product_count = get_option('backet_product_count','count_items');
    $pscfw_cart_order = get_option('pscfw_cart_order','cart_order_asc');
    $pscfw_hide_basket_pages = get_option('pscfw_hide_basket_pages');
    $enable_pro_img = get_option('enable_pro_img','true');
    $enable_pro_name = get_option('enable_pro_name','true');
    $enable_pro_price = get_option('enable_pro_price','true');
    $enable_pro_total = get_option('enable_pro_total','true');
    $enable_pro_qty = get_option('enable_pro_qty','true');
    $enable_pro_delete = get_option('enable_pro_delete','true');
    $enable_product_link = get_option('enable_product_link','true');
    $enable_header_close = get_option('enable_header_close','true');
    $enable_slider_img = get_option('enable_slider_img','true');
    $enable_slider_pro_name = get_option('enable_slider_pro_name','true');
    $enable_slider_pro_price = get_option('enable_slider_pro_price','true');
    $enable_slider_btn = get_option('enable_slider_btn','true');

    if(isset($_POST['add-to-cart']) && isset($_POST['quantity'])){
    ?>
        <!-- <script type="text/javascript">
            setTimeout(function() {
                jQuery(".cart_icon").trigger('click');
          
                jQuery("body").addClass("cart_sidebar");
                jQuery(".cart_container").addClass("product_detail");
                jQuery(".background_overlay").addClass("overlay_disable");

                if(jQuery('.cart_icon').hasClass('atc_custom')){
                   jQuery('.cart_icon').removeClass('atc_custom');
                }
            }, 100);
        </script> -->
        <script>
            jQuery(function($){
                jQuery('.cart_icon').click();
            });
        </script>
    <?php } ?>

    <style type="text/css">
        a.product_slide_cart, a.variable_product_slide_cart {
            background-color: <?php echo esc_attr($slider_btn_back_color); ?>;
            color: <?php echo esc_attr($slider_btn_text_color); ?>;
        }
        #close-btn {
            <?php if($header_close_position == 'right'){?>
                right: 12px;
            <?php }else{ ?>
                left: 12px;
            <?php } ?>
        }
        #close-btn svg {
            fill: <?php echo esc_attr($close_icon_color); ?>;
            width: <?php echo esc_attr($head_close_size); ?>px;
            height: <?php echo esc_attr($head_close_size); ?>px;
        }
        .pscfw_header_box {
            background-color: <?php echo esc_attr($shead_color); ?>;
            border-color: <?php echo esc_attr($shborder_color); ?>;
            border-style: <?php echo esc_attr($shb_style); ?>;
            <?php if($header_heading_position == 'center'){ ?>
                justify-content: center;
            <?php }else if($header_heading_position == 'left'){ ?>
                justify-content: flex-start;
            <?php }else{ ?>
                justify-content: flex-end;
            <?php } ?>
        }
        .atc_header h4 {
            color: <?php echo esc_attr($shthead_color); ?>;
            font-size: <?php echo esc_attr($head_font_size); ?>px !important;
        }
        <?php if($basket_count_position == 'top_right'){?>
        .sidebar_cart_count {
            color: <?php echo esc_attr($count_text_color); ?>;
            background: <?php echo esc_attr($count_bg_color); ?>;
            left: 45px;
        }
        <?php } ?>
        <?php if($basket_count_position == 'top_left'){?>
        .sidebar_cart_count {
            color: <?php echo esc_attr($count_text_color); ?>;
            background: <?php echo esc_attr($count_bg_color); ?>;
            right: 45px;
        }
        <?php } ?>
        .atcproduct_content {
            background-color: <?php echo esc_attr($clpback_color); ?>;
        }
        .atcproduct_content .p_img img {
            max-width: <?php echo esc_attr($clpimg_width); ?>px;
            max-height: <?php echo esc_attr($clpimg_width); ?>px;
            border-radius: <?php echo esc_attr($pib_radious); ?>px;
            display: inline-block;
        }
        .product_title a{
            color: <?php echo esc_attr($ptc_color); ?>;
        }
        .product_title a:hover {
            color: <?php echo esc_attr($pth_hover); ?>;
        }
        .atcproduct_desc .p_price {
            color: <?php echo esc_attr($prop_color); ?>;
        }
        .pd_delete svg {
            fill: <?php echo esc_attr($pd_color); ?>;
        }
        .pd_delete svg:hover {
            fill: <?php echo esc_attr($pdc_hover); ?>;
        }
        a.pscfw_remove span {
            color: <?php echo esc_attr($pscfw_remove_text_color); ?>;
        }
        a.pscfw_remove span:hover {
            color: <?php echo esc_attr($pscfw_remove_text_hover_color); ?>;
        }
        .cart_pro_slide {
            background-color: <?php echo esc_attr($slider_back_color); ?>;
            <?php if($slid_enable_desk == 'true'){ ?>
                display: block;
            <?php }else{?>
                display: none;
            <?php } ?>
        }
        .slide_img img {
            max-width: <?php echo esc_attr($slider_img_width); ?>px;
            max-height: <?php echo esc_attr($slider_img_width); ?>px;
        }
        .cart_info .catp_title a, .cart_info .catp_price {
            font-size: <?php echo esc_attr($slider_font_size); ?>px;
        }
        .cart_info .catp_title a {
            color: <?php echo esc_attr($slider_pro_title_color); ?>;
        }
        a.product_slide_cart:hover {
            color: <?php echo esc_attr($slider_btn_hover_text_color); ?>;
            background-color: <?php echo esc_attr($slider_btn_back_hover_color); ?>;
        }
        .atc_footer {
            background-color: <?php echo esc_attr($atcfb_color); ?>;
        }
        .product_button_box .pscfw_checkout_btn, .product_button_box .pscfw_continue_shopping_btn, .product_button_box .pscfw_view_cart_btn {
            background-color: <?php echo esc_attr($cbc_color); ?>;
            color: <?php echo esc_attr($btn_text_color); ?>;
            font-size: <?php echo esc_attr($btn_font_size); ?>px;
            padding: <?php echo esc_attr($pscfw_fbtn_padding); ?>;
        }
        .product_button_box .pscfw_checkout_btn:hover, .product_button_box .pscfw_continue_shopping_btn:hover, .product_button_box .pscfw_view_cart_btn:hover {
            background: <?php echo esc_attr($cbh_color); ?>;
            color: <?php echo esc_attr($btnh_color); ?>;
        }
        .product_button_box {
            <?php if($pscfw_btn_row == 'one_row'){ ?>
                grid-template-columns: auto;
            <?php }else if($pscfw_btn_row == 'two_one_row'){ ?>
                grid-template-columns: 1fr 1fr;
            <?php }else if($pscfw_btn_row == 'one_two_row') { ?>
                grid-template-columns: 1fr 1fr;
            <?php } ?>
        }
        <?php if($pscfw_btn_row == 'two_one_row'){ ?>
            .product_button_box a:nth-child(3) {
                grid-column: 1/-1;
            }
        <?php } ?>
        <?php if($pscfw_btn_row == 'one_two_row'){ ?>
            .product_button_box a:nth-child(1) {
                grid-column: 1/-1;
            }
        <?php } ?>
        <?php if($pscfw_btn_row == 'two_one_row' || empty($checkout_btn_url) || empty($checkout_btn_text) || empty($cart_btn_url) || empty($cart_btn_text) ){ ?>
            .product_button_box a:only-child {
                grid-column: 1/-1;
            }
        <?php } ?>   
        .cart_icon {
            <?php if($basekt_position == 'left'){ ?>
                left: <?php echo esc_attr($basket_down_offset); ?>px;
            <?php }else if($basekt_position == 'right'){ ?>
                right: <?php echo esc_attr($basket_down_offset); ?>px;
            <?php } ?>
            <?php if($basekt_shape == 'square'){ ?>
                border-radius: 10px;
            <?php }else if($basekt_shape == 'round'){ ?>
                border-radius: 100px;
            <?php } ?>
            bottom: <?php echo esc_attr($basket_up_offset); ?>px;
            background-color: <?php echo esc_attr($basket_bg_color); ?>;
        }
        .cart_container {
            <?php if($basekt_position == 'left'){ ?>
                left: -<?php echo esc_attr($atcmax_width); ?>px;
            <?php }else if($basekt_position == 'right'){ ?>
                right: -<?php echo esc_attr($atcmax_width); ?>px;
            <?php } ?>
            width: <?php echo esc_attr($atcmax_width); ?>px;
        }
        .pscfw_basket svg {
            fill: <?php echo esc_attr($basket_color); ?>;
            width: <?php echo esc_attr($basket_size); ?>px;
            height: <?php echo esc_attr($basket_size); ?>px;
        }
        .pscfw_basket img {
            max-width: <?php echo esc_attr($basket_size); ?>px;
            max-height: <?php echo esc_attr($basket_size); ?>px;
        }
        <?php if($enable_slider_img == ''){ ?>
        .catp_img {
            display: none;
        }
        <?php } ?>
        <?php if($enable_slider_pro_name == ''){ ?>
        .catp_title {
            display: none;
        }
        <?php } ?>
        <?php if($enable_slider_pro_price == ''){ ?>
        .catp_price {
            display: none;
        }
        <?php } ?>
        <?php if($enable_slider_btn == ''){ ?>
        .slide_pro_btn {
            display: none;
        }
        <?php } ?>


        @media only screen and (max-width: 767px) {
            .cart_pro_slide {
                <?php if($slid_enable_mob == 'true'){ ?>
                    display: block;
                <?php }else{ ?>
                    display: none;
                <?php } ?>
            }
        }
    </style>
    <div class="background_overlay"></div>
    <div class="atc_popup">
        <div class="cart_container">
            <div class="pscfw_header_box">
                <?php if($enable_header_close == 'true') { ?>
                    <div id="close-btn">
                        <?php
                            if($close_icon == 'close_icon_1'){
                                echo html_entity_decode(esc_attr($pscfw_icon['close_icon_1']));
                            }else if($close_icon == 'close_icon_2'){
                                echo html_entity_decode(esc_attr($pscfw_icon['close_icon_2']));
                            }else if($close_icon == 'close_icon_3'){
                                echo html_entity_decode(esc_attr($pscfw_icon['close_icon_3']));
                            }else if($close_icon == 'close_icon_4'){
                                echo html_entity_decode(esc_attr($pscfw_icon['close_icon_4']));
                            }else if($close_icon == 'close_icon_5'){
                                echo html_entity_decode(esc_attr($pscfw_icon['close_icon_5']));
                            }else if($close_icon == 'close_icon_6'){
                                echo html_entity_decode(esc_attr($pscfw_icon['close_icon_6']));
                            }else if($close_icon == 'close_icon_7'){
                                echo html_entity_decode(esc_attr($pscfw_icon['close_icon_7']));
                            }
                        ?>
                    </div>
                <?php } ?>
                <?php if(!empty($cart_head_text)){ ?>
                    <div class="atc_header">
                        <h4><?php echo esc_attr($cart_head_text); ?></h4>
                    </div>
                <?php } ?>
            </div>
            <div class="atcproduct_content">
                <ul class="cart_products">
                    <?php
                        $product = get_option('pscfw_product_slider');
                        // $items = $woocommerce->cart->get_cart();
                        $items = $pscfw_cart_order === 'cart_order_asc' ? $woocommerce->cart->get_cart() : array_reverse($woocommerce->cart->get_cart());

                        if(!empty($items)){
                            foreach($items as $item => $values) {    
                                // if(array_key_exists($values['data']->get_id(), $product)) {
                                $_product =  wc_get_product($values['data']->get_id());
                                $product_id = $values['product_id'];
                                $product_attribute_key = $values['key'];
                                $img = $_product->get_image();
                                $product_name = $_product->get_name();
                                $pro_quantity = $values['quantity']; 
                                $price = WC()->cart->get_product_price( $_product );

                                $pscfw_totals = WC()->cart->get_totals();
                                $sub_total = $pscfw_totals['subtotal'];
                                // $sub_total = WC()->cart->get_cart_total();

                                $final_total = WC()->cart->total;
                                $cart_item_remove_url = wc_get_cart_remove_url( $item );
                                $permalink = $_product->get_permalink( $values );
                                $qty_subtotal = WC()->cart->get_product_subtotal( $_product, $values['quantity'] );
                        ?>
                    <li class="atc_cart" product_id="<?php echo esc_attr($product_id); ?>">
                        <?php if($enable_pro_img == 'true') { ?>
                        <div class="p_img">
                            <?php if($enable_product_link == 'true'){ ?>
                                <a href="<?php echo esc_url($permalink); ?>">
                                    <?php echo $_product->get_image('thumbnail'); ?>
                                </a>
                            <?php }else{ ?>
                                <?php echo $_product->get_image('thumbnail'); ?>
                            <?php } ?>
                        </div>
                        <?php } ?>
                        <div class="atcproduct_info"> 
                            <div class="p_title_top">
                                <?php if($enable_pro_name == 'true') { ?>
                                    <div class="product_title">
                                        <?php if($enable_product_link == 'true'){ ?>
                                            <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_attr($product_name); ?></a>
                                        <?php }else{ ?>
                                            <a><?php echo esc_attr($product_name); ?></a>
                                        <?php } ?>
                                    </div>
                                <?php } ?>
                                <?php if($enable_pro_delete == 'true') { ?>
                                    <div class="pd_delete">
                                        <a class="pscfw_remove" data-product_id="<?php echo $product_id; ?>" data-product_name="<?php echo $product_name; ?>">
                                            <?php
                                                if($pscfw_delete_type == 'pscfw_delete_icon'){
                                                    if($trash_icon == 'trash_icon1'){
                                                        echo html_entity_decode(esc_attr($pscfw_icon['trash_icon1']));
                                                    }else if($trash_icon == 'trash_icon2'){
                                                        echo html_entity_decode(esc_attr($pscfw_icon['trash_icon2']));
                                                    }else if($trash_icon == 'trash_icon3'){
                                                        echo html_entity_decode(esc_attr($pscfw_icon['trash_icon3']));
                                                    }else if($trash_icon == 'trash_icon4'){
                                                        echo html_entity_decode(esc_attr($pscfw_icon['trash_icon4']));
                                                    }else if($trash_icon == 'trash_icon5'){
                                                        echo html_entity_decode(esc_attr($pscfw_icon['trash_icon5']));
                                                    }else if($trash_icon == 'trash_icon6'){
                                                        echo html_entity_decode(esc_attr($pscfw_icon['trash_icon6']));
                                                    }else if($trash_icon == 'trash_icon7'){
                                                        echo html_entity_decode(esc_attr($pscfw_icon['trash_icon7']));
                                                    }else if($trash_icon == 'trash_icon8'){
                                                        echo html_entity_decode(esc_attr($pscfw_icon['trash_icon8']));
                                                    }
                                                }else{ ?>
                                                    <span><?php echo esc_attr($delete_btn_text); ?></span>
                                                    <?php
                                                }
                                            ?>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="atcproduct_desc">
                                <?php if($enable_pro_price == 'true'){ ?>
                                    <div class="p_price"><?php echo wp_kses_post($price); ?></div>
                                <?php } ?>
                                <?php if($enable_pro_qty == 'true'){ ?>
                                    <div class="p_qty"> 
                                        <input type="number" class="pqty_total" name="atcaiofw_qty"  pro_qty_key="<?php echo esc_attr($product_attribute_key); ?>" value="<?php echo esc_attr($pro_quantity); ?>"> 
                                    </div>
                                <?php } ?>
                                <?php if($enable_pro_total == 'true'){ ?>
                                    <div class="qty_subtotal">
                                        <div class="atc_sub"><?php echo wp_kses_post($qty_subtotal); ?></div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                    <?php }
                    }else{
                    ?>
                        <?php if(!empty($empty_cart_text)){ ?>
                            <div class="cart_empty_notice"><?php echo esc_attr($empty_cart_text); ?></div>
                        <?php } ?>
                        <?php if(!empty($return_shop_text)){ ?>
                            <div class="product_button_box">
                                <a class="btn_return_shop" href="<?php echo wc_get_page_permalink( 'shop' ) ?>"><?php echo esc_attr($return_shop_text); ?></a>
                            </div>
                        <?php } ?>

                        <style type="text/css">
                            .atcproduct_content {
                                display: flex;
                                align-items: center;
                                justify-content: center;
                            }
                        </style>
                        <?php
                        }
                    ?>
                </ul>
            </div>
            <?php 
            $product = get_option('pscfw_product_slider');
            /*echo "<pre>";
            print_r($product);
            echo "</pre>";*/
            // WC()->cart->empty_cart();
            if(!empty($product)) { ?>
            <div class="cart_pro_slide">
                <div class="atc_sugg">
                    <div class="cart_slid_main">
                        <div class="cart_slid_inner">
                            <!-- <div class="cfpro_title"><?php //echo esc_html('Products you might like','prodcut-side-cart-for-woocommerce'); ?></div> -->
                            <div class="cfs_pro_detail owl-carousel owl-theme">
                            <?php  
                            foreach ($product as $value) {
                                $pro_data = wc_get_product( $value );
                                $product_id = $pro_data->get_id();
                                $p_image = $pro_data->get_image();
                                $product_name = $pro_data->get_name();
                                $product_price = WC()->cart->get_product_price( $pro_data );
                                // $product_price = $pro_data->get_price();
                                $footer_pro_permalink = get_permalink( $product_id );
                                $cart_product_ids = array();
                                foreach( WC()->cart->get_cart() as $values ){
                                    $cart_product_ids[] = $values['data']->get_id();
                                }

                                if (!in_array($value, $cart_product_ids)) { ?>
                                <div class="product_slide">
                                    <div class="cfs_inner">
                                        <div class="catp_img">
                                            <div class="slide_img">
                                                <a href="<?php echo esc_url($footer_pro_permalink); ?>"><?php echo wp_kses_post($p_image); ?></a>
                                            </div>
                                        </div> 
                                        <div class="cart_info"> 
                                            <div class="catp_title">
                                                <a href="<?php echo esc_url($footer_pro_permalink); ?>"><?php echo esc_attr($product_name); ?></a>
                                            </div> 
                                            <div class="cart_sub_price">
                                                <div class="catp_price"><?php echo wp_kses_post($product_price); ?></div>
                                                <div class="slide_pro_btn">
                                                    <?php 
                                                    if($pro_data->get_type() == 'simple') {?>
                                                        <a href="?add-to-cart=<?php echo esc_attr($product_id); ?>" data-quantity="1" class="product_slide_cart" data-product_id=<?php echo esc_attr($product_id);?>><span><?php echo esc_html('+','prodcut-side-cart-for-woocommerce'); ?></span><?php echo esc_html('Add','prodcut-side-cart-for-woocommerce'); ?></a>
                                                    <?php }elseif($pro_data->get_type() == 'variable' ) { ?>
                                                        <a href="<?php echo esc_url($footer_pro_permalink); ?>" data-quantity="1" class="variable_product_slide_cart" data-product_id=<?php echo esc_attr($product_id);?>><?php echo esc_html('View','prodcut-side-cart-for-woocommerce'); ?></a>
                                                    <?php }elseif ($pro_data->get_type() == 'variation') { ?>
                                                        <a href="?add-to-cart=<?php echo esc_attr($product_id); ?>" data-quantity="1" class="product_slide_cart" data-product_id=<?php echo esc_attr($product_id);?>><span><?php echo esc_html('+','prodcut-side-cart-for-woocommerce'); ?></span><?php echo esc_html('Add','prodcut-side-cart-for-woocommerce'); ?></a>
                                                    <?php } ?>
                                                </div> 
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                                <?php  
                                    }
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
            <div class="atc_footer">
                <?php //$sub_total = WC()->cart->get_cart_total(); 
                $pscfw_totals = WC()->cart->get_totals();
                $sub_total = $pscfw_totals['subtotal'];?>
                <div class="atc_footer_detail">
                    <div class="atc_subtotal">
                        <div class="product_total_box">
                            <?php if($display_subtotal == 'true'){ ?>
                            <div class="product_total_text">
                                <span class="asb_total"><?php echo esc_html('Sub Total - ','prodcut-side-cart-for-woocommerce'); ?></span><?php echo esc_attr(WC()->cart->get_cart_contents_count()); ?><span><?php echo esc_html(' items','prodcut-side-cart-for-woocommerce'); ?></span>
                            </div>
                            <div class="product_total_amount">
                                <span class="asb_num"><?php echo get_woocommerce_currency_symbol().number_format($sub_total, 2); ?></span>
                            </div>
                            <?php } ?>
                        </div>
                        <?php if($display_shipping_total == 'true'){ ?>
                            <div class="product_shipping_box">
                                <div class="pscfw_shipping_text">
                                    <span class="pscfw_shipping"><?php echo esc_html('Shipping','prodcut-side-cart-for-woocommerce'); ?></span>
                                    <span class="pscfw_shipping"><?php echo sanitize_text_field( WC()->cart->get_cart_shipping_total() ); ?></span>
                                </div>
                            </div>
                        <?php } ?>
                        <?php if($display_total == 'true'){ ?>
                            <div class="product_final_total_box">
                                <div class="pscfw_final_total_text">
                                    <span class="pscfw_final_total"><?php echo esc_html('Total','prodcut-side-cart-for-woocommerce'); ?></span>
                                    <span class="cart_shipping_total"><?php echo get_woocommerce_currency_symbol().number_format((float)WC()->cart->total, 2); ?></span>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="product_button_box">
                        <?php
                        $button_positions = get_option('pscfw_button_position', array());
                        
                        $button_positions = array_unique($button_positions);
                        /*echo "<pre>";
                        print_r($button_positions);
                        echo "</pre>";*/
                        // Display buttons based on the button positions
                        foreach ($button_positions as $position) {
                            switch ($position) {
                                case 'cart':
                                    if (!empty($cart_btn_url) && !empty($cart_btn_text)) {
                                        ?>
                                        <a class="pscfw_view_cart_btn" href="<?php echo esc_url($cart_btn_url); ?>"><?php echo esc_attr($cart_btn_text); ?></a>
                                        <?php
                                    }
                                    break;
                                case 'checkout':
                                    if (!empty($checkout_btn_url) && !empty($checkout_btn_text)) {
                                        ?>
                                        <a class="pscfw_checkout_btn" href="<?php echo esc_url($checkout_btn_url); ?>"><?php echo esc_attr($checkout_btn_text); ?></a>
                                        <?php
                                    }
                                    break;
                                case 'keepshopping':
                                    if (!empty($continue_shopping_btn_url) && !empty($shopping_btn_text)) {
                                        ?>
                                        <a class="pscfw_continue_shopping_btn" href="<?php echo esc_url($continue_shopping_btn_url); ?>"><?php echo esc_attr($shopping_btn_text); ?></a>
                                        <?php
                                    }
                                    break;
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php 
                    // }
                ?>
                
            </div>
        </div>
    </div>
    
    <?php
    // $displayed = false; 

    // $pscfw_hide_basket_pages = get_option( 'pscfw_hide_basket_pages' );
    
    // $current_page_id = get_the_ID();
    // $hide_basket_pages = array_map('intval', explode(',', $pscfw_hide_basket_pages));
    // if (in_array($current_page_id, $hide_basket_pages)) {
    //     $displayed = true; 
    // }

    // if(!$displayed){
    //     echo pscfw_cart_for_page();
    // }

    $displayed = true;
    $pscfw_hide_basket_pages = get_option('pscfw_hide_basket_pages');
    
    if (!empty($pscfw_hide_basket_pages)) {
        $current_page_id = get_the_ID();
        $current_page_slug = get_post_field('post_name', $current_page_id);
        $hide_basket_pages = explode(',', $pscfw_hide_basket_pages);
        // $hide_basket_pages = array_map('intval', explode(',', $pscfw_hide_basket_pages));
        
        if (in_array($current_page_id, $hide_basket_pages) || in_array($current_page_slug, $hide_basket_pages)) {
            $displayed = false;
        }
    }

    if ($displayed) {
        echo pscfw_cart_for_page();
    }
}
add_action( 'wp_footer', 'pscfw_add_to_cart_popup' );

function pscfw_cart_for_page(){
    global $pscfw_icon;

    $atc_enable = get_option('atc_enable','true');
    $mobile_en = get_option('mobile_en','true');
    $show_product_count = get_option('show_product_count','true');
    $backet_product_count = get_option('backet_product_count','count_items');
    $basket_icon = get_option('basket_icon','cart_1');
    ?>
    <div class="cart_icon atc_custom <?php if($atc_enable == true){ echo "atc_disblock"; }?> <?php if($mobile_en == true){echo "atcmo_disblock";} ?>">
        <?php if($show_product_count == 'true'){ ?>
            <div class="sidebar_cart_count">
                <div class="cart_product_count">
                    <?php 
                        if($backet_product_count == 'count_items'){
                            $product_count = count(WC()->cart->get_cart());
                        }else{
                            $product_count = WC()->cart->get_cart_contents_count();
                        }
                    ?> 
                    <?php echo esc_attr($product_count); ?>
                </div>
            </div>
        <?php } ?>
        <div class="pscfw_basket">
            <?php 
                $uploaded_image = get_option('pscfw_cart_image');
                // echo $uploaded_image;
                if (!empty($uploaded_image)) { ?>
                    <div class="pscfw_cart_img">
                        <?php
                        echo '<img src="' . esc_attr($uploaded_image) . '" alt="Uploaded Image">';
                        ?>
                    </div>
                    <?php
                }else{
                    if($basket_icon == 'cart_1'){
                        echo $pscfw_icon['cart_1'];
                    }else if($basket_icon == 'cart_2'){
                        echo $pscfw_icon['cart_2'];
                    }else if($basket_icon == 'cart_3'){
                        echo $pscfw_icon['cart_3'];
                    }else if($basket_icon == 'cart_4'){
                        echo $pscfw_icon['cart_4'];
                    }else if($basket_icon == 'cart_5'){
                        echo $pscfw_icon['cart_5'];
                    }else if($basket_icon == 'cart_6'){
                        echo $pscfw_icon['cart_6'];
                    }else if($basket_icon == 'cart_7'){
                        echo $pscfw_icon['cart_7'];
                    }else if($basket_icon == 'cart_8'){
                        echo $pscfw_icon['cart_8'];
                    }
                }
            ?>
        </div>
    </div>
    <?php
}



function pscfw_atcaiofw_cart() {
    global $pscfw_icon;
    ob_start();

    $pscfw_delete_type = get_option('pscfw_delete_type','pscfw_delete_icon');
    $delete_btn_text = get_option('delete_btn_text','REMOVE');
    $trash_icon = get_option('trash_icon','fa-solid fa-trash');
    $close_icon = get_option('close_icon','close_icon_1');
    $cart_head_text = get_option('cart_head_text','Your Cart');
    $cart_btn_text = get_option('cart_btn_text','View Cart');
    $checkout_btn_text = get_option('checkout_btn_text','Checkout Now');
    $shopping_btn_text = get_option('shopping_btn_text','Keep Shopping');
    $empty_cart_text = get_option('empty_cart_text','Your cart is empty.');
    $return_shop_text = get_option('return_shop_text','Return to Shop');
    $enable_pro_img = get_option('enable_pro_img','true');
    $enable_pro_name = get_option('enable_pro_name','true');
    $enable_pro_price = get_option('enable_pro_price','true');
    $enable_pro_total = get_option('enable_pro_total','true');
    $enable_pro_qty = get_option('enable_pro_qty','true');
    $enable_pro_delete = get_option('enable_pro_delete','true');
    $enable_product_link = get_option('enable_product_link','true');
    $enable_header_close = get_option('enable_header_close','true');
    $show_product_count = get_option('show_product_count','true');
    $backet_product_count = get_option('backet_product_count','count_items');
    $pscfw_cart_order = get_option('pscfw_cart_order','cart_order_asc');
    $display_subtotal = get_option('display_subtotal','true');
    $display_shipping_total = get_option('display_shipping_total','true');
    $display_total = get_option('display_total','true');
    $cart_btn_url = get_option('cart_btn_url',wc_get_cart_url());
    $checkout_btn_url = get_option('checkout_btn_url',wc_get_checkout_url());
    $continue_shopping_btn_url = get_option('continue_shopping_btn_url','#');
 ?>
    <script type="text/javascript">
        jQuery('.cfs_pro_detail').owlCarousel({
            loop: true, 
            slideSpeed : 300,
            paginationSpeed : 400,   
            items : 1, 
            nav: true,
            dots: false,
            navClass:['owl-prev', 'owl-next'],
            autoplay: true,
            autoplayTimeout: 5000,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });

    </script>
    <div class="pscfw_header_box">
        <?php if($enable_header_close == 'true') { ?>
            <div id="close-btn">
                <?php
                    if($close_icon == 'close_icon_1'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_1']));
                    }else if($close_icon == 'close_icon_2'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_2']));
                    }else if($close_icon == 'close_icon_3'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_3']));
                    }else if($close_icon == 'close_icon_4'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_4']));
                    }else if($close_icon == 'close_icon_5'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_5']));
                    }else if($close_icon == 'close_icon_6'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_6']));
                    }else if($close_icon == 'close_icon_7'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_7']));
                    }
                ?>
            </div>
        <?php } ?>
        <?php if(!empty($cart_head_text)){ ?>
            <div class="atc_header">
                <h4><?php echo esc_attr($cart_head_text); ?></h4>
            </div>
        <?php } ?>
    </div>
    <div class="atcproduct_content">
        <ul class="cart_products">
            <?php 
                global $woocommerce;
                // $items = $woocommerce->cart->get_cart();
                $items = $pscfw_cart_order === 'cart_order_asc' ? $woocommerce->cart->get_cart() : array_reverse($woocommerce->cart->get_cart());

                // echo "<pre>";
                // print_r($items);
                // echo "</pre>";
                if(!empty($items)){
                foreach($items as $item => $values) { 

                    
                    $_product =  wc_get_product( $values['data']->get_id());
                    // echo "<pre>";
                    // print_r($_product->get_name());
                    // echo "</pre>";
                    // if($_product->get_type() == 'variable'):
                    //   woocommerce_variable_add_to_cart();
                    // endif;
                    $product_id = $values['product_id'];
                    $product_attribute_key = $values['key'];
                    $img = $_product->get_image();
                    // $img = $product_id->get_image('thumbnail');
                    $product_name = $_product->get_name();
                    $pro_quantity = $values['quantity']; 
                    $price = WC()->cart->get_product_price( $_product );
                    $pscfw_totals = WC()->cart->get_totals();
                    $sub_total = $pscfw_totals['subtotal'];
                    // $sub_total = WC()->cart->get_cart_total();
                    $final_total = WC()->cart->total;
                    $cart_item_remove_url = wc_get_cart_remove_url( $item );
                    $permalink = $_product->get_permalink( $values );
                    $qty_subtotal = WC()->cart->get_product_subtotal( $_product, $values['quantity'] );
            ?>
            <li class="atc_cart" product_id="<?php echo $product_id; ?>">
                <?php if($enable_pro_img == 'true') { ?>
                <div class="p_img">
                    <?php if($enable_product_link == 'true'){ ?>
                        <a href="<?php echo esc_url($permalink); ?>">
                            <?php echo $_product->get_image('thumbnail'); ?>
                        </a>
                    <?php }else{ ?>
                        <?php echo $_product->get_image('thumbnail'); ?>
                    <?php } ?>
                </div>
                <?php } ?>
                <div class="atcproduct_info"> 
                    <div class="p_title_top">
                        <?php if($enable_pro_name == 'true') { ?>
                            <div class="product_title">
                                <?php if($enable_product_link == 'true'){ ?>
                                    <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_attr($product_name); ?></a>
                                <?php }else{ ?>
                                    <a><?php echo esc_attr($product_name); ?></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if($enable_pro_delete == 'true') { ?>
                            <div class="pd_delete">
                                <a class="pscfw_remove" data-product_id="<?php echo $product_id; ?>" data-product_name="<?php echo $product_name; ?>">
                                    <?php
                                        if($pscfw_delete_type == 'pscfw_delete_icon'){
                                            if($trash_icon == 'trash_icon1'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon1']));
                                            }else if($trash_icon == 'trash_icon2'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon2']));
                                            }else if($trash_icon == 'trash_icon3'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon3']));
                                            }else if($trash_icon == 'trash_icon4'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon4']));
                                            }else if($trash_icon == 'trash_icon5'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon5']));
                                            }else if($trash_icon == 'trash_icon6'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon6']));
                                            }else if($trash_icon == 'trash_icon7'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon7']));
                                            }else if($trash_icon == 'trash_icon8'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon8']));
                                            }
                                        }else{ ?>
                                            <span><?php echo esc_attr($delete_btn_text); ?></span>
                                            <?php
                                        }
                                    ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="atcproduct_desc">
                        <?php if($enable_pro_price == 'true'){ ?>
                            <div class="p_price"><?php echo wp_kses_post($price); ?></div>
                        <?php } ?>
                        <?php if($enable_pro_qty == 'true'){ ?>
                            <div class="p_qty"> 
                                <input type="number" class="pqty_total" name="atcaiofw_qty"  pro_qty_key="<?php echo esc_attr($product_attribute_key); ?>" value="<?php echo esc_attr($pro_quantity); ?>"> 
                            </div>
                        <?php } ?>
                        <?php if($enable_pro_total == 'true'){ ?>
                            <div class="qty_subtotal">
                                <div class="atc_sub"><?php echo wp_kses_post($qty_subtotal); ?></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <?php }
            }else{
            ?>
                <?php if(!empty($empty_cart_text)){ ?>
                    <div class="cart_empty_notice"><?php echo esc_attr($empty_cart_text); ?></div>
                <?php } ?>
                <?php if(!empty($return_shop_text)){ ?>
                    <div class="product_button_box">
                        <a class="btn_return_shop" href="<?php echo wc_get_page_permalink( 'shop' ) ?>"><?php echo esc_attr($return_shop_text); ?></a>
                    </div>
                <?php } ?>

                <style type="text/css">
                    .atcproduct_content {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                </style>
                <?php
                }
            ?>
        </ul>
    </div>
    <?php 
    $product = get_option('pscfw_product_slider');
    if(!empty($product)){?>
    <div class="cart_pro_slide">
        <div class="atc_sugg">
            <div class="cart_slid_main">
                <div class="cart_slid_inner">
                    <!-- <div class="cfpro_title"><?php //echo esc_html('Products you might like','prodcut-side-cart-for-woocommerce'); ?></div> -->
                    <div class="cfs_pro_detail owl-carousel owl-theme">
                    <?php  
                    foreach ($product as $value) {
                        $pro_data = wc_get_product( $value );
                        $product_id = $pro_data->get_id();
                        $p_image = $pro_data->get_image();
                        $product_name = $pro_data->get_name();
                        $product_price = WC()->cart->get_product_price( $pro_data );
                        // $product_price = $pro_data->get_price();
                        $footer_pro_permalink = get_permalink( $product_id );
                        $cart_product_ids = array();
                        foreach( WC()->cart->get_cart() as $values ){
                            $cart_product_ids[] = $values['data']->get_id();
                        }

                        if (!in_array($value, $cart_product_ids)) { ?>
                        <div class="product_slide">
                            <div class="cfs_inner">
                                <div class="catp_img">
                                    <div class="slide_img">
                                        <a href="<?php echo esc_url($footer_pro_permalink); ?>"><?php echo wp_kses_post($p_image); ?></a>
                                    </div>
                                </div> 
                                <div class="cart_info"> 
                                    <div class="catp_title">
                                        <a href="<?php echo esc_url($footer_pro_permalink); ?>"><?php echo esc_attr($product_name); ?></a>
                                    </div> 
                                    <div class="cart_sub_price">
                                        <div class="catp_price"><?php echo wp_kses_post($product_price); ?></div>
                                        <div class="slide_pro_btn">
                                            <?php 
                                            if($pro_data->get_type() == 'simple') {?>
                                                <a href="?add-to-cart=<?php echo esc_attr($product_id); ?>" data-quantity="1" class="product_slide_cart" data-product_id=<?php echo esc_attr($product_id);?>><span><?php echo esc_html('+','prodcut-side-cart-for-woocommerce'); ?></span><?php echo esc_html('Add','prodcut-side-cart-for-woocommerce'); ?></a>
                                            <?php }elseif($pro_data->get_type() == 'variable' ) { ?>
                                                <a href="<?php echo esc_url($footer_pro_permalink); ?>" data-quantity="1" class="variable_product_slide_cart" data-product_id=<?php echo esc_attr($product_id);?>><?php echo esc_html('View','prodcut-side-cart-for-woocommerce'); ?></a>
                                            <?php }elseif ($pro_data->get_type() == 'variation') { ?>
                                                <a href="?add-to-cart=<?php echo esc_attr($product_id); ?>" data-quantity="1" class="product_slide_cart" data-product_id=<?php echo esc_attr($product_id);?>><span><?php echo esc_html('+','prodcut-side-cart-for-woocommerce'); ?></span><?php echo esc_html('Add','prodcut-side-cart-for-woocommerce'); ?></a>
                                            <?php } ?>
                                        </div> 
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <?php 
                            }
                        }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="atc_footer">
        <?php //$sub_total = WC()->cart->get_cart_total(); 
        $pscfw_totals = WC()->cart->get_totals();
        $sub_total = $pscfw_totals['subtotal'];?>
        <div class="atc_footer_detail">
            <div class="atc_subtotal">
                <div class="product_total_box">
                    <?php if($display_subtotal == 'true'){ ?>
                    <div class="product_total_text">
                        <span class="asb_total"><?php echo esc_html('Sub Total - ','prodcut-side-cart-for-woocommerce'); ?></span><?php echo esc_attr(WC()->cart->get_cart_contents_count()); ?><span><?php echo esc_html(' items','prodcut-side-cart-for-woocommerce'); ?></span>
                    </div>
                    <div class="product_total_amount">
                        <span class="asb_num"><?php echo get_woocommerce_currency_symbol().number_format($sub_total, 2); ?></span>
                    </div>
                    <?php } ?>
                </div>
                <?php if($display_shipping_total == 'true'){ ?>
                    <div class="product_shipping_box">
                        <div class="pscfw_shipping_text">
                            <span class="pscfw_shipping"><?php echo esc_html('Shipping','prodcut-side-cart-for-woocommerce'); ?></span>
                            <span class="pscfw_shipping"><?php echo sanitize_text_field( WC()->cart->get_cart_shipping_total() ); ?></span>
                        </div>
                    </div>
                <?php } ?>
                <?php if($display_total == 'true'){ ?>
                    <div class="product_final_total_box">
                        <div class="pscfw_final_total_text">
                            <span class="pscfw_final_total"><?php echo esc_html('Total','prodcut-side-cart-for-woocommerce'); ?></span>
                            <span class="cart_shipping_total"><?php echo get_woocommerce_currency_symbol().number_format((float)WC()->cart->total, 2); ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="product_button_box">
                <?php if(!empty($cart_btn_url) && !empty($cart_btn_text)){ ?>
                    <a class="pscfw_view_cart_btn" href="<?php echo esc_url($cart_btn_url); ?>"><?php echo esc_attr($cart_btn_text); ?></a>
                <?php } ?>
                <?php if(!empty($checkout_btn_url) && !empty($checkout_btn_text)){ ?>
                    <a class="pscfw_checkout_btn" href="<?php echo esc_url($checkout_btn_url); ?>"><?php echo esc_attr($checkout_btn_text); ?></a>
                <?php } ?>
                <?php if(!empty($continue_shopping_btn_url) && !empty($shopping_btn_text)){ ?>
                    <a class="pscfw_continue_shopping_btn" href="<?php echo esc_url($continue_shopping_btn_url); ?>"><?php echo esc_attr($shopping_btn_text); ?></a>
                <?php } ?>
            </div>
            
        </div>
        <?php 
            // }
        ?>
        
    </div>

 <?php
 $htmlcart = ob_get_contents();
 ob_end_clean();
 ob_start();
 ?>
 <div class="cart_product_count">
    <?php 
        if($show_product_count == 'true'){
            if($backet_product_count == 'count_items'){
                $product_count = count(WC()->cart->get_cart());
            }else{
                $product_count = WC()->cart->get_cart_contents_count();
            }
        }
    ?> 
    <?php echo esc_attr($product_count); ?>
</div>
 <?php
 $htmlcount= ob_get_contents();
 ob_end_clean();
 $arr=array(
        "htmlcart"=>$htmlcart,
        "htmlcount"=>$htmlcount
    );
 echo json_encode($arr);
    exit();
}
add_action( 'wp_ajax_pscfw_atcaiofw_cart', 'pscfw_atcaiofw_cart');
add_action( 'wp_ajax_nopriv_pscfw_atcaiofw_cart', 'pscfw_atcaiofw_cart' );


/**
 * Remove product from the cart
*/
function pscfw_remove_product_from_cart() {

    global $pscfw_icon;
    ob_start();
    $items = WC()->cart->get_cart();
    foreach($items as $item_key => $values) {     
        if($values['product_id'] == $_POST['product_id']){
            WC()->cart->remove_cart_item($item_key);
        }
    }

    // $product_id = $_REQUEST['product_id'];
    // WC()->cart->remove_cart_item($product_id);
    // wp_send_json_success();

    $pscfw_delete_type = get_option('pscfw_delete_type','pscfw_delete_icon');
    $delete_btn_text = get_option('delete_btn_text','REMOVE');
    $trash_icon = get_option('trash_icon','fa-solid fa-trash');
    $close_icon = get_option('close_icon','close_icon_1');
    $cart_head_text = get_option('cart_head_text','Your Cart');
    $cart_btn_text = get_option('cart_btn_text','View Cart');
    $checkout_btn_text = get_option('checkout_btn_text','Checkout Now');
    $shopping_btn_text = get_option('shopping_btn_text','Keep Shopping');
    $empty_cart_text = get_option('empty_cart_text','Your cart is empty.');
    $return_shop_text = get_option('return_shop_text','Return to Shop');
    $enable_pro_img = get_option('enable_pro_img','true');
    $enable_pro_name = get_option('enable_pro_name','true');
    $enable_pro_price = get_option('enable_pro_price','true');
    $enable_pro_total = get_option('enable_pro_total','true');
    $enable_pro_qty = get_option('enable_pro_qty','true');
    $enable_pro_delete = get_option('enable_pro_delete','true');
    $enable_product_link = get_option('enable_product_link','true');
    $enable_header_close = get_option('enable_header_close','true');
    $show_product_count = get_option('show_product_count','true');
    $backet_product_count = get_option('backet_product_count','count_items');
    $pscfw_cart_order = get_option('pscfw_cart_order','cart_order_asc');
    $display_subtotal = get_option('display_subtotal','true');
    $display_shipping_total = get_option('display_shipping_total','true');
    $display_total = get_option('display_total','true');
    $cart_btn_url = get_option('cart_btn_url',wc_get_cart_url());
    $checkout_btn_url = get_option('checkout_btn_url',wc_get_checkout_url());
    $continue_shopping_btn_url = get_option('continue_shopping_btn_url','#');
 ?>
    <script type="text/javascript">
        jQuery('.cfs_pro_detail').owlCarousel({
            loop: true, 
            slideSpeed : 300,
            paginationSpeed : 400,   
            items : 1, 
            nav: true,
            navClass:['owl-prev', 'owl-next'],
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });

    </script>
    <div class="pscfw_header_box">
        <?php if($enable_header_close == 'true') { ?>
            <div id="close-btn">
                <?php
                    if($close_icon == 'close_icon_1'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_1']));
                    }else if($close_icon == 'close_icon_2'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_2']));
                    }else if($close_icon == 'close_icon_3'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_3']));
                    }else if($close_icon == 'close_icon_4'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_4']));
                    }else if($close_icon == 'close_icon_5'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_5']));
                    }else if($close_icon == 'close_icon_6'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_6']));
                    }else if($close_icon == 'close_icon_7'){
                        echo html_entity_decode(esc_attr($pscfw_icon['close_icon_7']));
                    }
                ?>
            </div>
        <?php } ?>
        <?php if(!empty($cart_head_text)){ ?>
            <div class="atc_header">
                <h4><?php echo esc_attr($cart_head_text); ?></h4>
            </div>
        <?php } ?>
    </div>
    <div class="atcproduct_content">
        <ul class="cart_products">
            <?php 
                global $woocommerce;
                // $items = $woocommerce->cart->get_cart();
                $items = $pscfw_cart_order === 'cart_order_asc' ? $woocommerce->cart->get_cart() : array_reverse($woocommerce->cart->get_cart());

                if(!empty($items)){
                foreach($items as $item => $values) { 

                    $_product =  wc_get_product( $values['data']->get_id());
                    $product_id = $values['product_id'];
                    $product_attribute_key = $values['key'];
                    $img = $_product->get_image();
                    // $img = $product_id->get_image('thumbnail');
                    $product_name = $_product->get_name();
                    $pro_quantity = $values['quantity']; 
                    $price = WC()->cart->get_product_price( $_product );
                    $pscfw_totals = WC()->cart->get_totals();
                    $sub_total = $pscfw_totals['subtotal'];
                    // $sub_total = WC()->cart->get_cart_total();
                    $final_total = WC()->cart->total;
                    $cart_item_remove_url = wc_get_cart_remove_url( $item );
                    $permalink = $_product->get_permalink( $values );
                    $qty_subtotal = WC()->cart->get_product_subtotal( $_product, $values['quantity'] );
            ?>
            <li class="atc_cart">
                <?php if($enable_pro_img == 'true') { ?>
                <div class="p_img">
                    <?php if($enable_product_link == 'true'){ ?>
                        <a href="<?php echo esc_url($permalink); ?>">
                            <?php echo $_product->get_image('thumbnail'); ?>
                        </a>
                    <?php }else{ ?>
                        <?php echo $_product->get_image('thumbnail'); ?>
                    <?php } ?>
                </div>
                <?php } ?>
                <div class="atcproduct_info"> 
                    <div class="p_title_top">
                        <?php if($enable_pro_name == 'true') { ?>
                            <div class="product_title">
                                <?php if($enable_product_link == 'true'){ ?>
                                    <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_attr($product_name); ?></a>
                                <?php }else{ ?>
                                    <a><?php echo esc_attr($product_name); ?></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if($enable_pro_delete == 'true') { ?>
                            <div class="pd_delete">
                                <a class="pscfw_remove" data-product_id="<?php echo $product_id; ?>" data-product_name="<?php echo $product_name; ?>">
                                    <?php
                                        if($pscfw_delete_type == 'pscfw_delete_icon'){
                                            if($trash_icon == 'trash_icon1'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon1']));
                                            }else if($trash_icon == 'trash_icon2'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon2']));
                                            }else if($trash_icon == 'trash_icon3'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon3']));
                                            }else if($trash_icon == 'trash_icon4'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon4']));
                                            }else if($trash_icon == 'trash_icon5'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon5']));
                                            }else if($trash_icon == 'trash_icon6'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon6']));
                                            }else if($trash_icon == 'trash_icon7'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon7']));
                                            }else if($trash_icon == 'trash_icon8'){
                                                echo html_entity_decode(esc_attr($pscfw_icon['trash_icon8']));
                                            }
                                        }else{ ?>
                                            <span><?php echo esc_attr($delete_btn_text); ?></span>
                                            <?php
                                        }
                                    ?>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="atcproduct_desc">
                        <?php if($enable_pro_price == 'true'){ ?>
                            <div class="p_price"><?php echo wp_kses_post($price); ?></div>
                        <?php } ?>
                        <?php if($enable_pro_qty == 'true'){ ?>
                            <div class="p_qty"> 
                                <input type="number" class="pqty_total" name="atcaiofw_qty"  pro_qty_key="<?php echo esc_attr($product_attribute_key); ?>" value="<?php echo esc_attr($pro_quantity); ?>"> 
                            </div>
                        <?php } ?>
                        <?php if($enable_pro_total == 'true'){ ?>
                            <div class="qty_subtotal">
                                <div class="atc_sub"><?php echo wp_kses_post($qty_subtotal); ?></div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </li>
            <?php }
            }else{
            ?>
                <?php if(!empty($empty_cart_text)){ ?>
                    <div class="cart_empty_notice"><?php echo esc_attr($empty_cart_text); ?></div>
                <?php } ?>
                <?php if(!empty($return_shop_text)){ ?>
                    <div class="product_button_box">
                        <a class="btn_return_shop" href="<?php echo wc_get_page_permalink( 'shop' ) ?>"><?php echo esc_attr($return_shop_text); ?></a>
                    </div>
                <?php } ?>

                <style type="text/css">
                    .atcproduct_content {
                        display: flex;
                        align-items: center;
                        justify-content: center;
                    }
                </style>
                <?php
                }
            ?>
        </ul>
    </div>
    <?php 
    $product = get_option('pscfw_product_slider');
        if(!empty($product)){?>
        <div class="cart_pro_slide">
            <div class="atc_sugg">
                <div class="cart_slid_main">
                    <div class="cart_slid_inner">
                        <!-- <div class="cfpro_title"><?php //echo esc_html('Products you might like','prodcut-side-cart-for-woocommerce'); ?></div> -->
                        <div class="cfs_pro_detail owl-carousel owl-theme">
                        <?php  
                        foreach ($product as $value) {
                            $pro_data = wc_get_product( $value );
                            $product_id = $pro_data->get_id();
                            $p_image = $pro_data->get_image();
                            $product_name = $pro_data->get_name();
                            $product_price = WC()->cart->get_product_price( $pro_data );
                            // $product_price = $pro_data->get_price();
                            $footer_pro_permalink = get_permalink( $product_id );

                            $cart_product_ids = array();
                            foreach( WC()->cart->get_cart() as $values ){
                                $cart_product_ids[] = $values['data']->get_id();
                            }

                            if (!in_array($value, $cart_product_ids)) { ?>
                            <div class="product_slide">
                                <div class="cfs_inner">
                                    <div class="catp_img">
                                        <div class="slide_img">
                                            <a href="<?php echo esc_url($footer_pro_permalink); ?>"><?php echo wp_kses_post($p_image); ?></a>
                                        </div>
                                    </div> 
                                    <div class="cart_info"> 
                                        <div class="catp_title">
                                            <a href="<?php echo esc_url($footer_pro_permalink); ?>"><?php echo esc_attr($product_name); ?></a>
                                        </div> 
                                        <div class="cart_sub_price">
                                            <div class="catp_price"><?php echo wp_kses_post($product_price); ?></div>
                                            <div class="slide_pro_btn">
                                                <?php 
                                                if($pro_data->get_type() == 'simple') {?>
                                                    <a href="?add-to-cart=<?php echo esc_attr($product_id); ?>" data-quantity="1" class="product_slide_cart" data-product_id=<?php echo esc_attr($product_id);?>><span><?php echo esc_html('+','prodcut-side-cart-for-woocommerce'); ?></span><?php echo esc_html('Add','prodcut-side-cart-for-woocommerce'); ?></a>
                                                <?php }elseif($pro_data->get_type() == 'variable' ) { ?>
                                                    <a href="<?php echo esc_url($footer_pro_permalink); ?>" data-quantity="1" class="variable_product_slide_cart" data-product_id=<?php echo esc_attr($product_id);?>><?php echo esc_html('View','prodcut-side-cart-for-woocommerce'); ?></a>
                                                <?php }elseif ($pro_data->get_type() == 'variation') { ?>
                                                    <a href="?add-to-cart=<?php echo esc_attr($product_id); ?>" data-quantity="1" class="product_slide_cart" data-product_id=<?php echo esc_attr($product_id);?>><span><?php echo esc_html('+','prodcut-side-cart-for-woocommerce'); ?></span><?php echo esc_html('Add','prodcut-side-cart-for-woocommerce'); ?></a>
                                                <?php } ?>
                                            </div> 
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            <?php  
                                }
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <div class="atc_footer">
        <?php //$sub_total = WC()->cart->get_cart_total(); 
        $pscfw_totals = WC()->cart->get_totals();
        $sub_total = $pscfw_totals['subtotal'];?>
        <div class="atc_footer_detail">
            <div class="atc_subtotal">
                <div class="product_total_box">
                    <?php if($display_subtotal == 'true'){ ?>
                    <div class="product_total_text">
                        <span class="asb_total"><?php echo esc_html('Sub Total - ','prodcut-side-cart-for-woocommerce'); ?></span><?php echo esc_attr(WC()->cart->get_cart_contents_count()); ?><span><?php echo esc_html(' items','prodcut-side-cart-for-woocommerce'); ?></span>
                    </div>
                    <div class="product_total_amount">
                        <span class="asb_num"><?php echo get_woocommerce_currency_symbol().number_format($sub_total, 2); ?></span>
                    </div>
                    <?php } ?>
                </div>
                <?php if($display_shipping_total == 'true'){ ?>
                    <div class="product_shipping_box">
                        <div class="pscfw_shipping_text">
                            <span class="pscfw_shipping"><?php echo esc_html('Shipping','prodcut-side-cart-for-woocommerce'); ?></span>
                            <span class="pscfw_shipping"><?php echo sanitize_text_field( WC()->cart->get_cart_shipping_total() ); ?></span>
                        </div>
                    </div>
                <?php } ?>
                <?php if($display_total == 'true'){ ?>
                    <div class="product_final_total_box">
                        <div class="pscfw_final_total_text">
                            <span class="pscfw_final_total"><?php echo esc_html('Total','prodcut-side-cart-for-woocommerce'); ?></span>
                            <span class="cart_shipping_total"><?php echo get_woocommerce_currency_symbol().number_format((float)WC()->cart->total, 2); ?></span>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="product_button_box">
                <?php if(!empty($cart_btn_url) && !empty($cart_btn_text)){ ?>
                    <a class="pscfw_view_cart_btn" href="<?php echo esc_url($cart_btn_url); ?>"><?php echo esc_attr($cart_btn_text); ?></a>
                <?php } ?>
                <?php if(!empty($checkout_btn_url) && !empty($checkout_btn_text)){ ?>
                    <a class="pscfw_checkout_btn" href="<?php echo esc_url($checkout_btn_url); ?>"><?php echo esc_attr($checkout_btn_text); ?></a>
                <?php } ?>
                <?php if(!empty($continue_shopping_btn_url) && !empty($shopping_btn_text)){ ?>
                    <a class="pscfw_continue_shopping_btn" href="<?php echo esc_url($continue_shopping_btn_url); ?>"><?php echo esc_attr($shopping_btn_text); ?></a>
                <?php } ?>
            </div>
            
        </div>
        <?php 
            // }
        ?>
        
    </div>

 <?php
 $htmlcart = ob_get_contents();
 ob_end_clean();
 ob_start();
 ?>
 <div class="cart_product_count">
    <?php 
        if($show_product_count == 'true'){
            if($backet_product_count == 'count_items'){
                $product_count = count(WC()->cart->get_cart());
            }else{
                $product_count = WC()->cart->get_cart_contents_count();
            }
        }
    ?> 
    <?php echo esc_attr($product_count); ?>
</div>
 <?php
 $htmlcount= ob_get_contents();
 ob_end_clean();
 $arr=array(
        "htmlcart"=>$htmlcart,
        "htmlcount"=>$htmlcount
    );
 echo json_encode($arr);
    exit();
}
add_action('wp_ajax_pscfw_remove_product_from_cart', 'pscfw_remove_product_from_cart');
add_action('wp_ajax_nopriv_pscfw_remove_product_from_cart', 'pscfw_remove_product_from_cart');


/* Update Product Quantity */
function pscfw_atcpro_qty_val() { 

$qty = sanitize_text_field($_REQUEST['qty']);
$pro_key  = sanitize_text_field($_REQUEST['product_key']);

global $woocommerce;
$update_quantity = $woocommerce->cart->set_quantity($pro_key, $qty);

exit;
?>

<?php
}
add_action( 'wp_ajax_pscfw_atcpro_qty_val', 'pscfw_atcpro_qty_val');
add_action( 'wp_ajax_nopriv_pscfw_atcpro_qty_val', 'pscfw_atcpro_qty_val' );


/* Add to cart slider */
function pscfw_add_to_cart_slider_pro(){
    $product_id = apply_filters('woocommerce_add_to_cart_product_id', absint($_POST['product_id']));
    $product_status = get_post_status($product_id);

    if (WC()->cart->add_to_cart($product_id) && 'publish' === $product_status) {

        do_action('woocommerce_ajax_added_to_cart', $product_id);

        WC_AJAX :: get_refreshed_fragments();

        wp_send_json_success();
    }

    wp_die();
}
add_action('wp_ajax_pscfw_add_to_cart_slider_pro', 'pscfw_add_to_cart_slider_pro');
add_action('wp_ajax_nopriv_pscfw_add_to_cart_slider_pro', 'pscfw_add_to_cart_slider_pro');
