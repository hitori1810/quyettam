var KeyboardSetting = {};
KeyboardSetting.emptyRow = {field_name: '', label: '', correction_type: ''};

// Init the widget right after the data sources are exsit
SUGAR.util.doWhen(function(){
    return appliedFields != null && availableFields != null;
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
    
    // Showing correction type options
    $('#appliedFieldCol').find('.correctionType').live('click', function(e){
        e.stopPropagation();
        $(this).next('.correctionTypeOptions').slideDown('fast');
    });
    
    // Changing correction type option
    $('#appliedFieldCol').find('.correctionTypeOptions').find('li').live('click', function(e){
        e.stopPropagation();
        var row = $(this).closest('tr');
        var selectedIndex = $(this).closest('tbody').find('tr').index(row);
        var selectedValue = $(this).attr('data-key');
        var recordSet = SUGAR.appliedFieldsWidget.getRecordSet();
        var selectedRecord = recordSet.getRecord(selectedIndex);
        
        // Update selected value into the current record
        recordSet.updateRecordValue(selectedRecord, 'correction_type', selectedValue);
        $(this).slideUp();
        SUGAR.appliedFieldsWidget.refreshView();
    });
    
    // Hide all the option popup when user click on the page body
    $('body').click(function(){
        $('.correctionTypeOptions').hide();
    });
});

// Load available field for the given module using ajax
function ajaxLoadAvailableFields(moduleName) {
    $.ajax({
        'url': 'index.php?module=C_KeyboardSetting&action=ajaxloadavailablefields&sugar_body_only=true',
        'type': 'POST',
        'dataType': 'json',
        'data': {
            'moduleName': moduleName
        },
        'success': function(fields) {   console.log(fields);           
            // Remove all fields from the applied fields widget
            SUGAR.appliedFieldsWidget.deleteRows(0, SUGAR.appliedFieldsWidget.getRecordSet().getLength());
            SUGAR.appliedFieldsWidget.addRow(KeyboardSetting.emptyRow);
            SUGAR.appliedFieldsWidget.render();
            
            // Remove all fields from the available fields widget and then add received fields into the available fields widget
            SUGAR.availableFieldsWidget.deleteRows(0, SUGAR.availableFieldsWidget.getRecordSet().getLength());
            SUGAR.availableFieldsWidget.addRows(fields);    
        }
    });        
}

// Init applied field widget
function initAppliedFieldsWidget() {
    // Formatter for showing correction type column
    YAHOO.widget.DataTable.Formatter.correctionType = function(elLiner, oRecord, oColumn, oData) {
        if(oRecord.getData('field_name') != '') {   // Don't render empty row
            var selectedOption = (oData != null) ? correctionTypeOptions[oData] : correctionTypeOptions['uppercase_all'];
            var view = '<div class="correctionTypeHolder">';
            view += '<input type="text" style="width:120px" class="correctionType" value="'+ selectedOption +'" readonly/>';
            view += '<ul style="display:none" class="correctionTypeOptions">';
            for(key in correctionTypeOptions) {
                view += '<li data-key="'+ key +'">'+ correctionTypeOptions[key] +'</li>';   
            }
            view += '</ul>';
            view += '</div>';
            
            elLiner.innerHTML = view;
        }
    };
    
    SUGAR.appliedFieldsWidget = new YAHOO.SUGAR.DragDropTable(
        'appliedFieldCol',
        [{key:"label", label: lblAppliedField, width: 200, sortable: false},
         {key:"field_name", label: lblAppliedFieldName, width: 200},
         {key:"correction_type", label: lblAppliedCorrectionType, width: 150, formatter: 'correctionType'}],
        new YAHOO.util.LocalDataSource(appliedFields, {
            responseSchema: {
               resultsList : "fields",
               fields : [{key: 'field_name'}, {key: 'label'}, {key: 'correction_type'}]
            }
        }), 
        {
            width: '600px',
            height: "300px",
            group: ["appliedFieldCol", "availableFieldCol"]
        }
    );
    SUGAR.appliedFieldsWidget.disableEmptyRows = true;
    SUGAR.appliedFieldsWidget.addRow(KeyboardSetting.emptyRow);
    SUGAR.appliedFieldsWidget.render();
}

// Init available fields widget. This is similar with the previous function but can not be merged.
function initAvailableFieldsWidget() {
    SUGAR.availableFieldsWidget = new YAHOO.SUGAR.DragDropTable(
        'availableFieldCol',
        [{key:"label", label: lblAvailableFields, width: 200, sortable: false},
         {key:"field_name", label: lblAvailableFields, hidden:true},
         {key:"correction_type", label: lblAppliedCorrectionType, hidden:true}],
        new YAHOO.util.LocalDataSource(availableFields, {
            responseSchema: {
               resultsList : "fields",
               fields : [{key: 'field_name'}, {key: 'label'}, {key: 'correction_type'}]
            }
        }), 
        {
            height: "300px",
            group: ["appliedFieldCol", "availableFieldCol"]
        }
    );
    SUGAR.availableFieldsWidget.disableEmptyRows = true;
    SUGAR.availableFieldsWidget.addRow(KeyboardSetting.emptyRow);
    SUGAR.availableFieldsWidget.render();
}

// Get selected fields from applied fields widget
function getAppliedFields() {
    var appliedFieldsSet = SUGAR.appliedFieldsWidget.getRecordSet();
    var fields = {};
    for(var i=0; i < appliedFieldsSet.getLength(); i++){
        var data = appliedFieldsSet.getRecord(i).getData();
        if (data.field_name && data.field_name != '') {
            var field = {};
            field.field_name = data.field_name;
            field.correction_type = data.correction_type;
            fields[data.field_name] = field;
        }
    }
    
    return fields;    
}

// Save applied field from the widget
SUGAR.saveAppliedFields = function() {
    var fields = getAppliedFields();
    
    var selectedFields = '';
    if(!$.isEmptyObject(fields)) selectedFields = YAHOO.lang.JSON.stringify(fields);        

    YAHOO.util.Dom.get('target_fields').value = selectedFields;
}