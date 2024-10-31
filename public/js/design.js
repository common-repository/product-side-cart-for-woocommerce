jQuery( document ).ready(function() {
    // var enable = addtocart_sidebar.ecb_enable;
    var product = addtocart_sidebar.product;
    var cart_position = addtocart_sidebar.basekt_position;
    var product_sidebar_width = addtocart_sidebar.product_sidebar_width;
    
    jQuery("body").on("added_to_cart",function() {
        
        jQuery.ajax({
            type : "post",
            url : addtocart_sidebar.ajaxurl,
            data : {action: "pscfw_atcaiofw_cart"},
            success : function(data){

                var obj = jQuery.parseJSON(data);

                jQuery(".cart_container").html(obj.htmlcart);
                jQuery(".sidebar_cart_count").html(obj.htmlcount);

                jQuery(".cart_icon").trigger('click');

                jQuery("body").addClass("cart_sidebar");
                jQuery(".cart_container").addClass("product_detail");
                jQuery(".background_overlay").addClass("overlay_disable");

                if(jQuery('.cart_icon').hasClass('atc_custom')){
                   jQuery('.cart_icon').removeClass('atc_custom');
                }
            }
        });
    });
    
    jQuery(".cart_icon").on("click",function(){
        
        // jQuery('.cart_container').animate({width: '430px' , left: '0px'});
        if(cart_position == "left"){
            jQuery(".cart_container").animate({'width': product_sidebar_width , 'left': '0px'});
        }else{
            jQuery(".cart_container").animate({'width': product_sidebar_width , 'right': '0px'});
        }

        jQuery("body").addClass("cart_sidebar");
        jQuery(".cart_container").addClass("product_detail");
        jQuery(".background_overlay").addClass("overlay_disable");

        if(jQuery('.cart_icon').hasClass('atc_custom')){
           jQuery('.cart_icon').removeClass('atc_custom');
        }
    });

    if(product == ''){
        jQuery('.cart_footer_spro').hide();
    }else{
        jQuery('.cart_footer_spro').show();
    }

    jQuery('body').on('click', '#close-btn svg', function(){
        // console.log('click generete');

        if(cart_position == "left"){
            jQuery(".cart_container").animate({'width': product_sidebar_width , 'left': '-'+product_sidebar_width});
        }else{
            jQuery(".cart_container").animate({'width': product_sidebar_width , 'right': '-'+product_sidebar_width});
        }

        jQuery("body").removeClass("cart_sidebar");
        jQuery(".cart_container").removeClass("product_detail");
        jQuery(".background_overlay").removeClass("overlay_disable");
        jQuery('.cart_icon').addClass('atc_custom');
    });

    jQuery(".background_overlay").click(function() {
        // jQuery("#close-btn svg").click();
        if(cart_position == "left"){
            jQuery(".cart_container").animate({'width': product_sidebar_width , 'left': '-'+product_sidebar_width});
        }else{
            jQuery(".cart_container").animate({'width': product_sidebar_width , 'right': '-'+product_sidebar_width});
        }

        jQuery("body").removeClass("cart_sidebar");
        jQuery(".cart_container").removeClass("product_detail");
        jQuery(".background_overlay").removeClass("overlay_disable");
        jQuery('.cart_icon').addClass('atc_custom');
    });

    jQuery('body').on('click', '.pscfw_continue_shopping_btn', function(){
        // console.log('click generete');

        if(cart_position == "left"){
            jQuery(".cart_container").animate({'width': product_sidebar_width , 'left': '-'+product_sidebar_width});
        }else{
            jQuery(".cart_container").animate({'width': product_sidebar_width , 'right': '-'+product_sidebar_width});
        }

        jQuery("body").removeClass("cart_sidebar");
        jQuery(".cart_container").removeClass("product_detail");
        jQuery(".background_overlay").removeClass("overlay_disable");
        jQuery('.cart_icon').addClass('atc_custom');
    });

    /* Update Product Quantity */
    jQuery('body').on('change','.pqty_total',function () {
        var atcproductContent = jQuery('.atcproduct_content');

        atcproductContent.addClass('pscfw_overlay');

        jQuery( document.body ).trigger( 'update_checkout' );

        var qty = jQuery(this).val();
        var product_key = jQuery(this).attr('pro_qty_key');

        // if (qty < 1) {
        //     return; 
        // }

         jQuery.ajax({
            type : "post",
            url : addtocart_sidebar.ajaxurl,
            data : {
                action: "pscfw_atcpro_qty_val",
                qty: qty,
                product_key:product_key
            },
            success : function(data){
                setTimeout(function() {
                    // atcproductContent.removeClass('pscfw_overlay');
                    jQuery( document.body ).trigger( 'added_to_cart', [ data.fragments, data.cart_hash ] );
                }, 100);
            }
        });

    }); 

    /* Remove Product */
    jQuery(document).on('click', '.atcproduct_content a.pscfw_remove', function (e) {
        e.preventDefault();

        var atcproductContent = jQuery('.atcproduct_content');

        atcproductContent.addClass('pscfw_overlay');

        var product_id = jQuery(this).attr("data-product_id");
        // var product_name = jQuery(this).attr("data-product_name");

        jQuery.ajax({
            type : "post",
            url: addtocart_sidebar.ajaxurl,
            data: {
                action: 'pscfw_remove_product_from_cart',
                product_id: product_id,
                // product_name: product_name,
                // cart_item_key: cart_item_key
            },
            success: function(response) {
                atcproductContent.removeClass('pscfw_overlay');

                var obj = jQuery.parseJSON(response);
                jQuery(".cart_container").html(obj.htmlcart);
                jQuery(".sidebar_cart_count").html(obj.htmlcount);
            }
        });
    });

    /* Product Slider */
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

    jQuery(document).on('click', '.product_slide_cart', function (e) {
        e.preventDefault();

        var jQuerythisbutton = jQuery(this),
            product_id = jQuerythisbutton.attr('data-product_id'),
            product_qty =  jQuerythisbutton.attr('data-quantity'),
            variation_id = jQuerythisbutton.attr('variation-id');

        var data = {
            action: 'pscfw_add_to_cart_slider_pro',
            product_id: product_id,
            product_sku: '',
            quantity: product_qty,
            variation_id: variation_id,
        };

        jQuery(document.body).trigger('adding_to_cart', [jQuerythisbutton, data]);

        jQuery.ajax({
            type: 'post',
            url: addtocart_sidebar.ajaxurl,
            data: data,
            success: function (response) {
                jQuery(document.body).trigger('added_to_cart', [response.fragments, response.cart_hash, jQuerythisbutton]);
            },
        });

        return false;
    });

    if(addtocart_sidebar.product_img_fly_to_cart == 'true'){
        jQuery('.add_to_cart_button').on('click', function() {
            var cartIcon = jQuery('.cart_icon');
            var productImage = jQuery(this).closest('.product').find('img').first();

            var imageClone = productImage.clone()
                .offset({
                    top: productImage.offset().top,
                    left: productImage.offset().left
                })
                .css({
                    'opacity': '1',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '9999'
                })
                .appendTo(jQuery('body'))
                /*.animate({
                    'top': cartIcon.offset().top + 10,
                    'left': cartIcon.offset().left + 10,
                    'width': 50,
                    'height': 50,
                    'opacity': 0.5,
                    'border-radius': '50%',
                    'transform': 'rotate(720deg)',
                    'background-color': 'rgba(255, 0, 0, 0.2)',
                    'box-shadow': '0 0 10px rgba(0, 0, 0, 0.3)',
                    'transform-origin': 'center',
                    'z-index': 999,
                    'transition': 'all 0.5s ease',
                }, 800, 'linear');*/
                .animate({
                    'top': cartIcon.offset().top - 10,
                    'left': cartIcon.offset().left - 10,
                    'width': 50,
                    'height': 50
                }, 1000, 'easeInOutExpo' );

            imageClone.animate({
                'width': 0,
                'height': 0
            }, function() {
                jQuery(this).detach();
                jQuery('.single_add_to_cart_button').trigger('click');
            });
        });
    

        jQuery('.single_add_to_cart_button').on('click', function() {
            var cartIcon = jQuery('.cart_icon');
            var productImage = jQuery('.product .images img').first();
        
            var imageClone = productImage.clone()
                .offset({
                    top: productImage.offset().top,
                    left: productImage.offset().left
                })
                .css({
                    'opacity': '1',
                    'position': 'absolute',
                    'height': '150px',
                    'width': '150px',
                    'z-index': '9999'
                })
                .appendTo(jQuery('body'))
                /*.animate({
                    'top': cartIcon.offset().top + 10,
                    'left': cartIcon.offset().left + 10,
                    'width': 50,
                    'height': 50,
                    'opacity': 0.5,
                    'border-radius': '50%',
                    'transform': 'rotate(720deg)',
                    'background-color': 'rgba(255, 0, 0, 0.2)',
                    'box-shadow': '0 0 10px rgba(0, 0, 0, 0.3)',
                    'transform-origin': 'center',
                    'z-index': 999,
                    'transition': 'all 0.5s ease',
                }, 800, 'linear');*/
                .animate({
                    'top': cartIcon.offset().top - 10,
                    'left': cartIcon.offset().left - 10,
                    'width': 50,
                    'height': 50
                }, 1000, 'easeInOutExpo' );

            imageClone.animate({
                'width': 0,
                'height': 0
            }, function() {
                jQuery(this).detach();
            });
        });
    }

});