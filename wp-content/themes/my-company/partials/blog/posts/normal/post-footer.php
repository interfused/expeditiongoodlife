<?php
/**
 * Post content footer items
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */
?>
<?php if( is_single() ) : ?>
    <?php pm_wp_link_pages(array('before' => '<div class="text-center post-showinfo">', 'after' => '</div>')); ?>
    <div class="row">
        <div class="col-md-6 small-screen-center">
            <div class="post-extras">
                <?php if( has_category() && pm_get_option( 'blog_categories' ) === 'on' ) : ?>
                    <span class="post-category">
                        <i class="fa fa-folder-open"></i>
                        <?php the_category( ', ' ); ?>
                    </span>
                <?php endif; ?>
                <?php if( has_tag() && pm_get_option( 'blog_tags' ) === 'on' ) : ?>
                    <span class="post-tags">
                        <i class="fa fa-tags"></i>
                        <?php the_tags( $before = '', $sep = ', ', $after = '' ); ?>
                    </span>
                <?php endif; ?>
                <?php if ( comments_open() && ! post_password_required() && pm_get_option( 'blog_comment_count' ) === 'on' ) : ?>
                    <span class="post-link">
                        <i class="fa fa-comments"></i>
                        <?php comments_popup_link( __( 'No comments', 'my_theme-td' ), __( '1 comment', 'my_theme-td' ), __( '% comments', 'my_theme-td' ) ); ?>
                    </span>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-6 text-right small-screen-center">
            <?php
            $check = pm_get_option( 'blog_social_networks' );
            if ( !in_array('none', $check) ) { ?>
                <div class="post-share">
                    <small><?php
                        _e( 'Share this post: ', 'my_theme-td' ); ?>
                    </small>
                    <?php
                        echo pm_shortcode_sharing( array(
                            'social_networks'   => implode( ',', $check ),
                            'icon_size'         => 'sm',
                            'background_show'   => 'simple',
                            'margin_top'        => 'no-top inline-block',
                            'margin_bottom'     => 'no-bottom',
                        ));
                    ?>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php if( pm_get_option( 'author_bio' ) === 'on' ) : ?>
        <?php
        $author_id = get_the_author_meta('ID');
        $author_url = get_author_posts_url( $author_id );
        $extra_post_class  = pm_get_option('blog_post_icons') == 'on' ? 'post-showinfo' : '';
        ?>
        <div class="author-info media small-screen-center <?php echo $extra_post_class; ?>">
            <div class="author-avatar pull-left"><?php
            if (pm_get_option('author_bio_avatar') == 'on') {
                echo get_avatar( $author_id, 150 );
            }?>
            </div>
            <div class="media-body">
                <a href="<?php echo $author_url; ?>">
                    <h3 class="media-heading bordered bordered-small"><?php
                    the_author_meta('nickname'); ?>
                    </h3>
                </a>
                <div class="media">
                    <p>
                        <?php the_author_meta('description'); ?>
                    </p>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>
<?php pm_atom_author_meta(); ?>