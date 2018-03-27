$( document ).ready(function() {
    $(".relationship_type").live('change',function(){
       ajaxChangeRelationshipType($(this).attr('record_id'),$(this).val());
    });
});

//Ajax Change relationship
function ajaxChangeRelationshipType(contact_id, type){
    ajaxStatus.showStatus('Saving <img src="custom/include/images/loader32.gif" align="absmiddle" width="32">');
    $.ajax({
        url: "index.php?module=Contacts&action=saveRelationshipType&sugar_body_only=true",
        type: "POST",
        async: true,
        data:                       
        {
            contact_id: contact_id,
            type: type,
        }, 
        dataType: "json",
        success: function(data){
        },       
    });
    ajaxStatus.hideStatus(); 
}