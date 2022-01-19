<?php
///post type contact

function karyabi_post_type_contact()
{

    $supports = array(
        'title', // post title
        'thumbnail', // featured images
		'editor',
		'excerpt',
        'custom-fields', // custom fields
        'post-formats', // post formats
		
    );

    $labels = array(
        'name' => _x('ارتباط با ما', 'plural'),
        'singular_name' => _x('ارتباط با ما', 'singular'),
        'menu_name' => _x('ارتباط با ما', 'admin menu'),
        'name_admin_bar' => _x('ارتباط با ما', 'admin bar'),
        'add_new' => _x('ثبت ارتباط با ما جدید', 'add new'),
        'add_new_item' => "ثبت ارتباط با ما جدید",
        'new_item' => "ارتباط با ما جدید",
        'edit_item' => "ویرایش ارتباط با ما",
        'view_item' => "مشاهده ارتباط با ما",
        'all_items' => "همه ارتباط با ما ها",
        'search_items' => "جستجوی ارتباط با ما",
        'not_found' => "یافت نشد"
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'contact_form'),
        'has_archive' => true,
        'hierarchical' => false,
        // 'capabilities' => array(
        //     'create_posts' => 'do_not_allow'
        // )
    );
    register_post_type('contact_form', $args);
}
add_action('init', 'karyabi_post_type_contact');

///post type our-service

function karyabi_post_type_service()
{

    $supports = array(
        'title', // post title
        'thumbnail', // featured images
		'editor',
		'excerpt',
        'custom-fields', // custom fields
        'post-formats', // post formats
		
    );

    $labels = array(
        'name' => _x('خدمات ما', 'plural'),
        'singular_name' => _x('خدمات ما', 'singular'),
        'menu_name' => _x('خدمات ما', 'admin menu'),
        'name_admin_bar' => _x('خدمات ما', 'admin bar'),
        'add_new' => _x('ثبت خدمات ما جدید', 'add new'),
        'add_new_item' => "ثبت خدمات ما جدید",
        'new_item' => "خدمات ما جدید",
        'edit_item' => "ویرایش خدمات ما",
        'view_item' => "مشاهده خدمات ما",
        'all_items' => "همه خدمات ما ها",
        'search_items' => "جستجوی خدمات ما",
        'not_found' => "یافت نشد"
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'our-service'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('our-service', $args);
}
add_action('init', 'karyabi_post_type_service');


///post type job

function karyabi_post_type_job()
{

    $supports = array(
        'title', // post title
        'thumbnail', // featured images
		'editor',
		'excerpt',
        'custom-fields', // custom fields
        'post-formats', // post formats
		
    );

    $labels = array(
        'name' => _x('آگهی شغل', 'plural'),
        'singular_name' => _x(' آگهی شغل', 'singular'),
        'menu_name' => _x('آگهی شغل', 'admin menu'),
        'name_admin_bar' => _x('آگهی شغل', 'admin bar'),
        'add_new' => _x('ثبت آگهی شغل جدید', 'add new'),
        'add_new_item' => "ثبت  آگهی شغل جدید",
        'new_item' => " آگهی شغل جدید",
        'edit_item' => "ویرایش  آگهی شغل",
        'view_item' => "مشاهده  آگهی شغل",
        'all_items' => "همه  آگهی شغل ها",
        'search_items' => "جستجوی  آگهی شغل",
        'not_found' => "یافت نشد"
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'job'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('job', $args);
}
add_action('init', 'karyabi_post_type_job');

///post type state

function karyabi_post_type_state()
{

    $supports = array(
        'title', // post title
        'thumbnail', // featured images
		'editor',
		'excerpt',
        'custom-fields', // custom fields
        'post-formats', // post formats
		
    );

    $labels = array(
        'name' => _x('استان', 'plural'),
        'singular_name' => _x('استان', 'singular'),
        'menu_name' => _x('استان', 'admin menu'),
        'name_admin_bar' => _x('استان', 'admin bar'),
        'add_new' => _x('ثبت استان جدید', 'add new'),
        'add_new_item' => "ثبت  استان جدید",
        'new_item' => " استان  جدید",
        'edit_item' => "ویرایش  استان ",
        'view_item' => "مشاهده  استان",
        'all_items' => "همه  استان ها",
        'search_items' => "جستجوی   استان",
        'not_found' => "یافت نشد"
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'state'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('state', $args);
}
add_action('init', 'karyabi_post_type_state');

///post type city

function karyabi_post_type_city()
{

    $supports = array(
        'title', // post title
        'thumbnail', // featured images
		'editor',
		'excerpt',
        'custom-fields', // custom fields
        'post-formats', // post formats
		
    );

    $labels = array(
        'name' => _x('شهر', 'plural'),
        'singular_name' => _x('شهر', 'singular'),
        'menu_name' => _x('شهر', 'admin menu'),
        'name_admin_bar' => _x('شهر', 'admin bar'),
        'add_new' => _x('ثبت شهر جدید', 'add new'),
        'add_new_item' => "ثبت  شهر جدید",
        'new_item' => " شهر  جدید",
        'edit_item' => "ویرایش  شهر ",
        'view_item' => "مشاهده  شهر",
        'all_items' => "همه  شهر ها",
        'search_items' => "جستجوی   شهر",
        'not_found' => "یافت نشد"
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'city'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('city', $args);
}
add_action('init', 'karyabi_post_type_city');


///post type category company

function karyabi_post_type_company_cat()
{

    $supports = array(
        'title', // post title
        'thumbnail', // featured images
		'editor',
		'excerpt',
        'custom-fields', // custom fields
        'post-formats', // post formats
		
    );

    $labels = array(
        'name' => _x('دسته شرکت ها', 'plural'),
        'singular_name' => _x('دسته شرکت ها', 'singular'),
        'menu_name' => _x('دسته شرکت ها', 'admin menu'),
        'name_admin_bar' => _x('دسته شرکت ها', 'admin bar'),
        'add_new' => _x('ثبت  دسته شرکت ها', 'add new'),
        'add_new_item' => "ثبت  دسته شرکت ها جدید",
        'new_item' => " دسته شرکت ها  جدید",
        'edit_item' => "ویرایش  دسته شرکت ها ",
        'view_item' => "مشاهده  دسته شرکت ها",
        'all_items' => "همه  دسته شرکت ها ها",
        'search_items' => "جستجوی   دسته شرکت ها",
        'not_found' => "یافت نشد"
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'company-cat'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('company-cat', $args);
}
add_action('init', 'karyabi_post_type_company_cat');

///post type tag

function karyabi_post_type_job_tag()
{

    $supports = array(
        'title', // post title
        'thumbnail', // featured images
		'editor',
		'excerpt',
        'custom-fields', // custom fields
        'post-formats', // post formats
		
    );

    $labels = array(
        'name' => _x('تگ شغل', 'plural'),
        'singular_name' => _x('تگ شغل', 'singular'),
        'menu_name' => _x('تگ شغل', 'admin menu'),
        'name_admin_bar' => _x('تگ شغل', 'admin bar'),
        'add_new' => _x('ثبت تگ شغل جدید', 'add new'),
        'add_new_item' => "ثبت  تگ شغل جدید",
        'new_item' => " تگ شغل  جدید",
        'edit_item' => "ویرایش  تگ شغل ",
        'view_item' => "مشاهده  تگ شغل",
        'all_items' => "همه  تگ شغل ها",
        'search_items' => "جستجوی   تگ شغل",
        'not_found' => "یافت نشد"
    );

    $args = array(
        'supports' => $supports,
        'labels' => $labels,
        'public' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'job-tag'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('job-tag', $args);
}
add_action('init', 'karyabi_post_type_job_tag');