$(function(){
    // Don't allow to delete default config
    if($('#target_module').val() == 'C_DetailViewEditableConfig') {
        $('.sugar_action_button').find('#delete_button').remove();
    }
    
    // Hide target fields when the config type is for the whole module
    if($('#config_type').val() == 'whole_module') {
        $('#target_fields').closest('tr').hide();
    }    
});