<?php
// created: 2015-07-29 09:50:02
$dictionary["C_Ticket"]["fields"]["c_ticket_c_ticket_1"] = array (
  'name' => 'c_ticket_c_ticket_1',
  'type' => 'link',
  'relationship' => 'c_ticket_c_ticket_1',
  'source' => 'non-db',
  'module' => 'C_Ticket',
  'bean_name' => 'C_Ticket',
  'vname' => 'LBL_C_TICKET_C_TICKET_1_FROM_C_TICKET_L_TITLE',
  'id_name' => 'c_ticket_c_ticket_1c_ticket_idb',
  'link-type' => 'many',
  'side' => 'left',
);
$dictionary["C_Ticket"]["fields"]["c_ticket_c_ticket_1_right"] = array (
  'name' => 'c_ticket_c_ticket_1_right',
  'type' => 'link',
  'relationship' => 'c_ticket_c_ticket_1',
  'source' => 'non-db',
  'module' => 'C_Ticket',
  'bean_name' => 'C_Ticket',
  'side' => 'right',
  'vname' => 'LBL_C_TICKET_C_TICKET_1_FROM_C_TICKET_R_TITLE',
  'id_name' => 'c_ticket_c_ticket_1c_ticket_ida',
  'link-type' => 'one',
);
$dictionary["C_Ticket"]["fields"]["c_ticket_c_ticket_1_name"] = array (
  'name' => 'c_ticket_c_ticket_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_TICKET_C_TICKET_1_FROM_C_TICKET_L_TITLE',
  'save' => true,
  'id_name' => 'c_ticket_c_ticket_1c_ticket_ida',
  'link' => 'c_ticket_c_ticket_1_right',
  'table' => 'c_ticket',
  'module' => 'C_Ticket',
  'rname' => 'name',
);
$dictionary["C_Ticket"]["fields"]["c_ticket_c_ticket_1c_ticket_ida"] = array (
  'name' => 'c_ticket_c_ticket_1c_ticket_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_TICKET_C_TICKET_1_FROM_C_TICKET_R_TITLE_ID',
  'id_name' => 'c_ticket_c_ticket_1c_ticket_ida',
  'link' => 'c_ticket_c_ticket_1_right',
  'table' => 'c_ticket',
  'module' => 'C_Ticket',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
