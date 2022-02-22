function ajax_submit_mbm_post_data_resume(data, element_load, modal, element_error) {

    var error = '';
    element_error.html('');

    if (error.length > 0) {
        element_error.html(error);
        return;
    }

    custom_theme_mbm_base_ajax(data, function (result) {

        if (result.state == 0) {
            element_error.html('<p>' + result.message + '</p>');
        }
        else {
            element_load.html(result.html);
            modal.modal("hide");
            $('.modal-backdrop').remove();
            document.location.href=custom_theme_mbm_object.siteurl+"/profile/?action=resume";
        }
    });
}

function ajax_submit_mbm_post_data_resume_save_form(data_in, element_load,element_load_in, modal, element_error) {
    var data = [];
    var forms = $("#" + element_load + ' .form-loop');

    var i = 0;
    var j = 0;
    forms.each(function (i, form) {
        var data_form = {};
        var inputs = $('input', form);
        inputs.each(function (j, input) {
            data_form[$(input).attr("data-id")] = $(input).val();
        });

        var inputs = $('select', form);
        inputs.each(function (j, input) {
            data_form[$(input).attr("data-id")] = $(input).val();
        });

        var inputs = $('textarea', form);
        inputs.each(function (j, input) {
            data_form[$(input).attr("data-id")] = $(input).val();
        });

        data[i] = data_form;
    });
    var exp_data = JSON.stringify(data);
    data_in["exp"]=exp_data;
    ajax_submit_mbm_post_data_resume(data_in, element_load_in, modal, element_error)
}


function ajax_submit_mbm_post_data_resume_get_form(data, element_load) {


    custom_theme_mbm_base_ajax(data, function (result) {

        element_load.append(result.html);

    });
}

function ajax_submit_mbm_post_data_resume_get_form_delete(element) {
    element.parent().remove();
}

