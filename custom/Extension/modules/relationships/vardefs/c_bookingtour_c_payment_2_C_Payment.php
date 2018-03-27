<?php
// created: 2015-05-18 16:03:05
$dictionary["C_Payment"]["fields"]["c_bookingtour_c_payment_2"] = array (
  'name' => 'c_bookingtour_c_payment_2',
  'type' => 'link',
  'relationship' => 'c_bookingtour_c_payment_2',
  'source' => 'non-db',
  'module' => 'C_BookingTour',
  'bean_name' => 'C_BookingTour',
  'side' => 'right',
  'vname' => 'LBL_C_BOOKINGTOUR_C_PAYMENT_2_FROM_C_PAYMENT_TITLE',
  'id_name' => 'c_bookingtour_c_payment_2c_bookingtour_ida',
  'link-type' => 'one',
);
$dictionary["C_Payment"]["fields"]["c_bookingtour_c_payment_2_name"] = array (
  'name' => 'c_bookingtour_c_payment_2_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_BOOKINGTOUR_C_PAYMENT_2_FROM_C_BOOKINGTOUR_TITLE',
  'save' => true,
  'id_name' => 'c_bookingtour_c_payment_2c_bookingtour_ida',
  'link' => 'c_bookingtour_c_payment_2',
  'table' => 'c_bookingtour',
  'module' => 'C_BookingTour',
  'rname' => 'name',
);
$dictionary["C_Payment"]["fields"]["c_bookingtour_c_payment_2c_bookingtour_ida"] = array (
  'name' => 'c_bookingtour_c_payment_2c_bookingtour_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_BOOKINGTOUR_C_PAYMENT_2_FROM_C_PAYMENT_TITLE_ID',
  'id_name' => 'c_bookingtour_c_payment_2c_bookingtour_ida',
  'link' => 'c_bookingtour_c_payment_2',
  'table' => 'c_bookingtour',
  'module' => 'C_BookingTour',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
