<?php
    class RestUtil{
        static $serviceUrl = "http://localhost/gotadi/custom/service/v4_1/rest.php";
        static $appName = 'Sync CRM With IP Call Center'; 
        static $version = '1';
        static $loginCmd = 'login';
        static $setEntryCmd = 'set_entry';
        static $getEntryCmd = 'get_entry';
        static $getEntriesCmd = 'get_entry_list';
        static $get_entries = 'get_entries';
        static $get_entries_count = 'get_entries_count';
        
        
        //function to make cURL request
        static function call($method, $parameters) {
            ob_start();
            $curl_request = curl_init();

            curl_setopt($curl_request, CURLOPT_URL, $url);
            curl_setopt($curl_request, CURLOPT_POST, 1);
            curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
            curl_setopt($curl_request, CURLOPT_HEADER, 0);
            curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);

            $jsonEncodedData = json_encode($parameters);

            $post = array(
                "method" => $method,
                "input_type" => "JSON",
                "response_type" => "JSON",
                "rest_data" => $jsonEncodedData
            );

            curl_setopt($curl_request, CURLOPT_POSTFIELDS, $post);
            $result = curl_exec($curl_request);
            curl_close($curl_request);              
            $response = json_decode($result);
            ob_end_flush();  
            return $response;
        }
        
        static function login($serviceUrl,$username,$password) {
            $loginParams = array(
                'user_auth' => array(
                    'user_name' => $username,
                    'password' => md5($password),
                    'version' => RestUtil::$version
                ),
                'application_name' => RestUtil::$appName,
                'name_value_list' => array(),
            );

            $loginResult = RestUtil::call(RestUtil::$loginCmd, $loginParams);
            
            return $loginResult->id;
        }
    }
?>