<?php
class J_PaymentLogicHooks{
    function saveData(&$bean, $event, $arg) {
        if ($_REQUEST['module'] == 'J_Payment') {
            //delete old pay detail
            if(!empty($bean->fetched_row['payment_detail'])){
                $oldPayDetail = json_decode($bean->fetched_row['payment_detail'], true);
                $oldPayDetailIds = array();
                foreach($oldPayDetail as $key => $value){
                    $oldPayDetailIds[] = $key;                            
                }   

                $deleteStr = implode("','", $oldPayDetailIds);

                $GLOBALS['db']->query("
                    DELETE FROM j_payment_detail
                    WHERE id IN ('$deleteStr')
                    ");         
            }


            //save new pay detail
            $payDetailArr = array();
            foreach($_POST['product'] as $key => $value){
                if(empty($value)) continue;
                
                $payDetail = new J_PaymentDetail();      
                $payDetail->payment         = $bean->id;    
                $payDetail->product         = $_POST['product'][$key];    
                $payDetail->quantity        = $_POST['quantity'][$key];    
                $payDetail->unit            = $_POST['unit'][$key]; 
                $payDetail->unit_cost       = $_POST['unit_cost'][$key]; 
                $payDetail->payment_amount  = $_POST['pay_detail_amount'][$key];   
                $payDetail->save(); 
                
                $payDetailArr[$payDetail->id] = array(
                    'product'       => $payDetail->product, 
                    'quantity'      => $payDetail->quantity, 
                    'unit'          => $payDetail->unit,    
                    'unit_cost'     => $payDetail->unit_cost,    
                    'payment_amount'    => $payDetail->payment_amount, 
                );
            } 
            
            $bean->payment_detail = json_encode($payDetailArr);
        }

    }
}
?>
