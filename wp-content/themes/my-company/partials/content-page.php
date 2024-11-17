<?php
/**
 * Displays a single post
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 0.1
 *
 
 
 * @version 1.10.3
 */
?>
<article id="post-<?php the_ID();?>" <?php post_class(); ?>>
    <?php the_content( '', false ); ?>
    <?php if( get_post_meta( $post->ID, THEME_SHORT. '_bullet_nav', true ) === 'show' ): ?>
    	<div class="bullet-nav" data-show-tooltips="<?php echo get_post_meta( $post->ID, THEME_SHORT. '_bullet_nav_tooltips', true ); ?>">
            <ul></ul>
        </div>
    <?php endif; ?>
    <?php pm_atom_author_meta(); ?>
</article>
