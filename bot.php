<?php

set_time_limit(60);
$ex = date('Y-m-d H:i:s');

$myfile = fopen("bot.txt", "w") or die("Unable to open file!");
$txt = $ex;
fwrite($myfile, $txt);
fclose($myfile);
$index=0;

function task()
{
    global $index;
    $index++;
    echo $index.'<br>';
   $str = file_get_contents('http://wordpress-themes.ir/bot');
}

for ($i = 0; $i < 30; $i++) {
    $myfile = fopen("bot.txt", "r") or die("Unable to open file!");
    $ex1 = fgets($myfile);
    fclose($myfile);
    if ($ex != $ex1) {
        break;
    }
    sleep(3);
    task();
}
echo 'finish';
