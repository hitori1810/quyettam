<?php
// created: 2015-03-20 18:01:47
$dictionary["C_Category"]["fields"]["c_category_c_category_1"] = array (
  'name' => 'c_category_c_category_1',
  'type' => 'link',
  'relationship' => 'c_category_c_category_1',
  'source' => 'non-db',
  'module' => 'C_Category',
  'bean_name' => 'C_Category',
  'vname' => 'LBL_C_CATEGORY_C_CATEGORY_1_FROM_C_CATEGORY_L_TITLE',
  'id_name' => 'c_category_c_category_1c_category_idb',
  'link-type' => 'many',
  'side' => 'left',
);
$dictionary["C_Category"]["fields"]["c_category_c_category_1_right"] = array (
  'name' => 'c_category_c_category_1_right',
  'type' => 'link',
  'relationship' => 'c_category_c_category_1',
  'source' => 'non-db',
  'module' => 'C_Category',
  'bean_name' => 'C_Category',
  'side' => 'right',
  'vname' => 'LBL_C_CATEGORY_C_CATEGORY_1_FROM_C_CATEGORY_R_TITLE',
  'id_name' => 'c_category_c_category_1c_category_ida',
  'link-type' => 'one',
);
$dictionary["C_Category"]["fields"]["c_category_c_category_1_name"] = array (
  'name' => 'c_category_c_category_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_CATEGORY_C_CATEGORY_1_FROM_C_CATEGORY_L_TITLE',
  'save' => true,
  'id_name' => 'c_category_c_category_1c_category_ida',
  'link' => 'c_category_c_category_1_right',
  'table' => 'c_category',
  'module' => 'C_Category',
  'rname' => 'document_name',
);
$dictionary["C_Category"]["fields"]["c_category_c_category_1c_category_ida"] = array (
  'name' => 'c_category_c_category_1c_category_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_CATEGORY_C_CATEGORY_1_FROM_C_CATEGORY_R_TITLE_ID',
  'id_name' => 'c_category_c_category_1c_category_ida',
  'link' => 'c_category_c_category_1_right',
  'table' => 'c_category',
  'module' => 'C_Category',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
