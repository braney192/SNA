<?php
get_header();
$category = (int)get_field('category');
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
?>
        <main>
            <?php
            global  $sliders, $pdf;
            $pdf = get_field('pdf');
            $sliders = [];
            if($category) {


                $defaults = array(
                    'posts_per_page' => 100,
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'post_type' => 'sna_slider',
                    'post_status' => 'publish'
                );

                $defaults['category__in'] = $category;

                $id = get_the_ID();
                $the_query = new WP_Query($defaults);
                if ($the_query->have_posts()) {
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $sliders[] = [
                            'image' => get_the_post_thumbnail_url(null,'full')
                        ];
                    }
                }

                get_template_part("sna/template-parts/e-handbook-slider-shortcode");

                the_post();

            }
            ?>
        </main>
        <?php get_template_part('sna/template-parts/book-an-appointment'); ?>
        <?php get_template_part('sna/template-parts/discover'); ?>
        <?php get_template_part('sna/template-parts/fast_links'); ?>

<?php get_footer(); ?>
