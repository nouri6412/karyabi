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
                <input type="email" class="form-control" value="<?php echo $user_info->user_email; ?>" placeholder="info@gmail.com">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>وبسایت</label>
                <input type="text" class="form-control" placeholder="لینک وبسایت">
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>تاریخ تاسیس </label>
                <input type="email" class="form-control" placeholder="17/12/1400">
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label> استان</label>
                <?php
                $Common_State_City = new Common_State_City;

                $states = $Common_State_City->get_state_list();
                ?>
                <select onchange="ajax_submit_mbm_get_city_list($(this).val(),$('#box-city-id'),0)" id="state-id">
                    <option value="0">هیچ کدام</option>
                    <?php foreach ($states as $item) { ?>
                        <option value="<?php echo $item["id"]; ?>"><?php echo $item["title"]; ?></option>
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
                    </select>
                </div>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>دسته</label>
                <select>
                    <option>طراح وب</option>
                    <option>توسعه دهنده وب</option>
                </select>
            </div>
        </div>

        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <label>توضیحات:</label>
                <textarea class="form-control">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است</textarea>
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
                <input type="text" class="form-control" placeholder="123 456 7890">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>ایمیل</label>
                <input type="email" class="form-control" placeholder="exemple@gmail.com">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>Contry</label>
                <input type="text" class="form-control" placeholder="India">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>شهر</label>
                <input type="email" class="form-control" placeholder="تبریز">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>کد پستی</label>
                <input type="email" class="form-control" placeholder="504030">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>آدرس</label>
                <input type="email" class="form-control" placeholder="New york city">
            </div>
        </div>
        <div class="col-lg-12">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d221879.7790715879!2d52.39293090388858!3d29.665501601054203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3fb20d0c8c85f2e3%3A0x6d0c5b8aef6b4cf6!2sShiraz%2C%20Fars%20Province!5e0!3m2!1sen!2s!4v1631015185296!5m2!1sen!2s" style="border:0; width: 100%; height:300px;" allowfullscreen=""></iframe>
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
                <input type="text" class="form-control" placeholder="https://www.facebook.com/">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>تویتتر</label>
                <input type="email" class="form-control" placeholder="https://www.twitter.com/">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>گوگل</label>
                <input type="text" class="form-control" placeholder="https://www.google.com/">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>لینکیدن</label>
                <input type="email" class="form-control" placeholder="https://www.linkedin.com/">
            </div>
        </div>
    </div>
    <div class="box-loading">
        <div class="loading-ajax"></div>
    </div>

    <button onclick="ajax_submit_mbm_profile_company_profile(
            {'company_name':$('#company-name').val()}
            ,$('#dzFormMsg-error')
            ,$('#dzFormMsg-doned')
        )" type="ثبت" class="site-button m-b30">ذخیره تغییرات</button>

    <div id="dzFormMsg-error" class="dzFormMsg error"></div>
    <div id="dzFormMsg-doned" class="dzFormMsg doned"></div>

</div>