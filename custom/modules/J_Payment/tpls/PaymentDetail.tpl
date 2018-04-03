<table id="tblPayDetail" class="dynamicTable">
<thead>
    <tr>
        <th style="width:20%">{$MOD.LBL_PRODUCT}</th>
        <th style="width:15%">{$MOD.LBL_QUANTITY}</th>
        <th style="width:15%">{$MOD.LBL_UNIT_COST}</th>
        <th style="width:10%">{$MOD.LBL_UNIT}</th>
        <th style="width:15%">{$MOD.LBL_PAY_DETAIL_AMOUNT}</th>           
        <th style="width:10%"><input type="button" class="btnAddRow" value="{$APP.BTN_ADD_TITLE}"></input></th>
    </tr>
</thead>
<tbody>
    {$PAYMENT_DETAIL}
</tbody>
<tfoot class="template" style="display:none">
    {$PAYMENT_DETAIL_TEMPLATE}
</tfoot>
</table>