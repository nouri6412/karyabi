<?php
function get_menu_array_nav_item($main_menu)
{
    $menus = [];
    foreach ($main_menu as $navItem) {
        if (!isset($menus[$navItem->menu_item_parent])) {
            $menus[$navItem->menu_item_parent] = [];
        }
        $menus[$navItem->menu_item_parent][] =$navItem;
    }
    return $menus;
}
function karyabi_custom_menu()
{
    register_nav_menu('primary-menu', 'منوی اصلی ');
    register_nav_menu('emp-menu', 'منوی کارفرمایان ');
}
add_action('init', 'karyabi_custom_menu');
