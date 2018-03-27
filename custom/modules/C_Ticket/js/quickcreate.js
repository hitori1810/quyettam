//Add by Nhat
$(document).ready(function(){
      autoUpperCasePaxName();
      reformatNumberCDV();
      outFocus("#commission_percent","#public_fare","#commission");
      outFocus("#discount_percent","#market_fare","#discount");
      calVATAmount();
     // outFocus("#commission_percent","#public_fare","#commission");
});
function outFocus(element_percent,element_value,element_result)
{
    $(element_percent).blur(function(){
         var percent = getNum($(this).val());
         var value =  getNum($(element_value).val());
         var cal =  calValueOfCDV(percent,value);
         $(element_result).val(formatNumber(cal,num_grp_sep,dec_sep,precision));
    });
}
function calVATAmount()
{
    //alert(vat_percent);
    $('#vat_percent').blur(function(){
        var market_fare = getNum($('#market_fare').val());
        var airport_tax = getNum($('#airport_tax').val());
        var vat_percent = getNum($('#vat_percent').val());
        var res=  market_fare - airport_tax;
        var cal = calValueOfCDV(vat_percent,res);
        //alert(vat_percent);
        $('#vat_amount').val(formatNumber(cal,num_grp_sep,dec_sep,precision));
    });
}
function reformatNumberCDV(){
    var com = formatNumber($('#commission').val(),num_grp_sep,dec_sep,precision);
    var discount =  formatNumber($('#discount').val(),num_grp_sep,dec_sep,precision);
    var vat = formatNumber($('#vat_amount').val(),num_grp_sep,dec_sep,precision);
    $('#commission').val(com);
    $('#discount').val(discount);
    $('#vat_amount').val(vat);
}
// Calculate Com...,DisCount,VAT
function calValueOfCDV(percent,value){
    return (percent/100)*value;
}
function autoUpperCasePaxName(){
    $("#pax_name").keyup(function(){
         var paxname=$(this).val().toUpperCase();
         $(this).val(paxname);
    });
}
function getNum(val){
    var num = unformatNumber(val,num_grp_sep,dec_sep);
    if (isNaN(num) || num == '') 
        return 0;
    else
        return num;
}
//End by Nhat
SUGAR.util.doWhen(
    function(){
        return $('#C_Ticket_subpanel_full_form_button').length > 0;
    }, function(){
        
        // Add page title
        $('#C_Ticket_subpanel_full_form_button').hide();

    }
)
// auto Upper PAX NAME

 
