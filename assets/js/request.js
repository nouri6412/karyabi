function ajax_submit_mbm_job_request(data, btn,element_result) {

    var error = '';

    custom_theme_mbm_base_ajax(data, function (result) {

        if (result.state == 1) {
            btn.remove();
            element_result.css('display','block');
        }
        else {
            alert('error please try again!');
        }
    });
}

function ajax_submit_mbm_change_status_request(data) {

    var error = '';

    custom_theme_mbm_base_ajax(data, function (result) {

        if (result.state == 1) {
            
        }
        else {
            alert('error please try again!');
        }
    });
}