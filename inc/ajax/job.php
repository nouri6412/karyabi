<?php
class Karyabi_Job
{
    function insert_job()
    {
        $user_id = get_current_user_id();

        if($user_id==0)
        {
            echo json_encode([]);
            die();
        }

        $title = "";
        $desc = "";
        $coop_type = '';
        $exp = '';
        $min_salary = '';
        $max_salary = "";
        $state_id = 0;
        $city_id = 0;
        $address = '';

        $title = sanitize_text_field($_POST["job_title"]);
        $email = sanitize_text_field($_POST["job_email"]);
        $tag = sanitize_text_field($_POST["job_tag"]);
        $desc = sanitize_text_field($_POST["job_desc"]);
        $coop_type = sanitize_text_field($_POST["job_coop_type"]);
        $exp = sanitize_text_field($_POST["job_exp"]);
        $min_salary = sanitize_text_field($_POST["job_min_salary"]);
        $max_salary = sanitize_text_field($_POST["job_max_salary"]);
        $state_id = sanitize_text_field($_POST["job_state_id"]);
        $city_id = sanitize_text_field($_POST["job_city_id"]);
        $address = sanitize_text_field($_POST["job_address"]);

        $args_post = array(
            'post_title'   => $title,
            'post_type'    => 'job',
            'post_author'  => $user_id,
            'post_status'  => 'publish',
            'content'      => $desc,
            'meta_input'   => array(
                'active' => 0,
                'coop-type' => $coop_type,
                'email' => $email,
                'exp' => $exp,
                'min-salary' => $min_salary,
                'max-salary' => $max_salary,
                'state_id' => $state_id,
                'city_id' => $city_id,
                'address' => $address
            )
        );


        $max_job_option = 5;

        $get_option = get_field('job_max_job', 'option');

        if (is_numeric($get_option)) {
            $max_job_option = $get_option;
        }

        $args = array(
            'post_type' => 'job',
            'post_author'  => $user_id,
            'meta_key'        => 'active',
            'meta_value'    => 1
        );
        $the_query = new WP_Query($args);

        $count_max = $the_query->post_count;

        $args = array(
            'post_type' => 'job',
            'post_author'  => $user_id,
            'title'        => $title
        );
        $the_query = new WP_Query($args);

        $count = $the_query->post_count;

        if ($count > 0) {
            $result["state"] = 0;
            $result["message"] = 'عنوان آگهی تکراری می باشد';
        } else if ($count_max < $max_job_option) {
            $id = wp_insert_post($args_post);
            $result["state"] = 1;
            $result["message"] = 'با موفقیت ذخیره شد';
        } else {
            $result["state"] = 0;
            $result["message"] = 'تعداد آگهی های فعال نباید بیش از 5 باشد';
        }

        echo json_encode($result);
        die();
    }
}

$Karyabi_Job = new Karyabi_Job;
add_action('wp_ajax_mbm_profile_company_insert_job', array($Karyabi_Job, 'insert_job'));
add_action('wp_ajax_nopriv_mbm_profile_company_insert_job', array($Karyabi_Job, 'insert_job'));
