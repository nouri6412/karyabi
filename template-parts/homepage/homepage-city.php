<?php
$cats = get_field("city");
if(!is_array($cats))
{
    $cats=[];
}
?>
<!-- Call To Action -->
<div class="section-full content-inner bg-gray">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 section-head text-center">
                <h2 class="m-b5">شهرهای تحت پوشش</h2>
                <h6 class="fw4 m-b0">شهر های محبوب</h6>
            </div>
        </div>
        <div class="row">
            <?php
            foreach ($cats as $cat) {
            ?>
                <div class="col-lg-3 col-sm-6 col-md-6 m-b30">
                    <a href="<?php echo home_url('search-job?job_city_id=' . $cat["group"]["link"]->ID) ?>">
                        <div class="city-bx align-items-end  d-flex" style="background-image:url(<?php echo $cat["group"]["image"] ?>)">
                            <div class="city-info">
                                <h5><?php echo $cat["group"]["title"] ?></h5>
                                <span> <?php
                                        $args = array(
                                            'post_type' => 'job',
                                            'meta_key' => 'city_id',
                                            'meta_value' => $cat["group"]["link"]->ID
                                        );
                                        $the_query2 = new WP_Query($args);
                                        $count = $the_query2->post_count;
                                        echo $count . ' ' . 'موقعیت شغلی';
                                        ?></span>
                            </div>
                        </div>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<!-- Call To Action END -->