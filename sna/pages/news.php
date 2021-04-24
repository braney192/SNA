<?php
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
            <section class="news">
                <div class="container">
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
                            <div class="col-sm-6 item"><a href="<?php the_permalink() ?>">
                                    <div class="img ov-h"><img class="lazyload blur-up ofcv" data-src="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" alt=""></div>
                                    <div class="related-content">
                                        <h3 class="lcl lcl-2"><?php the_title() ?></h3>
                                        <p class="lcl lcl-4"><?php the_excerpt() ?></p><span class="icon-more"><?php echo __('Read more', 'thefour-lite'); ?></span>
                                    </div></a></div>
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
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $defaults = array(
                            'posts_per_page' => 3,
                            'paged' => $paged,
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
            <?php
            //global $wp_query;
            //$wp_query = $the_query;
            $max_page = intval( $the_query->max_num_pages );
            $range = 7;

            ?>
            <section class="Paginate">
                <ul>
                    <li class="pre">
                        <?php
                        get_next_posts_link()
                        ?>
                        <a href="<?php echo get_pagenum_link(1);?>"><img class="svg" src="<?php echo get_template_directory_uri()?>/assets/icons/double-pre.svg"></a>

                    </li>
                    <li class="last-pre"><a href="<?php previous_posts();?>"><img class="svg" src="<?php echo get_template_directory_uri()?>/assets/icons/pre.svg"></a></li>
                    <?php
                    if ( $max_page > $range ) {
                        // When closer to the beginning
                        if ($paged < $range) {
                            for ($i = 1; $i <= ($range + 1); $i++) {
                                $class = $i == $paged ? 'active' : '';
                                ?>
                                <li> <a class="<?php echo $class;?>" href="<?php echo get_pagenum_link($i);?>"><?php echo $i?></a></li>
                    <?php
                            }
                            // When closer to the end
                        } elseif ($paged >= ($max_page - ceil($range / 2))) {
                            for ($i = $max_page - $range; $i <= $max_page; $i++) {
                                $class = $i == $paged ? 'active' : '';
                                ?>
                                <li> <a class="<?php echo $class;?>" href="<?php echo get_pagenum_link($i);?>"><?php echo $i?></a></li>
                                <?php
                            }
                        } // Somewhere in the middle
                        elseif ($paged >= $range && $paged < ($max_page - ceil($range / 2))) {
                            for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil($range / 2)); $i++) {
                                $class = $i == $paged ? 'active' : '';
                                ?>
                                <li> <a class="<?php echo $class;?>" href="<?php echo get_pagenum_link($i);?>"><?php echo $i?></a></li>
                                <?php
                            }
                            // Less pages than the range, no sliding effect needed
                        } else {
                            for ($i = 1; $i <= $max_page; $i++) {
                                $class = $i == $paged ? 'active' : '';
                                ?>
                                <li> <a class="<?php echo $class;?>" href="<?php echo get_pagenum_link($i);?>"><?php echo $i?></a></li>
                                <?php
                            }
                        }
                    }
                    ?>

                    <li class="next"><a href="<?php next_posts( $max_page, true );?>"><img class="svg" src="<?php echo get_template_directory_uri()?>/assets/icons/next.svg"></a></li>
                    <li class="last-next"><a href="<?php echo get_pagenum_link($max_page);?>"><img class="svg" src="<?php echo get_template_directory_uri()?>/assets/icons/double-next.svg"></a></li>
                </ul>
            </section>


            <div class="news-event-page" id="js-page-verify" hidden></div>
        </main>
        <?php get_template_part('sna/template-parts/book-an-appointment'); ?>
        <?php get_template_part('sna/template-parts/discover'); ?>
        <?php get_template_part('sna/template-parts/fast_links'); ?>

<?php get_footer(); ?>