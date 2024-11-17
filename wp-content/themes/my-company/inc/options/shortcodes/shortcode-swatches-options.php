<?php
/**
 * Themes shortcode options go here
 *
 * @package mycompany
 * @subpackage Core
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */


// get all swatches
$swatches = get_posts( array(
    'post_type' => 'pm_swatch',
    'order_by' => 'title',
    'posts_per_page' => '-1'
));

$swatch_options = array();
foreach( $swatches as $swatch ) {
    if( get_post_meta( $swatch->ID, THEME_SHORT . '_status', true ) === 'enabled' ) {
        $swatch_options['swatch-' . $swatch->post_name] = $swatch->post_title;
    }
}

return $swatch_options;