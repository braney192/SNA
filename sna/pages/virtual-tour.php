<?php
get_header();

?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        ?>
        <main>
            <?php the_content();?>
        </main>
        <?php
    }
}
?>
<div id="overlay"></div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?&amp;libraries=places&amp;key=AIzaSyAq6ag0zUMblc-Wk5Z5S8KWkHpT3ak1LzI"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/core.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/main.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>