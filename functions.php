<?php
//************************* dynamic title *****************************
function karyabi_theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('category-thumbnails');
}
add_action('after_setup_theme', 'karyabi_theme_support');

add_filter('show_admin_bar', '__return_false');

// add tag support to pages
function tags_support_all()
{
    register_taxonomy_for_object_type('post_tag', 'page');
}

function register_session_new()
{
    if (!session_id()) {
        session_start();
    }
}

add_action('init', 'register_session_new');

// ensure all tags are included in queries
function tags_support_query($wp_query)
{
    if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
}

// tag hooks
add_action('init', 'tags_support_all');
add_action('pre_get_posts', 'tags_support_query');


///menu
require get_template_directory() . '/inc/menu.php';


/// tools

require get_template_directory() . '/inc/jdf.php';
require get_template_directory() . '/inc/tools.php';


/// post type
require get_template_directory() . '/inc/post_type.php';

/// helper
require get_template_directory() . '/inc/helper-functions.php';


/// template tags
require get_template_directory() . '/inc/template-tags.php';

/// template functions
require get_template_directory() . '/inc/template-functions.php';

/// icon
require get_template_directory() . '/inc/icon-functions.php';

/// classes
require get_template_directory() . '/classes/class-custom-theme-svg-icons.php';
require get_template_directory() . '/classes/class-custom-theme-walker-comment.php';



////save-post

foreach (glob(get_template_directory() . "/inc/save-post/*.php") as $filename) {
    require $filename;
}



///// setting page acf

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'تنظیمات  قالب کاریابی',
        'menu_title'    => 'تنظیمات  قالب کاریابی',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'فوتر',
        'menu_title'    => 'فوتر',
        'menu_slug'     => 'theme-general-settings-footer',
        'parent_slug'    => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'     => 'نوار کناری',
        'menu_title'    => 'نوار کناری',
        'menu_slug'     => 'theme-general-settings-widget',
        'parent_slug'    => 'theme-general-settings',
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
        false
    );

    wp_enqueue_script(
        'karyabi_ajax_file_script',
        get_template_directory_uri() . '/assets/js/file.js',
        array('jquery'),
        1,
        false
    );

    wp_enqueue_script(
        'karyabi_ajax_resume_script',
        get_template_directory_uri() . '/assets/js/resume.js',
        array('jquery'),
        1,
        false
    );

    wp_enqueue_script(
        'karyabi_ajax_request_script',
        get_template_directory_uri() . '/assets/js/request.js',
        array('jquery'),
        1,
        false
    );

    wp_enqueue_script(
        'karyabi_ajax_state_city_script',
        get_template_directory_uri() . '/assets/js/state-city.js',
        array('jquery'),
        1,
        false
    );

    wp_enqueue_script(
        'karyabi_ajax_user_script',
        get_template_directory_uri() . '/assets/js/user.js',
        array('jquery'),
        1,
        false
    );

    wp_enqueue_script(
        'karyabi_ajax_profile_company_script',
        get_template_directory_uri() . '/assets/js/profile-company.js',
        array('jquery'),
        1,
        false
    );

    wp_enqueue_script(
        'karyabi_ajax_profile_user_script',
        get_template_directory_uri() . '/assets/js/profile-user.js',
        array('jquery'),
        1,
        false
    );


    wp_localize_script('karyabi_ajax_script', 'custom_theme_mbm_object', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'security' => wp_create_nonce('file_upload'),
        'siteurl' => site_url(),
        'sitelogo' => get_field('header', 'option')["logo"],
        'loginurl' => site_url() . '?login=user',
        'current_page' => get_query_var('paged') ? get_query_var('paged') : 1,
        'max_page' => $wp_query->max_num_pages
    ));
}

add_action('wp_enqueue_scripts', 'karyabi_theme_scripts');


////ajax

foreach (glob(get_template_directory() . "/inc/ajax/*.php") as $filename) {
    require $filename;
}


//date hook
function time_ago_date(  $the_date) {

	return human_time_diff( get_the_time('U'), current_time('timestamp') ) . ' ' .'پیش';
}
add_filter( 'get_the_date', 'time_ago_date', 10, 1 );



add_filter('manage_job_posts_columns', function($columns) {
	return array_merge($columns, ['active' => __('وضعیت تایید', 'textdomain')]);
});
 
add_action('manage_job_posts_custom_column', function($column_key, $post_id) {
	if ($column_key == 'active') {
		$verified = get_post_meta($post_id, 'active', true);
		if ($verified) {
			echo '<a href="edit.php?post_type=job&job_id='.$post_id.'&active=0" style="color:green;">'; _e('تایید شده', 'textdomain'); echo '</a>';
		} else {
			echo '<a href="edit.php?post_type=job&job_id='.$post_id.'&active=1"  style="color:red;">'; _e('تایید نشده', 'textdomain'); echo '</a>';
		}
	}
}, 10, 2);


add_action( 'admin_init', 'karyabi_admin_active_job' );
function karyabi_admin_active_job()
{
    if(!is_admin())
    {
        return;
    }
    if(isset($_GET["post_type"])&&$_GET["post_type"]=="job"&&isset($_GET["job_id"]))
    {
        $job_id = sanitize_text_field($_GET["job_id"]);
        $active = sanitize_text_field($_GET["active"]);
        update_post_meta( $job_id, 'active', $active );
    }
}


add_filter( 'wp_new_user_notification_email', 'custom_wp_new_user_notification_email', 10, 3 );
function custom_wp_new_user_notification_email( $wp_new_user_notification_email, $user, $blogname ) {
 
    $user_login = stripslashes( $user->user_login );
    $user_email = stripslashes( $user->user_email );
    $login_url  = wp_login_url();
    $message  = 'با تشکر از ثبت نام شما' . '<br>';
    $message .= 'کد تایید ' . '<br>';
    $message .= get_the_author_meta('user_email_code', $user->ID);
    
    $wp_new_user_notification_email['subject'] = 'تایید ایمیل سایت'. ' '.$blogname;
    $wp_new_user_notification_email['headers'] = array('Content-Type: text/html; charset=UTF-8');
    $wp_new_user_notification_email['message'] = $message;
 
    return $wp_new_user_notification_email;
}

add_filter( 'big_image_size_threshold', '__return_false' );
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );
add_action( 'shutdown', function() {
   while ( @ob_end_flush() );
} );

