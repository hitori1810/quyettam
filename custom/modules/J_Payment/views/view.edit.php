<?php

class J_PaymentViewEdit extends ViewEdit {

    function J_PaymentViewEdit(){
        parent::ViewEdit();
    }     
    public function display()
    {
        global $current_user, $app_strings, $mod_strings; 

        $sql = "SELECT id, name, unit, unit_cost
        FROM products
        WHERE deleted <> 1
        ORDER BY code";
        $result = $GLOBALS['db']->query($sql);  
        $productArr = array(
            array(
                'id'        => "",
                'name'      => "",
                'unit_cost' => "",
                'unit'      => "",
            )
        );
        while ($row = $GLOBALS['db']->fetchByAssoc($result)) {  
            $productArr[$row['id']] = array(
                'id'        => $row['id'],
                'name'      => $row['name'],
                'unit_cost' => unformat_number($row['unit_cost']),
                'unit'      => $row['unit'],
            );
        }                                       

        if(!empty($this->bean->payment_detail)){
            $payDetail = json_decode(html_entity_decode($this->bean->payment_detail), true);
            $payDetailHtml = "";
            foreach($payDetail as $key => $value){
                $smarty = new Sugar_Smarty();
                $smarty->assign('APP', $app_strings);                       
                $smarty->assign('PRODUCT_OPTIONS', $productArr);     
                $smarty->assign('SELECTED_PRODUCT', $value['product']);     
                $smarty->assign('QUANTITY', $value['quantity']);     
                $smarty->assign('UNIT_COST', $value['unit_cost']);     
                $smarty->assign('UNIT', $productArr[$value['product']]['unit']);     
                $smarty->assign('PAY_DETAIL_AMOUNT', $value['payment_amount']);     

                $payDetailHtml .= $smarty->fetch('custom/modules/J_Payment/tpls/PaymentDetailRow.tpl');    
            }   
        }

        $smarty = new Sugar_Smarty();
        $smarty->assign('APP', $app_strings);                             
        $smarty->assign('PRODUCT_OPTIONS', $productArr);   
        $payDetailTemplate = $smarty->fetch('custom/modules/J_Payment/tpls/PaymentDetailRow.tpl'); 

        $this->ss->assign('MOD', $mod_strings);
        $this->ss->assign('APP', $app_strings);
        $this->ss->assign('PAYMENT_DETAIL', $payDetailHtml);
        $this->ss->assign('PAYMENT_DETAIL_TEMPLATE',$payDetailTemplate);        
        parent::display();
    }
}