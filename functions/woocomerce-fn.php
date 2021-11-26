<?php

// // Add theme support woocomerce and it`s elements
// function buhala_add_woocommerce_support() {
//     // add_theme_support( 'woocommerce', array(
//     //     'thumbnail_image_width' => 150,
//     //     'single_image_width'    => 300,

//     //     'product_grid'          => array(
//     //         'default_rows'    => 3,
//     //         'min_rows'        => 2,
//     //         'max_rows'        => 8,
//     //         'default_columns' => 3,
//     //         'min_columns'     => 3,
//     //         'max_columns'     => 3,
//     //     ),
//     // ) );
//     // add_theme_support( 'wc-product-gallery-zoom' );
//     // add_theme_support( 'wc-product-gallery-lightbox' );
//     // add_theme_support( 'wc-product-gallery-slider' );
//     // add_theme_support(
//     //   'html5',
//     //   array(
//     //     'comment-form',
//     //     'comment-list',
//     //     'gallery',
//     //     'caption',
//     //     'script',
//     //     'style',
//     //   )
//     // );
//     add_theme_support( 'woocommerce' );
// 	add_theme_support( 'wc-product-gallery-zoom' );
// 	add_theme_support( 'wc-product-gallery-lightbox' );
// 	add_theme_support( 'wc-product-gallery-slider' );
// 	add_theme_support( 'title-tag' );
// 	add_theme_support( 'post-thumbnails' );
// 	add_theme_support('html5');

// }

// add_action( 'after_setup_theme', 'buhala_add_woocommerce_support' );


// Remove Woocomerce styles
// Remove each style one by one
add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );
function jk_dequeue_styles( $enqueue_styles ) {
  if (!is_cart() && !is_checkout() && !is_account_page()) {
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
	}

	return $enqueue_styles;
}

// Woocomerce excerpt 
//limit excerpt length
function excerpt($limit,$post_id=-1) {
    if($post_id==-1):
      $excerpt = explode(' ', get_the_excerpt(), $limit);
    else:
      $excerpt = explode(' ', get_the_excerpt($post_id), $limit);
    endif;
    if (count($excerpt)>=$limit) {
      array_pop($excerpt);
      $excerpt = implode(" ",$excerpt).'...';
    } else {
      $excerpt = implode(" ",$excerpt);
    } 
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
  }


// // Add product short description after the product item title
// add_action( 'woocommerce_shop_loop_item_title', 'show_product_short_description' );

// function show_product_short_description() {

// 	global $product;

// 	if ( $tmp_desc = $product->get_short_description() ) {
// 		echo '<div class="product-description">' . $tmp_desc . '</div>';
// 	}

// }


//Register Woocomerce Archive page SubMenu

add_action( 'after_setup_theme', 'theme_register_nav_menu' );
function theme_register_nav_menu() {
  register_nav_menu( 'shop_submenu', 'Shop submenu' );
  register_nav_menu( 'header-left-menu', 'Header Left Menu' );
  register_nav_menu( 'header-right-menu', 'Header Right Menu' );
}
/**
 * Change number of related products output
 */ 
function woo_related_products_limit() {
    global $product;
      
      $args['posts_per_page'] = 6;
      return $args;
  }
  add_filter( 'woocommerce_output_related_products_args', 'jk_related_products_args', 20 );
    function jk_related_products_args( $args ) {
      $args['posts_per_page'] = 3; // 4 related products
      $args['columns'] = 3; // arranged in 2 columns
      return $args;
  }

  /**
 * @snippet       Remove WooCommerce Edit Product Page Boxes
 */
 
function remove_pages_editor(){
  remove_post_type_support( 'product', 'editor' );
}   
add_action( 'init', 'remove_pages_editor' );
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Shop Settings',
		'menu_title'	=> 'Shop',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Icons',
		'menu_title'	=> 'Header Icons',
		'parent_slug'	=> 'theme-general-settings',
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
  ));
  acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Services Settings',
		'menu_title'	=> 'Services settings',
		'parent_slug'	=> 'theme-general-settings',
	));

}
add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type( 'services', [
		'label'  => null,
		'labels' => [
			'name'               => 'Services', // основное название для типа записи
			'singular_name'      => 'Services', // название для одной записи этого типа
			'add_new'            => 'Add Services', // для добавления новой записи
			'add_new_item'       => 'Add Services', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit Services', // для редактирования типа записи
			'new_item'           => 'New Services', // текст новой записи
			'view_item'          => 'View Services', // для просмотра записи этого типа.
			'search_items'       => 'Search Services', // для поиска по этим типам записи
			'not_found'          => 'Services Not Found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Services In Trash', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Services', // название меню
		],
		'description'         => '',
		'public'              => true,
		// 'publicly_queryable'  => null, // зависит от public
		// 'exclude_from_search' => null, // зависит от public
		// 'show_ui'             => null, // зависит от public
		// 'show_in_nav_menus'   => null, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		// 'show_in_admin_bar'   => null, // зависит от show_in_menu
		'show_in_rest'        => null, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 7,
		'menu_icon'           => null,
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'thumbnail', 'excerpt', 'categories' ], // 'title','editor','author','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => array( 'service-cat' ),
		'has_archive'         => true,
		'rewrite'             => true,
		'query_var'           => true,
	] );
}

add_filter('excerpt_more', function($more) {
	return '';
});

## Удаляет "Рубрика: ", "Метка: " и т.д. из заголовка архива
add_filter( 'get_the_archive_title', function( $title ){
	return preg_replace('~^[^:]+: ~', '', $title );
});

function get_total_reviews_count(){
    return get_comments(array(
        'status'   => 'approve',
        'post_status' => 'publish',
        'post_type'   => 'product',
        'count' => true
    ));
}

function get_products_ratings(){
    global $wpdb;

    return $wpdb->get_results("
        SELECT t.slug, tt.count
        FROM {$wpdb->prefix}terms as t
        JOIN {$wpdb->prefix}term_taxonomy as tt ON tt.term_id = t.term_id
        WHERE t.slug LIKE 'rated-%' AND tt.taxonomy LIKE 'product_visibility'
        ORDER BY t.slug
    ");
}

function products_count_by_rating_html(){
    $star = 1;
    $html = '';
    foreach( get_products_ratings() as $values ){
        $star_text = '<strong>'.$star.' '._n('Star', 'Stars', $star, 'woocommerce').'<strong>: ';
        $html .= '<li class="'.$values->slug.'">'.$star_text.$values->count.'</li>';
        $star++;
    }
    return '<ul class="products-rating">'.$html.'</ul>';
}

function products_rating_average_html(){
    $stars = 1;
    $average = 0;
    $total_count = 0;
    if( sizeof(get_products_ratings()) > 0 ) :
        foreach( get_products_ratings() as $values ){
            $average += $stars * $values->count;
            $total_count += $values->count;
            $stars++;
        }
        return round($average / $total_count, 1);
    else :
        return '<p class="rating-average">'. __('No reviews yet', 'woocommerce').'</p>';
    endif;
}


/**
 * Remove product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;
}

function add_review_title_field_on_comment_form() {
  echo '<span class="popup__close"></span><p class="comment-form-title uk-margin-top"><label for="title">' . __( 'Review title', 'text-domain' ) . '</label><input class="uk-input uk-width-large uk-display-block" type="text" name="title" id="title"/></p>';
}
add_action( 'comment_form_logged_in_after', 'add_review_title_field_on_comment_form' );
add_action( 'comment_form_after_fields', 'add_review_title_field_on_comment_form' );

add_action( 'comment_post', 'save_comment_review_title_field' );
function save_comment_review_title_field( $comment_id ){
    if( isset( $_POST['title'] ) )
      update_comment_meta( $comment_id, 'title', esc_attr( $_POST['title'] ) );
}

function get_review_title( $id ) {
  $val = get_comment_meta( $id, "title", true );
  $title = $val ? '<strong class="review-title">' . $val . '</strong>' : '';
  return $title;
}

// function buhala_get_rating_html( $rating, $count = 0 ) {
// 	$html = '';

// 	if ( 0 < $rating ) {
// 		/* translators: %s: rating */
// 		$label = sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $rating );
// 		$html  = '<div class="star-rating" role="img" aria-label="' . esc_attr( $label ) . '">' . wc_get_star_rating_html( $rating, $count ) . '</div>';
// 	}

// 	return apply_filters( 'woocommerce_product_get_rating_html', $html, $rating, $count );
// }


add_filter( 'woocommerce_cart_item_name', 'add_excerpt_in_cart_item_name', 10, 3 );
function add_excerpt_in_cart_item_name( $item_name,  $cart_item,  $cart_item_key ){
    $excerpt = wp_strip_all_tags( excerpt('10', $cart_item['product_id']) );
    $excerpt_html = '<br>
        <p name="short-description">'.$excerpt.'</p>';

    return $item_name . $excerpt_html;
}

add_action( 'wp_footer', 'bbloomer_cart_refresh_update_qty' ); 
 
function bbloomer_cart_refresh_update_qty() {
   if (is_cart() || is_checkout()) {
      ?>
      <script type="text/javascript">
      
      jQuery( document.body ).on( 'wc_fragments_loaded', function(){
        jQuery('.btn-plus, .btn-minus').on('click', function(e) {
          const isNegative = jQuery(e.target).closest('.btn-minus').is('.btn-minus');
          const input = jQuery(e.target).closest('.quantity').find('input');
          if (input.is('input')) {
            input[0][isNegative ? 'stepDown' : 'stepUp']()
          }

          jQuery('button').attr('aria-disabled', 'false').prop("disabled", false);
        });
      });
      jQuery( document.body ).on( 'updated_cart_totals', function(){
        jQuery('.btn-plus, .btn-minus').on('click', function(e) {
          const isNegative = jQuery(e.target).closest('.btn-minus').is('.btn-minus');
          const input = jQuery(e.target).closest('.quantity').find('input');
          if (input.is('input')) {
            input[0][isNegative ? 'stepDown' : 'stepUp']()
          }

          jQuery('button').attr('aria-disabled', 'false').prop("disabled", false);
        });
      });
      
      jQuery('div.woocommerce').on('click', '.quantity-input__wrapper', function(){
        
            jQuery("[name='update_cart']").prop("disabled", false);
            jQuery("[name='update_cart']").attr("aria-disabled","false"); 
            jQuery("[name='update_cart']").trigger("click");
        });
        jQuery(document).on('yith-wcan-ajax-filtered',function(){
        //my functions
        });
        jQuery('div.woocommerce').on('change', '.coupon_input', function(){
            jQuery('#coupon_code').val($(this).val());
            jQuery("[name='apply_coupon']").trigger("click");
         });
      </script>
      <?php
   }
}

// Hook in
add_filter( 'woocommerce_checkout_fields' , 'custom_override_checkout_fields' );

// Our hooked in function - $fields is passed via the filter!
function custom_override_checkout_fields( $fields ) {
     $fields['billing']['billing_first_name']['placeholder'] = 'First Name';
     $fields['billing']['billing_last_name']['placeholder'] = 'Last Name';
     $fields['billing']['billing_city']['placeholder'] = 'City';
     $fields['billing']['billing_postcode']['placeholder'] = 'Postcode';
     $fields['billing']['billing_phone']['placeholder'] = 'Phone';
     $fields['billing']['billing_email']['placeholder'] = 'Email';
     $fields['billing']['billing_company']['placeholder'] = 'Company';
     return $fields;
}


// Remove default sorting
add_filter( 'woocommerce_catalog_orderby', 'misha_remove_default_sorting_options' );
 
function misha_remove_default_sorting_options( $options ){
 
	//unset( $options[ 'popularity' ] );
	unset( $options[ 'menu_order' ] );
	//unset( $options[ 'rating' ] );
	//unset( $options[ 'date' ] );
	//unset( $options[ 'price' ] );
	//unset( $options[ 'price-desc' ] );
 
	return $options;
 
}

// For billing email and phone - Make them not required
add_filter( 'woocommerce_billing_fields', 'filter_billing_fields', 20, 1 );
function filter_billing_fields( $billing_fields ) {
    // Only on checkout page
    if( ! is_checkout() ) return $billing_fields;

    $billing_fields['billing_phone']['required'] = false;
    $billing_fields['billing_state']['required'] = false;
    return $billing_fields;
}

add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields( $address_fields ) {
    $address_fields['state']['placeholder'] = 'State';
    
    return $address_fields;
}


if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_get_items_count' ) ) {
  function yith_wcwl_get_items_count() {
   ob_start();
   ?>
   <span class="yith-wcwl-items-count">
       <i class="yith-wcwl-icon fa fa-star-o">
     <?php echo esc_html( yith_wcwl_count_all_products() ); ?>
       </i>
   </span>
   <?php
   return ob_get_clean();
  }
  add_shortcode( 'yith_wcwl_items_count', 'yith_wcwl_get_items_count' );
 }
 
 if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_ajax_update_count' ) ) {
  function yith_wcwl_ajax_update_count() {
   wp_send_json( array(
       'count' => yith_wcwl_count_all_products()
   ) );
  }
  add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
  add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'yith_wcwl_ajax_update_count' );
 }
 
 if ( defined( 'YITH_WCWL' ) && ! function_exists( 'yith_wcwl_enqueue_custom_script' ) ) {
  function yith_wcwl_enqueue_custom_script() {
   wp_add_inline_script(
       'jquery-yith-wcwl',
       "
         jQuery( function( $ ) {
           $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
             $.get( yith_wcwl_l10n.ajax_url, {
               action: 'yith_wcwl_update_wishlist_count'
             }, function( data ) {
              $('.yith-wcwl-items-count').attr('data-content',data.count);
              //$('.yith-wcwl-items-count').html( data.count );
              $('.yith-wcwl-items-count').addClass('filled');
              $('.yith-wcwl-items-count').removeClass('not-filled');
             } );
           } );
         } );
       "
   );
  }
  add_action( 'wp_enqueue_scripts', 'yith_wcwl_enqueue_custom_script', 20 );
 }

 add_filter( 'woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1 );

 


function iconic_cart_count_fragments( $fragments ) {

    $fragments['div.header-cart-count'] = '<div class="header-cart-count">' . WC()->cart->get_cart_contents_count() . '</div>';
    return $fragments;
}


// if ( !function_exists( 'yith_wcqv_customization_trigger_quick_view_on_product_click' ) ) {
// 	add_action( 'wp_enqueue_scripts', 'yith_wcqv_customization_trigger_quick_view_on_product_click', 99 );
// 	function yith_wcqv_customization_trigger_quick_view_on_product_click() {

// 		$js = "( function( $ ){
//       $('.btn-plus, .btn-minus').on('click', function(e) {
//         const isNegative = $(e.target).closest('.btn-minus').is('.btn-minus');
//         const input = $(e.target).closest('.quantity').find('input');
//         if (input.is('input')) {
//           input[0][isNegative ? 'stepDown' : 'stepUp']()
//         }
//         $('button').attr('aria-disabled', 'false').prop('disabled', false);
//         console.log('Document click');
//         });
//         } )( jQuery );";
// 		wp_add_inline_script( 'yith-wcqv-frontend', $js );
// 	}
// }

function register_buhala_widgets(){
	register_sidebar( array(
		'name' => "Share icons",
		'id' => 'share-icons',
		'description' => 'Single services share icons',
		'before_title' => '<h2>',
		'after_title' => '</h2>'
	) );
}
add_action( 'widgets_init', 'register_buhala_widgets' );

add_filter( 'woocommerce_loop_add_to_cart_link', 'filter_loop_add_to_cart_link', 10, 2 );
function filter_loop_add_to_cart_link( $button, $product ) {
    if( !$product->is_in_stock() ){
        $button_text = __("Out of stock", "woocommerce");
        $button_link = $product->get_permalink();
        $button = '<a class="button out-of-stock-add-to-cart" href="' . $button_link . '">' . $button_text . '</a>';
    }
    return $button;
}

// Show 3 products per row
add_filter( 'woocommerce_upsell_display_args', 'buhala_woocommerce_upsell_display_args' );	
function buhala_woocommerce_upsell_display_args( $args ) {	
  	  $args['columns']        = 3;
  	   return $args;	
  	}