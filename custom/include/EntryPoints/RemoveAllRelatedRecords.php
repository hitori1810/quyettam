<?php
    /*
    *   This entry point is to remove all related records in a subpanel by given relationship field name
    *   Author: Luc Dang
    */

    $targetId       = $_POST['targetId'];
    $targetModule   = $_POST['targetModule'];
    $type           = $_POST['type'];
    $relationshipFieldName = $_POST['relationshipFieldName'];
    
    // SPECIAL CASES
    if($relationshipFieldName == 'emails'){
        $query = " UPDATE emails_beans SET deleted = 1 "; 
        $query .= " WHERE bean_module = '{$targetModule}' "; 
        $query .= " AND bean_id = '{$targetId}' ";             
        $GLOBALS['db']->query($query);

        $query1 = " UPDATE emails SET deleted = 1 "; 
        $query1 .= " WHERE parent_id = '{$targetId}' ";          
        $GLOBALS['db']->query($query1);

    }
    else if ($relationshipFieldName == 'therevisions'){
        $query = " UPDATE document_revisions "; 
        $query .= " SET deleted = 1 "; 
        $query .= " WHERE document_id = '{$targetId}' ";          
        $GLOBALS['db']->query($query);    
    }
    else if ($relationshipFieldName == 'accounts' && $targetModule == 'Accounts'){
        $query = " UPDATE accounts  "; 
        $query .= " SET deleted = 1 "; 
        $query .= " WHERE parent_id = '{$targetId}' ";          
        $GLOBALS['db']->query($query);   
    }
    else if ($relationshipFieldName == 'holidays' && $targetModule == 'Project'){
        $query = " UPDATE holidays  "; 
        $query .= " SET deleted = 1 "; 
        $query .= " WHERE related_module_id = '{$targetId}' ";          
        $GLOBALS['db']->query($query);    
    }
    // NORMAL CASES [history - activities] - $other
    else{
        // Use $targetModule CALL Exactly class of $targetModule
        $objModule = BeanFactory::newBean($targetModule);
        $objModule->retrieve($targetId);

        // Get list relationshipFieldName to decide $beanName = 'meetings' || 'tasks' || 'calls' || $other 
        $beanName = $objModule->field_defs[$relationshipFieldName]['bean_name'];
        $listRelationshipField = $objModule->get_linked_beans($relationshipFieldName, $beanName);

        // Loop if $type   = $other                         : Delete normal
        //    else $type   = 'history' , 'activities' ...   : Delete special 
        $objModule->load_relationship($relationshipFieldName);
        foreach ($listRelationshipField as $key => $value) {
            $status = $value->status;

            if ($type == 'history') {
                // Delete Meetings
                if ($relationshipFieldName == 'meetings') {
                    if ($status == 'Held' OR $status == 'Not Held') {
                        $objModule->$relationshipFieldName->delete($targetId, $value->id);
                    }
                }

                // Delete Tasks
                if ($relationshipFieldName == 'tasks') {
                    if ($status == 'Completed' OR $status == 'Deferred') {
                        $objModule->$relationshipFieldName->delete($targetId, $value->id);
                    }
                }

                // Delete Calls
                if ($relationshipFieldName == 'calls') {
                    if ($status == 'Held' OR $status == 'Not Held') {
                        $objModule->$relationshipFieldName->delete($targetId, $value->id);
                    }
                }
                // Delete Notes
                if ($relationshipFieldName == 'notes') {   
                    $objModule->$relationshipFieldName->delete($targetId, $value->id);
                }

            } 
            else if ($type == 'activities') {
                // Delete Meetings
                if ($relationshipFieldName == 'meetings') {
                    if ($status != 'Held' AND $status != 'Not Held') {
                        $objModule->$relationshipFieldName->delete($targetId, $value->id);
                    }
                }

                // Delete Tasks
                if ($relationshipFieldName == 'tasks') {
                    if ($status != 'Completed' AND $status != 'Deferred') {
                        $objModule->$relationshipFieldName->delete($targetId, $value->id);
                    }
                }

                // Delete 
                if ($relationshipFieldName == 'calls') {
                    if ($status != 'Held' AND $status != 'Not Held') {
                        $objModule->$relationshipFieldName->delete($targetId, $value->id);
                    }
                }
            }
            else{
                // Delete $other
                $objModule->$relationshipFieldName->delete($targetId, $value->id);
            }
        }
    }
    //$account->load_relationship($relationshipFieldName);
    //$account->$relationshipFieldName->delete($targetId);    



?>