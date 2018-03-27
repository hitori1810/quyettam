<?php         
    require_once("custom/modules/C_TicketReport/DeliveryRevenue.php");
    require('custom/modules/Reports/fixLabelReport.php');
    $filter = $this->where;
    $parts = explode("AND", $filter);
    if(count($parts) >= 3){
        $start_date = get_string_between($parts[1],"'","'");
        $end_date    = get_string_between($parts[2],"'","'");
          
    }else{
        $start_date = get_string_between($parts[1],"'","'");
        $end_date    = get_string_between($parts[1],"'","'");
        
    }
    fixLabel();
    
    calDelivery($start_date , $end_date);
    function get_string_between($string, $start, $end){
        $string = " ".$string;
        $ini = strpos($string,$start);
        if ($ini == 0) return "";
        $ini += strlen($start);
        $len = strpos($string,$end,$ini) - $ini;
        return substr($string,$ini,$len);
    } 
           
?>