$(document).ready(function(){
    
})

function changeProduct(this_row){
    var unit = this_row.find(".product option:selected").attr("unit");
    var unit_cost = this_row.find(".product option:selected").attr("unit_cost");

    this_row.find(".unit_cost").val(unit_cost);
    this_row.find(".unit_cost").trigger("change");
    
    this_row.find(".lbl_unit").text(unit);         
    this_row.find(".unit").val(unit);         
}

function calculatePayDetailAmount(this_row){
    var quantity = this_row.find(".quantity").val();
    var unit_cost = this_row.find(".unit_cost").val();

    var amount = unit_cost * quantity;
    this_row.find(".pay_detail_amount").val(amount);
    this_row.find(".lbl_pay_detail_amount").text(amount);   
    calculatePaymentAmount();
}

function calculatePaymentAmount(){
    var total_amount = 0;
    
    $("#tblPayDetail tbody").find(".pay_detail_amount").each(function(){
        total_amount += parseInt($(this).val());    
    });
    
    $("#lbl_payment_amount").text(total_amount);
    $("#payment_amount").val(total_amount);
}