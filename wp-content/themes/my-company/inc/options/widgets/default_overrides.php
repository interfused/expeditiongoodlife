<?php
/**
 * Default Widget Overrides
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 1.3
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */

/* ------------------- OVERRIDE DEFAULT RECENT POSTS WIDGET ------------------*/


Class Custom_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

    function __construct() {
        parent::__construct();
    }

    function widget($args, $instance) {

        extract( $args );

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts', 'my_theme-td') : $instance['title'], $instance, $this->id_base);

        if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
            $number = 10;

        $show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

        $r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
        if( $r->have_posts() ) {
            echo $before_widget;
            if( $title ) {
                echo $before_title . $title . $after_title;
            }
            ?>
            <ul>
                <?php while( $r->have_posts() ) : $r->the_post(); ?>
                <?php
                    if( 'link' == get_post_format() ) {
                        $post_link = pm_get_external_link();
                    }
                    else {
                        $post_link = get_permalink();
                    }
                ?>
                <li class="clearfix">
                    <div class="post-icon">
                        <a href="<?php echo $post_link; ?>" title="<?php the_title(); ?>">
                        <?php if( has_post_thumbnail() ) { ?>
                            <?php the_post_thumbnail('thumbnail'); ?>
                        <?php } else { ?>
                            <?php pm_post_icon( get_the_ID() ); ?>
                        <?php } ?>
                        </a>
                    </div>
                    <a href="<?php echo $post_link; ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
                    <small class="post-date">
                        <?php if($show_date) the_time( get_option( 'date_format' ) ) ?>
                    </small>
                </li>
                <?php endwhile; ?>
            </ul>

            <?php
            echo $after_widget;
            wp_reset_postdata();
        }
    }
}

class Custom_Archives_Widget extends WP_Widget_Archives{

    function __construct() {
        parent::__construct();
    }

    function widget($args, $instance) {

        extract( $args );
        $c = ! empty( $instance['count'] ) ? '1' : '0';
        $d = ! empty( $instance['dropdown'] ) ? '1' : '0';
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Archives', 'my_theme-td') : $instance['title'], $instance, $this->id_base);

        echo $before_widget;
        if ( $title )
            echo $before_title . $title . $after_title;

        if( $d ) {
?>
        <select name="archive-dropdown" onchange='document.location.href=this.options[this.selectedIndex].value;'> <option value=""><?php echo esc_attr(__('Select Month', 'my_theme-td')); ?></option> <?php wp_get_archives(apply_filters('widget_archives_dropdown_args', array('type' => 'monthly', 'format' => 'option', 'show_post_count' => $c))); ?> </select>
<?php
        } else {
?>
        <ul>
        <?php wp_get_archives(apply_filters('widget_archives_args', array('type' => 'monthly', 'show_post_count' => $c , 'before'=> '' , 'after' => ''))); ?>
        </ul>
<?php
        }

        echo $after_widget;
    }
}

function pm_widgets_init() {
    global $pm_theme;
    global $pm_theme_options;

    $upper_footer_columns = $pm_theme_options['upper_footer_columns'];

    if( $upper_footer_columns == 1 ) {
        $pm_theme->register_sidebar( 'Upper Footer Middle', 'Middle upper-footer section', '', 'upper-footer-middle');
    }
    else if( $upper_footer_columns == 2 ) {
        $pm_theme->register_sidebar( 'Upper Footer Left', 'Left upper-footer section', '', 'upper-footer-left');
        $pm_theme->register_sidebar( 'Upper Footer Right', 'Right upper-footer section', '', 'upper-footer-right');
    }
    else if( $upper_footer_columns == 3 ) {
        $pm_theme->register_sidebar( 'Upper Footer Left', 'Left upper-footer section', '', 'upper-footer-left');
        $pm_theme->register_sidebar( 'Upper Footer Middle', 'Middle upper-footer section', '', 'upper-footer-middle');
        $pm_theme->register_sidebar( 'Upper Footer Right', 'Right upper-footer section', '', 'upper-footer-right');
    }
    else if( $upper_footer_columns == 4 ) {
        $pm_theme->register_sidebar( 'Upper Footer Left', 'Left upper-footer section', '', 'upper-footer-left');
        $pm_theme->register_sidebar( 'Upper Footer Middle Left', 'Middle-left upper-footer section', '', 'upper-footer-middle-left');
        $pm_theme->register_sidebar( 'Upper Footer Middle Right', 'Middle-right upper-footer section', '', 'upper-footer-middle-right');
        $pm_theme->register_sidebar( 'Upper Footer Right', 'Right upper-footer section', '', 'upper-footer-right');
    }

    $footer_columns = $pm_theme_options['footer_columns'];

    if( $footer_columns == 1 ) {
        $pm_theme->register_sidebar( 'Footer Middle', 'Middle footer section', '', 'footer-middle');
    }
    else if( $footer_columns == 2 ) {
        $pm_theme->register_sidebar( 'Footer Left', 'Left footer section', '', 'footer-left');
        $pm_theme->register_sidebar( 'Footer Right', 'Right footer section', '', 'footer-right');
    }
    else if( $footer_columns == 3 ) {
        $pm_theme->register_sidebar( 'Footer Left', 'Left footer section', '', 'footer-left');
        $pm_theme->register_sidebar( 'Footer Middle', 'Middle footer section', '', 'footer-middle');
        $pm_theme->register_sidebar( 'Footer Right', 'Right footer section', '', 'footer-right');
    }
    else if( $footer_columns == 4 ) {
        $pm_theme->register_sidebar( 'Footer Left', 'Left footer section', '', 'footer-left');
        $pm_theme->register_sidebar( 'Footer Middle left', 'Middle-left footer section', '', 'footer-middle-left');
        $pm_theme->register_sidebar( 'Footer Middle right', 'Middle-right footer section', '', 'footer-middle-right');
        $pm_theme->register_sidebar( 'Footer Right', 'Right footer section', '', 'footer-right');
    }

    // register header area widgets
    $pm_theme->register_sidebar('Sidebar', 'Standard site sidebar', '', 'sidebar');
    $pm_theme->register_sidebar( 'Menu Bar', 'Widget to the right of menu', '', 'menu-bar');
    $header_type = pm_get_option('header_type');
    $pm_theme->register_sidebar( 'Top Bar Left', 'Above Navigation section to the left', 'text-left small-screen-center', 'above-nav-left');
    $pm_theme->register_sidebar( 'Top Bar Right', 'Above Navigation section to the right', 'text-right small-screen-center', 'above-nav-right');

    if (pm_is_woocommerce_active()) {
        // register Product page widget for banners
        $pm_theme->register_sidebar('Shop Widget', 'Widget used in the Shop', '', 'shop-widget');
    }

    // replace default widgets
    register_widget('Custom_Recent_Posts_Widget');
    register_widget('Custom_Archives_Widget');
}
add_action( 'widgets_init', 'pm_widgets_init' );
