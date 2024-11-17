<?php
/**
 * Default 404 template
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 0.1
 *
 
 
 * @version 1.10.3
 */

global $post;
$id = pm_get_option( '404_page' );
if( $id ) {
    $post = get_post( $id );
    get_header();
    pm_page_header( $post->ID, array( 'heading_type' => 'page' ) );

    setup_postdata( $post );
    get_template_part('partials/content', 'page');

    $allow_comments = pm_get_option( 'site_comments' );
    ?>
    <?php if( $allow_comments == 'pages' || $allow_comments == 'all' ) : ?>
    <section class="section">
        <div class="container">
            <div class="row">
                <?php comments_template( '', true ); ?>
            </div>
        </div>
    </section>
    <?php
    endif;    
}
get_footer();