<?php if ( has_post_thumbnail() ) : ?>
<?php the_post_thumbnail( 'full', array( 'itemprop' => 'image' ) ); ?>
<?php endif; ?>

<div class="entry-content" itemprop="mainEntityOfPage">

<meta itemprop="description" content="<?php echo esc_html( wp_strip_all_tags( get_the_excerpt(), true ) ); ?>" />
<h1><?php the_title();?></h1>
<?php the_content(); ?>
<div class="entry-links"><?php wp_link_pages(); ?></div>
</div>