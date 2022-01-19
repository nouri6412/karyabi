<?php
$user_info = get_query_var('user_info');
$user_meta = get_query_var('user_meta');
?>
<div class="job-bx submit-resume">
    <div class="job-bx-title clearfix">
        <h5 class="font-weight-700 pull-left text-uppercase">ارسال شغل جدید</h5>
        <a href="#" class="site-button right-arrow button-sm float-right">بازگشت</a>
    </div>
    <form>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>نام شغل</label>
                    <input id="job_title" type="text" class="form-control" placeholder="عنوان کسب خود را وارد کنید">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>ایمیل</label>
                    <input id="job_email" type="email" class="form-control" placeholder="info@gmail.com">
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="form-group">
                    <label>تگ</label>
                    <input id="job_tag" type="text" class="form-control tags_input" value="">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>نوع همکاری</label>
                    <select id="job_coop_type">
                        <option value="تمام وقت">تمام وقت</option>
                        <option value="پاره وقت">پاره وقت</option>
                        <option value="کارآموز">کارآموز</option>
                        <option value="دورکاری">دورکاری</option>
                        <option value="پروژه ای">پروژه ای</option>
                        <option value="فریلنسر">فریلنسر</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>تجربیات</label>
                    <select id="job_exp">
                        <option>مهم نیست </option>
                        <option value="1">1 سال</option>
                        <option value="2">2 سال</option>
                        <option value="3">3 سال</option>
                        <option value="4">4 سال</option>
                        <option value="5">5 سال</option>
                        <option value="6">6 سال</option>
                        <option value="7">7 سال</option>
                        <option value="8">8 سال</option>
                        <option value="9">9 سال</option>
                        <option value="10">10 سال</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>حداقل حقوق (ریال):</label>
                    <input id="job_min_salary" type="email" class="form-control" placeholder="مثال: 10000">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>حداکثر حقوق (ریال):</label>
                    <input id="job_max_salary" type="text" class="form-control" placeholder="مثال: 20000">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label> استان</label>
                    <?php
                    $Common_State_City = new Common_State_City;

                    $states = $Common_State_City->get_state_list();

                    ?>
                    <select onchange="ajax_submit_mbm_get_city_list($(this).val(),$('#box-city-id'),'job_city_id',<?php echo $state_id; ?>)" id="job_state_id">
                        <option value="0">هیچ کدام</option>
                        <?php foreach ($states as $item) {
                        ?>
                            <option  value="<?php echo $item["id"]; ?>"><?php echo $item["title"]; ?></option>
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
                            foreach ($citis as $item) {
                            ?>
                                <option  value="<?php echo $item["id"]; ?>"><?php echo $item["title"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="form-group">
                    <label>آدرس</label>
                    <input id="address" type="text" class="form-control" placeholder="">
                </div>
            </div>

        </div>
        <div class="box-loading">
            <div class="loading-ajax"></div>
        </div>
        <button onclick="ajax_submit_mbm_post_job(
            {
                'action': 'mbm_profile_company_insert_job',
                'job_title':$('#job_title').val(),
                'job_email':$('#job_email').val(),
                'job_tag':$('#job_tag').val(),
                'job_desc':$('#job_desc').val(),
                'job_coop_type':$('#job_coop_type').val(),
                'job_exp':$('#job_exp').val(),
                'job_min_salary':$('#job_min_salary').val(),
                'job_max_salary':$('#job_max_salary').val(),
                'job_state_id':$('#job_state_id').val(),
                'job_city_id':$('#job_city_id').val(),
                'job_address':$('#job_address').val()
            }
            ,$('#dzFormMsg-error')
            ,$('#dzFormMsg-doned')
        )" type="button" class="site-button m-b30">ثبت آگهی ضغل</button>
        <div id="dzFormMsg-error" class="dzFormMsg error"></div>
        <div id="dzFormMsg-doned" class="dzFormMsg doned"></div>
    </form>
</div>