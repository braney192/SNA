<?php
get_header();

?>

<section id="content" class="content">
    <?php
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            ?>
            <?php get_template_part('sna/template-parts/main-banner'); ?>
            <main>

                <?php
                the_content();
                ?>

            </main>
            <?php
        }
    }
    ?>
    <?php get_template_part('sna/template-parts/book-an-appointment'); ?>
    <?php get_template_part('sna/template-parts/fast_links'); ?>


</section>


<?php get_footer(); ?>