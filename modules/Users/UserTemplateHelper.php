<?php
/**
* Apply User Template to users from User Template ID
* 
* @author   Thuan Nguyen
* @param    id      $userTemplateID        ID of user template
* @param    array/id   $userArray          array of user IDs or user ID need to apply user template
*/
function applyUserTemplate($userTemplateID, $userArray, $isGlobal = true) {
    
    //check if user template ID is valid
    if (!isset($userTemplateID) || $userTemplateID == '') {
        return;
    }
    
    //check if user array is valid
    if (!isset($userArray) || !is_array($userArray)) {
        return;
    }
    
    //check if user array is id
    if (is_string($userArray)) {
        $userArray[] = $userArray;
    }
    
    // get all category and category's content relate to user template
    $catsResult = $GLOBALS['db']->query('SELECT category, contents FROM user_preferences WHERE assigned_user_id="'.$userTemplateID.'"');
    //assign new category of template user
    while ($row = $GLOBALS['db']->fetchByAssoc($catsResult)) {
        foreach($userArray as $id) {
            $user = BeanFactory::getBean('Users', $id);
            
            //get calendar pulish key
            $calendarPublishKey = $user->getPreference('calendar_publish_key');
            
            //unset the reference of user that save in session for sugar reload new
            unset($_SESSION[$user->user_name . '_PREFERENCES']);
            $userReference = new UserPreference($user);
            //retrive exist category
            $userReference->retrieve_by_string_fields(array(
                'assigned_user_id' => $id,
                'category' => $row['category'],
            ));
            $userReference->deleted = 0;
            $userReference->category = $row['category'];
            $userReference->assigned_user_id = $id;
            
            //check if category is global
            if ($row['category'] == 'global' && $isGlobal == true) {
                $globalReference = unserialize(base64_decode($row['contents'])); //get global category array
                $globalReference['calendar_publish_key'] = $calendarPublishKey;
                $row['contents'] = base64_encode(serialize($globalReference));
            } elseif ($row['category'] == 'global' && $isGlobal == false) {
                continue;
            }
            $userReference->contents = $row['contents'];
            $userReference->save();
            //unset $user and $userRef for save memory
            unset($user);
            unset($userReference);
        }
    } 
}
//END: Apply User Template to users from User Template ID