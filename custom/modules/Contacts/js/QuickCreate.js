$( document ).ready(function() {
    displayFitCategory();
    $("select#category").on("change",function(){
        displayFitCategory();   
    })

    $('#btn_account_name').removeAttr('onclick');
    $('#btn_account_name').click(function(){
        open_popup('Accounts', 600, 400, "", true, false, {"call_back_function":"set_account_return","form_name":"EditView","field_to_name_array":{"id":"account_id","name":"account_name","category":"account_category"}}, "single", true);
    });

    // sqs for field Account in Contact
    sqs_objects = [];
    sqs_objects["account_name"] = {
        "form":"form_SubpanelQuickCreate_Contacts",
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
    };
    enableQS(true);
});

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
}