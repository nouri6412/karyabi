<?php
class prefer_object
{
}
$user_meta = get_query_var('user_meta');
$data = new prefer_object;
$data->salary = "";
if (isset($user_meta["resume-prefer"])) {
    $data = json_decode($user_meta["resume-prefer"][0]);
    
}
?>
<div class="d-flex">
    <h5 class="m-b15 prefer-title"><i class="fa fa-thumbs-up"></i> ترجیحات شغلی</h5>
    <?php if($user_meta["profile_user_id"]==0){ ?>
    <a href="javascript:void(0);" data-toggle="modal" data-target="#prefer_job" class="site-button add-btn button-sm"><i class="fa fa-pencil m-r5"></i> ویرایش</a>
    <?php } ?>

</div>
<p class="m-b0"><i class="fa fa-money"></i> <?php echo 'حداقل حقوق درخواستی به دلار برای هر ساعت' . ' : ' ; echo (isset($data->salary)) ? $data->salary : '';  ?></p>
<hr>
<h5 class="m-b15 prefer-title"><i class="fa fa-list-alt"></i> سطح ارشدیت در زمینه فعالیت</h5>
<p class="m-b0"><?php echo  (isset($data->degree1) && $data->degree1==1) ? 'تازه کار' : '';  ?></p>
<p class="m-b0"><?php echo  (isset($data->degree2) && $data->degree2==1) ? ' متخصص' : '';  ?></p>
<p class="m-b0"><?php echo  (isset($data->degree3) && $data->degree3==1) ? ' مدیر' : '';  ?></p>
<p class="m-b0"><?php echo  (isset($data->degree4) && $data->degree4==1) ? ' مدیر ارشد' : '';  ?></p>
<hr>
<h5 class="m-b15 prefer-title"><i class="fa fa-file"></i> نوع قراردادهای قابل قبول</h5>
<p class="m-b0"><?php echo  (isset($data->emp1) && $data->emp1==1) ? 'تمام وقت' : '';  ?></p>
<p class="m-b0"><?php echo  (isset($data->emp2) && $data->emp2==1) ? ' پاره وقت' : '';  ?></p>
<p class="m-b0"><?php echo  (isset($data->emp3) && $data->emp3==1) ? ' دورکاری' : '';  ?></p>
<p class="m-b0"><?php echo  (isset($data->emp4) && $data->emp4==1) ? 'کارآموز' : '';  ?></p>
<hr>
<h5 class="m-b15 prefer-title"><i class="fa fa-tasks"></i> مزایای شغلی موردنظر</h5>
<p class="m-b0"> <?php echo  (isset($data->adv1) && $data->adv1==1) ? '<i class="fa fa-user"></i>'.' '.'امکان ترفیع سمت' : '';  ?></p>
<p class="m-b0"><?php echo  (isset($data->adv2) && $data->adv2==1) ? '<i class="fa fa-medkit"></i>'.' '.' بیمه' : '';  ?></p>
<p class="m-b0"><?php echo  (isset($data->adv3) && $data->adv3==1) ? '<i class="fa fa-graduation-cap"></i>'.' '.' دوره های آموزشی' : '';  ?></p>
<p class="m-b0"><?php echo  (isset($data->adv4) && $data->adv4==1) ? '<i class="fa fa-train"></i>'.' '.'سرویس رفت و آمد' : '';  ?></p>
<p class="m-b0"><?php echo  (isset($data->adv5) && $data->adv5==1) ? '<i class="fa fa-cutlery"></i>'.' '.'غذا به عهده شرکت' : '';  ?></p>

<!-- Modal -->
<div class="modal fade modal-bx-info editor" id="prefer_job" tabindex="-1" role="dialog" aria-labelledby="ProfilesummaryModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ProfilesummaryModalLongTitle"> ترجیحات شغلی</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="form-group">
                            <label>حداقل حقوق درخواستی به دلار برای هر ساعت</label>
                            <input value="<?php echo isset($data->salary) ? $data->salary : '';  ?>" id="prefer_salary" class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>سطح ارشدیت در زمینه فعالیت</label>
                            <div>
                                <div class="form-check">
                                    <input <?php echo (isset($data->degree1) && $data->degree1 == 1) ? 'checked="checked"' : '';  ?> ckecked="ckecked" class="form-check-input" type="checkbox" id="prefer_degree1">
                                    <label class="form-check-label" for="degree1">
                                        تازه کار
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input <?php echo (isset($data->degree2) && $data->degree2 == 1) ? 'checked="checked"' : '';  ?> ckecked="ckecked" class="form-check-input" type="checkbox" id="prefer_degree2">
                                    <label class="form-check-label" for="degree2">
                                        متخصص
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input <?php echo (isset($data->degree3) && $data->degree3 == 1) ? 'checked="checked"' : '';  ?> ckecked="ckecked" class="form-check-input" type="checkbox" id="prefer_degree3">
                                    <label class="form-check-label" for="degree3">
                                        مدیر
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input <?php echo (isset($data->degree4) && $data->degree4 == 1) ? 'checked="checked"' : '';  ?> ckecked="ckecked" class="form-check-input" type="checkbox" id="prefer_degree4">
                                    <label class="form-check-label" for="degree4">
                                        مدیر ارشد
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>نوع قراردادهای قابل قبول</label>
                            <div>
                                <div class="form-check">
                                    <input <?php echo (isset($data->emp1) && $data->emp1 == 1) ? 'checked="checked"' : '';  ?> ckecked="ckecked" class="form-check-input" type="checkbox" id="prefer_emp1">
                                    <label class="form-check-label" for="emp1">
                                        تمام وقت
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input <?php echo (isset($data->emp2) && $data->emp2 == 1) ? 'checked="checked"' : '';  ?> ckecked="ckecked" class="form-check-input" type="checkbox" id="prefer_emp2">
                                    <label class="form-check-label" for="emp2">
                                        پاره وقت
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input <?php echo (isset($data->emp3) && $data->emp3 == 1) ? 'checked="checked"' : '';  ?> ckecked="ckecked" class="form-check-input" type="checkbox" id="prefer_emp3">
                                    <label class="form-check-label" for="emp3">
                                        دورکاری
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input <?php echo (isset($data->emp4) && $data->emp4 == 1) ? 'checked="checked"' : '';  ?> ckecked="ckecked" class="form-check-input" type="checkbox" id="prefer_emp4">
                                    <label class="form-check-label" for="emp4">
                                        کارآموز
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                            <label>مزایای شغلی موردنظر</label>
                            <div>
                                <div class="form-check">
                                    <input <?php echo (isset($data->adv1) && $data->adv1 == 1) ? 'checked="checked"' : '';  ?> ckecked="ckecked" class="form-check-input" type="checkbox" id="prefer_adv1">
                                    <label class="form-check-label" for="emp1">
                                        امکان ترفیع سمت
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input <?php echo (isset($data->adv2) && $data->adv2 == 1) ? 'checked="checked"' : '';  ?> ckecked="ckecked" class="form-check-input" type="checkbox" id="prefer_adv2">
                                    <label class="form-check-label" for="emp2">
                                       بیمه
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input <?php echo (isset($data->adv3) && $data->adv3 == 1) ? 'checked="checked"' : '';  ?> ckecked="ckecked" class="form-check-input" type="checkbox" id="prefer_adv3">
                                    <label class="form-check-label" for="emp3">
                                        دوره های آموزشی
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input <?php echo (isset($data->adv4) && $data->adv4 == 1) ? 'checked="checked"' : '';  ?> ckecked="ckecked" class="form-check-input" type="checkbox" id="prefer_adv4">
                                    <label class="form-check-label" for="emp4">
                                        سرویس رفت و آمد
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input <?php echo (isset($data->adv5) && $data->adv5 == 1) ? 'checked="checked"' : '';  ?> ckecked="ckecked" class="form-check-input" type="checkbox" id="prefer_adv5">
                                    <label class="form-check-label" for="emp4">
                                        غذا به عهده شرکت
                                    </label>
                                </div>
                            </div>
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
                'meta_key':'resume-prefer',
                'meta_action':'resume-prefer',
                'salary':$('#prefer_salary').val(),
                'degree1':($('#prefer_degree1').is(':checked') ? 1 : 0),
                'degree2':($('#prefer_degree2').is(':checked') ? 1 : 0),
                'degree3':($('#prefer_degree3').is(':checked') ? 1 : 0),
                'degree4':($('#prefer_degree4').is(':checked') ? 1 : 0),
                'emp1':($('#prefer_emp1').is(':checked') ? 1 : 0),
                'emp2':($('#prefer_emp2').is(':checked') ? 1 : 0),
                'emp3':($('#prefer_emp3').is(':checked') ? 1 : 0),
                'emp4':($('#prefer_emp4').is(':checked') ? 1 : 0),
                'adv1':($('#prefer_adv1').is(':checked') ? 1 : 0),
                'adv2':($('#prefer_adv2').is(':checked') ? 1 : 0),
                'adv3':($('#prefer_adv3').is(':checked') ? 1 : 0),
                'adv4':($('#prefer_adv4').is(':checked') ? 1 : 0),
                'adv5':($('#prefer_adv5').is(':checked') ? 1 : 0)
            }
            ,$('#prefer_job_bx')
            ,$('#prefer_job')
            ,$('#dzFormMsg-error-prefer')
        )" type="button" class="site-button">ذخیره</button>

                <div id="dzFormMsg-error-prefer" class="dzFormMsg error"></div>
            </div>
        </div>
    </div>
</div>
<!-- Modal End -->