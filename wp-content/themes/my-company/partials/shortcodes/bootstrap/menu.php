<?php
/**
 * Creates a boostrap menu
 *
 * @package mycompany
 * @subpackage Admin
 * @since 0.1
 *
 
 * @license **LICENSE**
 * @version 1.10.3
 */
?>
<div id="masthead" class="navbar navbar-static-top pm-mega-menu <?php echo implode( ' ', $classes ); ?>" role="banner">
    <div class="<?php echo $container_class; ?>">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".main-navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?php pm_create_logo(); ?>
        </div>

        <nav class="collapse navbar-collapse main-navbar" role="navigation">

            <div class="menu-sidebar pull-right">
                <?php dynamic_sidebar( 'menu-bar' ); ?>
            </div>

            <?php
                $primary_menu = wp_get_nav_menu_items( $slug );
                if ( !empty( $primary_menu ) ) {
                    wp_nav_menu( array(
                        'menu' => $slug,
                        'menu_class' => 'nav navbar-nav navbar-right',
                        'depth' => 4,
                        'walker' => new FrontendBootstrapMegaMenuWalker(),
                    ));
                }
            ?>

        </nav>
    </div>
</div>