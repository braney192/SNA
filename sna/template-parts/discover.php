<?php
the_post();
$discovers = [];
for ($i = 1; $i <= 10; $i++) {
    $item = get_field("discover_" . $i, $post->ID);
    if(isset($item['title']) && $item['title']!=='') {
        $discovers[] = $item;
    }
}

if (count($discovers)) {
    ?>
    <section class="discover">
        <div class="container">
            <div class="wrap-rotate-text">
                <h2>Discover</h2>
            </div>
            <div class="row">


                <?php
                foreach ($discovers as $key => $discover) {
                    if (isset($discover['title']) && $discover['title']) {
                        if ($key % 2 === 0) {
                            ?>
                            <div class="col-sm-6">
                                <div class="item wow fadeInDown" data-wow-duration="1.3s" data-wow-delay=".3s"><a
                                            href="<?php echo $discover['link']; ?>">
                                        <div class="title-discover lcl lcl-1 top"><?php echo $discover['title']; ?></div>
                                        <div class="img ov-h"><img class="lazyload blur-up ofcv"
                                                                   data-src="<?php echo $discover['image']; ?>"
                                                                   alt="<?php echo $discover['title']; ?>"></div>
                                    </a></div>
                            </div>
                            <?php
                        } else { ?>
                            <div class="col-sm-6">
                                <div class="item wow fadeInUp" data-wow-duration="1.3s" data-wow-delay=".3s"><a
                                            href="<?php echo $discover['link']; ?>">
                                        <div class="img ov-h"><img class="lazyload blur-up ofcv"
                                                                   data-src="<?php echo $discover['image']; ?>"
                                                                   alt="<?php echo $discover['title']; ?>"></div>
                                        <div class="title-discover lcl lcl-1 bottom"><?php echo $discover['title']; ?></div>
                                    </a></div>
                            </div>
                            <?php
                        }
                        ?>
                        <?php

                    }
                }
                ?>


            </div>
        </div>
    </section>
    <?php
}
?>