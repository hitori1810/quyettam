<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

require_once 'include/MVC/View/views/view.list.php';

class C_HotelViewList extends ViewList
{
    function listViewProcess()
    {
        $this->lv->showMassupdateFields = false;
        $this->lv->mergeduplicates = false;
        parent::listViewProcess();
    }

    public function preDisplay(){
        parent::preDisplay();
        
        //add js for display star - 27/04/2015 - by Tung Bui Kim
        echo '<link rel="stylesheet" href="custom/include/javascripts/Starrr/starrr.min.css">';
        echo '<script type="text/javascript" src="custom/modules/C_Hotel/js/listview.js"></script>'; 
    }     
}