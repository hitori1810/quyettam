<?php 
 //WARNING: The contents of this file are auto-generated


 // created: 2015-10-01 11:49:21
$layout_defs["Leads"]["subpanel_setup"]['leads_c_bookingticket_1'] = array (
  'order' => 100,
  'module' => 'C_BookingTicket',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_LEADS_C_BOOKINGTICKET_1_FROM_C_BOOKINGTICKET_TITLE',
  'get_subpanel_data' => 'leads_c_bookingticket_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopCreateButton',
    ),
  ),
);


 // created: 2015-10-01 11:51:50
$layout_defs["Leads"]["subpanel_setup"]['leads_c_ticket_1'] = array (
  'order' => 100,
  'module' => 'C_Ticket',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_LEADS_C_TICKET_1_FROM_C_TICKET_TITLE',
  'get_subpanel_data' => 'leads_c_ticket_1',
  'top_buttons' => 
  array (
//    0 => 
//    array (
//      'widget_class' => 'SubPanelTopButtonQuickCreate',
//    ),
//    1 => 
//    array (
//      'widget_class' => 'SubPanelTopSelectButton',
//      'mode' => 'MultiSelect',
//    ),
  ),
);


 // created: 2015-03-26 08:48:14
$layout_defs["Leads"]["subpanel_setup"]['leads_opportunities_1'] = array (
  'order' => 100,
  'module' => 'Opportunities',
  'subpanel_name' => 'default',
  'sort_order' => 'asc',
  'sort_by' => 'id',
  'title_key' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
  'get_subpanel_data' => 'leads_opportunities_1',
  'top_buttons' => 
  array (
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    //1 => 
//    array (
//      'widget_class' => 'SubPanelTopSelectButton',
//      'mode' => 'MultiSelect',
//    ),
  ),
);


//auto-generated file DO NOT EDIT
$layout_defs['Leads']['subpanel_setup']['leads_opportunities_1']['override_subpanel_name'] = 'Lead_subpanel_leads_opportunities_1';

?>