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

        if (strpos($data, 'user-request-job-') !== false) {
            $this->user_job_request(str_replace('user-request-job-', "", $data), $chatId);
            return;
        }

        if (strpos($data, 'select-company-cat-') !== false) {
            $this->company_selected_cat(str_replace('select-company-cat-', "", $data), $chatId);
            return;
        }



        switch ($data) {
            case "register-user": {
                    $this->register_user($chatId);
                    break;
                }
            case "register-company": {
                    $this->register_company($chatId);
                    break;
                }
            case "menu-user-profile": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->user_profile($user);
                    break;
                }
            case "menu-company-profile": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->company_profile($user);
                    break;
                }
            case "menu-company-create-job": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->company_create_job($user);
                    break;
                }
            case "menu-user-resume": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->user_resume($user);
                    break;
                }
            case "menu-user-jobs": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->user_jobs($user);
                    break;
                }
            case "menu-user-request": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->user_requests($user);
                    break;
                }
            case "user-profile-name": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "نام و نام خانوادگی را وارد نمائید");
                    break;
                }
            case "user-profile-exp": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "عنوان شغلی را وارد نمائید");
                    break;
                }
            case "user-profile-email": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, " ایمیل را وارد نمائید");
                    break;
                }
            case "user-profile-date": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, " سال تولد را وارد نمائید");
                    break;
                }
            case "user-profile-state": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "  استان را وارد نمائید");
                    break;
                }
            case "user-profile-city": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "  شهر را وارد نمائید");
                    break;
                }
            case "user-profile-tel": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "  تلفن را وارد نمائید");
                    break;
                }
            case "user-resume-about": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "درباره خود بنویسید");
                    $data = json_decode(get_the_author_meta('resume-about', $user->ID));
                    $about = "خالی است";
                    if (isset($data->about)) {
                        $about = $data->about;
                    }
                    $this->sendMessage($chatId, "درباره شما" . ' : ' . $about);
                    break;
                }
            case "user-resume-skills": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "  مهارت های خود را با جدا کننده " . ' , ' . "وارد نمائید مانند:" . ' java,wordpress');
                    $data = json_decode(get_the_author_meta('resume-skills', $user->ID));
                    $skills = "خالی است";
                    if (isset($data->skills)) {
                        $skills = $data->skills;
                    }
                    $this->sendMessage($chatId, "مهارت های شما" . ' : ' . $skills);
                    break;
                }
            case "company-profile-name": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "نام شرکت را وارد نمائید");
                    break;
                }
            case "company-profile-email": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "ایمیل شرکت را وارد نمائید");
                    break;
                }
            case "company-profile-web": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "وب سایت شرکت را وارد نمائید");
                    break;
                }
            case "company-profile-cat": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->company_cat($user);
                    break;
                }
            case "company-profile-tel": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "تلفن شرکت را وارد نمائید");
                    break;
                }
            case "company-profile-about": {
                    $user = get_user_by('login', $chatId);
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "توضیحاتی درباره شرکت را وارد نمائید");
                    break;
                }
            default: {
                };
        }
    }

    public function callback_input($user, $text)
    {
        $step = get_the_author_meta('bot_step', $user->ID);

        if ($step == "user-profile-name") {
            update_user_meta($user->ID, "user_name", $text);
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        } else if ($step == "user-profile-exp") {
            update_user_meta($user->ID, "user_exp", $text);
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        } else if ($step == "user-profile-email") {
            update_user_meta($user->ID, "user_e_email", $text);
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        } else if ($step == "user-profile-date") {
            update_user_meta($user->ID, "user_date_year", $text);
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        } else if ($step == "user-profile-state") {
            update_user_meta($user->ID, "user_state", $text);
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        } else if ($step == "user-profile-city") {
            update_user_meta($user->ID, "user_city", $text);
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        } else if ($step == "user-profile-tel") {
            update_user_meta($user->ID, "tel", $text);
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        } else if ($step == "user-resume-about") {
            $data = [];
            $data["about"] = $text;
            update_user_meta($user->ID, "resume-about", json_encode($data, JSON_UNESCAPED_UNICODE));
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        } else if ($step == "user-resume-skills") {
            $data = [];
            $data["skills"] = $text;
            update_user_meta($user->ID, "resume-skills", json_encode($data, JSON_UNESCAPED_UNICODE));
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        } else if ($step == "company-profile-name") {
            update_user_meta($user->ID, "company_name", $text);
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        } else if ($step == "company-profile-email") {
            update_user_meta($user->ID, "company_email", $text);
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        } else if ($step == "company-profile-web") {
            update_user_meta($user->ID, "web", $text);
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        } else if ($step == "company-profile-tel") {
            update_user_meta($user->ID, "tel", $text);
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        } else if ($step == "company-profile-about") {
            update_user_meta($user->ID, "desc", $text);
            $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
        }
        update_user_meta($user->ID, "bot_step", "input_text");
    }

    public function start_menu($item)
    {
        $chatId = $item['message']['chat']['id'];
        $user = get_user_by('login', $chatId);
        if ($user) {
            $user_type = get_the_author_meta('user_type', $user->ID);
            if ($user_type == "user") {
                $this->user_menu($user);
            } else {
                $this->company_menu($user);
            }
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
                    ['text' => 'درخواست های من', 'callback_data' => 'menu-user-request']
                ]
            ]
        ];
        $encodedKeyboard = json_encode($keyboard);

        update_user_meta($user->ID, "bot_step", "menu");

        $this->sendMessage($user->data->user_login, "منوی کارجو", "&reply_markup=" . $encodedKeyboard);
    }

    public function company_menu($user)
    {
        $step = get_the_author_meta('bot_step', $user->ID);

        $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'اطلاعات پروفایل', 'callback_data' => 'menu-company-profile']
                ],
                [
                    ['text' => 'ارسال آگهی', 'callback_data' => 'menu-company-create-job']
                ],
                [
                    ['text' => 'آگهی های من', 'callback_data' => 'menu-company-jobs']
                ],
                [
                    ['text' => 'رزومه های بررسی نشده', 'callback_data' => 'menu-company-request-0']
                ],
                [
                    ['text' => 'رزومه های تایید برای مصاحبه', 'callback_data' => 'menu-company-request-1']
                ],
                [
                    ['text' => 'رزومه های استخدام شده', 'callback_data' => 'menu-company-request-2']
                ]
            ]
        ];
        $encodedKeyboard = json_encode($keyboard);

        update_user_meta($user->ID, "bot_step", "menu");

        $this->sendMessage($user->data->user_login, "منوی کارفرما", "&reply_markup=" . $encodedKeyboard);
    }

    public function company_cat($user)
    {
        $step = get_the_author_meta('bot_step', $user->ID);

        $cat_arr = [];

        $Karyabi_Category = new Karyabi_Category;
        $cats = $Karyabi_Category->get_company_cat_list();

        foreach ($cats as $item) {

            $cat = [];
            $cat[0] = ['text' => $item["title"], 'callback_data' => 'select-company-cat-' . $item["id"]];
            $cat_arr[] = $cat;
        }

        $keyboard = [
            'inline_keyboard' => $cat_arr
        ];
        $encodedKeyboard = json_encode($keyboard);

        update_user_meta($user->ID, "bot_step", "company_select_cat");

        $this->sendMessage($user->data->user_login, "دسته بندی را انتخاب نمائید", "&reply_markup=" . $encodedKeyboard);
    }

    public function company_selected_cat($cat_id, $chatId)
    {
        $user = get_user_by('login', $chatId);
        update_user_meta($user->ID, "cat_id", $cat_id);
        $this->sendMessage($user->data->user_login, "اطلاعات ثبت شد");
    }

    public function company_profile($user)
    {

        $Karyabi_Category = new Karyabi_Category;
        $cats = $Karyabi_Category->get_company_cat_list();
        $cat_id = get_the_author_meta('cat_id', $user->ID);
        $selected_cat = "";
        foreach ($cats as $item) {

            if ($cat_id == $item["id"]) {
                $selected_cat = $item["title"];
            }
        }

        $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'نام شرکت' . ' : ' . get_the_author_meta('company_name', $user->ID), 'callback_data' => 'company-profile-name']
                ],
                [
                    ['text' => 'ایمیل' . ' : ' . get_the_author_meta('company_email', $user->ID), 'callback_data' => 'company-profile-email']
                ],
                [
                    ['text' => 'وب سایت' . ' : ' . get_the_author_meta('web', $user->ID), 'callback_data' => 'company-profile-web']
                ],
                [
                    ['text' => 'دسته' . ' : ' . $selected_cat, 'callback_data' => 'company-profile-cat']
                ],
                [
                    ['text' => 'تلفن' . ' : ' . get_the_author_meta('tel', $user->ID), 'callback_data' => 'company-profile-tel']
                ],
                [
                    ['text' => 'درباره شرکت' . ' : ' . get_the_author_meta('desc', $user->ID), 'callback_data' => 'company-profile-about']
                ]
            ]
        ];
        $encodedKeyboard = json_encode($keyboard);

        $this->sendMessage($user->data->user_login, "اطلاعات پروفایل", "&reply_markup=" . $encodedKeyboard);
    }

    public function company_create_job($user)
    {

        $keyboard = [
            'inline_keyboard' => [
                [
                    ['text' => 'عنوان شغل' . ' : ', 'callback_data' => 'company-create-job-name']
                ],
                [
                    ['text' => 'ایمیل' . ' : ', 'callback_data' => 'company-create-job-email']
                ],
                [
                    ['text' => 'مهارت های مورد نیاز' . ' : ', 'callback_data' => 'company-create-job-tag']
                ],
                [
                    ['text' => 'نوع همکاری' . ' : ', 'callback_data' => 'company-create-job-coop-type']
                ],
                [
                    ['text' => 'سابقه کاری' . ' : ', 'callback_data' => 'company-create-job-exp']
                ],
                [
                    ['text' => 'حداقل حقوق' . ' : ', 'callback_data' => 'company-create-job-min-salary']
                ],
                [
                    ['text' => 'حداکثر حقوق' . ' : ', 'callback_data' => 'company-create-job-max-salary']
                ],
                [
                    ['text' => 'موقعیت مکانی و آدرس' . ' : ', 'callback_data' => 'company-create-job-address']
                ],
                [
                    ['text' => 'شرح شغل' . ' : ', 'callback_data' => 'company-create-job-desc']
                ]
            ]
        ];
        $encodedKeyboard = json_encode($keyboard);

        $this->sendMessage($user->data->user_login, "فیلد های آگهی را پر نمائید", "&reply_markup=" . $encodedKeyboard);
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
                    ['text' => 'درباره من', 'callback_data' => 'user-resume-about'],
                    ['text' => 'مهارت ها و حرفه', 'callback_data' => 'user-resume-skills']
                ]
            ]
        ];
        $encodedKeyboard = json_encode($keyboard);

        $this->sendMessage($user->data->user_login, "رزومه من", "&reply_markup=" . $encodedKeyboard);
    }

    public function user_job_request($job_id, $chatId)
    {
        $user = get_user_by('login', $chatId);
        $owner_id = get_post_field('post_author', $job_id);



        $search = array();

        $search["relation"] = "AND";

        $search[] =           array(
            'key' => 'job_id',
            'value' => $job_id,
            'compare' => '='
        );

        $search[] =           array(
            'key' => 'owner_id',
            'value' => $owner_id,
            'compare' => '='
        );

        $args = array(
            'post_type' => 'request',
            'post_author'  => $user->ID,
            'meta_query'        => $search
        );
        $the_query = new WP_Query($args);

        $count = $the_query->post_count;


        if ($count > 0) {
            return;
        }

        $args_post = array(
            'post_title'   => get_the_author_meta('user_name', $user->ID),
            'post_type'    => 'request',
            'post_author'  =>  $user->ID,
            'post_status'  => 'publish',
            'meta_input'   => array(
                'status' => 0,
                'job_id' => $job_id,
                'owner_id' => $owner_id
            )
        );
        $id = wp_insert_post($args_post);
    }

    public function user_jobs($user)
    {

        $data = json_decode(get_the_author_meta('resume-skills', $user->ID));
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
        $this->sendMessage($user->data->user_login, $count . " " . "شغل پیدا شده است");
        while ($the_query->have_posts()) :
            $the_query->the_post();
            $keyboard = [
                'inline_keyboard' => [
                    [
                        ['text' => 'درخواست شغل', 'callback_data' => 'user-request-job-' . get_the_ID()]
                    ]
                ]
            ];
            $encodedKeyboard = json_encode($keyboard);
            $desc = "";
            $desc .= PHP_EOL . "نوع همکاری" ." : ". get_post_meta(get_the_ID(), 'coop-type', true);
            $desc .= PHP_EOL . "سابقه کاری"." : " . get_post_meta(get_the_ID(), 'exp', true);
            $desc .= PHP_EOL . "حداقل حقوق"." : " . get_post_meta(get_the_ID(), 'min-salary', true);
            $desc .= PHP_EOL . "حداکثر حقوق"." : " . get_post_meta(get_the_ID(), 'max-salary', true);
            $desc .= PHP_EOL . "موقعیت مکانی"." : " . get_post_meta(get_the_ID(), 'address', true);
            $desc .= PHP_EOL . "شرح شغل"." : " . get_post_meta(get_the_ID(), 'desc', true);

            $this->sendMessage($user->data->user_login, urlencode(get_the_title() . ' / ' . get_the_title(get_post_meta(get_the_ID(), 'cat_id', true)) . ' ' . PHP_EOL . get_post_meta(get_the_ID(), 'tag', true) . $desc), "&reply_markup=" . $encodedKeyboard);
        endwhile;
        wp_reset_query();
    }


    public function user_requests($user)
    {

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            'post_type' => 'request',
            'post_status' => 'publish',
            'post_author'  => $user->ID,
            'posts_per_page' => 50,
            'paged' => $paged
        );
        $the_query = new WP_Query($args);
        $count = $the_query->post_count;
        $this->sendMessage($user->data->user_login, $count . " " . "درخواست");
        while ($the_query->have_posts()) :
            $the_query->the_post();
            $job_id = get_post_meta(get_the_ID(), 'job_id', true);

            $st = "وضعیت درخواست" . " : ";
            $status = get_post_meta(get_the_ID(), 'status', true);
            if ($status == 1) {
                $st = $st . 'بررسی شده';
            } else if ($status == 2) {
                $st = $st . 'تایید برای مصاحبه';
            } else if ($status == 2) {
                $st = $st . 'رد درخواست';
            } else if ($status == 2) {
                $st = $st . 'استخدام شده';
            } else {
                $st = $st . 'در انتظار وضعیت';
            }

            $this->sendMessage($user->data->user_login, urlencode(get_the_title($job_id) . ' / ' . get_the_title(get_post_meta($job_id, 'cat_id', true)) . ' ' . PHP_EOL . get_post_meta($job_id, 'tag', true) . PHP_EOL . $st));
        endwhile;
        wp_reset_query();
    }


    public function register_user($chat_id)
    {
        $user = get_user_by('login', $chat_id);
        if ($user) {
            return;
        }
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

    public function register_company($chat_id)
    {
        $user = get_user_by('login', $chat_id);
        if ($user) {
            return;
        }
        $result = wp_create_user($chat_id, '123456');
        if (is_wp_error($result)) {
            $error = $result->get_error_message();
        } else {
            $user = get_user_by('id', $result);
            update_user_meta($user->ID, "user_type", "company");
            update_user_meta($user->ID, "bot_step", "start");
            $this->company_menu($user);
        }
    }
}
