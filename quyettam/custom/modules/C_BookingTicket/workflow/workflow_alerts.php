<?php

include_once("include/workflow/alert_utils.php");
    class C_BookingTicket_alerts {
    function process_wflow_C_BookingTicket0_alert0(&$focus){
            include("custom/modules/C_BookingTicket/workflow/alerts_array.php");

	 $alertshell_array = array(); 

	 $alertshell_array['alert_msg'] = "a5ea65e3-7992-1b5f-c6e2-551530fb4615"; 

	 $alertshell_array['source_type'] = "Custom Template"; 

	 $alertshell_array['alert_type'] = "Email"; 

	 process_workflow_alerts($focus, $alert_meta_array['C_BookingTicket0_alert0'], $alertshell_array, false); 
 	 unset($alertshell_array); 
	 }

function process_wflow_C_BookingTicket1_alert0(&$focus){
            include("custom/modules/C_BookingTicket/workflow/alerts_array.php");

	 $alertshell_array = array(); 

	 $alertshell_array['alert_msg'] = "55a3da9e-289d-e621-f280-5555b4750ac2"; 

	 $alertshell_array['source_type'] = "Custom Template"; 

	 $alertshell_array['alert_type'] = "Email"; 

	 process_workflow_alerts($focus, $alert_meta_array['C_BookingTicket1_alert0'], $alertshell_array, false); 
 	 unset($alertshell_array); 
	 }



    //end class
    }

?>