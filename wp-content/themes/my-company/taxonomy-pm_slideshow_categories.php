<?php
/**
 * Default page template
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 0.1
 *
 
 
 * @version 1.10.3
 */

get_header();
global $pm_theme_options;
$slideshow = get_query_var( 'term' ); ?>
<article><?php
echo pm_call_shortcode_with_meta( 'pm_shortcode_slideshow', array(
    'flexslider',
    'ids',
    'animation',
    'direction',
    'speed',
    'duration',
    'directionnav',
    'itemwidth',
    'showcontrols',
    'controlsposition',
    'controlsalign',
    'controls_vertical',
    'captions',
    'captions_horizontal',
    'autostart',
    'tooltip',
    // global options
    'extra_classes',
    'margin_top',
    'margin_bottom',
    'scroll_animation',
    'scroll_animation_delay'
    ), $slideshow, $pm_theme_options, array( 'flexslider' => $slideshow, 'margin_top' => 'no-top', 'margin_bottom' => 'no-bottom' ) );
?>
</article>
<?php get_footer();
