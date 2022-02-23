<?php
$user_meta = get_query_var('user_meta');
$data = [];
if (isset($user_meta["resume-skills"])) {
    $data = json_decode($user_meta["resume-skills"][0]);
}
$skills = [];
if (isset($data->skills)) {
    $skills = explode(',', $data->skills);
}
?>
<div class="d-flex">
    <h5 class="m-b15 prefer-title"><i class="fa fa-tasks"></i> مهارت های حرفه ای</h5>
    <?php if($user_meta["profile_user_id"]==0){ ?>
    <a href="javascript:void(0);" data-toggle="modal" data-target="#keyskills" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> ویرایش</a>
    <?php } ?>
</div>
<div class="job-time mr-auto">
    <?php
    foreach ($skills as $item) {
    ?>
        <a href="javascript:void(0);"><span><?php echo $item; ?></span></a>

    <?php
    }
    ?>
</div>
<!-- Modal -->
<div class="modal fade modal-bx-info editor" id="keyskills" tabindex="-1" role="dialog" aria-labelledby="KeyskillsModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="KeyskillsModalLongTitle">مهارت های حرفه ای</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <input id="post-skills" type="text" class="form-control tags_input" value="<?php echo isset($data->skills) ? $data->skills : '';  ?>">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            <div class="box-loading">
                    <div class="loading-ajax"></div>
                </div>
                <button type="button" class="site-button" data-dismiss="modal">لغو</button>
                <button onclick="ajax_submit_mbm_post_data_resume(
            {
                'action': 'mbm_profile_user_save_resume',
                'meta_key':'resume-skills',
                'meta_action':'resume-skills',
                'skills':$('#post-skills').val()
            }
            ,$('#key_skills_bx')
            ,$('#keyskills')
            ,$('#dzFormMsg-error-skills')
        )" type="button" class="site-button">ذخیره</button>

                <div id="dzFormMsg-error-skills" class="dzFormMsg error"></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->