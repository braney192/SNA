<?php
global $sliders, $pdf;

if (count((array)$sliders)) {
    ?>
    <section class="pdf__slider pb-0">
        <div class="container max-950px">
            <div class="block__pdf-slider">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <?php
                        foreach ($sliders as $slider) {
                            ?>
                            <div class="swiper-slide">
                                <div class="img ov-h"><img class="ofcv" src="<?php echo $slider['image']; ?>"
                                                           alt="ITEM-SLIDER"></div>

                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <?php
            if ($pdf) {
                ?>
                <div class="link-download max-950px"><a  href="<?php echo $pdf; ?>" target="_blank">Preview PDF</a></div>
                <?php
            }
            ?>

        </div>
    </section>
    <div class="e-handbook-page" id="js-page-verify" hidden></div>
    <?php
}
?>

