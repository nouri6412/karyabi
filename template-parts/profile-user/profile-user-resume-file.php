
<?php
$user_meta = get_query_var('user_meta');
?>
<h5 class="m-b10">آپلود رزومه</h5>
<p>رزومه مهمترین مدرکی است که استخدام کنندگان به دنبال آن هستند. استخدام کنندگان به طور کلی به پروفایل های های بدون رزومه نگاه نمی کنند.</p>
<div class="row">
    <div class="col-lg-12 col-md-12">
        <div class="form-group">
            <div class="custom-file">
                <p class="m-auto align-self-center">
                    <i class="fa fa-upload"></i>
                    آپلود (حداکثر 3 مگابایت)
                </p>
                <input onchange="ajax_mbm_upload_file($(this),'link-resume-uploaded')" type="file" class="site-button form-control">
                <div>
                <?php
					$resume = '';
                    $display="display:none";
					if (isset($user_meta['resume-file'])) {
                        $display='';
						$resume = $user_meta['resume-file'][0];
					}
					?>
                    <a target="_blank" href="<?php echo $resume; ?>" id="link-resume-uploaded" style="<?php echo $display; ?>">برای مشاهده اینجا کلیک فرمائید</a>
                </div>
                <div class="box-loading">
                    <div class="loading-ajax"></div>
                </div>
            </div>
        </div>
    </div>
</div>