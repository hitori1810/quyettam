<?php

include_once("include/workflow/alert_utils.php");
    class Tasks_alerts {
    function process_wflow_Tasks0_alert0(&$focus){
            include("custom/modules/Tasks/workflow/alerts_array.php");

	 $alertshell_array = array(); 

	 $alertshell_array['alert_msg'] = "d46e5704-4a49-d71e-ee91-553871fab1d5"; 

	 $alertshell_array['source_type'] = "Custom Template"; 

	 $alertshell_array['alert_type'] = "Email"; 

	 process_workflow_alerts($focus, $alert_meta_array['Tasks0_alert0'], $alertshell_array, false); 
 	 unset($alertshell_array); 
	 }



    //end class
    }

?>