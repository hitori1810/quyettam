jQuery(document).ready(function(){
    if ($("input[name='module']:first").val() == "Contacts"){
        $("#parent_name").val($("#name").text());
        $("#parent_id").val($("input[name='record']:first").val());
        $("#parent_type").val("Contacts");
    }
    
    if ($("#formDetailView").val() != null) {
        $("#won_amount").closest("td").hide();
        $("#won_amount_label").closest("td").hide();
    }
    else {
        ShowHideWonAmount();
    }
        $('#sales_stage').change(function(){
        ShowHideWonAmount();
        switch ($('#sales_stage').val()) {
            case "Prospecting":
                $('#probability').val(10);
                break;
            case "Id. Decision Makers":
                $('#probability').val(30);
                break;
            case "Proposal/Price Quote":
                $('#probability').val(50);
                break;
            case "Negotiation/Review":
                $('#probability').val(80);
                break;
            case "Closed Won":
                $('#probability').val(100);
                break;
            case "Closed Lost":
                $('#probability').val(0);
                break;    
        }
    }); 
    
});

function ShowHideWonAmount(){
    if ($('#sales_stage').val() == "Closed Won") {
        $("#won_amount").closest("td").show();
        $("#won_amount_label").closest("td").show();
        if ($("#formDetailView").val() == null) addToValidate('EditView', 'won_amount', 'name', true, 'Missing Won Amount');
        else addToValidate($("#won_amount").closest("form").attr("name"), 'won_amount', 'name', true, 'Missing Won Amount');
    }
    else {
        $("#won_amount").val("");
        $("#won_amount").closest("td").hide();
        $("#won_amount_label").closest("td").hide();
        if ($("#formDetailView").val() == null) removeFromValidate('EditView', 'won_amount');
        else removeFromValidate($("#won_amount").closest("form").attr("name"), 'won_amount');
    }
}
