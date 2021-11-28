<?php 

get_header() ?>
<section class="video_section">
    <div class="container">
        <div class="video_block">
            <div class="page_title">
                <?php echo get_field('page_title', 'option') ?>
            </div>
            <?php 
                $video_type = get_field('page_video_type', 'option');
                $video_link = get_field('page_video_link', 'option');
                $video_file = get_field('page_video_file', 'option');
            ?>
            <?php if($video_type == "File"): ?>
                <video id="player" playsinline controls data-poster="/path/to/poster.jpg">
                    <source src="<?php echo $video_file['url']; ?>"/>
                </video>
            <?php elseif($video_type == "Youtube Link"): ?>
                <div class="plyr__video-embed" id="player">
                    <iframe
                        src="<?php echo $video_link['url']; ?>"
                        allowfullscreen
                        allowtransparency
                        allow="autoplay"
                    ></iframe>
                </div>
            <?php endif; ?>
            <div class="scroll_button_wrapper">
                <a href="#services" class="scroll_button">
                </a>
            </div>
        </div>
    </div>
</section>
<section class="services" id="services">
    <div class="container">
    
    <?php 
    $args = array(
        'taxonomy' => 'rooms_cat',
        'orderby' => 'name',
        'order'   => 'ASC',
        'parent' => 0,
        'hide_empty' => false, 
    );

    $cats = get_terms($args);
    ?>
    
    <?php
    $row_number = 1;
   foreach($cats as $cat) {?>
        
          <div class="row service-cards-wrapper fade-up appear delay-1" <?php if($row_number == "1"){echo 'id="first_row"';} ?>>
            <div class="col-12 service-title">
                    <?php $name = $cat->name; ?>
                    <?php echo $name; ?>
                </div>
                <div class="row room-cards-slider">
        <?php 
        $terms = $cat->term_id;
        $query = array(
            'posts_per_page' => -1,
            'max_num_pages' => -1,
            'post_type'   => 'rooms',
            'tax_query' => array(
                array(
                    'taxonomy' => 'rooms_cat',
                    'field'    => 'id',
                    'terms'    => $terms
                )
            )
        );
        // execute the main query
        $i = 0;
        $wp_query = new WP_Query($query);
        // go main query
        if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post(); 

        get_template_part( 'template-parts/rooms-archive-item' );?>

        <?php
            $row_number++;
            endwhile;
	
				endif; wp_reset_postdata();?>
        </div>
        </div>
    
<?php
   }
?>
    </div>
</section>
<script>
    import Plyr from 'plyr';

    const player = new Plyr('#player');

</script>
<?php get_footer() ?>