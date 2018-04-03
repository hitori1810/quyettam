$( document ).ready(function() {
    CalRefundFee();
    $( "#refund_fee, #refund_fee_airline" ).keyup(function() {
        CalRefundFee();  
    });  
})
function CalRefundFee(){
    //Prepare
    var payable             = unformatNumber($("#payable").val(),num_grp_sep,dec_sep);
    var refund_fee_airline  = unformatNumber($("#refund_fee_airline").val(),num_grp_sep,dec_sep);

    var receivable          = unformatNumber($("#receivable").val(),num_grp_sep,dec_sep); 
    var refund_fee          = unformatNumber($("#refund_fee").val(),num_grp_sep,dec_sep);
    
    var airline_repay       = payable - refund_fee_airline;
    var repay_client        = receivable - refund_fee;

    if(airline_repay <= 0){
        alert('Invalid input');
        $("#refund_fee_airline").val('');  
        $('#airline_repay').val(formatNumber(payable,num_grp_sep,dec_sep,precision,precision));
        return;  
    }

    if(repay_client <= 0){
        alert('Invalid input');
        $("#refund_fee").val('');  
        $('#repay_client').val(formatNumber(receivable,num_grp_sep,dec_sep,precision,precision)); 
        return; 
    }

    //Assign
    $('#airline_repay').val(formatNumber(payable - refund_fee_airline,num_grp_sep,dec_sep,precision,precision));
    $('#repay_client').val(formatNumber(receivable - refund_fee,num_grp_sep,dec_sep,precision,precision));
}