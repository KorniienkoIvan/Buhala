<?php 

/**
 * Template Name: Shopping Bag
 */

 get_header();?>

<div class="cart__content fade-up appear delay-1">

    <?php 
    if ( is_cart() ) {
        get_template_part( 'template-parts/shop-submenu' );
    }
    ?>
    <div class=""><?php the_content(); ?></div>
    
</div>

 <?php get_footer();?>