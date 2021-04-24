<?php
$currentLang = pll_current_language();

$config = get_post(getConfigId());
$logo = get_field( "logo_1", $config->ID );
$logoIb = get_field( "logo_ib", $config->ID );
$logoIbLink = get_field( "logo_ib_link", $config->ID );
$translations = pll_the_languages(array('raw' => 1));

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <title><?php is_front_page() ? the_title() : wp_title(''); ?></title>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri()?>/favicon.ico"
        type="image/vnd.microsoft.icon" />
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/core.min.css?v=1.1.2">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/main.min.css?v=1.1.2">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri()?>/css/custom.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-158936820-1"></script>
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-158936820-1');
    </script>
    <meta name="facebook-domain-verification" content="xfuxt90gxfqot0qv3lkiqcm3fb7vc6" />
</head>

<body <?php body_class(); ?>>
    <script id="__bs_script__">
    //<![CDATA[
    document.write("<script async src='/browser-sync/browser-sync-client.js?v=2.26.7'><\/script>".replace("HOST",
        location.hostname));
    //]]>
    </script>
    <div id="loading-container">
        <div class="loading-wrapper">
            <div id="loading-logo"><img
                    src="<?php echo isset($logo)?$logo:get_template_directory_uri().'/assets/logo.png'?>"></div>
            <div class="progress">
                <div id="progress-bar"></div>
            </div>
            <div class="progress-status">Loading: <span id="progress-percentage">0</span>%</div>
        </div>
    </div>
    <header>
        <div class="container">
            <div class="block-logo">
                <div class="logo">
                    <a href="<?php echo home_url();?>"><img class="lazyload blur-up"
                            data-src="<?php echo isset($logo)?$logo:get_template_directory_uri().'/assets/logo.png'?>"
                            alt="logo"></a>
                    <a href="<?php echo $logoIbLink;?>"><img class="lazyload blur-up"
                            data-src="<?php echo isset($logoIb)?$logoIb:get_template_directory_uri().'/assets/log-ib.png'?>"
                            alt="logo"></a>
                </div>
            </div>

            <div class="toggle-menu-moblie mobile"><span class="menu-btn"><span></span></span></div>
            <div class="row no-gutters ai-c">
                <div class="top-header col-12">
                    <div class="t_header--list-contact">
                        <?php


                    $phone = get_field( "phone", $config->ID );
                    $home_phone = get_field( "home_phone", $config->ID );
                    $email = get_field( "email", $config->ID );
                    $facebook_url = get_field( "facebook_url", $config->ID );
                    $youtube_url = get_field( "youtube_url", $config->ID );
                    $linkedin_url = get_field( "linkedin_url", $config->ID );

                    ?>
                        <ul>
                            <li><a href="tel:<?php echo $phone;?>">
                                    <div class="icon"><img class="svg"
                                            src="<?php echo get_template_directory_uri()?>/assets/icons/mobile-phone.svg"
                                            alt="PHONE-NUMBER"></div>
                                    <div class="text"><?php echo $phone;?></div>
                                </a></li>
                            <li><a href="tel:<?php echo $home_phone;?>">
                                    <div class="icon"><img class="svg"
                                            src="<?php echo get_template_directory_uri()?>/assets/icons/phone.svg"
                                            alt="PHONE-NUMBER"></div>
                                    <div class="text"><?php echo $home_phone;?></div>
                                </a></li>
                        </ul>
                    </div>
                    <div class="t_header--list-social">
                        <ul>
                            <li><a href="mailto:<?php echo $email;?>">
                                    <div class="icon"><img class="svg"
                                            src="<?php echo get_template_directory_uri()?>/assets/icons/mail.svg"
                                            alt="EMAIL"></div>
                                </a></li>
                            <li><a href="<?php echo $facebook_url;?>">
                                    <div class="icon"><img class="svg"
                                            src="<?php echo get_template_directory_uri()?>/assets/icons/facebook.svg"
                                            alt="FACEBOOK"></div>
                                </a></li>
                            <li><a href="<?php echo $youtube_url;?>">
                                    <div class="icon"><img class="svg"
                                            src="<?php echo get_template_directory_uri()?>/assets/icons/youtube.svg"
                                            alt="YOUTUBE"></div>
                                </a></li>
                            <li><a href="<?php echo $linkedin_url;?>">
                                    <div class="icon"><img class="svg"
                                            src="<?php echo get_template_directory_uri()?>/assets/icons/linkedin.svg"
                                            alt="LINKEDIN"></div>
                                </a></li>
                        </ul>
                    </div>
                    <?php get_template_part( 'sna/template-parts/quick-links-menu' ); ?>

                    <div class="t_header--search">
                        <div class="icon" id="search-sna"><img class="svg"
                                src="<?php echo get_template_directory_uri()?>/assets/icons/search.svg" alt="SEARCH">
                        </div>
                    </div>
                    <div class="t_header--login"><a href="<?php echo home_url();?>">
                            <div class="icon"><img class="svg"
                                    data-src="<?php echo get_template_directory_uri()?>/assets/icons/login.svg"
                                    alt="LOGIN"></div>
                        </a></div>
                    <div class="t_header--language">
                        <ul>
                            <li class="<?php echo $currentLang==='vi'?'active':'';?>"><a
                                    href="<?php echo $translations['vi']['url']; ?>">VN</a></li>
                            <li class="<?php echo $currentLang==='en'?'active':'';?>"><a
                                    href="<?php echo $translations['en']['url']; ?>">ENG</a></li>
                            <li class="<?php echo $currentLang==='ko'?'active':'';?>"><a
                                    href="<?php echo $translations['ko']['url']; ?>">KR</a></li>
                        </ul>
                    </div>
                </div>
                <div class="b_header-input-search col-12">
                    <div class="input-search">
                        <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                            <input type="text" name="s" id="search" placeholder="Search . . .">
                            <div class="button-search">
                                <input type="submit" value="Search" id="btn-search">
                            </div>
                        </form>
                    </div><span class="close-search"></span>
                </div>
                <div class="bottom-header col-12">
                    <?php get_template_part( 'sna/template-parts/main-menu' ); ?>
                </div>
            </div>
        </div>
    </header>