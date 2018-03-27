<?php
$module_name = 'C_Category';
$OBJECT_NAME = 'C_CATEGORY';
$listViewDefs[$module_name] = 
array (
  'code' => 
  array (
    'type' => 'varchar',
    'label' => 'LBL_CODE',
    'width' => '10%',
    'default' => true,
  ),
  'document_name' => 
  array (
    'width' => '25%',
    'label' => 'LBL_NAME',
    'link' => true,
    'default' => true,
  ),
  'c_category_c_category_1_name' => 
  array (
    'type' => 'relate',
    'link' => true,
    'label' => 'LBL_C_CATEGORY_C_CATEGORY_1_FROM_C_CATEGORY_L_TITLE',
    'id' => 'C_CATEGORY_C_CATEGORY_1C_CATEGORY_IDA',
    'width' => '25%',
    'default' => true,
  ),
  'active_date' => 
  array (
    'width' => '15%',
    'label' => 'LBL_LIST_ACTIVE_DATE',
    'default' => true,
  ),
  'exp_date' => 
  array (
    'width' => '15%',
    'label' => 'LBL_LIST_EXP_DATE',
    'default' => true,
  ),
);
