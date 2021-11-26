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