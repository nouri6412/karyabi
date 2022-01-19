<?php
$user_info = get_query_var('user_info');
$user_meta = get_query_var('user_meta');
?>
<div class="sticky-top">
	<div class="candidate-info company-info">
		<div class="candidate-detail text-center">
			<div class="canditate-des">
				<a href="javascript:void(0);">
					<?php
					$avatar = get_field('header', 'option')["logo"];
					if (isset($user_meta['avatar'])) {
						$avatar = $user_meta['avatar'][0];
					}
					?>
					<img id="profile-avatar" alt="" src="<?php echo $avatar; ?>">
				</a>
				<div class="upload-link" title="آپلود عکس پروفایل" data-toggle="tooltip" data-placement="left">
					<input onchange="ajax_mbm_upload_image($(this),'profile-avatar')" type="file" class="update-flie">
					<i class="fa fa-pencil"></i>
				</div>
			</div>
			<div class="candidate-title">
				<h4 class="m-b5"><a href="javascript:void(0);">ادمین</a></h4>
			</div>
		</div>
		<ul>
			<li><a href="company-profile.html" class="active">
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<span>پروفایل</span></a></li>
			<li><a href="company-post-jobs.html">
					<i class="fa fa-file-text-o" aria-hidden="true"></i>
					<span>ارسال شغل</span></a></li>
			<li><a href="company-transactions.html">
					<i class="fa fa-random" aria-hidden="true"></i>
					<span>معاملات</span></a></li>
			<li><a href="company-manage-job.html">
					<i class="fa fa-briefcase" aria-hidden="true"></i>
					<span>مدیریت</span></a></li>
			<li><a href="company-resume.html">
					<i class="fa fa-id-card-o" aria-hidden="true"></i>
					<span>رزومه</span></a></li>
			<li><a href="jobs-change-password.html">
					<i class="fa fa-key" aria-hidden="true"></i>
					<span>تغییر رمز عبور</span></a></li>
			<li><a href="index.html">
					<i class="fa fa-sign-out" aria-hidden="true"></i>
					<span>خروج</span></a></li>
		</ul>
	</div>
</div>