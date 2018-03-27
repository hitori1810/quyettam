{literal}
<script type="text/javascript">
    Calendar.setup ({
    inputField : "payment_date_1",
    daFormat : cal_date_format,
    button : "payment_date_1_trigger",
    singleClick : true,
    dateStr : "",
    step : 1,
    weekNumbers:false
    }
    );
    Calendar.setup ({
    inputField : "payment_date_2",
    daFormat : cal_date_format,
    button : "payment_date_2_trigger",
    singleClick : true,
    dateStr : "",
    step : 1,
    weekNumbers:false
    }
    );
    Calendar.setup ({
    inputField : "full_payment_date",
    daFormat : cal_date_format,
    button : "full_payment_date_trigger",
    singleClick : true,
    dateStr : "",
    step : 1,
    weekNumbers:false
    }
    );
</script>
{/literal}
<fieldset id="credit_info" style="width:70%; min-height: 50px; display: block;">
    <legend><b> {$MOD.LBL_PAYMENT_INFO} </b></legend>
    <table colspan = "2">
        <tbody>
            <tr><td style="width: 50%;">{$MOD.LBL_PAYMENT_DATE_1}: </td><td>
                    <span class="dateTime">
                        <input class="date_input" size="11" autocomplete="off" type="text" name="payment_date_1" id="payment_date_1" value="{$fields.payment_date_1.value}" title="Payment Date 1" tabindex="0" maxlength="10" style="vertical-align: top;">
                        <img src="themes/RacerX/images/jscalendar.png" alt="Enter Date" style="position:relative; top:0px" border="0" id="payment_date_1_trigger">
                    </span>
                </td></tr>
            <tr>
                <td style="width: 50%;">{$MOD.LBL_PAYMENT_AMOUNT_1}: </td>
                <td><input type="text" name="payment_amount_1" id="payment_amount_1" size="25" maxlength="26" value="{sugar_number_format var=$fields.payment_amount_1.value}" title="{$MOD.LBL_PAYMENT_AMOUNT_1}" class="currency"  tabindex="0"></td>
                <td></td>
                <td>{html_options name="payment_method_1" id="payment_method_1" options=$fields.payment_method_1.options selected=$fields.payment_method_1.value}</td>
            </tr>
            <tr><td style="width: 50%;">{$MOD.LBL_PAYMENT_DATE_2}: </td><td>
                    <span class="dateTime">
                        <input class="date_input" size="11" autocomplete="off" type="text" name="payment_date_2" id="payment_date_2" value="{$fields.payment_date_2.value}" title="Payment Date 2" tabindex="0" maxlength="10" style="vertical-align: top;">
                        <img src="themes/RacerX/images/jscalendar.png" alt="Enter Date" style="position:relative; top:0px" border="0" id="payment_date_2_trigger">
                    </span>
                </td></tr>
            <tr>
                <td style="width: 50%;">{$MOD.LBL_PAYMENT_AMOUNT_2}: </td>
                <td><input type="text" name="payment_amount_2" id="payment_amount_2" size="25" maxlength="26" value="{sugar_number_format var=$fields.payment_amount_2.value}" title="{$MOD.LBL_PAYMENT_AMOUNT_2}" class="currency" tabindex="0"></td>
                <td></td>
                <td>{html_options name="payment_method_2" id="payment_method_2" options=$fields.payment_method_2.options selected=$fields.payment_method_2.value}</td>
                </tr>
            <tr><td style="width: 50%;">{$MOD.LBL_FULL_PAYMENT_DATE}: </td><td>
                    <span class="dateTime">
                        <input class="date_input" size="11" autocomplete="off" type="text" name="full_payment_date" id="full_payment_date" value="{$fields.full_payment_date.value}" title="{$MOD.LBL_FULL_PAYMENT_DATE}" tabindex="0" maxlength="10" style="vertical-align: top;">
                        <img src="themes/RacerX/images/jscalendar.png" alt="Enter Date" style="position:relative; top:0px" border="0" id="full_payment_date_trigger">
                    </span>
                </td>
                <td></td>
                <td>{html_options name="full_payment_method" id="full_payment_method" options=$fields.full_payment_method.options selected=$fields.full_payment_method.value}</td>
                </tr>
        </tbody>
    </table>
    </fieldset>
    <br>
