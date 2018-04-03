$(function(){
    // Load editable config right after the detailview form is loaded
    SUGAR.util.doWhen(function(){
        return $('form#formDetailView')[0] != null;  
    }, function(){
        var form = $('form#formDetailView');
        ajaxLoadEditableConfig(form);    
    });    
});

// Load editable config for the given module using ajax
function ajaxLoadEditableConfig(form) {
    var formId = form.attr('id');
    var moduleName = form.find('input[name="module"]').val();
    
    // Call ajax to load dupplication config for this form if the module name is not empty
    if(moduleName != '') {
        $.ajax({
            'url': 'index.php?module=C_DetailViewEditableConfig&action=ajaxloadconfig&sugar_body_only=true',
            'type': 'POST',
            'dataType': 'json',
            'data': {
                'moduleName': moduleName
            },
            'success': function(config) {   console.log(config);
                if(config.configType == 'whole_module') {
                    // Disable editable for all fields
                    form.find('.edit_block').remove();
                } else {
                    // Disabled editable for the selected target fields
                    if(config.targetFields != null) {           
                        for(i = 0; i < config.targetFields.length; i++) {
                            form.find('#'+ config.targetFields[i] +'_editblock').remove();
                        }
                    }    
                }
            }
        }); 
    }       
}