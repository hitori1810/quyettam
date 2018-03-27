$(function(){
    var importantModules = new Array(
        'C_DetailViewEditableConfig', 
        'C_DuplicationDetection', 
        'C_FieldHighlighter', 
        'C_HelpTextConfig', 
        'C_KeyboardSetting'
    );
    
    // Don't allow to delete default config
    if($.inArray($('#target_module').val(), importantModules) >= 0) {
        $('.sugar_action_button, .action_buttons').find('#edit_button, #delete_button').remove();
    }    
});