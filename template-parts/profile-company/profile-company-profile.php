<?php 
$user_info = get_query_var('user_info');
$user_meta = get_query_var('user_meta');
?>
<div class="job-bx submit-resume">
    <div class="job-bx-title clearfix">
        <h5 class="font-weight-700 pull-left text-uppercase">پروفایل کاربر</h5>
        <a href="#" class="site-button right-arrow button-sm float-right">بازگشت</a>
    </div>

    <div class="row m-b30">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>نام شرکت</label>
                <input value="<?php echo isset($user_meta['company_name']) ? $user_meta['company_name'][0] : '';  ?>" id="company-name" type="text" class="form-control" placeholder="نام شرکت خود را وارد کنید">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>ایمیل</label>
                <input id="user-email" type="email" class="form-control" value="<?php echo $user_info->user_email; ?>" placeholder="info@gmail.com">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>وبسایت</label>
                <input value="<?php echo isset($user_meta['web']) ? $user_meta['web'][0] : '';  ?>" id="company-website" type="text" class="form-control" placeholder="لینک وبسایت">
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>دسته</label>
                <select id="company-cat">
                    <?php
                    $Karyabi_Category = new Karyabi_Category;
                    $cats = $Karyabi_Category->get_company_cat_list();
                    $cat_id = isset($user_meta['cat_id']) ? $user_meta['cat_id'][0] : 0;
                    ?>

                    <option value="0">هیچ کدام</option>
                    <?php foreach ($cats as $item) {
                        $selected = "";
                        if ($cat_id == $item["id"]) {
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
                <label> استان</label>
                <?php
                $Common_State_City = new Common_State_City;

                $states = $Common_State_City->get_state_list();
                $state_id = isset($user_meta['state_id']) ? $user_meta['state_id'][0] : 0;

                ?>
                <select onchange="ajax_submit_mbm_get_city_list($(this).val(),$('#box-city-id'),'city-id',<?php echo $state_id; ?>)" id="state-id">
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
                    <select id="city-id">
                        <option value="0">هیچ کدام</option>
                        <?php
                        $citis = $Common_State_City->get_city_list($state_id);
                        $city_id = isset($user_meta['city_id']) ? $user_meta['city_id'][0] : 0;
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

        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <label>درباره شرکت:</label>
                <div id="company-desc" contenteditable="true" style="width: 100%;min-height:120px;border:1px solid #eee;padding:10px;"><?php echo isset($user_meta['desc']) ? $user_meta['desc'][0] : '';  ?></div>
            </div>
        </div>
    </div>
    <!-- Contact Information -->
    <div class="job-bx-title clearfix">
        <h5 class="font-weight-700 pull-left text-uppercase">اطلاعات تماس</h5>
    </div>
    <div class="row m-b30">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>تلفن</label>
                <input id="company-tel" value="<?php echo isset($user_meta['tel']) ? $user_meta['tel'][0] : '';  ?>" type="text" class="form-control" placeholder="123 456 7890">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>ایمیل</label>
                <input id="company-email" value="<?php echo isset($user_meta['email']) ? $user_meta['email'][0] : '';  ?>" type="email" class="form-control" placeholder="exemple@gmail.com">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>کشور</label>
                <input id="company-country" value="<?php echo isset($user_meta['country']) ? $user_meta['country'][0] : '';  ?>" type="text" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>شهر</label>
                <input id="company-city" value="<?php echo isset($user_meta['city']) ? $user_meta['city'][0] : '';  ?>" type="text" class="form-control" placeholder="تبریز">
            </div>
        </div>
        <div style="display: none;" class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>کد پستی</label>
                <input id="company-pcode" value="<?php echo isset($user_meta['pcode']) ? $user_meta['pcode'][0] : '';  ?>" type="text" class="form-control" placeholder="504030">
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <label>آدرس</label>
                <input id="company-address" value="<?php echo isset($user_meta['address']) ? $user_meta['address'][0] : '';  ?>" type="text" class="form-control" placeholder="آدرس ...">
            </div>
        </div>
        <!-- <div class="col-lg-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d221879.7790715879!2d52.39293090388858!3d29.665501601054203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fb20d0c8c85f2e3%3A0x6d0c5b8aef6b4cf6!2sShiraz%2C%20Fars%20Province!5e0!3m2!1sen!2s!4v1631015185296!5m2!1sen!2s" style="border:0; width: 100%; height:300px;" allowfullscreen=""></iframe>
        </div> -->
    </div>
    <!-- Social Link -->
    <div class="job-bx-title clearfix">
        <h5 class="font-weight-700 pull-left text-uppercase">شبکه های اجتماعی</h5>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>فیسبوک</label>
                <input id="company-fa-facebook" value="<?php echo isset($user_meta['fa-facebook']) ? $user_meta['fa-facebook'][0] : '';  ?>" type="text" class="form-control" placeholder="https://www.facebook.com/">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>تویتتر</label>
                <input id="company-fa-twitter" value="<?php echo isset($user_meta['fa-twitter']) ? $user_meta['fa-twitter'][0] : '';  ?>" type="text" class="form-control" placeholder="https://www.twitter.com/">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>گوگل</label>
                <input id="company-fa-google" value="<?php echo isset($user_meta['fa-google']) ? $user_meta['fa-google'][0] : '';  ?>" type="text" class="form-control" placeholder="https://www.google.com/">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>لینکیدن</label>
                <input id="company-fa-link" value="<?php echo isset($user_meta['fa-link']) ? $user_meta['fa-link'][0] : '';  ?>" type="text" class="form-control" placeholder="https://www.linkedin.com/">
            </div>
        </div>
    </div>
    <div class="box-loading">
        <div class="loading-ajax"></div>
    </div>

    <button onclick="ajax_submit_mbm_post_data(
            {
                'action': 'mbm_profile_company_profile',
                'company_name':$('#company-name').val(),
                'web':$('#company-website').val(),
                'cat_id':$('#company-cat').val(),
                'state_id':$('#state-id').val(),
                'city_id':$('#city-id').val(),
                'desc':$('#company-desc').html(),
                'tel':$('#company-tel').val(),
                'email':$('#company-email').val(),
                'country':$('#company-country').val(),
                'city':$('#company-city').val(),
                'pcode':$('#company-pcode').val(),
                'address':$('#company-address').val(),
                'fa-facebook':$('#company-fa-facebook').val(),
                'fa-twitter':$('#company-fa-twitter').val(),
                'fa-google':$('#company-fa-google').val(),
                'fa-link':$('#company-fa-link').val(),
                'user_email':$('#user-email').val()
            }
            ,$('#dzFormMsg-error')
            ,$('#dzFormMsg-doned')
        )" type="ثبت" class="site-button m-b30">ذخیره تغییرات</button>

    <div id="dzFormMsg-error" class="dzFormMsg error"></div>
    <div id="dzFormMsg-doned" class="dzFormMsg doned"></div>

</div>