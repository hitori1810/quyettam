<?php

include_once("include/workflow/alert_utils.php");
include_once("include/workflow/action_utils.php");
include_once("include/workflow/time_utils.php");
include_once("include/workflow/trigger_utils.php");
//BEGIN WFLOW PLUGINS
include_once("include/workflow/custom_utils.php");
//END WFLOW PLUGINS
	class Tasks_workflow {
	function process_wflow_triggers(& $focus){
		include("custom/modules/Tasks/workflow/triggers_array.php");
		include("custom/modules/Tasks/workflow/alerts_array.php");
		include("custom/modules/Tasks/workflow/actions_array.php");
		include("custom/modules/Tasks/workflow/plugins_array.php");
		
 if( ( isset($focus->assigned_user_id) && ( empty($focus->fetched_row) || array_key_exists('assigned_user_id', $focus->fetched_row) ) && $focus->fetched_row['assigned_user_id'] !== $focus->assigned_user_id) ){ 
 

	 //Frame Secondary 

	 $secondary_array = array(); 
	 //Secondary Triggers 

	global $triggeredWorkflows;
	if (!isset($triggeredWorkflows['8c1c2cb2_4663_3099_b1ce_55a37498caa7'])){
		$triggeredWorkflows['8c1c2cb2_4663_3099_b1ce_55a37498caa7'] = true;
		$_SESSION['WORKFLOW_ALERTS'] = isset($_SESSION['WORKFLOW_ALERTS']) && is_array($_SESSION['WORKFLOW_ALERTS']) ? $_SESSION['WORKFLOW_ALERTS'] : array();
		$_SESSION['WORKFLOW_ALERTS']['Tasks'] = isset($_SESSION['WORKFLOW_ALERTS']['Tasks']) && is_array($_SESSION['WORKFLOW_ALERTS']['Tasks']) ? $_SESSION['WORKFLOW_ALERTS']['Tasks'] : array();
		$_SESSION['WORKFLOW_ALERTS']['Tasks'] = array_merge($_SESSION['WORKFLOW_ALERTS']['Tasks'],array ('Tasks0_alert0',));	}
 

	 //End Frame Secondary 

	 unset($secondary_array); 
 

 //End if trigger is true 
 } 


	//end function process_wflow_triggers
	}

	//end class
	}

?>