<?php

include_once("include/workflow/alert_utils.php");
include_once("include/workflow/action_utils.php");
include_once("include/workflow/time_utils.php");
include_once("include/workflow/trigger_utils.php");
//BEGIN WFLOW PLUGINS
include_once("include/workflow/custom_utils.php");
//END WFLOW PLUGINS
	class Meetings_workflow {
	function process_wflow_triggers(& $focus){
		include("custom/modules/Meetings/workflow/triggers_array.php");
		include("custom/modules/Meetings/workflow/alerts_array.php");
		include("custom/modules/Meetings/workflow/actions_array.php");
		include("custom/modules/Meetings/workflow/plugins_array.php");
		
 if( ( isset($focus->assigned_user_id) && ( empty($focus->fetched_row) || array_key_exists('assigned_user_id', $focus->fetched_row) ) && $focus->fetched_row['assigned_user_id'] !== $focus->assigned_user_id) ){ 
 

	 //Frame Secondary 

	 $secondary_array = array(); 
	 //Secondary Triggers 

	global $triggeredWorkflows;
	if (!isset($triggeredWorkflows['6ea32be4_abc2_fde4_a36e_55a374698037'])){
		$triggeredWorkflows['6ea32be4_abc2_fde4_a36e_55a374698037'] = true;
		$_SESSION['WORKFLOW_ALERTS'] = isset($_SESSION['WORKFLOW_ALERTS']) && is_array($_SESSION['WORKFLOW_ALERTS']) ? $_SESSION['WORKFLOW_ALERTS'] : array();
		$_SESSION['WORKFLOW_ALERTS']['Meetings'] = isset($_SESSION['WORKFLOW_ALERTS']['Meetings']) && is_array($_SESSION['WORKFLOW_ALERTS']['Meetings']) ? $_SESSION['WORKFLOW_ALERTS']['Meetings'] : array();
		$_SESSION['WORKFLOW_ALERTS']['Meetings'] = array_merge($_SESSION['WORKFLOW_ALERTS']['Meetings'],array ('Meetings0_alert0',));	}
 

	 //End Frame Secondary 

	 unset($secondary_array); 
 

 //End if trigger is true 
 } 


	//end function process_wflow_triggers
	}

	//end class
	}

?>