<?php
$user_meta = get_query_var('user_meta');
$data = [];
if (isset($user_meta["resume-edu"])) {
    $data_1 = json_decode($user_meta["resume-edu"][0]);

    if(!is_array($data_1->exp))
    {
        $data = json_decode($data_1->exp);
    }
    if(!$data)
    {
        $data = $data_1->exp;
    }
}

?>
<div class="d-flex">
    <h5 class="m-b15">سوابق تحصیلی</h5>
    <?php if($user_meta["profile_user_id"]==0){ ?>
    <a href="javascript:void(0);" data-toggle="modal" data-target="#eduction" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> ویرایش</a>
    <?php } ?>
</div>
<?php
foreach ($data as $item) {
?>

    <h6 class="font-14 m-b0"><?php echo 'دانشگاه'.' : '.$item->uni ?></h6>
    <p class="m-b0"><?php echo 'رشته'.' : '.$item->major ?></p>
    <p class="m-b0"><?php echo 'مقطع'.' : '.$item->grade ?></p>
    <p class="m-b0"><?php echo '  از سال' . ' ' . $item->date_from . " " . " تا سال" . " " . $item->date_to; ?></p>
    <hr>
<?php
}
?>
<!-- Modal -->
<div class="modal fade modal-bx-info editor" id="eduction" tabindex="-1" role="dialog" aria-labelledby="EmploymentModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EmploymentModalLongTitle">فرم سوابق تحصیلی</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="form-edu">
                    <?php
                    foreach ($data as $item) {
                        set_query_var('resume_edu', $item);
                        get_template_part('template-parts/profile-user/profile-user', 'resume-edu-form');
                    }
                    ?>
                </div>
                <button onclick="ajax_submit_mbm_post_data_resume_get_form(
            {
                'action': 'mbm_profile_user_get_form',
                'meta_action':'resume-edu-form'
            }
            ,$('#form-edu')
        )" class="btn btn-info">ردیف جدید <i class="fa fa-plus"></i></button>
            </div>
            <div class="modal-footer">
                <div class="box-loading">
                    <div class="loading-ajax"></div>
                </div>
                <button type="button" class="site-button" data-dismiss="modal">لغو</button>
                <button onclick="ajax_submit_mbm_post_data_resume_save_form(
            {
                'action': 'mbm_profile_user_save_resume',
                'meta_key':'resume-edu',
                'meta_action':'resume-edu',
            }
            ,'form-edu'
            ,$('#eduction_bx')
            ,$('#eduction')
            ,$('#dzFormMsg-error-edu')
        )" type="button" class="site-button">ذخیره</button>
                <div id="dzFormMsg-error-edu" class="dzFormMsg error"></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->