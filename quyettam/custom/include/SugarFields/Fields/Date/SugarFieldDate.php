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

    require_once('include/SugarFields/Fields/Datetime/SugarFieldDatetime.php');

    class SugarFieldDate extends SugarFieldDatetime {

        /**
        * Handles export field sanitizing for field type
        *
        * @param $value string value to be sanitized
        * @param $vardef array representing the vardef definition
        * @param $focus SugarBean object
        * @param $row Array of a row of data to be exported
        *
        * @return string sanitized value
        */
        public function exportSanitize($value, $vardef, $focus, $row=array())
        {
            $timedate = TimeDate::getInstance();
            $db = DBManagerFactory::getInstance();
            //If it's in ISO format, convert it to db format
            if(preg_match('/(\d{4})\-?(\d{2})\-?(\d{2})T(\d{2}):?(\d{2}):?(\d{2})\.?\d*([Z+-]?)(\d{0,2}):?(\d{0,2})/i', $value)) {
                $value = $timedate->fromIso($value)->asDbDate(false);
            }

            return $timedate->to_display_date($db->fromConvert($value, 'date'), false);
        }
        public function save($bean, $inputData, $field, $def, $prefix = '') {
            //Handle save field Day of Birth - By lap Nguyen  
            if(!empty($def['key']) && str_replace($def['key'].'_','',$field) == 'date_dob'){
                !empty($inputData[$def['key'].'_'.'_day']) ? $day = $inputData[$def['key'].'_'.'_day'] : $day='00';
                !empty($inputData[$def['key'].'_'.'_month']) ? $month = $inputData[$def['key'].'_'.'_month'] : $month='00';
                !empty($inputData[$def['key'].'_'.'_year']) ? $year = $inputData[$def['key'].'_'.'_year'] : $year='0000';
                $inputData[$field] =  $year.'-'.$month.'-'.$day;
                $bean->$field = $inputData[$field];
            }else{
                global $timedate;
                if ( !isset($inputData[$prefix.$field]) ) {
                    return;
                }

                $offset = strlen(trim($inputData[$prefix.$field])) < 11 ? false : true;
                if ($timedate->check_matching_format($inputData[$prefix.$field], TimeDate::DB_DATE_FORMAT)) {
                    $bean->$field = $inputData[$prefix.$field];
                } else {
                    $bean->$field = $timedate->to_db_date($inputData[$prefix.$field], $offset);
                }
            }
        }
}