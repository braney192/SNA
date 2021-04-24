<?php
global $sliders;

if (count((array)$sliders)) {
    ?>
    <div class="quote__slider">
        <div class="container">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($sliders as $slider) {
                        ?>
                        <div class="swiper-slide">
                            <div class="block-item">
                                <div class="img ov-h"><img class="ofcv" src="<?php echo $slider['image']; ?>"
                                                           alt="Quote-Slider"></div>
                                <div class="block-text">
                                    <div class="content">
                                        <div class="desc">
                                            <p><?php echo $slider['content']; ?></p>
                                        </div>
                                        <div class="name"><?php echo $slider['title']; ?></div>
                                    </div>
                                </div>
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
    </div>
    <?php
}
?>