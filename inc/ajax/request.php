<?php
class Common_Request_Post
{
    function request()
    {
        $user_id = get_current_user_id();

        if ($user_id == 0) {
            echo json_encode([]);
            die();
        }

        $job_id = sanitize_text_field($_POST["job_id"]);

        $args_post = array(
            'post_title'   => get_the_author_meta('user_name', $user_id),
            'post_type'    => 'request',
            'post_author'  => $user_id,
            'post_status'  => 'publish',
            'meta_input'   => array(
                'status' => 0,
                'job_id' => $job_id
            )
        );

        $result=[];
        $id = wp_insert_post($args_post);
        $result["state"] = 1;
        $result["message"] = 'با موفقیت ذخیره شد';
        
        echo json_encode($result);
        die();
    }

    function favorite()
    {
        $user_id = get_current_user_id();

        if ($user_id == 0) {
            echo json_encode([]);
            die();
        }

        $job_id = sanitize_text_field($_POST["job_id"]);

        $args_post = array(
            'post_title'   => get_the_author_meta('user_name', $user_id),
            'post_type'    => 'favorite',
            'post_author'  => $user_id,
            'post_status'  => 'publish',
            'meta_input'   => array(
                'status' => 0,
                'job_id' => $job_id
            )
        );

        $result=[];
        $id = wp_insert_post($args_post);
        $result["state"] = 1;
        $result["message"] = 'با موفقیت ذخیره شد';
        
        echo json_encode($result);
        die();
    }
}

$Common_Request_Post = new Common_Request_Post;
add_action('wp_ajax_mbm_job_request', array($Common_Request_Post, 'request'));
add_action('wp_ajax_nopriv_mbm_job_request', array($Common_Request_Post, 'request'));

add_action('wp_ajax_mbm_job_favorite', array($Common_Request_Post, 'favorite'));
add_action('wp_ajax_nopriv_mbm_job_favorite', array($Common_Request_Post, 'favorite'));
