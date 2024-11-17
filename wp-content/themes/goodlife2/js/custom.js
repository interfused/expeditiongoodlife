/*-----------------------------------------------------------------------------------*/
/*	Call fitvids & class fix for view.lightbox
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
'use strict';
	
	$(".video-container").fitVids();
	
	jQuery("a[href$='jpg'], a[href$='jpeg'], a[href$='gif'], a[href$='png']").each(function(){
		$(this).addClass('view');
	});

});
/*-----------------------------------------------------------------------------------*/
/* Navigation fixes
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
	"use strict";
	
	/**
	 * Attach spans to all navigation elements with children
	 */
	$("#main-header li").has('ul').prepend('<span><i class="fa fa-plus-square-o"></i></span>');
	
	$("#main-header li.current-menu-parent ul").slideDown();
	$("#main-header li.current-menu-parent").find('i').removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
	
	/**
	 * Animation even for navigation elements with children
	 */
	$('#main-header span').click(function(){
		
		if( $(this).find('i').hasClass('fa-plus-square-o') ){
			
			$(this).find('i').removeClass('fa-plus-square-o').addClass('fa-minus-square-o');
			$(this).parent().find('ul').slideToggle();
			
		} else {
			
			$(this).find('i').removeClass('fa-minus-square-o').addClass('fa-plus-square-o');
			$(this).parent().find('ul').slideToggle();
			
		}
		
	});
	
	$('#mobile-header, #mobile-logo').click(function(){
	
		if( $('body').hasClass('ebor-mobile-active') ){
		
			$('body').toggleClass('ebor-mobile-active');
			$('#main-header').css('left','-240px');
			$('#content, #mobile-logo').css('left','0px');
			$('#mobile-header').css('left', '0px');
			
		} else {
		
			$('body').toggleClass('ebor-mobile-active');
			$('#main-header').css('left','0');
			$('#content, #mobile-logo').css('left','255px');
			$('#mobile-header').css('left', '240px');
			
		}
		
	});
	
});
/*-----------------------------------------------------------------------------------*/
/* Get rid of useless paragraphs
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function($){
	"use strict";
	
	$("p:empty").remove();
	
});
/*-----------------------------------------------------------------------------------*/
/*	HEADER SCROLL
/*-----------------------------------------------------------------------------------*/
jQuery(window).load(function($){
	"use strict";
	
	    jQuery('#scroller').slimScroll({
	        height: 'auto'
	    });
	    
	    jQuery(window).smartresize(function(){
	    	
	    	jQuery('#scroller').slimScroll({
	    	    destroy: true
	    	});
	    	
	    	jQuery('#scroller').slimScroll({
	    	    height: 'auto'
	    	});
	    	
	    });
	
});
/*-----------------------------------------------------------------------------------*/
/*	ISOTOPE
/*-----------------------------------------------------------------------------------*/
jQuery(window).load(function($){
'use strict';

	jQuery('.isotope-wrapper').isotope({
		itemSelector : 'article'
	});
	
	jQuery(window).smartresize(function(){
		jQuery('.isotope-wrapper').isotope('reLayout');
	});
	
	jQuery(window).trigger('resize');
	
});