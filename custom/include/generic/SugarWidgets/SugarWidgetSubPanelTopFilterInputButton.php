<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once('include/generic/SugarWidgets/SugarWidgetSubPanelTopButton.php');

    class SugarWidgetSubPanelTopFilterInputButton extends SugarWidgetSubPanelTopButton {
        
        function display(&$widget_data) {
            global $app_strings;
            
            $subpanel_definition = $widget_data['subpanel_definition'];
            $subpanel_name = $subpanel_definition->get_name();
            $module_name = ($_REQUEST['module']?$_REQUEST['module']:'');
            $id = ($_REQUEST['record']?$_REQUEST['record']:'');
            $prior_search_params[$subpanel_name] = trim($_REQUEST['search_params']?$_REQUEST['search_params']:'');
            
            $onclick = "current_child_field = '{$subpanel_name}';
            url='index.php?sugar_body_only=1&module={$module_name}&subpanel={$subpanel_name}&entryPoint=FilterSubpanel&inline=1&record={$id}&layout_def_key={$module_name}&search_params=' + escape(document.getElementById('filter_param_' + current_child_field).value) ;
            ajaxStatus.showStatus('{$app_strings['LBL_LOADING']}');
            setTimeout(function(){ showSubPanel('{$subpanel_name}',url,true,'{$module_name}'); }, 1);
            document.getElementById('show_link_{$subpanel_name}').style.display='none';
            document.getElementById('hide_link_{$subpanel_name}').style.display=''; 
            return false;";
            
            $button = '';
            $button .= "<form style='margin-left:20px'><input type='text' id='filter_param_{$subpanel_name}' name='search_params' value='{$prior_search_params[$subpanel_name]}'>";
            $button .= "<input type='submit' onclick=\"{$onclick}\" href='javascript:void(0)' value='{$app_strings['BTN_SUBPANEL_FILTER_TITLE']}'>";
            $button .= "<input type='submit' onclick=\"document.getElementById('filter_param_' + current_child_field).value = '';{$onclick}\" href='javascript:void(0)' value='{$app_strings['BTN_SUBPANEL_CLEAR_FILTER_TITLE']}'>";
            $button .= "</form>";

            return $button;

        }
    }
?>