$( document ).ready(function() {
    $('#room_list').closest('table').parent().attr('colspan','4');

    $('#btn_c_hotel_c_bookinghotel_1_name').removeAttr('onclick');
    $('#btn_c_hotel_c_bookinghotel_1_name').click(function(){

        open_popup("C_Hotel", 600, 400, "", true, false, {"call_back_function":"set_hotel_return","form_name":"EditView","field_to_name_array":{"id":"c_hotel_c_bookinghotel_1c_hotel_ida","name":"c_hotel_c_bookinghotel_1_name","hotel_details":"hotel_details","hotel_policy":"hotel_policy","code":"hotel_code"}}, "single", true);
    });

    sqs_objects["EditView_c_hotel_c_bookinghotel_1_name"] = {
        "form":"EditView",
        "method":"query",
        "modules":["C_Hotel"],
        "group":"or",
        "field_list":["name", "id", "hotel_details","hotel_policy","code"],
        "populate_list":["c_hotel_c_bookinghotel_1_name", "c_hotel_c_bookinghotel_1c_hotel_ida", "details","policy","hotel_code"],
        "required_list":"c_hotel_c_bookinghotel_1c_hotel_ida",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
        "order":"c_hotel_c_bookinghotel_1_name",
        "limit":"30",
        "no_match_text":"No Match",
        "post_onblur_function": "hotelChanged"
    };

    $('#btn_clr_c_hotel_c_bookinghotel_1_name').click(function(){
        CKEDITOR.instances.hotel_details.setData('');
        CKEDITOR.instances.hotel_policy.setData('');
        $("#hotel_code").val("");
        $("#hotel_code").trigger("change");
    });
    //
    $('#btn_parent_name').removeAttr('onclick');
    $('#btn_parent_name').click(function(){
        open_popup($('#parent_type').val(), 600, 400, "", true, false, {"call_back_function":"set_parent_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name","primary_address_street":"contact_address","billing_address_street":"account_address","email1":"email","phone_mobile":"contact_phone","phone_office":"account_phone","tax_code":"tax_code"}}, "single", true);
    });
    // For Customer Name fields
    $('#btn_clr_parent_name').click(function(){
        delete_Customer_info()
    });

    $('#parent_type').change(function(){
        delete_Customer_info() 
    });

    set_customer_info();

    $('#email,#phone,#address').change(function(){
        set_customer_info();

    });

    check_RoomType_Category();

    $('#room1_room_type,#room2_room_type,#room3_room_type,#room4_room_type,#room1_category,#room2_category,#room3_category,#room4_category').live('change',function(){
        check_RoomType_Category($(this));
    });

    // Init QS for Parent
    sqs_objects["EditView_parent_name"] = {
        "form":"EditView",
        "method":"query",
        "modules":[parent_type.value],
        "group":"or",
        "field_list":["name", "id", "primary_address_street","billing_address_street","email1","phone_mobile","phone_office","tax_code"],
        "populate_list":["parent_name", "parent_id", "address","account_address","email","phone","account_phone","taxcode"],
        "required_list":"parent_id",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
        "order":"name",
        "limit":"30",
        "no_match_text":"No Match",
        "post_onblur_function": "parentChanged"
    };
    //
    setRoomRow();

    $('#hotel_code').live("change",function(){
        $('#hotel_code_lbl').text($('#hotel_code').val()); 
    }) ;
    
    $('#hotel_code').trigger('change');
})

function hotelChanged() {
    CKEDITOR.instances.hotel_details.setData($('#details').val());
    CKEDITOR.instances.hotel_policy.setData($('#policy').val());
    $('#hotel_code').trigger('change');
}

function set_customer_info() {
    $('#lbl_email').text($('#email').val());
    $('#lbl_phone').text($('#phone').val());
    $('#lbl_address').text($('#address').val());
}

function delete_Customer_info() {
    $('#lbl_email').text("");  
    $('#lbl_phone').text("");  
    $('#lbl_address').text("");  
}
function check_RoomType_Category(option) {
    // Check room type

    if($('#room1_room_type').val() == "Other") {
        if (option.attr("id") == 'room1_room_type') $('#room1_other_type').val("");    
        $('#room1_other_type').show();    
    }
    else {
        $('#room1_other_type').val($('#room1_room_type').val());    
        $('#room1_other_type').hide();
    }
    if($('#room2_room_type').val() == "Other") {
        if (option.attr("id") == 'room2_room_type') $('#room2_other_type').val("");    
        $('#room2_other_type').show();    
    }
    else {
        $('#room2_other_type').val($('#room2_room_type').val());    
        $('#room2_other_type').hide();    
    }
    if($('#room3_room_type').val() == "Other") {
        if (option.attr("id") == 'room3_room_type') $('#room3_other_type').val("");    
        $('#room3_other_type').show();    
    }
    else {
        $('#room3_other_type').val($('#room3_room_type').val());    
        $('#room3_other_type').hide();    
    }
    if($('#room4_room_type').val() == "Other") {
        if (option.attr("id") == 'room4_room_type') $('#room4_other_type').val("");    
        $('#room4_other_type').show();    
    }
    else {
        $('#room4_other_type').val($('#room4_room_type').val());    
        $('#room4_other_type').hide();    
    }
    // Check category
    if($('#room1_category').val() == "Other") {
        if (option.attr("id") == 'room1_category') $('#room1_other_category').val("");    
        $('#room1_other_category').show();    
    }
    else {
        $('#room1_other_category').val($('#room1_category').val());    
        $('#room1_other_category').hide();
    }
    if($('#room2_category').val() == "Other") {
        if (option.attr("id") == 'room2_category') $('#room2_other_category').val("");    
        $('#room2_other_category').show();    
    }
    else {
        $('#room2_other_category').val($('#room2_category').val());    
        $('#room2_other_category').hide();
    }
    if($('#room3_category').val() == "Other") {
        if (option.attr("id") == 'room3_category') $('#room3_other_category').val("");    
        $('#room3_other_category').show();    
    }
    else {
        $('#room3_other_category').val($('#room3_category').val());    
        $('#room3_other_category').hide();
    }
    if($('#room4_category').val() == "Other") {
        if (option.attr("id") == 'room4_category') $('#room4_other_category').val("");    
        $('#room4_other_category').show();    
    }
    else {
        $('#room4_other_category').val($('#room4_category').val());    
        $('#room4_other_category').hide();
    }

}
function parentChanged(){   
    if ($('#parent_type').val() == 'Accounts')  {
        $('#phone').val($('input[name=account_phone]').val());  
        $('#address').val($('input[name=account_address]').val());      
    }
    set_customer_info();
}
function set_hotel_return(popup_reply_data){
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    for (var the_key in name_to_value_array) {
        if (the_key == 'toJSON') {
            continue;
        } else {
            var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');
            switch (the_key)
            {
                case 'c_hotel_c_bookinghotel_1c_hotel_ida':
                    $('input[name=c_hotel_c_bookinghotel_1c_hotel_ida]').val(val);
                    break;
                case 'c_hotel_c_bookinghotel_1_name':
                    $('input[name=c_hotel_c_bookinghotel_1_name]').val(val);
                    break;
                case 'hotel_details':
                    CKEDITOR.instances.hotel_details.setData(val);
                    break;
                case 'hotel_policy':
                    CKEDITOR.instances.hotel_policy.setData(val);
                    break;
                case 'hotel_code':
                    $("#hotel_code").val(val);
                    $("#hotel_code").trigger("change");
                    break;
            }
        }
    }   
}

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
                case 'tax_code':
                    if(val!='')
                        $('#taxcode').val(val);
                    break;
            }
        }
    }
    parentChanged();
}
function setRoomRow (){   
    // Trường hợp tạo mới booking hotel mặc định là 1 room, ẩn các room còn lại
    $("#tr_room2,#tr_room3,#tr_room4").hide();
    // Trường hợp Edit booking hotel có số lượng room >1 thì hiển thị số lượng phòng đã đặt trước đó đồng thời set thuộc tính  deleted =0
    for(var i=1;i<=parseInt($("#room").val());i++)
    {
        var tr_id="#tr_room";
        var room_deleted="#room";
        tr_id += i;
        room_deleted += i+"_deleted";
        $(tr_id).show();
        $(room_deleted).val("0");
    }
    var room_num;
    var tr_id="tr_room";
    $("#room").change(function(){
        //Khi sự kiện change của #room xảy ra tiến hành ẩn toàn bộ room và set lại thuộc tính deleted =1 sau đó thiết lập lại
        $("#tr_room1,#tr_room2,#tr_room3,#tr_room4").hide();
        $("#room2_deleted,#room3_deleted,#room4_deleted").val("1");
        room_num=$(this).val();
        for(var i=1;i<=parseInt(room_num);i++)
        {
            var tr_id="#tr_room";
            var room_deleted="#room";
            tr_id += i;
            room_deleted += i+"_deleted";
            $(tr_id).show();
            $(room_deleted).val("0");
        }
    });

}


