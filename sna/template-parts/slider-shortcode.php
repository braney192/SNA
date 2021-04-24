<?php
global $category, $sliders, $hideTitle, $hideDescription;

if (count((array)$sliders)) {
    ?>
    <section class="core_slider-style--1">
        <div class="container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($sliders as $slider) {
                        ?>
                        <div class="swiper-slide">
                            <div class="img ov-h"><img class="ofcv" src="<?php echo $slider['image']; ?>"
                                                       alt="ITEM-SLIDER"></div>
                            <div class="content">
                                <div class="block-title--main after-absolute" data-title="<?php echo !$hideTitle?$slider['title']:''; ?>">
                                    <?php
                                    if(!$hideTitle) {
                                        ?>
                                        <h2 class="lcl lcl-1 wow fadeInDown" data-wow-duration="1.3s"
                                            data-wow-delay=".3s"><?php echo $slider['title']; ?></h2>
                                        <?php
                                    }
                                        ?>
                                </div>
                        <?php
                        if(!$hideDescription) {
                            ?>
                                <p class="ta-justify"><?php echo !$hideDescription?$slider['content']:'' ?></p>
                            <?php
                        }
                        ?>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>
    <?php
}
?>