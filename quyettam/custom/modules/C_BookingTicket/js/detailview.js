$( document ).ready(function() {
    $('#ticket_info').closest('td').attr('colspan','4');         
    $('.ab').click(function(){
        $('.subnav').parent('.sugar_action_button').children('ul').toggle();
        return false;
    });

    $('#receipt_voucher').live("click",function(){
        window.open("index.php?module=C_BookingTicket&action=receipt_voucher&record="+$('input[name="record"]').val(),'_blank');       
    });
    $('#sale_receipt').live("click",function(){
        if ($('#ticket_count').val()>4 && ($('#total_amount_invoice').text() == "" || $('#invoice_content').text() == "")) {
            alert("Phiếu thu có hơn 4 vé, xin vui lòng nhập giá trị Invoice Content & Total Amount!");    
        }
        else window.open("index.php?module=C_BookingTicket&action=salereceipt&count="+$('input[name="ticket_count"]').val()+"&record="+$('input[name="record"]').val(),'_blank');       
    });
    $('#invoice_voucher').live("click",function(){
        if ($('#ticket_count').val()>4 && ($('#total_amount_invoice').text() == "" || $('#invoice_content').text() == "")) {
            alert("Phiếu thu có hơn 4 vé, xin vui lòng nhập giá trị Invoice Content & Total Amount!");    
        }       
        else window.open("index.php?module=C_BookingTicket&action=invoicevoucher&count="+$('input[name="ticket_count"]').val()+"&record="+$('input[name="record"]').val(),'_blank');       
    });

    // Fix table size
    fixTicketTableSize();
    $(window).resize(function(){
        fixTicketTableSize();
    });
})

function fixTicketTableSize(){
    var ticketTableWidth = $("#DEFAULT").width() - 15;
    $("#celebs").css("width",ticketTableWidth);
    $("#celebs").css("display","block");
    $("#celebs").css("overflow","auto");
}