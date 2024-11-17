<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bulmapress
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer hero is-transparent" role="contentinfo">
  <?php 
  //show contact us footer if not contact page
  if(get_the_ID() != 10 && !is_page_template('templates/secondary.php')){
    ?>
    
    <div id="ready">
      <h2>Ready to Get Started?</h2>
      <a href="/?p=10" class="button">GET IN TOUCH</a>
    </div>
  <?php
  }
  ?>
  <div class="container">
    <div class="hero-body has-text-centered">
     <div class="site-info">
      <?php bulmapress_copyright_link(); ?>
    </div><!-- .site-info -->
  </div>
</div><!-- .container -->
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
