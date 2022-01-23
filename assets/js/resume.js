function ajax_submit_mbm_post_data_resume(data, element_load, modal, element_error) {

    var error = '';
    element_error.html('');

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
            element_load.html(result.html);
            modal.modal("hide");
            $('.modal-backdrop').remove();
        }
    });
}
