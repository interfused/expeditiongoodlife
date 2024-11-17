<?php
/**
 * Adds navigation for single post
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */
$extra_post_class  = pm_get_option('blog_post_icons') == 'on' ? 'post-showinfo' : '';
?>
<nav id="nav-below" class="post-navigation <?php echo $extra_post_class; ?>">
    <ul class="pager">
        <?php if( get_previous_post() ) : ?>
            <li class="previous">
                <a class="btn btn-primary btn-icon btn-icon-left" rel="prev" href="<?php echo get_permalink(get_adjacent_post(false, '', true)); ?>">
                    <i class="fa fa-angle-left"></i>
                    <?php _e( 'Previous', 'my_theme-td' ); ?>
                </a>
            </li>
        <?php endif; ?>
        <?php if( get_next_post() ) : ?>
            <li class="next">
                <a class="btn btn-primary btn-icon btn-icon-right" rel="next" href="<?php echo get_permalink(get_adjacent_post(false, '', false)); ?>">
                    <?php _e( 'Next', 'my_theme-td' ); ?>
                    <i class="fa fa-angle-right"></i>
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav><!-- nav-below -->
