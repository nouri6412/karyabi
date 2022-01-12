<?php
    $menuLocations = get_nav_menu_locations();

    $menuID = $menuLocations['primary-menu'];

    $primaryNav = wp_get_nav_menu_items($menuID);
    $menus = [];
    //var_dump($primaryNav);
    $menus = get_menu_array_nav_item($primaryNav);
    foreach ($menus as $navItem) {
    }
