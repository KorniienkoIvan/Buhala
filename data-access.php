<?php 
/*
Template Name: Data Access
*/
?>
<?php get_header() ?>
<section class="data-access">
    <div class="container fade-up appear delay-1">
        <div class="row">
            <div class="col-12">
                <div class="text">
                    <?php the_field('text_1') ?>
                </div>
                <div class="col-lg-6 col-12 pl-0">
                    <?php echo do_shortcode('[contact-form-7 id="832" title="DATA ACCESS REQUESTS"]') ?>
                </div>
                <!-- <div class="text"> 
                    <?php the_field('text_2') ?>
                </div>
                <div class="col-lg-6 col-12 pl-0">
                    <?php echo do_shortcode('[contact-form-7 id="833" title="OPT OUT"]') ?>
                </div>
                
                <div class="text">
                    <?php the_field('text_3') ?>
                </div> -->
            </div>
        </div>
    </div>
</section>
<?php get_footer() ?>