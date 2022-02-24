<?php
set_time_limit ( 60 );
function task()
{
    $str = file_get_contents('http://wordpress-themes.ir/bot');
}

for ($i = 0; $i < 30; $i++) {
    sleep(3);
    task();
}
