<?php
$user_meta = get_query_var('user_meta');
$data = [];
$data["about"] = "توضیحات درباره من";
if (isset($user_meta["resume-about"])) {
    $data = json_decode($user_meta["resume-about"][0]);
}
?>
<div class="d-flex">
    <h5 class="m-b15">در باره من</h5>
    <a href="javascript:void(0);" data-toggle="modal" data-target="#profilesummary" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> ویرایش</a>
</div>
<p class="m-b0"><?php echo isset($data->about) ? $data->about : '';  ?></p>
<!-- Modal -->
<div class="modal fade modal-bx-info editor" id="profilesummary" tabindex="-1" role="dialog" aria-labelledby="ProfilesummaryModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ProfilesummaryModalLongTitle"> درباره</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">        
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="form-group">
                                <textarea id="post-about" class="form-control" placeholder="توضیحات"><?php echo isset($data->about) ? $data->about : '';  ?></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <div class="box-loading">
                    <div class="loading-ajax"></div>
                </div>
                <button type="button" class="site-button" data-dismiss="modal">لغو</button>
                <button onclick="ajax_submit_mbm_post_data_resume(
            {
                'action': 'mbm_profile_user_save_resume',
                'meta_key':'resume-about',
                'meta_action':'resume-about',
                'about':$('#post-about').val()
            }
            ,$('#profile_summary_bx')
            ,$('#profilesummary')
            ,$('#dzFormMsg-error-about')
        )" type="button" class="site-button">ذخیره</button>

                <div id="dzFormMsg-error-about" class="dzFormMsg error"></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->