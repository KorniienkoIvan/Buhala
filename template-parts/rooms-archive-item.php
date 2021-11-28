<a href="<?php the_permalink();?>" class="col-md-4 col-12 service-card rooms-card">
    <div class="service-card-image">
        <?php the_post_thumbnail(  ) ?>
    </div>
    <div class="service-card-body">
        <div class="service-card-title">
            <?php the_title() ?>
        </div>
        <div class="service-card-desc">
            <?php add_filter( 'excerpt_length', function(){ return 10; } ); ?>
            <?php the_excerpt() ?>
        </div>
    </div>
</a>