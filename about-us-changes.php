<?php 
/*
Template Name: About Us New
*/
?>
<?php get_header() ?>
<section class="about-us-section about-us-new-section">
    <div class="container-fluid fade-up appear delay-1 speed-1">
        <?php if(get_field('image_gallery_position') == "Right"){
                    $image_pos = "right";
                }
                elseif(get_field('image_gallery_position') == "Left"){
                    $image_pos = "left";
                } ?>
        <div class="row<?php echo " " . $image_pos ?>">
            <div class="col-md-6 col-12 about-us-text-section">
                <div class="title"><?php the_title() ?></div>
                <div class="about-page-text">
                    <?php the_field('about_page_text') ?>
                </div>
            </div>
            <div class="col-md-6 col-12 gallery-wrapper">
                <div class="row gallery">
                    <?php $i = "1" ?>
                    <?php if(get_field('image_count') == "3"): ?>
                    <?php $images = get_field('about_us_new_image_gallery_mt'); ?>
                    <?php if($images): ?>
                    <?php foreach($images as $image): ?>
                    <?php 
                                if($i == "1"){
                                    $classes =  " col-12 col-lg-5";
                                }
                                elseif($i == "2"){
                                    $classes = " col-12 col-lg-7";
                                }
                                elseif($i == "3"){
                                    $classes = " col-12 col-lg-12";
                                }
                                ?>
                    <div class="gallery-item<?php echo " gallery-item-" . $i . " " . $classes ?>">
                        <img src="<?php echo $image['url'] ?>" alt="" height="356px">

                    </div>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                    <?php if(get_field('image_count') == "1"): ?>
                    <?php $images = get_field('about_us_new_image_gallery_mo'); ?>
                    <?php if($images): ?>
                    <?php foreach($images as $image): ?>
                    <div class="col-12 col-lg-12 gallery-item<?php echo " gallery-item-" . $i ?>">
                        <img src="<?php echo $image['url'] ?>" alt="" height="356px">
                    </div>
                    <?php $i++; ?>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="contact-page">
    <div class="our-team container fade-up appear delay-1 speed-1">
        <div class="title"><?php the_field('team_member_secton_title') ?></div>
        <?php if(have_rows('team-member')): ?>
        <div class="row">
            <?php while(have_rows('team-member')): the_row(); ?>
            <div class="col-lg-4 col-md-6 col-12 worker">
                <div class="worker-image"><img src="<?php the_sub_field('team-member__img') ?>" alt=""></div>
                <div class="worker-body">
                    <div class="worker-name"><?php the_sub_field('team-member__name') ?></div>
                    <div class="worker-text"><?php the_sub_field('team-member__description') ?></div>
                    <?php if(have_rows('&__socials')): ?>
                    <ul class="worker-media mr-0">
                        <?php while(have_rows('&__socials')): the_row(); ?>
                        <?php $link = get_sub_field('social_link') ?>
                        <li><a href="<?php echo $link['url'] ?>"><img src="<?php the_sub_field('social_icon') ?>"
                                    alt=""></a></li>
                        <?php endwhile; ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="contact-container container fade-up appear delay-1 speed-1">
        <div class="about-page">
            <div class="title"><?php the_field('form_title') ?></div>
            <div class="separator">
                <span class="left-separator-side"></span>
                <span class="separator-line"></span>
                <span class="right-separator-side"></span>
            </div>
            <p><?php the_field('contact_description') ?></p>
        </div>
        <div class="contact-form">
            <?php the_field('contact_form') ?>
        </div>
    </div>

    <div class="bottom-banner container-fluid"><img src="<?php the_field('footer_img') ?>" alt="">
    </div>
</section>
<?php get_footer() ?>