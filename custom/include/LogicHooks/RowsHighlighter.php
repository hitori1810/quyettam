<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
    require_once('data/SugarBean.php'); 

    class RowsHighlighter{

        //Project 
        function highlightForProject(&$bean,$event,$arguments){
            if($_REQUEST['action'] != 'Popup'){
                $color1 = '';
                $color2 = '';
                if($bean->project_status == 'enable'){
                    $color1 = 'xanh';    
                }elseif($bean->project_status == 'disable'){
                    $color1 = 'do';
                }

                $bean->project_status = translate("project_status_list","", $bean->project_status ). "<img style='display:none;' src='themes/Sugar5/images/help.gif' width='0' height='0'  onload='this.parentNode.className = \"".$color1."\";'> ";     
            }      
        } 

        function highlightForOpp(&$bean,$event,$arguments){
            if($_REQUEST['action'] != 'Popup'){
                $color_class = '';
                if($bean->sales_stage == 'Closed Won'){
                    $color_class = "closed_won";
                }
                if($bean->sales_stage == 'Closed Lost'){
                    $color_class = "closed_lost";
                }
                if($bean->sales_stage == 'Prospecting' && $bean->opportunity_type == 'New Business'){
                    $color_class = "prospecting";
                }

                $bean->sales_stage = translate("sales_stage_dom","", $bean->sales_stage ). "<img style='display:none;' src='themes/Sugar5/images/help.gif' width='0' height='0'  onload='this.parentNode.className = \"".$color_class."\";'> ";      
            }
        }

        function highlightForBilling(&$bean,$event,$arguments){

            $color_class = strtolower($bean->type);//color class same as 

            $bean->type = translate("Billing_type_dom","", $bean->type ). "<img style='display:none;' src='themes/Sugar5/images/help.gif' width='0' height='0'  onload='this.parentNode.className = \"".$color_class."\";'> ";      

        }

        function highlightForLeads(&$bean,$event,$arguments){
            if($_REQUEST['action'] != 'Popup'){
                $sql_get_lead_source = '
                SELECT lead_source
                FROM leads
                WHERE id = "'. $bean->id .'"';
                $result = $GLOBALS['db']->query($sql_get_lead_source);
                $data = $GLOBALS['db']->fetchByAssoc($result);

                $color_class = '';
                if($bean->status == 'New'){
                    $color_class = 'new';    
                }
                if($bean->status == 'New' && $bean->assigned_user_id == '1'){
                    $color_class = 'lead_source';    
                }
                if($bean->status == 'In Process'){
                    $color_class = 'in_process';    
                }
                if($bean->status == 'Converted'){
                    $color_class = 'converted';    
                }
                if($bean->status == 'Dead'){
                    $color_class = 'dead';
                }
                if($bean->status == 'Recycled'){
                    $color_class = 'recycled';
                }
                $bean->status =  $GLOBALS['app_list_strings'][ "lead_status_dom"][$bean->status]. "<img style='display:none;' src='themes/Sugar5/images/help.gif' width='0' height='0'  onload='this.parentNode.className = \"".$color_class."\";'> ";      
            }
        } 

        /**
        * Call Logic process record
        * auto cal description content field: contains notes's lastest content 
        *  
        */
        function getlastContentForDescription(&$bean,$event,$arguments){

            global $sugar_config, $timedate;

            $note_query = "SELECT
            name, description, assigned_user_id, date_modified
            FROM notes
            WHERE parent_id = '{$bean->id}'
            ORDER BY date_modified DESC
            LIMIT 0,1
            ";

            $call_query = "SELECT
            name, description, assigned_user_id, date_modified
            FROM calls
            WHERE parent_id = '{$bean->id}'
            ORDER BY date_modified DESC
            LIMIT 0,1
            ";

            $task_query = "SELECT
            name, description, assigned_user_id, date_modified
            FROM tasks
            WHERE parent_id = '{$bean->id}'
            ORDER BY date_modified DESC
            LIMIT 0,1
            ";

            $meeting_query = "SELECT
            name, description, assigned_user_id, date_modified
            FROM meetings
            WHERE parent_id = '{$bean->id}'
            ORDER BY date_modified DESC
            LIMIT 0,1
            ";

            $email_query = "SELECT 
            emails.name,
            description,
            emails.date_modified,
            emails.assigned_user_id,
            description_html 
            FROM
            emails_text 
            INNER JOIN emails 
            ON emails.id = emails_text.email_id 
            WHERE emails.deleted = 0 
            AND emails_text.deleted = 0
            AND emails.type ='archived'
            AND emails.parent_id = '".$bean->id."'
            ORDER BY date_modified DESC
            LIMIT 0,1";

            $result_note = $GLOBALS['db']->query($note_query);            
            $note = $GLOBALS['db']->fetchByAssoc($result_note);

            $result_call = $GLOBALS['db']->query($call_query);            
            $call = $GLOBALS['db']->fetchByAssoc($result_call);

            $result_task = $GLOBALS['db']->query($task_query);            
            $task = $GLOBALS['db']->fetchByAssoc($result_task);

            $result_meeting = $GLOBALS['db']->query($meeting_query);            
            $meeting = $GLOBALS['db']->fetchByAssoc($result_meeting);
            $email = $GLOBALS['db']->fetchByAssoc($GLOBALS['db']->query($email_query));
            $limit = 200;//ki tu 

            $description = $bean->description;
            if(strlen(trim($bean->description)) > $limit)
                $bean->description = substr($bean->description,0,$limit);

            $note_description = $note['description'];    
            if(strlen(trim($note['description'])) > $limit)
                $note_description = substr($note_description,0,$limit);
            $email_description =  html_entity_decode_utf8($email['description']);

            if(strlen(trim($email_description)) > $limit)
                $email_description = substr($email_description,0,$limit);

            
            $user = new User();
            $short_description = $bean->description;
            $full_description = $description;
            $note_img = "<img src='".$GLOBALS['sugar_config']['site_url']."/themes/default/images/Notes.gif'>";
            $call_img = "<img src='".$GLOBALS['sugar_config']['site_url']."/themes/default/images/Calls.gif'>";
            $task_img = "<img src='".$GLOBALS['sugar_config']['site_url']."/themes/default/images/Tasks.gif'>";
            $meeting_img = "<img src='".$GLOBALS['sugar_config']['site_url']."/themes/default/images/Meetings.gif'>";
            $email_img = "<img src='".$GLOBALS['sugar_config']['site_url']."/themes/default/images/Emails.gif'>";

            if(isset($note['name']) > 0){
                $user->retrieve($note['assigned_user_id']);
                $note_title = "<p><font color='red'>".$GLOBALS['app_strings']['LBL_LASTEST_NOTE'].":</font></p><p>".$note_img." <font color='blue' >".$note['name']." - at ".$timedate->to_display_date($note['date_modified'], true)." by ".$user->name."</font></p>";
                $short_description .= $note_title."<i>".$note_description."</i>";
                $full_description .= $note_title."<i>".$note['description']."</i>"; 
            }

            if(isset($call['name']) > 0 || isset($task['name']) > 0 || isset($meeting['name']) > 0){
                $activity_title = "<p><font color='red'>".$GLOBALS['app_strings']['LBL_LASTEST_ACTIVITIES']."</font></p>";
                $short_description .= $activity_title;
                $full_description .= $activity_title;
            }

            if(isset($call['name']) > 0){
                $user->retrieve($call['assigned_user_id']);
                $call_title = "<p>".$call_img." <font color='blue' >".$call['name']." - at ".$GLOBALS['timedate']->to_display_date($call['date_modified'], true)." by ".$user->name."</font></p>";
                $short_description .= $call_title;
                $full_description .= $call_title."<i>".$call['description']."</i>";
            }

            if(isset($task['name']) > 0){
                $user->retrieve($task['assigned_user_id']);
                $task_title = "<p>".$task_img." <font color='blue' >".$task['name']." - at ".$GLOBALS['timedate']->to_display_date($task['date_modified'], true)." by ".$user->name."</font></p>";
                $short_description .= $task_title;                
                $full_description .= $task_title."<i>".$task['description']."</i>";
            }

            if(isset($meeting['name']) > 0){
                $user->retrieve($meeting['assigned_user_id']);
                $metting_title = "<p>".$meeting_img." <font color='blue' >".$meeting['name']." - at ".$GLOBALS['timedate']->to_display_date($meeting['date_modified'], true)." by ".$user->name."</font></p>";
                $short_description .= $metting_title;
                $full_description .= $metting_title."<i>".$meeting['description']."</i>";
            }
            if($email_description){
                $user->retrieve($email['assigned_user_id']);
                $email_title = "<p>".$email_img." <font color='blue' >".$email['name']." - at ".$GLOBALS['timedate']->to_display_date($email['date_modified'], true)." by ".$user->name."</font></p>";
                $short_description .= $email_title;
                $full_description .= $email_title."<i>".html_entity_decode_utf8($email['description'])."</i>";
            }

            $bean->description = '<div class="tooltip" tooltip_content="'. $full_description .'">'. $short_description .'</div>';
        }

        /**
        * end 
        */


    }
?>