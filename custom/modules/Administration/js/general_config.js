function saveConfig() {
    ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_AJAX_PLEASE_WAIT'));
    $.ajax({
        'url': 'index.php?module=Administration&action=handleAjax&sugar_body_only=true',
        'type': 'POST',
        'async': true,
        'data': {
            type: 'ajaxSaveGeneralConfig',
            default_mapping_lead: $("#default_mapping_lead").val(),
            default_mapping_parent: $("#default_mapping_parent").val(),
            default_mapping_prospect: $("#default_mapping_prospect").val(),
            send_mail_days_before_test: $("#send_mail_days_before_test").val()
        },
        dataType: "json",
        'success': function (data) {
            if (data.success) {
                alertify.success(SUGAR.language.get('app_strings', 'LBL_AJAX_SAVE_SUCCESS'));

            }
            else {
                alertify.error(SUGAR.language.get('app_strings', 'LBL_AJAX_ERROR'));
            }
            ajaxStatus.hideStatus();
        },
        'error': function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
            alertify.error(SUGAR.language.get('app_strings', 'LBL_AJAX_ERROR'));
            ajaxStatus.hideStatus();
        }
    });
}

SUGAR.util.doWhen(function(){
    return $('.number').length;
    }, function(){
        $('.number').numeric({type: "int", negative: false});
})