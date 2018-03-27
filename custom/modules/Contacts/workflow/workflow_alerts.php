<?php

include_once("include/workflow/alert_utils.php");
    class Contacts_alerts {
    function process_wflow_Contacts0_alert0(&$focus){
            include("custom/modules/Contacts/workflow/alerts_array.php");

	 $alertshell_array = array(); 

	 $alertshell_array['alert_msg'] = "d1cf01de-61af-3015-3be4-55386a48bcf9"; 

	 $alertshell_array['source_type'] = "Custom Template"; 

	 $alertshell_array['alert_type'] = "Email"; 

	 process_workflow_alerts($focus, $alert_meta_array['Contacts0_alert0'], $alertshell_array, false); 
 	 unset($alertshell_array); 
	 }



    //end class
    }

?>