<?php 
/*
Template Name: Search
*/
?>
<?php get_header() ?>
<div class="container">

<? if ( have_posts() ) : ?>
<h1><? printf( __( 'Search result: %s'), '<span>' . get_search_query() . '</span>' ); ?></h1>
<div class="findme row">          
<? while ( have_posts() ) : the_post(); ?>
<a href="<?php the_permalink();?>" class="col-lg-4 col-md-6 col-12 service-card">
    <div class="service-card-image">
        <?php the_post_thumbnail(  ) ?>
    </div>
    <div class="service-card-body">
        <div class="service-card-title">
            <?php the_title() ?>
        </div>
        <div class="service-card-desc">
            <?php the_excerpt() ?>
        </div>
    </div>
</a>
<? endwhile; ?>
</div>
<? else : ?>

<h1><?php printf( _e('Nothing was found', 'GSA'))?></h1>
<p><?php printf( _e('Nothing was found, try again.', 'buhala'))?></p>
<br />
<? get_search_form(); ?>
<? endif; ?>

</div>
<?php get_footer() ?>
