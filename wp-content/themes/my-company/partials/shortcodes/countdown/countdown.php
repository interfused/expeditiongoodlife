<h1 class="countdown <?php echo implode(' ', $classes); ?>" data-date="<?php echo $date; ?>" data-os-animation="<?php echo $scroll_animation; ?>" data-os-animation-delay="<?php echo $scroll_animation_delay; ?>s">
    <div class="counter-element">
        <span class="counter-days odometer text-center <?php echo $number_underline;?>">
            0
        </span>
        <b>
            <?php _e('days', 'my_theme-td'); ?>
        </b>
    </div>
    <div class="counter-element">
        <span class="counter-hours odometer text-center <?php echo $number_underline;?>">
            0
        </span>
        <b>
            <?php _e('hours', 'my_theme-td'); ?>
        </b>
    </div>
    <div class="counter-element">
        <span class="counter-minutes odometer text-center <?php echo $number_underline;?>">
            0
        </span>
        <b>
            <?php _e('minutes', 'my_theme-td'); ?>
        </b>
    </div>
    <div class="counter-element">
        <span class="counter-seconds odometer text-center <?php echo $number_underline;?>">
            0
        </span>
        <b>
            <?php _e('seconds', 'my_theme-td'); ?>
        </b>
    </div>
</h1>