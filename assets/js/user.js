function ajax_submit_mbm_register(username, email, first_name, last_name, pass, re_pas, element_error, element_done) {

    var error = '';
    element_error.html('');
    element_done.html('');


    if (username.length == 0) {
        error = 'نام کاربری نباید خالی بماند';
    }

    if (email.length == 0) {
        error += '<br>' + 'ایمیل نباید خالی بماند';
    }


    if (pass.length == 0) {
        error += '<br>' + 'رمز عبور نباید خالی بماند';
    }

    if (pass != re_pas) {
        error += '<br>' + 'تکرار رمز عبور صحیح نمی باشد';
    }

    if (error.length > 0) {
        element_error.html(error);
        return;
    }


    custom_theme_mbm_base_ajax({
        'action': 'mbm_set_session',
        'first_name': first_name,
        'last_name': last_name,
        'pass': pass,
    }, function (result) {
        jQuery.ajax({
            url: custom_theme_mbm_object.siteurl + '/wp-login.php?action=register',
            data: {
                'user_login': username,
                'user_email': email
            },
            type: 'POST',
            success: function (result) {
                //  console.log(result);
                var found = $(result).find("#login_error");
                if (found.length > 0) {
                    element_error.html(found.html());
                }
                else {
                    element_done.html('<p>' + 'ثبت نام با موفقیت انجام شد. ایمیل تایید فرستاده شد' + '</p>' + '<p>' + 'برای ورود ' + '<a href="' + custom_theme_mbm_object.loginurl + '">' + 'اینجا کلیک فرمائید' + '</a>' + '</p>');
                }
            },
            beforeSend: function () {
                jQuery('.loading-ajax').show();
            },
            complete: function () {
                jQuery('.loading-ajax').hide();
            }
        });
    });


}