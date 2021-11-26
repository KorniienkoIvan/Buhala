<?php get_header();?>

<div class="container services">
<?php get_template_part('template-parts/services-submenu');?>
	
	<div class="row service-cards-wrapper fade-up appear delay-1">
		<div class="col-12"><h1 class="service-title"><?php the_archive_title();?></h1></div>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/archive-item' ); ?>
			
		<?php endwhile; else : ?>
			<p><?php printf( _e('Nothing was found.', 'buhala'))?></p>
			
		<?php endif; ?>

		</div>
	</div>
<?php get_footer();?>