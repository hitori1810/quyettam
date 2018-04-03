<?php

    /*
    *   Class RestfulApiHelper
    *   Author: Hieu Nguyen
    *   Date: 2016-11-09
    *   Purpose: A parent class for restful api helpers
    */
     
    class RestfulApiHelper {
        
        static function setReturn($code, $data = '') {          
            if($code == 400)
                $message = 'Bad Request';
            if($code == 401)
                $message = 'Token invalid';
            if (!function_exists('http_response_code')) {
                header('HTTP/1.1 '.$code);
            }
            else
                http_response_code($code);

            // TODO: log into files, separate by date

            if(is_array($data)) {
                echo json_encode($data);
            }
            else {
                echo $data;
            }

            exit;
        }

        static function parseInput() {
            $input = $_POST;   
                                             
            $input = self::escapeInput($input);
                                           
            return $input;
        }

        static function escapeInput($array) {
            global $db;

            foreach($array as $key => $value) {
                if(is_array($value)) { 
                    self::escapeInput($value);
                }
                else { 
                    $array[$key] = trim($db->quote(securexss(from_html($value))));
                }
            }

            return $array;
        }

        static function login($userName, $password) {
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
                self::setReturn(200, $sessionId);
            }
            else {
                self::setReturn(401);
            }
        }

        static function logout($sessionId = '') {
            session_destroy();                   
            $sql = "DELETE FROM oauth_session WHERE session_id = '$sessionId'";
            $GLOBALS['db']->query($sql);
            self::setReturn(200, array('success' => 1));
        }

        static function checkSession($token) {
            global $current_user, $app_strings, $app_list_strings;      
                                 
            session_id($token);

            if(!isset($_SESSION['current_user'])) {
                session_destroy();
                self::setReturn(401);
            }          
            
            $current_user = $_SESSION['current_user'];
            
            // Load languages
            if(!empty($_SESSION['authenticated_user_language'])) {
                $GLOBALS['current_language'] = $_SESSION['authenticated_user_language'];
            }
            else {
                $GLOBALS['current_language'] = $GLOBALS['sugar_config']['default_language'];
            }                                                                             
            //set module and application string arrays based upon selected language
            $GLOBALS['app_strings'] = return_application_language($GLOBALS['current_language']); 
            $app_strings = $GLOBALS['app_strings']; 
            $GLOBALS['app_list_strings'] = return_app_list_strings_language($GLOBALS['current_language']);
            $app_list_strings = $GLOBALS['app_list_strings'];
        }

        // Imlemented by Hieu Nguyen on 2016-11-10
        static function getResponseWithPaging($entryList, $offset, $count, $totalCount) {
            $nextOffset = $offset + $count; // Offset starts at 0

            $response = array(
                'entry_list' => $entryList,
                'paging' => array(
                    'result_count' => $count,
                    'total_count' => $totalCount,
                    'next_offset' => $nextOffset
                )   
            );

            if($nextOffset >= $totalCount) {
                unset($response['paging']['next_offset']);
            }

            return $response;
        }
        
        // Implemented by Hieu Nguyen on 2016-11-15
        static function toIsoDateTime($value, $fromDb = true) {
            global $timedate;
            
            if(empty($value)) {
                return '';
            }

            if(strlen($value) > 19) {
                $value = substr($value, 0, 19);
            }
            
            if($fromDb) {
                $tempDateTime = $timedate->to_display_date_time($value);
                list($tempDate, $tempTime) = explode(' ', $tempDateTime);
                $dateTime = $timedate->to_db_date_time($tempDate, $tempTime);
                
                return join('T', $dateTime);    
            }
            else {
                list($tempDate, $tempTime) = explode(' ', $value);
                $dateTime = $timedate->to_db_date_time($tempDate, $tempTime);
                
                return join('T', $dateTime);
            }    
        }
        
        // Implemented by Hieu Nguyen on 2016-11-16
        static function isoToDbDateTime($value) {
            $dbDateTime = str_replace('T', ' ', $value);
            return $dbDateTime;    
        }
        
        // Implemented by Phuc on 2016-12-06
        static function convertTimeDateForBean(&$arrBean, $vardefs){
            $vardefs = $vardefs['fields'];
            global $timedate;
            foreach($arrBean as $key => $value){
                if(strtoupper($vardefs[$key]['type']) == 'DATE') { 
                    // Check if not in db type
                    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $value)) {
                        $arrBean[$key] = $timedate->to_db_date($value, false);
                    }
                }
                if(strtoupper($vardefs[$key]['type']) == 'DATETIME') {
                    if(strlen($value) > 10) {
                        $tempValue = substr($value, 0, 10);
                    } 
                    else{
                        $tempValue = $value;
                    }
                    // Check if not in db type
                    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $tempValue)) {
                        $arrBean[$key] = self::toIsoDateTime($value, false);
                    }
                    else{
                        $arrBean[$key] = self::toIsoDateTime($value, true);
                    }
                }
            } 
        }
    }
?>