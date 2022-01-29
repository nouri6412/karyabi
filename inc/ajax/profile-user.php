<?php
class Karyabi_User
{
    function save_profile()
    {
        global $wpdb;
        $user_id = get_current_user_id();

        if ($user_id == 0) {
            echo json_encode([]);
            die();
        }

        $result = [];

        $meta = [];

        foreach ($_POST as $key => $post) {
            if ($key != "action") {
                update_user_meta($user_id, $key, $post);
            }
        }

        wp_update_user(array('ID' => $user_id, 'user_email' => $_POST["user_email"]));


        $result["state"] = 1;
        $result["message"] = 'با موفقیت ذخیره شد';

        echo json_encode($result);
        die();
    }

    function save_resume()
    {
        global $wpdb;
        $user_id = get_current_user_id();

        if ($user_id == 0) {
            echo json_encode([]);
            die();
        }

        $result = [];

        $meta = [];

        $meta_key = sanitize_text_field($_POST["meta_key"]);


        foreach ($_POST as $key => $post) {
            if ($key != "action" && $key != "meta_key" && $key != "meta_action") {
                $meta[$key] = sanitize_text_field($post);
            }
        }

        $meta_value = json_encode($meta, JSON_UNESCAPED_UNICODE);

        $action = sanitize_text_field($_POST["meta_action"]);


        update_user_meta($user_id, $meta_key, $meta_value);

        $result["state"] = 1;
        $result["message"] = 'با موفقیت ذخیره شد';

        $user_info = get_userdata($user_id);
        $user_meta = get_user_meta($user_id);

        set_query_var('user_info', $user_info);
        set_query_var('user_meta', $user_meta);

        $result["html"] =  custom_render_php(get_template_directory() . "/template-parts/profile-user/profile-user-" . $action . ".php");

        echo json_encode($result);
        die();
    }

    function get_form()
    {
        $action = sanitize_text_field($_POST["meta_action"]);

        $result["html"] =  custom_render_php(get_template_directory() . "/template-parts/profile-user/profile-user-" . $action . ".php");

        echo json_encode($result);
        die();
    }
}

$Karyabi_User = new Karyabi_User;
add_action('wp_ajax_mbm_profile_user_profile', array($Karyabi_User, 'save_profile'));
add_action('wp_ajax_nopriv_mbm_profile_user_profile', array($Karyabi_User, 'save_profile'));

add_action('wp_ajax_mbm_profile_user_save_resume', array($Karyabi_User, 'save_resume'));
add_action('wp_ajax_nopriv_mbm_profile_user_save_resume', array($Karyabi_User, 'save_resume'));

add_action('wp_ajax_mbm_profile_user_get_form', array($Karyabi_User, 'get_form'));
add_action('wp_ajax_nopriv_mbm_profile_user_get_form', array($Karyabi_User, 'get_form'));
