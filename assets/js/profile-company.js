function ajax_submit_mbm_post_data(data, element_error, element_done) {

    var error = '';
    element_error.html('');
    element_done.html('');

    if (error.length > 0) {
        element_error.html(error);
        return;
    }

    custom_theme_mbm_base_ajax(data, function (result) {
        if (result.state == 0) {
            element_error.html('<p>' + result.message + '</p>');
        }
        else {
            element_done.html('<p>' + result.message + '</p>');
        }
    });
}

function ajax_submit_mbm_change_pass(data, element_error, element_done) {

    var error = '';
    element_error.html('');
    element_done.html('');

    if (data.new_pass.length == 0) {
        error = ' رمز عبور  نباید خالی بماند';
    }

    if (data.new_pass != data.re_pass) {
        error = 'تکرار رمز عبور صحیح نمی باشد';
    }


    if (error.length > 0) {
        element_error.html(error);
        return;
    }

    custom_theme_mbm_base_ajax(data, function (result) {
        if (result.state == 0) {
            element_error.html('<p>' + result.message + '</p>');
        }
        else {
            element_done.html('<p>' + result.message + '</p>');
        }
    });
}

function ajax_submit_mbm_post_job(data, element_error, element_done) {

    var error = '';
    element_error.html('');
    element_done.html('');

    if (data.job_title.length == 0) {
        error = 'عنوان آگهی  نباید خالی بماند';
    }

    if (error.length > 0) {
        element_error.html(error);
        return;
    }

    custom_theme_mbm_base_ajax(data, function (result) {
        console.log(result);
        if (result.state == 0) {
            element_error.html('<p>' + result.message + '</p>');
        }
        else {
            element_done.html('<p>' + result.message + '</p>');
        }
    });
}

function ajax_submit_mbm_remove_job(data, remove) {

    var error = '';
    if (confirm("are you remove the job?") == true) {
        custom_theme_mbm_base_ajax(data, function (result) {
            if (result.state == 0) {

            }
            else {
                $('#' + remove).remove();
            }
        });
    }

}
