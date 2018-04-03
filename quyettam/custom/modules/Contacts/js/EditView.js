var customerClassIdList = {
    "Silver" : '26',
    "Gold" : '24',
    "Platinum" : '23',
};
function _saveOnClick() {         
    var _form = document.getElementById('EditView'); 
    _form.action.value='Save';             
    if(check_form('EditView')) {
        //var url = "http://preprod-booking.gotadi.com/booking/AuthenticateUser.axd";
        var url = "https://booking.gotadi.com/booking/AuthenticateUser.axd";
        var sso = new TCSSO(url);
        sso.updateDetails({
            customerid: $('input[name=ibe_id]').val(),
            customerclassid: customerClassIdList[$('select[name=fit_category]').val()],           
            },function(err, res) {
                var _error = true;
                if(typeof res == 'object' && res != null) {
                    if(typeof res.UserInfo == 'object') {
                        if(res.UserInfo.Status == "Sucess") {
                            _error = false;
                            SUGAR.ajaxUI.submitForm(_form); 
                            return
                        }
                    }

                } 
                if(_error) {
                    if(confirm("There was error(s) when updating customer's category form CRM to IBE. Do you want to continue saving?")) {
                        SUGAR.ajaxUI.submitForm(_form);
                        return false;
                    } else {
                        return false;
                    }
                }
            }
        ); 
    }  
    return false;   
}

$( document ).ready(function() {
    //    $('#gs_code').select2({dropdownAutoWidth : true});
    $('#airline').select2({dropdownAutoWidth : true});
    //    addToValidateComparison('EditView', 'gs_code', 'name', true, "Mã khách lẻ GreenSoft"," ");
    removeFromValidate('EditView','last_name');

    $('#btn_account_name').removeAttr('onclick');
    $('#btn_account_name').click(function(){
        open_popup('Accounts', 600, 400, "", true, false, {"call_back_function":"set_account_return","form_name":"EditView","field_to_name_array":{"id":"account_id","name":"account_name","category":"account_category"}}, "single", true);
    });

    // sqs for field Account in Contact
    sqs_objects["account_name"] = {
        "form":"EditView",
        "method":"query",
        "modules":['Accounts'],
        "group":"or",
        "field_list":["name", "id","category"],
        "populate_list":["account_name", "account_id","account_category"],
        "required_list":"account_id",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
        "order":"account_name",
        "limit":"30",
        "no_match_text":"No Match",
        "post_onblur_function": "setContactCategory"
    };

    displayFitCategory();
    displayGsCode();
    $("#category").on("change",function(){
        displayFitCategory();   
        displayGsCode();
    });
    if($('input[name="record"]').val() != '')
        $('.action_buttons #SAVE_FOOTER, .action_buttons #SAVE_HEADER').attr('onclick', "_saveOnClick(); return false;");
});

function setContactCategory(){
    if ($("input[name='record']").val() == "" || $("input[name='isDuplicate']").val() == "true") {
        if ($('#account_cetegory').val() == "TA" || $('#account_cetegory').val()  == "TO") {
            $('#category').val("BOOKER");
        }
    }
}

function set_account_return(popup_reply_data){
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    for (var the_key in name_to_value_array) {
        if (the_key == 'toJSON') {
            continue;
        } else {
            var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');
            switch (the_key)
            {
                case 'account_name':
                    $('#account_name').val(val);    
                    break;
                case 'account_id':
                    $('#account_id').val(val);
                    break;
                case 'account_category':
                    $('#account_cetegory').val(val);
                    break;
            }
        }
    }
    setContactCategory();
}

function displayFitCategory(){
    if ($("select#category").val() == "FIT") {
        $("select#fit_category").show();
        $("label[for='fit_category']").show();
    }
    else {
        $("select#fit_category").hide();
        $("label[for='fit_category']").hide();
    } 
}

function displayGsCode(){
    if ($("#category").val() == "EMPLOYEE") {
        $("#gs_code").show();
        $("#lbl_gs_code").show();
    }
    else {
        $("#gs_code").hide();
        $("#lbl_gs_code").hide();
    } 
}