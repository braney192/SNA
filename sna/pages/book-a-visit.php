<?php
get_header();
$config = get_post(getConfigId());
$phone = get_field("phone", $config->ID);
$home_phone = get_field("home_phone", $config->ID);
$facebook_url = get_field( "facebook_url", $config->ID );
$youtube_url = get_field( "youtube_url", $config->ID );
$linkedin_url = get_field( "linkedin_url", $config->ID );
$email = get_field("email", $config->ID);
$copyright = get_field("copyright", $config->ID);
?>
<?php
if (have_posts()) {
    while (have_posts()) {
        the_post();

        ?>
        <main>
            <section class="book-a-visit full-screen">
                <div class="content-book-visit container">
                    <div class="row">
                        <div class="col-7 col-BAV-form">
                            <div class="box-BAV-form">
                                <?php
                                the_content();
                                ?>

                            </div>
                        </div>
                        <div class="col-5 col-BAV-contact"><img class="logo-squad"
                                                                src="<?php echo get_template_directory_uri() ?>/assets/images/book-a-visit/logo-38.png"
                                                                alt="">
                            <div class="box-BAV-contact">
                                <h4>CONTACT US</h4>
                                <div class="text-contact">
                                    <div class="item-BAV">
                                        <div class="icon"><img class="svg"
                                                               src="<?php echo get_template_directory_uri() ?>/assets/icons/mobile-phone-white.svg"
                                                               alt="phone"></div>
                                        <span><?php echo $phone;?></span>
                                    </div>
                                    <div class="item-BAV">
                                        <div class="icon"><img class="svg"
                                                               src="<?php echo get_template_directory_uri() ?>/assets/icons/mail-white.svg"
                                                               alt="phone"></div>
                                        <span><?php echo $email;?></span>
                                    </div>
                                </div>
                                <div class="social-contact"><a class="item-social"
                                                               href="<?php echo $facebook_url;?>"
                                                               target="_blank"><img class="svg"
                                                                                    src="<?php echo get_template_directory_uri() ?>/assets/icons/facebook-white.svg"
                                                                                    alt="facbook-sna"></a><a
                                            class="item-social" href="<?php echo $youtube_url;?>"
                                            target="_blank"><img class="svg"
                                                                 src="<?php echo get_template_directory_uri() ?>/assets/icons/youtube-white.svg"
                                                                 alt="youtube-sna"></a><a class="item-social"
                                                                                          href="<?php echo $linkedin_url;?>"
                                                                                          target="_blank"><img
                                                class="svg"
                                                src="<?php echo get_template_directory_uri() ?>/assets/icons/likedin-white.svg"
                                                alt="linkedin-sna"></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="copy-right-full-screen">
                    <div class="container">

                        <p><?php echo $copyright; ?></p>
                    </div>
                </div>
            </section>
            <div class="book-a-visit-page" id="js-page-verify" hidden></div>
        </main>
        <?php
    }
}
?>
<div id="overlay"></div>
<script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?&amp;libraries=places&amp;key=AIzaSyAq6ag0zUMblc-Wk5Z5S8KWkHpT3ak1LzI"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/core.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/main.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>