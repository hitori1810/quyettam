<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    require_once('include/entryPoint.php'); 
    $module = $_REQUEST['module'];
    $parent_value = $_REQUEST['parent_value'];
    $child_value = $_REQUEST['child_value'];

    if($module == 'C_Province'){
        $obj = new C_Province() ;
        $obj->country =$parent_value;
        $obj->name =  $child_value;
        $obj->assigned_user_id = $GLOBALS['current_user']->id;
        $obj->save();
        echo $obj->id;

    }
    elseif($module == 'C_District'){
        $obj = new C_District() ;
        $obj->c_district_c_provincec_province_ida =$parent_value;
        $obj->name =  $child_value;
        $obj->assigned_user_id = $GLOBALS['current_user']->id;
        $obj->save();
        echo $obj->id;
    }
    else{
        $obj = new C_Ward();
        $obj->name = $child_value;
        $obj->assigned_user_id = $GLOBALS['current_user']->id;
        $obj->c_ward_c_districtc_district_ida = $parent_value;
        $obj->save();
        echo $obj->id;
    }

?>