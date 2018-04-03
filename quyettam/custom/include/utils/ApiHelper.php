<?php
require_once('custom/include/utils/RestfulApiHelper.php');

class ApiHelper extends RestfulApiHelper {          

    static function login($userName, $password, $stayLogin) {
        global $sugar_config, $current_user;

        global $sugar_config;
        $user = BeanFactory::getBean('Users');
        $success = false;
        $password = md5($password);
        $authController = AuthenticationController::getInstance();
        $success = $authController->login($userName, $password, array('passwordEncrypted' => true));

        if($success) {
            session_start();                 
            $sessionId = session_id();

            // Save session_id to oauth_session
            // Check if this session_id is existing
            $sql = "SELECT session_id FROM oauth_session WHERE session_id ='$sessionId' AND user_id='{$current_user->id}'";
            $sessionId = $GLOBALS['db']->getOne($sql);
            if(!empty($sessionId)){
                $sql = "UPDATE oauth_session SET auth_time = GETDATE() WHERE session_id ='$sessionId'";
                $GLOBALS['db']->query($sql);
            }
            else{
                session_regenerate_id();
                $sessionId = session_id();
                // if not exist, create new row
                $newSugarId = create_guid();
                $sql = "INSERT INTO [oauth_session] ([id], [session_id], [auth_time], [user_id]) VALUES ('$newSugarId', '$sessionId' , GETDATE(), '{$current_user->id}')";
                $GLOBALS['db']->query($sql);
            }

            $_SESSION['lifetime'] = time() + 1800;
            $_SESSION['current_user'] = $GLOBALS['current_user'];  

            // Returns token and user info
            $response = array(
                'token' => session_id(),
                'user_info' => $current_user->toArray()
            );

            self::setReturn(200, json_encode($response));
        }
        else {
            self::setReturn(401);
        }
    }

    function checkRequired($fields, $checkIn){
        if(!count($fields))
            return;
        foreach($fields as $key=>$f){
            if(!isset($checkIn[$f]) || empty($checkIn[$f]) || $checkIn[$f] == "")
                self::setReturn(422, json_encode(array(
                    "message" => "Field $f id required"
                )));
        }
    }     

    function checkDataArray($data){
        if(count($data) == 0) self::setReturn(422, json_encode(array(
                    "message" => "Data is empty"
                )));
    }     
    
    function getCustomerList(){   
        $sql = "
        SELECT id   
        , IFNULL(code, '')  code
        , IFNULL(first_name, '') first_name
        , IFNULL(phone_mobile, '') phone_mobile
        , IFNULL(description, '') description
        FROM contacts
        WHERE deleted <> 1";

        $result = $GLOBALS['db']->query($sql);
        $returnList = array();
        while($row = $GLOBALS['db']->fetchByAssoc($result)){        
            $returnList[] = $row;                                                    
        } 

        $response = array(
            'entry_list' => $returnList
        );

        self::setReturn(200, $response);
    }
    
    function getAppListString(){           
        $response = array(
            'entry_list' => return_app_list_strings_language('en_us')
        );

        self::setReturn(200, $response);
    }
                                                   

    static function setReturn($code, $data){
        global $gInput;      
        
        parent::setReturn($code, $data);
    }
}
?>