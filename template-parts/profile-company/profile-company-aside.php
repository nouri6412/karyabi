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
				<h4 class="m-b5"><?php echo $user_info->user_nicename;  ?></h4>
			</div>
		</div> 
		<ul>
			<li><a href="<?php  echo home_url('profile') ?>" class="active">
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<span>پروفایل</span></a></li>
			<li><a href="<?php  echo home_url('profile?action=create-job') ?>">
					<i class="fa fa-file-text-o" aria-hidden="true"></i>
					<span>ارسال شغل</span></a></li>
			<li><a href="<?php  echo home_url('profile?action=my-jobs') ?>">
					<i class="fa fa-briefcase" aria-hidden="true"></i>
					<span>آگهی های من</span></a></li>
			<li><a href="<?php  echo home_url('profile?action=request') ?>">
					<i class="fa fa-id-card-o" aria-hidden="true"></i>
					<span>رزومه های ارسالی</span></a></li>
			<li><a href="<?php  echo home_url('profile?action=change-pass') ?>">
					<i class="fa fa-key" aria-hidden="true"></i>
					<span>تغییر رمز عبور</span></a></li>
			<li><a href="<?php echo wp_logout_url(site_url()); ?>">
					<i class="fa fa-sign-out" aria-hidden="true"></i>
					<span>خروج</span></a></li>
		</ul>
	</div>
</div>