<?php
global $workings;

if (count((array)$workings)) {
    ?>
    <div class="working__items">
        <div class="row">
            <?php
            foreach ($workings as $working) {
                ?>
                <div class="col-md-3"><a class="working__item" href="<?php echo $working['link'];?>">
                        <div class="working__text"><?php echo $working['position']; ?></div>
                        <div class="working__title lcl lcl-3"><?php echo $working['title']; ?></div>
                        <div class="working__text"><?php echo $working['description']; ?></div>
                        <div class="box-link wow fadeInRight" data-wow-duration="1.3s" data-wow-delay=".3s">
                            <h5>Find out more</h5>
                        </div>
                    </a></div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
}
?>

