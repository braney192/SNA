<?php get_header(); ?>

<div class="main-banner__slider--video">
    <div>
        <div class="item-banner-fullscreen video">
            <video autoplay playsinline muted loop>
                <source src="<?php echo get_field("banner", $post->ID); ?>">
            </video>
        </div>
    </div>
</div>

<main>
    <section class="class-of-2020 title--common">
        <div class="container">
            <div class="triangle-down-blue"></div>
            <div class="class-of-2020__wrapper">
                <?php echo get_field("main_message", $post->ID); ?>
            </div>
        </div>
    </section>
    <section class="graduates-student discover title--common">
        <div class="container">
            <div class="triangle-down-blue"></div>
            <div class="graduates-student__wrapper">
                <div class="title">
                    <h2>
                        Meet some of our <span>Graduates</span></h2>
                </div>
                <div class="team__wrapper">
                    <div class="team__row row">
                        <?php
                            $students = [];
                            for ($i = 1; $i <= 100; $i++) {
                                $students[] = get_field("student_" . $i, $post->ID);
                            }

                            foreach ($students as $student) {
                                if (isset($student['name']) && $student['name']) {
                                    ?>
                                        <div class="team__item fancybox__getTeam col-4" data-fancybox data-src="" data-modal="true" href="javascript:;">
                                            <div class="item__img ov-h"><img src="<?php echo $student['image']; ?>" alt="team"></div>
                                            <div class="item__content">
                                                <h3><?php echo $student['name']; ?></h3>
                                                <h4><?php echo $student['office']; ?></h4>
                                                <h5>
                                                    <?php echo $student['school']; ?><?php echo $student['School']; ?>
												</h5>
                                            </div>
											<div class="sub-title--item">
												<p class="lcl lcl-2"><?php echo $student['description']; ?></p>
											</div>
                                        </div>
                                        <div class="team__popup" id="id1" style="display:none">
                                            <div class="popup__body">
                                                <div class="popBody__nameImg">
                                                    <div class="img"><img src="<?php echo $student['image']; ?>" alt="team"></div>
                                                    <div class="txt">
                                                        <h3><?php echo $student['name']; ?></h3>
                                                        <h4><?php echo $student['office']; ?></h4>
                                                    </div>
                                                </div>
                                                <div class="popBody__info">
                                                    <?php echo $student['content']; ?></p>
                                                </div>
                                            </div>
                                            <div class="popup__close" data-fancybox-close></div>
                                        </div>
                                    <?php
                                }
                            }
                            ?>
                    </div>
                </div>
                <div class="sub-title">
                    <?php echo get_field("middle_message", $post->ID); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="Acceptances title--common">
        <div class="triangle-down-blue"></div>
        <?php echo get_field("map", $post->ID); ?>
    </section>
    <div class="2020-page" id="js-page-verify" hidden></div>
</main>
<?php get_template_part('sna/template-parts/discover'); ?>
<?php get_template_part('sna/template-parts/fast_links'); ?>
<?php get_footer(); ?>