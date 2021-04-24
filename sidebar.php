<?php

/**
 * The sidebar containing the main sidebar
 */
?>

<div class="news--page__wrapper--left">
	<div class="catalog">
		<div class="title">
			<p>Categories</p>
		</div>
		<div class="content">
			<?php
			/*$categories = get_categories();
			if ($categories) {
				foreach ($categories as $category) {
					echo '<p class="lcl lcl-1"><a href="' . get_category_link($category->term_id) . '" >' . $category->name . '</a></p>';
				}
			}*/
			$menu_name = 'sna_news_menu';
			if ( ( $locations = get_nav_menu_locations() ) && isset( $locations[ $menu_name ] ) ) {
				$array_menu = wp_get_nav_menu_items(wp_get_nav_menu_object( $locations[ $menu_name ] )->term_id);
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
				
				 foreach ($menu as $menuItem) {
					 echo '<p class="lcl lcl-1"><a href="' . $menuItem['url'] . '" >' . $menuItem['title'] . '</a></p>';
				 }
			}
			?>
		</div>
	</div>
	<div class="tagcloud">
		<div class="title">
			<p>TAGS CLOUD</p>
		</div>
		<p>
			<?php
			$tags = get_tags();
			if ($tags) {
				foreach ($tags as $tag) {
					echo '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
				}
			}
			?>
	</div>
</div>