<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );
?>


<div class="container shop-content"><!-- container starts --->


<?php 

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	//do_action( 'woocommerce_before_shop_loop' );
	
	woocommerce_output_all_notices();?>

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
	
	<?php
	
	$buhala_shop_cat = get_queried_object();
// $cateID = $cate->term_id;
// echo $cateID;
// echo $buhala_shop_cat->description;

if ($buhala_shop_cat && !is_shop()) : ?>
	<div class="row promo-banner__wrapper fade-up appear delay-1">
		<div class="col-md-6 ">
			<div class="promo-banner">
				<p class="promo-banner__title"><?php echo $buhala_shop_cat->name;?></p>
				<?php if ($buhala_shop_cat->description) : ?>
					<p class="promo-banner__desc"><?php echo $buhala_shop_cat->description;?></p>
				<?php endif;?>
			</div>
		</div>
		<?php
		$thumbnail_id = get_term_meta( $buhala_shop_cat->term_id, 'thumbnail_id', true ); 
		$buhala_shop_cat_img = wp_get_attachment_url( $thumbnail_id ); 
		if($buhala_shop_cat_img): ?>
			<div class="col-md-6">
				<div class="promo-banner promo-banner-image" style="background-image: url('<?php echo $buhala_shop_cat_img ?>">
					
				</div>
			</div>	
		<?php endif; ?>
	</div>
		<?php else: 
if(get_field('banner_title', 'option') || get_field('banner_content','option') || get_field('banner_image', 'option')): ?>
	<div class="row promo-banner__wrapper fade-up appear delay-1">
		<?php if(get_field('banner_title', 'option') || get_field('banner_content','option')): ?>
			<div class="col-md-6 ">
				<div class="promo-banner">
					<p class="promo-banner__title"><?php the_field('banner_title', 'option');?></p>
					<?php if (get_field('banner_content','option')) : ?>
						<p class="promo-banner__desc"><?php the_field('banner_content','option') ?></p>
					<?php endif;?>
				</div>
			</div>
		<?php endif; ?>
		<?php if(get_field('banner_image', 'option')): ?>
			<div class="col-md-6">
				<div href="" class="promo-banner promo-banner-image" style="background-image: url('<?php the_field('banner_image', 'option') ?>">
					
				</div>
			</div>	
		<?php endif; ?>
	</div>
	<?php endif; endif; ?>
	<?php
	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );

?>
</div><!-- container ends --->
<?php get_footer( 'shop' );
