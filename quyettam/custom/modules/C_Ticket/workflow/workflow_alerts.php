<?php

include_once("include/workflow/alert_utils.php");
    class C_Ticket_alerts {
    function process_wflow_C_Ticket0_alert0(&$focus){
            include("custom/modules/C_Ticket/workflow/alerts_array.php");

	 $alertshell_array = array(); 

	 $alertshell_array['alert_msg'] = "a0c50e60-04c6-f4d7-a3bf-5518b145546e"; 

	 $alertshell_array['source_type'] = "Custom Template"; 

	 $alertshell_array['alert_type'] = "Email"; 

	 process_workflow_alerts($focus, $alert_meta_array['C_Ticket0_alert0'], $alertshell_array, false); 
 	 unset($alertshell_array); 
	 }



    //end class
    }

?>