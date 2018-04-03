$( document ).ready(function() {
    $('#btn_parent_name').removeAttr('onclick');
    $('#btn_parent_name').click(function(){
        open_popup($('#parent_type').val(), 600, 400, "", true, false, {"call_back_function":"set_parent_return","form_name":"EditView","field_to_name_array":{"id":"parent_id","name":"parent_name","primary_address_street":"customer_address","billing_address_street": "account_street","tax_code":"tax_code","account_name":"company","category":"customer_category"}}, "single", true);
    });
    // For Customer Name fields
    $('#btn_clr_parent_name').click(function(){
        $('#address').val('');
        $('#taxcode').val('');
        $('#company').val('');  
    });
    // For Contact fields in ticket table
    $('#btn_contacts_c_ticket_2_name').click(function(){
        open_popup('Contacts', 600, 400, "", true, false, {"call_back_function":"set_contact_return","form_name":"EditView","field_to_name_array":{"id":"contacts_c_ticket_2contacts_ida","name":"contacts_c_ticket_2_name","membership_number":"membership_number","pax_name":"pax_name"}}, "single", true);
    });
    $('#btn_clr_contacts_c_ticket_2_name').click(function(){
        $('#contacts_c_ticket_2_name').val('');
        $('#contacts_c_ticket_2contacts_ida').val('');
        $('#membership_number').val('');
        $('#pax_name').val('');
        triggerChangePaxname();
    });
    // Click clear Orginal Ticket button
    $('#btn_clr_change_from_ticket_name').click(function(){
        $('#change_from_ticket_name').val('');
        $('#change_from_ticket_id').val('');
        triggerSaveTopSelected();
    });

    // sqs for field Contact in Ticket Info
    sqs_objects["EditView_contacts_c_ticket_2_name"] = {
        "form":"EditView",
        "method":"query",
        "modules":['Contacts'],
        "group":"or",
        "field_list":["name", "id","membership_number","pax_name"],
        "populate_list":["contacts_c_ticket_2_name", "contacts_c_ticket_2contacts_ida","membership_number","pax_name"],
        "required_list":"contacts_c_ticket_2contacts_ida",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
        "order":"contacts_c_ticket_2_name",
        "limit":"30",
        "no_match_text":"No Match",
        "post_onblur_function": "triggerChangePaxname"
    };

    // sqs for field Change From Ticket
    sqs_objects["EditView_change_from_ticket_name"] = {
        "form":"EditView",
        "method":"query",
        "modules":['C_Ticket'],
        "group":"AND",
        "field_list":["name", "id"],
        "populate_list":["change_from_ticket_name", "change_from_ticket_id"],
        "required_list":"change_from_ticket_id",
        "conditions":[
            {"name":"name","op":"like_custom","end":"%","value":""},
            {"name":"refunded","op":"equal","value":0}
        ],
        "order":"change_from_ticket_name",
        "limit":"30",
        "no_match_text":"No Match",
        "post_onblur_function": "triggerSaveTopSelected"
    };

    // When parent type, empty some fields
    $('#parent_type').change(function(){
        $('#address').val('');
        $('#taxcode').val('');
        $('#company').val(''); 
        display_gs_code();
        displayBookerInput(); 
    });

    $("#payment_status").on("change",display_gs_code);

    $("#status").on("change", function(){
        setDisplayByStatus();
    });

    $('#btn_clr_parent_name').click(function(){
        $('#address,#company,#taxcode').val('');  
    });

    // Init QS for Parent name
    sqs_objects["EditView_parent_name"] = {
        "form":"EditView",
        "method":"query",
        "modules":[parent_type.value],
        "group":"or",
        "field_list":["name", "id", "primary_address_street","billing_address_street","account_name","tax_code","category"],
        "populate_list":["parent_name", "parent_id", "customer_address","account_street","company","taxcode","csutomer_category"],
        "required_list":"parent_id",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
        "order":"name",
        "limit":"30",
        "no_match_text":"No Match",
        "post_onblur_function": "parentChanged"
    };
    // Init QS for User Sale
    sqs_objects["EditView_user_sale"] = {
        "form":"EditView",
        "method":"query",
        "modules":['Users'],
        "group":"or",
        "field_list":["name", "id"],
        "populate_list":["user_sale", "user_sale_id"],
        "required_list":"user_sale_id",
        "conditions":[{"name":"name","op":"like_custom","end":"%","value":""}],
        "order":"name",
        "limit":"30",
        "no_match_text":"No Match",
    };

    // Show popup select orginal Ticket
    $('#btn_change_from_ticket_name').click(function(){
        open_popup('C_Ticket', 600, 400, "", true, false, {"call_back_function":"set_ticket_return","form_name":"EditView","field_to_name_array":{"id":"id","name":"name","refunded":"refunded","c_ticket_c_ticket_1c_ticket_ida":"c_ticket_c_ticket_1c_ticket_ida"}}, "single", true);
    });

    //TICKET PANEL
    //add default ex-rate
    if($('#ex_rate').val() == '' || $('#currency').val() == 'VND' ){
        $('#ex_rate').val('1'); 
    }

    $("#currency").on("change", function(){
        if($('#currency').val() == 'VND' ){
            $('#ex_rate').val('1'); 
            $('#ex_rate').trigger("change");
        }
    });

    //Add class to selected tr in datatable and remove class in unselected tr
    $('#celebs tbody tr').live('click',function(){
        $('#celebs tbody tr').removeClass("selected");
        $(this).closest('tr').addClass("selected");
        loadTicketDetail();
    }); 

    // Select first row when create datatable
    $('#celebs tbody tr').first().trigger("click");

    // Save ticket's fields to json when input change
    $('#ticket_number,#routing,#membership_number,#card_type,#booking_code,#gateway,#class,#fare_basic,#currency,#remark,#dateline_date,#dateline_time,#contacts_c_ticket_2contacts_ida,#contacts_c_ticket_2_name,#change_from_ticket_id,#change_from_ticket_name').live('change',function(){
        saveTicketDetail($('#celebs tr.selected'),'0', 'top');
    });    

    $('#ex_rate').on("change",function(){
        var dt_table = $('#celebs').DataTable();
        var anSelected = fnGetSelected( dt_table );
        if (getNum($('#ex_rate').val()) <= 0) {
            alertify.error("Ex rate must be greater than 0.");    
            var ticket =  jQuery.parseJSON(anSelected.closest('tr').find("td:nth-child(2)").find("[name='ticket[]']").val());
            $('#ex_rate').val(ticket.ex_rate);
        }
        saveTicketDetail($('#celebs tr.selected'),'0', 'top');
        calculateEachRow(anSelected);
        // save new value: receivable, payable, EARN.
        saveTicketDetail($('#celebs tr.selected'),'0', 'both');
        calculateTotal();
    });

    $('#ticket_number').live('change',function(){
        var row = $('#celebs tr.selected');
        var oTable = $("#celebs").dataTable();
        oTable.fnUpdate($(this).val().toUpperCase(), row.index(), 2 );
        saveTicketDetail($('#celebs tr.selected'),'0', 'bot');
    });                       

    $('#pax_name').live('change',function(){
        var row = $('#celebs tr.selected');
        var oTable = $("#celebs").dataTable();
        oTable.fnUpdate($(this).val().toUpperCase(), row.index(), 3 );
        saveTicketDetail($('#celebs tr.selected'),'0', 'bot');
    });

    //add Validate   
    addToValidate('EditView', 'ex_rate', 'name', true, SUGAR.language.get('C_BookingTicket','LBL_EX_RATE'));
    addToValidate('EditView', 'pax_name', 'name', true, SUGAR.language.get('C_BookingTicket','LBL_PAX_NAME'));
    addToValidateComparison('EditView', 'io_code', 'name', true, "Mã loại nhập - xuất"," ");
    setDisplayByStatus();

    //ass mask input
    //    $("#routing").mask('AAA-AAA || AAA-AAA || AAA-AAA || AAA-AAA || AAA-AAA || AAA-AAA');

    // Handle for add Ticket
    var dt_table = $('#celebs').DataTable();

    $("#ticket_add").on("click",addTicket);

    /* Add a click handler for the clone row */
    $('#ticket_copy').on('click',copyTicket);

    /* Add a click handler for the delete row */
    $('#ticket_delete').on('click',deleteTicket);

    //$(document).bind('keypress', function(e) {
    //        var tag = e.target.tagName.toLowerCase();
    //        if(e.which == 49 && tag != 'input' && tag != 'textarea') { 
    //            copyTicket();
    //        }
    //        else if(e.which == 50 && tag != 'input' && tag != 'textarea') { 
    //            addTicket();
    //        }
    //        else if(e.which == 51 && tag != 'input' && tag != 'textarea') { 
    //            deleteTicket();
    //        }
    //    });

    hideSubCategory();

    $('#airline').live('change',function(){
        if ( $('#airline').val() == 'AA') $('#supplier').val('AASGN');
        else if ( $('#airline').val() == 'TK') $('#supplier').val('TKSGN');
            else if ( $('#airline').val() == 'K6A') $('#supplier').val('K6SGN');
                else if ( $('#airline').val() == 'PNK6') $('#supplier').val('PNSTAR');
        $('#supplier').trigger('change');
    });

    $('#category').live('change',hideSubCategory);

    $('#airline').select2({dropdownAutoWidth : true});
    $('#supplier').select2({dropdownAutoWidth : true});
    $('#io_code').select2({dropdownAutoWidth : true});
    $('#gs_code').select2({dropdownAutoWidth : true});

    display_gs_code();
    displayBookerInput();
    calculate();

    // Fix table size
    fixTicketTableSize();
    $(window).resize(function(){
        fixTicketTableSize();
    });

    calculateTotal();

    $("#celebs_filter").hide();

    saveTicketDetail($('#celebs tr.selected'),'0', 'top');
});

function display_gs_code() {
    if ($('#parent_type').val() == "Accounts" || $("#payment_status").val() == "PayLater" || $("#customer_category").val() == "EMPLOYEE") {
        $('#gs_code_label').hide();  
        $('#gs_code_value').hide(); 
        removeFromValidate('EditView', 'gs_code'); 
    }
    else {
        addToValidateComparison('EditView', 'gs_code', 'name', true, "Mã khách lẻ GreenSoft"," ");
        $('#gs_code_label').show();   
        $('#gs_code_value').show();   

    }
}

function triggerChangePaxname(){
    $('#pax_name').trigger('change');
    saveTicketDetail($('#celebs tr.selected'),'0', 'top');
}

function triggerSaveTopSelected(){
    saveTicketDetail($('#celebs tr.selected'),'0', 'top');
}

function hideSubCategory() {
    if ( $('#category').val() == 'VN_to_INT') {
        $('#sub_category').show();
    }
    else if ( $('#category').val() != 'VN_to_INT') {
        $('#sub_category').hide();
        $('#sub_category').val('');
    }
}

function addTicket() {
    var dt_table = $('#celebs').DataTable();
    var anSelected = fnGetSelected(dt_table); 
    if ( anSelected.length !== 0 ) {
        if ($("#pax_name").val() == ""){
            alertify.error("Pax name is missing!");    
        }
        addRowDatatable(dt_table);

    }else{
        addRowDatatable(dt_table); 
    }
    checkDisableButton(dt_table); 
    saveTicketDetail($('#celebs tr.selected'),'0', 'top');   
}

function copyTicket(){
    if ($("#pax_name").val() == ""){
        alertify.error("Pax name is missing!");    
    }
    var dt_table = $('#celebs').DataTable();
    var anSelected = fnGetSelected(dt_table);
    //        keys.fnSetPosition( 2, anSelected.index() );
    //        keys.fnBlur();
    if ( anSelected.length !== 0 ) {

        var data=[];
        $(anSelected).find('td').each(function(){
            data.push($(this).html());
        });
        var row= dt_table.row.add(data)
        .draw();
        $('#celebs tbody tr').last().find('input.ticket_id').val('');
        $('#celebs tbody tr').last().trigger("click");          
        $('#celebs tbody tr').last().find("td:eq(0)").addClass("no-border-right");          
        saveTicketDetail($('#celebs tr.selected'),'0', 'both');  // Add New Ticket Id
    }
    checkDisableButton(dt_table); 
}

function deleteTicket(){
    var dt_table = $('#celebs').DataTable();
    var anSelected = fnGetSelected( dt_table );
    if ( anSelected.length !== 0 ) {
        //Handle delete json
        saveTicketDetail($('#celebs tr.selected'),'1', 'both');

        dt_table.row(anSelected)
        .remove()
        .draw();
        $('#celebs tbody tr').last().trigger("click");
    }
    checkDisableButton(dt_table);
}

/* Get the rows which are currently selected */
function fnGetSelected( oTableLocal ){
    return oTableLocal.$('tr.selected');
}
function checkDisableButton(oTableLocal){
    var selected = oTableLocal.$('tr.selected');

    if(selected.length !== 0)
        $('#ticket_copy, #ticket_delete,#category,#sub_category,#supplier,#airline,#tour,#ticket_number,#routing,#pax_name,#membership_number,#card_type,#booking_code,#gateway,#class,#fare_basic,#ex_rate,#remark,#dateline_date,#dateline_time').prop('disabled',false);
    else
        $('#ticket_copy, #ticket_delete,#category,#sub_category,#supplier,#airline,#tour,#ticket_number,#routing,#pax_name,#membership_number,#card_type,#booking_code,#gateway,#class,#fare_basic,#ex_rate,#remark,#dateline_date,#dateline_time').prop('disabled',true);

}
function addRowDatatable(oTableLocal){
    oTableLocal.row.add([
        '',
        "<input type='hidden' name='ticket[]' class='ticket' value=''/><input type='hidden' name='ticket_id[]' class='ticket_id' value=''/>",
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
    ]).draw()
    .nodes()
    .to$()
    .trigger('click').find("td:eq(0)").addClass("no-border-right");
    hideSubCategory();   
}

function loadTicketDetail(){
    //assign Ticket Detail
    var row = $('#celebs tr.selected');
    var ticket =  jQuery.parseJSON(row.find("input.ticket").val());
    if(ticket != null && ticket != ''){  
        $("#ticket_number").val(ticket.ticket_number);   
        $("#routing").val(ticket.routing);   
        $("#contacts_c_ticket_2contacts_ida").val(ticket.contacts_c_ticket_2contacts_ida);   
        $("#contacts_c_ticket_2_name").val(ticket.contacts_c_ticket_2_name);   
        $("#change_from_ticket_id").val(ticket.change_from_ticket_id);   
        $("#change_from_ticket_name").val(ticket.change_from_ticket_name);   
        $("#pax_name").val(ticket.pax_name);
        $("#membership_number").val(ticket.membership_number);   
        $("#card_type").val(ticket.card_type);   
        $("#booking_code").val(ticket.booking_code);
        if (ticket.dateline != "" && ticket.dateline != " " && ticket.dateline != undefined) {
            var dateline_date = ticket.dateline.substring(0,10);
            var dateline_time = ticket.dateline.substring(11,ticket.dateline.length);
            $("#dateline_date").val(dateline_date);     
            $("#dateline_time").val(dateline_time);     
        }else{
            $("#dateline_date, #dateline_time").val('');
        }
        $("#gateway").val(ticket.gateway);   
        $("#remark").val(ticket.description);   
        $("#class").val(ticket.class);
        $("#fare_basic").val(ticket.fare_basic);     
        $("#currency").val(ticket.currency_id);     
        $("#ex_rate").val(ticket.ex_rate);     
    }else{
        //Incase: Add new ticket
        $("#ticket_number, #routing, #pax_name, #membership_number, #booking_code, #dateline_date, #dateline_time, #dateline, #change_from_ticket_id, #change_from_ticket_name, #contacts_c_ticket_2contacts_ida, #contacts_c_ticket_2_name").val('');  
        $("#currency").val("VND");     
        $("#ex_rate").val("1");     
    }
    //Assign Total Amount    
    calculateTotal();
    hideSubCategory();
}

function set_parent_return(popup_reply_data){
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    for (var the_key in name_to_value_array) {
        if (the_key == 'toJSON') {
            continue;
        } else {
            var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');
            switch (the_key)
            {
                case 'parent_name':
                    $('input[name=parent_name]').val(val);
                    if($('#parent_type').val()=="Accounts") $("#company").val(val);
                    break;
                case 'parent_id':
                    $('input[name=parent_id]').val(val);
                    break;
                case 'customer_address':
                    if($('#parent_type').val()!="Accounts")
                        $('#customer_address').val(val);
                    break;
                case 'tax_code' :
                    if(val!="")
                        $('#taxcode').val(val);
                    break;
                case 'account_street' :
                    if($('#parent_type').val()=="Accounts")
                        $('#customer_address').val(val);
                    break;
                case 'company' :
                    if($('#parent_type').val()=="Contacts")
                        $('#company').val(val);
                case 'customer_category' :
                    $('#customer_category').val(val);
            }
        }
    }
    parentChanged();
    display_gs_code();
    var parent_type = $('#parent_type').val();
    var parent_id   = $('input[name=parent_id]').val();
    if(parent_type == 'Contacts'){
        getTaxCode(parent_type, parent_id);
    }
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
                case 'contacts_c_ticket_2_name':
                    $('#contacts_c_ticket_2_name').val(val);    
                    break;
                case 'contacts_c_ticket_2contacts_ida':
                    $('#contacts_c_ticket_2contacts_ida').val(val);
                    break;
                case 'membership_number':
                    $('#membership_number').val(val);
                    break;
                case 'pax_name' :
                    $('#pax_name').val(val);
                    break;
            }
        }
    }
    triggerChangePaxname();
}

function set_ticket_return(popup_reply_data){
    var form_name = popup_reply_data.form_name;
    var name_to_value_array = popup_reply_data.name_to_value_array;
    for (var the_key in name_to_value_array) {
        if (the_key == 'toJSON') {
            continue;
        } else {
            var val = name_to_value_array[the_key].replace(/&amp;/gi, '&').replace(/&lt;/gi, '<').replace(/&gt;/gi, '>').replace(/&#039;/gi, '\'').replace(/&quot;/gi, '"');
            switch (the_key)
            {
                case 'id':
                    var oldOrginalTicketId = $('#change_from_ticket_id').val();  
                    $('#change_from_ticket_id').val(val);    
                    break;
                case 'name':
                    var oldOrginalTicketName = $('#change_from_ticket_name').val(); 
                    $('#change_from_ticket_name').val(val);
                    break;  
                case 'refunded':
                    var refunded = val;
                    break;    
            }
        }
    }
    // If this ticket is refunded or changed, alert to user
    if (refunded == "1") {
        alert("This ticket is refunded, cannot select!"); 
        $('#change_from_ticket_id').val(oldOrginalTicketId);
        $('#change_from_ticket_name').val(oldOrginalTicketName);   
    }
    triggerSaveTopSelected();
}

function getTaxCode(parent_type, parent_id){
    $.ajax({
        url: "index.php?module=C_BookingTicket&action=ajaxGetTaxCode&sugar_body_only=true",
        type: "POST",
        async: true,
        data:{
            parent_type : parent_type,
            parent_id   : parent_id,
        },
        dataType: "json",
        success: function(res){
            $('#taxcode').val(res.taxcode);           
            //            $('#opportunity_type_span').html(''); 
            //            $('#opportunity_type_span').text(sale_stages); 
        },        
    }); 
}

function parentChanged(){
    if ($('input[name=customer_address]').val() != '') {
        $('#address').val($('input[name=customer_address]').val());  
    }
    else if ($('input[name=account_street]').val() != '') {
        $('#address').val($('input[name=account_street]').val());  
    }

    if ($('#parent_type').val() == 'Accounts')
        $('#company').val($('#parent_name').val());
}

function saveTicketDetail(row, deleted, update){
    var ticket =  jQuery.parseJSON(row.find("input.ticket").val());
    if(ticket == null){
        ticket = {};
    }

    if(update == 'top' || update == 'both'){
        //Panel    
        ticket.routing                          =   $("#routing").val().toUpperCase();   
        ticket.contacts_c_ticket_2_name         =   $("#contacts_c_ticket_2_name").val();   
        ticket.contacts_c_ticket_2contacts_ida  =   $("#contacts_c_ticket_2contacts_ida").val();   
        ticket.membership_number                =   $("#membership_number").val();   
        ticket.card_type                        =   $("#card_type").val();   
        ticket.booking_code                     =   $("#booking_code").val();
        ticket.dateline                         =   $("#dateline_date").val()+' '+$("#dateline_time").val();        
        ticket.gateway                          =   $("#gateway").val();
        ticket.class                            =   $("#class").val();
        ticket.fare_basic                       =   $("#fare_basic").val();
        ticket.description                      =   $("#remark").val();
        ticket.currency_id                      =   $("#currency").val();
        ticket.ex_rate                          =   $("#ex_rate").val();
        ticket.change_from_ticket_name          =   $("#change_from_ticket_name").val();
        ticket.change_from_ticket_id            =   $("#change_from_ticket_id").val();

    }
    if(update == 'bot' || update == 'both'){

        //Table row
        row.find('td').each(function() {
            var ind = $(this).index();

            //get id ticket
            if(ind == 1){
                ticket.id = $(this).find('input.ticket_id').val();   
            }
            if(ind == 2){
                ticket.ticket_number	=   $(this).text();   
            }
            if(ind == 3){
                ticket.pax_name			=   $(this).text();   
            }

            if(ind >= 4){
                var td_class = $(this).attr('class');
                td_class = td_class.replace("focus", "").replace(" ", "");

                ticket[td_class] = getFormatedNoneZero($(this).text());    
            }
        });
    }
    //assign pax_name to row on event Blur
    //Handle delete -  assign json
    ticket.deleted =   deleted;
    var json_str = JSON.stringify(ticket);

    if(deleted == '1' && ticket.id != '')
        $('#ticket_deleted').append("<input type='hidden' name='ticket[]' value='"+json_str+"' />" );
    else
        row.find("input.ticket").val(json_str); 

    //Assign Total Amount    
    calculateTotal();      
}

// Create datatable
$('#ticket_info').closest('td').attr('colspan','4');  
var oTable = $("#celebs").DataTable({
    "paging"    :   false,
    "info"      :   false,
    "sort"      :   false,
    "scrollCollapse": true,
    "columnDefs": [ {
        "searchable": false,
        "orderable": false,
        "targets": 0
    } ],
    "columns": [
        null,
        { className: "json_input" },
        { className: "ticket_number" },
        { className: "pax_name" },
        { className: "public_fare" },
        { className: "market_fare" },
        { className: "commission_percent" },
        { className: "commission" },
        { className: "net_fare" },
        { className: "discount_percent" },
        { className: "discount" },
        { className: "airport_tax" },
        { className: "vat_percent" },
        { className: "vat_amount" },
        { className: "service_charge" },
        { className: "service_charge_vnd" },
        { className: "refund_fee"},
        { className: "receivable"},
        { className: "payable" },
        { className: "earn" },
    ],
    "order": [[ 1, 'asc' ]],
});
oTable.on( 'order.dt search.dt', function () {
    oTable.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
        cell.innerHTML = i+1;
    } );
}).draw(); 

//Key Table + Editable
var keys = new $.fn.dataTable.KeyTable(oTable);

keys.event.focus( null, null, function (nCell,x ,y ) {
    //    var kpos = keys.fnGetCurrentPosition();
    //add class selected to tr
    nCell.parentNode.click();  
    if(x!=0 && x!=1 && x!=7 && x!=8 && x!=10 && x!=12 && x<17){                         
        $(nCell).editable(function (sVal) {
            $(this).editable('destroy');
            return sVal; 
            },{
                placeholder     : "",
                width           : "95%",
                height          : "100%",
                onblur          : "submit",
                "onedit": function(settings, td){
                    if(!$(this).hasClass('pax_name') && !$(this).hasClass('ticket_number')) {
                        var td_text = $(td).text();
                        var regex = new RegExp("\\"+num_grp_sep,"g");
                        var input_text = td_text.replace(regex, '');
                        $(td).text(input_text);              
                    }
                },
                "onsubmit": function(settings, td){
                    var input = $(td).find('input');
                    if($(td).hasClass('pax_name') || $(td).hasClass('ticket_number')){
                        input.val(input.val().toUpperCase());   
                    }else{
                        var val = unformatNumber(input.val(),num_grp_sep,dec_sep);
                        if (isNaN(val)){
                            alertify.error("Must input valid number");
                            input.focus();
                            return false;
                        }
                    }
                },
                "callback": function(value, settings){
                    if($(this).hasClass('pax_name') || $(this).hasClass('ticket_number')){
                        saveTicketDetail($(this).closest('tr'),'0','bot');
                        loadTicketDetail();   
                    }else{
                        //assign value to current td
                        var value = getNum(value);
                        if(value != 0){
                            if($(this).hasClass('vat_percent') || $(this).hasClass('discount_percent') || $(this).hasClass('commission_percent'))
                                $(this).text(formatNumber(value,num_grp_sep,dec_sep,2,2));
                            else 
                                $(this).text(formatNumber(value,num_grp_sep,dec_sep,precision,precision)); 
                        }else
                            $(this).text('');

                        calculateEachRow($(this));
                        //Add to json
                        saveTicketDetail($(this).closest('tr'),'0','bot');    	
                    }
                },
        });
        setTimeout( function () { $(nCell).click(); }, 0 );
    }
}); 
//keys.event.blur( null, null, function (nCell) {
//    $("input:enabled", nCell).trigger('blur');
//});

keys.event.blur( null, null, function (nCell) {
    if(nCell != null){
        $("input:enabled", nCell).trigger('blur');  
    }
});

function calculate(){
    $("td.json_input").each(function(){
        calculateEachRow($(this));
    });
}

function calculateEachRow(thisRow){
    //caculate commission
    var commission_percent = getNum(thisRow.closest('tr').find('td.commission_percent').text());
    var public_fare = getNum(thisRow.closest('tr').find('td.public_fare').text());    
    var commission = commission_percent * public_fare / 100;
    if(commission != 0)
        thisRow.closest('tr').find('td.commission').text(formatNumber(commission,num_grp_sep,dec_sep,precision,precision));
    else
        thisRow.closest('tr').find('td.commission').text('');
    //caculate discount
    var discount_percent = getNum(thisRow.closest('tr').find('td.discount_percent').text());
    var market_fare = getNum(thisRow.closest('tr').find('td.market_fare').text());        
    var discount = discount_percent * market_fare / 100;
    if(discount != 0)
        thisRow.closest('tr').find('td.discount').text(formatNumber(discount,num_grp_sep,dec_sep,precision,precision));
    else
        thisRow.closest('tr').find('td.discount').text('');

    //caculate net_fare
    var commission = getNum(thisRow.closest('tr').find('td.commission').text());    
    var public_fare = getNum(thisRow.closest('tr').find('td.public_fare').text());    
    var net_fare = public_fare - commission;
    if(net_fare != 0)
        thisRow.closest('tr').find('td.net_fare').text(formatNumber(net_fare,num_grp_sep,dec_sep,precision,precision));
    else
        thisRow.closest('tr').find('td.net_fare').text('');

    //caculate vat_percent & vat_amount
    var market_fare = getNum(thisRow.closest('tr').find('td.market_fare').text());    
    var airport_tax = getNum(thisRow.closest('tr').find('td.airport_tax').text());
    var vat_percent = getNum(thisRow.closest('tr').find('td.vat_percent').text());
    //var vat_amount = (market_fare - airport_tax) * vat_percent /100; 
    var vat_amount = getNum(thisRow.closest('tr').find('td.vat_amount').text());

    //caculate RECEIVABLE, PAYABLE & EARN
    var vat_temp = $('#category').val() == 'DOM'? vat_amount : 0;
    var discount = getNum(thisRow.closest('tr').find('td.discount').text());
    var service_charge = getNum(thisRow.closest('tr').find('td.service_charge').text());

    var ticket =  jQuery.parseJSON(thisRow.closest('tr').find("td:nth-child(2)").find("[name='ticket[]']").val());
    if (ticket == null) var service_charge_vnd = 0;
    else var service_charge_vnd = getNum(thisRow.closest('tr').find('td.service_charge_vnd').text()) / getNum(ticket.ex_rate);

    var refund_fee = getNum(thisRow.closest('tr').find('td.refund_fee').text());

    var receivable = 0;
    var payable = 0; 

    if ($("#status").val() != "Refunded") {
        receivable = market_fare - discount + airport_tax  + service_charge + service_charge_vnd + vat_temp - refund_fee;
        payable = net_fare + airport_tax + vat_temp - refund_fee;
    }
    else {
        receivable = net_fare + airport_tax + vat_temp - refund_fee;
        payable = market_fare - discount + airport_tax  - service_charge - service_charge_vnd + vat_temp - refund_fee;
    }

    var earn = receivable - payable;

    //display RECEIVABLE
    if(receivable != 0)
        thisRow.closest('tr').find('td.receivable').text(formatNumber(receivable,num_grp_sep,dec_sep,precision,precision));
    else
        thisRow.closest('tr').find('td.receivable').text('');

    //display PAYABLE
    if(payable != 0)
        thisRow.closest('tr').find('td.payable').text(formatNumber(payable,num_grp_sep,dec_sep,precision,precision));
    else
        thisRow.closest('tr').find('td.payable').text('');

    //display EARN
    if(earn != 0)
        thisRow.closest('tr').find('td.earn').text(formatNumber(earn,num_grp_sep,dec_sep,precision,precision));
    else
        thisRow.closest('tr').find('td.earn').text(''); 

}

function calculateTotal(){
    //Assign Total Amount
    $('#total_amount').val(sumColumn(18));     
    $('#total_purchase').val(sumColumn(19));
    $('#total_profit').val(sumColumn(20));
}

function sumColumn(col){
    var sum = 0;
    $('#celebs tbody td:nth-child('+col+')').each(function(){
        var ticket =  jQuery.parseJSON($(this).parent().find("td:nth-child(2)").find("[name='ticket[]']").val());
        if (ticket != null) {
            sum += getNum($(this).text()) * getNum(ticket.ex_rate);    
        }
    })

    var formated = formatNumber(sum,num_grp_sep,dec_sep,precision,precision);
    if (formated == 'NaN')
        formated = 0;
    return formated;

}

function getNum(val){
    var num = unformatNumber(val,num_grp_sep,dec_sep);
    if (isNaN(num) || num == '') 
        return 0;
    else
        return num;
}

function getFormatedNoneZero(val){
    var num = unformatNumber(val,num_grp_sep,dec_sep);
    if (isNaN(num) || num == '') 
        return '';
    else
        return formatNumber(num,num_grp_sep, dec_sep, precision, precision);
}

function displayBookerInput() {
    if ($("#parent_type").val() == "Accounts") $("#contacts_c_bookingticket_2_name").parent().parent().show();
    else $("#contacts_c_bookingticket_2_name").parent().parent().hide();
}

function setDisplayByStatus(){
    if ($("#status").val() == "Refunded" || $("#status").val() == "EMD-Refund") {
        addToValidate('EditView', 'full_payment_date', 'name', true, SUGAR.language.get('C_BookingTicket','LBL_FULL_PAYMENT_DATE'));    
        addToValidate('EditView', 'refund_date', 'name', true, SUGAR.language.get('C_BookingTicket','LBL_REFUND_DATE'));    
        $("#lbl_refund_date").show();
        $("#refund_date").parent().show();
    }
    else if ($("#status").val() == "WaitingList" || $("#status").val() == "Comfirmed" || $("#status").val() == "Cancelled") {
        removeFromValidate('EditView', 'full_payment_date'); 
        removeFromValidate('EditView', 'refund_date'); 
        $("#lbl_refund_date").hide();
        $("#refund_date").parent().hide();
    }                               
    else {
        addToValidate('EditView', 'full_payment_date', 'name', true, SUGAR.language.get('C_BookingTicket','LBL_FULL_PAYMENT_DATE'));    
        removeFromValidate('EditView', 'refund_date'); 
        $("#lbl_refund_date").hide();
        $("#refund_date").parent().hide();
    }
}

//Overwirte Funtion Save Fix Bug KeyTable
SUGAR.ajaxUI.submitForm = function(formname, params) {
    var con = YAHOO.util.Connect,
    SA = SUGAR.ajaxUI;
    if (SA.lastCall && con.isCallInProgress(SA.lastCall)) {
        con.abort(SA.lastCall);
    }
    SA.cleanGlobals();
    var form = YAHOO.util.Dom.get(formname) || document.forms[formname];
    if (SA.canAjaxLoadModule(form.module.value) && typeof(YAHOO.util.Selector.query("input[type=file]", form)[0]) == "undefined" && /action=ajaxui/.exec(window.location.href)) {
        var string = con.setForm(form);
        var baseUrl = "index.php?action=ajaxui#ajaxUILoc=";
        SA.lastURL = "";
        if (string.length > 200) {
            SUGAR.ajaxUI.showLoadingPanel();
            form.onsubmit = function() {          
                return true;
            };
            //Trigger Blur key input for save Ticket
            keys.fnBlur();
            setTimeout(function(){ form.submit(); }, 500);
            form.submit();
        } else {
            con.resetFormState();
            window.location = baseUrl + encodeURIComponent("index.php?" + string);
        }
        return true;
    } else {
        if (typeof(YAHOO.util.Selector.query("input[type=submit]", form)[0]) != "undefined" && YAHOO.util.Selector.query("input[type=submit]", form)[0].value == "Save") {
            ajaxStatus.showStatus(SUGAR.language.get('app_strings', 'LBL_SAVING'));
        }
        //Trigger Blur key input for save Ticket
        keys.fnBlur();
        setTimeout(function(){ form.submit(); }, 500);
        return false;      
    }
}

function fixTicketTableSize(){
    var ticketTableWidth = $("#Default_C_BookingTicket_Subpanel").width() - 150;
    $("#tickets").find("table").css("width",ticketTableWidth);
    $("#tickets").find("table").css("display","block");
    $("#tickets").find("table").css("overflow","auto");
}