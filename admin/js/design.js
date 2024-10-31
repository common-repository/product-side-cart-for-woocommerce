jQuery(document).ready(function(){

    jQuery('ul.nav-tab-wrapper li').click(function(){
        var tab_id = jQuery(this).attr('data-tab');
        jQuery('ul.nav-tab-wrapper li').removeClass('nav-tab-active');
        jQuery('.tab-content').removeClass('current');
        jQuery(this).addClass('nav-tab-active');
        jQuery("#"+tab_id).addClass('current');
    });

    var deleteType = jQuery('#pscfw_delete_type').val();
    if (deleteType == 'pscfw_delete_icon') {
      jQuery('.pscfw_remove_icon').show();
      jQuery('.pscfw_remove_text').hide();
    } else if (deleteType == 'pscfw_delete_text') {
      jQuery('.pscfw_remove_text').show();
      jQuery('.pscfw_remove_icon').hide();
    }

    jQuery('.pscfw_delete_type').change(function() {
      var pscfw_delete_conditions = jQuery('.pscfw_delete_type').val();
      if(pscfw_delete_conditions == 'pscfw_delete_icon'){
        jQuery('.pscfw_remove_icon').show();
        jQuery('.pscfw_remove_text').hide();
      }else if(pscfw_delete_conditions == 'pscfw_delete_text'){
        jQuery('.pscfw_remove_text').show();
        jQuery('.pscfw_remove_icon').hide();
      }
    });

    jQuery('.pscfw_product_select_slider').select2({
        ajax: {
          url: ajaxurl,
          dataType: 'json',
          // delay: 250,
          data: function(params) {
            return {
              term: params.term,
              action: 'pscfw_product_slider_search'
            };
          },
          processResults: function(data) {
            var options = [];
            if (data) {
              jQuery.each(data, function(index, item) {
                // console.log("id "+ item.id);
                options.push({
                  id: item.id,
                  text: item.text,
                  price: item.price,
                });
              });
            }
            return {
              results: options
            };
          },
          cache: true
        },
        minimumInputLength: 3
    });
    
    jQuery('.sortable').sortable({
        update: function(event, ui) {
          // Get the new order of the buttons
          // var buttonOrder = jQuery('.sortable li').find('input').val();

          // var buttonOrder = jQuery('.sortable li').map(function() {
          //     return jQuery(this).find('input').val();
          // }).get();
          // console.log(buttonOrder);

          var buttonOrder = jQuery(this).find('input[name="pscfw_button_position[]"]').map(function() {
            return jQuery(this).val();
          }).get();

            // Send the updated order to the server using AJAX
          jQuery.ajax({
              type: 'POST',
              url: addtocart_backend.ajaxurl,
              data: {
                  action: 'pscfw_save_button_order',
                  order: JSON.stringify(buttonOrder)
              },
              success: function(response) {
                  // console.log('Success ordering.');
              },
              error: function(xhr, status, error) {
                  // console.log('Fail ordering: ' + error);
              }
          });
        }
    });

    jQuery('#pscfw_image_upload_button').click(function() {
        var customUploader = wp.media({
            title: 'Choose Image',
            button: {
              text: 'Choose Image'
            },
            multiple: false
        });

        customUploader.on('select', function() {
            var attachment = customUploader.state().get('selection').first().toJSON();
            jQuery('#pscfw_cart_image').val(attachment.url);
            jQuery('#pscfw_image_preview').attr('src', attachment.url);
            jQuery('#pscfw_image_upload_button').hide();
            jQuery('#pscfw_image_remove_button').show();
        });

        customUploader.open();
    });

    jQuery('#pscfw_image_remove_button').click(function() {
        jQuery('#pscfw_cart_image').val('');
        jQuery('#pscfw_image_preview').attr('src', '');
        jQuery('#pscfw_image_upload_button').show();
        jQuery('#pscfw_image_remove_button').hide();
    });
});
