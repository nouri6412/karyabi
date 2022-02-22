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
            padding: 20px;
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
    </style>
</head>

<body>
    <div class="toolbar">
        <input class="btn-pdf" type="button" id="create_pdf" value="دریافت رزومه">
    </div>

    <div class="form" style="max-width: none; width: 1005px;margin: auto;">
        <div class="main">
            <div class="info">
                <div class="info-avatar">
                    <?php
                    $avatar = get_field('header', 'option')["logo"];
                    if (isset($user_meta['avatar'])) {
                        $avatar = $user_meta['avatar'][0];
                    }
                    ?>
                    <img src="<?php echo $avatar; ?>">
                    <h3><?php echo isset($user_meta['user_name']) ? $user_meta['user_name'][0] : '';  ?></h3>
                </div>
                <div class="info-profile">
                    <h5>اطلاعات شخصی</h5>
                    <div class="label">
                        <span class="title">تخصص :</span><span class="value"><?php echo isset($user_meta['user_exp']) ? $user_meta['user_exp'][0] : '';  ?></span>
                    </div>
                    <div class="label">
                        <span class="title">آدرس ایمیل :</span><span class="value"><?php echo isset($user_meta['user_e_email']) ? $user_meta['user_e_email'][0] : '';  ?></span>
                    </div>
                    <div class="label">
                        <span class="title">شماره موبایل :</span><span class="value"><?php echo isset($user_meta['tel']) ? $user_meta['tel'][0] : '';  ?></span>
                    </div>
                    <div class="label">
                        <span class="title">سال تولد :</span><span class="value"><?php echo isset($user_meta['user_date_year']) ? $user_meta['user_date_year'][0] : '';  ?></span>
                    </div>
                    <div class="label">
                        <span class="title">جنسیت :</span><span class="value"><?php echo (isset($user_meta['user-sex']) && $user_meta['user-sex'][0] == "male") ? 'مرد' : '';  ?><?php echo (isset($user_meta['user-sex']) && $user_meta['user-sex'][0] == "fmale") ? 'زن' : '';  ?></span>
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
                        <span class="title">استان :</span><span class="value"><?php echo $state;  ?></span>
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
                        <span class="title">شهر :</span><span class="value"><?php echo $city;  ?></span>
                    </div>
                </div>
            </div>
            <div class="exp">
                <h4>درباره من</h4>
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
                <h4>سوابق شغلی</h4>
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
                <h4>مهارت ها</h4>
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
                <h4>سوابق تحصیلی</h4>
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
                <h4>زبان های مسلط</h4>
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