<?php 
/*
Template Name: Contact Page
*/
?>
<?php get_header() ?>
    <section class="contact-page">
        <div class="contact-container__wrapper">
            <div class="contact-container container fade-up appear delay-1">
                <div class="about-page">
                    <div class="title"><?php the_title() ?></div>
                    <div class="separator">
                        <span class="left-separator-side"></span>
                        <span class="separator-line"></span>
                        <span class="right-separator-side"></span>
                    </div>
                    <p><?php the_field('contact_description') ?></p>
                </div>
                <div class="contact-form">
                    <?php echo do_shortcode('[contact-form-7 id="55" title="Contact form 1"]') ?>
                </div>
            </div>
        </div>
        <div class="our-team">
            <div class="container fade-up appear delay-1">
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
                                <li><a href="<?php echo $link['url'] ?>"><img src="<?php the_sub_field('social_icon') ?>" alt=""></a></li>
                                <?php endwhile; ?>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="bottom-banner container-fluid"><img src="<?php the_field('footer_img') ?>" alt="" class="fade-up appear delay-1">
        </div>
    </section>
<?php get_footer() ?>