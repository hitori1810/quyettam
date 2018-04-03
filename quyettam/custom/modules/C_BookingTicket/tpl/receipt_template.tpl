<link rel='stylesheet' type='text/css' href='custom/modules/C_BookingTicket/tpl/css/receipt_style.css'>
<html>
    <head>
    </head>
    <body>
        <table class="tbl_info">
            <tbody class="tbl_header">
                <tr>
                    <td class="td_logo" rowspan="2">  
                        <img src="{$LOGO_LINK}" border="0" width="200px" height="auto">
                    </td>
                    <td class="td_header" colspan="4">PHIẾU THU TIỀN CƯỚC VẬN CHUYỂN</td> 
                </tr>
                <tr>
                    <td class="td_header" colspan="4">RECEIPT</td> 
                </tr>
                <tr>
                    <td></td>
                    <td class="lbl_invoice_date">Ngày /Date:</td> 
                    <td class="invoice_date">&nbsp;&nbsp;&nbsp;{$INVOICE_DATE}</td> 
                    <td class="lbl_document_id">Số / No.:</td> 
                    <td class="document_id">&nbsp;&nbsp;&nbsp;{$DOCUMENT_ID}</td> 
                </tr>
                <tr>
                    {$BOOKING_CODE} 
                </tr>
                <tr>
                <td class="receiver" colspan="5">Tên người nhận / Receiver:&nbsp;&nbsp;&nbsp;&nbsp;{$RECEIVER}</td>
                </tr>
                <tr>
                <td class="customer" colspan="5">Khách hàng / Customer:&nbsp;&nbsp;&nbsp;&nbsp;{$CUSTOMER}</td>
                </tr>
            </tbody>
        </table>
        
        <table class="tbl_detail">
        <tbody>
        <tr>
        <th style="width:15%">Số vé<br>Ticket Number</th>
        <th style="width:15%">Tên khách<br>Passenger Name</th>
        <th style="width:15%">Hành trình<br>Routing</th>
        <th style="width:10%">Giá vé<br>Fare</th>
        <th style="width:10%">Phí, Thuế<br>Charges, Tax</th>
        <th style="width:10%">VAT<br> </th>
        <th style="width:10%">Phí DV<br>SVC</th>
        <th style="width:10%">Thành Tiền<br>Total</th>
        </tr>
        {$RECEIPT_DETAIL}
        </tbody>
        </table>
        
        <table class="tbl_signal">
        <tbody>
        <tr>
        <td colspan="4" class="lbl_total_amount">Tổng tiền thanh toán (Total Amount):</td>
        <td class="total_amount">{$TOTAL_AMOUNT}</td>
        </tr>
        <tr class="tr_signal">
        <td style="width:20%">Người mua hàng<br>(Buyer)</td>
        <td style="width:20%"></td>
        <td style="width:20%">Nhân viên vé<br>(Ticketing)</td>
        <td style="width:20%"></td>
        <td style="width:20%">Thủ quỹ<br>(Cashier)</td>
        </tr>
        </tr>
        <tr>
        <td style="width:20%" colspan="5" class="ticketing">{$TICKETING}</td>
        </tr>
        </tbody>
        </table>
        <hr>
        <div class="footer">
        <label>{$CENTER_ADDRESS}</label><br>
        <label>{$CENTER_PHONE}</label>&nbsp;&nbsp;&nbsp;&nbsp;<label class="email">{$CENTER_EMAIL}</label>
        </div>
    </body>
</html>