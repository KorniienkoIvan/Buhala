<footer class="footer">
	<?php 
		$icon = get_field('back_to_top_icon','option');
		if ($icon) : ?>
		<a href="#scroll-top" id="scroll-top" style="display: none;">
			<?php echo file_get_contents(esc_url(wp_get_original_image_path($icon['id'])));?>
		</a>
	<?php endif; ?>
		<div class="container">
			<div class="footer_blocks row">
				<div class="footer_block col-md-6 col-lg-3">
					<img class="footer_block_logo" src="<?php the_field('footer_logo', 'option') ?>">
					
				</div>
				<div class="footer_block karla_r6 col-md-6 col-lg-2">
					<div class="footer_block_title cyan_r6"><?php the_field('media_column_title', 'option') ?></div>
					<?php if(have_rows('media_column_social_icons', 'option')): ?>
					<div class="footer_block_socials">
						<?php while(have_rows('media_column_social_icons', 'option')): the_row(); ?>
						<?php $link = get_sub_field('media_column_link', 'option') ?>
						<a href="<?php echo $link['url'] ?>" class="footer_block_social">
							<img src="<?php the_sub_field('media_column_icon', 'option') ?>" alt="" class="footer_media_icons">
						</a>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
					<?php if(have_rows('media_column_links', 'option')): ?>
					<ul class="footer_block_nav">
					<?php while(have_rows('media_column_links', 'option')): the_row(); ?>
						<li class="footer_block_nav_li">
							<?php $link = get_sub_field('media_column_linked_content', 'option') ?>
							<a href="<?php echo $link['url'] ?>"><?php echo $link['title'] ?></a>
						</li>
						<?php endwhile; ?>
					</ul>
					<?php endif; ?>
					<?php echo do_shortcode('[wpml_language_selector_footer]');?>
				</div>
				<div class="footer_block karla_r6 col-md-6 col-lg-3">
					<div class="footer_block_title cyan_r6"><?php the_field('footer_contact_us_title', 'option') ?></div>
					<?php if(have_rows('footer_contacts', 'option')): ?>
					<div class="footer_block_contacts">
					<?php while(have_rows('footer_contacts', 'option')): the_row(); ?>
						<div class="footer_block_contact">
							<div class="footer_block_contact_img">
								<img src="<?php the_sub_field('footer_contacts_icon', 'option') ?>">
							</div>
							<?php $data = get_sub_field('data_type'); ?>
							<div class="footer_block_contact_info">
								<?php if(get_sub_field('data_type', 'option') == "Email"): ?>
									<a href="mailto:<?php the_sub_field('footer_contact_data', 'option') ?>"><?php the_sub_field('footer_contact_data', 'option') ?></a>
								<?php else: ?>
									<?php the_sub_field('footer_contact_data', 'option'); ?>
								<?php endif; ?>
								
							</div>
						</div>
						<?php endwhile; ?>
					</div>
					<?php endif; ?>
					<?php if(get_field('footer_contact_open_time', 'option')): ?>
					<div class="footer_block_time">
						<?php if(get_field('open_time_icon', 'option')): ?><div class="time_icon"><img src="<?php the_field('open_time_icon', 'option') ?>" alt=""> </div><?php endif; ?>
						<div class="time"><?php the_field('footer_contact_open_time', 'option') ?></div>
					</div>
					<?php endif; ?>
					
				</div>
				<div class="footer_block col-lg-3" style="padding: 0">
					<?php the_field('google_map', 'option');?>
				</div>
			</div>
		</div>
		<div class="footer_copytight col-12"><?php printf( _e('Buhala Spa', 'buhala'))?> <?php echo date('Y');?> - <?php printf( _e('All rights reserved - Made with ❤ by', 'buhala'))?> <a href="https://purpleplanet.com/" target="_blank">purpleplanet</a></div>
	
	</footer>
  <?php wp_footer(); ?>
	<script>
		const player = new Plyr('#player');
	</script>
  </body>
</html>