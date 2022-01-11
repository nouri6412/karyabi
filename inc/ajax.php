<?php
class Bital_Ajax
{
    function chart()
    {
        global $wpdb;

        $coin_id = "";
        $period = "";
        $select="week";

        if (isset($_POST["coin_id"])) {
            $coin_id = sanitize_text_field($_POST["coin_id"]);
        }

        if (isset($_POST["period"])) {
            $period = sanitize_text_field($_POST["period"]);
        }

        if (isset($_POST["select"])) {
            $select = sanitize_text_field($_POST["select"]);
        }
        
        $sql="";

        $sql="select wp2.*,DATE_FORMAT(wp2.date_u,'%Y-%m-%d') as date_d from wp_coingecko_history wp2 join (select (select MAX(wp1.date_u) from wp_coingecko_history wp1 where tb_main.date_time=DATE_FORMAT(wp1.date_u,'%Y-%m-%d')) as date_t from (SELECT date_time from (select DATE_FORMAT(date_u,'%Y-%m-%d') as date_time FROM wp_coingecko_history where coin_id='" . esc_sql($coin_id) . "') tb GROUP by date_time) tb_main ORDER BY date_time DESC LIMIT 7) tb_date on wp2.date_u =tb_date.date_t where wp2.coin_id ='" . esc_sql($coin_id) . "' ";

        if($select=="month")
        {
            $sql="select wp2.*,DATE_FORMAT(wp2.date_u,'%Y-%m-%d') as date_d from wp_coingecko_history wp2 join (select (select MAX(wp1.date_u) from wp_coingecko_history wp1 where tb_main.date_time=DATE_FORMAT(wp1.date_u,'%Y-%m-%d')) as date_t from (SELECT date_time from (select DATE_FORMAT(date_u,'%Y-%m-%d') as date_time FROM wp_coingecko_history where coin_id='" . esc_sql($coin_id) . "') tb GROUP by date_time) tb_main ORDER BY date_time DESC LIMIT 30) tb_date on wp2.date_u =tb_date.date_t where wp2.coin_id ='" . esc_sql($coin_id) . "' ";
        }
        else if($select=="day")
        {
            $sql="select wp2.*,DATE_FORMAT(wp2.date_u,'%Y-%m-%d %H:%i:%s') as date_d from wp_coingecko_history wp2 join (select (select MAX(wp1.date_u) from wp_coingecko_history wp1 where tb_main.date_time=DATE_FORMAT(wp1.date_u,'%Y-%m-%d %H')) as date_t from (SELECT date_time from (select DATE_FORMAT(date_u,'%Y-%m-%d %H') as date_time FROM wp_coingecko_history where coin_id='" . esc_sql($coin_id) . "') tb GROUP by date_time) tb_main ORDER BY date_time DESC LIMIT 24) tb_date on wp2.date_u =tb_date.date_t where wp2.coin_id ='" . esc_sql($coin_id) . "' ";
        }
        else if($select=="month3")
        {
            $sql="select wp2.*,DATE_FORMAT(wp2.date_u,'%Y-%m-%d') as date_d from wp_coingecko_history wp2 join (select (select MAX(wp1.date_u) from wp_coingecko_history wp1 where tb_main.date_time=DATE_FORMAT(wp1.date_u,'%Y-%m-%d')) as date_t from (SELECT date_time from (select DATE_FORMAT(date_u,'%Y-%m-%d') as date_time FROM wp_coingecko_history where coin_id='" . esc_sql($coin_id) . "') tb GROUP by date_time) tb_main ORDER BY date_time DESC LIMIT 90) tb_date on wp2.date_u =tb_date.date_t where wp2.coin_id ='" . esc_sql($coin_id) . "' ";
        }
        else if($select=="year")
        {
            $sql="select wp2.*,DATE_FORMAT(wp2.date_u,'%Y-%m-%d') as date_d from wp_coingecko_history wp2 join (select (select MAX(wp1.date_u) from wp_coingecko_history wp1 where tb_main.date_time=DATE_FORMAT(wp1.date_u,'%Y-%m')) as date_t from (SELECT date_time from (select DATE_FORMAT(date_u,'%Y-%m') as date_time FROM wp_coingecko_history where coin_id='" . esc_sql($coin_id) . "') tb GROUP by date_time) tb_main ORDER BY date_time DESC LIMIT 12) tb_date on wp2.date_u =tb_date.date_t where wp2.coin_id ='" . esc_sql($coin_id) . "' ";
        }
        else if($select=="all")
        {
            $sql="select wp2.*,DATE_FORMAT(wp2.date_u,'%Y-%m-%d') as date_d from wp_coingecko_history wp2 join (select (select MAX(wp1.date_u) from wp_coingecko_history wp1 where tb_main.date_time=DATE_FORMAT(wp1.date_u,'%Y-%m')) as date_t from (SELECT date_time from (select DATE_FORMAT(date_u,'%Y-%m') as date_time FROM wp_coingecko_history where coin_id='" . esc_sql($coin_id) . "') tb GROUP by date_time) tb_main ORDER BY date_time DESC) tb_date on wp2.date_u =tb_date.date_t where wp2.coin_id ='" . esc_sql($coin_id) . "' ";
        }

        $items       = $wpdb->get_results($sql, ARRAY_A);

        $result=[];
        $result["color"]="#d53838";
        $result["data"]=[];
        $result["x"]=[];
        $result["y"]=[];

        foreach($items as $item)
        {
            $result["y"][]=$item["price_usd"];
            $result["x"][]=bital\tools::to_shamsi($item["date_d"]);
        }


        echo json_encode([
            'success'       => true,
            'result'          => $result,
            'sql'          =>"",
            'max_num_pages' => 1
        ]);
        die();
    }
}
$Bital_Ajax = new Bital_Ajax;
add_action('wp_ajax_bital_chart_coin', array($Bital_Ajax, 'chart'));
add_action('wp_ajax_nopriv_bital_chart_coin', array($Bital_Ajax, 'chart'));

