<?php
  // Add by Tung Bui - 07/09/2017
  $admin_option_defs = array();
  $admin_option_defs['Administration']['general_config']= array('Administration','LBL_GENERAL_CONFIG','LBL_GENERAL_CONFIG_DESC','./index.php?module=Administration&action=generalconfig');

  $admin_group_header[]= array('LBL_ATLANTIC_CONFIG','',false,$admin_option_defs, 'LBL_ATLANTIC_CONFIG_DESC');
    
  //-------END------------//
?>
