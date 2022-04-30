<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Karyabi
 * @since 1.0.0
 * Template Name: صفحه ثبت نام کارفرما
 */



get_header();
?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Content -->
<div style="background-color: #f5f5f5;"  class="page-content bg-white">
	<!-- contact area -->
	<div class="section-full content-inner browse-job shop-account">
		<!-- Product -->
		<div class="container">
		<h2 class="font-weight-700 m-b5">ثبت نام کارفرمایان</h2>
			<div class="row">
				<div class="col-md-12 m-b30">
					<div style="border-radius: 15px;    box-shadow: 0 0 10px 0 rgb(46 46 48 / 33%);" class="p-a30 job-bx max-w500 radius-sm bg-white m-auto">
						<div class="tab-content">
							<p class="font-weight-600">اگر با ما حساب کاربری دارید <a href="<?php echo site_url() . '?login=user' ?>">لطفا وارد شوید</a></p>
							<input id="user_type" name="user_type" value="company" type="hidden" />
							<div class="form-group">
								<label class="font-weight-700">نام کاربری</label>
								<input name="user_login" id="user_login" required="" class="form-control" placeholder="نام کاربری" type="text">
							</div>
							<div class="form-group">
								<label class="font-weight-700">ایمیل</label>
								<input name="user_email" id="user_email" required="" class="form-control" placeholder="ایمیل شما" type="email">
							</div>
							<div class="form-group">
								<label class="font-weight-700">رمز عبور</label>
								<input name="pass" id="pass" required="" class="form-control " placeholder="رمز عبور خود را وارد کنید" type="password">
							</div>
							<div class="form-group">
								<label class="font-weight-700">تکرار رمز عبور</label>
								<input name="re_pass" id="re_pass" required="" class="form-control " placeholder="تکرار رمز عبور خود را وارد کنید" type="password">
							</div>
							<div class="g-recaptcha" data-sitekey="6LfFKbIfAAAAABRWO4waTNu84exW-A_nUcI1STx-"></div>

							<div class="text-left">
								<div class="box-loading">
									<div class="loading-ajax"></div>
								</div>

								<button onclick="ajax_submit_mbm_register(
										$('#user_login').val()
										,$('#user_email').val()
										,$('#pass').val()
										,$('#re_pass').val()
										,$('#user_type').val()
										,$('#dzFormMsg-error')
                                        ,$('#dzFormMsg-doned'))
										" name="wp-submit" id="wp-submit" class="site-button button-lg outline outline-2">ایجاد حساب</button>
							</div>
							<div id="dzFormMsg-error" class="dzFormMsg error"></div>
							<div id="dzFormMsg-doned" class="dzFormMsg doned"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Product END -->
	</div>
	<!-- contact area  END -->
</div>
<!-- Content END-->

<?php
get_footer();
