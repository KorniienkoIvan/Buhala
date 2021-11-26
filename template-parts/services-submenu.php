<?php 
    $args = array(
        'taxonomy' => 'service_cat',
        'orderby' => 'name',
        'order'   => 'ASC',
        'parent' => 0
    );

    $cats = get_terms($args);
    ?>
    <div class="shop-submenu__row row ml-0 service_sub_menu fade-up appear delay-1">
        <div class="col" role="navigation">
            <div class="shop-submenu">
                <ul class="menu">

                <?php 
                if( !is_post_type_archive( 'services' ) ){ ?>
                    <li class="back-button menu-item">
                        <?php $back_button = get_field('back_button', 'option');?>
                        <a href="<?php echo $back_button['url']; ?>" class=""><?php printf( _e('Back', 'buhala'))?></a>
                    </li>
                <?php } ?>
                <?php foreach($cats as $cat){ 
                    $termID = $cat->term_id; // get_queried_object()->term_id; - динамическое получение ID текущей рубрики
                    $taxonomyName = "service_cat";
                    $termchildren = get_term_children( $termID, $taxonomyName );
                    if ( $termchildren) : ?>
                        <li class="menu-item menu-item-has-child"><a href="<?php echo get_term_link($cat->term_id, 'service_cat') ?>"><?php echo $cat->name ?></a>
                            <ul class="sub-menu">
                                            
                            <?php 
                            foreach ($termchildren as $child) {
                                $term = get_term_by( 'id', $child, $taxonomyName );
                                    echo '<li><a href="' . get_term_link( $term->term_id, $term->taxonomy ) . '">' . $term->name . '</a></li>';
                            }

                    echo '</ul></li>';

                    else :?>
                        <li class="menu-item"><a href="<?php echo get_term_link($cat->term_id, 'service_cat') ?>"><?php echo $cat->name ?></a></li>
                    <?php endif; ?>    
                                    
                    <?php wp_reset_postdata(); ?>
                                
                <?php } ?>
            </ul>
            <?php 
            $file = get_field('spa_menu_pdf', 'option');
            if ($file) : 
            $url = wp_get_attachment_url( $file ); ?>    
            <ul class="menu services-pdf">
                <li class="menu-item" style="margin-right: 0;"><a href="<?php echo esc_html($url); ?>" target="_blank"><?php printf( _e('Download Spa Menu', 'buhala'))?></a></li>
            </ul> 
            <?php endif; ?>
        </div>
    </div>
</div>