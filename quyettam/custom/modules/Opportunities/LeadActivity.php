<?php
    /*function handleActivities($lead,$bean){
    $parent_types = $GLOBALS['app_list_strings']['record_type_display'];

    $activities = getActivitiesFromLead($lead);

    //if account is being created, we will specify the account as the parent bean
    $accountParentInfo = array();

    //determine the account id info ahead of time if it is being created as part of this conversion
    if($bean->object_name == 'Account'){
    $account_id = create_guid();
    if(!empty($bean->id)){
    $account_id = $bean->id;
    }else{
    $bean->id = $account_id;
    }
    $accountParentInfo = array('id'=>$account_id,'type'=>'Accounts');
    }

    if (isset($bean->module_dir)) {
    if (empty($bean->id)){
    $bean->id = create_guid();
    $bean->new_with_id = true;
    }
    foreach($activities as $activity)
    {
    if (!isset($GLOBALS['sugar_config']['lead_conv_activity_opt']) || $GLOBALS['sugar_config']['lead_conv_activity_opt'] == 'copy') {
    copyActivityAndRelateToBean($activity, $bean, $accountParentInfo);
    break;

    }
    else if ($GLOBALS['sugar_config']['lead_conv_activity_opt'] == 'move') {
    // if to move activities, should be only one module selected
    moveActivity($activity, $bean,$lead->id);
    }
    }
    }
    } */
    function handleActivities($lead,$beans){
        global $app_list_strings;
        global $sugar_config;
        global $app_strings;
        $parent_types = $app_list_strings['record_type_display'];

        $activities = getActivitiesFromLead($lead);

        //if account is being created, we will specify the account as the parent bean
        $accountParentInfo = array();

        //determine the account id info ahead of time if it is being created as part of this conversion
        if(!empty($beans['Accounts'])){
            $account_id = create_guid();
            if(!empty($beans['Accounts']->id)){
                $account_id = $beans['Accounts']->id;
            }else{
                $beans['Accounts']->id = $account_id;
            }
            $accountParentInfo = array('id'=>$account_id,'type'=>'Accounts');
        }

        foreach($beans as $module => $bean)
        {
            if (isset($parent_types[$module]))
            {
                if (empty($bean->id))
                {
                    $bean->id = create_guid();
                    $bean->new_with_id = true;
                }
                if( isset($_POST['lead_conv_ac_op_sel']) && $_POST['lead_conv_ac_op_sel'] != 'None')
                {
                    foreach($activities as $activity)
                    {
                        if (!isset($sugar_config['lead_conv_activity_opt']) || $sugar_config['lead_conv_activity_opt'] == 'copy') {
                            if (isset($_POST['lead_conv_ac_op_sel'])) {
                                //if the copy to module(s) are defined, copy only to those module(s)
                                if (is_array($_POST['lead_conv_ac_op_sel'])) {
                                    foreach ($_POST['lead_conv_ac_op_sel'] as $mod) {
                                        if ($mod == $module) {
                                            copyActivityAndRelateToBean($activity, $bean, $accountParentInfo);
                                            break;
                                        }
                                    }
                                }
                            }
                        }
                        else if ($sugar_config['lead_conv_activity_opt'] == 'move') {
                            // if to move activities, should be only one module selected
                            if ($_POST['lead_conv_ac_op_sel'] == $module) {
                                moveActivity($activity, $bean);
                            }
                        }
                    }
                }
            }
        }
    }





    /**
    * Change the parent id and parent type of an activity
    * @param $activity Activity to be modified
    * @param $bean New parent bean of the activity
    */
    /*function moveActivity($activity, $bean,$lead_id) {
    global $beanList;

    $lead = null;
    if (!empty($_REQUEST['record']))
    {
    $lead = new Lead();
    $lead->retrieve($lead_id);
    }

    // delete the old relationship to the old parent (lead)
    if ($rel = findRelationship($activity, $lead)) {
    $activity->load_relationship ($rel) ;

    if ($activity->parent_id && $activity->id) {
    $activity->$rel->delete($activity->id, $activity->parent_id);
    }
    }

    // add the new relationship to the new parent (contact, account, etc)
    if ($rel = findRelationship($activity, $bean)) {
    $activity->load_relationship ($rel) ;

    $relObj = $activity->$rel->getRelationshipObject();
    if ( $relObj->relationship_type=='one-to-one' || $relObj->relationship_type == 'one-to-many' )
    {
    $key = $relObj->rhs_key;
    $activity->$key = $bean->id;
    }
    $activity->$rel->add($bean);
    }

    // set the new parent id and type
    $activity->parent_id = $bean->id;
    $activity->parent_type = $bean->module_dir;

    $activity->save();
    }*/

    /**
    * Change the parent id and parent type of an activity
    * @param $activity Activity to be modified
    * @param $bean New parent bean of the activity
    */
    function moveActivity($activity, $bean) {
        global $beanList;

        $lead = null;
        if (!empty($_REQUEST['record']))
        {
            $lead = new Lead();
            $lead->retrieve($_REQUEST['record']);
        }

        // delete the old relationship to the old parent (lead)
        if ($rel = findRelationship($activity, $lead)) {
            $activity->load_relationship ($rel) ;

            if ($activity->parent_id && $activity->id) {
                $activity->$rel->delete($activity->id, $activity->parent_id);
            }
        }

        // add the new relationship to the new parent (contact, account, etc)
        if ($rel = findRelationship($activity, $bean)) {
            $activity->load_relationship ($rel) ;

            $relObj = $activity->$rel->getRelationshipObject();
            if ( $relObj->relationship_type=='one-to-one' || $relObj->relationship_type == 'one-to-many' )
            {
                $key = $relObj->rhs_key;
                $activity->$key = $bean->id;
            }
            $activity->$rel->add($bean);
        }

        // set the new parent id and type
        $activity->parent_id = $bean->id;
        $activity->parent_type = $bean->module_dir;

        $activity->save();
    }

    /**
    * Gets the list of activities related to the lead
    * @param Lead $lead Lead to get activities from
    * @return Array of Activity SugarBeans .
    */
    /*function getActivitiesFromLead($lead){
    if (!$lead) return;

    global $beanList, $db;

    $activitesList = array("Calls", "Tasks", "Meetings", "Emails", "Notes");
    $activities = array();

    foreach($activitesList as $module)
    {
    $beanName = $beanList[$module];
    $activity = new $beanName();
    $query = "SELECT id FROM {$activity->table_name} WHERE parent_id = '{$lead->id}' AND parent_type = 'Leads'";
    $result = $db->query($query,true);
    while($row = $db->fetchByAssoc($result))
    {
    $activity = new $beanName();
    $activity->retrieve($row['id']);
    $activity->fixUpFormatting();
    $activities[] = $activity;
    }
    }

    return $activities;
    }*/

    /**
    * Gets the list of activities related to the lead
    * @param Lead $lead Lead to get activities from
    * @return Array of Activity SugarBeans .
    */
    function getActivitiesFromLead($lead){
        if (!$lead) return;

        global $beanList, $db;

        $activitesList = array("Calls", "Tasks", "Meetings", "Emails", "Notes");
        $activities = array();

        foreach($activitesList as $module)
        {
            $beanName = $beanList[$module];
            $activity = new $beanName();
            $query = "SELECT id FROM {$activity->table_name} WHERE parent_id = '{$lead->id}' AND parent_type = 'Leads'";
            $result = $db->query($query,true);
            while($row = $db->fetchByAssoc($result))
            {
                $activity = new $beanName();
                $activity->retrieve($row['id']);
                $activity->fixUpFormatting();
                $activities[] = $activity;
            }
        }

        return $activities;
    }


    /*function copyActivityAndRelateToBean($activity,$bean,$parentArr = array()){
        global $beanList;
        $newActivity = clone $activity;
        $newActivity->id = create_guid();
        $newActivity->new_with_id = true;
        //set the parent id and type if it was passed in, otherwise use blank to wipe it out
        $parentID = '';
        $parentType = '';
        if(!empty($parentArr)){
            if(!empty($parentArr['id'])){
                $parentID = $parentArr['id'];
            }

            if(!empty($parentArr['type'])){
                $parentType = $parentArr['type'];
            }

        }
        //Special case to prevent duplicated tasks from appearing under Contacts multiple times
        if ($newActivity->module_dir == "Tasks" && $bean->module_dir != "Contacts")
        {
            $newActivity->contact_id = $newActivity->contact_name = "";
        }

        if ($rel = findRelationship($newActivity, $bean))
        {
            if (isset($newActivity->$rel))
            {
                // this comes form $activity, get rid of it and load our own
                $newActivity->$rel = '';
            }

            $newActivity->load_relationship ($rel) ;
            $relObj = $newActivity->$rel->getRelationshipObject();
            if ( $relObj->relationship_type=='one-to-one' || $relObj->relationship_type == 'one-to-many' )
            {
                $key = $relObj->rhs_key;
                $newActivity->$key = $bean->id;
            }

            //parent (related to field) should be blank unless it is explicitly sent in
            //it is not sent in unless the account is being created as well during lead conversion
            $newActivity->parent_id =  $parentID;
            $newActivity->parent_type = $parentType;

            $newActivity->update_date_modified = false; //bug 41747
            $newActivity->save();
            $newActivity->$rel->add($bean);
            if ($newActivity->module_dir == "Notes" && $newActivity->filename) {
                UploadFile::duplicate_file($activity->id, $newActivity->id,  $newActivity->filename);
            }
        }
    } */
    
     function copyActivityAndRelateToBean($activity,$bean,$parentArr = array()){
        global $beanList;
        $newActivity = clone $activity;
        $newActivity->id = create_guid();
        $newActivity->new_with_id = true;

        //set the parent id and type if it was passed in, otherwise use blank to wipe it out
        $parentID = '';
        $parentType = '';
        if(!empty($parentArr)){
            if(!empty($parentArr['id'])){
                $parentID = $parentArr['id'];
            }

            if(!empty($parentArr['type'])){
                $parentType = $parentArr['type'];
            }

        }

        //Special case to prevent duplicated tasks from appearing under Contacts multiple times
        if ($newActivity->module_dir == "Tasks" && $bean->module_dir != "Contacts")
        {
            $newActivity->contact_id = $newActivity->contact_name = "";
        }

        if ($rel = $this->findRelationship($newActivity, $bean))
        {
            if (isset($newActivity->$rel))
            {
                // this comes form $activity, get rid of it and load our own
                $newActivity->$rel = '';
            }

            $newActivity->load_relationship ($rel) ;
            $relObj = $newActivity->$rel->getRelationshipObject();
            if ( $relObj->relationship_type=='one-to-one' || $relObj->relationship_type == 'one-to-many' )
            {
                $key = $relObj->rhs_key;
                $newActivity->$key = $bean->id;
            }

            //parent (related to field) should be blank unless it is explicitly sent in
            //it is not sent in unless the account is being created as well during lead conversion
            $newActivity->parent_id =  $parentID;
            $newActivity->parent_type = $parentType;

            $newActivity->update_date_modified = false; //bug 41747
            $newActivity->save();
            $newActivity->$rel->add($bean);
            if ($newActivity->module_dir == "Notes" && $newActivity->filename) {
                UploadFile::duplicate_file($activity->id, $newActivity->id,  $newActivity->filename);
            }
         }
    }

    /*function findRelationship($from,$to){
        global $dictionary;
        require_once("modules/TableDictionary.php");
        foreach ($from->field_defs as $field=>$def)
        {
            if (isset($def['type']) && $def['type'] == "link" && isset($def['relationship'])) 
            {
                $rel_name = $def['relationship'];
                $rel_def = "";
                if (isset($dictionary[$from->object_name]['relationships']) && isset($dictionary[$from->object_name]['relationships'][$rel_name]))
                {
                    $rel_def = $dictionary[$from->object_name]['relationships'][$rel_name];
                }
                else if (isset($dictionary[$to->object_name]['relationships']) && isset($dictionary[$to->object_name]['relationships'][$rel_name]))
                {
                    $rel_def = $dictionary[$to->object_name]['relationships'][$rel_name];
                }
                else if (isset($dictionary[$rel_name]) && isset($dictionary[$rel_name]['relationships'])
                    && isset($dictionary[$rel_name]['relationships'][$rel_name]))
                    {
                        $rel_def = $dictionary[$rel_name]['relationships'][$rel_name];
                    }
                    if (!empty($rel_def)) {
                    if ($rel_def['lhs_module'] == $from->module_dir && $rel_def['rhs_module'] == $to->module_dir )
                    {
                        return $field;
                    }
                    else if ($rel_def['rhs_module'] == $from->module_dir && $rel_def['lhs_module'] == $to->module_dir )
                    {
                        return $field;
                    }
                }
            }
        }
        return false;
    }*/
    
     function findRelationship( $from,$to){
        global $dictionary;
        require_once("modules/TableDictionary.php");
        foreach ($from->field_defs as $field=>$def)
        {
            if (isset($def['type']) && $def['type'] == "link" && isset($def['relationship']))
            {
                $rel_name = $def['relationship'];
                $rel_def = "";
                if (isset($dictionary[$from->object_name]['relationships']) && isset($dictionary[$from->object_name]['relationships'][$rel_name]))
                {
                    $rel_def = $dictionary[$from->object_name]['relationships'][$rel_name];
                }
                else if (isset($dictionary[$to->object_name]['relationships']) && isset($dictionary[$to->object_name]['relationships'][$rel_name]))
                {
                    $rel_def = $dictionary[$to->object_name]['relationships'][$rel_name];
                }
                else if (isset($dictionary[$rel_name]) && isset($dictionary[$rel_name]['relationships'])
                        && isset($dictionary[$rel_name]['relationships'][$rel_name]))
                {
                    $rel_def = $dictionary[$rel_name]['relationships'][$rel_name];
                }
                if (!empty($rel_def)) {
                    if ($rel_def['lhs_module'] == $from->module_dir && $rel_def['rhs_module'] == $to->module_dir )
                    {
                        return $field;
                    }
                    else if ($rel_def['rhs_module'] == $from->module_dir && $rel_def['lhs_module'] == $to->module_dir )
                    {
                        return $field;
                    }
                }
            }
        }
        return false;
    }
?>