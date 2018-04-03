<?php
// created: 2015-03-23 11:03:55
$dictionary["Lead"]["fields"]["c_category_leads_1"] = array (
  'name' => 'c_category_leads_1',
  'type' => 'link',
  'relationship' => 'c_category_leads_1',
  'source' => 'non-db',
  'module' => 'C_Category',
  'bean_name' => 'C_Category',
  'side' => 'right',
  'vname' => 'LBL_C_CATEGORY_LEADS_1_FROM_LEADS_TITLE',
  'id_name' => 'c_category_leads_1c_category_ida',
  'link-type' => 'one',
);
$dictionary["Lead"]["fields"]["c_category_leads_1_name"] = array (
  'name' => 'c_category_leads_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_CATEGORY_LEADS_1_FROM_C_CATEGORY_TITLE',
  'save' => true,
  'id_name' => 'c_category_leads_1c_category_ida',
  'link' => 'c_category_leads_1',
  'table' => 'c_category',
  'module' => 'C_Category',
  'rname' => 'document_name',
);
$dictionary["Lead"]["fields"]["c_category_leads_1c_category_ida"] = array (
  'name' => 'c_category_leads_1c_category_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_CATEGORY_LEADS_1_FROM_LEADS_TITLE_ID',
  'id_name' => 'c_category_leads_1c_category_ida',
  'link' => 'c_category_leads_1',
  'table' => 'c_category',
  'module' => 'C_Category',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
