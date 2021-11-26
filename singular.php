<?php get_header();?>

<div class="content-wrapper">
    <div class="container fade-up appear delay-1">
        <h1 class=""><?php the_title();?></h1>
        <div class="row">
            <div class="col-12">
                <?php the_content();?>
            </div>
        </div>
    </div>
</div>

<?php get_footer();?>