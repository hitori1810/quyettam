<?php
 // created: 2015-10-01 11:52:04
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
    0 => 
    array (
      'widget_class' => 'SubPanelTopButtonQuickCreate',
    ),
    1 => 
    array (
      'widget_class' => 'SubPanelTopSelectButton',
      'mode' => 'MultiSelect',
    ),
  ),
);
