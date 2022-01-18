<?php

class Karyabi_Company
{
    function save_profile()
    {
        global $wpdb;
        $user_id = get_current_user_id();
        $result = [];

        $meta = [];

        foreach ($_POST as $key => $post) {
            if ($key != "action") {
                update_user_meta($user_id, $key, sanitize_text_field($post));
            }
        }

        wp_update_user( array( 'ID' => $user_id, 'user_email' => $_POST["user_email"] ) );


        $result["state"] = 1;
        $result["message"] = 'با موفقیت ذخیره شد';

        echo json_encode($result);
        die();
    }
}

$Karyabi_Company = new Karyabi_Company;
add_action('wp_ajax_mbm_profile_company_profile', array($Karyabi_Company, 'save_profile'));
add_action('wp_ajax_nopriv_mbm_profile_company_profile', array($Karyabi_Company, 'submit'));

