<?php
//ARRAY OF ALLOWED IP ADDRESSES: DELETE AFTER DEV
$allowed_ips = ['207.201.221.134'];
$allowed_ips[] = '199.26.78.85';
$allowed_ips[]= '76.108.131.107';
$allowed_ips[]='72.188.199.122';

$newURL = '/soon/index-backup.php';

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
  $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
  $ip = $_SERVER['REMOTE_ADDR'];
}
/*
if (!in_array($ip, $allowed_ips))
{
  header('Location: '.$newURL);
}
*/
// END DEV
?>

<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

  <link href="//www.google-analytics.com" rel="dns-prefetch">
  <link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
  <link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

  <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Ovo" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">

  <?php wp_head(); ?>
  <script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
          assets: '<?php echo get_template_directory_uri(); ?>',
          tests: {}
        });
        </script>

      </head>
      <body <?php body_class(); ?>>
        <!-- wrapper -->
        <div class="">

          <!-- header -->
          <header class="header clear" role="banner">

            <!-- logo -->
            <div class="logo">
              <a href="<?php echo home_url(); ?>">
                <!-- svg logo - toddmotto.com/mastering-svg-use-for-a-retina-web-fallbacks-with-png-script -->
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="ArchiDesign and Build | Luxury Custom Home Builder Orlando" class="logo-img">
              </a>
            </div>
            <!-- /logo -->

            <a class="nav_toggle" href="#">
              <span>MENU</span> <i class="fa fa-bars"></i>
            </a>

          </header>
          <!-- /header -->

          <!-- nav -->

          <nav class="nav" role="navigation">
            <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.png" class="logo-img" alt="Orlando Custom Luxury Home Builder / Architect ArchiDesign and Build" />
            <a class="nav_close" href="#">&times;</a>
          -->
            <?php html5blank_nav(); ?>
          </nav>
          <!-- /nav -->