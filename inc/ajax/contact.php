<?php
class Karyabi_Contact_Ajax
{
    function submit()
    {
        global $wpdb;

        $name = "";
        $email = "";
        $message = "week";

        if (isset($_POST["name"])) {
            $name = sanitize_text_field($_POST["name"]);
        }

        if (isset($_POST["email"])) {
            $email = sanitize_text_field($_POST["email"]);
        }

        if (isset($_POST["message"])) {
            $message = sanitize_text_field($_POST["message"]);
        }

        $sql = "";

        $items       = $wpdb->get_results($sql, ARRAY_A);

        $args = array(
            'post_title'    => $name,
            'post_content'  => $message,
            'post_status'   => 'publish',
            'post_author'   => 1,
            'post_type'     => 'contact_form',
            'meta_input'    => array(
            'email'         => $email
            ),
        );

        $result = [];

        $post_id = wp_insert_post($args);
        if (!is_wp_error($post_id)) {
            $result["state"] = 1;
            $result["message"] = 'با موفقیت ثبت شد';
        } else {

            $result["state"] = 0;
            $result["message"] = $post_id->get_error_message();
        }



        echo json_encode([
            'success'       => true,
            'result'          => $result,
            'sql'          => "",
            'max_num_pages' => 1
        ]);
        die();
    }
}
$Karyabi_Contact_Ajax = new Karyabi_Contact_Ajax;
add_action('wp_ajax_contact_form', array($Karyabi_Contact_Ajax, 'submit'));
add_action('wp_ajax_nopriv_contact_form', array($Karyabi_Contact_Ajax, 'submit'));
