<?php
$user_info = get_query_var('user_info');
$user_meta = get_query_var('user_meta');

$job_id = 0;
if (isset($_GET["job_id"])) {
    $job_id = $_GET["job_id"];
}

?>
<div class="job-bx submit-resume">
    <div class="job-bx-title clearfix">
        <h5 class="font-weight-700 pull-left text-uppercase">ارسال شغل جدید</h5>
        <a href="#" class="site-button right-arrow button-sm float-right">بازگشت</a>
    </div> 
    <form>
        <input id="job_id" name="job_id" type="hidden" value="<?php echo $job_id; ?>" />
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>نام شغل</label>
                    <input value="<?php echo get_post_meta($job_id, 'title', true) ?>" id="job_title" type="text" class="form-control" placeholder="عنوان کسب خود را وارد کنید">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>ایمیل</label>
                    <input value="<?php echo get_post_meta($job_id, 'email', true) ?>" id="job_email" type="email" class="form-control" placeholder="info@gmail.com">
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <label>مهارت های موردنیاز</label>
                    <input id="job_tag" type="text" class="form-control tags_input" value="<?php echo get_post_meta($job_id, 'tag', true) ?>">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>دسته بندی</label>
                    <select id="cat_id">
                        <?php
                        $args = array(
                            'post_type' => 'job-cat'
                        );
                        $the_query1 = new WP_Query($args);
                        ?>
                        <?php
                        while ($the_query1->have_posts()) :
                            $the_query1->the_post();
                            $selected = "";
                            if (get_post_meta($job_id, 'cat_id', true) == get_the_ID()) {
                                $selected = "selected";
                            }
                        ?>
                            <option <?php echo $selected ?> value="<?php echo get_the_ID(); ?>"><?php echo get_the_title(); ?></option>
                        <?php
                        endwhile;
                        wp_reset_query();
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>نوع همکاری</label>
                    <select id="job_coop_type">
                        <option <?php echo (get_post_meta($job_id, 'coop-type', true) == 'تمام وقت') ? 'selected' : ''; ?> value="<?php echo 'تمام وقت'; ?>"><?php echo 'تمام وقت'; ?></option>
                        <option <?php echo (get_post_meta($job_id, 'coop-type', true) == 'کارآموز') ? 'selected' : ''; ?> value="<?php echo 'کارآموز'; ?>"><?php echo 'کارآموز'; ?></option>
                        <option <?php echo (get_post_meta($job_id, 'coop-type', true) == 'دورکاری') ? 'selected' : ''; ?> value="<?php echo 'دورکاری'; ?>"><?php echo 'دورکاری'; ?></option>
                        <option <?php echo (get_post_meta($job_id, 'coop-type', true) == 'پروژه ای') ? 'selected' : ''; ?> value="<?php echo 'پروژه ای'; ?>"><?php echo 'پروژه ای'; ?></option>
                        <option <?php echo (get_post_meta($job_id, 'coop-type', true) == 'فریلنسر') ? 'selected' : ''; ?> value="<?php echo 'فریلنسر'; ?>"><?php echo 'فریلنسر'; ?></option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>تجربیات</label>
                    <select id="job_exp">
                        <option value="0">مهم نیست </option>
                        <?php
                        for ($i = 1; $i < 11; $i++) {
                            $selected = "";
                            if (get_post_meta($job_id, 'exp', true) == $i) {
                                $selected = "selected";
                            }
                        ?>
                            <option <?php echo $selected; ?> value="<?php echo $i; ?>"><?php echo $i . ' ' . 'سال'; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>جنسیت</label>
                    <select id="job_sex">
                        <option <?php echo (get_post_meta($job_id, 'sex', true) == 'مهم نیست') ? 'selected' : ''; ?> value="<?php echo 'مهم نیست'; ?>"><?php echo 'مهم نیست'; ?></option>
                        <option <?php echo (get_post_meta($job_id, 'sex', true) == 'مرد') ? 'selected' : ''; ?> value="<?php echo 'مرد'; ?>"><?php echo 'مرد'; ?></option>
                        <option <?php echo (get_post_meta($job_id, 'sex', true) == 'زن') ? 'selected' : ''; ?> value="<?php echo 'زن'; ?>"><?php echo 'زن'; ?></option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>حداقل حقوق (ریال):</label>
                    <input value="<?php echo get_post_meta($job_id, 'min-salary', true) ?>" id="job_min_salary" type="number" class="form-control" placeholder="مثال: 10000">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>حداکثر حقوق (ریال):</label>
                    <input value="<?php echo get_post_meta($job_id, 'max-salary', true) ?>" id="job_max_salary" type="number" class="form-control" placeholder="مثال: 20000">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label> استان</label>
                    <?php
                    $Common_State_City = new Common_State_City;

                    $states = $Common_State_City->get_state_list();
                    $state_id = get_post_meta($job_id, 'state_id', true);
                    ?>
                    <select onchange="ajax_submit_mbm_get_city_list($(this).val(),$('#box-city-id'),'job_city_id',<?php echo $state_id; ?>)" id="job_state_id">
                        <option value="0">هیچ کدام</option>
                        <?php foreach ($states as $item) {
                            $selected = "";
                            if ($state_id == $item["id"]) {
                                $selected = "selected";
                            }
                        ?>
                            <option <?php echo $selected; ?> value="<?php echo $item["id"]; ?>"><?php echo $item["title"]; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label> شهر</label>
                    <div id="box-city-id">
                        <select id="job_city_id">
                            <option value="0">هیچ کدام</option>
                            <?php
                            $citis = $Common_State_City->get_city_list($state_id);
                            $city_id = get_post_meta($job_id, 'city_id', true);
                            foreach ($citis as $item) {
                                $selected = "";
                                if ($city_id == $item["id"]) {
                                    $selected = "selected";
                                }
                            ?>
                                <option <?php echo $selected; ?> value="<?php echo $item["id"]; ?>"><?php echo $item["title"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label> وضعیت آگهی</label>
                    <select id="job_status">
                    <option <?php echo (get_post_meta($job_id, 'active', true) == 0) ? 'selected="selected"' : '' ?> value="0">غیر فعال</option>
                    <option <?php echo (get_post_meta($job_id, 'active', true) == 1) ? 'selected="selected"' : '' ?> value="1"> فعال شده</option>
                    <option <?php echo (get_post_meta($job_id, 'active', true) == 2) ? 'selected="selected"' : '' ?> value="2">بسته شده</option>
                    <option <?php echo (get_post_meta($job_id, 'active', true) == 3) ? 'selected="selected"' : '' ?> value="3">آرشیو شده</option>
                    <option <?php echo (get_post_meta($job_id, 'active', true) == 4) ? 'selected="selected"' : '' ?> value="4">پیش نویس</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>آدرس</label>
                    <input value="<?php echo get_post_meta($job_id, 'address', true) ?>" id="job_address" type="text" class="form-control" placeholder="">
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <label>شرح موقعیت شغلی</label>
                    <div id="desc_job" contenteditable="true" style="width: 100%;min-height:120px;border:1px solid #eee;padding:10px;"><?php echo get_post_meta($job_id, 'desc', true) ?></div>
                </div>
            </div>

        </div>
        <div class="box-loading">
            <div class="loading-ajax"></div>
        </div>
        <button onclick="ajax_submit_mbm_post_job(
            {
                'action': 'mbm_profile_company_insert_job',
                'job_id':$('#job_id').val(),
                'job_title':$('#job_title').val(),
                'job_status':$('#job_status').val(),
                'job_email':$('#job_email').val(),
                'job_tag':$('#job_tag').val(),
                'job_coop_type':$('#job_coop_type').val(),
                'job_exp':$('#job_exp').val(),
                'job_min_salary':$('#job_min_salary').val(),
                'job_max_salary':$('#job_max_salary').val(),
                'job_state_id':$('#job_state_id').val(),
                'job_city_id':$('#job_city_id').val(),
                'job_address':$('#job_address').val(),
                'job_sex':$('#job_sex').val(),
                'desc_job':$('#desc_job').html(),
                'cat_id':$('#cat_id').val()
            }
            ,$('#dzFormMsg-error')
            ,$('#dzFormMsg-doned')
        )" type="button" class="site-button m-b30">ثبت آگهی شغل</button>
        <div id="dzFormMsg-error" class="dzFormMsg error"></div>
        <div id="dzFormMsg-doned" class="dzFormMsg doned"></div>
    </form>
</div>