<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php wp_head() ?>
  </head>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-LC2P3QV6QB"></script>
<script>
 window.dataLayer = window.dataLayer || [];
 function gtag(){dataLayer.push(arguments);}
 gtag('js', new Date());
 gtag('config', 'G-LC2P3QV6QB');
</script>
  <body <?php body_class('');?>>

  <header id="header" class="<?php if(is_front_page()) {echo 'd-none';} ?>">
        <div class="mobile-menu">
            <div class="mobile-logo">
                <a href="<?php echo get_home_url() ?>"><img src="<?php the_field('header_logo', 'option') ?>" alt=""></a>
            </div>
            <div class="burger" id="burger">
                <span></span>
                <span></span>
                <span></span>
                <!-- <img src="<?php echo get_template_directory_uri() ?>/assets/img/menu.svg" alt="" class="open">
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/close.svg" alt="" class="close"> -->
            </div>
        </div>
        <nav class="header-nav" id="header-nav">
            <?php 
                wp_nav_menu( [
                    'theme_location'  => 'header-left-menu',
                    'menu_class'      => 'header-menu', 
                    'echo'            => true,
                    'fallback_cb'     => 'wp_page_menu',
                    'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                    'depth'           => 0,
                ] );
            ?>
            <a href="<?php echo get_home_url(  ) ?>"><div class="logo desctop-logo"></div></a>
            <?php 
            wp_nav_menu([
                'theme_location'  => 'header-right-menu',
                'menu_class'      => 'header-menu', 
                'echo'            => true,
                'fallback_cb'     => 'wp_page_menu',
                'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth'           => 0,
            ]);
            ?>
            <style>
                .logo{
                    background-image:url(<?php the_field('header_logo', 'option') ?>);
                }
            </style>
            <header>
                    <ul class="icons mobile">
                        <?php 
                            if ( !function_exists( 'yith_wcwl_count_products' ) ) { 
                                require_once ABSPATH . PLUGINDIR . 'yith-woocommerce-wishlist/includes/functions.yith-wcwl.php'; 
                            } 
                            
                            $wishlist_product_count= yith_wcwl_count_products($wishlist_token);

                            if ($wishlist_product_count > 0) : $fill = 'filled'; else : $fill = 'not-filled'; endif;
                        ?>

                        <li class="search-icon"><a href=""><?php $icon = get_field('search_icon', 'option');if( !empty( $icon ) ): ?><?php echo file_get_contents(esc_url(wp_get_original_image_path($icon['id']))); ?><?php endif; ?></a>
                            <?php get_search_form( $args ); ?>
                        </li>
                        <li class="account-icon"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account',''); ?>"><?php $icon = get_field('account_icon', 'option');if( !empty( $icon ) ): ?><?php echo file_get_contents(esc_url(wp_get_original_image_path($icon['id']))); ?><?php endif; ?></a></li>
                        
                        <li class="favorite-icon yith-wcwl-items-count <?php echo $fill;?>" data-content="<?php echo $wishlist_product_count; ?>"><a href="https://buhalaspa.at/wishlist/"><?php $icon = get_field('wishlist_icon', 'option');if( !empty( $icon ) ): ?><?php echo file_get_contents(esc_url(wp_get_original_image_path($icon['id']))); ?><?php endif; ?></a></li>
                            <li class="cart-icon"><a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php $icon = get_field('cart_icon', 'option');if( !empty( $icon ) ): ?><?php echo file_get_contents(esc_url(wp_get_original_image_path($icon['id']))); ?><?php endif; ?></a><div class="header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></div></li>
                    </ul>
                </header>
        </nav>
            <ul class="icons desctop">
                <li class="search-icon"><a href=""><?php $icon = get_field('search_icon', 'option');if( !empty( $icon ) ): ?><?php echo file_get_contents(esc_url(wp_get_original_image_path($icon['id']))); ?><?php endif; ?></a>
                    <?php get_search_form( $args ); ?>
                </li>
                <!--<li class="account-icon"><a href="<?php /*echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account',''); ?>"><?php $icon = get_field('account_icon', 'option');if( !empty( $icon ) ): ?><?php echo file_get_contents(esc_url(wp_get_original_image_path($icon['id']))); ?><?php endif; ?></a></li>
                

                <li class="favorite-icon yith-wcwl-items-count <?php echo $fill;?>" data-content="<?php echo $wishlist_product_count; ?>"><a href="https://buhalaspa.at/wishlist/"><?php $icon = get_field('wishlist_icon', 'option');if( !empty( $icon ) ): ?><?php echo file_get_contents(esc_url(wp_get_original_image_path($icon['id']))); ?><?php endif; ?></a></li>
                <li class="cart-icon"><a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php $icon = get_field('cart_icon', 'option');if( !empty( $icon ) ): ?><?php echo file_get_contents(esc_url(wp_get_original_image_path($icon['id']))); ?><?php endif; ?></a><div class="header-cart-count"><?php echo WC()->cart->get_cart_contents_count();*/ ?></div></li>
                -->
                
                <style>
                    header .icons li.cart-icon::after{
                        /* content: "<?php global $woocommerce; echo $woocommerce->cart->cart_contents_count;?>";   */
                        /* content: "<?php echo WC()->cart->get_cart_contents_count(); ?>"; */
                    }
                    header .icons li.favorite-icon.filled::after{ 
                        /* content: "<?php echo $wishlist_product_count; ?>"; */
                        content: attr(data-content);
                    }
                </style>
                
            </ul>

    </header>
