<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');
/**
 * 
 * LICENSE: The contents of this file are subject to the license agreement ("License") which is included
 * in the installation package (LICENSE.txt). By installing or using this file, you have unconditionally
 * agreed to the terms and conditions of the License, and you may not use this file except in compliance
 * with the License.
 *
 * @author     Original Author Biztech Co.
 */


require_once('include/MVC/View/views/view.list.php');

class ProspectListsViewList extends ViewList {

    public function preDisplay() {

        parent::preDisplay();
        $this->lv->targetList = true;
        require_once('custom/include/modules/Administration/plugin.php');
        $checkSurveySubscription = validateSurveySubscription();
        if (!$checkSurveySubscription['success']) {
            
        } else {
            $this->lv->actionsMenuExtraItems[] = $this->buildMyMenuItem();
        }
    }

    protected function buildMyMenuItem() {
        global $app_strings, $current_user;
        echo '<link rel="stylesheet" type="text/css" href="custom/include/css/survey_css/survey.css">';
        echo '<link rel="stylesheet" type="text/css" href="custom/include/css/survey_css/jquery.datetimepicker.css">';
        echo '<script type="text/javascript" src="custom/include/js/survey_js/custom_code.js">';
        $module_name = (!empty($_REQUEST['module'])) ? $_REQUEST['module'] : $this->module;
        return "<a id='send_survey' onclick=\"getListRecords('{$module_name}');\">Send Survey</a>";
    }

}
