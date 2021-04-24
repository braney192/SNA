<div class="main-banner__slider">
    <div class="swiper-container">
        <div class="swiper-wrapper">

            <?php
            $banners = [];
            for ($i = 1; $i <= 20; $i++) {
                $banners[] = get_field("banner_" . $i, $post->ID);
            }
            $partner_title = get_field("partner_title", $post->ID);
            $partners = [];
            for ($p = 1; $p <= 20; $p++) {
            	$partners[] = get_field("partner_" . $p, $post->ID);
            }

            foreach ($banners as $banner) {
                if (isset($banner['video_url']) && $banner['video_url']) {
                    ?>
                    <div class="swiper-slide"><div>
                            <div class="item-banner-fullscreen video">
                                <video autoplay playsinline muted loop>
                                    <source src="<?php echo $banner['video_url'];?>">
                                </video>
                                <div class="btn-read-more container">
                                    <a href="<?php echo $banner['link']; ?>" class="btn wow slideInRight" data-wow-duration="1.3s" data-wow-delay=".3s"><?php echo __('FIND OUT MORE', 'thefour-lite'); ?></a>
                                </div>
                            </div></div></div>
                    <?php

                }elseif (isset($banner['image']) && $banner['image']) {
                    ?>
                    <div class="swiper-slide"><div >
                            <div class="item-banner-fullscreen img"><img class="ofcv" src="<?php echo $banner['image']; ?>" alt=""></div>
                            <div class="btn-read-more container">
                                <a href="<?php echo $banner['link']; ?>" class="btn wow slideInRight" data-wow-duration="1.3s" data-wow-delay=".3s"><?php echo __('FIND OUT MORE', 'thefour-lite'); ?></a>
                            </div></div></div>


                    <?php
                }
            }
            ?>

        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<main>
    <?php while (have_posts()) : the_post(); ?>
        <?php the_content(); ?>
    <?php endwhile;

    $pyp = get_field("pyp", $post->ID);
    $myp = get_field("myp", $post->ID);
    $dp = get_field("dp", $post->ID);
    $accreditationsLogos = [];
    for ($l = 1; $l <= 10; $l++) {
        $accreditationsLogo = get_field("logo_" . $l, $post->ID);
        if ($accreditationsLogo) {
            $accreditationsLogos[] = $accreditationsLogo;
        }
    }
    $school_highlights_content = get_field("school_highlights_content", $post->ID);

    $ib_program_title = get_field("ib_program_title", $post->ID);
    $ib_program_title = $ib_program_title?$ib_program_title:'IB Program';

    $accreditations_and_authorizations_title = get_field("accreditations_and_authorizations_title", $post->ID);
    $accreditations_and_authorizations_title = $accreditations_and_authorizations_title?$accreditations_and_authorizations_title:'Accreditations and Authorizations';

    $school_highlights_title = get_field("school_highlights_title", $post->ID);
    $school_highlights_title = $school_highlights_title?$school_highlights_title:'School Highlights';

    ?>
    <section class="index-1">
        <div class="container">
            <div class="block-title--main" data-title="<?php echo $ib_program_title;?>">
                <h2 class="lcl lcl-1 wow fadeInDown" data-wow-duration="1.3s" data-wow-delay=".3s"><?php echo $ib_program_title;?></h2>
            </div>
            <div class="row list-item-index-1">
                <div class="col-md-4 col-sm-6 item wow fadeIn" data-wow-duration="1.3s" data-wow-delay=".3s"><a class="block-content--style_1" href="<?php echo $pyp['link']; ?>">
                        <div class="img ov-h"><img class="ofcv lazyload blur-up" data-src="<?php echo $pyp['image']; ?>" alt="ITEM-INDEX-1"></div>
                        <div class="content">
                            <div class="title lcl lcl-1"><?php echo $pyp['title']; ?></div>
                            <div class="desc lcl lcl-8"><?php echo $pyp['description']; ?></div>
                        </div></a></div>
                <div class="col-md-4 col-sm-6 item wow fadeIn" data-wow-duration="1.3s" data-wow-delay=".3s"><a class="block-content--style_1" href="<?php echo $myp['link']; ?>">
                        <div class="img ov-h"><img class="ofcv lazyload blur-up" data-src="<?php echo $myp['image']; ?>" alt="ITEM-INDEX-1"></div>
                        <div class="content">
                            <div class="title lcl lcl-1"><?php echo $myp['title']; ?></div>
                            <div class="desc lcl lcl-8"><?php echo $myp['description']; ?></div>
                        </div></a></div>
                <div class="col-md-4 col-sm-6 item wow fadeIn" data-wow-duration="1.3s" data-wow-delay=".3s"><a class="block-content--style_1" href="<?php echo $dp['link']; ?>">
                        <div class="img ov-h"><img class="ofcv lazyload blur-up" data-src="<?php echo $dp['image']; ?>" alt="ITEM-INDEX-1"></div>
                        <div class="content">
                            <div class="title lcl lcl-1"><?php echo $dp['title']; ?></div>
                            <div class="desc lcl lcl-8"><?php echo $dp['description']; ?></div>
                        </div></a></div>
            </div>
        </div>
    </section>
    <?php
    if (count((array)$accreditationsLogos)) {
        ?>

        <section class="index-2">
            <div class="container">
                <div class="block-title--main" data-title="<?php echo $accreditations_and_authorizations_title;?>">
                    <h2 class="lcl lcl-1 wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s"><?php echo $accreditations_and_authorizations_title;?></h2>
                </div>
                <div class="img-sticker">
                    <?php
                    foreach ($accreditationsLogos as $accreditationsLogo) {
                        ?>
                        <div class="img-sr"><img class="lazyload blur-up lcl lcl-1 wow fadeInDown"
                                                 data-wow-duration="1.3s"
                                                 data-wow-delay=".3s" data-src="<?php echo $accreditationsLogo ?>"
                                                 alt="LOGO" /></div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </section>
        <?php
    }
    ?>
    <section class="index-3">
        <div class="container">
            <div class="block-title--main" data-title="School Highlights">
                <h2 class="lcl lcl-1 wow fadeInDown" data-wow-duration="1.3s" data-wow-delay=".3s"><?php echo $school_highlights_title; ?></h2>
            </div>
            <?php
            echo $school_highlights_content;
            ?>

        </div>
    </section>
    <?php get_template_part('sna/template-parts/quote-slider'); ?>
    <section class="related news">
        <div class="container">
            <div class="related-news">
                <div class="block-title--main text-left" data-title="News &amp; Event">
                    <h2><?php echo __('News & Event', 'thefour-lite'); ?><a
                                href="<?php echo getNewsPageLink(); ?>"><span><?php echo esc_html__('Read more', 'thefour-lite'); ?></span></a>
                    </h2>
                </div>
            </div>
            <div class="features row list-items">
                <?php
                $defaults = array(
                    'post_count' => 3,
                    'posts_per_page' => 3,
                    'post__in' => get_option('sticky_posts'),
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
    <div class="index-page" id="js-page-verify" hidden></div>
</main>
<div class="booking-fixed"><a class="iframeBooking" data-fancybox data-type="iframe" data-src="https://www.picktime.com/2eafeb9d-872d-4200-9641-6ceff405a6e2" href="javascript:;"><figure><img class="lazyload blur-up" data-src="https://www.picktime.com/bookingPage/img/picktime-book-online-right.png" alt="Book an appointment with International Schools of North America"/></figure></a></div>
<?php get_template_part('sna/template-parts/fast_links'); ?>

<section class="partner-section">
    <div class="container">
    	<p><?php echo $partner_title;?></p>
        <div class="partner-section__wrapper">    
            <div class="swiper-container">
                <div class="swiper-wrapper"> 
                    <?php
                        foreach ($partners as $partner) {
                        	if (isset($partner['image']) && $partner['image']) {
                    ?>
                        <div class="swiper-slide">
                            <a href="<?php echo $partner['link'];?>" target="_blank"><div class="img"><img src="<?php echo $partner['image'];?>" alt=""></div></a>
                        </div>
                    <?php
                    	}
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>