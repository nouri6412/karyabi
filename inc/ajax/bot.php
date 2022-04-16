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
    public function get_login($chatId)
    {
        $user1 = get_user_by('login', $chatId);
        $user =  get_user_by('id', get_the_author_meta(get_the_author_meta('user_type_login', $user1->ID) . '_username', $user1->ID));
        return $user;
    }
    public function message($item)
    {
        if (isset($item['message'])) {
            if (isset($item['message']["text"])) {
                $text = $item['message']["text"];
                $text = strtolower($text);
                if ($text == "start" || $text == "/start" || $text == "منو" || $text == "menu" || $text == "home") {
                    $this->start_menu($item);
                } else {
                    $chatId = $item['message']['chat']['id'];
                    $user =  $this->get_login($chatId);
                    $this->callback_input($user, $item['message']["text"], $chatId);
                }
            }
            if (isset($item['message']['contact'])) {
                $chatId = $item['message']['chat']['id'];
                $user =  $this->get_login($chatId);
                $this->callback_input($user, $item['message']["contact"]["phone_number"], $chatId);
            }
        } else if (isset($item["callback_query"]['message'])) {
            $chatId = $item["callback_query"]['message']['chat']['id'];
            $user =  $this->get_login($chatId);
            $this->callback($item, $user);
        }
    }
    public function callback($item, $user)
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

        if (strpos($data, 'company-job-remove-') !== false) {
            $this->company_job_delete(str_replace('company-job-remove-', "", $data), $chatId);
            return;
        }

        if (strpos($data, 'company-job-edit-') !== false) {
            $id = str_replace('company-job-edit-', "", $data);
            update_user_meta($user->ID, "create_job_id", $id);
            update_user_meta($user->ID, "bot_step", 'company-create-job-name-edit');
            $this->sendMessage($chatId, 'عنوان آگهی را وارد نماپید');
            return;
        }


        if (strpos($data, 'company-request-job-not-accept-') !== false) {
            $this->company_request_status(str_replace('company-request-job-not-accept-', "", $data), $chatId, 3);
            return;
        }

        if (strpos($data, 'company-request-job-accept-') !== false) {
            $this->company_request_status(str_replace('company-request-job-accept-', "", $data), $chatId, 2);
            return;
        }
        if (strpos($data, 'company-request-job-emp-accept-') !== false) {
            $this->company_request_status(str_replace('company-request-job-emp-accept-', "", $data), $chatId, 4);
            return;
        }

        if (strpos($data, 'user-profile-view-') !== false) {
            $this->user_profile_view(str_replace('user-profile-view-', "", $data), $chatId);
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
            case "login-user": {
                    $this->login_user($chatId);
                    break;
                }
            case "login-company": {
                    $this->login_company($chatId);
                    break;
                }
            case "menu-user-profile": {
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->user_profile($user, $chatId);
                    break;
                }
            case "menu-user-create-resume": {
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-name');
                    $this->sendMessage($chatId, urlencode("نام و نام خانوادگی را وارد نماپید"));
                    break;
                }
            case "menu-user-resume": {
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->user_resume($user, $chatId);
                    break;
                }
            case "user-profile-name": {
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "نام و نام خانوادگی را وارد نمائید");
                    break;
                }
            case "user-profile-exp": {
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "عنوان شغلی را وارد نمائید");
                    break;
                }
            case "user-profile-email": {
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, " ایمیل را وارد نمائید");
                    break;
                }
            case "user-profile-date": {
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, " سال تولد را وارد نمائید");
                    break;
                }
            case "user-profile-state": {
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "  استان را وارد نمائید");
                    break;
                }
            case "user-profile-city": {
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "  شهر را وارد نمائید");
                    break;
                }
            case "user-profile-tel": {
                    update_user_meta($user->ID, "bot_step", $data);
                    $this->sendMessage($chatId, "  تلفن را وارد نمائید");
                    break;
                }
            case "user-resume-about": {
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
            default: {
                };
        }
    }
    public function request_phone($chatId)
    {
        $keyboard = array(
            'keyboard' => array(
                array(
                    array(
                        'text' => "تایید شماره تلفن",
                        'request_contact' => true
                    )
                )
            ),

            'one_time_keyboard' => true,
            'resize_keyboard' => true
        );
        $encodedKeyboard = json_encode($keyboard);

        $this->sendMessage($chatId, urlencode("تایید شماره تلفن"), "&reply_markup=" . $encodedKeyboard);
    }
    public function user_profile_view($user_id, $chatId)
    {
        $user =  $this->get_login($chatId);

        $desc = "";
        $desc .=  "نام" . " : " . get_the_author_meta('user_name', $user_id);
        $desc .= PHP_EOL . "عنوان شغلی" . " : " . get_the_author_meta('user_exp', $user_id);
        $desc .= PHP_EOL . "ایمیل" . " : " . get_the_author_meta('user_e_email', $user_id);
        $desc .= PHP_EOL . "سال تولد" . " : " . get_the_author_meta('user_date_year', $user_id);
        $desc .= PHP_EOL . "آدرس سکونت" . " : " . get_the_author_meta('user_state', $user_id) . ' - ' . get_the_author_meta('user_city', $user_id);
        $desc .= PHP_EOL . "تلفن" . " : " . get_the_author_meta('tel', $user_id);

        $data = json_decode(get_the_author_meta('resume-skills', $user_id));
        $skills = PHP_EOL .  "خالی است";
        if (isset($data->skills)) {
            $skills = $data->skills;
        }
        $desc .= PHP_EOL .  "-----------";
        $desc .= PHP_EOL .  "مهارت" . " : " . $skills;

        $data = json_decode(get_the_author_meta('resume-about', $user_id));
        $about = PHP_EOL .  "خالی است";
        if (isset($data->about)) {
            $about = $data->about;
        }
        $desc .= PHP_EOL .  "-----------";
        $desc .= PHP_EOL .  "درباره" . " : " . $about;

        /// exp
        $data = [];
        $data_1 = json_decode(get_the_author_meta('resume-exp', $user_id));

        if (isset($data_1->exp) && !is_array($data_1->exp)) {
            $data = json_decode($data_1->exp);
        }

        if (!$data && isset($data_1->exp)) {
            $data = $data_1->exp;
        }
        $desc .= PHP_EOL .  "-----------";
        $desc .= PHP_EOL .  "سوابق شغلی" . " : ";

        foreach ($data as $item) {
            $desc .= PHP_EOL .  "شرکت" . " : " . $item->company;
            $desc .= PHP_EOL .  "عنوان شغلی" . " : " . $item->title;
            $desc .= PHP_EOL .  "از سال" . " : " . $item->date_from . ' - ' . "تا سال" . " : " . $item->date_from;
            $desc .= PHP_EOL .  "توضیحات شغلی" . " : " . $item->desc;
        }
        // end exp


        // edu
        $data = [];
        $data_1 = json_decode(get_the_author_meta('resume-edu', $user_id));

        if (isset($data_1->exp) && !is_array($data_1->exp)) {
            $data = json_decode($data_1->exp);
        }

        if (!$data && isset($data_1->exp)) {
            $data = $data_1->exp;
        }
        $desc .= PHP_EOL .  "-----------";
        $desc .= PHP_EOL .  "سوابق تحصیلی" . " : ";

        foreach ($data as $item) {
            $desc .= PHP_EOL .  "دانشگاه" . " : " . $item->uni;
            $desc .= PHP_EOL .  "رشته" . " : " . $item->major;
            $desc .= PHP_EOL .  "مقطع" . " : " . $item->grade;
            $desc .= PHP_EOL .  "از سال" . " : " . $item->date_from . ' - ' . "تا سال" . " : " . $item->date_from;
        }
        //end edu

        $data = [];
        // lang

        $data_1 = json_decode(get_the_author_meta('resume-lang', $user_id));

        if (isset($data_1->exp) && !is_array($data_1->exp)) {
            $data = json_decode($data_1->exp);
        }

        if (!$data && isset($data_1->exp)) {
            $data = $data_1->exp;
        }
        $desc .= PHP_EOL .  "-----------";
        $desc .= PHP_EOL .  "زبان های مسلط" . " : ";

        foreach ($data as $item) {
            $desc .= PHP_EOL .  "زبان" . " : " . $item->title;
        }
        //end lang

        // prefer
        $data = [];
        $data = json_decode(get_the_author_meta('resume-prefer', $user_id));

        if (isset($data->salary)) {
            $desc .= PHP_EOL .  "-----------";
            $desc .= PHP_EOL .  "حقوق در خواستی بر حسب ساعت " . " : " . $data->salary . " " . 'دلار';
        }

        //end prefer


        $this->sendMessage($chatId, urlencode($desc));
        $this->user_menu($user, $chatId);
    }

    public function callback_input($user, $text, $chatId)
    {
        global $wpdb;
        $step = get_the_author_meta('bot_step', $user->ID);

        switch ($step) {
            case "بازگشت": {
                    update_user_meta($user->ID, "bot_step", '');

                    $back_menu = get_the_author_meta('back_menu', $user->ID);

                    if ($back_menu == 'start' || strlen($back_menu) == 0) {
                        $this->run_start_menu($chatId);
                    } else {
                        $this->callback_input($user, $back_menu, $chatId);
                    }

                    $break = true;
                    break;
                }
            case "ثبت نام فریلنسر": {
                    $this->register_user($chatId);
                    $break = true;
                    break;
                }
            case "ثبت نام کارفرما": {
                    $this->register_company($chatId);
                    $break = true;
                    break;
                }
            case "ورود فریلنسر": {
                    $this->login_user($chatId);
                    $break = true;
                    break;
                }
            case "ورود کارفرما": {
                    $this->login_company($chatId);
                    $break = true;
                    break;
                }
            case "مشاهده رزومه": {
                    $this->user_profile_view($user->ID, $chatId);
                    $break = true;
                    break;
                }
            case "ساخت رزومه": {
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-name');
                    $this->sendMessage($chatId, urlencode("نام و نام خانوادگی را وارد نمایید"));
                    $break = true;
                    break;
                }
            case "شغل های پیشنهادی": {
                    update_user_meta($user->ID, "bot_step", 'شغل های پیشنهادی');
                    $this->user_jobs($user, $chatId);
                    break;
                }
            case "درخواست های من": {
                    update_user_meta($user->ID, "bot_step", 'درخواست های من');
                    $this->user_requests($user, $chatId);
                    break;
                }
            case "ویرایش پروفایل": {
                    update_user_meta($user->ID, "bot_step", 'ویرایش پروفایل');
                    $this->company_profile($user, $chatId);
                    break;
                }
            case "ارسال آگهی": {
                    update_user_meta($user->ID, "bot_step", 'ارسال آگهی');
                    $this->company_create_job($user, $chatId);
                    break;
                }
            case "آگهی های من": {
                    update_user_meta($user->ID, "bot_step", 'آگهی های من');
                    $this->company_my_jobs($user, $chatId);
                    break;
                }
            case "رزومه های بررسی نشده": {
                    update_user_meta($user->ID, "bot_step", 'رزومه های بررسی نشده');
                    $this->company_request_0($user, 0, $chatId);
                    break;
                }
            case "رزومه های تایید برای مصاحبه": {
                    update_user_meta($user->ID, "bot_step", 'رزومه های تایید برای مصاحبه');
                    $this->company_request_0($user, 2, $chatId);
                    break;
                }
            case "رزومه های استخدام شده": {
                    update_user_meta($user->ID, "bot_step", 'رزومه های استخدام شده');
                    $this->company_request_0($user, 4, $chatId);
                    break;
                }
            case "ویرایش نام شرکت": {
                    update_user_meta($user->ID, "bot_step", 'company-profile-name');
                    $this->sendMessage($chatId, urlencode("نام شرکت را وارد نمائید"));
                    break;
                }
            case "ویرایش ایمیل": {
                    update_user_meta($user->ID, "bot_step", 'company-profile-email');
                    $this->sendMessage($chatId, urlencode("ایمیل شرکت را وارد نمائید"));
                    break;
                }
            case "ویرایش وب سایت": {
                    update_user_meta($user->ID, "bot_step", 'company-profile-web');
                    $this->sendMessage($chatId, urlencode("وب سایت شرکت را وارد نمائید"));
                    break;
                }
            case "ویرایش دسته بندی": {
                    update_user_meta($user->ID, "bot_step", 'company-profile-cat');
                    $this->company_cat($user, $chatId);
                    break;
                }
            case "ویرایش تلفن": {

                    update_user_meta($user->ID, "bot_step", 'company-profile-tel');
                    $this->request_phone($chatId);
                    break;
                }
            case "ویرایش درباره شرکت": {
                    update_user_meta($user->ID, "bot_step", 'company-profile-about');
                    $this->sendMessage($chatId, urlencode("توضیحاتی درباره شرکت را وارد نمائید"));
                    break;
                }
            case "user-profile-name": {
                    update_user_meta($user->ID, "user_name", $text);
                    $wpdb->update(
                        $wpdb->users,
                        ['display_name' => $text],
                        ['ID' => $user->ID]
                    );
                    $this->sendMessage($chatId, "اطلاعات ثبت شد");
                    break;
                }
            case "user-profile-register-name": {
                    $wpdb->update(
                        $wpdb->users,
                        ['display_name' => $text],
                        ['ID' => $user->ID]
                    );
                    update_user_meta($user->ID, "user_name", $text);
                    update_user_meta($user->ID, "bot_step", 'user-profile-register-email');
                    $this->sendMessage($chatId, urlencode("ایمیل را وارد نمائید"));
                    break;
                }
            case "user-profile-register-email": {
                    if (!filter_var($text, FILTER_VALIDATE_EMAIL)) {
                        update_user_meta($user->ID, "bot_step", 'user-profile-register-email');
                        $this->sendMessage($chatId, urlencode("فرمت ایمیل صحیح نمی باشد لطفا بصورت صحیح وارد نمائید"));
                    } else {
                        $user1 = get_user_by('login', $text);
                        if ($user1) {
                            update_user_meta($user->ID, "bot_step", 'user-profile-register-email');
                            $this->sendMessage($chatId, urlencode("ایمیل وارد شده در سیستم وجود دارد لطفا ایمیل دیگری وارد نمائید"));
                        } else {
                            $wpdb->update(
                                $wpdb->users,
                                ['user_login' => $text],
                                ['ID' => $user->ID]
                            );
                            $wpdb->update(
                                $wpdb->users,
                                ['user_nicename' => $text],
                                ['ID' => $user->ID]
                            );
                            update_user_meta($user->ID, "user_e_email", $text);
                            update_user_meta($user->ID, "bot_step", 'user-profile-register-pass');
                            $this->sendMessage($chatId, urlencode("برای ورود به پنل کاربری خود از طریق وبسایت کاریابی رمز عبور دلخواه خود را وارد نمایید"));
                        }
                    }
                    break;
                }
            case "user-profile-register-pass": {
                    $uppercase = preg_match('@[A-Z]@', $text);
                    $lowercase = preg_match('@[a-z]@', $text);
                    $number    = preg_match('@[0-9]@', $text);
                    $specialChars = preg_match('@[^\w]@', $text);

                    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($text) < 8) {
                        update_user_meta($user->ID, "bot_step", 'user-profile-register-pass');
                        $this->sendMessage($chatId, urlencode("رمز عبور وارد شده حداقل باید دارای یک حروف کوچک و بزرگ و حروف خاص مانند @  باشد و همچنین طول آن نباید کمتر از 8 کاراکتر باشد"));
                    } else {
                        update_user_meta($user->ID, "user_pass_1", $text);
                        update_user_meta($user->ID, "bot_step", 'user-profile-register-repass');
                        $this->sendMessage($chatId, urlencode("تکرار رمز عبور را وارد نمائید"));
                    }

                    break;
                }
            case "user-profile-register-repass": {
                    $pass = get_the_author_meta('user_pass_1', $user->ID);
                    if ($pass == $text) {
                        wp_set_password($text, $user->ID);
                        update_user_meta($user->ID, "bot_step", 'user-profile-register-tel');

                        $this->request_phone($chatId);
                    } else {
                        update_user_meta($user->ID, "bot_step", 'user-profile-register-pass');
                        $this->sendMessage($chatId, urlencode("تکرار رمز عبور اشتباه است لطفا رمز عبور را مجددا وارد نمائید"));
                    }

                    break;
                }
            case "user-profile-register-tel": {
                    update_user_meta($user->ID, "tel", $text);
                    update_user_meta($user->ID, "bot_step", 'user-profile-register-finish');
                    $this->sendMessage($chatId, urlencode("ثبتنام انجام شد"));
                    $pass = get_the_author_meta('user_pass_1', $user->ID);
                    $user_name = get_the_author_meta('user_e_email', $user->ID);

                    $text = "اطلاعات ورود به سایت عبارت است از";
                    $text .= PHP_EOL . "نام کاربری" . " : " . PHP_EOL . $user_name;
                    $text .= PHP_EOL . "رمز عبور" . " : " . PHP_EOL . $pass;
                    $this->sendMessage($chatId, urlencode($text));
                    $this->user_menu($user, $chatId);
                    break;
                }
            case "user-profile-exp": {
                    update_user_meta($user->ID, "user_exp", $text);
                    $this->sendMessage($chatId, "اطلاعات ثبت شد");
                    break;
                }
            case "user-profile-email": {
                    update_user_meta($user->ID, "user_e_email", $text);
                    $this->sendMessage($chatId, "اطلاعات ثبت شد");
                    break;
                }
            case "user-profile-date": {
                    update_user_meta($user->ID, "user_date_year", $text);
                    $this->sendMessage($chatId, "اطلاعات ثبت شد");
                    break;
                }
            case "user-profile-state": {
                    update_user_meta($user->ID, "user_state", $text);
                    $this->sendMessage($chatId, "اطلاعات ثبت شد");
                    break;
                }
            case "user-profile-city": {
                    update_user_meta($user->ID, "user_city", $text);
                    $this->sendMessage($chatId, "اطلاعات ثبت شد");
                    break;
                }
            case "user-profile-tel": {
                    update_user_meta($user->ID, "tel", $text);
                    $this->sendMessage($chatId, "اطلاعات ثبت شد");
                    break;
                }
            case "user-resume-about": {
                    $data = [];
                    $data["about"] = $text;
                    update_user_meta($user->ID, "resume-about", json_encode($data, JSON_UNESCAPED_UNICODE));
                    $this->sendMessage($chatId, "اطلاعات ثبت شد");
                    break;
                }
            case "user-resume-skills": {
                    $data = [];
                    $data["skills"] = $text;
                    update_user_meta($user->ID, "resume-skills", json_encode($data, JSON_UNESCAPED_UNICODE));
                    $this->sendMessage($chatId, "اطلاعات ثبت شد");
                    break;
                }
            case "menu-user-create-resume-name": {
                    update_user_meta($user->ID, "user_name", $text);
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-exp');
                    $this->sendMessage($chatId, urlencode("عنوان شغلی را وارد نماپید"));
                    break;
                }
            case "menu-user-create-resume-exp": {
                    update_user_meta($user->ID, "user_exp", $text);
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-email');
                    $this->sendMessage($chatId, urlencode("ایمیل را وارد نماپید"));
                    break;
                }
            case "menu-user-create-resume-email": {
                    if (!filter_var($text, FILTER_VALIDATE_EMAIL)) {
                        update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-email');
                        $this->sendMessage($chatId, urlencode("فرمت ایمیل صحیح نمی باشد لطفا بصورت صحیح وارد نمائید"));
                    } else {
                        $user1 = get_user_by('login', $text);
                        if ($user1) {
                            update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-email');
                            $this->sendMessage($chatId, urlencode("ایمیل وارد شده در سیستم وجود دارد لطفا ایمیل دیگری وارد نمائید"));
                        } else {
                            $wpdb->update(
                                $wpdb->users,
                                ['user_login' => $text],
                                ['ID' => $user->ID]
                            );
                            $wpdb->update(
                                $wpdb->users,
                                ['user_nicename' => $text],
                                ['ID' => $user->ID]
                            );
                            update_user_meta($user->ID, "user_e_email", $text);
                            update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-date');
                            $this->sendMessage($chatId, urlencode("سال تولد را وارد نماپید"));
                        }
                    }

                    break;
                }
            case "menu-user-create-resume-date": {
                    if (is_numeric($text)) {
                        update_user_meta($user->ID, "user_date_year", $text);
                        update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-state');
                        $this->sendMessage($chatId, urlencode("استان را وارد نماپید"));
                    } else {
                        update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-date');
                        $this->sendMessage($chatId, urlencode("سال تولد را عدد وارد نماپید"));
                    }
                    break;
                }
            case "menu-user-create-resume-state": {
                    update_user_meta($user->ID, "user_state", $text);
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-city');
                    $this->sendMessage($chatId, urlencode("شهر را وارد نماپید"));
                    break;
                }
            case "menu-user-create-resume-city": {
                    update_user_meta($user->ID, "user_city", $text);
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-tel');
                    $this->request_phone($chatId);
                    break;
                }
            case "menu-user-create-resume-tel": {
                    update_user_meta($user->ID, "tel", $text);
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-about');
                    $this->sendMessage($chatId, urlencode("درباره خود بنویسید"));
                    break;
                }
            case "menu-user-create-resume-about": {
                    $data = [];
                    $data["about"] = $text;
                    update_user_meta($user->ID, "resume-about", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-skills');
                    $this->sendMessage($chatId, urlencode("  مهارت های خود را با جدا کننده " . ' , ' . "وارد نمائید مانند:" . ' java,wordpress'));
                    break;
                }
            case "menu-user-create-resume-skills": {
                    $data = [];
                    $data["skills"] = $text;
                    update_user_meta($user->ID, "resume-skills", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-job-company');
                    // $this->sendMessage($chatId, urlencode("سابقه شغلی خود را ثبت کنید"));
                    $this->sendMessage($chatId, urlencode("نام شرکتی که قبلا مشغول به کار بوده اید؟"));
                    break;
                }
            case "menu-user-create-resume-job-company": {
                    $db = json_decode(get_the_author_meta("resume-exp", $user->ID), JSON_UNESCAPED_UNICODE);
                    $data = [];
                    $data["exp"] = [];
                    $data["exp"][] = [];
                    if (isset($db["exp"])) {
                        $data = $db;
                    }
                    $data["exp"][0]["company"] = $text;
                    update_user_meta($user->ID, "resume-exp", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-job-title');
                    $this->sendMessage($chatId, urlencode("عنوان شغلی که در آن شرکت مشغول بوده اید؟"));
                    break;
                }
            case "menu-user-create-resume-job-title": {
                    $db = json_decode(get_the_author_meta("resume-exp", $user->ID), JSON_UNESCAPED_UNICODE);
                    $data = [];
                    $data["exp"] = [];
                    $data["exp"][] = [];
                    if (isset($db["exp"])) {
                        $data = $db;
                    }
                    $data["exp"][0]["title"] = $text;
                    update_user_meta($user->ID, "resume-exp", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-job-date-from');
                    $this->sendMessage($chatId, urlencode("از سال ؟"));
                    break;
                }
            case "menu-user-create-resume-job-date-from": {
                    $db = json_decode(get_the_author_meta("resume-exp", $user->ID), JSON_UNESCAPED_UNICODE);
                    $data = [];
                    $data["exp"] = [];
                    $data["exp"][] = [];
                    if (isset($db["exp"])) {
                        $data = $db;
                    }
                    $data["exp"][0]["date_from"] = $text;
                    update_user_meta($user->ID, "resume-exp", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-job-date-to');
                    $this->sendMessage($chatId, urlencode("تا سال ؟"));
                    break;
                }
            case "menu-user-create-resume-job-date-to": {
                    $db = json_decode(get_the_author_meta("resume-exp", $user->ID), JSON_UNESCAPED_UNICODE);
                    $data = [];
                    $data["exp"] = [];
                    $data["exp"][] = [];
                    if (isset($db["exp"])) {
                        $data = $db;
                    }
                    $data["exp"][0]["date_to"] = $text;
                    update_user_meta($user->ID, "resume-exp", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-job-desc');
                    $this->sendMessage($chatId, urlencode("توضیحاتی در باره کار خود در شرکت بیان کنید"));
                    break;
                }
            case "menu-user-create-resume-job-desc": {
                    $db = json_decode(get_the_author_meta("resume-exp", $user->ID), JSON_UNESCAPED_UNICODE);
                    $data = [];
                    $data["exp"] = [];
                    $data["exp"][] = [];
                    if (isset($db["exp"])) {
                        $data = $db;
                    }
                    $data["exp"][0]["desc"] = $text;
                    update_user_meta($user->ID, "resume-exp", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-edu-uni');
                    // $this->sendMessage($chatId, urlencode("سابقه تحصیلی خود را ثبت کنید"));
                    $this->sendMessage($chatId, urlencode("نام دانشگاه فارغ التحصیلی"));
                    break;
                }

            case "menu-user-create-resume-edu-uni": {
                    $db = json_decode(get_the_author_meta("resume-edu", $user->ID), JSON_UNESCAPED_UNICODE);
                    $data = [];
                    $data["exp"] = [];
                    $data["exp"][] = [];
                    if (isset($db["exp"])) {
                        $data = $db;
                    }
                    $data["exp"][0]["uni"] = $text;
                    update_user_meta($user->ID, "resume-edu", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-edu-major');
                    $this->sendMessage($chatId, urlencode("رشته تحصیلی ؟"));
                    break;
                }

            case "menu-user-create-resume-edu-major": {
                    $db = json_decode(get_the_author_meta("resume-edu", $user->ID), JSON_UNESCAPED_UNICODE);
                    $data = [];
                    $data["exp"] = [];
                    $data["exp"][] = [];
                    if (isset($db["exp"])) {
                        $data = $db;
                    }
                    $data["exp"][0]["major"] = $text;
                    update_user_meta($user->ID, "resume-edu", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-edu-grade');
                    $this->sendMessage($chatId, urlencode("مقطع تحصیلی ؟"));
                    break;
                }

            case "menu-user-create-resume-edu-grade": {
                    $db = json_decode(get_the_author_meta("resume-edu", $user->ID), JSON_UNESCAPED_UNICODE);
                    $data = [];
                    $data["exp"] = [];
                    $data["exp"][] = [];
                    if (isset($db["exp"])) {
                        $data = $db;
                    }
                    $data["exp"][0]["grade"] = $text;
                    update_user_meta($user->ID, "resume-edu", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-edu-date-from');
                    $this->sendMessage($chatId, urlencode("از سال ؟"));
                    break;
                }

            case "menu-user-create-resume-edu-date-from": {
                    $db = json_decode(get_the_author_meta("resume-edu", $user->ID), JSON_UNESCAPED_UNICODE);
                    $data = [];
                    $data["exp"] = [];
                    $data["exp"][] = [];
                    if (isset($db["exp"])) {
                        $data = $db;
                    }
                    $data["exp"][0]["date_from"] = $text;
                    update_user_meta($user->ID, "resume-edu", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-edu-date-to');
                    $this->sendMessage($chatId, urlencode("تا سال ؟"));
                    break;
                }

            case "menu-user-create-resume-edu-date-to": {
                    $db = json_decode(get_the_author_meta("resume-edu", $user->ID), JSON_UNESCAPED_UNICODE);
                    $data = [];
                    $data["exp"] = [];
                    $data["exp"][] = [];
                    if (isset($db["exp"])) {
                        $data = $db;
                    }
                    $data["exp"][0]["date_to"] = $text;
                    update_user_meta($user->ID, "resume-edu", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-lang');
                    $this->sendMessage($chatId, urlencode("به کدام زبان ها تسلط دارید با , جدا کنید"));
                    break;
                }
            case "menu-user-create-resume-lang": {
                    $db = json_decode(get_the_author_meta("resume-lang", $user->ID), JSON_UNESCAPED_UNICODE);
                    $data = [];
                    $data["exp"] = [];
                    $data["exp"][] = [];
                    if (isset($db["exp"])) {
                        $data = $db;
                    }
                    $ex = explode(',', $text);
                    $index = 0;
                    foreach ($ex as $item) {
                        $data["exp"][$index]["title"] = $item;
                        $data["exp"][$index]["degree"] = "مسلط";
                        $index++;
                    }

                    update_user_meta($user->ID, "resume-lang", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-prefer');
                    $this->sendMessage($chatId, urlencode("حقوق درخواستی به دلار بر حسب ساعت"));
                    break;
                }

            case "menu-user-create-resume-prefer": {
                    $db = json_decode(get_the_author_meta("resume-prefer", $user->ID), JSON_UNESCAPED_UNICODE);
                    $data = [];
                    if (isset($db["salary"])) {
                        $data = $db;
                    }
                    $data["salary"] = $text;
                    update_user_meta($user->ID, "resume-prefer", json_encode($data, JSON_UNESCAPED_UNICODE));
                    update_user_meta($user->ID, "bot_step", 'menu-user-create-resume-finish');
                    $this->sendMessage($chatId, urlencode("رزومه شما کامل شد"));
                    $this->user_menu($user, $chatId);
                    break;
                }

            case "company-profile-name": {
                    update_user_meta($user->ID, "company_name", $text);
                    $wpdb->update(
                        $wpdb->users,
                        ['display_name' => $text],
                        ['ID' => $user->ID]
                    );
                    $this->sendMessage($chatId, "نام شرکت ویرایش شد");
                    $this->company_menu($user, $chatId);
                    break;
                }
            case "company-profile-register-name": {
                    update_user_meta($user->ID, "company_name", $text);
                    $wpdb->update(
                        $wpdb->users,
                        ['display_name' => $text],
                        ['ID' => $user->ID]
                    );
                    update_user_meta($user->ID, "bot_step", 'company-profile-register-email');
                    $this->sendMessage($chatId, urlencode("ایمیل شرکت را وارد نمائید"));
                    break;
                }
            case "company-profile-register-email": {
                    if (!filter_var($text, FILTER_VALIDATE_EMAIL)) {
                        update_user_meta($user->ID, "bot_step", 'company-profile-register-email');
                        $this->sendMessage($chatId, urlencode("فرمت ایمیل صحیح نمی باشد لطفا بصورت صحیح وارد نمائید"));
                    } else {
                        $user1 = get_user_by('login', $text);
                        if ($user1) {
                            update_user_meta($user->ID, "bot_step", 'company-profile-register-email');
                            $this->sendMessage($chatId, urlencode("ایمیل وارد شده در سیستم وجود دارد لطفا ایمیل دیگری وارد نمائید"));
                        } else {
                            $wpdb->update(
                                $wpdb->users,
                                ['user_login' => $text],
                                ['ID' => $user->ID]
                            );
                            $wpdb->update(
                                $wpdb->users,
                                ['user_nicename' => $text],
                                ['ID' => $user->ID]
                            );
                            update_user_meta($user->ID, "company_email", $text);
                            update_user_meta($user->ID, "bot_step", 'company-profile-register-pass');
                            $this->sendMessage($chatId, urlencode("برای ورود به پنل کاربری خود از طریق وبسایت کاریابی رمز عبور دلخواه خود را وارد نمایید"));
                        }
                    }
                    break;
                }
            case "company-profile-register-pass": {
                    $uppercase = preg_match('@[A-Z]@', $text);
                    $lowercase = preg_match('@[a-z]@', $text);
                    $number    = preg_match('@[0-9]@', $text);
                    $specialChars = preg_match('@[^\w]@', $text);

                    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($text) < 8) {
                        update_user_meta($user->ID, "bot_step", 'company-profile-register-pass');
                        $this->sendMessage($chatId, urlencode("رمز عبور وارد شده حداقل باید دارای یک حروف کوچک و بزرگ و حروف خاص مانند @  باشد و همچنین طول آن نباید کمتر از 8 کاراکتر باشد"));
                    } else {
                        update_user_meta($user->ID, "user_pass_1", $text);
                        update_user_meta($user->ID, "bot_step", 'company-profile-register-repass');
                        $this->sendMessage($chatId, urlencode("تکرار رمز عبور را وارد نمائید"));
                    }
                    break;
                }
            case "company-profile-register-repass": {
                    $pass = get_the_author_meta('user_pass_1', $user->ID);
                    if ($pass == $text) {
                        wp_set_password($text, $user->ID);
                        update_user_meta($user->ID, "bot_step", 'company-profile-register-tel');
                        $this->request_phone($chatId);
                    } else {
                        update_user_meta($user->ID, "bot_step", 'company-profile-register-pass');
                        $this->sendMessage($chatId, urlencode("تکرار رمز عبور اشتباه است لطفا رمز عبور را مجددا وارد نمائید"));
                    }

                    break;
                }
            case "company-profile-register-tel": {
                    update_user_meta($user->ID, "tel", $text);
                    update_user_meta($user->ID, "bot_step", 'company-profile-register-finish');
                    $this->sendMessage($chatId, urlencode("ثبت نام انجام شد"));
                    $pass = get_the_author_meta('user_pass_1', $user->ID);
                    $user_name = get_the_author_meta('user_e_email', $user->ID);

                    $text = "اطلاعات ورود به سایت عبارت است از";
                    $text .= PHP_EOL . "نام کاربری" . " : " . PHP_EOL . $user_name;
                    $text .= PHP_EOL . "رمز عبور" . " : " . PHP_EOL . $pass;
                    $this->sendMessage($chatId, urlencode($text));
                    $this->company_menu($user, $chatId);
                    break;
                }
            case "company-profile-email": {
                    if (!filter_var($text, FILTER_VALIDATE_EMAIL)) {
                        update_user_meta($user->ID, "bot_step", "company-profile-email");
                        $this->sendMessage($chatId, urlencode("فرمت ایمیل صحیح نمی باشد لطفا بصورت صحیح وارد نمائید"));
                    } else {
                        $user1 = get_user_by('login', $text);
                        if ($user1) {
                            update_user_meta($user->ID, "bot_step", 'company-profile-register-email');
                            $this->sendMessage($chatId, urlencode("ایمیل وارد شده در سیستم وجود دارد لطفا ایمیل دیگری وارد نمائید"));
                        } else {
                            $wpdb->update(
                                $wpdb->users,
                                ['user_login' => $text],
                                ['ID' => $user->ID]
                            );
                            $wpdb->update(
                                $wpdb->users,
                                ['user_nicename' => $text],
                                ['ID' => $user->ID]
                            );
                            update_user_meta($user->ID, "company_email", $text);
                            $this->sendMessage($chatId, "ایمیل ویرایش شد");
                            $this->company_menu($user, $chatId);
                        }
                    }
                    break;
                }
            case "company-profile-web": {
                    update_user_meta($user->ID, "web", $text);
                    $this->sendMessage($chatId, "وب سایت ویرایش شد");
                    $this->company_menu($user, $chatId);
                    break;
                }
            case "company-profile-tel": {
                    update_user_meta($user->ID, "tel", $text);
                    $this->sendMessage($chatId, "تلفن ویرایش شد");
                    $this->company_menu($user, $chatId);
                    break;
                }
            case "company-profile-about": {
                    update_user_meta($user->ID, "desc", $text);
                    $this->sendMessage($chatId, " درباره شرکت ویرایش شد");
                    $this->company_menu($user, $chatId);
                    break;
                }
            case "company-create-job-name-edit": {
                    $args_post = array(
                        'ID'           => get_the_author_meta("create_job_id", $user->ID),
                        'post_title'   => $text,
                        'meta_input'   => array(
                            'title' => $text,
                            'active' => 0,
                        )
                    );
                    $id = wp_update_post($args_post);

                    update_user_meta($user->ID, "create_job_id", $id);
                    update_user_meta($user->ID, "bot_step", 'company-create-job-email');
                    $this->sendMessage($chatId, 'ایمیل آگهی را وارد نمائید');

                    break;
                }
            case "company-create-job-name": {
                    $args_post = array(
                        'post_title'   => $text,
                        'post_type'    => 'job',
                        'post_author'  => $user->ID,
                        'post_status'  => 'draft',
                        'meta_input'   => array(
                            'title' => $text,
                            'active' => 0,
                        )
                    );
                    $id = wp_insert_post($args_post);
                    if ($id > 0) {
                        update_user_meta($user->ID, "create_job_id", $id);
                        update_user_meta($user->ID, "bot_step", 'company-create-job-email');
                        $this->sendMessage($chatId, 'ایمیل آگهی را وارد نمائید');
                    } else {
                        $this->sendMessage($chatId, 'خطا لطفا عنوان تکراری وارد  ننمائید');
                    }

                    break;
                }
            case "company-create-job-email": {
                    if (!filter_var($text, FILTER_VALIDATE_EMAIL)) {
                        update_user_meta($user->ID, "bot_step", 'company-create-job-email');
                        $this->sendMessage($chatId, urlencode("فرمت ایمیل صحیح نمی باشد لطفا بصورت صحیح وارد نمائید"));
                    } else {
                        update_post_meta(get_the_author_meta("create_job_id", $user->ID), 'job-email', $text);
                        update_user_meta($user->ID, "bot_step", 'company-create-job-tag');
                        $this->sendMessage($chatId, urlencode("تگ و مهارت های موردنیاز شغل را  وارد نمائید با حرف , جدا کنید" . " " . "مثال" . " : " . "php,wordpress"));
                    }

                    break;
                }
            case "company-create-job-tag": {
                    update_post_meta(get_the_author_meta("create_job_id", $user->ID), 'tag', $text);
                    update_user_meta($user->ID, "bot_step", 'company-create-job-coop-type');
                    $this->sendMessage($chatId, 'نوع همکاری برای مثال دورکاری یا پروژه ای یا تمام وقت یا پاره وقت');
                    break;
                }
            case "company-create-job-coop-type": {
                    update_post_meta(get_the_author_meta("create_job_id", $user->ID), 'coop-type', $text);
                    update_user_meta($user->ID, "bot_step", 'company-create-job-exp');
                    $this->sendMessage($chatId, "سابقه کاری برای شغل");
                    break;
                }
            case "company-create-job-exp": {
                    update_post_meta(get_the_author_meta("create_job_id", $user->ID), 'exp', $text);
                    update_user_meta($user->ID, "bot_step", 'company-create-job-min-salary');
                    $this->sendMessage($chatId, urlencode("حداقل حقوق به دلار برای هر ساعت"));
                    break;
                }
            case "company-create-job-min-salary": {
                    update_post_meta(get_the_author_meta("create_job_id", $user->ID), 'min-salary', $text);
                    update_user_meta($user->ID, "bot_step", 'company-create-job-max-salary');
                    $this->sendMessage($chatId, urlencode("حداکثر حقوق  به دلار برای هر ساعت"));
                    break;
                }
            case "company-create-job-max-salary": {
                    update_post_meta(get_the_author_meta("create_job_id", $user->ID), 'max-salary', $text);

                    update_user_meta($user->ID, "bot_step", 'company-create-job-address');
                    $this->sendMessage($chatId, "موقعیت مکانی و آدرس شغل");
                    break;
                }
            case "company-create-job-address": {
                    update_post_meta(get_the_author_meta("create_job_id", $user->ID), 'address', $text);
                    update_user_meta($user->ID, "bot_step", 'company-create-job-desc');
                    $this->sendMessage($chatId, urlencode('شرح شغل را ذکر کنید'));
                    break;
                }
            case "company-create-job-desc": {
                    $my_post = array(
                        'ID'            => get_the_author_meta("create_job_id", $user->ID),
                        'post_content'      => $text,
                        'post_status'  => 'publish'
                    );
                    wp_update_post($my_post);
                    update_post_meta(get_the_author_meta("create_job_id", $user->ID), 'desc', $text);
                    update_user_meta($user->ID, "bot_step", 'company-create-job-finish');
                    $this->sendMessage($chatId, 'آگهی پس از بررسی ادمین منتشر خواهد شد');
                    $this->company_menu($user, $chatId);
                    break;
                }
            default: {
                    //    $this->sendMessage($chatId, "خطا" . " : " . $step);
                };
        }

        //update_user_meta($user->ID, "bot_step", "input_text");
    }

    public function start_menu($item)
    {
        $chatId = $item['message']['chat']['id'];

        $this->run_start_menu($chatId);
    }

    public function run_start_menu($chatId)
    {

        $keyboard = [
            'keyboard' => [
                [
                    ['text' => 'ثبت نام کارجو'],
                    ['text' => 'ثبت نام کارفرما']
                ],
                [
                    ['text' => 'ورود کارجو'],
                    ['text' => 'ورود کارفرما']
                ]
            ],

            'one_time_keyboard' => true,
            'resize_keyboard' => true
        ];
        $encodedKeyboard = json_encode($keyboard);


        $this->sendMessage($chatId, "یکی از گزینه های زیر را انتخاب نمایید", "&reply_markup=" . $encodedKeyboard);
    }
    public function login_user($chatid)
    {
        $user = get_user_by('login', $chatid);
        if ($user) {
            update_user_meta($user->ID, "user_type_login", "user");
            $user1 =  $this->get_login($chatid);
            $this->user_menu($user1, $chatid);
        } else {

            $this->sendMessage($chatid, urlencode('هنوز به عنوان کارجو ثبت نام نکرده اید'));
        }
    }

    public function login_company($chatid)
    {
        $user = get_user_by('login', $chatid);
        if ($user) {
            update_user_meta($user->ID, "user_type_login", "com");
            $user1 =  $this->get_login($chatid);
            $this->company_menu($user1, $chatid);
        } else {

            $this->sendMessage($chatid, urlencode('هنوز به عنوان کارفرما ثبت نام نکرده اید'));
        }
    }

    public function user_menu($user, $chatId)
    {
        $step = get_the_author_meta('bot_step', $user->ID);
        $user1 =  $this->get_login($chatId);

        $keyboard = [
            'keyboard' => [
                [
                    ['text' => 'مشاهده رزومه'],
                    ['text' => 'ساخت رزومه']
                ],
                [
                    ['text' => 'شغل های پیشنهادی'],
                    ['text' => 'درخواست های من']
                ]
            ],
            'one_time_keyboard' => true,
            'resize_keyboard' => true
        ];
        $encodedKeyboard = json_encode($keyboard);

        update_user_meta($user->ID, "bot_step", "menu");
        update_user_meta($user->ID, "back_menu", 'start');

        $this->sendMessage($chatId, urlencode("منوی کارجو"), "&reply_markup=" . $encodedKeyboard);
    }

    public function company_menu($user, $chatId)
    {
        $step = get_the_author_meta('bot_step', $user->ID);

        $keyboard = [
            'keyboard' => [
                [
                    ['text' => 'ویرایش پروفایل'],
                    ['text' => 'ارسال آگهی'],
                    ['text' => 'آگهی های من']
                ],
                [
                    ['text' => 'رزومه های بررسی نشده']
                ],
                [
                    ['text' => 'رزومه های تایید برای مصاحبه']
                ],
                [
                    ['text' => 'رزومه های استخدام شده']
                ]
            ],
            'one_time_keyboard' => true,
            'resize_keyboard' => true
        ];
        $encodedKeyboard = json_encode($keyboard);

        update_user_meta($user->ID, "bot_step", "menu");
        update_user_meta($user->ID, "back_menu", 'start');

        $this->sendMessage($chatId, urlencode("منوی کارفرما"), "&reply_markup=" . $encodedKeyboard);
    }

    public function company_cat($user, $chatId)
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

        $this->sendMessage($chatId, "دسته بندی را انتخاب نمائید", "&reply_markup=" . $encodedKeyboard);
    }

    public function company_selected_cat($cat_id, $chatId)
    {

        $user =  $this->get_login($chatId);
        update_user_meta($user->ID, "cat_id", $cat_id);
        $this->sendMessage($chatId, "اطلاعات ثبت شد");
    }

    public function company_job_delete($job_id, $chatId)
    {
        $user =  $this->get_login($chatId);
        wp_delete_post($job_id);
        $this->sendMessage($chatId, urlencode("آگهی مورد نظر حذف شد"));
    }
    public function company_request_status($job_id, $chatId, $status)
    {
        $user =  $this->get_login($chatId);
        update_post_meta($job_id, 'status', $status);
        $this->sendMessage($chatId, urlencode("وضعیت درخواست تغییر یافت"));
    }



    public function company_profile($user, $chatId)
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
            'keyboard' => [
                [
                    ['text' => 'ویرایش نام شرکت']
                ],
                [
                    ['text' => 'ویرایش ایمیل']
                ],
                [
                    ['text' => 'ویرایش وب سایت']
                ],
                [
                    ['text' => 'ویرایش دسته بندی']
                ],
                [
                    ['text' => 'ویرایش تلفن']
                ],
                [
                    ['text' => 'ویرایش درباره شرکت']
                ]
            ],
            'one_time_keyboard' => true,
            'resize_keyboard' => true
        ];
        $encodedKeyboard = json_encode($keyboard);

        $desc = "اطلاعات پروفایل :";
        $desc .= PHP_EOL . 'نام شرکت' . ' : ' . get_the_author_meta('company_name', $user->ID);
        $desc .= PHP_EOL . 'ایمیل' . ' : ' . get_the_author_meta('company_email', $user->ID);
        $desc .= PHP_EOL . 'وب سایت' . ' : ' . get_the_author_meta('web', $user->ID);
        $desc .= PHP_EOL . 'دسته بندی' . ' : ' . $selected_cat;
        $desc .= PHP_EOL . 'تلفن' . ' : ' . get_the_author_meta('tel', $user->ID);
        $desc .= PHP_EOL . 'درباره شرکت' . ' : ' . get_the_author_meta('desc', $user->ID);
        update_user_meta($user->ID, "back_menu", 'ورود کارفرما');

        $this->sendMessage($chatId, urlencode($desc), "&reply_markup=" . $encodedKeyboard);
    }

    public function company_create_job($user, $chatId)
    {
        update_user_meta($user->ID, "bot_step", 'company-create-job-name');

        $this->sendMessage($chatId, "عنوان آگهی را وارد نمائید");
    }

    public function company_my_jobs($user, $chatId)
    {

        $data = json_decode(get_the_author_meta('resume-skills', $user->ID));
        $skills = [];
        if (isset($data->skills)) {
            $skills = explode(',', $data->skills);
        }

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            'post_type' => 'job',
            'author'  => $user->ID,
            'post_status' => 'publish'
        );
        $the_query = new WP_Query($args);
        $count = $the_query->post_count;
        $this->sendMessage($chatId, $count . " " . "آگهی پیدا شده است");
        while ($the_query->have_posts()) :
            $the_query->the_post();
            $keyboard = [
                'inline_keyboard' => [
                    [
                        ['text' => 'حذف آگهی', 'callback_data' => 'company-job-remove-' . get_the_ID()],
                        ['text' => 'ویرایش آگهی', 'callback_data' => 'company-job-edit-' . get_the_ID()]
                    ]
                ]
            ];
            $encodedKeyboard = json_encode($keyboard);
            $desc = "";
            $desc .= PHP_EOL . "وضعیت آگهی" . " : " . get_the_job_status(get_post_meta(get_the_ID(), 'active', true), false);
            $desc .= PHP_EOL . "نوع همکاری" . " : " . get_post_meta(get_the_ID(), 'coop-type', true);
            $desc .= PHP_EOL . "سابقه کاری" . " : " . get_post_meta(get_the_ID(), 'exp', true);
            $desc .= PHP_EOL . "حداقل حقوق برای هر ساعت" . " : " . get_post_meta(get_the_ID(), 'min-salary', true) . ' ' . 'دلار';
            $desc .= PHP_EOL . "حداکثر حقوق برای هر ساعت" . " : " . get_post_meta(get_the_ID(), 'max-salary', true) . ' ' . 'دلار';
            $desc .= PHP_EOL . "موقعیت مکانی" . " : " . get_post_meta(get_the_ID(), 'address', true);
            $desc .= PHP_EOL . "شرح شغل" . " : " . get_post_meta(get_the_ID(), 'desc', true);

            $this->sendMessage($chatId, urlencode(get_the_title() . ' / ' . get_the_title(get_post_meta(get_the_ID(), 'cat_id', true)) . ' ' . PHP_EOL . get_post_meta(get_the_ID(), 'tag', true) . $desc), "&reply_markup=" . $encodedKeyboard);
        endwhile;
        wp_reset_query();
        $this->company_menu($user, $chatId);
    }

    public function user_profile($user, $chatId)
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

        $this->sendMessage($chatId, urlencode("اطلاعات فردی"), "&reply_markup=" . $encodedKeyboard);
    }

    public function user_resume($user, $chatId)
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

        $this->sendMessage($chatId, urlencode("رزومه من"), "&reply_markup=" . $encodedKeyboard);
    }

    public function user_job_request($job_id, $chatId)
    {
        $user =  $this->get_login($chatId);
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
            'author__in'  => [$user->ID],
            'meta_query'        => $search
        );
        $the_query = new WP_Query($args);

        $count = $the_query->post_count;


        if ($count > 0) {
            $this->sendMessage($chatId, urlencode("شما قبلا به این موقعیت شغلی درخواست ارسال کرده اید"));

            return;
        }

        $args_post = array(
            'post_title'   => get_the_author_meta('user_name', $user->ID),
            'post_type'    => 'request',
            'post_author'  => $user->ID,
            'post_status'  => 'publish',
            'meta_input'   => array(
                'status' => 0,
                'job_id' => $job_id,
                'owner_id' => $owner_id
            )
        );
        $id = wp_insert_post($args_post);
        $this->sendMessage($chatId, urlencode("رزومه شما با موفقیت برای این موقعیت شغلی ارسال شد،کارفرما پس از بررسی با شما تماس خواهد گرفت."));
        $this->user_menu($user, $chatId);
    }

    public function user_jobs($user, $chatId)
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
        $this->sendMessage($chatId, $count . " " . "شغل پیدا شده است");
        while ($the_query->have_posts()) :
            $the_query->the_post();
            $keyboard = [
                'inline_keyboard' => [
                    [
                        ['text' => 'ارسال درخواست همکاری', 'callback_data' => 'user-request-job-' . get_the_ID()]
                    ]
                ]
            ];
            $encodedKeyboard = json_encode($keyboard);
            $desc = "";
            $desc .= PHP_EOL . "نوع همکاری" . " : " . get_post_meta(get_the_ID(), 'coop-type', true);
            $desc .= PHP_EOL . "سابقه کاری" . " : " . get_post_meta(get_the_ID(), 'exp', true);
            $desc .= PHP_EOL . "حداقل حقوق برای هر ساعت" . " : " . get_post_meta(get_the_ID(), 'min-salary', true) . ' ' . 'دلار';
            $desc .= PHP_EOL . "حداکثر حقوق برای هر ساعت" . " : " . get_post_meta(get_the_ID(), 'max-salary', true) . ' ' . 'دلار';
            $desc .= PHP_EOL . "موقعیت مکانی" . " : " . get_post_meta(get_the_ID(), 'address', true);
            $desc .= PHP_EOL . "شرح شغل" . " : " . strip_tags(get_post_meta(get_the_ID(), 'desc', true));

            $this->sendMessage($chatId, urlencode(get_the_title() . ' / ' . get_the_title(get_post_meta(get_the_ID(), 'cat_id', true)) . ' ' . PHP_EOL . get_post_meta(get_the_ID(), 'tag', true) . $desc), "&reply_markup=" . $encodedKeyboard);
        endwhile;
        wp_reset_query();
        $this->user_menu($user, $chatId);
    }


    public function user_requests($user, $chatId)
    {

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            'post_type' => 'request',
            'post_status' => 'publish',
            'author__in'  => [$user->ID],
            'posts_per_page' => 50,
            'paged' => $paged
        );
        $the_query = new WP_Query($args);
        $count = $the_query->post_count;
        $this->sendMessage($chatId, 'شما' . ' ' . $count . " "  . "درخواست همکاری دارید");
        while ($the_query->have_posts()) :
            $the_query->the_post();
            $job_id = get_post_meta(get_the_ID(), 'job_id', true);

            $st = "وضعیت درخواست" . " : ";
            $status = get_post_meta(get_the_ID(), 'status', true);
            if ($status == 1) {
                $st = $st . 'بررسی شده';
            } else if ($status == 2) {
                $st = $st . 'تایید برای مصاحبه';
            } else if ($status == 3) {
                $st = $st . 'رد درخواست';
            } else if ($status == 4) {
                $st = $st . 'استخدام شده';
            } else {
                $st = $st . 'در انتظار وضعیت';
            }

            $this->sendMessage($chatId, urlencode(get_the_title($job_id) . ' / ' . get_the_title(get_post_meta($job_id, 'cat_id', true)) . ' ' . PHP_EOL . get_post_meta($job_id, 'tag', true) . PHP_EOL . $st));
        endwhile;
        wp_reset_query();
        $this->user_menu($user, $chatId);
    }

    public function company_request_0($user, $status = 0, $chatId)
    {

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $meta_arg = [];
        $meta_arg["relation"] = "AND";
        $meta_arg[] = ["key" => "status", "value" => $status, "compare" => "="];

        $args = array(
            'post_type' => 'request',
            'meta_key'  => 'owner_id',
            'posts_per_page' => 1000,
            'paged' => $paged,
            'meta_value' => $user->ID,
            "meta_query" => $meta_arg
        );
        $the_query = new WP_Query($args);
        $count = $the_query->post_count;
        if ($status == 0) {
            $this->sendMessage($chatId, 'شما' . ' ' . $count . " "  . "رزومه بررسی نشده دارید");
        } else if ($status == 2) {
            $this->sendMessage($chatId, 'شما' . ' ' . $count . " "  . "رزومه تایید شده برای مصاحبه دارید");
        } else if ($status == 4) {
            $this->sendMessage($chatId, 'شما' . ' ' . $count . " "  . "رزومه استخدام شده دارید");
        }

        while ($the_query->have_posts()) :
            $the_query->the_post();
            $job_id = get_post_meta(get_the_ID(), 'job_id', true);

            $st = "وضعیت درخواست" . " : ";
            $status = get_post_meta(get_the_ID(), 'status', true);
            if ($status == 1) {
                $st = $st . 'بررسی شده';
            } else if ($status == 2) {
                $st = $st . 'تایید برای مصاحبه';
            } else if ($status == 3) {
                $st = $st . 'رد درخواست';
            } else if ($status == 4) {
                $st = $st . 'استخدام شده';
            } else {
                $st = $st . 'در انتظار وضعیت';
            }

            $desc = "";
            $desc .= PHP_EOL . "درخواست کننده" . " : " . get_the_author_meta('user_name');
            $desc .= PHP_EOL .  "عنوان شغلی" . " : " . get_the_author_meta('user_exp');
            $desc .= PHP_EOL . "ایمیل" . " : " . get_the_author_meta('user_e_email');
            $desc .= PHP_EOL . "سال تولد" . " : " . get_the_author_meta('user_date_year');
            $desc .= PHP_EOL . "استان و شهر" . " : " . get_the_author_meta('user_state') . ' ' . get_the_author_meta('user_city');
            $desc .= PHP_EOL . "تلفن" . " : " . get_the_author_meta('tel');

            $data = json_decode(get_the_author_meta('resume-skills'));
            $skills = PHP_EOL .  "خالی است";
            if (isset($data->skills)) {
                $skills = $data->skills;
            }

            $desc .= PHP_EOL .  "مهارت" . " : " . $skills;

            $data = json_decode(get_the_author_meta('resume-about'));
            $about = PHP_EOL .  "خالی است";
            if (isset($data->about)) {
                $about = $data->about;
            }

            $desc .= PHP_EOL .  "درباره" . " : " . $about;

            $keyboard = [
                'inline_keyboard' => [
                    [
                        ['text' => 'رد درخواست', 'callback_data' => 'company-request-job-not-accept-' . get_the_ID()],
                        ['text' => 'تایید برای مصاحبه', 'callback_data' => 'company-request-job-accept-' . get_the_ID()],
                        ['text' => 'استخدام شد', 'callback_data' => 'company-request-job-emp-accept-' . get_the_ID()]
                    ],
                    [
                        ['text' => 'مشاهده رزومه', 'callback_data' => 'user-profile-view-' . get_the_author_meta('ID')]
                    ]
                ]
            ];
            $encodedKeyboard = json_encode($keyboard);


            $this->sendMessage($chatId, urlencode(get_the_title($job_id) . ' / ' . get_the_title(get_post_meta($job_id, 'cat_id', true)) . ' ' . PHP_EOL . get_post_meta($job_id, 'tag', true) . PHP_EOL . $st . $desc), "&reply_markup=" . $encodedKeyboard);
        endwhile;
        wp_reset_query();
        $this->company_menu($user, $chatId);
    }


    public function register_user($chat_id)
    {
        $user1 = get_user_by('login', $chat_id);
        if ($user1) {
        } else {
            $pass = rand(1000000, 9999999);
            $result = wp_create_user($chat_id, $pass);
            $user1 = get_user_by('id', $result);
        }
        update_user_meta($user1->ID, "user_type_login", "user");
        $user = get_user_by('id', get_the_author_meta('user_username', $user1->ID));
        if ($user) {
            $user_name = get_the_author_meta('user_name', $user->ID);
            if (strlen($user_name) == 0) {
                update_user_meta($user->ID, "bot_step", 'user-profile-register-name');
                $this->sendMessage($chat_id, urlencode("نام و نام خانوادگی را وارد نمائید"));
            } else {
                $this->sendMessage($chat_id, urlencode("شما قبلا به عنوان کارجو ثبت نام کرده اید"));
                $this->run_start_menu($chat_id);
            }
            return;
        }
        $pass = rand(1000000, 9999999);
        $result = wp_create_user($chat_id . "_user", $pass);
        if (is_wp_error($result)) {
            $error = $result->get_error_message();
        } else {
            $user = get_user_by('id', $result);
            update_user_meta($user->ID, "user_pass", $pass);
            update_user_meta($user1->ID, "user_username", $user->ID);
            update_user_meta($user->ID, "user_type", "user");
            update_user_meta($user->ID, "bot_step", "start");
            update_user_meta($user->ID, "user_type_login", "user");

            update_user_meta($user->ID, "bot_step", 'user-profile-register-name');
            $this->sendMessage($chat_id, urlencode("نام و نام خانوادگی را وارد نمائید"));
        }
    }

    public function register_company($chat_id)
    {
        $user1 = get_user_by('login', $chat_id);
        if ($user1) {
        } else {
            $pass = rand(1000000, 9999999);
            $result = wp_create_user($chat_id, $pass);
            $user1 = get_user_by('id', $result);
        }
        update_user_meta($user1->ID, "user_type_login", "com");
        $user = get_user_by('id', get_the_author_meta('com_username', $user1->ID));
        if ($user) {
            $user_name = get_the_author_meta('company_name', $user->ID);
            if (strlen($user_name) == 0) {
                update_user_meta($user->ID, "bot_step", 'company-profile-register-name');
                $this->sendMessage($chat_id, urlencode("نام شرکت را وارد نمائید"));
            } else {
                $this->sendMessage($chat_id, urlencode("شما قبلا به عنوان کارفرما ثبت نام کرده اید"));
                $this->run_start_menu($chat_id);
            }
            return;
        }
        $pass = rand(1000000, 9999999);
        $result = wp_create_user($chat_id . "_com", $pass);
        if (is_wp_error($result)) {
            $error = $result->get_error_message();
        } else {
            $user = get_user_by('id', $result);
            update_user_meta($user->ID, "company_pass", $pass);
            update_user_meta($user1->ID, "com_username", $user->ID);
            update_user_meta($user->ID, "user_type", "company");
            update_user_meta($user->ID, "bot_step", "start");
            update_user_meta($user->ID, "bot_step", 'company-profile-register-name');
            update_user_meta($user->ID, "user_type_login", "com");
            $this->sendMessage($chat_id, urlencode("نام شرکت را وارد نمائید"));
        }
    }
}
