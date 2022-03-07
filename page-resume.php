<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Karyabi
 * @since 1.0.0
 * Template Name: مشاهده رزومه
 */
?>
<?php

$user_id = 0;

if (isset($_GET["user_id"])) {
    $user_id = $_GET["user_id"];
}

$user_info = get_userdata($user_id);
$user_meta = get_user_meta($user_id);

?>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/plugins/fontawesome/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-3.6.0.min.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jspdf.min.js"></script>
    <style>
        @font-face {
            font-family: 'Vazir';
            src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/vazir/eot/Vazir.eot');
            src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/vazir/eot/Vazir.eot?#iefix') format('embedded-opentype'),
                url('<?php echo get_template_directory_uri(); ?>/assets/fonts/vazir/woff2/Vazir.woff2') format('woff2'),
                url('<?php echo get_template_directory_uri(); ?>/assets/fonts/vazir/woff/Vazir.woff') format('woff'),
                url('<?php echo get_template_directory_uri(); ?>/assets/fonts/vazir/ttf/Vazir.ttf') format('truetype');
            font-weight: normal;
        }

        @font-face {
            font-family: 'Vazir';
            src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/vazir/eot/Vazir-Bold.eot');
            src: url('<?php echo get_template_directory_uri(); ?>/assets/fonts/vazir/eot/Vazir-Bold.eot?#iefix') format('embedded-opentype'),
                url('<?php echo get_template_directory_uri(); ?>/assets/fonts/vazir/woff2/Vazir-Bold.woff2') format('woff2'),
                url('<?php echo get_template_directory_uri(); ?>/assets/fonts/vazir/woff/Vazir-Bold.woff') format('woff'),
                url('<?php echo get_template_directory_uri(); ?>/assets/fonts/vazir/ttf/Vazir-Bold.ttf') format('truetype');
            font-weight: bold;
        }

        * {
            font-family: Vazir;
        }

        body {
            direction: rtl;
            text-align: right;
            background-color: #333;
            margin: 0;
            color: #555;
        }

        .main {
            width: 100%;
            display: flex;
            margin-top: 10px;
        }

        .main .info {
            min-height: 200px;
            background-color: #cde9ff;
            width: 30%;
           
        }
.panel-padding{
    padding: 20px;
}
        .main .info .info-avatar {
            margin: auto;
        }

        .main .info .info-avatar img {
            width: 120px;
            border-radius: 50%;
            margin: auto;
            display: block;
        }

        .main .info .info-avatar h3 {

            text-align: center;
            font-size: 22px;
            margin-top: 8px;
        }

        .main .info .info-profile {}

        .main .info .info-profile h5 {
            margin-bottom: 10px;
            font-size: 22px;
        }

        .main .info .info-profile .label {
            font-size: 14px;
            margin-top: 10px;
        }

        .main .info .info-profile .label .title {}

        .main .info .info-profile .label .value {
            margin-right: 4px;
        }

        .main .exp {
            min-height: 200px;
            background-color: #fff;
            width: 70%;
           
            font-size: 14px;
        }

        .main .exp hr {}

        .main .exp h4 {
            border-bottom: 1px solid #c7c6c6;
            padding-bottom: 5px;
            margin-top: 50px;
            font-size: 18px;
        }

        .main .exp .company-title {
            color: #000;
            font-size: 16px;
            font-weight: bold;
        }

        .toolbar {
            width: 100%;
            background-color: #141313;
            display: none;
            padding: 8px;
        }

        .toolbar .btn-pdf {
            background-color: #24d947;
            color: #fff;
        }

        .info-link {
            text-align: center;
            padding-top: 24px;
        }

        .info-link a {
            color: #eb6161;
            text-decoration: none;
        }

        @media screen and (max-width:768px) {
            .main {
                display: block;
            }

            .main .info {
                width: 100%;
            }

            .main .exp {
                width: 100%;
            }
        }
    </style>
</head>

<body>
    <div class="toolbar">
        <input class="btn-pdf" type="button" id="create_pdf" value="دریافت رزومه">
    </div>

    <div class="form" style="width: 80%;max-width: none ;margin: auto;">
        <div class="main">
            <div class="info">
                <div class="panel-padding">
                    <div class="info-avatar">
                        <?php
                        $avatar = get_template_directory_uri() . "/assets/img/male.jpg";
                        if (isset($user_meta['user-sex']) && $user_meta['user-sex'][0] == "fmale") {
                            $avatar = get_template_directory_uri() . "/assets/img/female.jpg";
                        }
                        if (isset($user_meta['avatar'])) {
                            $avatar = $user_meta['avatar'][0];
                        }
                        ?>
                        <img src="<?php echo $avatar; ?>">
                        <h3><?php echo isset($user_meta['user_name']) ? $user_meta['user_name'][0] : '';  ?></h3>
                    </div>
                    <div class="info-profile">
                        <h5><i class="fa fa-info-circle"></i> اطلاعات شخصی</h5>
                        <div class="label">
                            <span class="title"><i class="fa fa-tasks"></i> تخصص :</span><span class="value"><?php echo isset($user_meta['user_exp']) ? $user_meta['user_exp'][0] : '';  ?></span>
                        </div>
                        <div class="label">
                            <span class="title"><i class="fa fa-envelope"></i> آدرس ایمیل :</span><span class="value"><?php echo isset($user_meta['user_e_email']) ? $user_meta['user_e_email'][0] : '';  ?></span>
                        </div>
                        <div class="label">
                            <span class="title"><i class="fa fa-phone"></i> شماره موبایل :</span><span class="value"><?php echo isset($user_meta['tel']) ? $user_meta['tel'][0] : '';  ?></span>
                        </div>
                        <div class="label">
                            <span class="title"><i class="fa fa-calendar"></i> سال تولد :</span><span class="value"><?php echo isset($user_meta['user_date_year']) ? $user_meta['user_date_year'][0] : '';  ?></span>
                        </div>
                        <div class="label">
                            <span class="title"><i class="fa fa-user"></i> جنسیت :</span><span class="value"><?php echo (isset($user_meta['user-sex']) && $user_meta['user-sex'][0] == "male") ? 'مرد' : '';  ?><?php echo (isset($user_meta['user-sex']) && $user_meta['user-sex'][0] == "fmale") ? 'زن' : '';  ?></span>
                        </div>
                        <div class="label">
                            <?php
                            $Common_State_City = new Common_State_City;

                            $states = $Common_State_City->get_state_list();
                            $state_id = isset($user_meta['state_id']) ? $user_meta['state_id'][0] : 0;
                            $state = "";
                            foreach ($states as $item) {
                                $selected = "";
                                if ($state_id == $item["id"]) {
                                    $state = $item["title"];
                                }
                            }
                            ?>
                            <span class="title"><i class="fa fa-map-marker"></i> استان :</span><span class="value"><?php echo $state;  ?></span>
                        </div>
                        <div class="label">
                            <?php
                            $citis = $Common_State_City->get_city_list($state_id);
                            $city_id = isset($user_meta['city_id']) ? $user_meta['city_id'][0] : 0;
                            $city = "";
                            foreach ($citis as $item) {
                                $selected = "";
                                if ($city_id == $item["id"]) {
                                    $city = $item["title"];
                                }
                            }
                            ?>
                            <span class="title"><i class="fa fa-map-marker"></i> شهر :</span><span class="value"><?php echo $city;  ?></span>
                        </div>
                    </div>
                    <div class="info-link">
                        <a target="_Blank" href="https://karyabee.ca/">www.karyabee.ca</a>
                    </div>
                </div>
            </div>
            <div class="exp">
                <div class="panel-padding">
                    <h4><i class="fa fa-info-circle"></i> درباره من</h4>
                    <div class="detail">
                        <?php
                        $data = [];
                        $data["about"] = "خالی است";
                        if (isset($user_meta["resume-about"])) {
                            $data = json_decode($user_meta["resume-about"][0]);
                        }
                        ?>
                        <?php echo isset($data->about) ? $data->about : '';  ?>
                    </div>
                    <h4><i class="fa fa-history"></i> سوابق شغلی</h4>
                    <div class="detail">
                        <?php
                        $data = [];
                        if (isset($user_meta["resume-exp"])) {
                            $data_1 = json_decode($user_meta["resume-exp"][0]);

                            if (!is_array($data_1->exp)) {
                                $data = json_decode($data_1->exp);
                            }

                            if (!$data) {
                                $data = $data_1->exp;
                            }
                        }
                        ?>
                        <?php foreach ($data as $item) {
                        ?>

                            <p class="company-title m-b0"><?php echo $item->company ?></p>
                            <p class="m-b0"><?php echo $item->title ?></p>
                            <p class="m-b0"><?php echo 'تجربه کاری از سال' . ' ' . $item->date_from . " " . " تا سال" . " " . $item->date_to; ?></p>
                            <p class="m-b0"><?php echo $item->desc ?></p>

                        <?php
                        }  ?>
                    </div>
                    <h4><i class="fa fa-tasks"></i> مهارت ها</h4>
                    <div class="detail">
                        <?php
                        $data = [];
                        if (isset($user_meta["resume-skills"])) {
                            $data = json_decode($user_meta["resume-skills"][0]);
                        }
                        $skills = [];
                        if (isset($data->skills)) {
                            $skills = explode(',', $data->skills);
                        }
                        ?>
                        <ul>
                            <?php
                            foreach ($skills as $item) {
                            ?>
                                <li><?php echo $item; ?></li>

                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                    <h4><i class="fa fa-graduation-cap"></i> سوابق تحصیلی</h4>
                    <div class="detail">
                        <?php
                        $data = [];
                        if (isset($user_meta["resume-edu"])) {
                            $data_1 = json_decode($user_meta["resume-edu"][0]);

                            if (!is_array($data_1->exp)) {
                                $data = json_decode($data_1->exp);
                            }
                            if (!$data) {
                                $data = $data_1->exp;
                            }
                        }
                        ?>
                        <?php foreach ($data as $item) {
                        ?>
                            <p class="company-title m-b0"><?php echo 'دانشگاه' . ' : ' . $item->uni ?></p>
                            <p class="m-b0"><?php echo 'رشته' . ' : ' . $item->major ?></p>
                            <p class="m-b0"><?php echo 'مقطع' . ' : ' . $item->grade ?></p>
                            <p class="m-b0"><?php echo '  از سال' . ' ' . $item->date_from . " " . " تا سال" . " " . $item->date_to; ?></p>

                        <?php
                        }  ?>
                    </div>
                    <h4><i class="fa fa-language"></i> زبان های مسلط</h4>
                    <div class="detail">
                        <?php
                        $data = [];
                        if (isset($user_meta["resume-lang"])) {
                            $data_1 = json_decode($user_meta["resume-lang"][0]);

                            if (!is_array($data_1->exp)) {
                                $data = json_decode($data_1->exp);
                            }
                            if (!$data) {
                                $data = $data_1->exp;
                            }
                        }
                        ?>
                        <ul>
                            <?php
                            foreach ($data as $item) {
                            ?>
                                <li><?php echo $item->title . ' : ' . $item->degree ?></li>

                            <?php
                            }
                            ?>
                        </ul>
                    </div>

                    <h4><i class="fa fa-language"></i> ترجیحات شغلی</h4>
                    <div class="detail">
                        <?php
                        class prefer_object_1
                        {
                        }
                        $data = new prefer_object_1;
                        $data->salary = "";
                        if (isset($user_meta["resume-prefer"])) {
                            $data = json_decode($user_meta["resume-prefer"][0]);
                        }
                        ?>
                        <p class="m-b0"><i class="fa fa-money"></i> <?php echo 'حداقل حقوق درخواستی به دلار بر حسب ساعت' . ' : ';
                                                                    echo (isset($data->salary)) ? $data->salary : '';  ?></p>
                        <hr>
                        <h5 class="m-b15 prefer-title"><i class="fa fa-list-alt"></i> سطح ارشدیت در زمینه فعالیت</h5>
                        <p class="m-b0"><?php echo (isset($data->degree1) && $data->degree1 == 1) ? 'تازه کار' : '';  ?></p>
                        <p class="m-b0"><?php echo (isset($data->degree2) && $data->degree2 == 1) ? ' متخصص' : '';  ?></p>
                        <p class="m-b0"><?php echo (isset($data->degree3) && $data->degree3 == 1) ? ' مدیر' : '';  ?></p>
                        <p class="m-b0"><?php echo (isset($data->degree4) && $data->degree4 == 1) ? ' مدیر ارشد' : '';  ?></p>
                        <hr>
                        <h5 class="m-b15 prefer-title"><i class="fa fa-file"></i> نوع قراردادهای قابل قبول</h5>
                        <p class="m-b0"><?php echo (isset($data->emp1) && $data->emp1 == 1) ? 'تمام وقت' : '';  ?></p>
                        <p class="m-b0"><?php echo (isset($data->emp2) && $data->emp2 == 1) ? ' پاره وقت' : '';  ?></p>
                        <p class="m-b0"><?php echo (isset($data->emp3) && $data->emp3 == 1) ? ' دورکاری' : '';  ?></p>
                        <p class="m-b0"><?php echo (isset($data->emp4) && $data->emp4 == 1) ? 'کارآموز' : '';  ?></p>
                        <hr>
                        <h5 class="m-b15 prefer-title"><i class="fa fa-tasks"></i> مزایای شغلی موردنظر</h5>
                        <p class="m-b0"> <?php echo (isset($data->adv1) && $data->adv1 == 1) ? '<i class="fa fa-user"></i>' . ' ' . 'امکان ترفیع سمت' : '';  ?></p>
                        <p class="m-b0"><?php echo (isset($data->adv2) && $data->adv2 == 1) ? '<i class="fa fa-medkit"></i>' . ' ' . ' بیمه' : '';  ?></p>
                        <p class="m-b0"><?php echo (isset($data->adv3) && $data->adv3 == 1) ? '<i class="fa fa-graduation-cap"></i>' . ' ' . ' دوره های آموزشی' : '';  ?></p>
                        <p class="m-b0"><?php echo (isset($data->adv4) && $data->adv4 == 1) ? '<i class="fa fa-train"></i>' . ' ' . 'سرویس رفت و آمد' : '';  ?></p>
                        <p class="m-b0"><?php echo (isset($data->adv5) && $data->adv5 == 1) ? '<i class="fa fa-cutlery"></i>' . ' ' . 'غذا به عهده شرکت' : '';  ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        /* 
         * jQuery helper plugin for examples and tests 
         */
        (function($) {
            $.fn.html2canvas = function(options) {
                var date = new Date(),
                    $message = null,
                    timeoutTimer = false,
                    timer = date.getTime();
                html2canvas.logging = options && options.logging;
                html2canvas.Preload(this[0], $.extend({
                    complete: function(images) {
                        var queue = html2canvas.Parse(this[0], images, options),
                            $canvas = $(html2canvas.Renderer(queue, options)),
                            finishTime = new Date();

                        $canvas.css({
                            position: 'absolute',
                            left: 0,
                            top: 0
                        }).appendTo(document.body);
                        $canvas.siblings().toggle();

                        $(window).click(function() {
                            if (!$canvas.is(':visible')) {
                                $canvas.toggle().siblings().toggle();
                                throwMessage("Canvas Render visible");
                            } else {
                                $canvas.siblings().toggle();
                                $canvas.toggle();
                                throwMessage("Canvas Render hidden");
                            }
                        });
                        throwMessage('Screenshot created in ' + ((finishTime.getTime() - timer) / 1000) + " seconds<br />", 4000);
                    }
                }, options));

                function throwMessage(msg, duration) {
                    window.clearTimeout(timeoutTimer);
                    timeoutTimer = window.setTimeout(function() {
                        $message.fadeOut(function() {
                            $message.remove();
                        });
                    }, duration || 2000);
                    if ($message)
                        $message.remove();
                    $message = $('<div ></div>').html(msg).css({
                        margin: 0,
                        padding: 10,
                        background: "#000",
                        opacity: 0.7,
                        position: "fixed",
                        top: 10,
                        right: 10,
                        fontFamily: 'Tahoma',
                        color: '#fff',
                        fontSize: 12,
                        borderRadius: 12,
                        width: 'auto',
                        height: 'auto',
                        textAlign: 'center',
                        textDecoration: 'none'
                    }).hide().fadeIn().appendTo('body');
                }
            };
        })(jQuery);
    </script>
    <script>
        (function() {
            var
                form = $('.form'),
                cache_width = form.width(),
                a4 = [595.28, 841.89]; // for a4 size paper width and height  

            $('#create_pdf').on('click', function() {
                $('body').scrollTop(0);
                createPDF();
            });
            //create pdf  
            function createPDF() {
                getCanvas().then(function(canvas) {
                    var
                        img = canvas.toDataURL("image/png"),
                        doc = new jsPDF({
                            unit: 'px',
                            format: 'a4'
                        });
                    doc.addImage(img, 'JPEG', 20, 20);
                    //   doc.addFileToVFS('<?php echo get_template_directory_uri(); ?>/assets/fonts/vazir/ttf/Vazir.ttf', Vazir); // addfont
                    // doc.addFont('<?php echo get_template_directory_uri(); ?>/assets/fonts/vazir/ttf/Vazir.ttf', "Vazir", "normal");
                    // doc.setFont("Vazir");
                    doc.save('<?php echo 'رزومه' . ' ';
                                echo isset($user_meta['user_name']) ? $user_meta['user_name'][0] : '';  ?>.pdf');
                    form.width(cache_width);
                });
            }

            // create canvas object  
            function getCanvas() {
                form.width((a4[0] * 1.33333) - 80).css('max-width', 'none');
                return html2canvas(form, {
                    imageTimeout: 2000,
                    removeContainer: true
                });
            }

        }());
    </script>
</body>

</html>