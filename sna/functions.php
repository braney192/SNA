<?php
add_action( 'after_setup_theme', 'register_sna_quick_links_menu' );
function register_sna_quick_links_menu() {
    register_nav_menu( 'sna_quick_links', __( 'Quick Links Menu', 'thefour-lite' ) );
}


add_action( 'after_setup_theme', 'register_sna_bottom_menu' );
function register_sna_bottom_menu() {
    register_nav_menu( 'sna_bottom_menu', __( 'Bottom Menu', 'thefour-lite' ) );
}

add_action( 'after_setup_theme', 'register_sna_news_menu' );
function register_sna_news_menu() {
    register_nav_menu( 'sna_news_menu', __( 'News Menu', 'thefour-lite' ) );
}

function my_theme_load_theme_textdomain() {
    load_theme_textdomain( 'thefour-lite', get_template_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'my_theme_load_theme_textdomain' );


add_shortcode( 'sna-slider', 'sna_slider_shortcode' );
function sna_slider_shortcode( $atts, $content = '')
{
    global $sliders, $hideTitle, $hideDescription;
    $category = 0;
    $sliders = [];
    if (isset($atts['category'])) {
        $category = $atts['category'];
    } elseif (isset($atts['categoryId'])) {
        $category = $atts['categoryId'];
    } elseif (isset($atts['categoryId'])) {
        $category = $atts['categoryId'];
    }
    $hideTitle = isset($atts['hidetitle'])?1:0;
    $hideDescription = isset($atts['hidedescription'])?1:0;

    $defaults = array(
        'posts_per_page' => 100,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'sna_slider',
        'post_status' => 'publish'
    );

    if($category){
        $defaults['category__in'] = $category;
    }

    $id= get_the_ID();
    $the_query = new WP_Query($defaults);
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $sliders[] = [
                'image'=> get_the_post_thumbnail_url(null, 'full'),
                'content'=> get_the_content(),
                'title'=> get_the_title(),
            ];
        }
    }
    get_post($id);
    the_post();

    ob_start();
    get_template_part("sna/template-parts/slider-shortcode");
    $content = ob_get_contents();
    ob_end_clean();

    return "{$content}";
}


add_shortcode( 'sna-simple-slider', 'sna_simple_slider_shortcode' );
function sna_simple_slider_shortcode( $atts, $content = '')
{
    global $sliders, $hideTitle, $hideDescription;
    $category = 0;
    $hideTitle = 1;
    $hideDescription = 1;
    $sliders = [];
    if (isset($atts['category'])) {
        $category = $atts['category'];
    } elseif (isset($atts['categoryId'])) {
        $category = $atts['categoryId'];
    } elseif (isset($atts['categoryId'])) {
        $category = $atts['categoryId'];
    }

    $defaults = array(
        'posts_per_page' => 25,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'sna_slider',
        'post_status' => 'publish'
    );

    if($category){
        $defaults['category__in'] = $category;
    }

    $id= get_the_ID();
    $the_query = new WP_Query($defaults);
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $sliders[] = [
                'image'=> get_the_post_thumbnail_url(null, 'full'),
                'content'=> get_the_content(),
                'title'=> get_the_title(),
            ];
        }
    }
    get_post($id);
    the_post();

    ob_start();
    get_template_part("sna/template-parts/slider-shortcode");
    $content = ob_get_contents();
    ob_end_clean();

    return "{$content}";
}


add_shortcode( 'sna-quote-slider', 'sna_quote_slider_shortcode' );
function sna_quote_slider_shortcode( $atts, $content = '')
{
    global $sliders;
    $category = 0;
    $sliders = [];
    if (isset($atts['category'])) {
        $category = $atts['category'];
    } elseif (isset($atts['categoryId'])) {
        $category = $atts['categoryId'];
    } elseif (isset($atts['categoryId'])) {
        $category = $atts['categoryId'];
    }

    $defaults = array(
        'posts_per_page' => 25,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'sna_quote_slider',
        'post_status' => 'publish'
    );

    if($category){
        $defaults['category__in'] = $category;
    }

    $id= get_the_ID();
    $the_query = new WP_Query($defaults);
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $sliders[] = [
                'image'=> get_the_post_thumbnail_url(null, 'full'),
                'content'=> get_the_content(),
                'title'=> get_the_title(),
            ];
        }
    }
    get_post($id);
    the_post();

    ob_start();
    get_template_part("sna/template-parts/quote-slider-shortcode");
    $content = ob_get_contents();
    ob_end_clean();

    return "{$content}";
}


// Duplicate post content from original across translation
function sna_content_copy( $content ) {
    if ( isset( $_GET['from_post'] ) ) {
        $my_post = get_post( $_GET['from_post'] );
        if ( $my_post )
            return $my_post->post_content;
    }
    return $content;
}
add_filter( 'default_content', 'sna_content_copy' );

// Duplicate post title from original across translation
function sna_editor_title( $title ) {
    if ( isset( $_GET['from_post'] ) ) {
        $my_post = get_post( $_GET['from_post'] );
        if ( $my_post )
            return $my_post->post_title;
    }
    return $title;
}
add_filter( 'default_title', 'sna_editor_title' );


function oxo_pagination( $range = 5 )
{
    // $paged - number of the current page
    global $paged, $wp_query;
    // How much pages do we have?
    if (!$max_page)
        $max_page = $wp_query->max_num_pages;
    // We need the pagination only if there is more than 1 page
    if ($max_page > 1)
        if (!$paged) $paged = 1;

    echo "\n" . '<ul class="Paginate">' . "\n";
    // On the first page, don't put the First page link
    if ($paged != 1)
        echo '<li class="page-num page-num-first"><a href=' . get_pagenum_link(1) . '>' . __('First', PAGE_LANG) . ' </a></li>';

    // To the previous page
    echo '<li class="page-num page-num-prev">';
    previous_posts_link(' &laquo; '); // «
    echo '</li>';

    // We need the sliding effect only if there are more pages than is the sliding range
    if ($max_page > $range) {
        // When closer to the beginning
        if ($paged < $range) {
            for ($i = 1; $i <= ($range + 1); $i++) {
                $class = $i == $paged ? 'current' : '';
                echo '<li class="page-num"><a class="paged-num-link ' . $class . '" href="' . get_pagenum_link($i) . '"> ' . $i . ' </a></li>';
            }
            // When closer to the end
        }elseif ($paged >= ($max_page - ceil($range / 2))) {
            for ($i = $max_page - $range; $i <= $max_page; $i++) {
                $class = $i == $paged ? 'current' : '';
                echo '<li class="page-num"><a class="paged-num-link ' . $class . '" href="' . get_pagenum_link($i) . '"> ' . $i . ' </a></li>';
            }
        }
        // Somewhere in the middle
    elseif
        ($paged >= $range && $paged < ($max_page - ceil($range / 2))) {
        for ($i = ($paged - ceil($range / 2)); $i <= ($paged + ceil($range / 2)); $i++) {
            $class = $i == $paged ? 'current' : '';
            echo '<li class="page-num"><a class="paged-num-link ' . $class . '" href="' . get_pagenum_link($i) . '"> ' . $i . ' </a></li>';
        }
    // Less pages than the range, no sliding effect needed
   } else {
            for ($i = 1; $i <= $max_page; $i++) {
                $class = $i == $paged ? 'current' : '';
                echo '<li class="page-num"><a class="paged-num-link ' . $class . '" href="' . get_pagenum_link($i) . '"> ' . $i . ' </a></li>';
            }
        }

    // Next page
    echo '<li class="page-num page-num-next">';
    next_posts_link(' &raquo; '); // »
    echo '</li>';

    // On the last page, don't put the Last page link
    if ($paged != $max_page)
        echo '<li class="page-num page-num-last"><a href=' . get_pagenum_link($max_page) . '> ' . __('Last', PAGE_LANG) . '</a></li>';

    echo "\n" . '</ul>' . "\n";
}
}


function getConfigId(){
    $lang = pll_current_language();
    switch ($lang){
        case 'en':
            return SnaConfig::SNA_CONFIG_PAGE_ID;
        case 'vi':
            return SnaConfig::SNA_CONFIG_PAGE_ID_VI;
        case 'ko':
            return SnaConfig::SNA_CONFIG_PAGE_ID_KO;

        default:
           return SnaConfig::SNA_CONFIG_PAGE_ID;
    }
}


add_shortcode( 'sna-working', 'sna_working_shortcode' );
function sna_working_shortcode( $atts, $content = '')
{
    global $workings;
    $lang = pll_current_language();
    $workings = [];
    $defaults = array(
        'posts_per_page' => 100,
        'orderby' => 'date',
        'order' => 'DESC',
        'post_type' => 'work_at_sna',
        'lang'=>$lang,
        'post_status' => 'publish'
    );

    $id= get_the_ID();
    $the_query = new WP_Query($defaults);
    if ($the_query->have_posts()) {
        while ($the_query->have_posts()) {
            $the_query->the_post();
            $workings[] = [
                'link'=> get_the_permalink(),
                'description'=> get_the_excerpt(),
                'title'=> get_the_title(),
                'position'=> get_field('position',get_the_ID()),

            ];
        }
    }
    get_post($id);
    the_post();

    ob_start();
    get_template_part("sna/template-parts/working-shortcode");
    $content = ob_get_contents();
    ob_end_clean();

    return "{$content}";
}

function getNewsPageLink($lang=''){
    if(!$lang) {
        $lang = pll_current_language();
    }
    $id = 133;
  switch ($lang){
      case 'vi':
          $id = 1307;
          break;
      case 'ko':
          $id = 1309;
          break;

  }

  return get_permalink($id);

}