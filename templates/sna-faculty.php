<?php

/**
 * Template Name: SNA Faculty page
 *
 */

get_header();

$curr_id = get_the_ID();
$thumbnail_url = get_the_post_thumbnail_url($curr_id, 'full');
?>

<div class="main-banner">
  <div class="block-img ov-h"><img class="lazyload blur-up ofcv" data-src="<?php echo $thumbnail_url; ?>" src="<?php echo $thumbnail_url; ?>" alt="BANNER"></div>
  <div class="title-page container">
    <h1 class="wow slideInLeft" data-wow-duration="1.3s" data-wow-delay=".3s"><?php echo get_the_title(); ?></h1>
  </div>
</div>

<?php
$args = array(
  'post_type' => 'page',
  'posts_per_page' => -1,
  'orderby'   => 'menu_order',
  'order' => 'ASC',
  'meta_query' => array(
    array(
      'key' => '_wp_page_template',
      'value' => 'templates/sna-faculty.php'
    ),
  )
);
$the_pages = new WP_Query($args);
$meta_values = get_post(get_the_ID());
$menu_order = $meta_values->menu_order;

?>
<main>
  <section class="ib-program bg-section" position-top-right>
    <div class="container">
      <div class="nav-menu">
        <ul>
          <?php
          if ($the_pages->have_posts()) {
            while ($the_pages->have_posts()) {
              $the_pages->the_post();
              $post_id = $post->ID;
              $post_order = $post->menu_order;
          ?>
              <li class="<?= $curr_id === $post_id ? 'active' : '' ?>"><a href="<?php the_permalink(); ?>"><?php $post_order === 1 ? esc_html_e( 'Overview', 'thefour-lite' ) : the_title(); ?></a></li>
          <?php
            }
          } else {
            // echo 'empty';
          }

          wp_reset_postdata();
          ?>
        </ul>
      </div>
      <?php

      if ($menu_order !== 1) {
        get_template_part('sna/pages/faculty-tabs');
      }
      ?>
    </div>
  </section>
  
  <?php

if ($menu_order === 1) {
  get_template_part('sna/pages/faculty');
}
?>
</main>
<?php get_template_part('sna/template-parts/book-an-appointment'); ?>
<?php get_template_part('sna/template-parts/discover'); ?>
<?php get_template_part('sna/template-parts/fast_links'); ?>
<?php

get_footer(); ?>