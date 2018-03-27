<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

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


    class C_TicketViewEdit extends ViewEdit
    {
        
        function display(){
            global $timedate;
            if(!empty($this->bean->refund_code)){
                $this->ss->assign('REFUND_CODE','<span style = "font-weight: bold; color:red;">'.$this->bean->refund_code."</span>");
            }
            else {
                 $this->ss->assign('REFUND_CODE','<span style = "font-weight: bold; color:red;"> Auto-generate</span>');
            }
            if ($_GET[refunded]==1){
             $this->bean->refunded = 1;
             $this->bean->refund_date = $timedate->nowDate();   
            } 
            parent::display(); 
        }
}