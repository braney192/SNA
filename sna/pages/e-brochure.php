<?php
get_header();

?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <?php get_template_part('sna/template-parts/main-banner'); ?>
        <main>
            <section class="pdf__slider pb-0">
                <div class="container max-950px">
                    <div class="block__pdf-slider">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <?php
                                $slides = [];
                                for ($i = 1; $i <= 100; $i++) {
                                    $slides[] = get_field("slide_" . $i, $post->ID);
                                }
                                foreach ($slides as $slide) {
                                    if (isset($slide['image']) && $slide['image']) {
                                        ?>
                                        <div class="swiper-slide">
                                            <div class="img ov-h"><img class="ofcv" src="<?php echo $slide['image'];?>" alt=""></div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div class="link-download max-950px"><a href="<?php echo get_field('preview_pdf') ?>"><?php echo __('Preview PDF', 'thefour-lite');?></a></div>
                </div>
            </section>

            <section class="brochure">
                <div class="container max-950px">
                    <div class="pb-0" style="margin-bottom: 10px;">
                        <?php the_content() ?>
                    </div>
                </div>
            </section>
            <div class="brochure-page" id="js-page-verify" hidden></div>
        </main>
        <?php get_template_part('sna/template-parts/book-an-appointment'); ?>
        <?php get_template_part('sna/template-parts/discover'); ?>
        <?php get_template_part('sna/template-parts/fast_links'); ?>
        <?php
    }
}
?>
<?php get_footer(); ?>
