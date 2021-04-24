<div class="quote__slider">
    <div class="container">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php
                $slides = [];
                for($i=1;$i<=10;$i++) {
                    $slides[] = get_field("slide_" . $i, $post->ID);
                }

                foreach ($slides as $slide){
                    if(isset($slide['image']) && $slide['image']) {
                        ?>
                        <div class="swiper-slide">
                            <div class="block-item">
                                <div class="img ov-h"><img class="ofcv" src="<?php echo $slide['image'];?>" alt="Quote-Slider"></div>
                                <div class="block-text">
                                    <div class="content">
                                        <div class="desc">
                                            <p><?php echo $slide['description'];?></p>
                                        </div>
                                        <div class="name"><?php echo $slide['name'];?><?php echo isset($slide['title']) && $slide['title']!=''?' - '.$slide['title']:'';?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</div>