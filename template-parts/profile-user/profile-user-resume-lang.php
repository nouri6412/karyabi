<?php
$user_meta = get_query_var('user_meta');
$data = [];
if (isset($user_meta["resume-lang"])) {
    $data_1 = json_decode($user_meta["resume-lang"][0]);

    $data = json_decode($data_1->exp);
}

?>
<div class="d-flex">
    <h5 class="m-b15">زبان ها </h5>
    <a href="javascript:void(0);" data-toggle="modal" data-target="#language" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> ویرایش</a>
</div>
<?php
foreach ($data as $item) {
?>

    <h6 class="font-14 m-b0"><?php echo $item->title.' : '.$item->degree ?></h6>
    <hr>
<?php
}
?>
<!-- Modal -->
<div class="modal fade modal-bx-info editor" id="language" tabindex="-1" role="dialog" aria-labelledby="EmploymentModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EmploymentModalLongTitle">فرم  زبان ها</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="form-lang">
                    <?php
                    foreach ($data as $item) {
                        set_query_var('resume_lang', $item);
                        get_template_part('template-parts/profile-user/profile-user', 'resume-lang-form');
                    }
                    ?>
                </div>
                <button onclick="ajax_submit_mbm_post_data_resume_get_form(
            {
                'action': 'mbm_profile_user_get_form',
                'meta_action':'resume-lang-form'
            }
            ,$('#form-lang')
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
                'meta_key':'resume-lang',
                'meta_action':'resume-lang',
            }
            ,'form-lang'
            ,$('#language_bx')
            ,$('#language')
            ,$('#dzFormMsg-error-lang')
        )" type="button" class="site-button">ذخیره</button>
                <div id="dzFormMsg-error-lang" class="dzFormMsg error"></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->