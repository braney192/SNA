<?php
get_header();

?>

<section id="content" class="content">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <main>
                <section class="working-detail bg-section" position-top-left>
                    <div class="container">
                        <div class="block-content">
                            <div class="working_dt_title__wrapper max-750px"><a class="working_dt__back" href="#" onclick="history.go(-1)">
                                    <div class="box-link wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".3s">
                                        <h5>Back</h5>
                                    </div></a>
                                <h1 class="working_dt__title"><?php
                                    the_title();
                                    ?></h1>
                                <div class="working_dt__date"><?php the_time('d-m-Y'); ?></div>
                            </div>
                            <div class="content">
                                <?php
                                the_content();
                                ?></div>
                        </div>
                        <div class="related-jobs">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <?php
                                    $id = get_the_ID();
                                    wp_reset_query();
                                    $defaults = array(
                                        'posts_per_page' => 3,
                                        'post__not_in' => array($id),
                                        'orderby' => 'date',
                                        'order' => 'DESC',
                                        'post_type' => 'work_at_sna',
                                        'post_status' => 'publish'
                                    );

                                    $the_query = new WP_Query($defaults);
                                    if ($the_query->have_posts()) {
                                        while ($the_query->have_posts()) {
                                            $the_query->the_post();
                                            ?>
                                            <div class="swiper-slide"><a class="item_related_job" href="<?php the_permalink() ?>">
                                                    <h3><?php the_title() ?></h3>
                                               <time><?php echo get_the_date( 'Y-m-d' ); ?></time></a></div>
                                            <?php
                                        }
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="working-detail-page" id="js-page-verify" hidden></div>
            </main>

            <?php
        }
    }
    ?>
    <?php get_template_part('sna/template-parts/book-an-appointment'); ?>
    <?php get_template_part('sna/template-parts/fast_links'); ?>


</section>

<?php get_footer(); ?>