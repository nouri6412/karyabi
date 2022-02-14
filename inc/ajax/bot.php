<?php
class MyTmpTelegramBot
{
    const BOT_TOKEN = "5183120271:AAH9C5q0HsR1qHqrJ5AAcFJWMFf6UwFaSHQ";
    const TELEGRAM_API_URL = "https://api.telegram.org/bot";

    public $url;

    public function __construct()
    {
        $this->url = SELF::TELEGRAM_API_URL . SELF::BOT_TOKEN;
    }

    private function runScript($method)
    {
        return file_get_contents($this->url . '/' . $method);
    }

    public function getUpdates($offset = 0)
    {
        $qu = "";
        if ($offset > 0) {
            $qu = "?offset=" . $offset;
        }
        return $this->runScript('getupdates' . $qu);
    }

    public function sendMessage($chatId, $text, $reply_markup = "")
    {
        $url = "sendmessage?text=$text&chat_id=$chatId" . $reply_markup;
        return $this->runScript($url);
    }

    public function message($item)
    {
        if (isset($item['message'])) {
            $text = $item['message']["text"];
            $text = strtolower($text);
            if ($text == "start" || $text == "/start" || $text == "منو" || $text == "menu" || $text == "home") {
                $this->start_menu($item);
            } else {
                $chatId = $item['message']['chat']['id'];
                $user = get_user_by('login', $chatId);
                $this->callback_input($user, $item['message']["text"]);
            }
        } else if (isset($item["callback_query"]['message'])) {
            $this->callback($item);
        }
    }
    public function callback($item)
    {
        $chatId = $item["callback_query"]['message']['chat']['id'];
        $data = $item["callback_query"]['data'];
        if ($data == "register-user") {
            $this->register_user($chatId);
        } else if ($data == "register-company") {
        } else if ($data == "menu-user-profile") {
            $user = get_user_by('login', $chatId);
            update_user_meta($user->ID, "bot_step", $data);
            $this->user_profile($user);
        }else if ($data == "menu-user-resume") {
            $user = get_user_by('login', $chatId);
            update_user_meta($user->ID, "bot_step", $data);
            $this->user_resume($user);
        } else if ($data == "menu-user-jobs") {
            $user = get_user_by('login', $chatId);
            update_user_meta($user->ID, "bot_step", $data);
            $this->user_jobs($user);
        } else if ($data == "user-profile-name") {
            $user = get_user_by('login', $chatId);
            update_user_meta($user->ID, "bot_step", $data);
            $this->sendMessage($chatId, "نام و نام خانوادگی را وارد نمائید");
        } else if ($data == "user-profile-exp") {
            $user = get_user_by('login', $chatId);
            update_user_meta($user->ID, "bot_step", $data);
            $this->sendMessage($chatId, "عنوان شغلی را وارد نمائید");
        } else if ($data == "user-profile-email") {
            $user = get_user_by('login', $chatId);
            update_user_meta($user->ID, "bot_step", $data);
            $this->sendMessage($chatId, " ایمیل را وارد نمائید");
        } else if ($data == "user-profile-date") {
            $user = get_user_by('login', $chatId);
            update_user_meta($user->ID, "bot_step", $data);
            $this->sendMessage($chatId, " سال تولد را وارد نمائید");
        } else if ($data == "user-profile-state") {
            $user = get_user_by('login', $chatId);
            update_user_meta($user->ID, "bot_step", $data);
            $this->sendMessage($chatId, "  استان را وارد نمائید");
        } else if ($data == "user-profile-city") {
            $user = get_user_by('login', $chatId);
            update_user_meta($user->ID, "bot_step", $data);
            $this->sendMessage($chatId, "  شهر را وارد نمائید");
        } else if ($data == "user-profile-tel") {
            $user = get_user_by('login', $chatId);
            update_user_meta($user->ID, "bot_step", $data);
            $this->sendMessage($chatId, "  تلفن را وارد نمائید");
        }
        else if ($data == "user-resume-about") {
            $user = get_user_by('login', $chatId);
            update_user_meta($user->ID, "bot_step", $data);
            $this->sendMessage($chatId,"درباره خود بنویسید");
            $data= json_decode(get_the_author_meta('resume-about', $user->ID));
            $about="خالی است";
            if( isset($data->about))
            {
             $about=$data->about;
            }
             $this->sendMessage($chatId, "درباره شما".' : '.$about);
        }
        else if ($data == "user-resume-skills") {
            $user = get_user_by('login', $chatId);
            update_user_meta($user->ID, "bot_step", $data);
            $this->sendMessage($chatId, "  مهارت های خود را با جدا کننده ".' , '."وارد نمائید مانند:".' java,wordpress');
           $data= json_decode(get_the_author_meta('resume-skills', $user->ID));
           $skills="خالی است";
           if( isset($data->skills))
           {
            $skills=$data->skills;
           }
            $this->sendMessage($chatId, "مهارت های شما".' : '.$skills);
        }
    }

    public function callback_input($user, $text)
    {
        $step = get_the_author_meta('bot_step', $user->ID);

        if ($step == "user-profile-name") {
            update_user_meta($user->ID, "user_name", $text);
        } else if ($step == "user-profile-exp") {
            update_user_meta($user->ID, "user_exp", $text);
        } else if ($step == "user-profile-email") {
            update_user_meta($user->ID, "user_e_email", $text);
        } else if ($step == "user-profile-date") {
            update_user_meta($user->ID, "user_date_year", $text);
        } else if ($step == "user-profile-state") {
            update_user_meta($user->ID, "user_state", $text);
        } else if ($step == "user-profile-city") {
            update_user_meta($user->ID, "user_city", $text);
        } else if ($step == "user-profile-tel") {
            update_user_meta($user->ID, "tel", $text);
        }
        else if ($step == "user-resume-about") {
            $data=[];
            $data["about"]=$text; 
            update_user_meta($user->ID, "resume-about", json_encode($data,JSON_UNESCAPED_UNICODE ));
        }
        else if ($step == "user-resume-skills") {
            $data=[];
            $data["skills"]=$text; 
            update_user_meta($user->ID, "resume-skills", json_encode($data,JSON_UNESCAPED_UNICODE ));
        }
        update_user_meta($user->ID, "bot_step", "input_text");
    }

    public function start_menu($item)
    {
        $chatId = $item['message']['chat']['id'];
        $user = get_user_by('login', $chatId);
        if ($user) {
            $this->user_menu($user);
        } else {
            $keyboard = [
                'inline_keyboard' => [
                    [
                        ['text' => 'ثبت نام کارجو', 'callback_data' => 'register-user'],
                        ['text' => 'ثبت نام کارفرما', 'callback_data' => 'register-company']
                    ]
                ]
            ];
            $encodedKeyboard = json_encode($keyboard);

            $this->sendMessage($chatId, "یکی از گزینه های زیر را انتخاب نمائید", "&reply_markup=" . $encodedKeyboard);
        }
    }

    public function user_menu($user)
    {
        $step = get_the_author_meta('bot_step', $user->ID);

        $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'اطلاعات فردی', 'callback_data' => 'menu-user-profile'],
                    ['text' => 'رزومه و مهارت من', 'callback_data' => 'menu-user-resume']
                ],
                [
                    ['text' => 'شغل های پیشنهادی', 'callback_data' => 'menu-user-jobs'],
                    ['text' => 'رزومه های ارسالی', 'callback_data' => 'menu-user-request']
                ]
            ]
        ];
        $encodedKeyboard = json_encode($keyboard);

        update_user_meta($user->ID, "bot_step", "menu");

        $this->sendMessage($user->data->user_login, "منوی کارجو", "&reply_markup=" . $encodedKeyboard);
    }

    public function user_profile($user)
    {

        $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'نام' . ' : ' . get_the_author_meta('user_name', $user->ID), 'callback_data' => 'user-profile-name']
                ],
                [
                    ['text' => 'عنوان شغلی' . ' : ' . get_the_author_meta('user_exp', $user->ID), 'callback_data' => 'user-profile-exp']
                ],
                [
                    ['text' => 'ایمیل' . ' : ' . get_the_author_meta('user_e_email', $user->ID), 'callback_data' => 'user-profile-email']
                ],
                [
                    ['text' => 'سال تولد' . ' : ' . get_the_author_meta('user_date_year', $user->ID), 'callback_data' => 'user-profile-date']
                ],
                [
                    ['text' => 'استان' . ' : ' . get_the_author_meta('user_state', $user->ID), 'callback_data' => 'user-profile-state']
                ],
                [
                    ['text' => 'شهر' . ' : ' . get_the_author_meta('user_city', $user->ID), 'callback_data' => 'user-profile-city']
                ],
                [
                    ['text' => 'تلفن' . ' : ' . get_the_author_meta('tel', $user->ID), 'callback_data' => 'user-profile-tel']
                ]
            ]
        ];
        $encodedKeyboard = json_encode($keyboard);

        $this->sendMessage($user->data->user_login, "اطلاعات فردی", "&reply_markup=" . $encodedKeyboard);
    }

    public function user_resume($user)
    {
        $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'درباره من' , 'callback_data' => 'user-resume-about'],
                    ['text' => 'مهارت ها و حرفه', 'callback_data' => 'user-resume-skills']
                ]
            ]
        ];
        $encodedKeyboard = json_encode($keyboard);

        $this->sendMessage($user->data->user_login, "رزومه من", "&reply_markup=" . $encodedKeyboard);
    }

    public function user_jobs($user)
    {
     
        $data= json_decode(get_the_author_meta('resume-skills', $user->ID));
        $skills = [];
        if (isset($data->skills)) {
            $skills = explode(',', $data->skills);
        }
        
        $search = array();
        $search["relation"] = "OR";
        foreach ($skills as $item) {
            $search[] =           array(
                'key' => 'tag',
                'value' => $item,
                'compare' => 'LIKE'
            );
        }
        
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        
        $args = array(
            'post_type' => 'job',
            'post_status' => 'publish',
            'meta_key' => 'active',
            'meta_value' => '1',
            'posts_per_page' => 10,
            'paged' => $paged,
            'meta_query' => $search
        );
        $the_query = new WP_Query($args);
        $count = $the_query->post_count;
        $this->sendMessage($user->data->user_login,$count." ". "شغل پیدا شده است");
        while ($the_query->have_posts()) :
            $the_query->the_post();
            $keyboard = [
                'inline_keyboard' => [
                    [
                        ['text' => 'درخواست شغل' , 'callback_data' => 'user-request-job-'.get_the_ID()]
                    ]
                ]
            ];
            $encodedKeyboard = json_encode($keyboard);
            $this->sendMessage($user->data->user_login,urlencode(get_the_title() . ' / ' . get_the_title(get_post_meta(get_the_ID(), 'cat_id', true)).' '.PHP_EOL.get_post_meta(get_the_ID(), 'tag', true)), "&reply_markup=" . $encodedKeyboard);
        endwhile;
        wp_reset_query();
    }

    public function register_user($chat_id)
    {
        $result = wp_create_user($chat_id, '123456');
        if (is_wp_error($result)) {
            $error = $result->get_error_message();
        } else {
            $user = get_user_by('id', $result);
            update_user_meta($user->ID, "user_type", "user");
            update_user_meta($user->ID, "bot_step", "start");
            $this->user_menu($user);
        }
    }
}
