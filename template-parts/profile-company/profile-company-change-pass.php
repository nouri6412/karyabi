<div class="job-bx job-profile">
    <div class="job-bx-title clearfix">
        <h5 class="font-weight-700 pull-left text-uppercase">تغییر رمز عبور</h5>
        <a href="#" class="site-button right-arrow button-sm float-right">بازگشت</a>
    </div>

        <div class="row">
            <div class="col-lg-6">
                <div class="form-group">
                    <label>رمز جدید </label>
                    <input id="new_pass" type="password" class="form-control">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label>تکرار رمز جدید</label>
                    <input id="re_pass" type="password" class="form-control">
                </div>
            </div>
            <div class="col-lg-12 m-b10">
                <div class="box-loading">
                    <div class="loading-ajax"></div>
                </div>
                <button onclick="ajax_submit_mbm_change_pass(
            {
                'action': 'mbm_profile_company_profile_change_pass',
                'new_pass':$('#new_pass').val(),
                're_pass':$('#re_pass').val()
            }
            ,$('#dzFormMsg-error')
            ,$('#dzFormMsg-doned')
        )" class="site-button">ذخیره تغییرات</button>
            </div>
            <div id="dzFormMsg-error" class="dzFormMsg error"></div>
            <div id="dzFormMsg-doned" class="dzFormMsg doned"></div>
        </div>

</div>