<?php
$form_data = get_query_var('resume_lang');
?>
<div class="form-loop">
    <div class="row">
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label>زبان</label>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                        <select data-id="title" class="form-control" >
                            <!--v-repeat-start-->
                            <option <?php echo (isset($form_data->title) && $form_data->title=="آذری")? 'selected' : '';  ?> value="<?php echo "آذری"; ?>"><?php echo "آذری"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="آلمانی")? 'selected' : '';  ?> value="<?php echo "آلمانی"; ?>"><?php echo "آلمانی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="ارمنی")? 'selected' : '';  ?> value="<?php echo "ارمنی"; ?>"><?php echo "ارمنی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="اسپانیایی")? 'selected' : '';  ?> value="<?php echo "اسپانیایی"; ?>"><?php echo "اسپانیایی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="انگلیسی")? 'selected' : '';  ?> value="<?php echo "انگلیسی"; ?>"><?php echo "انگلیسی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="ایتالیایی")? 'selected' : '';  ?> value="<?php echo "ایتالیایی"; ?>"><?php echo "ایتالیایی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="ترکی استانبولی")? 'selected' : '';  ?> value="<?php echo "ترکی استانبولی"; ?>"><?php echo "ترکی استانبولی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="چینی")? 'selected' : '';  ?> value="<?php echo "چینی"; ?>"><?php echo "چینی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="روسی")? 'selected' : '';  ?> value="<?php echo "روسی"; ?>"><?php echo "روسی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="ژاپنی")? 'selected' : '';  ?> value="<?php echo "ژاپنی"; ?>"><?php echo "ژاپنی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="سوئدی")? 'selected' : '';  ?> value="<?php echo "سوئدی"; ?>"><?php echo "سوئدی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="عربی")? 'selected' : '';  ?> value="<?php echo "عربی"; ?>"><?php echo "عربی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="فارسی")? 'selected' : '';  ?> value="<?php echo "فارسی"; ?>"><?php echo "فارسی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="فرانسوی")? 'selected' : '';  ?> value="<?php echo "فرانسوی"; ?>"><?php echo "فرانسوی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="فنلاندی")? 'selected' : '';  ?> value="<?php echo "فنلاندی"; ?>"><?php echo "فنلاندی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="کردی")? 'selected' : '';  ?> value="<?php echo "کردی"; ?>"><?php echo "کردی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="کره ای")? 'selected' : '';  ?> value="<?php echo "کره ای"; ?>"><?php echo "کره ای"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="هلندی")? 'selected' : '';  ?> value="<?php echo "هلندی"; ?>"><?php echo "هلندی"; ?></option>
                            <option <?php echo (isset($form_data->title) && $form_data->title=="هندی")? 'selected' : '';  ?> value="<?php echo "هندی"; ?>"><?php echo "هندی"; ?></option>
                            <!--v-repeat-end-->
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-6">
            <div class="form-group">
                <label> سطح تسلط</label>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-6">
                    <select data-id="degree" class="form-control" >
                            <!--v-repeat-start-->
                            <option <?php echo (isset($form_data->degree) && $form_data->degree=="مبتدی")? 'selected' : '';  ?> value="<?php echo "مبتدی"; ?>"><?php echo "مبتدی"; ?></option>
                            <option <?php echo (isset($form_data->degree) && $form_data->degree=="متوسط")? 'selected' : '';  ?> value="<?php echo "متوسط"; ?>"><?php echo "متوسط"; ?></option>
                            <option <?php echo (isset($form_data->degree) && $form_data->degree=="حرفه ای")? 'selected' : '';  ?> value="<?php echo "حرفه ای"; ?>"><?php echo "حرفه ای"; ?></option>
                            <option <?php echo (isset($form_data->degree) && $form_data->degree=="زبان مادری")? 'selected' : '';  ?> value="<?php echo "زبان مادری"; ?>"><?php echo "زبان مادری"; ?></option>
                            <!--v-repeat-end-->
                        </select>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <button onclick="ajax_submit_mbm_post_data_resume_get_form_delete($(this))" class="btn btn-warning btn-delete">حذف <i class="fa fa-remove"></i></button>
</div>