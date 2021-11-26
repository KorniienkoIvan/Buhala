<?php 
/*
Template Name: About
*/
?>
<?php get_header() ?>
<section class="container-fluid about-us-section">
        <div class="row fade-up appear delay-1">
          <div class="col-md-6 col-12 about-us-text-section">
            <div class="title"><?php the_title() ?></div>
            <div class="about-page-text">
              <?php the_field('about_page_text') ?>
            </div>
          </div>
          <div class="col-md-6 col-12 gallery-wrapper">
            <div class="row gallery">
              <div class="col-12 col-lg-5 gallery-item">
                <img src="<?php the_field('about_page_image_one') ?>" alt="" height="356px">
              </div>
              <div class="col-12 col-lg-7 gallery-item">
                <img src="<?php the_field('about_page_image_two') ?>" alt="" height="356px">
              </div>
              <div class="col-12 col-lg-12 gallery-item">
                <img src="<?php the_field('about_page_image_three') ?>" alt="">
              </div>
            </div>
          </div>
        </div>
    </section>
    <?php get_footer() ?>