function ajax_mbm_upload_image(element,img='')
{
    file_data = element.prop('files')[0];
    form_data = new FormData();
    form_data.append('file', file_data);
    form_data.append('action', 'mbm_common_image_upload_avatar');
    form_data.append('security', custom_theme_mbm_object.security);

    $.ajax({
        url: custom_theme_mbm_object.ajaxurl,
        type: 'POST',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: form_data,
        success: function (response) {
            console.log(response.url);
            $('#'+img).attr('src',response.url);
            element.val('');
           
        }
    });
}

function ajax_mbm_upload_file(element,path='')
{
    file_data = element.prop('files')[0];
    form_data = new FormData();
    form_data.append('file', file_data);
    form_data.append('action', 'mbm_common_image_upload_file');
    form_data.append('security', custom_theme_mbm_object.security);

    $.ajax({
        url: custom_theme_mbm_object.ajaxurl,
        type: 'POST',
        contentType: false,
        processData: false,
        dataType: 'json',
        data: form_data,
        success: function (response) {
            console.log(response.url);
            $('#'+path).css('display','block');
            $('#'+path).attr('href',response.url);
            element.val('');          
        }
    });
}

