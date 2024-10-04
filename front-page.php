<?php get_header(); ?>
<div class="dvu__front-page-wrapper">
	<?php while (have_posts()) : the_post(); ?>
		<?php
		$thumbnail = get_the_post_thumbnail_url(get_the_ID());

		if (has_post_thumbnail()) : ?>
			<div class="frontpage__banner hidden lg:block h-[480px] overflow-hidden">
				<div class="mx-auto">
					<img src="<?php echo $thumbnail; ?>" alt="<?php the_title() ?>" class="mx-auto" />
				</div>
			</div>
		<?php endif; ?>
		<!-- Slider main container -->
		<?php get_template_part('templates/partials/partial', 'slider', array("mode" => 'slide', 'class' => has_post_thumbnail() ? "lg:-mt-36" : "")); ?>

		<?php the_content() ?>
	<?php endwhile; ?>
	<div class="line lg:mb-6 lg:pb-6 mb-3 pb-3"></div>
	<?php echo do_shortcode('[dvutail_brand]') ?>
	<div class="line lg:mb-6 lg:pb-6 mb-3 pb-3"></div>
	<?php echo do_shortcode('[dvutail_product_featured]') ?>

	<div class="line lg:mb-6 lg:pb-6 mb-3 pb-3"></div>
	<?php echo do_shortcode('[dvutail_product_categories]') ?>
	<div class="line lg:mb-6 lg:pb-6 mb-3 pb-3"></div>
	<?php echo do_shortcode('[dvutail_product_bycat category="17"]') ?>

	<div class="line lg:mb-6 lg:pb-6 mb-3 pb-3"></div>
	<?php echo do_shortcode('[dvutail_product_bycat category="16"]') ?>
	<div class="line lg:mb-6 lg:pb-6 mb-3 pb-3"></div>
	<?php echo do_shortcode('[dvutail_product_bycat category="18"]') ?>
	<div class="line lg:mb-6 lg:pb-6 mb-3 pb-3"></div>
</div>

<?php get_footer() ?>