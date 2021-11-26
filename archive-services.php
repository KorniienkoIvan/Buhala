<?php 

get_header() ?>
<section class="services">
    <div class="container">
    <?php get_template_part('template-parts/services-submenu');?>
    
    <?php 
    $args = array(
        'taxonomy' => 'service_cat',
        'orderby' => 'name',
        'order'   => 'ASC',
        'parent' => 0
    );

    $cats = get_terms($args);
    ?>
    
    <?php

   foreach($cats as $cat) {?>
        
          <div class="row service-cards-wrapper fade-up appear delay-1">
            <div class="col-12 service-title<?php if($cat->name == "MOM"){echo " mom";} ?>">
            <?php echo $cat->name ?>
            </div>
      <?php 
      $query = array(
        'posts_per_page' => 2,
        'max_num_pages' => 3,
        'post_type'   => 'services',
        'tax_query' => array(
            array(
                'taxonomy' => 'service_cat',
                'field'    => 'id',
                'terms'    => $cat->term_id
            )
        )
    );
    // execute the main query
    $i = 0;
    $wp_query = new WP_Query($query);
    // go main query
    if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); 

    get_template_part( 'template-parts/archive-item' );
        endwhile;
	
				endif; wp_reset_postdata();?>
       
     
        <div class="show-more_button">
                <?php
                $term_link = get_term_link($cat->term_id, 'service_cat');
                echo '<a href="'. $term_link .'">SHOW ALL OFFERS</a>';
                ?>
            </div>
        </div>
<?php
   }
?>
    </div>
</section>

<?php get_footer() ?>