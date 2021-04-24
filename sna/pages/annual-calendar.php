<?php
get_header();

?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();
        $pdf = get_field('pdf');
        ?>
        <?php get_template_part('sna/template-parts/main-banner'); ?>
        <main>
            <?php the_content() ?>
            <div class="cal1"></div>
            <div class="container calendar-home">
                <?php
                if($pdf) {
                    ?>
                    <div class="link-data-calendar">
                        <h5 class="title-calendar">Calendar</h5>
                        <div class="images"><a
                                    href="<?php echo $pdf;?>"><img
                                        class="blur-up lazyload" data-src="<?php echo get_template_directory_uri()?>/assets/images/tuition-fees/pdf.jpg"
                                        alt="pdf-calendar"></a></div>
                    </div>
                    <?php
                }
                    ?>
                <div class="list-event">
                    <div id="monthNow"> </div>
                    <div class="data-calendar"></div>

                </div>
            </div>
            <div class="annual-calendar-page" id="js-page-verify" hidden></div>
        </main>
        <?php get_template_part('sna/template-parts/book-an-appointment'); ?>
        <?php get_template_part('sna/template-parts/discover'); ?>
        <?php get_template_part('sna/template-parts/fast_links'); ?>
        <?php
    }
}
?>
<?php get_footer(); ?>
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/calendarController.min.js?v1.0.2"></script>

<script>
    eventArray=[
        <?php
        $defaults = array(
            'post_type' => 'annual_calendar',
            'post_status' => 'publish',
            'posts_per_page' => 1000,
            'orderby' => 'date',
            'order'   => 'ASC',
            'suppress_filters' => true,
        );

        $the_query = new WP_Query($defaults);
        if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
        $the_query->the_post();
        $date = get_field('date',get_the_ID());
        ?>
        {
        date: '<?php echo $date;?>',
        title: '<?php the_title();?>'
    },<?php }}?>];
</script>