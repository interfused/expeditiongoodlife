<?php 

/**
 * Ebor Framework
 * Theme Actions, Hooks & Custom Filters
 * @since version 1.0
 * @author TommusRhodus
 */
 
/*
 * Displays the opening page wrapper.
 */
add_action( 'ebor_open_wrapper', 'ebor_open_wrapper_markup', 10 );
function ebor_open_wrapper_markup(){
	echo '<div class="container inner">';
}

/*
 * Displays the closing page wrapper.
 */
add_action( 'ebor_close_wrapper', 'ebor_close_wrapper_markup', 10 );
function ebor_close_wrapper_markup(){
	echo '<div class="clear"></div></div>';
}