<?php
$form_data = get_query_var('resume_edu');
$date_from = isset($form_data->date_from) ? $form_data->date_from : 0;
$date_to = isset($form_data->date_to) ? $form_data->date_to : 0;
?>
<div class="form-loop">
    <div class="row">
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>دانشگاه</label>
                <input value="<?php echo isset($form_data->uni) ? $form_data->uni : '';  ?>" data-id="uni" class="form-control" placeholder="">
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>رشته</label>
                <input value="<?php echo isset($form_data->major) ? $form_data->major : '';  ?>" data-id="major" class="form-control" placeholder="نام شرکت خود را وارد کنید">
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="form-group">
                <label>مقطع</label>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <select data-id="grade">
                            <option <?php echo (isset($form_data->major) && $form_data->major=="دیپلم")? 'selected' : '';  ?>  value="<?php echo "دیپلم"; ?>"><?php echo "دیپلم"; ?></option>
                            <option <?php echo (isset($form_data->major) && $form_data->major=="کاردانی")? 'selected' : '';  ?>  value="<?php echo "کاردانی"; ?>"><?php echo "کاردانی"; ?></option>
                            <option <?php echo (isset($form_data->major) && $form_data->major=="کارشناسی")? 'selected' : '';  ?>  value="<?php echo "کارشناسی"; ?>"><?php echo "کارشناسی"; ?></option>
                            <option <?php echo (isset($form_data->major) && $form_data->major=="کارشناسی ارشد")? 'selected' : '';  ?>  value="<?php echo "کارشناسی ارشد"; ?>"><?php echo "کارشناسی ارشد"; ?></option>
                            <option <?php echo (isset($form_data->major) && $form_data->major=="دکترا و بالاتر")? 'selected' : '';  ?>  value="<?php echo "دکترا و بالاتر"; ?>"><?php echo "دکترا و بالاتر"; ?></option>
                            <option <?php echo (isset($form_data->major) && $form_data->major=="دیگر")? 'selected' : '';  ?>  value="<?php echo "دیگر"; ?>"><?php echo "دیگر"; ?></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>از سال</label>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <select data-id="date_from">
                            <?php
                            for ($x = 2000; $x < date("Y"); $x++) {
                                $selected = "";
                                if ($x == $date_from) {
                                    $selected = "selected";
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
                        <select data-id="date_to">
                            <?php
                            for ($x = 2000; $x < date("Y"); $x++) {
                                $selected = "";
                                if ($x == $date_to) {
                                    $selected = "selected";
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

    </div>
    <button onclick="ajax_submit_mbm_post_data_resume_get_form_delete($(this))" class="btn btn-warning btn-delete">حذف <i class="fa fa-remove"></i></button>
</div>