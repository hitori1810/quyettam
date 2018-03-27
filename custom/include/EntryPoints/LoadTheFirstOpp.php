<?php

  $opp_first_id = $_POST['opp_first_id'];
  $opp = new Opportunity();
  $objOpp = $opp->retrieve($opp_first_id);
  
  $arrOpp['opportunity_name']   = $objOpp->name;
  $arrOpp['opportunity_amount'] = $objOpp->amount;
  $arrOpp['opp_type']           = $objOpp->opportunity_type;
  $arrOpp['opp_sales_stage']    = $objOpp->sales_stage;
  $arrOpp['opp_date_closed']    = $objOpp->date_closed;
  $arrOpp['opp_description']    = $objOpp->opp_description;

  echo json_encode($arrOpp);
  
?>
