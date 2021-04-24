<?php
get_header();
?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <?php get_template_part('sna/template-parts/main-banner'); ?>
        <?php
    }
}
else {
    echo "abc";
}
?>
        <main>
            <section class="ss-news pb-0">
                <div class="container">
                    <div class="row news-cover list-items">
                        <?php
                        wp_reset_query();
                        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $defaults = array(
                            'posts_per_page' => 6,
                            'paged' =>$paged,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'post_type' => 'photo',
                            'post_status' => 'publish'
                        );

                        $the_query = new WP_Query($defaults);
                        if ($the_query->have_posts()) {
                            while ($the_query->have_posts()) {
                                $the_query->the_post();
                                $id = get_the_ID();
                                $post = get_post( $id );
                                ?>
                                <div class="col-md-4 col-sm-6 item"><a href="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" data-fancybox="images-<?php echo $id;?>" data-caption="<?php the_title() ?> ">
                                        <div class="img"><img class="lazyload blur-up" data-src="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" alt="<?php the_title() ?> "></div>
                                        <div class="list-img-dsnone">
                                            <?php
                                            $matches = [];
                                            // get the post object

                                            // we need just the content
                                            $content = $post->post_content;
                                            // we need a expression to match things
                                            $regex = '/src="([^"]*)"/';
                                            // we want all matches
                                            preg_match_all( $regex, $content, $matches );
                                            // reversing the matches array
                                            $matches = array_reverse($matches);
                                            foreach ($matches[0] as $match){

                                                ?>
                                                <a href="<?php echo $match;?>" data-fancybox="images-<?php echo $id;?>" data-thumb="<?php echo $match;?>"></a>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                        <div class="content">
                                            <h3 class="lcl lcl-2"><?php the_title() ?> </h3>
                                        </div></a></div>

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
            $range = 1;

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
            <div class="Library-photo-page" id="js-page-verify" hidden></div>
        </main>
        <?php get_template_part('sna/template-parts/book-an-appointment'); ?>
        <?php get_template_part('sna/template-parts/discover'); ?>
        <?php get_template_part('sna/template-parts/fast_links'); ?>

<?php get_footer(); ?>