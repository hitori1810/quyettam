$( document ).ready(function() {
    $('.starrr:eq(0)').on('starrr:change', function(e, value){
        if (value) {
            $('#star').val(value);
        } else {
            $('#star').val('0');
        }
    });


    var star = parseInt($('input#star').val());
    for(var i= 0; i < star; i++ ){
        $('.starrr').find('i:nth('+i+')').removeClass(Starrr.prototype.defaults.emptyStarClass).addClass(Starrr.prototype.defaults.fullStarClass);   
    }

    $('#btn_contacts_c_hotel_1_name').removeAttr('onclick');
    $('#btn_contacts_c_hotel_1_name').click(function(){
        open_popup('Contacts', 600, 400, "", true, false, {"call_back_function":"set_contact_return","form_name":"EditView","field_to_name_array":{"id":"contacts_c_hotel_1contacts_ida","name":"contacts_c_hotel_1_name","phone_mobile":"contact_mobile","email1":"contact_email"}}, "single", true);
    });

    $('#btn_clr_contacts_c_hotel_1_name').click(function(){
        $('#lbl_contact_mobile').text('');
        $('#lbl_contact_email').text(''); 
        $('#contact_mobile').val(''); 
        $('#contact_email').val(''); 
    });

    sqs_objects["EditView_contacts_c_hotel_1_name"] = {
        "form":"EditView",
        "method":"query",
        "modules":['Contacts'],
        "group":"or",
        "field_list":["name", "id","phone_mobile","email1"],
        "populate_list":["contacts_c_hotel_1_name", "contacts_c_hotel_1contacts_ida","contact_mobile","contact_email"],
        "required_list":"contacts_c_hotel_1_id",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
        "order":"contacts_c_hotel_1_name",
        "limit":"30",
        "no_match_text":"No Match",
        "post_onblur_function": "setContactInfo"
    };
    
    setContactInfo();
})

function setContactInfo(){
    $('#lbl_contact_mobile').text($('#contact_mobile').val());
    $('#lbl_contact_email').text($('#contact_email').val()); 
}

function set_contact_return(popup_reply_data){
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    for (var the_key in name_to_value_array) {
        if (the_key == 'toJSON') {
            continue;
        } else {
            var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');
            switch (the_key)
            {
                case 'contacts_c_hotel_1_name':
                    $('#contacts_c_hotel_1_name').val(val);    
                    break;
                case 'contacts_c_hotel_1contacts_ida':
                    $('#contacts_c_hotel_1contacts_ida').val(val);
                    break;
                case 'contact_mobile':
                    $('#contact_mobile').val(val);
                    $('#lbl_contact_mobile').text(val);
                    break;
                case 'contact_email' :
                    $('#contact_email').val(val);
                    $('#lbl_contact_email').text(val); 
                    break;
            }
        }
    }
}