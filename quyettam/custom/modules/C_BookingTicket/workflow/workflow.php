<?php

include_once("include/workflow/alert_utils.php");
include_once("include/workflow/action_utils.php");
include_once("include/workflow/time_utils.php");
include_once("include/workflow/trigger_utils.php");
//BEGIN WFLOW PLUGINS
include_once("include/workflow/custom_utils.php");
//END WFLOW PLUGINS
	class C_BookingTicket_workflow {
	function process_wflow_triggers(& $focus){
		include("custom/modules/C_BookingTicket/workflow/triggers_array.php");
		include("custom/modules/C_BookingTicket/workflow/alerts_array.php");
		include("custom/modules/C_BookingTicket/workflow/actions_array.php");
		include("custom/modules/C_BookingTicket/workflow/plugins_array.php");
		
 if( ( isset($focus->assigned_user_id) && ( empty($focus->fetched_row) || array_key_exists('assigned_user_id', $focus->fetched_row) ) && $focus->fetched_row['assigned_user_id'] !== $focus->assigned_user_id) ){ 
 

	 //Frame Secondary 

	 $secondary_array = array(); 
	 //Secondary Triggers 

	global $triggeredWorkflows;
	if (!isset($triggeredWorkflows['d57b84e4_42b8_9284_6397_55a3745c870c'])){
		$triggeredWorkflows['d57b84e4_42b8_9284_6397_55a3745c870c'] = true;
		$_SESSION['WORKFLOW_ALERTS'] = isset($_SESSION['WORKFLOW_ALERTS']) && is_array($_SESSION['WORKFLOW_ALERTS']) ? $_SESSION['WORKFLOW_ALERTS'] : array();
		$_SESSION['WORKFLOW_ALERTS']['C_BookingTicket'] = isset($_SESSION['WORKFLOW_ALERTS']['C_BookingTicket']) && is_array($_SESSION['WORKFLOW_ALERTS']['C_BookingTicket']) ? $_SESSION['WORKFLOW_ALERTS']['C_BookingTicket'] : array();
		$_SESSION['WORKFLOW_ALERTS']['C_BookingTicket'] = array_merge($_SESSION['WORKFLOW_ALERTS']['C_BookingTicket'],array ('C_BookingTicket0_alert0',));	}
 

	 //End Frame Secondary 

	 unset($secondary_array); 
 

 //End if trigger is true 
 } 


 if( ( isset($focus->user_sale_id) && ( empty($focus->fetched_row) || array_key_exists('user_sale_id', $focus->fetched_row) ) && $focus->fetched_row['user_sale_id'] !== $focus->user_sale_id) ){ 
 

	 //Frame Secondary 

	 $secondary_array = array(); 
	 //Secondary Triggers 

	global $triggeredWorkflows;
	if (!isset($triggeredWorkflows['d5ea6e05_a5b9_f531_9a37_55a374d3d5ab'])){
		$triggeredWorkflows['d5ea6e05_a5b9_f531_9a37_55a374d3d5ab'] = true;
		$_SESSION['WORKFLOW_ALERTS'] = isset($_SESSION['WORKFLOW_ALERTS']) && is_array($_SESSION['WORKFLOW_ALERTS']) ? $_SESSION['WORKFLOW_ALERTS'] : array();
		$_SESSION['WORKFLOW_ALERTS']['C_BookingTicket'] = isset($_SESSION['WORKFLOW_ALERTS']['C_BookingTicket']) && is_array($_SESSION['WORKFLOW_ALERTS']['C_BookingTicket']) ? $_SESSION['WORKFLOW_ALERTS']['C_BookingTicket'] : array();
		$_SESSION['WORKFLOW_ALERTS']['C_BookingTicket'] = array_merge($_SESSION['WORKFLOW_ALERTS']['C_BookingTicket'],array ('C_BookingTicket1_alert0',));	}
 

	 //End Frame Secondary 

	 unset($secondary_array); 
 

 //End if trigger is true 
 } 


	//end function process_wflow_triggers
	}

	//end class
	}

?>