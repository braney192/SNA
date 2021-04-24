<?php
get_header(); ?>

<section id="content" class="content">

	<?php if ( have_posts() ) :  the_post(); ?>

        <div class="main-banner">
            <div class="block-img ov-h"><img class="lazyload blur-up ofcv" data-src="<?php echo get_template_directory_uri()?>/assets/images/banner/who-are-we.jpg" alt="BANNER"></div>
            <div class="title-page container">
                <h1 class="wow slideInLeft" data-wow-duration="1.3s" data-wow-delay=".3s"><?php the_title()?></h1>
            </div>
        </div>
        <main>
                <?php while ( have_posts() ) : the_post(); ?>
                    <?php the_content(); ?>
                <?php endwhile;?>
        </main>
        <div class="booking-fixed"><a class="iframeBooking" data-fancybox data-src="https://www.picktime.com/2eafeb9d-872d-4200-9641-6ceff405a6e2">
                <figure><img class="lazyload blur-up" data-src="<?php echo get_template_directory_uri()?>/assets/booking-fixed.png" alt="Book an appointment with International Schools of North America"></figure></a></div>
        <?php get_template_part( 'sna/template-parts/fast_links' ); ?>


    <?php endif; ?>

</section>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
