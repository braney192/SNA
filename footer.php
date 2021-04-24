<?php
$config = get_post(getConfigId());
$logo = get_field( "logo_2", $config->ID );
$address = get_field( "address", $config->ID );
$phone = get_field( "phone", $config->ID );
$home_phone = get_field( "home_phone", $config->ID );
$email = get_field( "email", $config->ID );
$about = get_field( "about", $config->ID );
$copyright = get_field( "copyright", $config->ID );

$facebook_url = get_field( "facebook_url", $config->ID );
$youtube_url = get_field( "youtube_url", $config->ID );
$linkedin_url = get_field( "linkedin_url", $config->ID );
$map = get_field( "map_footer_embed", $config->ID );

?>
<footer>
    <div class="container">
        <div class="row big-row">
            <div class="col-lg-3 big-col">
                <div class="logo-footer"><img class="lazyload blur-up" data-src="<?php echo isset($logo)?$logo:get_template_directory_uri().'/assets/logo-footer.png';?>" alt="LOGO-FOOTER"></div>
                <div class="list-contact-footer">
                    <ul>
                        <li>
                            <div class="icon"><img class="svg" src="<?php echo get_template_directory_uri()?>/assets/icons/address-white.svg" alt="address"></div>
                            <div class="text"><?php echo $address;?></div>
                        </li>
                        <li>
                            <div class="icon"><img class="svg" src="<?php echo get_template_directory_uri()?>/assets/icons/phone-white.svg" alt="phone"></div>
                            <div class="text"><?php echo $phone;?></div>
                        </li>
                        <li>
                            <div class="icon"><img class="svg" src="<?php echo get_template_directory_uri()?>/assets/icons/mobile-phone-white.svg" alt="mobile-phone"></div>
                            <div class="text"><?php echo $home_phone;?></div>
                        </li>
                        <li>
                            <div class="icon"><img class="svg" src="<?php echo get_template_directory_uri()?>/assets/icons/mail-white.svg" alt="mail"></div>
                            <div class="text"><?php echo $email;?></div>
                        </li>
                    </ul>
                </div>
                <div class="info-footer">
                    <?php echo $about;?>
                </div>
            </div>
            <div class="col-lg-9 big-col">
                <?php get_template_part( 'sna/template-parts/bottom-menu' ); ?>
                <div class="map-footer">
                    <?php echo $map;?>
                </div>
                <div class="copy-right">
                    <div class="text"><?php echo $copyright;?></div>
                    <div class="footer-social">
                        <ul>
                            <li><a href="<?php echo $facebook_url;?>"><img class="svg" src="<?php echo get_template_directory_uri()?>/assets/icons/facebook-white.svg" alt="FACEBOOK"></a></li>
                            <li><a href="<?php echo $youtube_url;?>"><img class="svg" src="<?php echo get_template_directory_uri()?>/assets/icons/youtube-white.svg" alt="YOUTUBE"></a></li>
                            <li><a href="<?php echo $linkedin_url;?>"><img class="svg" src="<?php echo get_template_directory_uri()?>/assets/icons/likedin-white.svg" alt="LIKEDIN"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div id="overlay"></div>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?&amp;libraries=places&amp;key=AIzaSyAq6ag0zUMblc-Wk5Z5S8KWkHpT3ak1LzI"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/core.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/main.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri()?>/js/YoutubeController.min.js"></script>
<?php wp_footer(); ?>

 <!-- Load Facebook SDK for JavaScript -->
  <div id="fb-root"></div>
  <script>
    window.fbAsyncInit = function() {
      FB.init({
        xfbml            : true,
        version          : 'v3.3'
      });
    };

    (function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

  <!-- Your customer chat code -->
  <div class="fb-customerchat"
       attribution=setup_tool
       page_id="124686627580394"
       theme_color="#ad112a">
  </div>
</body>
</html>