<?php
if (is_front_page() || is_home() || is_front_page() && is_home()) {
    echo '<h1>';
}
echo '<a href="' . esc_url(home_url('/')) . '" title="' . esc_attr(get_bloginfo('name')) . '" rel="home" itemprop="url">';
?>
<img class="logo" src="<?php echo get_stylesheet_directory_uri() . '/images/egl-circle2.png'; ?>" alt="<?php echo esc_html(get_bloginfo('name')); ?>" />
<?php
//echo '<span itemprop="name">' . esc_html(get_bloginfo('name')) . '</span>';
echo '</a>';
?>
<?php
if (is_front_page() || is_home() || is_front_page() && is_home()) {
    echo '</h1>';
}
?>