<?php

include_once("include/workflow/alert_utils.php");
include_once("include/workflow/action_utils.php");
include_once("include/workflow/time_utils.php");
include_once("include/workflow/trigger_utils.php");
//BEGIN WFLOW PLUGINS
include_once("include/workflow/custom_utils.php");
//END WFLOW PLUGINS
	class Accounts_workflow {
	function process_wflow_triggers(& $focus){
		include("custom/modules/Accounts/workflow/triggers_array.php");
		include("custom/modules/Accounts/workflow/alerts_array.php");
		include("custom/modules/Accounts/workflow/actions_array.php");
		include("custom/modules/Accounts/workflow/plugins_array.php");
		
 if( ( isset($focus->assigned_user_id) && ( empty($focus->fetched_row) || array_key_exists('assigned_user_id', $focus->fetched_row) ) && $focus->fetched_row['assigned_user_id'] !== $focus->assigned_user_id) ){ 
 

	 //Frame Secondary 

	 $secondary_array = array(); 
	 //Secondary Triggers 

	global $triggeredWorkflows;
	if (!isset($triggeredWorkflows['7bf7a1f5_aef2_eea3_3c0c_55a374a59ea3'])){
		$triggeredWorkflows['7bf7a1f5_aef2_eea3_3c0c_55a374a59ea3'] = true;
		$_SESSION['WORKFLOW_ALERTS'] = isset($_SESSION['WORKFLOW_ALERTS']) && is_array($_SESSION['WORKFLOW_ALERTS']) ? $_SESSION['WORKFLOW_ALERTS'] : array();
		$_SESSION['WORKFLOW_ALERTS']['Accounts'] = isset($_SESSION['WORKFLOW_ALERTS']['Accounts']) && is_array($_SESSION['WORKFLOW_ALERTS']['Accounts']) ? $_SESSION['WORKFLOW_ALERTS']['Accounts'] : array();
		$_SESSION['WORKFLOW_ALERTS']['Accounts'] = array_merge($_SESSION['WORKFLOW_ALERTS']['Accounts'],array ('Accounts0_alert0',));	}
 

	 //End Frame Secondary 

	 unset($secondary_array); 
 

 //End if trigger is true 
 } 


	//end function process_wflow_triggers
	}

	//end class
	}

?>