function resizeBleeds(){
  console.log('resize bleeds');
  if(jQuery(window).width() >= 768 ){
    var diff = jQuery(window).width() - jQuery('footer .wrapper').width();  
    jQuery('.left_bleed, .left_bleed_content').css({'padding-left':diff/2});
    jQuery('.right_bleed').css({'padding-right':diff/2});
  }
}

(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away

    $('a.nav_toggle').click(function(e){
      e.preventDefault();
      $('.nav').toggleClass('active');

      if($('.nav').hasClass('active')){
        $('.nav_toggle span').text('CLOSE');
        $('.nav_toggle i').attr('class','fa fa-close');
        $('.logo-img').attr('src','http://www.archidesignandbuild.com/wp-content/themes/archidesign2/img/logo-white.png');
        $('.header').addClass('fixed');
      }else{
        $('.nav_toggle span').text('MENU');
        $('.nav_toggle i').attr('class','fa fa-bars');
        $('.logo-img').attr('src','http://www.archidesignandbuild.com/wp-content/themes/archidesign2/img/logo.png');
        $('.header').removeClass('fixed');
      }

    });
    resizeBleeds();

    $(window).resize(resizeBleeds);
/*
    $('a.nav_close').click(function(e){
      e.preventDefault();
      $('.nav').removeClass('active');
    });
	*/	
	});
	
})(jQuery, this);
