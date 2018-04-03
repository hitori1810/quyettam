// ==========================================//
// HANDLE CURRENCY FIELD BY LAP NGUYEN       //        
// ==========================================//
function numberFormat(nr){
    //remove the existing ,
    var regex = new RegExp('[a-zA-Z'+num_grp_sep+']',"g"); 
    nr = nr.replace(regex,'');
    //force it to be a string
    nr += '';
    //split it into 2 parts  (for numbers with decimals, ex: 125.05125)
    var x = nr.split(dec_sep);
    var p1 = x[0];
    var p2 = x.length > 1 ? dec_sep + x[1] : '';
    //match groups of 3 numbers (0-9) and add , between them
    regex = /(\d+)(\d{3})/;
    while (regex.test(p1)) {
        p1 = p1.replace(regex, '$1' + num_grp_sep + '$2');
    }
    //join the 2 parts and return the formatted number
    return p1 + p2;
}
//Check currency with SUGAR's funtion
function checkCurrency(focus){
    var val = $(focus).val(),
    value = unformatNumber(val,num_grp_sep, dec_sep);
    if(value != '')
        $(focus).val(formatNumber(value,num_grp_sep,dec_sep,precision,precision));
}
SUGAR.util.doWhen("$('input.currency').length", function(){
  $("input.currency").keyup(function(){
        this.value = numberFormat(this.value);
    });
    //double check currency with SUGAR's funtion
    $('input.currency').live('blur',function(){
        checkCurrency(this);
    });
    //check all currency input when the page loaded
    $('input.currency').each(function(){
        $(this).css("text-align", "right"); 
    });  
});