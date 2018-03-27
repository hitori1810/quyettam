SUGAR.DuplicationDetection = {};
SUGAR.DuplicationDetection.config = [];   // Config array for all forms that have been marked as active 
SUGAR.DuplicationDetection.asynchronous = true;    // Load type
function ajaxCheckDuplication(){};     // Abstract fucntion

$(function(){
    
    // ALL VIEW: Load duplication detection config for the loaded quick create modal popup form when user click on quick create button on the top right corner
    $('#quickCreateULSubnav').find('li').find('a').click(function(){
        // Init the quick create popup form right after it is loaded
        SUGAR.util.doWhen(function(){
            return $('form[id*="form_DCQuickCreate"]')[0] != null;  
        }, function(){
            var form = $('form[id*="form_DCQuickCreate"]');
            initDuplicationDetection(form);    
        });    
    });
    
    // EDIT VIEW: Load duplication detection config for current module if the user is in the edit form
    if($('form#EditView')[0] != null) {
        var form = $('form#EditView');
        initDuplicationDetection(form);   
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
                initDuplicationDetection(form);    
            });    
        });
    }
    
    // Checking for duplication using ajax
    ajaxCheckDuplication = function(form) {
        var formId = form.attr('id');
        var noDuplication = true;
        
        // Check for duplication only if on of the target field's value is changed
        if(isValueChanged(form)) {
            // Call ajax to check for dupplication only if the config for this form exists
            if(SUGAR.DuplicationDetection.config[formId] != null) {
                form.find('.duplicationStatus').removeClass('duplicated verified');
                form.find('.duplicationStatus').addClass('loading');
                form.find('#tblDuplication').hide();
                var moduleName = form.find('input[name="module"]').val();
                var targetFields = SUGAR.DuplicationDetection.config[formId].targetFields;
                
                // Generating fields data
                var fieldData = {};
                for(i = 0; i < targetFields.length; i++) {
                    var targetFieldName = targetFields[i];
                    
                    if(targetFieldName != 'email') {
                        // Target field is a normal field
                        var targetFieldInput = form.find(':input[name="'+ targetFieldName +'"]');
                        
                        if(targetFieldInput[0] != null)     // Don't care the field that is not exist in the form    
                            fieldData[targetFieldName] = targetFieldInput.val().trim();
                    } else {
                        // Target field is email
                        var emails = form.find('.emailaddresses');
                        if(emails[0]) {
                            var selectedEmails = [];
                            emails.find('input[type="text"][id*="emailAddress"]').each(function(i){ 
                                selectedEmails[i] = $(this).val(); 
                            });
                            fieldData[targetFieldName] = selectedEmails;
                            // Need the record id to compare in the server side
                            fieldData['id'] = form.find('input[name="record"]').val();
                        }
                    }    
                }
                
                $.ajax({
                    'url': 'index.php?module=C_DuplicationDetection&action=ajaxcheckduplication&sugar_body_only=true',
                    'type': 'POST',
                    'async': SUGAR.DuplicationDetection.asynchronous,
                    'data': {
                        'moduleName': moduleName,
                        'fieldData': JSON.stringify(fieldData)
                    },
                    'success': function(duplication) {
                        form.find('.duplicationStatus').removeClass('loading');
                        
                        if(duplication != '') {
                            // Has duplication
                            form.find('.duplicationStatus').addClass('duplicated');
                            form.find('#dialogDuplication').find('#dialogContent').html(duplication);
                            form.find('#dialogDuplication').show();
                            noDuplication = false;    
                        } else {
                            // No duplication
                            form.find('.duplicationStatus').addClass('verified');
                            form.find('#dialogDuplication').hide();
                        }
                    }
                });
            }
        }
        
        return noDuplication;    
    }
    
    // Closing duplication dialog
    $('#btnCloseDialog').live('click', function(){
        var form = $(this).closest('form');
        form.find('#dialogDuplication').find('#dialogContent').html('');
        form.find('#dialogDuplication').hide();    
    });
});

// Load duplication detection config for the given module using ajax
function ajaxLoadDuplicationConfig(form) {
    var formId = form.attr('id');
    
    if(form.find('input[name="module"]')[0] != null) {
        var moduleName = form.find('input[name="module"]').val();
        
        // Call ajax to load dupplication config for this form if the module name is not empty
        if(moduleName != '') {
            $.ajax({
                'url': 'index.php?module=C_DuplicationDetection&action=ajaxloadconfig&sugar_body_only=true',
                'type': 'POST',
                'dataType': 'json',
                'data': {
                    'moduleName': moduleName
                },
                'success': function(config) {
                    if(config.targetFields != null) {           
                        SUGAR.DuplicationDetection.config[formId] = config;
                        var statusTitle = SUGAR.language.get('app_strings', 'LBL_DUPLICATION_STATUS_TITLE');
                        var duplicationStatus = '<span title="'+ statusTitle +'" class="duplicationStatus verified"></span>';

                        // Apply checking for duplication for all the target fields when their value are changed
                        var isFirstField = true;    // Indicate first field in the form, not first field in the target field list
                        for(i = 0; i < config.targetFields.length; i++) {
                            targetField = form.find(':input[name="'+ config.targetFields[i] +'"]');
                            if(targetField[0] != null) {
                                targetField.closest('td').append(duplicationStatus);
                                targetField.change(function(){
                                    SUGAR.DuplicationDetection.asynchronous = true;
                                    ajaxCheckDuplication(form);    
                                });
                                
                                if(isFirstField) {
                                    // Insert duplication dialog next to the first target field to show duplicated result
                                    var title = SUGAR.language.get('app_strings', 'LBL_DUPLICATION_DIALOG_TITLE');
                                    var holder = '<div id="dialogDuplication">';
                                    holder += '<div id="dialogTitle">'+ title +'<span id="btnCloseDialog"></span></div>';
                                    holder += '<div id="dialogContent"></div>';
                                    holder += '</div>';
                                    targetField.closest('td').append(holder);
                                    isFirstField = false; 
                                }
                                
                               /* // Data time is an complicated case. Separete it here
                                if(targetField.hasClass('DateTimeCombo')) {
                                    
                                } */
                            }  
                        }
                        
                        // Email is an complicated case. Separate it here
                        if($.inArray('email', config.targetFields) >= 0) {
                            var emails = form.find('.emailaddresses');
                            if(emails[0] != null) {
                                emails.closest('td').append(duplicationStatus);
                                // Bind change event for exsiting fields
                                emails.find('input[type="text"][id*="emailAddress"]').live('change', function(){
                                    SUGAR.DuplicationDetection.asynchronous = true;
                                    ajaxCheckDuplication(form);   
                                });
                                
                                // Bind change event for newly added field when the user click add email button
                                emails.find('button[id*="email_widget_add"]').click(function(){
                                    emails.find('input[type="text"][id*="emailAddress"]:last').live('change', function(){
                                        SUGAR.DuplicationDetection.asynchronous = true;
                                        ajaxCheckDuplication(form);   
                                    });      
                                });
                            }
                        }
                        
                        // Override submit button to inject duplication checking if the preventive type is notify_and_prevent 
                        if(config.preventiveType == 'notify_and_prevent') {
                            if(form.attr('id') == 'EditView') {
                                // In the EditView form
                                form.find('#SAVE_HEADER, #SAVE_FOOTER, #save_and_continue').each(function(){
                                    var curClickLogic = $(this).attr('onclick');
                                    $(this).attr('onclick', 'SUGAR.DuplicationDetection.asynchronous = false; if(!ajaxCheckDuplication($(this.form))) return false; ' + curClickLogic);
                                });
                            } else if(form.find('input[name*="subpanel_save_button"]')[0] != null) {
                                // In the QuickCreate form
                                form.find('input[name*="subpanel_save_button"]').each(function(){
                                    var curClickLogic = $(this).attr('onclick');
                                    $(this).attr('onclick', 'SUGAR.DuplicationDetection.asynchronous = false; if(!ajaxCheckDuplication($(this.form))) return false; ' + curClickLogic);
                                });
                            } else if(form.find('input[id*="dcmenu_save_button"]')[0] != null) {
                                // In the QuickCreate modal popup form
                                form.find('input[id*="dcmenu_save_button"]').each(function(){
                                    var curClickLogic = $(this).attr('onclick');
                                    $(this).attr('onclick', 'SUGAR.DuplicationDetection.asynchronous = false; if(!ajaxCheckDuplication($(this.form))) return false; ' + curClickLogic);
                                });
                            }
                        }
                    }
                }
            }); 
        }
    }       
}

// Init duplication checking for the given form
function initDuplicationDetection(form) {
    ajaxLoadDuplicationConfig(form);
    
    // Write all fields value into its db-data property so that we can compare them later
    form.find(':input').each(function(){
        $(this).attr('db-data', $(this).val());
    });
    
    // Write all selected email into their db-data property of their container
    SUGAR.util.doWhen(function(){
        return form.find('.emailaddresses')[0] != null;  
    }, function(){
        var emails = form.find('.emailaddresses');
        if(emails[0] != null) {
            var selectedEmails = [];
            emails.find('input[type="text"][id*="emailAddress"]').each(function(i){ 
                selectedEmails[i] = $(this).val(); 
            });
            emails.attr('db-data', selectedEmails.sort().join(','));  // Sort and then write 
        }   
    });
    
    // Override SugarWidgetScheduler.update_time if the date time fields is in the form
//    if(form.find('.DateTimeCombo')[0] != null) {
//        SugarWidgetScheduler.update_time = function (){
//            var form_name;if(typeof document.EditView!='undefined')
//            form_name="EditView";else if(typeof document.CalendarEditView!='undefined')
//            form_name="CalendarEditView";else
//            return;if(typeof document.forms[form_name].date_start=='undefined')
//            return;var date_start=document.forms[form_name].date_start.value;if(date_start.length<16){return;}
//            var hour_start=parseInt(date_start.substring(11,13),10);var minute_start=parseInt(date_start.substring(14,16),10);var has_meridiem=/am|pm/i.test(date_start);if(has_meridiem){var meridiem=trim(date_start.substring(16));}
//            GLOBAL_REGISTRY.focus.fields.date_start=date_start;if(has_meridiem){GLOBAL_REGISTRY.focus.fields.time_start=hour_start+time_separator+minute_start+meridiem;}else{GLOBAL_REGISTRY.focus.fields.time_start=hour_start+time_separator+minute_start;}
//            GLOBAL_REGISTRY.focus.fields.duration_hours=document.forms[form_name].duration_hours.value;GLOBAL_REGISTRY.focus.fields.duration_minutes=document.forms[form_name].duration_minutes.value;GLOBAL_REGISTRY.focus.fields.datetime_start=SugarDateTime.mysql2jsDateTime(GLOBAL_REGISTRY.focus.fields.date_start,GLOBAL_REGISTRY.focus.fields.time_start);GLOBAL_REGISTRY.scheduler_attendees_obj.init();GLOBAL_REGISTRY.scheduler_attendees_obj.display();
//            
//            // Custom code
//            $('#' + form_name).find('.DateTimeCombo').trigger('change');
//        }
//    }
}

// Check for duplication only if on of the target field's value is changed
function isValueChanged(form) {
    var valueChanged = false;
    
    var formId = form.attr('id');
    var targetFields = SUGAR.DuplicationDetection.config[formId].targetFields;
    for(i = 0; i < targetFields.length; i++) {
        targetField = form.find(':input[name="'+ targetFields[i] +'"]');
        if(targetField[0] != null) {
            var oldValue = targetField.attr('db-data');
            var curValue = targetField.val();
            if(oldValue != curValue) {
                valueChanged = true;      
                break;
            }
        }
    }
    
    // If email is applied for dupplication checking, check to see if their value are changed
    if($.inArray('email', targetFields) >= 0) {
        var emails = form.find('.emailaddresses');
        if(emails[0] != null) {
            var oldEmails = emails.attr('db-data');
            var curEmails = [];
            emails.find('input[type="text"][id*="emailAddress"]').each(function(i){ 
                curEmails[i] = $(this).val(); 
            });
            
            if(oldEmails != curEmails.sort().join(',')) // Sort the result to make sure they are in the same order 
                valueChanged = true; 
        }  
    }
    
    return valueChanged;           
}