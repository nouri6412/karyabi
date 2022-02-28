function ajax_submit_mbm_register(username, email, pass, re_pas,user_type, element_error, element_done) {

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

    var strongRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");

    if(!strongRegex.test(pass)) {
        error += '<br>' + 'رمز عبور شما حداقل باید 8 کاراکتر باشد و شامل حداقل یک حرف بزرگ و کوچک انگلیسی و حروف خاص مانند @,$ باشد';
    }
 
    if (error.length > 0) {
        element_error.html(error);
        return;
    }


    custom_theme_mbm_base_ajax({
        'action': 'mbm_set_session',
        'pass': pass,
        'user_type': user_type
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

function ajax_submit_mbm_login(username, pass, element_error, element_done)
{
    var error = '';
    element_error.html('');
    element_done.html('');

    jQuery.ajax({
        url: custom_theme_mbm_object.siteurl + '/wp-login.php',
        data: {
            'log': username,
            'pwd': pass
        },
        type: 'POST',
        success: function (result) {
          //   console.log(result);
            var found = $(result).find("#login_error");
            if (found.length > 0) {
                element_error.html('نام کاربری یا رمز عبور اشتباه است');
            }
            else {
               window.location.href=custom_theme_mbm_object.siteurl+'/profile';
            }
        },
        beforeSend: function () {
            jQuery('.loading-ajax').show();
        },
        complete: function () {
            jQuery('.loading-ajax').hide();
        }
    });
}