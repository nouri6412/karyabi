<?php
$form_data = get_query_var('resume_exp');
$date_from=isset($form_data->date_from) ? $form_data->date_from : 0;
$date_to=isset($form_data->date_to) ? $form_data->date_to : 0;
?>
<div class="form-loop">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>موقعیت شغلی شما</label>
                <input value="<?php echo isset($form_data->title) ? $form_data->title : '';  ?>" data-id="title"  class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>شرکت</label>
                <input value="<?php echo isset($form_data->company) ? $form_data->company : '';  ?>" data-id="company"  class="form-control" placeholder="نام شرکت خود را وارد کنید">
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>از سال</label>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <select data-id="date_from" class="form-control">
                            <?php
                            for ($x = 2000; $x < date("Y"); $x++) {
                                $selected="";
                                if($x==$date_from)
                                {
                                    $selected="selected";
                                }
                            ?>
                                <option <?php echo $selected; ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>تا سال</label>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <select data-id="date_to" class="form-control">
                        <?php
                            for ($x = 2000; $x < date("Y"); $x++) {
                                $selected="";
                                if($x==$date_to)
                                {
                                    $selected="selected";
                                }
                            ?>
                                <option <?php echo $selected; ?> value="<?php echo $x; ?>"><?php echo $x; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-md-12">
            <div class="form-group">
                <label>مشخصات کار خود را شرح دهید</label>
                <textarea data-id="desc" class="form-control" placeholder="توضیحات"><?php echo isset($form_data->desc) ? $form_data->desc : '';  ?></textarea>
            </div>
        </div>
       
    </div>
    <button onclick="ajax_submit_mbm_post_data_resume_get_form_delete($(this))" class="btn btn-warning btn-delete">حذف <i class="fa fa-remove"></i></button>
</div>