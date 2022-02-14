<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Karyabi
 * @since 1.0.0
 * Template Name: ربات
 */


$obj = new MyTmpTelegramBot();
$id = get_option("telegram_bot_update_id", 0);


$updatesJson = $obj->getUpdates($id);
$updatesJson2Array = json_decode($updatesJson, true);
$update_id = 0;
//var_dump($updatesJson2Array['result']);
foreach ($updatesJson2Array['result'] as $item) {
    $update_id = $item["update_id"];
    if ($id > 0) {
        $id = 0;
        continue;
    }
    $obj->message($item);

}
update_option('telegram_bot_update_id', $update_id);
?>

<?php
