<?php
    //include_once("custom/include/utils/RestUtil.php");
    class APIV10Helper {
        var $site_url;        
        var $restv4_url;
        var $loginMethod = 'oauth2/token';
        var $base_url = "";             
        public function __construct() {  
            global $sugar_config;
            $this->site_url = $sugar_config['site_url'];  //"http://172.16.100.222/uat-crm.gotadi.com";//  
            $this->restv4_url = $this->site_url.'/service/v4_1/rest.php';            
            $this->base_url = $this->site_url."/rest/v10/";            
        }
        function checkToken () {
            return($_SERVER);
        }
        
        function login($username,$password) {
            $loginParams = array(
                'user_auth' => array(
                    'user_name' => $username,
                    'password' => md5($password),
                    'version' => '1'
                ),
                'application_name' => "UATVerson",
                'name_value_list' => array(),
            );
           
            $loginResult = $this->callV4("login", $loginParams);   
            if($loginResult->id) {
                return array('access_token' => $loginResult->id);
            }
            return $loginResult;
        }

        function callAPI($action, $oauthtoken='', $type='GET', $arguments=array(), $encodeData=true, $returnHeaders=false) {
            if($action == $this->loginMethod) {
             //   return $this->login($arguments['username'],$arguments['password']);
            }
            if($type == 'PUT') {
                return $this->callUpdateObject($action, $oauthtoken, $arguments); 
            } else {
                return $this->call($action, $oauthtoken, $type, $arguments, $encodeData, $returnHeaders);
            }
        }

        function call($action, $oauthtoken='', $type='GET', $arguments=array(), $encodeData=true, $returnHeaders=false){
            //base
            $url = $this->base_url.$action;              
            //end
            $type = strtoupper($type);
            if ($type == 'GET'){
                $url .= "?" . http_build_query($arguments);
            }
            $curl_request = curl_init($url);
            if ($type == 'POST')    {
                curl_setopt($curl_request, CURLOPT_POST, 1);
            }elseif ($type == 'PUT')    {
                curl_setopt($curl_request, CURLOPT_CUSTOMREQUEST, "PUT");
            }elseif ($type == 'DELETE')    {
                curl_setopt($curl_request, CURLOPT_CUSTOMREQUEST, "DELETE");
            }
            curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
            curl_setopt($curl_request, CURLOPT_HEADER, $returnHeaders);
            curl_setopt($curl_request, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl_request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl_request, CURLOPT_FOLLOWLOCATION, 0);

            if (!empty($oauthtoken))    {
                $token = array("oauth-token: {$oauthtoken}");
                curl_setopt($curl_request, CURLOPT_HTTPHEADER, $token);
            }

            if (!empty($arguments) && $type !== 'GET')    {
                if ($encodeData)        {
                    //encode the arguments as JSON
                    $arguments = json_encode($arguments);
                }
                curl_setopt($curl_request, CURLOPT_POSTFIELDS, $arguments);
            }

            $result = curl_exec($curl_request);

            if ($returnHeaders)    {
                //set headers from response
                list($headers, $content) = explode("\r\n\r\n", $result ,2);
                foreach (explode("\r\n",$headers) as $header){
                    header($header);
                }

                //return the nonheader data
                return trim($content);
            }

            curl_close($curl_request);

            //decode the response from JSON
            $response = json_decode($result);             
            return $response;
        }            

        function callUpdateObject($action, $oauthtoken='', $arguments=array()) {
            $params = explode("/",$action);
            $updates = array(
                array('name' => 'id','value' => $params['1'],),
            );

            foreach($arguments as $key => $val) {
                $updates[] = array('name' => $key,'value' => $val,);
            }

            $updateParams = array(
                'session' => $oauthtoken,
                'module_name' => $params[0],                 
                "name_value_list" => $updates,
            );

            $result = $this->callV4('set_entry', $updateParams);

            $search = $this->callAPI($action, $oauthtoken);
            return $search;
        } 

        function callV4($method, $parameters) {               
            $url = $this->restv4_url;
            ob_start();
             
            $curl_request = curl_init();
           
            curl_setopt($curl_request, CURLOPT_URL, $url);
            curl_setopt($curl_request, CURLOPT_POST, 1);
            curl_setopt($curl_request, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_0);
            curl_setopt($curl_request, CURLOPT_HEADER, 1);
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

            $result = explode("\r\n\r\n", $result, 2);
            $response = json_decode($result[1]);
            ob_end_flush();

            return $response;
        }         
    }
?>
