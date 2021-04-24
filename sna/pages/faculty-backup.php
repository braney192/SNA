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
            <section class="core_slider-style--1">
                <div class="container">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            $slides = [];
                            for ($i = 1; $i <= 20; $i++) {
                                $slides[] = get_field("slide_" . $i, $post->ID);
                            }

                            foreach ($slides as $slide) {
                                if (isset($slide['image']) && $slide['image']) {
                                    ?>
                                    <div class="swiper-slide">
                                        <div class="img ov-h"><img class="ofcv" src="<?php echo $slide['image']; ?>"
                                                                   alt="ITEM-SLIDER"></div>
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
            </section>
            <section class="faculty">
                <div class="container">
                    <div class="page-desc">
                        <?php the_content() ?>
                    </div>
                </div>
            </section>
            <div class="faculty-page" id="js-page-verify" hidden></div>
        </main>
        <?php get_template_part('sna/template-parts/book-an-appointment'); ?>
        <?php get_template_part('sna/template-parts/discover'); ?>
        <?php get_template_part('sna/template-parts/fast_links'); ?>
        <?php
    }
}
?>
<?php get_footer(); ?>
