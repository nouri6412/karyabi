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
$str=file_get_contents("php://input");
// $myfile = fopen("hook-bot.txt", "w") or die("Unable to open file!");
// fwrite($myfile, $str);
// fclose($myfile);

$update = json_decode($str, TRUE,512,JSON_UNESCAPED_UNICODE);

$obj = new MyTmpTelegramBot();

$obj->message($update);

return;

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
   // var_dump($item);
    $obj->message($item);

}
update_option('telegram_bot_update_id', $update_id);
?>

<?php
