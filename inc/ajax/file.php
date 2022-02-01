<?php
class Common_Manage_File
{
    function upload_image()
    {
        $result = [];
        check_ajax_referer('file_upload', 'security');
        $arr_img_ext = array('image/png', 'image/jpeg', 'image/jpg', 'image/gif');
        if (in_array($_FILES['file']['type'], $arr_img_ext)) {
            $upload = wp_upload_bits($_FILES["file"]["name"], null, file_get_contents($_FILES["file"]["tmp_name"]));
            $result = $upload;
        }
        return $result;
    }

    function upload_avatar()
    {
        $user_id = get_current_user_id();

        if($user_id==0)
        {
            echo json_encode([]);
            die();
        }

        $user_id = get_current_user_id();
        $result = $this->upload_image();
        if ($result["url"]) {
            update_user_meta($user_id, 'avatar', $result["url"]);
        }
        echo json_encode($result);
        die();
    }

    function save_file()
    {
        $result = [];
        check_ajax_referer('file_upload', 'security');
        $arr_img_ext = array('aplication/pdf');
        if (in_array($_FILES['file']['type'], $arr_img_ext)||1==1) {
            $upload = wp_upload_bits($_FILES["file"]["name"], null, file_get_contents($_FILES["file"]["tmp_name"]));
            $result = $upload;
        }
        return $result;
    }

    function upload_file()
    {
        $user_id = get_current_user_id();

        if($user_id==0)
        {
            echo json_encode([]);
            die();
        }

        $user_id = get_current_user_id();
        $result = $this->save_file();
        if ($result["url"]) {
            update_user_meta($user_id, 'resume-file', $result["url"]);
        }
        echo json_encode($result);
        die();
    }

}
$Common_Manage_File = new Common_Manage_File;
add_action('wp_ajax_mbm_common_image_upload_avatar', array($Common_Manage_File, 'upload_avatar'));
add_action('wp_ajax_nopriv_mbm_common_image_upload_avatar', array($Common_Manage_File, 'upload_avatar'));

add_action('wp_ajax_mbm_common_image_upload_file', array($Common_Manage_File, 'upload_file'));
add_action('wp_ajax_nopriv_mbm_common_image_upload_file', array($Common_Manage_File, 'upload_file'));

