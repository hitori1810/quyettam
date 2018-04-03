<?php
// created: 2015-02-06 22:27:48
$dictionary["C_Ward"]["fields"]["c_ward_c_district"] = array (
  'name' => 'c_ward_c_district',
  'type' => 'link',
  'relationship' => 'c_ward_c_district',
  'source' => 'non-db',
  'module' => 'C_District',
  'bean_name' => false,
  'side' => 'right',
  'vname' => 'LBL_C_WARD_C_DISTRICT_FROM_C_WARD_TITLE',
  'id_name' => 'c_ward_c_districtc_district_ida',
  'link-type' => 'one',
);
$dictionary["C_Ward"]["fields"]["c_ward_c_district_name"] = array (
  'name' => 'c_ward_c_district_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_WARD_C_DISTRICT_FROM_C_DISTRICT_TITLE',
  'save' => true,
  'id_name' => 'c_ward_c_districtc_district_ida',
  'link' => 'c_ward_c_district',
  'table' => 'c_district',
  'module' => 'C_District',
  'rname' => 'name',
);
$dictionary["C_Ward"]["fields"]["c_ward_c_districtc_district_ida"] = array (
  'name' => 'c_ward_c_districtc_district_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_WARD_C_DISTRICT_FROM_C_WARD_TITLE_ID',
  'id_name' => 'c_ward_c_districtc_district_ida',
  'link' => 'c_ward_c_district',
  'table' => 'c_district',
  'module' => 'C_District',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
