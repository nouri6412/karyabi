function ajax_submit_mbm_job_request(data, btn, element_result) {

    var error = '';

    custom_theme_mbm_base_ajax(data, function (result) {

        if (result.state == 1) {
            btn.remove();
            element_result.css('display', 'block');
        }
        else {
            alert('error please try again!');
        }
    });
}

function ajax_submit_mbm_change_status_request(data, is_gold = 0) {

    var error = '';
    if (is_gold != 0) {
        data.status = is_gold.attr('data-status');
    }
console.log(data);
    custom_theme_mbm_base_ajax(data, function (result) {
        console.log(result);
    
        if (result.state == 1) {
            if (is_gold != 0) {
                if(result.favorite==0)
                {
                    is_gold.attr('data-status',1);
                }
                else
                {
                    is_gold.attr('data-status',0);
                }
               
                if (result.favorite == 1) {
                    is_gold.css('color', 'gold');
                }
                else {
                    is_gold.css('color', '#000');
                }

            }
        }
        else if (result.state == 0) {
            alert(result.message);
        }
        else {
            alert('error please try again!');
        }
    });
}
