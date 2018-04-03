<?php

include_once("include/workflow/alert_utils.php");
include_once("include/workflow/action_utils.php");
include_once("include/workflow/time_utils.php");
include_once("include/workflow/trigger_utils.php");
//BEGIN WFLOW PLUGINS
include_once("include/workflow/custom_utils.php");
//END WFLOW PLUGINS
	class Leads_workflow {
	function process_wflow_triggers(& $focus){
		include("custom/modules/Leads/workflow/triggers_array.php");
		include("custom/modules/Leads/workflow/alerts_array.php");
		include("custom/modules/Leads/workflow/actions_array.php");
		include("custom/modules/Leads/workflow/plugins_array.php");
		
 if( ( isset($focus->assigned_user_id) && ( empty($focus->fetched_row) || array_key_exists('assigned_user_id', $focus->fetched_row) ) && $focus->fetched_row['assigned_user_id'] !== $focus->assigned_user_id) ){ 
 

	 //Frame Secondary 

	 $secondary_array = array(); 
	 //Secondary Triggers 

	global $triggeredWorkflows;
	if (!isset($triggeredWorkflows['e1f86b98_4bcd_c714_43c2_55a375c2fe05'])){
		$triggeredWorkflows['e1f86b98_4bcd_c714_43c2_55a375c2fe05'] = true;
		 $alertshell_array = array(); 

	 $alertshell_array['alert_msg'] = "31975783-0315-e18e-df68-553862478709"; 

	 $alertshell_array['source_type'] = "Custom Template"; 

	 $alertshell_array['alert_type'] = "Email"; 

	 process_workflow_alerts($focus, $alert_meta_array['Leads0_alert0'], $alertshell_array, false); 
 	 $alertshell_array = array(); 

	 $alertshell_array['alert_msg'] = "bb80c05c-493d-a821-d42c-55a375855cb8"; 

	 $alertshell_array['source_type'] = "Custom Template"; 

	 $alertshell_array['alert_type'] = "Email"; 

	 process_workflow_alerts($focus, $alert_meta_array['Leads0_alert1'], $alertshell_array, false); 
 	 unset($alertshell_array); 
		}
 

	 //End Frame Secondary 

	 unset($secondary_array); 
 

 //End if trigger is true 
 } 


	//end function process_wflow_triggers
	}

	//end class
	}

?>