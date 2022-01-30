<?php
include("Telegram.php");
date_default_timezone_set("asia/tehran");
// Set the bot TOKEN
$bot_id = "YOUR-TOKEN";
// Instances the class
$telegram = new Telegram($bot_id);

$text = $telegram->Text();
$chat_id = $telegram->ChatID();
$username = $telegram->Username();

$name = $telegram->FirstName();
$family = $telegram->LastName();
$message_id = $telegram->MessageID();
$user_id = $telegram->UserID();

if (!is_null($text) && !is_null($chat_id)) {
    $content = array('chat_id' => $chat_id, 'text' => $user_id);
    $telegram->sendMessage($content);
}