$(document).ready(function(){

    if($('input[name="record"]').val()=='')
    {
        $('#contract_type').live('change', function(){
            if($('#contract_type').val()=='FT')
            {
                $('#less_non_working_hours').val('3');
                $('#working_hours_monthly').val('74'); 
            }
        });
    }

    $('#contract_type').live('change', function(){
        if($('#contract_type').val()=='PT')
        {
            $('#less_non_working_hours').val('0');
            $('#working_hours_monthly').val('0');
            $('#Default_J_Teachercontract_Subpanel > tbody > tr:nth-child(4)').hide();
        }
        else 
        {
            $('#Default_J_Teachercontract_Subpanel > tbody > tr:nth-child(4)').show();
        }
    });

    $('#contract_type').trigger('change');

    $('input[name="dayoff[]"]').live('click', function(){
        if($('input[name="dayoff[]"]:checked').length >2)
        {
            alert(SUGAR.language.translate('J_Teachercontract','LBL_ERROR'));
            return false;
        }
    });
    //add by Lam Hai 17/08/2016
    if($('input[name="record"]').val() != '')
    {      
        $('#contract_until').live('change', function(){
            checkSession($(this).closest("form").attr('id'));          
        });
        
        $('#status').live('change', function(){
            if($('#status').val() == 'Inactive')
                checkContractInactive($(this).closest("form").attr('id'));          
        });
    }
    
    if($('input[name="record"]').val() == '')
    {      
        $('#contract_date').live('change', function(){
            checkContractTime($(this).closest("form").attr('id'));          
        });
        
        $('#c_teachers_j_teachercontract_1c_teachers_ida').live('change', function(){
            checkContractTime($(this).closest("form").attr('id'));          
        });       
    }  
});