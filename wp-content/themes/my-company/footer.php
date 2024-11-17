        <?php
        $footer_padding = pm_get_option( 'footer_height' );
        $upper_footer_padding = pm_get_option( 'upper_footer_height' );
        ?>

        <footer id="footer" role="contentinfo">
            <?php if(is_active_sidebar('upper-footer-middle') || is_active_sidebar('upper-footer-right') || is_active_sidebar('upper-footer-left') || is_active_sidebar('upper-footer-middle-left') || is_active_sidebar('upper-footer-middle-right')): ?>
            <section class="section <?php pm_upper_footer_section_classes(); ?>">
                <div class="container">
                    <div class="row element-<?php echo $upper_footer_padding?>-top element-<?php echo $upper_footer_padding?>-bottom">
                    <?php   $columns = pm_get_option('upper_footer_columns');
                    $span = $columns == false? 'col-md-12' : 'col-md-' . (12/$columns);
                        if( $columns == 1){ ?>
                            <div class="<?php echo $span; ?> text-center"><?php dynamic_sidebar('upper-footer-middle'); ?></div><?php
                        }
                        else if( $columns == 2){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-left'); ?></div>
                            <div class="<?php echo $span; ?> text-right"><?php dynamic_sidebar('upper-footer-right'); ?></div><?php
                        }
                        else if( $columns == 3){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-left'); ?></div>
                            <div class="<?php echo $span; ?> text-left"><?php dynamic_sidebar('upper-footer-middle'); ?></div>
                            <div class="<?php echo $span; ?> text-left"><?php dynamic_sidebar('upper-footer-right'); ?></div><?php
                        }
                        else if ( $columns == 4){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-left'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-middle-left'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-middle-right'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('upper-footer-right'); ?></div><?php
                        }?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
            <?php if(is_active_sidebar('footer-middle') || is_active_sidebar('footer-right') || is_active_sidebar('footer-left') || is_active_sidebar('footer-middle-left') || is_active_sidebar('footer-middle-right')): ?>
            <section class="section <?php pm_footer_section_classes();?>">
                <div class="container">
                    <div class="row element-<?php echo $footer_padding?>-top element-<?php echo $footer_padding?>-bottom">
                    <?php   $columns = pm_get_option('footer_columns');
                    $span = $columns == false? 'col-md-12':'col-md-'.(12/$columns);
                        if( $columns == 1){ ?>
                            <div class="<?php echo $span; ?> text-center"><?php dynamic_sidebar('footer-middle'); ?></div><?php
                        }
                        else if( $columns == 2){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-left'); ?></div>
                            <div class="<?php echo $span; ?> text-right"><?php dynamic_sidebar('footer-right'); ?></div><?php
                        }
                        else if( $columns == 3){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-left'); ?></div>
                            <div class="<?php echo $span; ?> text-left"><?php dynamic_sidebar('footer-middle'); ?></div>
                            <div class="<?php echo $span; ?> text-left"><?php dynamic_sidebar('footer-right'); ?></div><?php
                        }
                        else if ( $columns == 4){ ?>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-left'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-middle-left'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-middle-right'); ?></div>
                            <div class="<?php echo $span; ?>"><?php dynamic_sidebar('footer-right'); ?></div><?php
                        }?>
                    </div>
                </div>
            </section>
            <?php endif; ?>
        </footer>
    </div>
        <!-- Fixing the Back to top button -->

         <?php if( pm_get_option('back_to_top') === 'enable' ) : ?>
            <a href="javascript:void(0)" class="go-top go-top-<?php echo pm_get_option('back_to_top_shape')?>">
                <i class="fa fa-angle-up"></i>
            </a>
        <?php endif; ?>

       
        <?php wp_footer(); ?>
        
         <link type="text/css" rel="stylesheet" href="/wp-content/themes/my-company/assets/css/overwrites.css" />
        
        
       
    </body>
</html>