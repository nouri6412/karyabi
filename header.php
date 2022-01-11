<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
	
	<!-- FAVICONS ICON -->
	<link rel="icon" href="images/favicon.ico" type="<?php echo get_template_directory_uri(); ?>/assets/image/x-icon">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png">
	
	<!-- PAGE TITLE HERE -->
    <?php wp_head(); ?>
	
	<!-- MOBILE SPECIFIC -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/IRANYekan/css/iranyekan.css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/fonts/pelak/css/pelak.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/plugins.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/plugins/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/plugins/themify/themify-icons.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/style.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/templete.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/rtl.min.css">
	<link class="skin" rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/skin/skin-1.min.css">
    <link href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet" type="text/css" />
</head>
<body id="bg">
<div id="loading-area"></div>
<div class="page-wraper">
	<!-- header -->
    <header class="site-header mo-left header fullwidth">
		<!-- main header -->
        <div class="sticky-header main-bar-wraper navbar-expand-lg">
            <div class="main-bar clearfix">
                <div class="container clearfix">
                    <!-- website logo -->
                    <div class="logo-header mostion">
						<a href="index.html"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" class="logo" alt=""></a>
					</div>
                    <!-- nav toggle button -->
                    <!-- nav toggle button -->
                    <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span></span>
						<span></span>
						<span></span>
					</button>
                    <!-- extra nav -->
                    <div class="extra-nav">
                        <div class="extra-cell">
                            <a href="register-2.html" class="site-button"><i class="fa fa-user"></i> ثبت نام</a>
							<a href="#" title="اطلاعات بیشتر" rel="bookmark" data-toggle="modal" data-target="#car-details" class="site-button"><i class="fa fa-lock"></i> ورود </a>
                        </div>
                    </div>
                    <!-- main nav -->
                    <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                        <ul class="nav navbar-nav">
							<li class="active">
								<a href="#">صفحات اصلی <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="index.html" class="dez-page">خانه 1</a></li>
									<li><a href="index-2.html" class="dez-page">خانه 2</a></li>
								</ul>
							</li>
							<li>
								<a href="#">کارجویان <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="jobs-profile.html" class="dez-page">پروفایل</a></li>
									<li><a href="jobs-my-resume.html" class="dez-page">رزومه</a></li>
									<li><a href="jobs-applied-job.html" class="dez-page">شغل های درخواستی</a></li>
									<li><a href="jobs-alerts.html" class="dez-page">شغل های پیشنهادی</a></li>
									<li><a href="jobs-saved-jobs.html" class="dez-page">شغل های ذخیره</a></li>
									<li><a href="jobs-cv-manager.html" class="dez-page">مدیریت رزومه</a></li>
									<li><a href="jobs-change-password.html" class="dez-page">تغییر رمز عبور</a></li>
								</ul>
							</li>
							<li>
								<a href="#">کارفرما <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="company-profile.html" class="dez-page">پروفایل شرکت</a></li>
									<li><a href="company-resume.html" class="dez-page">رزومه</a></li>
									<li><a href="company-post-jobs.html" class="dez-page">ارسال مشاغل</a></li>
									<li><a href="company-manage-job.html" class="dez-page">مدیریت مشاغل</a></li>
									<li><a href="company-transactions.html" class="dez-page">معاملات</a></li>
									<li><a href="browse-candidates.html" class="dez-page">جستجوی کارجویان</a></li>
									<li><a href="javascript:void(0);" class="dez-page">ثبت نام <span class="new-page">جدید</span> <i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="create-account.html" class="dez-page">ثبت کارفرما</a></li>
											<li><a href="account-fresher.html" class="dez-page">ثبت کارجوی جدید</a></li>
											<li><a href="account-professional.html" class="dez-page">ثبت کارجوی حرفه ای</a></li>
										</ul>
									</li>
								</ul>
							</li>
							<li>
								<a href="#">صفحات <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="about-us.html" class="dez-page">درباره ما</a></li>
									<li><a href="job-detail.html" class="dez-page">جزئیات شغل</a></li>
									<li><a href="companies.html" class="dez-page">شرکا</a></li>
									<li><a href="free-job-alerts.html" class="dez-page">شغل های باز</a></li>
									<li><a href="#" class="dez-page">جستجوی شغل <i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="browse-job-list.html" class="dez-page">لیست شغل ها</a></li>
											<li><a href="browse-job-grid.html" class="dez-page">لیست شغل ها جدولی </a></li>
											<li><a href="browse-job-filter-list.html" class="dez-page">لیست شغل های فیلتر شده </a></li>
											<li><a href="browse-job-filter-grid.html" class="dez-page">لیست شغل های فیلتر شده جدولی </a></li>
										</ul>
									</li>
									<li><a href="#" class="dez-page">شغل ها<i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="category-all-jobs.html" class="dez-page">همه</a></li>
											<li><a href="category-company-jobs.html" class="dez-page">شرکتی</a></li>
											<li><a href="category-designations-jobs.html" class="dez-page">تعیین شده</a></li>
											<li><a href="category-jobs.html" class="dez-page">دسته بندی ها</a></li>
											<li><a href="category-location-jobs.html" class="dez-page">بر اساس مکان</a></li>
											<li><a href="category-skill-jobs.html" class="dez-page">بر اساس مهارت</a></li>
										</ul>
									</li>									
									<li><a href="#" class="dez-page">نمونه کارها <i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="portfolio-grid-2.html" class="dez-page">نمونه کارها 2 </a></li>
											<li><a href="portfolio-grid-3.html" class="dez-page">نمونه کارها 3 </a></li>
											<li><a href="portfolio-grid-4.html" class="dez-page">نمونه کارها 4 </a></li>
										</ul>
									</li>
									<li><a href="#" class="dez-page">ورود <i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="login.html" class="dez-page">ورود 1</a></li>
											<li><a href="login-2.html" class="dez-page">ورود 2 </a></li>
											<li><a href="login-3.html" class="dez-page">ورود 3 </a></li>
										</ul>
									</li>
									<li><a href="#" class="dez-page">ثبت نام <i class="fa fa-angle-right"></i></a>
										<ul class="sub-menu">
											<li><a href="register.html" class="dez-page">ثبت نام 1</a></li>
											<li><a href="register-2.html" class="dez-page">ثبت نام 2 </a></li>
										</ul>
									</li>
									<li><a href="error-404.html" class="dez-page">خطای 404</a></li>
									<li><a href="coming-soon.html" class="dez-page">به زودی</a></li>
									<li><a href="contact.html" class="dez-page">ارتباط با ما</a></li>
								</ul>
							</li>
							<li>
								<a href="#">بلاگ <i class="fa fa-chevron-down"></i></a>
								<ul class="sub-menu">
									<li><a href="blog-classic.html" class="dez-page">کلاسیک</a></li>
									<li><a href="blog-classic-sidebar.html" class="dez-page">کلاسیک با نوار کناری</a></li>
									<li><a href="blog-detailed-grid.html" class="dez-page">جدولی با جزئیات</a></li>
									<li><a href="blog-detailed-grid-sidebar.html" class="dez-page">جدولی با نوار کناری</a></li>
									<li><a href="blog-left-img.html" class="dez-page">تصویر دار با نوار کناری</a></li>
									<li><a href="blog-details.html" class="dez-page">جزئیات وبلاگ</a></li>
								</ul>
							</li>
						</ul>			
                    </div>
                </div>
            </div>
        </div>
        <!-- main header END -->
    </header>
    <!-- header END -->