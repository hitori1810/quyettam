SUGAR.KeyboardSetting = {};
SUGAR.KeyboardSetting.config = {};   // Config array for all forms that have been marked as active 

$(function(){
    
    // ALL VIEW: Load duplication detection config for the loaded quick create modal popup form when user click on quick create button on the top right corner
    $('#quickCreateULSubnav').find('li').find('a').click(function(){
        // Init the quick create popup form right after it is loaded
        SUGAR.util.doWhen(function(){
            return $('form[id*="form_DCQuickCreate"]')[0] != null;  
        }, function(){
            var form = $('form[id*="form_DCQuickCreate"]');
            ajaxLoadKeyboardSetting(form);    
        });    
    });
    
    // EDIT VIEW: Load duplication detection config for current module if the user is in the edit form
    if($('form#EditView')[0] != null) {
        var form = $('form#EditView');
        ajaxLoadKeyboardSetting(form);   
    }
    
    // DETAIL VIEW: Load duplication detection config for all the modules in the subpanel if the user click crate button
    if($('#formDetailView')[0] != null) {
        // Clicking on quick create buttons
        $('input[id*="create"][id*="create"]').click(function(){
            // Init the quick create forms right after it is loaded
            SUGAR.util.doWhen(function(){
                return $('form[id*="form_SubpanelQuickCreate"]')[0] != null;  
            }, function(){
                var form = $('form[id*="form_SubpanelQuickCreate"]');
                ajaxLoadKeyboardSetting(form);    
            });    
        });
    }

});

// Load keyboard setting for the given module using ajax
function ajaxLoadKeyboardSetting(form) {
    var formId = form.attr('id');
    var moduleName = form.find('input[name="module"]').val();
    
    // Call ajax to load dupplication config for this form if the module name is not empty
    if(moduleName != '') {
        $.ajax({
            'url': 'index.php?module=C_KeyboardSetting&action=ajaxloadconfig&sugar_body_only=true',
            'type': 'POST',
            'dataType': 'json',
            'data': {
                'moduleName': moduleName
            },
            'success': function(config) {
                if(!$.isEmptyObject(config)) {           
                    SUGAR.KeyboardSetting.config[formId] = config;

                    // Apply checking for duplication for all the target fields when their value are changed
                    for(fieldName in config) {
                        if(fieldName != 'email') {
                            targetField = form.find(':input[name="'+ fieldName + '"]');
                            
                            // Handle field right at the form load
                            SUGAR.KeyboardSetting.handleField(targetField); 
                            
                            // Handle field on value change
                            targetField.live('change', function(){
                                SUGAR.KeyboardSetting.handleField(targetField);     
                            });
                        }
                    }
                    
                    // Email is an complicated case. Separate it here
                    if(config['email'] != null) {
                        var emails = form.find('.emailaddresses');
                        // Bind change event for exsiting fields
                        emails.find('input[type="text"][id*="emailAddress"]').each(function(){
                            SUGAR.KeyboardSetting.handleField($(this));   
                        });
                        
                        // Bind change event for newly added field when the user click add email button
                        emails.find('button[id*="email_widget_add"]').click(function(){
                            emails.find('input[type="text"][id*="emailAddress"]:last').each(function(){
                                SUGAR.KeyboardSetting.handleField($(this));    
                            });      
                        });
                    }
                }
            }
        }); 
    }       
}

// Format target field value according to the correction type config
SUGAR.KeyboardSetting.handleField = function(targetField) {
    var form = targetField.closest('form');
    var formConfig = SUGAR.KeyboardSetting.config[form.attr('id')];
    if(!$.isEmptyObject(formConfig)) {
        var fieldName = (targetField.attr('name').indexOf('emailAddress') >= 0) ? 'email' : targetField.attr('name');
        var fieldConfig = formConfig[fieldName];
        if(!$.isEmptyObject(formConfig)) {
            var fieldVal = targetField.val();
            // Determine which correction type is used and then format the field according to the config
            var correctionType = fieldConfig.correction_type;
            if(correctionType == 'uppercase_all') {
                fieldVal = fieldVal.toUpperCase();
                
                // Make the user think that the value is uppercase at run-time
                targetField.css({'text-transform': 'uppercase'});    
            } else if(correctionType == 'initial_capital') {
                fieldVal = fieldVal.toLowerCase().replace(/^[\u00C0-\u1FFF\u2C00-\uD7FF\w]|\s[\u00C0-\u1FFF\u2C00-\uD7FF\w]/g, function(letter) {
                    return letter.toUpperCase();
                });
                
                // Make the user think that the value is initial at run-time
                targetField.css({'text-transform': 'capitalize'});
            } else {
                fieldVal = fieldVal.toLowerCase();
                
                // Make the user think that the value is lowercase at run-time
                targetField.css({'text-transform': 'lowercase'});
            }
            
            // Then set the formatted value into the target field
            targetField.val(fieldVal);  
        }        
    }               
}