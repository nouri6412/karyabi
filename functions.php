<?php
//************************* dynamic title *****************************
function karyabi_theme_support(){
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('category-thumbnails');
}
add_action('after_setup_theme','karyabi_theme_support');


///menu
require get_template_directory() . '/inc/menu.php';


/// tools

require get_template_directory() . '/inc/jdf.php';
require get_template_directory() . '/inc/tools.php';


/// post type
require get_template_directory() . '/inc/post_type.php';



///// setting page acf

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'تنظیمات  قالب کاریابی',
		'menu_title'	=> 'تنظیمات  قالب کاریابی',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'فوتر',
		'menu_title'	=> 'فوتر',
        'menu_slug' 	=> 'theme-general-settings-footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
}



/// ajax
 function karyabi_theme_scripts()
{
    global $wp_query;

    wp_enqueue_script(
        'karyabi_ajax_script',
        get_template_directory_uri() . '/assets/js/ajax.js',
        array('jquery'),
        1,
        true
    );

    wp_localize_script('karyabi_ajax_script', 'karyabi_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ));
}

add_action('wp_enqueue_scripts', 'karyabi_theme_scripts');

require get_template_directory() . '/inc/ajax.php';
