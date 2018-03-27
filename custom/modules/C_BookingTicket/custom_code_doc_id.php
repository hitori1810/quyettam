<?php 
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point'); 
    class Code1{
        function addCode1(&$bean, $event, $arguments)
        {
            $table = $bean->table_name;
            $airline = $bean->airline;
            $part = explode("-",$airline);
            $prefix = $part[0];
            if ($part[0] == "VNA") $prefix = $part[1];
            if ($part[0] == "SOR") $prefix = "DB";
            if ($bean->status == 'Refunded') $prefix = "RF";
            
            $add_date = true; 
            $date_format = 'ym';                                                        
            $separator = '';
            $code_field = 'internal_doc_id';
            $is_reset = '1';
            $zero_padding = 5;             
            $first_num = '00000';

            if((empty($bean->$code_field) && ($bean->status == 'Ticketed' || $bean->status == 'Exchanged' || $bean->status == 'Refunded' || $bean->status == 'Exchanged AA-TK' || $bean->status == 'EMD-Open' || $bean->status == 'EMD-Pending' || $bean->status == 'EMD-Refund')) 
            || (!empty($bean->$code_field) && strpos($bean->fetched_row[$code_field], $prefix) === false && ($bean->status == 'Ticketed' || $bean->status == 'Exchanged' || $bean->status == 'Refunded' || $bean->status == 'Exchanged AA-TK' || $bean->status == 'EMD-Open' || $bean->status == 'EMD-Pending' || $bean->status == 'EMD-Refund')))
            {
                //pattern to detect valid code.
                $pattern = "/^" . $prefix . ($add_date?"[0-9]{".strlen(date($date_format))."}":"") . $separator . "([0-9]+)$/";

                if( isset($pattern) ) {

                    $is_reset == '1' ? $len = strlen($prefix) + strlen(date($date_format)) : $len = strlen($prefix);
                    $is_reset == '1' ? $str = $prefix.date($date_format) : $str = $prefix;

                    $query = "SELECT ".$code_field." FROM " . $table ." WHERE ( ". $code_field . " <> '' AND ". $code_field . " IS NOT NULL) AND LEFT({$code_field},$len) = '$str' AND deleted <> 1 ORDER BY RIGHT(" . $code_field . ", ".$zero_padding.") DESC LIMIT 1";
                    $result = $GLOBALS['db']->query($query);

                    if($row = $GLOBALS['db']->fetchByAssoc($result)){
                        $last_code = $row[$code_field];
                    }
                    else{
                        //no codes exist, generate default - PREFIX + CURRENT YEAR +  SEPARATOR + FIRST NUM
                        $last_code = $prefix . ($add_date?date($date_format):"") . $separator . $first_num;
                    }

                    preg_match($pattern, $last_code, $matches);
                    $num=$matches[1];
                    $num++;
                    $pads = $zero_padding - strlen($num);
                    $new_code = $prefix . ($add_date?date($date_format):"") . $separator;

                    //preform the lead padding 0
                    for($i=0; $i < $pads; $i++) {
                        $new_code .= "0";
                    }
                    $new_code .= $num;

                    //write to database - Logic: Before Save
                    $bean->$code_field = $new_code;
                }  
            }
            
            $bean->name = $bean->internal_doc_id;
        }
    } 
?>
