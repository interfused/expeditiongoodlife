//LOOP FOR DETECTING AND LISTING IMAGES,UPDATING ALTS AND UPDATE PINNED

var postID;
var isAutoChecked = 0;
var pinterestIndex = 0;
var wp_pinterest_automatic_selector;
var wp_pinterest_automatic_cf = 'dummyonehere';



function timedCount() {

	//CHECK EDITOR FOR IMAGES
    jQuery('#content_ifr,.wp_attachment_holder,.product_images'+ wp_pinterest_automatic_selector).contents().find('img').each(
        function () {

        	//chek if not tinymce image or inline image
        	if( jQuery(this).attr('src').indexOf("tinymce") == -1  && jQuery(this).attr('src').indexOf("base64") == -1 && jQuery(this).attr('src') != '' ){	
	        	
        		//vars
        		var original = this;
        		var src = jQuery(this).attr('src');
        		
        		//remove resizing
        		//src = src.replace("-150x150.",".");
        		
	        	//check if not already listed image
	            if (jQuery('#pin-images img[src="' + src + '"]').attr('src') != src ) {
	                
	            	//build new image
	            	jQuery('#img_template img').attr('src', src );
	                jQuery('#img_template input:checkbox').val(src);
	                
	                //append new image
	                jQuery('#pin-images').append(jQuery('#img_template').html());
		            
	                //set index
	                jQuery('#field-pin_options-container').append('<input data-img="'+src+'" name="wp_pinterest_alts[]" type="hidden" value="' + jQuery(this).attr('alt') + '"/>');
	                
	                //set alt text
	                jQuery('#field-pin_options-container').append('<input name="wp_pinterest_index[]" type="hidden" value="' + src + '"/>');
	                
	                //auto check first image
	                if (isAutoChecked == 0 && jQuery(location).attr('href').indexOf('post-new.php') != -1) {
	                    if (jQuery.inArray('OPT_CHECK', val_arr) == 1) {
	                        jQuery('#pin-contain input').filter(':first').attr('checked', 'checked');
	                        isAutoChecked = 1;
	                    }
	                }
	
	            }else{
	            	
	            	//image exists let's update the alt text 
	            	jQuery('input[data-img="'+src+'"]').val(jQuery(this).attr('alt'));
	            	
	            }
            
        	}
            
        });
    
    //CHECK FRONT END IFRAME jQuery("#wp_pinterest_automatic_ifr img").contents().find('img')
    jQuery("#wp_pinterest_automatic_ifr").contents().find('img').each(
            function () {

            	//vars
                var src = jQuery(this).attr('src');
                var imgsrc = src;	
                 
                //check existence
                if (jQuery('#pin-images img[src="' + imgsrc + '"]').attr('src') != imgsrc) {
                    
                	//build template
                	jQuery('#img_template img').attr('src', imgsrc);
                    jQuery('#img_template input:checkbox').val(imgsrc);
                    
                    //append template
                    jQuery('#pin-images').append(jQuery('#img_template').html());

                    //alt text 
                    jQuery('#field-pin_options-container').append('<input  data-img="'+src+'" name="wp_pinterest_alts[]" type="hidden" value="' + jQuery(this).attr('alt') + '"/>');
                    jQuery('#field-pin_options-container').append('<input name="wp_pinterest_index[]" type="hidden" value="' + imgsrc + '"/>');
                    
                    //auto check first image
                    if (isAutoChecked == 0 && jQuery(location).attr('href').indexOf('post-new.php') != -1) {
                        if (jQuery.inArray('OPT_CHECK', val_arr) == 1) {
                            jQuery('#pin-contain input').filter(':first').attr('checked', 'checked');
                            isAutoChecked = 1;
                        }
                    }


                }else{
                	
                	//image exists let's update the alt text no
                	 
                	
                }
            });
    
    //CHECK FEATURED IMAGE
    jQuery('#set-post-thumbnail img').each(
        function () {

        	//vars
            var src = jQuery(this).attr('src');
            
            //remove sized images from the src 
            //src = src.replace( /-\d\d\dx\d\d\d\./g ,'.');
            
            var imgsrc = src;
            
            
             
            //check existence
            if (jQuery('#pin-images img[src="' + imgsrc + '"]').attr('src') != imgsrc) {
                
            	//build template
            	jQuery('#img_template img').attr('src', imgsrc);
                jQuery('#img_template input:checkbox').val(imgsrc);
                
                //append template
                jQuery('#pin-images').append(jQuery('#img_template').html());

                //alt text 
                jQuery('#field-pin_options-container').append('<input  data-img="'+src+'" name="wp_pinterest_alts[]" type="hidden" value="' + jQuery(this).attr('alt') + '"/>');
                jQuery('#field-pin_options-container').append('<input name="wp_pinterest_index[]" type="hidden" value="' + imgsrc + '"/>');
                
                //auto check first image
                if (isAutoChecked == 0 && jQuery(location).attr('href').indexOf('post-new.php') != -1) {
                    if (jQuery.inArray('OPT_CHECK', val_arr) == 1) {
                        jQuery('#pin-contain input').filter(':first').attr('checked', 'checked');
                        isAutoChecked = 1;
                    }
                }


            }else{
            	
            	//image exists let's update the alt text 
            	jQuery('input[data-img="'+src+'"]').val(jQuery(this).attr('alt'));
            	
            }
        });
    
    //CHECK CUSTOM FIELD FOR IMAGES
    if( jQuery('input[value="'+ wp_pinterest_automatic_cf +'"]').length > 0 ){
        
    	//extract src
    	var fkey = (jQuery('input[value="'+ wp_pinterest_automatic_cf +'"]').attr('name').replace('key','value'));
        fkey=fkey.replace('meta[','');
        fkey=fkey.replace('][value]','');
        
      
        imgsrc = (jQuery('#meta-'+fkey+'-value').val());
       
       if (jQuery('#pin-images img[src="' + imgsrc + '"]').attr('src') != imgsrc) {
    	   
    	   //build template
           jQuery('#img_template img').attr('src', imgsrc);
           jQuery('#img_template input:checkbox').val(imgsrc);
           
           //append image
           jQuery('#pin-images').append(jQuery('#img_template').html());
           
         //auto check first image
           if (isAutoChecked == 0 && jQuery(location).attr('href').indexOf('post-new.php') != -1) {
               if (jQuery.inArray('OPT_CHECK', val_arr) == 1) {
                   jQuery('#pin-contain input').filter(':first').attr('checked', 'checked');
                   isAutoChecked = 1;
               }
           }
       }
  
    }
    
    //MARK PINNED ITEMS AS PINNED
    if ( typeof var_pinned != 'undefined'){
	
	    jQuery.each(var_pinned, function (index, value) {
	        if (value != '') {
	            jQuery('#pin-images input:checkbox[value="' + value + '"]').parent().addClass('pinned');
	        }
	    });
	    
    }

    
    //UPDATE RECENTLY PINNED IMAGES WITH THE PINNED ICON
    
    if(jQuery(location).attr('href').indexOf('post.php') != -1 && postID != null   ){
    
	    jQuery.ajax({
	        url: ajaxurl,
	        type: 'POST',
	
	        data: {
	            action: 'pinterest_automatic',
	            pid: postID
	        },
	
	        success: function (data) {
	            
	            var res = jQuery.parseJSON(data);
	
	            jQuery.each(res, function (index, value) {
	                if (value != '') {
	                    jQuery('#pin-images .scheduled input:checkbox[value="' + value + '"]').removeAttr('checked').parent().addClass('wp-pinterest-automatic-yellow').fadeOut('slow', function () {
	                        jQuery(this).removeClass('wp-pinterest-automatic-yellow').removeClass('scheduled').addClass('pinned').fadeIn('slow');
	                    });
	                }
	            });
	
	        },
	
	        beforeSend: function () {
	
	        }
	    });
	    
    }


    t = setTimeout("timedCount()", 5000);
}

timedCount();//TRIGGER LOOP


jQuery(document).ready(function () {

	//SELECT ALL PINS
    jQuery('#wp_pinterest_automatic_all')
        .click(
            function () {

                if (jQuery(this).attr('checked') == 'checked') {
                    jQuery(
                        'input.pin_check')
                        .attr('checked', 'true');
                } else {
                    jQuery(
                        'input.pin_check')
                        .removeAttr('checked');
                }
            });

    //close link
    function activate_close() {
        jQuery('.close').click(function () {

            jQuery(this).parent().fadeOut('slow');

        });

    }


     //slider function
    function slider(id, slide) {
       if (jQuery(id).attr("checked")) {
            jQuery(slide).slideDown();
        } else {
            jQuery(slide).slideUp();
        }
    }

    //slider function
    function slider(id, slide) {

        if (jQuery(id).attr("checked")) {
            jQuery(slide).slideDown();
        } else {
            jQuery(slide).slideUp();
        }
    }

    //slider function
    function slider_hider(id, slide, hide) {

        if (jQuery(id).attr("checked")) {
            jQuery(hide).slideUp('fast', function () {
                jQuery(slide).slideDown();
            });
        } else {
            jQuery(hide).slideDown();
            jQuery(slide).slideUp();
        }

    }
    slider('#field-pin_options-1', '#pin-contain');

    jQuery("#field-pin_options-1").change(function () {

        slider('#field-pin_options-1', '#pin-contain');

    });

    //slider
    slider('#field-pin_options-2', '#pin_vars');

    jQuery("#field-pin_options-2").change(function () {

        slider('#field-pin_options-2', '#pin_vars');

    });



    // Check all and de select all check  
    jQuery('#wp_pinterest_automatic_all')
        .click(
            function () {
                if (jQuery(this).attr('checked') == 'checked') {
                    jQuery(
                        '#pin-contain input.pin_check')
                        .attr('checked', 'true');
                } else {
                    jQuery(
                        '#pin-contain input.pin_check')
                        .removeAttr('checked');
                }
            });
});