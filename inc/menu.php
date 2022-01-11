<?php
function bital_custom_menu()
{
    register_nav_menu('primary', 'منوی اصلی ');
    register_nav_menu('footer-menu-1', ' منوی فوتر (برگزیده)');
    register_nav_menu('footer-menu-2', ' منوی فوتر (تحلیل قیمت)');
    register_nav_menu('footer-menu-3', ' منوی فوتر (مفاهیم پایه)');
    register_nav_menu('footer-menu-4', ' منوی فوتر (بیتال)');
}
add_action('init', 'bital_custom_menu');
