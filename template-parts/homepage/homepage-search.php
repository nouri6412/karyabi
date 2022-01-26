<?php
$state_id = 0;
$city_id = 0;
$cat_id = 0;
$search_word = "";

if (isset($_GET["search_word"])) {
    $search_word = $_GET["search_word"];
}

if (isset($_GET["job_state_id"])) {
    $state_id = $_GET["job_state_id"];
}

if (isset($_GET["job_city_id"])) {
    $city_id = $_GET["job_city_id"];
}

if (isset($_GET["cat_id"])) {
    $cat_id = $_GET["cat_id"];
}
?>
<form action="<?php echo home_url('search-job'); ?>" method="get" class="dezPlaceAni">
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <label>عنوان شغل، عبارت یا کلمه کلیدی</label>
                <div class="input-group">
                    <input value="<?php echo $search_word; ?>" id="search_word" name="search_word" type="text" class="form-control" placeholder="">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="form-group">
                <?php
                $Common_State_City = new Common_State_City;

                $states = $Common_State_City->get_state_list();
                ?>
                <select onchange="ajax_submit_mbm_get_city_list($(this).val(),$('#box-city-id'),'job_city_id',<?php echo $state_id; ?>)" id="job_state_id" name="job_state_id">
                    <option value="0"> کل استان ها</option>
                    <?php foreach ($states as $item) {
                        $selected="";
                        if($item["id"]==$state_id)
                        {
                            $selected="selected";
                        }
                    ?>
                        <option <?php echo $selected; ?> value="<?php echo $item["id"]; ?>"><?php echo $item["title"]; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <div class="form-group">
                <div id="box-city-id">
                    <select id="job_city_id" name="job_city_id">
                        <option value="0"> کل شهر ها</option>
                        <?php
                        $citis = $Common_State_City->get_city_list($state_id);
                        foreach ($citis as $item) {
                            $selected="";
                            if($item["id"]==$city_id)
                            {
                                $selected="selected";
                            }
                        ?>
                            <option <?php echo $selected; ?> value="<?php echo $item["id"]; ?>"><?php echo $item["title"]; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="form-group">
                <select id="cat_id" name="cat_id">
                    <option value="0">کل دسته بندی</option>
                    <?php
                    $args = array(
                        'post_type' => 'job-cat'
                    );
                    $the_query1 = new WP_Query($args);
                    ?>
                    <?php
                    while ($the_query1->have_posts()) :
                        $the_query1->the_post();
                        $selected="";
                        if(get_the_ID()==$citycat_id_id)
                        {
                            $selected="selected";
                        }
                    ?>
                        <option <?php echo $selected; ?> value="<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></option>
                    <?php
                    endwhile;
                    wp_reset_query();
                    ?>
                </select>
            </div>
        </div>
        <div class="col-lg-2 col-md-6">
            <button type="submit" class="site-button btn-block">جستجو</button>
        </div>
    </div>
</form>

<!-- Section Banner END -->