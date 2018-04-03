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


    class AccountsViewEdit extends ViewEdit
    {
        public function __construct()
        {
            parent::ViewEdit();
            $this->useForSubpanel = true;
            $this->useModuleQuickCreateTemplate = true;
        }
        function display(){
            global $beanFiles;
 //           echo '<link rel="stylesheet" type="text/css" href="custom/include/javascripts/alertify/alertify.css">';
            
            //if(!isset($this->bean->id) || empty($this->bean->id)){
//                //Check NEWID
//                $this->ss->assign('NEWID', '<span style="color:red;font-weight:bold"> Auto-generate </span>');
//
//            }else{
//                //Check NEWID
//                $this->ss->assign('NEWID', '<span style="color:red;font-weight:bold" id = "code">'.$this->bean->code.'</span>'); 
//            }
            parent::display();
        }

}