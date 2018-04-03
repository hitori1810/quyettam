<?php 
    include_once("custom/include/APIv10Helper.php");
    $data = $_POST;
    $action = $data['_action'];     
    $oauthtoken = $data['access_token']?$data['access_token']:"";
    $type = $data['type']?$data['type']:"GET";
    $arguments = $data['params'];
    if(!$type) die(0);

    $callAPIO = new APIV10Helper();     
    $filter_response = $callAPIO->callAPI($action, $oauthtoken, $type, $arguments);

    /*$login_params = array(
        'grant_type'=> 'password',
        'client_id'=> 'sugar',
        'client_secret'=> '',
        'username'=> 'trung.nguyen',
        'password'=> 'onlinecrmvn',             
        'platform'=> 'base'
    ); 
    $filter_response = $callAPIO->callAPI('oauth2/token', '', "POST", $login_params);    */

    echo json_encode($filter_response);
    die;      
?>