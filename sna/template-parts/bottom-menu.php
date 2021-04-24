<?php
$menu_name = 'sna_bottom_menu';

if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {

  $array_menu = wp_get_nav_menu_items(wp_get_nav_menu_object($locations[$menu_name])->term_id);
  $menu = array();
  foreach ($array_menu as $m) {
    if (empty($m->menu_item_parent)) {
      $menu[$m->ID] = array();
      $menu[$m->ID]['ID']      =   $m->ID;
      $menu[$m->ID]['title']       =   $m->title;
      $menu[$m->ID]['url']         =   $m->url;
      $menu[$m->ID]['children']    =   array();
    }
  }
  $submenu = array();
  foreach ($array_menu as $m) {
    if ($m->menu_item_parent) {
      $submenu[$m->ID] = array();
      $submenu[$m->ID]['ID']       =   $m->ID;
      $submenu[$m->ID]['title']    =   $m->title;
      $submenu[$m->ID]['url']  =   $m->url;
      $menu[$m->menu_item_parent]['children'][$m->ID] = $submenu[$m->ID];
    }
  }
?>
  <div class="row small-row list-menu-footer">
    <?php

    $i = 1;
    foreach ($menu as $menuItem) {
    ?>
      <div class="col-lg-3 small-col item-link-footer">

        <?php
        if (count($menuItem['children']) > 0) {
        ?>
          <h5><?php echo $menuItem['title']; ?></h5>
          <ul>
            <?php foreach ($menuItem['children'] as $child) {
            ?>
              <li><a href="<?php echo $child['url']; ?>"><?php echo $child['title']; ?></a></li>
            <?php
            } ?>
          </ul>
        <?php
        } else { ?>
          <h5><a href="<?php echo $menuItem['url']; ?>"><?php echo $menuItem['title']; ?></a></h5>
        <?php }
        ?>

      </div>
    <?php
      $i++;
    }
    ?>

  </div>
<?php

}


?>