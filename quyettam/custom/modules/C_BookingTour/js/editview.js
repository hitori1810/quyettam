$( document ).ready(function() {
    $('#price_adult').closest('table').parent().attr('colspan','4');

    $('#adult').closest('table').parent().attr('colspan','4');

    $('#btn_parent_name').removeAttr('onclick');
    $('#btn_parent_name').click(function(){
        open_popup($('#parent_type').val(), 600, 400, "", true, false, {"call_back_function":"set_parent_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name","primary_address_street":"contact_address","billing_address_street":"account_address","email1":"email","phone_mobile":"contact_phone","phone_office":"account_phone"}}, "single", true);
    });
    // For Customer Name fields
    $('#btn_clr_parent_name').click(function(){
        delete_Customer_info();
    });

    $('#parent_type').change(function(){
        delete_Customer_info(); 
    });

    set_customer_info();

    $('#email,#phone,#address').change(function(){
        set_customer_info();
    });

    $('#btn_c_tour_c_bookingtour_1_name').removeAttr('onclick');
    $('#btn_c_tour_c_bookingtour_1_name').click(function(){
        open_popup("C_Tour", 600, 400, "", true, false, {"call_back_function":"set_tour_return","form_name":"EditView","field_to_name_array":{"id":"c_tour_c_bookingtour_1c_tour_ida","name":"c_tour_c_bookingtour_1_name","tour_details":"tour_details","tour_policy":"tour_policy","price_adult":"price_adult","price_chd":"price_chd","price_infant":"price_infant","start_date":"start_date","end_date":"end_date","code":"tour_code"}}, "single", true);
    });

    sqs_objects["EditView_c_tour_c_bookingtour_1_name"] = {
        "form":"EditView",
        "method":"query",
        "modules":["C_Tour"],
        "group":"or",
        "field_list":["name", "id", "tour_details","tour_policy","price_adult","price_chd","price_infant","start_date","end_date","code"],
        "populate_list":["c_tour_c_bookingtour_1_name", "c_tour_c_bookingtour_1c_tour_ida", "details","policy","price_adult","price_chd","price_infant","start_date","end_date","tour_code"],
        "required_list":"c_tour_c_bookingtour_1c_tour_ida",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
        "order":"c_tour_c_bookingtour_1_name",
        "limit":"30",
        "no_match_text":"No Match",
        "post_onblur_function": "tourChanged"
    };

    $('#btn_clr_c_tour_c_bookingtour_1_name').click(function(){
        CKEDITOR.instances.tour_details.setData('');
        CKEDITOR.instances.tour_policy.setData('');
        $('input[name=price_adult]').val('');
        $('input[name=price_chd]').val('');
        $('input[name=price_infant]').val('');
        $('#tour_code').val('');
        $('#start_date').val('');
        $('#end_date').val('');
        caculator_total() ; 
        $('#tour_code').trigger('change');
    });

    // Init QS for Parent
    sqs_objects["EditView_parent_name"] = {
        "form":"EditView",
        "method":"query",
        "modules":[parent_type.value],
        "group":"or",
        "field_list":["name", "id", "primary_address_street","billing_address_street","email1","phone_mobile","phone_office"],
        "populate_list":["parent_name", "parent_id", "address","account_address","email","phone","account_phone",],
        "required_list":"parent_id",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
        "order":"name",
        "limit":"30",
        "no_match_text":"No Match",
        "post_onblur_function": "parentChanged"
    };

    caculator_total() ;

    $('#discount_percent,#price_adult,#price_chd,#price_infant,#adult,#children,#infant,#penalty_percent').live('change keyup paste',function(){             
        caculator_total() ;    
    });
    
    $('#tour_code').live("change",function(){
        $('#tour_code_lbl').text($('#tour_code').val()); 
    }) ;
    
    $('#tour_code').trigger('change');
    
    checkPenalty();
    
    $("#status").live("change",function(){
        checkPenalty();
    });
});

function checkPenalty(){
    if ($("#status").val() == "Cancel") {
            $("#penalty_percent").parent().parent().show()
        }
        else {
            $("#penalty_percent").parent().parent().hide()
        }
}

function tourChanged() {
    CKEDITOR.instances.tour_details.setData($('#details').val());
    CKEDITOR.instances.tour_policy.setData($('#policy').val());
    $('#tour_code').trigger('change');
}

function set_customer_info() {
    $('#lbl_email').text($('#email').val());
    $('#lbl_phone').text($('#phone').val());
    $('#lbl_address').text($('#address').val());
}

function caculator_total() {
    var price_adult =  getNum($('#price_adult').val());
    var price_chd =  getNum($('#price_chd').val());
    var price_infant =  getNum($('#price_infant').val());
    var adult =  getNum($('#adult').val());
    var children =  getNum($('#children').val());
    var infant =  getNum($('#infant').val());    
    var sub_total = price_adult *  adult +  price_chd * children + price_infant * infant;

    if (sub_total == "0") $('#sub_total').val("0");
    else $('#sub_total').val(formatNumber(sub_total,num_grp_sep,dec_sep,precision,precision));

    var discount_percent = getNum($('#discount_percent').val());
    var discount =  sub_total * discount_percent / 100;

    if (discount == "0") $('#discount_amount').val("0");
    else $('#discount_amount').val(formatNumber(discount,num_grp_sep,dec_sep,precision,precision));


    var penalty_percent =  getNum($('#penalty_percent').val());
    var penalty = penalty_percent *  sub_total / 100 ;

    if (penalty == "0") $('#penalty_amount').val("0");
    else $('#penalty_amount').val(formatNumber(penalty,num_grp_sep,dec_sep,precision,precision));

    var total =  sub_total - discount + penalty;
    if (total == "0") $('#total_amount').val("0");
    else $('#total_amount').val(formatNumber(total,num_grp_sep,dec_sep,precision,precision));

}

function delete_Customer_info() {
    $('#lbl_email').text("");  
    $('#lbl_phone').text("");  
    $('#lbl_address').text("");  
}

function parentChanged(){
    if ($('#parent_type').val() == 'Accounts')  {
        $('#phone').val($('input[name=account_phone]').val());  
        $('#address').val($('input[name=account_address]').val());      
    }
    set_customer_info();
}

// Overwirite set_return Parent Type
function set_parent_return(popup_reply_data){
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    for (var the_key in name_to_value_array) {
        if (the_key == 'toJSON') {
            continue;
        } else {
            var parent_type=$("#parent_type").val();
            var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');
            switch (the_key)
            {
                case 'parent_name':
                    $('input[name=parent_name]').val(val);
                    break;
                case 'parent_id':
                    $('input[name=parent_id]').val(val);
                    break;
                case 'contact_address':
                    $('#address').val(val);
                    break;
                case 'account_address':
                    $('#account_address').val(val);
                    break;
                case 'email':
                    $('input[name=email]').val(val);
                    break;
                case 'contact_phone':
                    $('#phone').val(val);
                    break;
                case'account_phone':
                    $('#account_phone').val(val);
                    break;

            }
        }
    }

    parentChanged();
}
function set_tour_return(popup_reply_data){
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    for (var the_key in name_to_value_array) {
        if (the_key == 'toJSON') {
            continue;
        } else {
            var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');
            switch (the_key)
            {
                case 'c_tour_c_bookingtour_1c_tour_ida':
                    $('input[name=c_tour_c_bookingtour_1c_tour_ida]').val(val);
                    break;
                case 'c_tour_c_bookingtour_1_name':
                    $('input[name=c_tour_c_bookingtour_1_name]').val(val);
                    break;
                case 'tour_details':
                    CKEDITOR.instances.tour_details.setData(val);
                    break;
                case 'tour_policy':
                    CKEDITOR.instances.tour_policy.setData(val);
                    break;
                case 'price_adult':
                    $('input[name=price_adult]').val(formatNumber(val,num_grp_sep,dec_sep,precision,precision));
                    break;
                case 'price_chd':
                    $('input[name=price_chd]').val(formatNumber(val,num_grp_sep,dec_sep,precision,precision));
                    break;
                case 'price_infant':
                    $('input[name=price_infant]').val(formatNumber(val,num_grp_sep,dec_sep,precision,precision));
                    break;
                case 'start_date':
                    $('#start_date').val(val);
                    break;
                case 'end_date':
                    $('#end_date').val(val);
                    break;
                case 'tour_code':
                    $('#tour_code').val(val);
                    $('#tour_code').trigger('change');
                    break;

            }
        }
    }
    caculator_total();  
}

function getNum(val){
    var num = unformatNumber(val,num_grp_sep,dec_sep);
    if (isNaN(num) || num == '') 
        return 0;
    else
        return num;
}
