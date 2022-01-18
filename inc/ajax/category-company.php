<?php
class Karyabi_Category
{
    function get_company_cat_list()
    {
        
        $args = array(
            'post_type' => 'company-cat',
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
}