<?php get_header();?>

<section class="services">
    <div class="container">
		<div class="row service-cards-wrapper fade-up appear delay-1">

			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 

				get_template_part( 'template-parts/archive-item' ); ?>

			<?php endwhile;
			else : ?>

			<div class="">
				
				<?php printf( _e('Sorry, nothing is here.', 'buhala'))?>
			</div>

			<?php endif; ?>

		</div>
	</div>
</section>

<?php get_footer();?>
