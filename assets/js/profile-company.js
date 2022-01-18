function ajax_submit_mbm_profile_company_profile(data, element_error, element_done) {

    var error = '';
    element_error.html('');
    element_done.html('');

    if (error.length > 0) {
        element_error.html(error);
        return;
    }

    custom_theme_mbm_base_ajax({
        'action': 'mbm_profile_company_profile',
        'company_name': data.company_name
    }, function (result) {
        if (result.state == 0) {
            element_error.html('<p>'+result.message+'</p>');
        }
        else {
            element_done.html('<p>'+result.message+'</p>');
        }
    });
}