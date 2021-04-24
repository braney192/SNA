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
                <section class="news-detail bg-section" position-top-right>
                    <div class="container">
                        <div class="inner-news-detail">
                            <div class="img-news-detail"><img class="blur-up ls-is-cached lazyload" data-src="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" alt="news1"></div>
                            <div class="content-news-detail">
                                <h2 class="title-news-detail"><?php
                                    the_title();
                                    ?></h2>
                                <div class="date-news-detail"><span class="date">Date: <span><?php the_time('d-m-Y'); ?></span></span></div>
                                <div class="text-news-detail">
                                    <?php
                                    the_content();
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="related news">
                    <div class="container">
                        <div class="related-news">
                            <div class="block-title--main text-left" data-title="<?php echo __('News & Event', 'thefour-lite'); ?>">
                                <h2><?php echo __('News & Event', 'thefour-lite'); ?><a href="<?php echo getNewsPageLink(); ?>"><span><?php echo esc_html__('Read more', 'thefour-lite'); ?></span></a></h2>
                            </div>
                        </div>
                        <div class="features row list-items">
                            <?php
                            $id = get_the_ID();
                            wp_reset_query();
                            $defaults = array(
                                'posts_per_page' => 3,
                                'post__not_in' => array($id),
                                'orderby' => 'date',
                                'order' => 'DESC',
                                'post_type' => 'post',
                                'post_status' => 'publish'
                            );

                            $the_query = new WP_Query($defaults);
                            if ($the_query->have_posts()) {
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                    ?>
                                    <div class="col-lg-4 item"><a class="related-item" href="<?php the_permalink() ?>">
                                            <div class="img ov-h related-img"><img class="blur-up ls-is-cached lazyload"
                                                                                   data-src="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>"
                                                                                   alt="news all 1"></div>
                                            <div class="related-content">
                                                <h3 class="lcl lcl-2"><?php the_title() ?></h3>
                                                <div class="related-text lcl lcl-4"><?php the_excerpt() ?></div>
                                                <span class="icon-more"><?php echo __('Read more', 'thefour-lite'); ?></span>
                                            </div>
                                        </a></div>
                                    <?php
                                }

                            }
                            ?>


                        </div>
                    </div>
                </section>
                <div class="news-detail-page" id="js-page-verify" hidden></div>
            </main>
            <?php
        }
    }
    ?>
    <?php get_template_part('sna/template-parts/book-an-appointment'); ?>
    <?php get_template_part('sna/template-parts/fast_links'); ?>


</section>

<?php get_footer(); ?>
