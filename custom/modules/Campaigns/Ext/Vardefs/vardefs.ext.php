<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-02-11 11:04:59
$dictionary["Campaign"]["fields"]["accounts_campaigns_1"] = array (
  'name' => 'accounts_campaigns_1',
  'type' => 'link',
  'relationship' => 'accounts_campaigns_1',
  'source' => 'non-db',
  'module' => 'Accounts',
  'bean_name' => 'Account',
  'side' => 'right',
  'vname' => 'LBL_ACCOUNTS_CAMPAIGNS_1_FROM_CAMPAIGNS_TITLE',
  'id_name' => 'accounts_campaigns_1accounts_ida',
  'link-type' => 'one',
);
$dictionary["Campaign"]["fields"]["accounts_campaigns_1_name"] = array (
  'name' => 'accounts_campaigns_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_CAMPAIGNS_1_FROM_ACCOUNTS_TITLE',
  'save' => true,
  'id_name' => 'accounts_campaigns_1accounts_ida',
  'link' => 'accounts_campaigns_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'name',
);
$dictionary["Campaign"]["fields"]["accounts_campaigns_1accounts_ida"] = array (
  'name' => 'accounts_campaigns_1accounts_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_ACCOUNTS_CAMPAIGNS_1_FROM_CAMPAIGNS_TITLE_ID',
  'id_name' => 'accounts_campaigns_1accounts_ida',
  'link' => 'accounts_campaigns_1',
  'table' => 'accounts',
  'module' => 'Accounts',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);

?>