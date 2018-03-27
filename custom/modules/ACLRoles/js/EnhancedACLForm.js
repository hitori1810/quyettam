/*
*   EnhancedACLForm.js
*   Author: Hieu Nguyen
*   Date: 2015-05-04
*   Purpose: Allows to mass update permissions by clicking on the column title
*/

// Util function to enhance ACL form
function enhanceACLForm() {
    // Generate header dropdown
    var header = $('#ACLEditView_Access_Header');
    var table = header.closest('table');
    var firstRow = header.next('tr');
    header.find('td').each(function(i){
        if(i != 0) {
            var perms = firstRow.find('td').eq(i).find('select').html();
            var massUpdatePerms = '<select class="massUpdatePerms" style="display:none">'+ perms +'</select>';
            $(this).append(massUpdatePerms);    
        }    
    });
    
    // Handle clicking header title
    header.find('td').find('div').click(function(){
        $(this).hide();
        $(this).next('.massUpdatePerms').show();
    });

    // Hangle changing mass update dropdown
    header.find('.massUpdatePerms').live('blur', function(){
        var selectedVal = $(this).val();
        var colIndex = header.find('td').index($(this).closest('td'));
        table.find('tr').not(header).find('td:nth('+ colIndex +')').each(function(){
            $(this).find('select:not(:disabled)').val(selectedVal).trigger('blur');
        });
        $(this).prev('div').show();
        $(this).hide();
    });
}

// For form reloading after saving
SUGAR.util.doWhen(
    function() {
        return typeof aclviewer !== "undefined";     
    },
    function() {
        // Override ACL display function to inject custom logic
        aclviewer.display = function(o){
            aclviewer.lastDisplay='';ajaxStatus.flashStatus(SUGAR.language.get('ACLRoles','LBL_DONE'));document.getElementById('category_data').innerHTML=o.responseText;
            
            // Custom logic
            enhanceACLForm();
        }    
    }
);

// For form loading when page loaded
$(function(){
    enhanceACLForm();
});