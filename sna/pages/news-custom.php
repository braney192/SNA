    <?php
    /* Template Name: Custom News Template */

    get_header();
    $category = (int)get_field('category');
    $id = get_the_ID();
    ?>
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            $id = get_the_ID();
    ?>
            <?php get_template_part('sna/template-parts/main-banner'); ?>
    <?php
        }
    }
    ?>
    <main>
        <section class="news news--page">
            <div class="container-custom">
                <div class="news--page__wrapper">
                    <div class="news--page__wrapper--right">
                        <h2><?php echo __('Features', 'thefour-lite'); ?></h2>

                        <?php
                        $defaults = array(
                            'post_count' => 2,
                            'posts_per_page' => 2,
                            'post__in' => get_option('sticky_posts'),
                            'ignore_sticky_posts' => 1,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_type' => 'post',
                            'post_status' => 'publish'
                        );

                        $the_query = new WP_Query($defaults);
                        if ($the_query->have_posts()) {

                        ?>
                            <div class="features row list-items">
                                <?php
                                while ($the_query->have_posts()) {
                                    $the_query->the_post();
                                ?>
                                    <div class="col-sm-6 item">
                                        <a href="<?php the_permalink() ?>">
                                            <div class="img ov-h"><img class="lazyload blur-up ofcv" data-src="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" alt="" /></div>
                                            <div class="related-content">
                                                <h3 class="lcl lcl-2"><?php the_title() ?></h3>
                                                <p class="lcl lcl-4"><?php the_excerpt() ?></p><span class="icon-more"><?php echo __('Read more', 'thefour-lite'); ?></span>
                                            </div>
                                        </a></div>
                                <?php
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>

                        <h2><?php echo __('ALL', 'thefour-lite'); ?></h2>
                        <div class="features row list-items">
                            <?php
                            wp_reset_query();
                            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                            $defaults = array(
                                'posts_per_page' => 8,
                                'paged' => $paged,
                                'ignore_sticky_posts' => 1,
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
                                    <div class="col-sm-6 item">
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="img ov-h"><img class="lazyload blur-up ofcv" data-src="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" alt="" /></div>
                                            <div class="related-content">
                                                <h3 class="lcl lcl-2"><?php the_title() ?></h3>
                                                <p class="lcl lcl-4"><?php the_excerpt() ?></p><span class="icon-more"><?php echo __('Read more', 'thefour-lite'); ?></span>
                                            </div>
                                        </a></div>
                            <?php
                                }
                            }
                            ?>

                        </div>
                        <?php
                        // Only paginate if we have more than one page
                        if ($the_query->max_num_pages > 1) {
                            $big = 999999999;
                            // Structure of "format" depends on whether we’re using pretty permalinks
                            $permalink_structure = '';
                            $format = empty($permalink_structure) ? '&page=%#%' : 'page/%#%/';
                            $pages = paginate_links(array(
                                'base' => str_replace($big, '%#%', get_pagenum_link($big)),
                                'format' => $format,
                                'current' => $paged,
                                'total' => $the_query->max_num_pages,
                                'mid_size' => 0,
                                'end_size' => 3,
                                'type' => 'array',
                                'prev_next'   => true,
                                'prev_text'   => __('◄'),
                                'next_text'   => __('►'),
                            ));
                            $pageLink = "<ul class='pagination'>";
                            foreach ($pages as $page) {
                                $pageNum = strip_tags($page);
                                $pagePrev = (int)$paged - 1;
                                $pageNext = (int)$paged + 1;
                                switch ($pageNum) {
                                    case "&hellip;":
                                        $pageLink .= "<li><a href='#'>" . $pageNum . "</a></li>";
                                        break;
                                    case "►":
                                        $pageLink .= "<li class='pagination-next'><a href='" . get_pagenum_link($pageNext) . "'></a></li>";
                                        break;
                                    case "◄":
                                        $pageLink .= "<li class='pagination-prev'><a href='" . get_pagenum_link($pagePrev) . "'></a></li>";
                                        break;
                                    default:
                                        $pageLink .= "<li class='" . (($pageNum == $paged) ? "active" : "") . "'><a href='" . get_pagenum_link($pageNum) . "' >" . $pageNum . "</a></li>";
                                        break;
                                }
                            }
                            $pageLink .= "</ul>";
                            echo $pageLink;
                        }
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