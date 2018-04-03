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


    class UsersViewList extends ViewList{
        public function listViewProcess(){

            $this->processSearchForm();
            $this->lv->searchColumns = $this->searchForm->searchColumns;
            if(!empty($this->where))
                $this->where .= " AND (users.portal_user <> 1) ";
            else
                $this->where .= ' (users.portal_user <> 1) ';
            
            $this->where.=    ' AND (users.for_portal_only <> 1) ';
            
            if(!$this->headers)
                return;
            if(empty($_REQUEST['search_form_only']) || $_REQUEST['search_form_only'] == false){
                $this->lv->ss->assign("SEARCH",true);
                if(!empty($this->where)){
                    $this->where .= " AND";
                }
                $this->where .= " (users.status !='Reserved' or users.status is null) ";
                $this->lv->setup($this->seed, 'include/ListView/ListViewGeneric.tpl', $this->where, $this->params);
                $savedSearchName = empty($_REQUEST['saved_search_select_name']) ? '' : (' - ' . $_REQUEST['saved_search_select_name']);
                echo $this->lv->display();
            }
        }
    }
