<?php

include_once("include/workflow/alert_utils.php");
    class Meetings_alerts {
    function process_wflow_Meetings0_alert0(&$focus){
            include("custom/modules/Meetings/workflow/alerts_array.php");

	 $alertshell_array = array(); 

	 $alertshell_array['alert_msg'] = "d5dc80e0-aae4-1840-0d5b-553870675658"; 

	 $alertshell_array['source_type'] = "Custom Template"; 

	 $alertshell_array['alert_type'] = "Email"; 

	 process_workflow_alerts($focus, $alert_meta_array['Meetings0_alert0'], $alertshell_array, false); 
 	 unset($alertshell_array); 
	 }



    //end class
    }

?>