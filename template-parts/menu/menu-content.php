<?php
$menuLocations = get_nav_menu_locations();

$menuID = $menuLocations['primary-menu'];

$primaryNav = wp_get_nav_menu_items($menuID);
$menus = [];
//var_dump($primaryNav);
$menus = get_menu_array_nav_item($primaryNav);
?>
<ul class="nav navbar-nav">
    <?php
    foreach ($menus[0] as $navItem) {
        custom_generate_menu_li($navItem, $menus);
    }
    ?>
</ul>