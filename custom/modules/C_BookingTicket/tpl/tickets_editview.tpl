<link rel='stylesheet' href='{sugar_getjspath file="custom/include/javascripts/DataTables/css/jquery.dataTables.css"}'/>
<link rel='stylesheet' href='{sugar_getjspath file="custom/include/javascripts/alertify/alertify.css"}'/>
<link rel='stylesheet' href='{sugar_getjspath file="custom/include/javascripts/Timepicker/css/jquery.timepicker.css"}'/>
{sugar_getscript file="custom/include/javascripts/DataTables/js/jquery.dataTables.min.js"}
{sugar_getscript file="custom/include/javascripts/DataTables/extensions/KeyTable/js/dataTables.keyTable.min.js"}
{sugar_getscript file="custom/include/javascripts/DataTables/extensions/EditTable/js/jquery.jeditable.js"}
{sugar_getscript file="custom/include/javascripts/validate/jquery.validate.min.js"}
{sugar_getscript file="custom/include/javascripts/alertify/alertify.js"}
{sugar_getscript file="custom/include/javascripts/maskInput/jquery.maskedinput.min.js"}
{sugar_getscript file="custom/include/javascripts/Timepicker/js/jquery.timepicker.min.js"}
<table style="width:100%" id="ticket_info" name="ticket_info">
    <tbody>
        <tr>
            <td width="15%">{$MOD.LBL_CATEGORY}: </td>
            <td width="15%">{html_options name="category" id="category" options=$category_options selected=$fields.category.value}{html_options name="sub_category" id="sub_category" options=$sub_category_options selected=$fields.sub_category.value}</td>
            <td width="10%">{$MOD.LBL_ASSET}: </td>
            <td width="15%">{html_options style="width: 165px;" name="airline" id="airline" options=$asset_options selected=$fields.airline.value}</td>
            <td width="10%">{$MOD.LBL_SUPPLIER}: </td>
            <td width="15%">{html_options style="width: 165px;" name="supplier" id="supplier" options=$supplier_options selected=$fields.supplier.value}</td>
            <td width="10%">{$MOD.LBL_CONTACT}: </td>
            <td width="15%">
                <div>
                    <input type="text" name="contacts_c_ticket_2_name" class="sqsEnabled yui-ac-input" tabindex="0" id="contacts_c_ticket_2_name" size="" value="" title="" autocomplete="off">
                    <input type="hidden" name="contacts_c_ticket_2contacts_ida" id="contacts_c_ticket_2contacts_ida" value="">
                    <span class="id-ff multiple">
                        <button type="button" name="btn_contacts_c_ticket_2_name" id="btn_contacts_c_ticket_2_name" tabindex="0" title="Select Contact" class="button firstChild" value="Select Contact"><img src="themes/default/images/id-ff-select.png"></button><button type="button" name="btn_clr_contacts_c_ticket_2_name" id="btn_clr_contacts_c_ticket_2_name" tabindex="0" title="Clear Contact" class="button lastChild" value="Clear Contact"><img src="themes/default/images/id-ff-clear.png"></button>
                    </span>
                </div>
            </td>
        </tr>
        <tr>
            <td >{$MOD.LBL_TICKET_NUMBER}: </td>
            <td ><input type="text" name="ticket_number" id="ticket_number" style="text-transform:uppercase;" size="25" value="" title="{$MOD.LBL_TICKET_NUMBER}" tabindex="0" ></td>
            <td>{$MOD.LBL_ROUTING}: </td>
            <td><input type="text" name="routing" style="text-transform:uppercase;" id="routing" size="25"  value="" title="{$MOD.LBL_ROUTING}" tabindex="0" ></td>
            <td width="10%">{$MOD.LBL_TOUR}: </td>
            <td width="15%"><input type="text" style="text-transform:uppercase;" name="tour" id="tour" size="25" value="{$fields.tour.value}" title="{$MOD.LBL_TOUR}" tabindex="0" ></td>
            <td>{$MOD.LBL_PAX_NAME}:<span class="required">*</span> </td>
            <td><input type="text" name="pax_name" id="pax_name" style="text-transform:uppercase;" size="25" value="" title="{$MOD.LBL_PAX_NAME}" tabindex="0" ></td>
        </tr>
        <tr>
            <td style="vertical-align: middle;">{$MOD.LBL_MEMBERSHIP_NUMBER}: </td>
            <td><input type="text" name="membership_number" id="membership_number" size="25"  value="" title="{$MOD.LBL_MEMBERSHIP_NUMBER}" tabindex="0" ></td>
            <td>{$MOD.LBL_CARD_TYPE}: </td>
            <td>{html_options style="width: 140px;" name="card_type" id="card_type" options=$card_type_options selected=""  }</td>
            <td style="vertical-align: middle;" >{$MOD.LBL_BOOKING_CODE_PNR}: </td>
            <td><input type="text" name="booking_code" id="booking_code" size="20"  value="" title="{$MOD.LBL_BOOKING_CODE}" tabindex="0" ></td>
            <td style="vertical-align: middle;" >{$MOD.LBL_DATELINE}: </td>
            <td colspan="3">
                <table border="0" cellpadding="0" cellspacing="0" class="dateTime">
                    <tbody><tr valign="top">
                            <td nowrap="">
                                <input class="date_input" autocomplete="off" type="text" name="dateline_date" id="dateline_date" value="" size="10" title="Dateline" maxlength="10" onblur="saveTicketDetail($('#celebs tr.selected'),'0', 'top');" onchange="saveTicketDetail($('#celebs tr.selected'),'0', 'top');">
                                <img src="themes/RacerX/images/jscalendar.png" alt="Enter Date" style="position:relative; top:6px" border="0" id="dateline_date_trigger">
                            </td>
                            <td nowrap="">
                                <input name="dateline_time" id="dateline_time" type="text" style="width: 70px; text-align: center; margin-top: 5px;">
                            </td>
                        </tr>
                    </tbody></table>
                <input type="hidden" class="DateTimeCombo" id="dateline" name="dateline" value="" >
                {literal}

                <script type="text/javascript">
                    $('#dateline_time').timepicker({'timeFormat': SUGAR.expressions.userPrefs.timef,'minTime': '7:00am','maxTime': '9:30pm','step': 15});
                    Calendar.setup ({
                    inputField : "dateline_date",
                    ifFormat : cal_date_format,
                    daFormat : cal_date_format,
                    button : "dateline_date_trigger",
                    singleClick : true,
                    dateStr : "",
                    startWeekday: 0,
                    step : 1,
                    weekNumbers:false
                    }
                    );
                    addToValidate('Editview', 'to_revenue_date', 'date', false,'Revenue Date' ); 
                </script>
                {/literal}
            </td>
        </tr>
        <tr>
            <td>{$MOD.LBL_GATEWAY}: </td>
            <td><input type="text" name="gateway" id="gateway" size="20"  value="" title="{$MOD.LBL_GATEWAY}" tabindex="0" ></td>
            <td>{$MOD.LBL_CLASS}: </td>
            <td>{html_options style="width: 140px;" name="class" id="class" options=$class_options selected=""  }</td>
            <td>{$MOD.LBL_FARE_BASIC}: </td>
            <td><input type="text" name="fare_basic" id="fare_basic" size="20"  value="" title="{$MOD.LBL_FARE_BASIC}" tabindex="0" ></td>
            <td>{$APP.LBL_CURRENCY}  </td>
            <td colspan="3">{$crc_html} <label> {$MOD.LBL_EX_RATE}</label>:   <input type="text" name="ex_rate" id="ex_rate" size="5" value="{$ex_rate}" title="{$MOD.LBL_EX_RATE}" tabindex="0" ></td>
        </tr>
        <tr>
            <td>{$MOD.LBL_REMARK}: </td>
            <td colspan="3"><input type="text" name="remark" id="remark" size="60"  value="" title="{$MOD.LBL_REMARK}" tabindex="0" ></td>
            <td >{$MOD.LBL_CHANGE_FROM}: </td>
            <td colspan="3">
                <div>
                    <input type="text" name="change_from_ticket_name" class="sqsEnabled yui-ac-input" tabindex="0" id="change_from_ticket_name" autocomplete="off">
                    <input type="hidden" name="change_from_ticket_id" id="change_from_ticket_id" value="">
                    <span class="id-ff multiple">
                        <button type="button" name="btn_change_from_ticket_name" id="btn_change_from_ticket_name" tabindex="0" title="Select Ticket" class="button firstChild" value="Select Ticket"><img src="themes/default/images/id-ff-select.png"></button><button type="button" name="btn_clr_change_from_ticket_name" id="btn_clr_change_from_ticket_name" tabindex="0" title="Clear Ticket" class="button lastChild" value="Clear Ticket"><img src="themes/default/images/id-ff-clear.png"></button>
                    </span>
                </div>
            </td>
        </tr>
    </tbody>
</table>
<br><hr></hr>
<div style="width:100%">
<table style="width:100%"  id="tickets" name="tickets">
    <tbody>
        <tr>
            <td style="width:90%;">{$table_tickets}</td>

            <td>
                <input style="width: 100px;" title="{$MOD.LBL_COPY}"  class="button primary" type="button" name="ticket_copy" value="1. {$MOD.LBL_COPY}" id="ticket_copy"><br><br>
                <input style="width: 100px;" title="{$MOD.LBL_ADD}"  class="button" type="button" name="ticket_add" value="2. {$MOD.LBL_ADD}" id="ticket_add"><br>        <br>
                <input style="width: 100px;" title="{$MOD.LBL_DELETE}"  class="button" type="button" name="ticket_delete" value="3. {$MOD.LBL_DELETE}" id="ticket_delete"><br><br>
                <!--                <input style="width: 100px;" title="{$MOD.LBL_PROFIT}"  class="button" type="button" name="ticket_profit" value="{$MOD.LBL_PROFIT}" id="ticket_profit"><br>       <br>
                <input style="width: 100px;" title="{$MOD.LBL_COST}"  class="button" type="button" name="ticket_cost" value="{$MOD.LBL_COST}" id="ticket_cost">    -->
            </td>
        </tr>

    </tbody>
</table>
</div>
<br><br>
<div id="ticket_deleted"></div>
<!--Table Total-->
<table style="width:100%">
    <tbody>
        <tr colspan = "6">
            <td width = "15%"><label>{$MOD.LBL_TOTAL_AMOUNT}: </label></td>
            <td width = "20%"><input type="text"  style="color: rgb(165, 42, 42); text-align: right; background-color: rgb(221, 221, 221);" readonly name="total_amount" id="total_amount" size="20" maxlength="26" value="{sugar_number_format var=$fields.total_amount.value}" title="{$MOD.LBL_TOTAL_AMOUNT}" tabindex="0"></td>
            <td width = "15%"><label>{$MOD.LBL_TOTAL_PURCHASE}: </label></td>
            <td width = "20%"><input type="text" style="color: rgb(165, 42, 42); text-align: right; background-color: rgb(221, 221, 221);" readonly name="total_purchase" id="total_purchase" size="20" maxlength="26" value="{sugar_number_format var=$fields.total_purchase.value}" title="{$MOD.LBL_TOTAL_PURCHASE}" tabindex="0"></td>
            <td width = "15%"><label>{$MOD.LBL_TOTAL_PROFIT}: </label></td>
            <td width = "20%"><input type="text"  style="color: rgb(165, 42, 42); text-align: right; background-color: rgb(221, 221, 221);" readonly name="total_profit" id="total_profit" size="20" maxlength="26" value="{sugar_number_format var=$fields.total_profit.value}" title="{$MOD.LBL_TOTAL_PROFIT}" tabindex="0"></td>
        </tr>
    </tbody>
</table>