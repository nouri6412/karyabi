<?php
$cats = get_field("cats");
if(!is_array($cats))
{
    $cats=[];
}
?>
<div class="row sp20">
    <?php
    foreach ($cats as $cat) {
    ?>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="icon-bx-wraper">
                <div class="icon-content">
                    <div class="icon-md text-primary m-b20"><i class="<?php echo $cat["group"]["icon"] ?>"></i></div>
                    <a href="<?php echo home_url('search-job?cat_id='.$cat["group"]["link"]->ID) ?>" class="dez-tilte"><?php echo $cat["group"]["title"] ?></a>
                    <p class="m-a0">
                        <?php
                        $args = array(
                            'post_type' => 'job',
                            'meta_key' => 'cat_id',
                            'meta_value' => $cat["group"]["link"]->ID
                        );
                        $the_query2 = new WP_Query($args);
                        $count = $the_query2->post_count;
                        echo $count . ' ' . 'موقعیت شغلی';
                        ?>
                    </p>
                    <div class="rotate-icon"><i class="<?php echo $cat["group"]["icon"] ?>"></i></div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <!-- <div class="col-lg-12 text-center m-t30">
        <button class="site-button radius-xl">همه دسته ها</button>
    </div> -->
</div>