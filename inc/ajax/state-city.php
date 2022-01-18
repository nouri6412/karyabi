<?php
class Common_State_City
{
    function get_state_list()
    {

        $args = array(
            'post_type' => 'state',
            'posts_per_page' => 1000
        );

        $the_query = new WP_Query($args);

        $result = [];

        $index = 0;

        while ($the_query->have_posts()) :
            $the_query->the_post();
            $result[] = ["id" => get_the_ID(), "title" => get_the_title()];
            $index++;
        endwhile;
        wp_reset_query();

        return $result;
    }

    function ajax_get_state_list()
    {
        $result = $this->get_state_list();

        echo json_encode($result);
        die();
    }

    function get_city_list($state_id = 0)
    {

        $args = [];

        if ($state_id > 0) {
            $args = array(
                'post_type' => 'city',
                'meta_key'        => 'state',
                'meta_value'    => $state_id
            );
        } else {
            $args = array(
                'post_type' => 'city',
                'posts_per_page' => 10
            );
        }

        $the_query = new WP_Query($args);

        $result = [];

        $index = 0;

        while ($the_query->have_posts()) :
            $the_query->the_post();
            $result[] = ["id" => get_the_ID(), "title" => get_the_title()];
            $index++;
        endwhile;
        wp_reset_query();

        return $result;
    }

    function ajax_get_city_list()
    {

        $state_id = 0;

        if (isset($_POST["state_id"])) {
            $state_id = $_POST["state_id"];
        }

        $result = $this->get_city_list($state_id);

        echo json_encode($result);
        die();
    }
}

$Common_State_City = new Common_State_City;
add_action('wp_ajax_mbm_common_state_list', array($Common_State_City, 'ajax_get_state_list'));
add_action('wp_ajax_mbm_common_city_list', array($Common_State_City, 'ajax_get_city_list'));
