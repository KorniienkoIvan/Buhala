<?php get_header();?>

<section class="main">
        <div class="main_nav">
            <div class="mobile-logo">
                <img src="<?php the_field('main_header_logo') ?>" alt="">
            </div>
            <div class="burger">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="main_nav_mobile">
                <?php 
                    wp_nav_menu( [
                        'theme_location'  => 'header-left-menu',
                        'menu_class'      => 'main_header karla_r4', 
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => '',
                    ] );
                ?>
                <a href="<?php echo get_home_url(  ) ?>" class="main-header-logo-link"><div class="front_page_logo"></div></a>
                 <?php 
                    wp_nav_menu( [
                        'theme_location'  => 'header-right-menu',
                        'menu_class'      => 'main_header karla_r4', 
                        'echo'            => true,
                        'fallback_cb'     => 'wp_page_menu',
                        'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => '',
                    ] );
                ?>
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
                        
                        <li class="favorite-icon yith-wcwl-items-count <?php echo $fill;?>" data-content="<?php echo $wishlist_product_count; ?>"><a href="https://buhala.purpleplanet.website/wishlist/"><?php $icon = get_field('wishlist_icon', 'option');if( !empty( $icon ) ): ?><?php echo file_get_contents(esc_url(wp_get_original_image_path($icon['id']))); ?><?php endif; ?></a></li>
                            <li class="cart-icon"><a href="<?php echo esc_url( wc_get_cart_url() ); ?>"><?php $icon = get_field('cart_icon', 'option');if( !empty( $icon ) ): ?><?php echo file_get_contents(esc_url(wp_get_original_image_path($icon['id']))); ?><?php endif; ?></a><div class="header-cart-count"><?php echo WC()->cart->get_cart_contents_count(); ?></div></li>
                    </ul>
                </header> 
            </div>
        </div>
		<style>
			.front_page_logo{
				background-image:url(<?php the_field('main_header_logo') ?>);
			}
			.menu-item.logo a{
				line-height:240px;
				font-size:240px;
				color:transparent;
			}
			.menu-item.logo a::before{
				display:none;
            }
            .main_nav_mobile{
                display:flex;
                justify-content: center;
            }
		</style>
        <?php if(have_rows('main_slider')): ?>
		<div class="main_slider">
            <?php while(have_rows('main_slider')): the_row(); ?>
			<div class="main_slider_wrapper">
				<div class="main_slider_li">
					<div class="main_slider_li_bg">
						<img src="<?php the_sub_field('main_slider_slide_background') ?>">
					</div>
					<div class="main_slider_li_title liana_r1"><?php the_sub_field('main_slider_slide_title') ?></div>
					<?php if(get_sub_field('main_slider_slide_sub_title')): ?><div class="main_slider_li_subtitle karla_r2"><?php the_sub_field('main_slider_slide_sub_title') ?></div><?php endif; ?>
                    <?php $button = get_sub_field('main_slider_slide_button') ?>
                    <?php if($button): ?>
                    <div class="main_slider_li_button">
						<a href="<?php echo $button['url'] ?>"><div class="button"><?php echo $button['title'] ?></div></a>
                    </div>
                    <?php endif; ?>
				</div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
	</section>
    
	<section class="info">
		<div class="container fade-up appear  delay-1">
			<div class="info_title cyan_r3"><?php the_field('top_banner_title') ?></div>
			<div class="info_text karla_r5">
                <?php the_field('top_banner_text') ?>
            </div>
            <?php if($button): ?>
			<div class="info_button">
                <?php $button = get_field('top_banner_button') ?>
				<a href="<?php echo $button['url'] ?>"><div class="button"><?php echo $button['title'] ?></div></a>
            </div>
            <?php endif; ?>
		</div>
	</section>
    <?php if(have_rows('main_service')): ?>
	<section class="services cyan_r1 ">
		<div class="container-fluid fade-up appear  delay-1">
            <div class="services_flex row">
                <?php while(have_rows('main_service')): the_row() ?>
                <a class="services_block col-md-6 col-lg-3" href="<?php the_sub_field('service_card_link') ?>">
                    <div class="services_bg">
                        <img src="<?php the_sub_field('service_image') ?>">
                    </div>
                    <div class="services_text"><?php the_sub_field('service_name') ?></div>
                </a>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
    <?php
    
    $args = array(
            'post_type' => 'services',
            'posts_per_page' => 3,
            'category'     => get_the_category(),
        );
        $query = new WP_Query( $args );

    ?> 
	<section class="offers">
		<div class="container fade-up appear  delay-1">
			<?php if(get_field('offers-section-title')) : ?>
				<div class="offers_title cyan_r3"><?php the_field('offers-section-title');?></div>
			<?php endif;?>
			<div class="offers_blocks row">
            <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?> 
				<div class="offers_block col-md-6 col-lg-4">
					<div class="offers_block_img">
                        <?php the_post_thumbnail() ?>
					</div>
					<div class="offers_block_button">
						<a href="<?php the_permalink() ?>"><div class="button">Book now!</div></a>
					</div>
					<div class="offers_block_title cyan_r5">
						<?php the_title() ?>
					</div>
					<div class="offers_block_text karla_r5">
                        <?php the_excerpt(); ?>
					</div>
                </div>
                <?php endwhile; endif; wp_reset_postdata(); ?>
			</div>
		</div>
	</section>

	<section class="video" >
        <div id="video_about"></div>
		<div class="container-fluid fade-up appear  delay-1">
            <video id="player" playsinline controls data-poster="<?php echo get_template_directory_uri() ?>/assets/images/poster.jpg">
            <source src="<?php echo get_template_directory_uri() ?>/assets/video/video.mp4" type="video/mp4"/>
            </video>
        </div>
	</section>

	<section class="info light">
		<div class="container fade-up appear  delay-1">
			<div class="info_title cyan_r3"><?php the_field('bottom_banner_title') ?></div>
			<div class="info_text karla_r5">
                <?php the_field('bottom_banner_text') ?>
            </div>
            <?php $button = get_field('bottom_banner_button') ?>
            <?php if($button): ?>
			<div class="info_button">
				<a href="<?php echo $button['url'] ?>"><div class="button"><?php echo $button['title'] ?></div></a>
            </div>
            <?php endif; ?>
		</div>
	</section>
    <?php if(have_rows('offers')): ?>
	<section class="six">
		<div class="container-fluid fade-up appear  delay-1">
            <div class="six_blocks">
                <?php while(have_rows('offers')): the_row(); ?>
                <?php if(get_sub_field('offer_cards_choice') == 'Top'): ?>
                    <div class="offer col-md-6 col-lg-4">
                    <div class="six_block_img h-50">
                        <img src="<?php the_sub_field('offer_card_image') ?>">
                    </div>
                    <div class="six_block_info">
                        <?php if(get_sub_field('discount')): ?>
                        <div class="six_block_info_discount karla_r2">
                            <?php the_sub_field('discount') ?>
                        </div>
                        <?php endif; ?>
                        <div class="six_block_info_img">
                            <img src="<?php the_sub_field('offer_card_small_image') ?>">
                        </div>
                        <div class="six_block_info_title cyan_r4"><?php the_sub_field('offer_card_service_name') ?></div>
                        <?php if(get_sub_field('offer_card_service_short_description')): ?>
                        <div class="six_block_info_text karla_r5">
                            <?php the_sub_field('offer_card_service_short_description') ?>
                        </div>
                        <?php endif; ?>
                        <?php $button = get_sub_field('offer_card_button') ?>
                        <?php if($button): ?>
                        <div class="six_block_info_button">
                            <a href="<?php echo $button['url'] ?>"><div class="button"><?php echo $button['title'] ?></div></a>
                        </div>
                        <?php endif; ?>
                    </div>
                        </div>
                    <?php endif; ?>
                    <?php if(get_sub_field('offer_cards_choice') == 'Bottom'): ?>
                    <div class="offer col-md-6 col-lg-4">
                    <div class="six_block_info">
                        <?php if(get_sub_field('discount')): ?>
                        <div class="six_block_info_discount karla_r2">
                            <?php the_sub_field('discount') ?>
                        </div>
                        <?php endif; ?>
                        <div class="six_block_info_img">
                            <img src="<?php the_sub_field('offer_card_small_image') ?>">
                        </div>
                        <div class="six_block_info_title cyan_r4"><?php the_sub_field('offer_card_service_name') ?></div>
                        <?php if(get_sub_field('offer_card_service_short_description')): ?>
                        <div class="six_block_info_text karla_r5">
                            <?php the_sub_field('offer_card_service_short_description') ?>
                        </div>
                        <?php endif; ?>
                        <?php $button = get_sub_field('offer_card_button') ?>
                        <?php if($button): ?>
                        <div class="six_block_info_button">
                            <a href="<?php echo $button['url'] ?>"><div class="button"><?php echo $button['title'] ?></div></a>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="six_block_img h-50">
                        <img src="<?php the_sub_field('offer_card_image') ?>">
                    </div>
                        </div>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php endif; ?>
                    
	<section class="gap">
		<div class="container-fluid fade-up appear  delay-1">
            <div class="container-fluid">
                <div class="gap_img">
                    <img src="<?php the_field('top_image_banner_background') ?>">
                </div>
                <div class="gap_text liana_r2"><?php the_field('top_image_banner_title') ?></div>
            </div>
        </div>
	</section>

	<section class="season">
		<div class="container fade-up appear  delay-1">
			<div class="season_title cyan_r3"><?php the_field('special_offer_title') ?></div>
			<div class="season_text karla_r5">
						<?php the_field('special_offer_text') ?>
            </div>
            <?php if(have_rows('special_offer')): ?>
			<div class="season_blocks row">
            <?php while(have_rows('special_offer')): the_row(); ?>
            <?php if(get_sub_field('special_offer_choice') == "Width 50%"): ?>
				<div class="col-md-6">
                    <div class="season_block">
                        <div class="season_block_img">
                            <img src="<?php the_sub_field('special_offer_half-width_background_image') ?>">
                        </div>
                        <div class="season_block_ico">
                            <img src="<?php the_sub_field('special_offer_half-width_image') ?>">
                        </div>
                        <div class="season_block_title cyan_r4"><?php the_sub_field('special_offer_half-width_text') ?></div>
                        <?php $button = get_sub_field('special_offer_half-width_button') ?>
                        <?php if($button): ?>
                            <div class="season_block_button">
                                <a href="<?php echo $button['url'] ?>"><div class="button"><?php echo $button['title'] ?>!</div></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if(get_sub_field('special_offer_choice') == "Width 100%"): ?>
				<div class="col-12">
                    <div class="season_block">
                        <div class="season_block_discount karla_b2">
                            <?php the_sub_field('special_offer_full-width_discount') ?>
                        </div>
                        <div class="season_block_img">
                            <img src="<?php the_sub_field('special_offer_full-width_background_image') ?>">
                        </div>
                        <div class="season_block_title cyan_r4"><?php the_sub_field('special_offer_full-width_text') ?></div>
                        <?php $button = get_sub_field('special_offer_full-width_button') ?>
                        <?php if($button): ?>
                        <div class="season_block_button">
                            <a href="<?php echo $button['url'] ?>"><div class="button"><?php echo $button['title'] ?></div></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
                <?php endif; ?>
            <?php endwhile; ?>
            </div>
            <?php endif; ?>
		</div>
	</section>

	<section class="gap">
		<div class="container-fluid fade-up appear  delay-1">
            <div class="gap_img">
                <img src="<?php the_field('bottom_image_banner_background') ?>">
            </div>
            <div class="gap_text liana_r2"><?php the_field('bottom_image_banner_title') ?></div>
        </div>
	</section>

	<section class="reviews">
		<div class="container fade-up appear  delay-1">
            <div class="reviews_title cyan_r3"><?php the_field('homepage_reviews_section_title') ?></div>
            <?php if(have_rows('homepage_reviews_repeater')): ?>
                <div class="reviews_slider">
                    <?php while(have_rows('homepage_reviews_repeater')): the_row(); ?>
                        <div class="reviews_slider_li">
                            <div class="reviews_slider_li_title karla_r4"><?php the_sub_field('homepage_review_title') ?></div>
                            <div class="reviews_slider_li_text karla_r5"><?php the_sub_field('homepage_review_text') ?></div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
		</div>
	</section>

	<section class="subscription">
		<div class="container fade-up appear  delay-1">
			<div class="subscription_title cyan_r2"><?php the_field('email_section_title') ?></div>
			<div class="subscription_text karla_r4"><?php the_field('email_section_text') ?></div>
				<?php the_field('email_section_form') ?>
		</div>
	</section>

<?php get_footer();?>