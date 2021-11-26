<?php get_header() ?>
<section class="product-page container-fluid">
        <div class="row about-product fade-up appear delay-1">
            <div class="col-md-6 col-11 product-gallery">
                <?php if(have_rows('service_images_gallery')):?>
                    <div class="row">
                        <?php $i = 1 ?>
                        <?php while(have_rows('service_images_gallery')): the_row(); ?>
                            <?php if($i == 1 or $i == 2){
                                $gallery_image_class = "col-lg-6 col-12";
                            }
                            elseif($i == 3){
                                $gallery_image_class = "col-lg-8 col-12";
                            }
                            elseif($i == 4){
                                $gallery_image_class = "col-lg-4 col-12";
                            } ?>
                            <div class="<?php echo $gallery_image_class ?> product-gallery-item product-gallery-item-<?php echo $i ?>"><img src="<?php the_sub_field('image') ?>" alt=""></div>    
                            <?php $i++; ?>
                        <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="col-md-6 col-12 product-details">
                <div class="back-button">
                    <?php $back_button = get_field('back_button', 'option') ?>
                    <a href="<?php echo $back_button['url'] ?>" class="history-back"><?php echo $back_button['title'] ?></a>
                </div>
                <div class="product-title"><?php the_title() ?></div>
                <?php if(have_rows('service_details')): ?>
                <div class="product-short-description">
                    <ul class="product-details-list">
                        <?php while(have_rows('service_details')): the_row(); ?>
                        <li class="list-item"><?php the_sub_field('service_detail') ?></li>
                        <?php endwhile; ?>
                    </ul>
                </div>
                <?php endif; ?>
                <?php 
                add_filter( 'excerpt_length', function(){
                    return 10;
                } );
                ?>
                <div class="product-description"><?php the_content(); ?></div>
                <?php

                $bookUrl = get_field('book_url');
                if(!$bookUrl) : $bookUrl = "https://buhalaspa.simplybook.it/"; endif; ?>

                <a href="<?php echo $bookUrl; ?>" class="button-wrapper"><div class="button">Book now!</div></a>
                <?php if(have_rows('service_social_icons', 'option')): ?>
                    <div class="media-icons">
                        <!-- <ul>
                            <?php while(have_rows('service_social_icons', 'option')): the_row(); ?>
                            <li><img src="<?php the_sub_field('service_social_icon') ?>" alt=""></li>
                            <?php endwhile; ?>
                        </ul> -->
                        <?php dynamic_sidebar( 'share-icons' );?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="container other-products fade-up appear delay-1">
            <div class="title"> <?php printf( _e('See our top choices this week', 'buhala'))?></div>
           
            <?php
    
            $args = array(
                    'post_type' => 'services',
                    'posts_per_page' => 3,
                    'category'     => get_the_category(),
                );
                $query = new WP_Query( $args );

            ?> 
            <div class="row">
                <?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>   

                    <a class="col-lg-4 col-md-6 col-12 other-product-card" href="<?php the_permalink(  ) ?>">
                        <div class="card-image"><?php the_post_thumbnail() ?></div>
                        <div class="card-body">
                            <div class="card-title"><?php the_title() ?></div>
                            <div class="card-text"><?php the_excerpt() ?></div>
                        </div>
                    </a>
                            
                <?php endwhile; endif; wp_reset_postdata(); ?>
            </div>
        </div>
        <?php if(have_rows('service-page_reviews_repeater')): ?>
            <section class="reviews">
                <div class="container fade-up appear delay-1">
                    <div class="reviews_title cyan_r3"><?php the_field('service-page_reviews_section_title') ?></div>
                    
                        <div class="reviews_slider">
                            <?php while(have_rows('service-page_reviews_repeater')): the_row(); ?>
                                <div class="reviews_slider_li">
                                    <div class="reviews_slider_li_title karla_r4"><?php the_sub_field('homepage_review_title') ?></div>
                                    <div class="reviews_slider_li_text karla_r5"><?php the_sub_field('homepage_review_text') ?></div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    
                </div>
            </section>
        <?php endif; ?>
    </section>
<?php get_footer() ?>