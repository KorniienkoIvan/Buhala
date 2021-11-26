<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */

global $product;

$rating_1 = $product->get_rating_count(1);
$rating_2 = $product->get_rating_count(2);
$rating_3 = $product->get_rating_count(3);
$rating_4 = $product->get_rating_count(4);
$rating_5 = $product->get_rating_count(5);
?>
<?php $review_count = $product->get_review_count(); ?>
	<section class="container rating_wrapper">
        <div class="row">
            <div class="col-lg-4 col-12 common_rating">
                <div class="rating-title">
                    <?php 
                    
                    $rating  = $product->get_average_rating();
                    echo number_format((float)$rating, 1, '.', '');  // Outputs -> 105.00
                    ?>

                    <br>
                </div>
				<?php echo '<div class="reviews-count">'.__('Based on ','woocommerce') . $review_count .__(' reviews','woocommerce').'</div>'; ?>
			</div>

            <div class="col-lg-4 col-12 rating-rows-wrapper">
                <div class="rating-rows">
					
						<div class="rating-row">
							<div class="empty">
								<ul class="hearts">
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
								</ul>
								<div class="empty-row">
		
								</div>
							</div>
							<div class="full">
								<ul class="hearts">
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
								</ul>
								<div class="full-row">
								<div class="full-row-point" style="width: <?php echo $rating_5 / get_total_reviews_count() * 100 . '%';?>"></div>
								</div>
								<div class="rating-row-reviews">
									<?php echo $rating_5; ?>
								</div>
							</div>
						</div>
					
                    <div class="rating-row">
                        <div class="empty">
                            <ul class="hearts">
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                            </ul>
                            <div class="empty-row">
    
                            </div>

                        </div>
                        <div class="full">
                            <ul class="hearts">
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
                                
                            </ul>
                            <div class="full-row">
								<div class="full-row-point" style="width: <?php echo $rating_4 / get_total_reviews_count() * 100 . '%';?>"></div>
                            </div>
                            <div class="rating-row-reviews">
                                <?php echo $rating_4;?>
                            </div>
                        </div>
                    </div>
                    <div class="rating-row">
                        <div class="empty">
                            <ul class="hearts">
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                            </ul>
                            <div class="empty-row">
    
                            </div>
                        </div>
                        <div class="full">
                            <ul class="hearts">
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
                                
                            </ul>
                            <div class="full-row">
							<div class="full-row-point" style="width: <?php echo $rating_3 / get_total_reviews_count() * 100 . '%';?>"></div>
                            </div>
                            <div class="rating-row-reviews">
							<?php echo $rating_3;?>
                            </div>
                        </div>
                    </div>
                    <div class="rating-row">
                        <div class="empty">
                            <ul class="hearts">
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                            </ul>
                            <div class="empty-row">
    
                            </div>
                        </div>
                        <div class="full">
                            <ul class="hearts">
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
                               
                            </ul>
                            <div class="full-row">
								<div class="full-row-point" style="width: <?php echo $rating_2 / get_total_reviews_count() * 100 . '%';?>"></div>
                            </div>
                            <div class="rating-row-reviews">
								<?php echo $rating_2;?>
                            </div>
                        </div>
                    </div>
                    <div class="rating-row">
                        <div class="empty">
                            <ul class="hearts">
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/empty-heart.svg" alt=""></li>
                            </ul>
                            <div class="empty-row">
    
                            </div>
                        </div>
                        <div class="full">
                            <ul class="hearts">
                                <li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/full-heart.svg" alt=""></li>
                               
                            </ul>
                            <div class="full-row">
								<div class="full-row-point" style="width: <?php echo $rating_1 / get_total_reviews_count() * 100 . '%';?>"></div>
                            </div>
                            <div class="rating-row-reviews">
								<?php echo $rating_1;?>
                            </div>
						</div>
						
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-12 rating-buttons">
                <a data-popup="#test" class="button write-review-button"><?php printf( _e('WRITE A REVIEW', 'buhala'))?></a>
                <a href="#"class="button ask-question-button"><?php printf( _e('ASK A QUESTION', 'buhala'))?></a>
            </div>
        </div>
    </section>
</div>
	<?php 

$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

if ( ! empty( $product_tabs ) ) : ?>
    <section class="reviews-section" id="reviews">
	    <div class="woocommerce-tabs wc-tabs-wrapper container">
            <div class="row tabs_wrapper">
                <ul class="tabs wc-tabs" role="tablist">
                    <?php foreach ( $product_tabs as $key => $product_tab ) : ?>
                        <li class="tab <?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
                            <a href="#tab-<?php echo esc_attr( $key ); ?>">
                                <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <div class="row search_filters">
                <div class="col-6 search">
                    
                </div>
                <div class="col-6 fiters_buttons">
                    <div class="filter_button">
                        Filter reviews
                    </div>
                    <div class="recent_review">
                        <a href="#">Most recent review</a>
                    </div>
                </div>
            </div>
            <?php foreach ( $product_tabs as $key => $product_tab ) : ?>
                <div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
                    <?php
                    if ( isset( $product_tab['callback'] ) ) {
                        call_user_func( $product_tab['callback'], $key, $product_tab );
                    }
                    ?>
                </div>
            <?php endforeach; ?>

            <?php do_action( 'woocommerce_product_after_tabs' ); ?>
        
    </div>
</section>

<?php endif; ?>
