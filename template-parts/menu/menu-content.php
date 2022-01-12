<?php
function custom_generate_menu_li($navItem, $menu)
{
    $item_class = "";
    $i = '';
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (trim($actual_link) == $navItem->url) {
        $item_class = 'active';
    }
    if (isset($menu[$navItem->ID])) {
        $i = '<i class="fa fa-chevron-down"></i>';
    }
?>
    <li class="<?php echo $item_class; ?>">
        <a href="#"><?php echo $navItem->title; ?><?php echo $i; ?></a>
        <ul class="sub-menu">
            <li><a href="index.html" class="dez-page">خانه 1</a></li>
            <li><a href="index-2.html" class="dez-page">خانه 2</a></li>
        </ul>
    </li>
<?php
}
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
    }
    ?>
</ul>