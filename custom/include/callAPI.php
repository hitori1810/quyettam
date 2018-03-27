<?php   
    require_once("custom/include/utils/APIFunctions.php");

    $controller = "SugarAPIFunction"; 
    $function = "callAPI".$_POST['_action'];
    if (method_exists($controller, $function) && is_callable(array($controller, $function))) {
        $APIController = new $controller();
        $result = $APIController->$function($_POST);
    } else {
        header("HTTP/1.0 404 Not Found");
        $result = array(            
            'error' => "no_action",
            'error_message' => "No action for this request for action ".$_POST['_action'],           
        ); 
    }  

    echo json_encode($result); 
    die();
?>      
