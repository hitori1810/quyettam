<?php 
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
    
    class ListviewLogicHookLead { 

        /** 
        * Changing color of listview rows according to Status
        */ 
        function listviewcolor(&$bean, $event, $arguments) { 
            $colorClass = '';       
            switch($bean->status) { 
                case 'New':     
                    $colorClass = "highlight_green"; 
                    break; 
                case 'Assigned':     
                    $colorClass = "highlight_bluelight"; 
                    break; 
                case 'In Process':     
                    $colorClass = "highlight_blue"; 
                    break;
                case 'Converted':     
                    $colorClass = "highlight_red"; 
                    break;
                case 'Recycled':     
                    $colorClass = "highlight_violet"; 
                    break;
                case 'Dead':     
                    $colorClass = "highlight_black"; 
                    break;  
                default : 
                    $colorClass = "No_color"; 
            }
            $tmp_status = translate('lead_status_dom','',$bean->status); 
            $bean->status = "<span class=$colorClass >$tmp_status</span>"; 
        } 
    }
?>
