<?php
    require_once("custom/modules/Teams/_helper.php");

    $action = $_POST['act'];
    if(empty($action)){
        echo json_encode(array("success" => "0",));   
    }else{
        
        
        // ******************(^ _ ^)*********************************

        // Update & Create Team
        if ($action == 'save'){
            if(empty($_POST['team_id']))
                $focus = new Team();
            else
                $focus = BeanFactory::getBean('Teams',$_POST['team_id']);

            $focus->name = $_POST['team_name'];
            $focus->code_prefix = $_POST['prefix'];
            $focus->parent_id = $_POST['parent_id'];
            $focus->parent_name = $_POST['parent_name'];
            $focus->description = $_POST['description'];
            $focus->save();

            //add all users of parent to this team - Except Global
            if(empty($_POST['team_id'])){
                $call_back = 'create';
                
                if($focus->parent_id != '1'){
                    $users_parent = getTeamMembers($focus->parent_id);
                    for($i = 0; $i < count($users_parent); $i++){
                        $focus->add_user_to_team($users_parent[$i]['user_id']);
                    }    
                }
                
            }else{
                $call_back = 'update';
                //Copy users from parent team to this team
                
                if($focus->parent_id != '1' && $_POST['copyUserFlag'] == 'true'){
                    $users_parent = getTeamMembers($focus->parent_id);
                    for($i = 0; $i < count($users_parent); $i++){
                        $focus->add_user_to_team($users_parent[$i]['user_id']);
                    }    
                }
                 
            }
            echo json_encode(array( 
                "success" => "1",
                "act" => "save",
                "call_back" => $call_back,
                "team_id" => $focus->id,
                "team_name" => $focus->name,
                "prefix" => $focus->code_prefix,
                "parent_id" => $focus->parent_id,
                "parent_name" => $focus->parent_name,
                "description" => $focus->description,
            ));
        }
        // Delete Team 
        elseif(!empty($_POST['team_id']) && $action == 'delete'){
            $focus = new Team();
            $focus->retrieve($_POST['team_id']);
            if($focus->has_records_in_modules()) {
                header("Location: index.php?module=Teams&action=ReassignTeams&record={$focus->id}");
            } else {
                //todo: Verify that no items are still assigned to this team.
                if($focus->id == $focus->global_team) {
                    $msg = $GLOBALS['app_strings']['LBL_MASSUPDATE_DELETE_GLOBAL_TEAM'];
                    $GLOBALS['log']->fatal($msg);
                    $error_message = $app_strings['LBL_MASSUPDATE_DELETE_GLOBAL_TEAM'];
                    SugarApplication::appendErrorMessage($error_message);
                    header('Location: index.php?module=Teams&action=DetailView&record='.$focus->id);
                    return;
                }
                //Call mark_deleted function
                $focus->mark_deleted();
                echo json_encode(array(
                    "success" => "1",
                    "act" => "delete",
                ));
            }
        }else{
            echo json_encode(array("success" => "0",));   
        }
    }
?>
