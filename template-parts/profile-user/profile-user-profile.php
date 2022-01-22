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
                <label>نام و نام خانوادگی</label>
                <input value="<?php echo isset($user_meta['user_name']) ? $user_meta['user_name'][0] : '';  ?>" id="user-name" type="text" class="form-control" placeholder="نام شرکت خود را وارد کنید">
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>عنوان شغل</label>
                <input value="<?php echo isset($user_meta['user_exp']) ? $user_meta['user_exp'][0] : '';  ?>" id="user-exp" type="text" class="form-control" placeholder="عنوان شغل : مهندس نرم افزار و برنامه نویس">
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
                <label> سال تولد</label>
                <input value="<?php echo isset($user_meta['user_date_year']) ? $user_meta['user_date_year'][0] : '';  ?>" id="user-date-year" type="number" class="form-control" placeholder="1368">
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
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>تلفن</label>
                <input id="user-tel" value="<?php echo isset($user_meta['tel']) ? $user_meta['tel'][0] : '';  ?>" type="text" class="form-control" placeholder="123 456 7890">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
            <label>جنسیت</label>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="custom-control custom-radio">
                            <input <?php echo (isset($user_meta['user-sex']) && $user_meta['user-sex'][0]=="male") ? 'checked="checked"' : '';  ?> type="radio" class="custom-control-input" id="user-sex-male" name="user-sex" value="male" >
                            <label class="custom-control-label" for="user-sex-male">مرد</label>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <div class="custom-control custom-radio">
                            <input <?php echo (isset($user_meta['user-sex']) && $user_meta['user-sex'][0]=="fmale") ? 'checked="checked"' : '';  ?> type="radio" class="custom-control-input" id="user-sex-fmale" name="user-sex" value="fmale">
                            <label class="custom-control-label" for="user-sex-fmale">زن</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <label>توضیحات:</label>
                <textarea id="user-desc" class="form-control"><?php echo isset($user_meta['desc']) ? $user_meta['desc'][0] : '';  ?></textarea>
            </div>
        </div>
    </div>
    <!-- Social Link -->
    <div class="job-bx-title clearfix">
        <h5 class="font-weight-700 pull-left text-uppercase">شبکه های اجتماعی</h5>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>فیسبوک</label>
                <input id="user-fa-facebook" value="<?php echo isset($user_meta['fa-facebook']) ? $user_meta['fa-facebook'][0] : '';  ?>" type="text" class="form-control" placeholder="https://www.facebook.com/">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>تویتتر</label>
                <input id="user-fa-twitter" value="<?php echo isset($user_meta['fa-twitter']) ? $user_meta['fa-twitter'][0] : '';  ?>" type="text" class="form-control" placeholder="https://www.twitter.com/">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>گوگل</label>
                <input id="user-fa-google" value="<?php echo isset($user_meta['fa-google']) ? $user_meta['fa-google'][0] : '';  ?>" type="text" class="form-control" placeholder="https://www.google.com/">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>لینکیدن</label>
                <input id="user-fa-link" value="<?php echo isset($user_meta['fa-link']) ? $user_meta['fa-link'][0] : '';  ?>" type="text" class="form-control" placeholder="https://www.linkedin.com/">
            </div>
        </div>
    </div>
    <div class="box-loading">
        <div class="loading-ajax"></div>
    </div>

    <button onclick="ajax_submit_mbm_post_data(
            {
                'action': 'mbm_profile_user_profile',
                'user_name':$('#user-name').val(),
                'user_exp':$('#user-exp').val(),
                'user_date_year':$('#user-date-year').val(),
                'state_id':$('#state-id').val(),
                'city_id':$('#city-id').val(),
                'desc':$('#user-desc').val(),
                'tel':$('#user-tel').val(),
                'user-sex':$('input[name=\'user-sex\']:checked').val(),
                'email':$('#user-email').val(),
                'fa-facebook':$('#user-fa-facebook').val(),
                'fa-twitter':$('#user-fa-twitter').val(),
                'fa-google':$('#user-fa-google').val(),
                'fa-link':$('#user-fa-link').val()
            }
            ,$('#dzFormMsg-error')
            ,$('#dzFormMsg-doned')
        )" type="ثبت" class="site-button m-b30">ذخیره تغییرات</button>

    <div id="dzFormMsg-error" class="dzFormMsg error"></div>
    <div id="dzFormMsg-doned" class="dzFormMsg doned"></div>

</div>