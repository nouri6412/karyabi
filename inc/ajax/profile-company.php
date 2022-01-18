<?php

class Karyabi_Company
{
    function save_profile()
    {
        global $wpdb;
        $user_id = get_current_user_id();
        $result=[];

        $meta = [];

        if (isset($_POST["company_name"])) {
            $meta['company_name'] = sanitize_text_field($_POST["company_name"]);
        }

        foreach ($meta as $key=>$item) {
            update_user_meta($user_id, $key, $item);
        }

        $result["state"]=1;
        $result["message"]='با موفقیت ذخیره شد';

        echo json_encode($result);
        die();
    }
}

$Karyabi_Company = new Karyabi_Company;
add_action('wp_ajax_mbm_profile_company_profile', array($Karyabi_Company, 'save_profile'));
