<?php
get_header();

?>
<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();
?>
    <?php get_template_part('sna/template-parts/main-banner'); ?>

    <main>
      <section class="school-leadership-team bg-section" position-top-right>
        <div class="container">
          <?php
          $defaults = array(
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_key' => 'order',
            'post_type' => 'leadership_team',
            'post_status' => 'publish'
          );

          $the_query = new WP_Query($defaults);
          if ($the_query->have_posts()) {
            while ($the_query->have_posts()) {
              $the_query->the_post();
          ?>
              <div class="item-school-leadership-team block-content--style_4 row no-gutters">
                <div class="img height-810px ov-h col-md-6 wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay=".3s"><img class="ofcv lazyload blur-up" data-src="<?php echo get_the_post_thumbnail_url(null, 'full'); ?>" alt=""></div>
                <div class="block-text height-810px col-md-6 wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay=".5s">
                  <div class="content">
                    <div class="info">
                      <div class="name"><?php the_title() ?></div>
                      <div class="country">
                        <?php echo get_field('country'); ?>
                      </div>
                      <div class="position">
                        <?php echo get_field('title'); ?>
                        <br>
                        <span style="
											font-size: 17px;
											color: #1c1c1c;
										">
                          <?php echo get_field('email'); ?>
                        </span>
                      </div>
                      <p class="ta-justify"><?php echo get_field('experience'); ?></p>
                      <?php if (get_field('short_description')) {
                      ?>
                        <p class="ta-justify"><?php echo get_field('short_description'); ?></p>
                      <?php
                      } ?>

                    </div>
                    <div class="desc">
                      <?php the_content(); ?>
                    </div>
                  </div>
                </div>
              </div>
          <?php
            }
          }
          the_post();
          ?>
        </div>
      </section>
      <div class="school-leadership-team-page" id="js-page-verify" hidden></div>
    </main>
    <?php get_template_part('sna/template-parts/book-an-appointment'); ?>
    <?php get_template_part('sna/template-parts/discover'); ?>
    <?php get_template_part('sna/template-parts/fast_links'); ?>
<?php
  }
}
?>
<?php get_footer(); ?>