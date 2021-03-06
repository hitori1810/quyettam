<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
* By installing or using this file, you are confirming on behalf of the entity
* subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
* the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
* http://www.sugarcrm.com/master-subscription-agreement
*
* If Company is not bound by the MSA, then by installing or using this file
* you are agreeing unconditionally that Company will be bound by the MSA and
* certifying that you have authority to bind Company accordingly.
*
* Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
********************************************************************************/

/*********************************************************************************

* Description: view handler for step 2 of the import process
* Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
* All Rights Reserved.
********************************************************************************/

require_once('modules/Import/views/ImportView.php');


class ImportViewStep2 extends ImportView
{
    protected $pageTitleKey = 'LBL_STEP_2_TITLE';


    /**
    * @see SugarView::display()
    */
    public function display()
    {
        global $mod_strings, $app_list_strings, $app_strings, $current_user, $import_bean_map, $import_mod_strings;

        $this->instruction = 'LBL_SELECT_UPLOAD_INSTRUCTION';
        $this->ss->assign('INSTRUCTION', $this->getInstruction());

        $this->ss->assign("MODULE_TITLE", $this->getModuleTitle(false));
        $this->ss->assign("IMP", $import_mod_strings);
        $this->ss->assign("CURRENT_STEP", $this->currentStep);
        $this->ss->assign("TYPE",( !empty($_REQUEST['type']) ? $_REQUEST['type'] : "import" ));
        $this->ss->assign("CUSTOM_DELIMITER", ( !empty($_REQUEST['custom_delimiter']) ? $_REQUEST['custom_delimiter'] : "," ));
        $this->ss->assign("CUSTOM_ENCLOSURE",htmlentities(
            ( !empty($_REQUEST['custom_enclosure']) && $_REQUEST['custom_enclosure'] != 'other'
                ? $_REQUEST['custom_enclosure'] :
                ( !empty($_REQUEST['custom_enclosure_other'])
                    ? $_REQUEST['custom_enclosure_other'] : "" ) )));

        $this->ss->assign("IMPORT_MODULE", $_REQUEST['import_module']);
        $this->ss->assign("HEADER", $app_strings['LBL_IMPORT']." ". $mod_strings['LBL_MODULE_NAME']);
        $this->ss->assign("JAVASCRIPT", $this->_getJS());
        if($_REQUEST['import_module'] == 'Leads'){
            $download_url = 'custom/uploads/TemplateImport/Template_Import_Lead.xlsx';
        }elseif($_REQUEST['import_module'] == 'Contacts'){
            $download_url = 'custom/uploads/TemplateImport/Template_Import_Student.xlsx';
        }elseif($_REQUEST['import_module'] == 'J_School'){
            $download_url = 'custom/uploads/TemplateImport/Template_Import_School.xlsx';
        }else
            $download_url = "index.php?entryPoint=export&module=".$_REQUEST['import_module']."&action=index&all=true&sample=true";
        //Get file Standard File import - By Lap Nguyen

        $this->ss->assign("SAMPLE_URL", "<a href=\"javascript: void(0);\" onclick=\"window.location.href='$download_url'\" >".$mod_strings['LBL_EXAMPLE_FILE']."</a>");

        $displayBackBttn = isset($_REQUEST['action']) && $_REQUEST['action'] == 'Step2' && isset($_REQUEST['current_step']) && $_REQUEST['current_step']!=='2'? TRUE : FALSE; //bug 51239
        $this->ss->assign("displayBackBttn", $displayBackBttn);

        // get user defined import maps
        $is_admin = is_admin($current_user);
        if($is_admin)
            $savedMappingHelpText = $mod_strings['LBL_MY_SAVED_ADMIN_HELP'];
        else
            $savedMappingHelpText = $mod_strings['LBL_MY_SAVED_HELP'];

        $this->ss->assign('savedMappingHelpText',$savedMappingHelpText);
        $this->ss->assign('is_admin',$is_admin);

        $import_map_seed = new ImportMap();
        $custom_imports_arr = $import_map_seed->retrieve_all_by_string_fields( array('assigned_user_id' => $current_user->id, 'is_published' => 'no','module' => $_REQUEST['import_module']));

        if( count($custom_imports_arr) )
        {
            $custom = array();
            foreach ( $custom_imports_arr as $import)
            {
                $custom[] = array( "IMPORT_NAME" => $import->name,"IMPORT_ID"   => $import->id);
            }
            $this->ss->assign('custom_imports',$custom);
        }

        // get globally defined import maps
        $published_imports_arr = $import_map_seed->retrieve_all_by_string_fields(array('is_published' => 'yes', 'module' => $_REQUEST['import_module'],) );
        if ( count($published_imports_arr) )
        {
            $published = array();
            foreach ( $published_imports_arr as $import)
            {
                $published[] = array("IMPORT_NAME" => $import->name, "IMPORT_ID"   => $import->id);
            }
            $this->ss->assign('published_imports',$published);
        }
        //End custom mapping
        //Edit Add by Tung Bui - 24/01/2017 - Add logic default mapping record
        $defaultMappingRecord = "";
        $admin = new Administration();  
        $admin->retrieveSettings();
        switch($this->importModule){
            case "Leads":
                $defaultMappingRecord = $admin->settings['wellspring_default_mapping_lead'];
                break;
            case "C_Parent":
                $defaultMappingRecord = $admin->settings['wellspring_default_mapping_parent'];
                break;
        }
        if($defaultMappingRecord == "none") $defaultMappingRecord = "";
        $this->ss->assign('DEFAULT_MAPPING_RECORD',$defaultMappingRecord);
        //END - Edit Add by Tung Bui - 24/01/2017
        // add instructions for anything other than custom_delimited
        $instructions = array();
        $lang_key = "CUSTOM";

        for ($i = 1; isset($mod_strings["LBL_{$lang_key}_NUM_$i"]);$i++)
        {
            $instructions[] = array(
                "STEP_NUM"         => $mod_strings["LBL_NUM_$i"],
                "INSTRUCTION_STEP" => $mod_strings["LBL_{$lang_key}_NUM_$i"],
            );
        }
        $this->ss->assign("INSTRUCTIONS_TITLE",$mod_strings["LBL_IMPORT_{$lang_key}_TITLE"]);
        $this->ss->assign("instructions",$instructions);

        $content = $this->ss->fetch('modules/Import/tpls/step2.tpl');
        $this->ss->assign("CONTENT",$content);
        $this->ss->display('modules/Import/tpls/wizardWrapper.tpl');
    }

    /**
    * Returns JS used in this view
    */
    private function _getJS()
    {
        global $mod_strings;

        return <<<EOJAVASCRIPT

if( document.getElementById('goback') )
{
    document.getElementById('goback').onclick = function()
    {
        document.getElementById('importstep2').action.value = 'Step1';
        return true;
    }
}

document.getElementById('gonext').onclick = function(){
    // warning message that tells user that updates can not be undone
    if(document.getElementById('import_update').checked)
    {
        ret = confirm(SUGAR.language.get("Import", 'LBL_CONFIRM_IMPORT'));
        if (!ret) {
            return false;
        }
    }
    clear_all_errors();
    var isError = false;
    // be sure we specify a file to upload
    if (document.getElementById('importstep2').userfile.value == "") {
        add_error_style(document.getElementById('importstep2').name,'userfile',"{$mod_strings['ERR_MISSING_REQUIRED_FIELDS']} {$mod_strings['ERR_SELECT_FILE']}");
        isError = true;
    }

    return !isError;

}

function publishMapping(elem, publish, mappingId)
{
    if( typeof(elem.publish) != 'undefined' )
        publish = elem.publish;

    var url = 'index.php?action=mapping&module=Import&publish=' + publish + '&import_map_id=' + mappingId;
    var callback = {
                        success: function(o)
                        {
                            var r = YAHOO.lang.JSON.parse(o.responseText);
                            if( r.message != '')
                                alert(r.message);
                        },
                        failure: function(o) {}
                   };
    YAHOO.util.Connect.asyncRequest('GET', url, callback);
    //Toggle the button title
    if(publish == 'yes')
    {
        var newTitle = SUGAR.language.get('Import','LBL_UNPUBLISH');
        var newPublish = 'no';
    }
    else
    {
        var newTitle = SUGAR.language.get('Import','LBL_PUBLISH');
        var newPublish = 'yes';
    }

    elem.value = newTitle;
    elem.publish = newPublish;

}
function deleteMapping(elemId, mappingId )
{
    var elem = document.getElementById(elemId);
    var table = elem.parentNode;
    table.deleteRow(elem.rowIndex);

    var url = 'index.php?action=mapping&module=Import&delete_map_id=' + mappingId;
    var callback = {
                        success: function(o)
                        {
                            var r = YAHOO.lang.JSON.parse(o.responseText);
                            if( r.message != '')
                                alert(r.message);
                        },
                        failure: function(o) {}
                   };
    YAHOO.util.Connect.asyncRequest('GET', url, callback);
}
var deselectEl = document.getElementById('deselect');
if(deselectEl)
{
    deselectEl.onclick = function() {
        var els = document.getElementsByName('source');
        for(i=0;i<els.length;i++)
        {
            els[i].checked = false;
        }
    }
}

EOJAVASCRIPT;
    }
}


