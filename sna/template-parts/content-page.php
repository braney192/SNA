<div class="main-banner">
    <div class="block-img ov-h"><img class="lazyload blur-up ofcv" data-src="<?php echo get_template_directory_uri()?>/assets/images/banner/who-are-we.jpg" alt="BANNER"></div>
    <div class="title-page container">
        <h1 class="wow slideInLeft" data-wow-duration="1.3s" data-wow-delay=".3s">Welcome to SNA</h1>
    </div>
</div>
<main>
    <?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
    <?php endwhile;?>
    <?php endif;?>
</main>
<div class="booking-fixed"><a class="iframeBooking" data-fancybox data-src="https://www.picktime.com/2eafeb9d-872d-4200-9641-6ceff405a6e2">
        <figure><img class="lazyload blur-up" data-src="<?php echo get_template_directory_uri()?>/assets/booking-fixed.png" alt="Book an appointment with International Schools of North America"></figure></a></div>
<section class="fast-link">
    <div class="container">
        <div class="inner">
            <div class="row no-gutters">
                <div class="col-sm-6"><a href="#">
                        <div class="box-link wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay=".3s">
                            <h4>VISIT SNA</h4>
                            <h5>Visit us</h5>
                        </div></a></div>
                <div class="col-sm-6"><a href="#">
                        <div class="box-link wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".3s">
                            <h4>CONTACT SNA</h4>
                            <h5>Contact us</h5>
                        </div></a></div>
            </div>
        </div>
    </div>
</section>
