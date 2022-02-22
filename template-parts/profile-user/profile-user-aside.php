<?php
$user_info = get_query_var('user_info');
$user_meta = get_query_var('user_meta');
$page_action = get_query_var('page_action');
?>
<div class="sticky-top">
	<div class="candidate-info company-info candidate-info onepage">
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
			<?php if ($user_meta["profile_user_id"] == 0) { ?>
				<li><a href="<?php echo home_url('profile') ?>" class="active">
						<i class="fa fa-user-o" aria-hidden="true"></i>
						<span>پروفایل</span></a></li>
			<?php  } else {?>
				<li><a class="scroll-bar nav-link" href="#profile_bx">
						<span> مشخصات کاربر</span></a></li>
				<?php  }?>
			<?php if ($page_action == "resume") { ?>
				<li><a class="scroll-bar nav-link" href="#profile_summary_bx">
						<span>درباره من</span></a></li>
				<li><a class="scroll-bar nav-link" href="#key_skills_bx">
						<span>مهارت های حرفه ای</span></a></li>
				<li><a class="scroll-bar nav-link" href="#employment_bx">
						<span>سوابق شغلی</span></a></li>
				<li><a class="scroll-bar nav-link" href="#eduction_bx">
						<span>سوابق تحصیلی</span></a></li>
				<li><a class="scroll-bar nav-link" href="#language_bx">
						<span>زبان ها</span></a></li>
				<li><a class="scroll-bar nav-link" href="#prefer_job_bx">
						<span>ترجیحات شغلی</span></a></li>

			<?php } else { ?>
				<li><a href="<?php echo home_url('profile?action=resume') ?>">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						<span>رزومه ساز</span></a></li>
						<li><a target="_Blank" href="<?php echo home_url('resume?user_id='.$user_info->ID) ?>">
						<i class="fa fa-file-text-o" aria-hidden="true"></i>
						<span> مشاهده رزومه</span></a></li>
				<li><a href="<?php echo home_url('profile?action=favorite') ?>">
						<i class="fa fa-heart-o" aria-hidden="true"></i>
						<span>شغل های ذخیره شده</span></a></li>
				<li><a href="<?php echo home_url('profile?action=jobs') ?>">
						<i class="fa fa-briefcase" aria-hidden="true"></i>
						<span>شغل های ثبت شده</span></a></li>
				<li><a href="<?php echo home_url('profile?action=request') ?>">
						<i class="fa fa-id-card-o" aria-hidden="true"></i>
						<span>درخواست های من</span></a></li>
				<li><a href="<?php echo home_url('profile?action=change-pass') ?>">
						<i class="fa fa-key" aria-hidden="true"></i>
						<span>تغییر رمز عبور</span></a></li>
				<li><a href="<?php echo wp_logout_url(site_url()); ?>">
						<i class="fa fa-sign-out" aria-hidden="true"></i>
						<span>خروج</span></a></li>
			<?php } ?>
		</ul>
	</div>
</div>