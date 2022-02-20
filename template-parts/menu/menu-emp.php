<nav>
    <div class="container">
        <!--  -->
        <div class="row align-items-center d-none d-lg-flex">
            <div class="col">
                <ul class="d-flex align-items-center">
                    <?php
                    $menuLocations = get_nav_menu_locations();

                    $menuID = $menuLocations['emp-menu'];

                    $primaryNav = wp_get_nav_menu_items($menuID);
                    $menus = [];
                    //var_dump($primaryNav);
                    $menus = get_menu_array_nav_item($primaryNav);
                    ?>
                    <li> <a title="<?php echo get_bloginfo('name'); ?>" href="<?php echo site_url(); ?>"><img src="<?php echo get_field('header', 'option')["logo"]; ?>" class="logo" alt="<?php echo get_bloginfo('name'); ?>"></a>
                    </li>
                    <?php
                    foreach ($menus[0] as $navItem) {
                        if ($navItem->menu_item_parent == 0) {
                    ?>
                            <li class=""><a href="<?php echo $navItem->url; ?>"><?php echo $navItem->title; ?></a></li>
                    <?php
                        }
                    }
                    ?>
                </ul>
            </div>
            <div class="col p-0">
                <ul class="d-flex align-items-center justify-content-end">
                    <?php
                    $user_id = get_current_user_id();
                    $user_type = get_the_author_meta('user_type', $user_id);
                    ?>
                    <?php if (!is_user_logged_in() || $user_type != "compaany") { ?>
                        <li class="m-0 item-nav"><a href="<?php echo home_url('?login=1')  ?>">ورود کارفرما</a></li>
                        <li class="m-0 item-nav"><a href="<?php echo home_url('register-emp')  ?>">ثبت نام کارفرما</a></li>
                    <?php } else {
                    ?>
                        <li class="m-0 item-nav"><a href="<?php echo site_url('profile'); ?>" class="site-button"><i class="fa fa-user"></i>پروفایل کارفرما</a></li>
                        <li class="m-0 item-nav"><a href="<?php echo wp_logout_url(site_url()); ?>" class="site-button exit"><i class="fa fa-sign-out"></i> خروج</a></li>
                    <?php
                    } ?>

                    <span class="employer-label ">کارفرمایان</span>


                </ul>
            </div>
        </div>
    </div>
</nav>