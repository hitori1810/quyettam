<?php
/**
 * Created by PhpStorm.
 * User: HaiLong
 * Date: 2/5/2015
 * Time: 6:25 PM
 */ 
class UsersLogicHook{
    //<editor-fold defaultstate="collapsed" desc="FUNCTION CREATE COOKIE - REMEMBER">
    function saveCookieRememberMe($bean){
        //using cookie
        if(isset($_POST['remember_me']) && $_POST['remember_me'] != ''){
            require_once('custom/modules/Users/UserHelper.php');
            $query = "SELECT system_key FROM systems";
            $unique_key = $GLOBALS['db']->getOne($query);
            $pass_encode =  blowfishEncode($unique_key,$_POST['user_password']);
            $string_login = $_POST['user_name'].'----'.$pass_encode;
            $string_cookie = blowfishEncode($unique_key,$string_login);
            UserHelper::setCookieRememberLogin($string_cookie);
        }
    }
    //</editor-fold>

    //<editor-fold defaultstate="collapsed" desc="FUNCTION REMOVER AFTER LOGOUT - REMOVE COOKIE">
    function removeCookieRememberMe($bean){
        //Modified By Long 08/02/2015 Remove Cookie Remember When Logout
        require_once('custom/modules/Users/UserHelper.php');
        UserHelper::deleteCookieRememberLogin();
        //End
    }
    //</editor-fold>
    
    /**
    * Crop the avatar image
    * 
    * @author   Thuan Nguyen
    * @param mixed $bean
    * @param mixed $event
    * @param mixed $arguments
    */
    function cropImage($bean, $event, $arguments) {
        //require library
        require_once('custom/include/utils/ImageHelper.php');
        //check if save action from EditView
        if (isset($_POST['module'])
            && $_POST['module'] == 'Users'
            && isset($_POST['action'])
            && $_POST['action'] == 'Save'
            && isset($_POST['page'])
            && $_POST['page'] == 'EditView'
            && isset($_POST['remove_imagefile_picture'])
            && $_POST['remove_imagefile_picture'] != 1
            && isset($_FILES['picture'])
            && $_FILES['picture']['error'] == 0)
            ImageHelper::crop($_POST, 'upload/'.$bean->picture); //crop the image
    }
    
    /**
    * Save user template references
    * 
    * @author   Thuan Nguyen
    * @param mixed $bean
    * @param mixed $event
    * @param mixed $arguments
    */
    function saveUserTemplateReferences($bean, $event, $arguments) {
        //require library
        require_once('modules/Users/UserTemplateHelper.php');
        if (isset($_REQUEST['user_template_id']) && $_REQUEST['user_template_id'] != '') {
            applyUserTemplate($_REQUEST['user_template_id'], $bean->id, false);
        }
    }
}