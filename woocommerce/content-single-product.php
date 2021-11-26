<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

?>

<style>
	.related-products__wrapper {
		background-color: #F8F6F4;
		padding: 50px 0;
	}
	.related-products__wrapper .products {
		padding: 25px 0;
	}

	

	.single {
		background-color: white;
	}

	.product-features {
		padding: 50px 0;
		/* margin-bottom: 50px; */
	}

	.product-features h2 {
		position: relative;
		color: #C9AB6F;
		overflow: hidden;
		margin-bottom: 0;
		margin-right: 15px;
    	flex: 0 0 auto;
	}

	.product-features__title-wrapper {
		display: flex;
		align-items: flex-end;
		margin-bottom: 25px;
	}
	.product-features__title-wrapper::after {
		content: "";
		display: block;
		width: 100%;
		height: 1px;
		background-color: #DDC28E;
	}

	.products li.sale .woocommerce_btn {
		height: 64px;
	}

	.products li.sale .price {
		padding: 5px 10px;
	}
</style>

<div class="container"><!--Container starts --->

<?php
/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
</div><!--Container ends --->


<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'single-product__wrapper', $product ); ?>>
	<div class="container">
			<div class="shop-submenu__row row fade-up appear delay-1">
				<div class="col" role="navigation">
					<?php wp_nav_menu( [ 
						'container_class' => 'shop-submenu',
						'theme_location'  => 'shop_submenu'
					] ); ?>
				</div>
				<div class="col-auto">
					<?php woocommerce_catalog_ordering();?>
				</div>
					
			</div>
	</div>
	<div class="product-intro fade-up appear delay-1">
		<div class="container">
			
			<div class="row">
						<?php $attachment_ids = $product->get_gallery_image_ids();
						if (count($attachment_ids) <= 2) : ?>
						<style>
						#wpgis-gallery .slick-track {
								transform: translate3d(0px, 0px, 0px)!important;
						}
						</style>
						<?php endif; ?> 
				<div class="col-md-6 product-gallery__wrapper">
						<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
					//woocommerce_show_product_images();?>
					
				</div>
				<script>
					jQuery(function(){
						$('input[type="number"]').niceNumber();
					});
				</script>
				<div class="col-md-6">
					<div class="summary entry-summary">
						<?php
						woocommerce_show_product_sale_flash();
						woocommerce_template_single_title();
						woocommerce_template_single_meta();
						woocommerce_template_single_excerpt();
						?>
						<div class="product-atributes__wrapper">
							<?php wc_display_product_attributes( $product ); ?>
						</div>

						<?php
						//woocommerce_template_single_price();
						//buhala_price_show();
						$price = get_post_meta( get_the_ID(), '_regular_price', true);
						$price_sale = get_post_meta( get_the_ID(), '_sale_price', true);
						if ($price_sale !== "") {
							echo '<p class="price"><span class="woocommerce-Price-currencySymbol">'. get_woocommerce_currency_symbol(get_woocommerce_currency()) .'</span>' . $price_sale . '</p>';
						} else {
							echo '<p class="price"><span class="woocommerce-Price-currencySymbol">'. get_woocommerce_currency_symbol(get_woocommerce_currency()) .'</span>' . $price . '</p>';;
						}
						woocommerce_template_single_add_to_cart();
						//woocommerce_template_single_rating();
						
						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						//do_action( 'woocommerce_single_product_summary' );
						?>
						<div class="row">
							<?php if ($price_sale !== "") {
								$savings = $price - $price_sale;
								echo '<div class="col-12 discount">You save '. get_woocommerce_currency_symbol(get_woocommerce_currency()) . $savings . '</div>' ;
							}
							?>
							<!-- <div class="col-12 discount">

								You save $5
							</div> -->
							<div class="col-lg-2 col-md-6 col-12 product_heart_rating">
								<ul class="hearts">
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/Icon awesome-heart.svg" alt=""></li>
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/Icon awesome-heart.svg" alt=""></li>
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/Icon awesome-heart.svg" alt=""></li>
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/Icon awesome-heart.svg" alt=""></li>
									<li class="heart"><img src="<?php echo get_template_directory_uri() ?>/assets/img/Icon awesome-heart.svg" alt=""></li>
								</ul>
							</div>
							<div class="col-lg-2 col-md-6 col-12 review_count"><?php echo get_total_reviews_count() ?></div>
							<div class="col-lg-2 col-md-6 col-12 comments_count">comments</div>
							<div class="col-lg-2 col-md-6 col-12 link_to_review"><a data-popup="#test" class="button">Write a review</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php if(get_field('ingredients') || get_field('product_details') || get_field('scent') || get_field('how_to_use') ): ?>
	<div class="product-features fade-up appear delay-1">
		<div class="container">
			<div class="row">
				<!-- <?php while(have_rows('characteristic')): the_row(); ?>				
				<div class="col-md-6">
					<div class="product-features__title-wrapper">
						<h2 class="product-features__title"><?php the_sub_field('characteristic_title') ?></h2>
						<hr>
					</div>
					<?php if(get_sub_field('characteristic_choice') == "Image + Text"): ?>
						<?php if(have_rows('characteristic_image_plus_text')): ?>
						<div class="row">
							<?php while(have_rows('characteristic_image_plus_text')): the_row(); ?>
								<div class="col-md-6 col-lg-3 characteristic-card">
									<img src="<?php the_sub_field('characteristic_image') ?>" alt="">
										<p class="product-features__content">
											<?php the_sub_field('characteristic_text') ?>
										</p>
								</div>
							<?php endwhile; ?>
						</div>
						<?php endif; ?>
					<?php endif; ?>
					<?php if(get_sub_field('characteristic_choice') == "Text"): ?>
						<p class="product-features__content">
							<?php the_sub_field('characteristic_choice_text') ?>
						</p>
					<?php endif; ?>
				</div>
				<?php endwhile; ?> -->
			
				<?php
				$ingredients = get_field('ingredients');
				if ($ingredients) : ?>
				<div class="col-md-6">
					<div class="product-features__title-wrapper">
						<h2 class="product-features__title"><?php echo 'Ingredients'; ?></h2>
						<hr>
					</div>
					<p class="product-features__content">
						<?php echo $ingredients; ?>
					</p>
				</div>
				<?php endif;
				$icons = get_field('product_details');
				if( $icons ): ?>
				<div class="col-md-6">
					<div class="product-features__title-wrapper">
						<h2 class="product-features__title"><?php echo 'Product details'; ?></h2>
						<hr>
					</div>
					<div class="row">
					<?php foreach( $icons as $icon ): ?>
						<div class="col-6 col-md-4 col-lg-auto characteristic-card">
						<?php echo wp_get_attachment_image( $icon, 'medium');  ?>
						</div>
					<?php endforeach; ?>
					</div>
				</div>
				<?php endif;
				$scent = get_field('scent');
				if ($scent) : ?>
				<div class="col-md-6">
					<div class="product-features__title-wrapper">
						<h2 class="product-features__title"><?php echo 'Scent'; ?></h2>
						<hr>
					</div>
					<p class="product-features__content">
						<?php echo $scent; ?>
					</p>
				</div>
				<?php endif;
				$how_to_use = get_field('how_to_use');
				if ($how_to_use) : ?>
				<div class="col-md-6">
					<div class="product-features__title-wrapper">
						<h2 class="product-features__title"><?php echo 'How to use'; ?></h2>
						<hr>
					</div>
					<p class="product-features__content">
						<?php echo $how_to_use; ?>
					</p>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	
	<div class="related-products__wrapper">
		<div class="container fade-up appear delay-1"><?php woocommerce_upsell_display();?></div>
	</div>
	<?php 
		$rating_counts = $product->get_rating_count();
		$review_counts = $product->get_review_count();
		$average      = $product->get_average_rating();
	?>


	<div class="comment-tabs">
		<div class="container fade-up appear delay-1">
			<?php woocommerce_output_product_data_tabs(); ?>
		</div>
	</div>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>


