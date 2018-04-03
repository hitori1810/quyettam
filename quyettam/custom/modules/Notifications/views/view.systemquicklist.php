<?php
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

require_once('modules/Notifications/views/view.quicklist.php');
require_once('custom/modules/Notifications/Notify.php');
class ViewSystemQuicklist extends ViewQuickList{
	function ViewSystemQuicklist(){
		parent::ViewQuickList();
	}

	function display(){
            global $current_user;
            //$data = $n->get_list('date_entered',$where);
            echo $this->_formatNotificationsForQuickDisplay($data['list'], "custom/modules/Notifications/tpls/quickView.tpl");
        }
        function _formatNotificationsForQuickDisplay($notifications, $tplFile){
            $notifications = new Notify();
            $html = '';
            $data1 = $notifications->getNewNotify();
            // $data = array_merge(,$notifications->getEmailCallMeetingTaskNotification(),$notifications->getAccountContactBirthday());
            if(count($data1)>0){
                $html .= '<tr>'; 
                $html .= '<td colspan="2" style="font-weight:bold; color:#F91E00";>'.$GLOBALS['app_strings']['LBL_NEW_TASK_CASE'].'</td>' ;
                $html .= '</tr>';
                for($i = 0; $i<count($data1);$i++){
                    $html .=  "<tr> <td><a class='checkreadnotify' id='".$data1[$i]['notify_id']."' href='index.php?module=".$data1[$i]['module_name']."&action=DetailView&record=".$data1[$i]['record_id']."' >".$data1[$i]['record_name']."</a></td><td>".translate('LBL_MODULE_NAME',$data1[$i]['module_name'])."</td></tr> ";
                } 
            }

            $data2 = $notifications->getEmailCallMeetingTaskNotification();
            if(count($data2)>0){
                $html .= '<tr>'; 
                $html .= '<td colspan="2" style="font-weight:bold; color:#F91E00">'.$GLOBALS['app_strings']['LBL_UNCOMPLETED_TASK_EMAIL'].'</td>' ;
                $html .= '</tr>';
                for($i = 0; $i<count($data2);$i++){
                    $html .=  "<tr> <td><a  href='index.php?module=".$data2[$i]['module_name']."&action=DetailView&record=".$data2[$i]['id']."' >".$data2[$i]['NAME']."</a></td><td>".translate('LBL_MODULE_NAME',$data2[$i]['module_name'])."</td></tr> ";
                } 
            }

            $data3 = $notifications->getAccountContactBirthday();

            if(count($data3)>0){
                $html .= '<tr>'; 
                $html .= '<td colspan="2" style="font-weight:bold; color:#F91E00">'.$GLOBALS['app_strings']['LBL_REMIND_BIRTHDAY'].'</td>' ;
                $html .= '</tr>';
                for($i = 0; $i<count($data3);$i++){
                    $html .=  "<tr> <td><a  href='index.php?module=".$data3[$i]['module_name']."&action=DetailView&record=".$data3[$i]['id']."' >".$data3[$i]['NAME']."</a></td><td>".translate('LBL_MODULE_NAME',$data3[$i]['module_name'])."</td></tr> ";
                } 
            }
            $this->ss->assign('DATA',$html);
            return $this->ss->display($tplFile);
        }
}