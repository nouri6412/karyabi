<?php
class Common_Job_Tags
{
    function insert_tag()
    {
        $user_id = get_current_user_id();

        if($user_id==0)
        {
            echo json_encode([]);
            die();
        }

        $title = sanitize_text_field($_POST["title"]);


        $args = array(
            'post_title'   => $title,
            'post_type'    => 'job-tag',
            'post_author'  => $user_id,
            'post_status'  => 'publish'
        );
        $id = wp_insert_post($args);

        $args = array(
            'post_type' => 'job-tag',
            'post_author'  => $user_id,
            'post_title'        => $title
        );
        $the_query = new WP_Query($args);

        $count = $the_query->post_count;

        if ($count > 0) {
            $result["state"] = 0;
            $result["message"] = 'عنوان  تکراری می باشد';
        } else  {
            $id = wp_insert_post($args);
            $result["state"] = 1;
            $result["message"] = 'با موفقیت ذخیره شد';
        } 

        echo json_encode($result);
        die();
    }
}

$Common_Job_Tags = new Common_Job_Tags;
add_action('wp_ajax_mbm_job_tag_insert', array($Common_Job_Tags, 'insert_tag'));
add_action('wp_ajax_nopriv_mbm_job_tag_insert', array($Common_Job_Tags, 'insert_tag'));