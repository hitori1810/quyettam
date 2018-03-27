<?php
// created: 2015-03-05 14:11:22
$dictionary["C_BookingTour"]["fields"]["c_tour_c_bookingtour_1"] = array (
  'name' => 'c_tour_c_bookingtour_1',
  'type' => 'link',
  'relationship' => 'c_tour_c_bookingtour_1',
  'source' => 'non-db',
  'module' => 'C_Tour',
  'bean_name' => 'C_Tour',
  'side' => 'right',
  'vname' => 'LBL_C_TOUR_C_BOOKINGTOUR_1_FROM_C_BOOKINGTOUR_TITLE',
  'id_name' => 'c_tour_c_bookingtour_1c_tour_ida',
  'link-type' => 'one',
);
$dictionary["C_BookingTour"]["fields"]["c_tour_c_bookingtour_1_name"] = array (
  'name' => 'c_tour_c_bookingtour_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_TOUR_C_BOOKINGTOUR_1_FROM_C_TOUR_TITLE',
  'save' => true,
  'id_name' => 'c_tour_c_bookingtour_1c_tour_ida',
  'link' => 'c_tour_c_bookingtour_1',
  'table' => 'c_tour',
  'module' => 'C_Tour',
  'rname' => 'name',
);
$dictionary["C_BookingTour"]["fields"]["c_tour_c_bookingtour_1c_tour_ida"] = array (
  'name' => 'c_tour_c_bookingtour_1c_tour_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_TOUR_C_BOOKINGTOUR_1_FROM_C_BOOKINGTOUR_TITLE_ID',
  'id_name' => 'c_tour_c_bookingtour_1c_tour_ida',
  'link' => 'c_tour_c_bookingtour_1',
  'table' => 'c_tour',
  'module' => 'C_Tour',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
