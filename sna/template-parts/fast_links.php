<?php
$config = get_post(getConfigId());
$fast_links = [];
for($i=1;$i<3;$i++) {
    $fast_links[] = get_field("fast_link_".$i, $config->ID);
}
?>
<section class="fast-link">
    <div class="container">
        <div class="inner">
            <div class="row no-gutters">
                <?php foreach ($fast_links as $fast_link){
                    ?>
                    <div class="col-sm-6"><a href="<?php echo $fast_link['link']?>">
                            <div class="box-link wow fadeInLeft" data-wow-duration="1.3s" data-wow-delay=".3s">
                                <h4><?php echo $fast_link['title']?></h4>
                                <h5><?php echo $fast_link['sub_title']?></h5>
                            </div></a></div>
                <?php
                }?>

            </div>
        </div>
    </div>
</section>