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
        'rewrite' => array('slug' => 'contact-post'),
        'has_archive' => true,
        'hierarchical' => false,
    );
    register_post_type('contact-post', $args);
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