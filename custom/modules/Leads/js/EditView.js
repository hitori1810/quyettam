var customerClassIdList = {
    "Silver" : '26',
    "Gold" : '24',
    "Platinum" : '23',
};
function _saveOnClick() {         
    var _form = document.getElementById('EditView'); 
    _form.action.value='Save';             
    if(check_form('EditView')) {
        //var url = "http://preprod-booking.gotadi.com/booking/AuthenticateUser.axd";
        var url = "https://booking.gotadi.com/booking/AuthenticateUser.axd";
        var sso = new TCSSO(url);
        sso.updateDetails({
            customerid: $('input[name=ibe_id]').val(),
            customerclassid: customerClassIdList[$('select[name=fit_category]').val()],           
            },function(err, res) {
                var _error = true;
                if(typeof res == 'object' && res != null) {
                    if(typeof res.UserInfo == 'object') {
                        if(res.UserInfo.Status == "Sucess") {
                            _error = false;
                            SUGAR.ajaxUI.submitForm(_form); 
                            return
                        }
                    }

                } 
                if(_error) {
                    if(confirm("There was error(s) when updating customer's category form CRM to IBE. Do you want to continue saving?")) {
                        SUGAR.ajaxUI.submitForm(_form);
                        return false;
                    } else {
                        return false;
                    }
                }
            }
        ); 
    }  
    return false;   
}

jQuery(document).ready(function(){ 
    // Override ajax submit form
    SUGAR.ajaxUI.submitForm = function (formname,params) {
        // Custom code
        jQuery(formname).find(':input:disabled').attr('disabled', false);

        // Original
        var con=YAHOO.util.Connect,SA=SUGAR.ajaxUI;if(SA.lastCall&&con.isCallInProgress(SA.lastCall)){con.abort(SA.lastCall);}
        SA.cleanGlobals();var form=YAHOO.util.Dom.get(formname)||document.forms[formname];if(SA.canAjaxLoadModule(form.module.value)&&typeof(YAHOO.util.Selector.query("input[type=file]",form)[0])=="undefined"&&/action=ajaxui/.exec(window.location.href))
        {var string=con.setForm(form);var baseUrl="index.php?action=ajaxui#ajaxUILoc=";SA.lastURL="";if(string.length>200)
                {SUGAR.ajaxUI.showLoadingPanel();form.onsubmit=function(){return true;};form.submit();}else{con.resetFormState();window.location=baseUrl+encodeURIComponent("index.php?"+string);}
            return true;}else{if(typeof(YAHOO.util.Selector.query("input[type=submit]",form)[0])!="undefined"&&YAHOO.util.Selector.query("input[type=submit]",form)[0].value=="Save")
            {ajaxStatus.showStatus(SUGAR.language.get('app_strings','LBL_SAVING'));}
            form.submit();return false;}
    }
    
    initOpportunityValidation();

    // Showing first opportunity panel
    jQuery('#create_opportunity').change( function(e) {
        initOpportunityValidation();
    });

    // Display form for edit page
    if(jQuery('input[name="record"]').val() != '' && jQuery('#create_opportunity').is(':checked')) {
        // Disable create opportunity checkbox if it is already checked when edit and it is checked
        jQuery('#create_opportunity').attr('disabled', true);

        // Disable all fields for opportunity if the sales state is Cloed Won 
        var sales_stage = jQuery('#opp_sales_stage').val();
        if(sales_stage == 'Closed Won') {
            $("#LBL_FIRST_OPPORTUNITY").find(':input').attr('disabled' , true);    
        }
    }
//    $('#gs_code').select2({dropdownAutoWidth : true});
    $('#airline').select2({dropdownAutoWidth : true});
//    addToValidateComparison('EditView', 'gs_code', 'name', true, "Mã khách lẻ GreenSoft"," ");
    
    displayFitCategory();      
    displayGsCode();
    $("select#category").on("change",function(){
        displayFitCategory();    
        displayGsCode();
    })
    
    if($('input[name="record"]').val() != '')
        $('.action_buttons #SAVE_FOOTER, .action_buttons #SAVE_HEADER').attr('onclick', "_saveOnClick(); return false;");
}); 

function displayFitCategory(){
    if ($("select#category").val() == "FIT") {
        $("select#fit_category").show();
        $("label[for='fit_category']").show();
    }
    else {
        $("select#fit_category").hide();
        $("label[for='fit_category']").hide();
    } 
} 

function displayGsCode(){
    if ($("#category").val() == "EMPLOYEE") {
        $("#gs_code").show();
        $("#lbl_gs_code").show();
    }
    else {
        $("#gs_code").hide();
        $("#lbl_gs_code").hide();
    } 
}
    
function initOpportunityValidation() {
    var oppPanel = $("#LBL_FIRST_OPPORTUNITY").parent(".edit.view");
    
    var isCreateOpp = $('#create_opportunity').is(':checked');
    if(isCreateOpp == true){
        oppPanel.show();
        addToValidate('EditView', 'opp_name', 'varchar', true , SUGAR.language.get('app_strings', 'LBL_OPPORTUNITY_NAME'));    
        addToValidate('EditView', 'opp_date_closed', 'varchar', true , SUGAR.language.get('app_strings', 'LBL_OPP_DATE_CLOSED'));    
        addToValidate('EditView', 'opp_sales_stage', 'varchar', true , SUGAR.language.get('app_strings', 'LBL_OPP_SALES_STAGE'));    
    }else{
        oppPanel.hide();
        removeFromValidate('EditView', 'opp_name');
        removeFromValidate('EditView', 'opp_date_closed');
        removeFromValidate('EditView', 'opp_sales_stage');
    }
}