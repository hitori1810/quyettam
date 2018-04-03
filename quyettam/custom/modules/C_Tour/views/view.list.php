<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    require_once 'include/MVC/View/views/view.list.php';

    class C_TourViewList extends ViewList
    {
        function listViewProcess()
        {
            $this->lv->showMassupdateFields = false;
            $this->lv->mergeduplicates = false;
            parent::listViewProcess();
        }
   
}