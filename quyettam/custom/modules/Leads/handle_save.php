<?php

if (!defined('sugarEntry') || !sugarEntry)
    die('Not A Valid Entry Point');

class HandleSaveLead {

    public function randomString($length = 5) {
        $arrCharacter = str_shuffle(implode(array_merge(range('a', 'z'), range(0, 9)), ''));
        $result = substr($arrCharacter, 0, $length);
        return $result;
    }

    public function convertToOpp(&$bean, $event, $arguments){

        $opp = new Opportunity();

        $opp->name              = $bean->opportunity_name;
        $opp->amount            = $bean->opportunity_amount;
        $opp->opportunity_type  = $bean->opp_type;
        $opp->sales_stage       = $bean->opp_sales_stage;
        $opp->description       = $bean->opp_description;
        $opp->date_closed       = $bean->opp_date_closed;


        if($bean->opp_first_id != '' && $bean->opportunity_name != '' ){
            // $bean->opp_first_id != ''        => be able to UPDATE old Opp (>1st)
            $opp->save($bean->opp_first_id);    
        }else if ($bean->opp_first_id == '' && $bean->opportunity_name != ''  ){
            // $bean->opp_first_id == ''        => be able to CREATE new Opp (1st)
            $opp->save();
            $bean->opp_first_id     = $opp->id;    
        }
    }

    function HandleSave($bean, $event, $arguments) {
        //Add team global to team set
        $bean->load_relationship('teams');
        $bean->teams->add("1"); 
    }

}






















//if($_POST['status'] == 'Converted'){
//            $oppo = new Opportunity();
//            $oppo->sales_stage  = 'Closed Won';
//            $oppo->parent_type  = 'Leads';
//            $oppo->parent_name  = $_POST['first_name'] . ' ' . $_POST['last_name'];
//            $oppo->parent_id    = $bean->id;
//            $oppo->name         = 'Auto Convert To Account';
//            $oppo->save();
//        }