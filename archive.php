<?php

get_header();
$category = (int)get_field('category');
$id = get_the_ID();
?>
<main>
	<section class="news news--page">
		<div class="container-custom">
			<div class="news--page__wrapper">
				<div class="news--page__wrapper--right">
					<?php
					if (have_posts()) :
					?>
						<div class="features row list-items">

							<?php
							// Start the Loop.
							while (have_posts()) :
								the_post();
							?>
								<div class="col-sm-6 item">
									<a href="<?php the_permalink() ?>">
										<div class="img ov-h"><img class="lazyload blur-up ofcv" data-src="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" alt="" /></div>
										<div class="related-content">
											<h3 class="lcl lcl-2"><?php the_title() ?></h3>
											<p class="lcl lcl-4"><?php the_excerpt() ?></p><span class="icon-more"><?php echo __('Read more', 'thefour-lite'); ?></span>
										</div>
									</a>
								</div>
							<?php
							endwhile; ?>
						</div>

					<?php
					else :

						get_template_part('template-parts/post/content', 'none');

					endif;
					?>
				</div>

				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	<div class="news-event-page" id="js-page-verify" hidden></div>
</main>
<?php get_template_part('sna/template-parts/book-an-appointment'); ?>
<?php get_template_part('sna/template-parts/discover'); ?>
<?php get_template_part('sna/template-parts/fast_links'); ?>

<?php get_footer(); ?>