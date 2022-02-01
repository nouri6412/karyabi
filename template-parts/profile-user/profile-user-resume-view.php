<?php
$user_info = get_query_var('user_info');
$user_meta = get_query_var('user_meta');
?>
<div class="job-bx submit-resume">
    <div class="job-bx-title clearfix">
        <h5 class="font-weight-700 pull-left text-uppercase">اطلاعات کاربر</h5>
        <a href="#" class="site-button right-arrow button-sm float-right">بازگشت</a>
    </div>
 
    <div class="row m-b30">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>نام و نام خانوادگی</label>
                <p class="m-b0"><?php echo isset($user_meta['user_name']) ? $user_meta['user_name'][0] : '';  ?></p>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>عنوان شغلی</label>
                <p class="m-b0"><?php echo isset($user_meta['user_exp']) ? $user_meta['user_exp'][0] : '';  ?></p>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>ایمیل</label>
                <p class="m-b0"><?php echo $user_info->user_email; ?></p>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label> سال تولد</label>
                <p class="m-b0"><?php echo isset($user_meta['user_date_year']) ? $user_meta['user_date_year'][0] : '';  ?></p>
            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label> استان</label>
                <?php
                $state_id = isset($user_meta['state_id']) ? $user_meta['state_id'][0] : 0;

                ?>
                <p class="m-b0"><?php echo get_the_title($state_id)  ?></p>

            </div>
        </div>

        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label> شهر</label>

                <?php
                $city_id = isset($user_meta['city_id']) ? $user_meta['city_id'][0] : 0;
                ?>
                <p class="m-b0"><?php echo get_the_title($city_id)  ?></p>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>تلفن</label>
                <p class="m-b0"><?php echo isset($user_meta['tel']) ? $user_meta['tel'][0] : '';  ?></p>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>جنسیت</label>
                <p class="m-b0"><?php echo isset($user_meta['user-sex']) ? $user_meta['user-sex'][0] : '';  ?></p>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <label>توضیحات:</label>
                <p class="m-b0"><?php echo isset($user_meta['desc']) ? $user_meta['desc'][0] : '';  ?></p>
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
                <a href="<?php echo isset($user_meta['fa-facebook']) ? $user_meta['fa-facebook'][0] : '';  ?>">facebook <i class="fa fa-facebook"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <a href="<?php echo isset($user_meta['fa-twitter']) ? $user_meta['fa-twitter'][0] : '';  ?>">twitter <i class="fa fa-twitter"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <a href="<?php echo isset($user_meta['fa-google']) ? $user_meta['fa-google'][0] : '';  ?>">twitter <i class="fa fa-google"></i></a>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <a href="<?php echo isset($user_meta['fa-link']) ? $user_meta['fa-link'][0] : '';  ?>">twitter <i class="fa fa-link"></i></a>
            </div>
        </div>
    </div>

</div>