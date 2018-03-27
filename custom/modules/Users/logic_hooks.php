<?php
// Do not store anything in this file that is not part of the array or the hook version.  This file will	
// be automatically rebuilt in the future. 
 $hook_version = 1; 
$hook_array = Array(); 
// position, file, function 
$hook_array['after_login'] = Array(); 
$hook_array['after_login'][] = Array(1, 'SugarFeed old feed entry remover', 'modules/SugarFeed/SugarFeedFlush.php','SugarFeedFlush', 'flushStaleEntries'); 
$hook_array['after_login'][] = Array(2, 'Create Remember Me Cookie', 'custom/modules/Users/UsersLogicHook.php','UsersLogicHook', 'saveCookieRememberMe');
$hook_array['after_logout'] = Array();
$hook_array['after_logout'][] = Array(1, 'Remove Remember Me Cookie', 'custom/modules/Users/UsersLogicHook.php','UsersLogicHook', 'removeCookieRememberMe');
$hook_array['after_login'][] = Array(2, 'Remember Me Cookie', 'custom/modules/Users/UsersLogicHook.php','UsersLogicHook', 'SaveCookieRememberMe'); 

/**
* Customize avatar picture upload
* 
* @author Thuan Nguyen
*/
$hook_array['before_save'] = array();
$hook_array['before_save'][] = array(1, 'Crop the avatar', 'custom/modules/Users/UsersLogicHook.php', 'UsersLogicHook', 'cropImage');
/**
* Save reference of user template
* 
* @author Thuan Nguyen
*/
$hook_array['after_save'] = array();
$hook_array['after_save'][] = array(1, 'Save references of user template', 'custom/modules/Users/UsersLogicHook.php', 'UsersLogicHook', 'saveUserTemplateReferences');
?>