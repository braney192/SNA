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
            <?php the_content();
            the_post();
            ?>
        </main>
        <?php get_template_part('sna/template-parts/book-an-appointment'); ?>
        <?php get_template_part('sna/template-parts/discover'); ?>
        <?php get_template_part('sna/template-parts/fast_links'); ?>
        <?php
    }
}
?>
<?php get_footer(); ?>
