<?php
    /*
    Still not remove cause not display :
    lead - lead
    product - product
    */

    $targetId       = $_POST['targetId'];
    $targetModule   = $_POST['targetModule'];
    $arrBtn         = $_POST['arrBtn'];
    foreach ($arrBtn as $key => $value){
        $type = $value['type'];
        $relationshipFieldName = $value['relationshipFieldName'];

        // Use $targetModule CALL Exactly class of $targetModule
        $objModule = BeanFactory::newBean($targetModule);
        $objModule->retrieve($targetId);

        // Get list relationshipFieldName to decide $beanName = 'meetings' || 'tasks' || 'calls' || $other 
        $beanName           = $objModule->field_defs[$relationshipFieldName]['bean_name'];
        $relatedModuleName  = $objModule->field_defs[$relationshipFieldName]['module'];
        $listRelatedField   = $objModule->get_linked_beans($relationshipFieldName, $beanName);

        if ( ACLController::checkAccess($relatedModuleName, 'list', true) == false ){
            continue;    
        }; 


        // $list empty == TRUE -> notExists -> not Create BTN REMOVE
        // $list empty == FALSE -> Exists -> Create BTN REMOVE   
        $canCreate       = "can create";
        $canNotCreate    = "can not create";

        if($relationshipFieldName == 'emails_beans'){
            $query = " SELECT COUNT(id) as emails "; 
            $query .= " FROM emails_beans "; 
            $query .= " WHERE deleted = 0 "; 
            $query .= " AND bean_id = '{$targetId}' ";             
            $result = $GLOBALS['db']->query($query);

            $count = $GLOBALS['db']->fetchByAssoc($result);

            if($count['emails'] > 0){
                $arrBtn[$key]['canBeCreated'] = true;
                continue;    
            }

        }

        if(empty($listRelatedField) == TRUE){
            continue;    
        }else{

            if($relationshipFieldName == 'emails'){
                $query = " SELECT COUNT(id) "; 
                $query .= " FROM emails_beans "; 
                $query .= " WHERE deleted = 0 "; 
                $query .= " AND bean_id = '{$targetId}' ";             
                $result = $GLOBALS['db']->query($query);

                $count = $GLOBALS['db']->fetchByAssoc($result);

                if($count > 0){
                    $arrBtn[$key]['canBeCreated'] = true;
                    continue;    
                }

            }else{
                $objModule->load_relationship($relationshipFieldName);
                foreach ($listRelatedField as $relatedField) {
                    $status = $relatedField->status;

                    if ($type == 'history') {
                        // Delete Meetings
                        if ($relationshipFieldName == 'meetings') {
                            if ($status == 'Held' OR $status == 'Not Held') {
                                $arrBtn[$key]['canBeCreated'] = true;
                                continue;
                            }
                        }

                        // Delete Tasks
                        if ($relationshipFieldName == 'tasks') {
                            if ($status == 'Completed' OR $status == 'Deferred') {
                               $arrBtn[$key]['canBeCreated'] = true;
                               continue;
                            }
                        }

                        // Delete Calls
                        if ($relationshipFieldName == 'calls') {
                            if ($status == 'Held' OR $status == 'Not Held') {
                                $arrBtn[$key]['canBeCreated'] = true;
                                continue;
                            }
                        }
                        // Delete Notes
                        if ($relationshipFieldName == 'notes') {   
                            $arrBtn[$key]['canBeCreated'] = true;
                            continue;
                        }

                    } 
                    else if ($type == 'activities') {
                        // Delete Meetings
                        if ($relationshipFieldName == 'meetings') {
                            if ($status != 'Held' AND $status != 'Not Held') {
                                $arrBtn[$key]['canBeCreated'] = true;
                                continue;
                            }
                        }

                        // Delete Tasks
                        if ($relationshipFieldName == 'tasks') {
                            if ($status != 'Completed' AND $status != 'Deferred') {
                                $arrBtn[$key]['canBeCreated'] = true;
                                continue;
                            }
                        }

                        // Delete 
                        if ($relationshipFieldName == 'calls') {
                            if ($status != 'Held' AND $status != 'Not Held') {
                                $arrBtn[$key]['canBeCreated'] = true;
                                continue;
                            }
                        }
                    }  
                }
            }
        }
    }

    echo json_encode($arrBtn);


?>