<?php
function custom_generate_menu_li($navItem, $menu)
{
    $item_class = "";
    $i = '';
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if (trim($actual_link) == $navItem->url && $navItem->menu_item_parent == 0) {
        $item_class = 'active';
    }
    if (isset($menu[$navItem->ID])) {
        if ($navItem->menu_item_parent == 0) {
            $i = '<i class="fa fa-chevron-down"></i>';
        } else {
            $i = '<i class="fa fa-angle-right"></i>';
        }
    }
?>
    <li class="<?php echo $item_class; ?>">
        <a href="<?php echo $navItem->url; ?>"><?php echo $navItem->title; ?><?php echo $i; ?></a>
        <?php
        if (isset($menu[$navItem->ID])) {
        ?>
            <ul class="sub-menu">
                <?php
                foreach ($menu[$navItem->ID] as $item) {
                    custom_generate_menu_li($item, $menu);
                }
                ?>

            </ul>
        <?php
        }
        ?>
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
        custom_generate_menu_li($navItem, $menus);
    }
    ?>
</ul>