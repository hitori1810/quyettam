function displayRelateOption(){
    form = jQuery('form').attr('name');
    if(module_sugar_grp1 == 'Leads'){
        jQuery('#parent_option').val('Leads');  
        jQuery('#parent_option').hide(); 
        jQuery('#account_name').hide();
        jQuery('#btn_account_name').hide();
        jQuery('#btn_clr_account_name').hide(); 
    }
    else if(module_sugar_grp1 == 'Accounts'){
        jQuery('#parent_option').val('Accounts');
        jQuery('#parent_option').hide();
        jQuery('#leads_opportunities_1_name').hide();
        jQuery('#btn_leads_opportunities_1_name').hide();
        jQuery('#btn_clr_leads_opportunities_1_name').hide();
    }
    else{
        if(jQuery('#parent_option').val() == 'Accounts'){
            jQuery('#account_name').show();
            jQuery('#btn_account_name').show();
            jQuery('#btn_clr_account_name').show();
            addToValidate(form, 'account_name', 'relate', true,SUGAR.language.languages.Opportunities.LBL_ACCOUNT_NAME );
            addToValidate(form, 'account_id', 'id', true,SUGAR.language.languages.Opportunities.LBL_ACCOUNT_ID );
            jQuery('#leads_opportunities_1_name').hide();
            jQuery('#btn_leads_opportunities_1_name').hide();
            jQuery('#btn_clr_leads_opportunities_1_name').hide();
            jQuery('#leads_opportunities_1_name').val('');
            jQuery('#leads_opportunities_1leads_ida').val('');
            removeFromValidate(form, 'leads_opportunities_1_name');
            removeFromValidate(form, 'leads_opportunities_1leads_ida');

        }
        else if(jQuery('#parent_option').val() == 'Leads'){
            jQuery('#account_name').hide();
            jQuery('#btn_account_name').hide();
            jQuery('#btn_clr_account_name').hide();
            jQuery('#leads_opportunities_1_name').show();
            jQuery('#btn_leads_opportunities_1_name').show();
            jQuery('#btn_clr_leads_opportunities_1_name').show();
            jQuery('#account_name').val('');
            jQuery('#account_id').val('');
            removeFromValidate(form, 'account_name');
            removeFromValidate(form, 'account_id');
            addToValidate(form, 'leads_opportunities_1_name', 'relate', true, SUGAR.language.languages.Opportunities.LBL_LEADS_OPPORTUNITIES_1_FROM_LEADS_TITLE);
            addToValidate(form, 'leads_opportunities_1leads_ida', 'id', true,SUGAR.language.languages.Opportunities.LBL_LEADS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE_ID );

        }
        else{
            jQuery('#account_name').hide();
            jQuery('#btn_account_name').hide();
            jQuery('#btn_clr_account_name').hide();
            jQuery('#leads_opportunities_1_name').hide();
            jQuery('#btn_leads_opportunities_1_name').hide();
            jQuery('#btn_clr_leads_opportunities_1_name').hide();
            jQuery('#account_name').val('');
            jQuery('#account_id').val('');
            jQuery('#leads_opportunities_1_name').val('');
            jQuery('#leads_opportunities_1leads_ida').val('');
            removeFromValidate(form, 'account_name');
            removeFromValidate(form, 'account_id');
            removeFromValidate(form, 'leads_opportunities_1_name');
            removeFromValidate(form, 'leads_opportunities_1leads_ida');
        }
    }
}

