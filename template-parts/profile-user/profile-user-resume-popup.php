<?php
$user_meta = get_query_var('user_meta');
$req_id = get_query_var('req_id');
$user_id = get_query_var('user_id');
$date = get_query_var('date');
?>
<div class="resume-popup">
    <div class="resume-popup-header">
        <?php
        $avatar = get_template_directory_uri() . '/assets/img/user.png';
        if (isset($user_meta['avatar'])) {
            $avatar = $user_meta['avatar'][0];
        }
        ?>
        <img class="resume-popup-header-avatar" src="<?php echo $avatar; ?>" />
        <div class="resume-popup-header-title">
            <div class="resume-popup-header-title-name">
                <h4><?php echo isset($user_meta['user_name']) ? $user_meta['user_name'][0] : '';  ?></h4>
                <span><?php echo isset($user_meta['user_exp']) ? $user_meta['user_exp'][0] : '';  ?></span>
            </div>
            <div class="resume-popup-header-title-date"><?php echo $date;  ?></div>
        </div>
    </div>
    <div class="resume-popup-body">
        <div class="panel panel-info">
            <div class="panel-heading">اطلاعات تماس</div>
            <div class="panel-body">
                <div class="user-info"><i class="fa fa-phone"></i><label class="user-info-label">موبایل</label><label class="user-info-title"><?php echo isset($user_meta['tel']) ? $user_meta['tel'][0] : '';  ?></label></div>
                <div class="user-info"><i class="fa fa-envelope"></i><label class="user-info-label">ایمیل</label><label class="user-info-title"><?php echo isset($user_meta['email']) ? $user_meta['email'][0] : '';  ?></label></div>
                <div class="user-info"><i class="fa fa-download"></i><label class="user-info-label">لینک رزومه</label><label class="user-info-title"><a target="_blank" href="<?php echo home_url('profile?action=resume&user_id=' . $user_id); ?>"> اینجا کلیک فرمائید</a></label></div>
                <div class="user-info"><i class="fa fa-download"></i><label class="user-info-label"> رزومه پیوست شده</label><label class="user-info-title"><a target="_blank" href="<?php echo isset($user_meta['resume-file']) ? $user_meta['resume-file'][0] : '#';  ?>"><?php echo isset($user_meta['resume-file']) ? 'اینجا کلیک فرمائید' : 'آپلود نشده است';  ?></a></label></div>

            </div>
        </div>
        <div class="panel panel-info">
            <div class="panel-heading">وضعیت</div>
            <div class="panel-body">
                <div class="user-info">
                    <label class="col-md-4"> وضعیت</label>
                    <select onchange="ajax_submit_mbm_change_status_request({
                                        'action': 'mbm_change_status_request',
                'job_id':<?php echo $req_id; ?>,
                'status':$(this).val(),
                    })" class="col-md-8">
                        <option <?php echo (get_post_meta($req_id, 'status', true) == 0) ? 'selected="selected"' : '' ?> value="0">در انتظار وضعیت</option>
                        <option <?php echo (get_post_meta($req_id, 'status', true) == 1) ? 'selected="selected"' : '' ?> value="1">بررسی شده</option>
                        <option <?php echo (get_post_meta($req_id, 'status', true) == 2) ? 'selected="selected"' : '' ?> value="2">تایید برای مصاحبه</option>
                        <option <?php echo (get_post_meta($req_id, 'status', true) == 3) ? 'selected="selected"' : '' ?> value="3">رد درخواست</option>
                        <option <?php echo (get_post_meta($req_id, 'status', true) == 4) ? 'selected="selected"' : '' ?> value="4">استخدام شده</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="resume-popup-footer"></div>
</div>