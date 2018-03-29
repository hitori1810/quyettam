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
            $bean->full_user_name = $bean->last_name.' '.$bean->first_name;
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

        // Show Login As button
        function showLoginAsButton(&$bean, $event, $arguments) {
            global $current_user, $mod_strings;

            if($_REQUEST['action'] != 'Popup') {
                // Only show Login As button if the current user is admin and the current row is not the current user
                if($current_user->is_admin == 1 && $bean->id != $current_user->id && $_SESSION['impersonating_user'] == null) {
                    $title = string_format($mod_strings['BTN_IMPERSONATE_TITLE'], array('user_name'=>$bean->name));
                    $button = '<a class="impersonateButton" href="index.php?module=Users&action=Impersonate&record='. $bean->id .'"><img src="themes/RacerX/images/view_inline.png" border="0"/></a>';
                    $bean->user_name .= '<img src="themes/default/images/blank.gif" onload="var btnHolder = $(this).closest(\'tr\').find(\'td:nth(1)\'); btnHolder.append(\''. htmlentities($button) .'\'); btnHolder.find(\'.impersonateButton\').attr(\'title\', \''. $title .'\')" border="0"/>';
                }
            }
        }

        function checkProtalUser($bean, $event, $arg) {
            //prevent portal user login from CRM's loginform
            if($bean->for_portal_only && (!empty($_REQUEST['user_password']))) {
                session_unset();
                session_destroy();
                die("<h2>You can not access to this site!<h2>");
            }
        }
}