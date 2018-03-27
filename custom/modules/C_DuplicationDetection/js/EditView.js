// Init the widget right after the data sources are exsit
SUGAR.util.doWhen(function(){
    return $('#applied_fields_col')[0] != null && $('#available_fields_col')[0] != null;
}, function(){
    initAppliedFieldsWidget();    
    initAvailableFieldsWidget();    
});   

$(function(){
    // Save target module value into its property when it is focused or clicked by the user
    $('#target_module').bind('focus, click', function(){
        $(this).attr('cur-data', $(this).val());    
    });
    
    // Changing target module
    $('#target_module').change(function(e){
        var targetModule = $(this).val();
        var appliedFields = getAppliedFields();
        
        if(appliedFields.length > 0) {
            // Alert user about missing data if the applied fields are already selected
            if(confirm(SUGAR.language.get('C_DuplicationDetection', 'LBL_TARGET_MODULE_CHANGE_CONFIRM_MSG'))) {
                // Load available field for the selected module
                ajaxLoadAvailableFields(targetModule);
            } else {
                // Restore value using the save data
                var curValue = $(this).attr('cur-data');
                $(this).val(curValue);
            }
        } else {
            // Load available field for the selected module
            ajaxLoadAvailableFields(targetModule);
        }
    });
    
    // Override submit buttons to inject saving applied fields logic
    $('.action_buttons').find('.button.primary').each(function(){
        var curClickLogic = $(this).attr('onclick');
        $(this).attr('onclick', 'SUGAR.saveAppliedFields(); ' + curClickLogic);
    });
});

// Load available field for the given module using ajax
function ajaxLoadAvailableFields(moduleName) {
    $.ajax({
        'url': 'index.php?module=C_DuplicationDetection&action=ajaxloadavailablefields&sugar_body_only=true',
        'type': 'POST',
        'dataType': 'json',
        'data': {
            'moduleName': moduleName
        },
        'success': function(fields) {   console.log(fields);           
            // Remove all fields from the applied fields widget
            SUGAR.appliedFieldsWidget.deleteRows(0, SUGAR.appliedFieldsWidget.getRecordSet().getLength());
            SUGAR.appliedFieldsWidget.addRow({field_name: "", label: ""});
            SUGAR.appliedFieldsWidget.render();
            
            // Remove all fields from the available fields widget and then add received fields into the available fields widget
            SUGAR.availableFieldsWidget.deleteRows(0, SUGAR.availableFieldsWidget.getRecordSet().getLength());
            SUGAR.availableFieldsWidget.addRows(fields);    
        }
    });        
}

// Init applied field widget
function initAppliedFieldsWidget() {
    SUGAR.appliedFieldsWidget = new YAHOO.SUGAR.DragDropTable(
        'applied_fields_col',
        [{key:"label", label: lblAppliedFields, width: 200, sortable: false},
         {key:"field_name", label: lblAppliedFields, hidden:true}],
        new YAHOO.util.LocalDataSource(appliedFields, {
            responseSchema: {
               resultsList : "fields",
               fields : [{key : "field_name"}, {key : "label"}]
            }
        }), 
        {
            height: "300px",
            group: ["applied_fields_col", "available_fields_col"]
        }
    );
    SUGAR.appliedFieldsWidget.disableEmptyRows = true;
    SUGAR.appliedFieldsWidget.addRow({field_name: "", label: ""});
    SUGAR.appliedFieldsWidget.render();
}

// Init available fields widget. This is similar with the previous function but can not be merged.
function initAvailableFieldsWidget() {
    SUGAR.availableFieldsWidget = new YAHOO.SUGAR.DragDropTable(
        'available_fields_col',
        [{key:"label", label: lblAvailableFields, width: 200, sortable: false},
         {key:"field_name", label: lblAvailableFields, hidden:true}],
        new YAHOO.util.LocalDataSource(availableFields, {
            responseSchema: {
               resultsList : "fields",
               fields : [{key : "field_name"}, {key : "label"}]
            }
        }), 
        {
            height: "300px",
            group: ["applied_fields_col", "available_fields_col"]
        }
    );
    SUGAR.availableFieldsWidget.disableEmptyRows = true;
    SUGAR.availableFieldsWidget.addRow({field_name: "", label: ""});
    SUGAR.availableFieldsWidget.render();
}

// Get selected fields from applied fields widget
function getAppliedFields() {
    var appliedFieldsSet = SUGAR.appliedFieldsWidget.getRecordSet();
    var fields = [];
    for(var i=0; i < appliedFieldsSet.getLength(); i++){
        var data = appliedFieldsSet.getRecord(i).getData();
        if (data.field_name && data.field_name != '')
            fields[i] = data.field_name;
    }
    
    return fields;    
}

// Save applied field from the widget
SUGAR.saveAppliedFields = function() {
    var fields = getAppliedFields();
    
    var selectedFields = '';
    if(fields.length > 0) selectedFields = YAHOO.lang.JSON.stringify(fields);        

    YAHOO.util.Dom.get('target_fields').value = selectedFields;
}