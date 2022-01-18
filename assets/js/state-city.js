function ajax_submit_mbm_get_city_list(state_id, element_box_city,city_id="city-id", default_value = 0) {

    custom_theme_mbm_base_ajax({
        'action': 'mbm_common_city_list',
        'state_id': state_id
    }, function (result) {
        var i = 0;
        var html = '<select class="form-control" id="'+city_id+'" >';
        html += '<option value="0"></option>';
        for (i = 0; i < result.length; i++) {
            var selected = '';
            if (result[i].id == default_value) {
                selected = 'selected';
            }
            html += '<option ' + selected + ' value="' + result[i].id + '">' + result[i].title + '</option>';
        }
        html += '</select>';
        element_box_city.html(html);
    });
}