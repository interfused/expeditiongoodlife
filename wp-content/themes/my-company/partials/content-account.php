<?php
/**
 * Shows a woocommerce account page
 *
 * @package mycompany
 * @subpackage Frontend
 * @since 1.0
 *
 
 
 * @version 1.10.3
 */

global $woocommerce; ?>

<section class="section section-commerce <?php echo apply_filters( 'pm_woocommerce_shop_classes', 10 );?>">
    <div class="container">
        <?php wc_print_notices(); ?>
        <div class="row element-normal-top element-normal-bottom">
            <div class="col-md-3">
                <?php
                if ( has_nav_menu( 'account' ) ) {
                   wp_nav_menu( array( 'theme_location' => 'account', 'menu_class' => 'nav nav-pills nav-stacked', 'depth' => 0 ) );
                }
                else {
                    _e( 'create an account menu in the admin options', 'my_theme-td' );
                } ?>
            </div>
            <div class="col-md-9">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>
