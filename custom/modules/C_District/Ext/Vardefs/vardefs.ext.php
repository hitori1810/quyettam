<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-02-06 22:27:47
$dictionary["C_District"]["fields"]["c_district_c_province"] = array (
  'name' => 'c_district_c_province',
  'type' => 'link',
  'relationship' => 'c_district_c_province',
  'source' => 'non-db',
  'module' => 'C_Province',
  'bean_name' => 'C_Province',
  'side' => 'right',
  'vname' => 'LBL_C_DISTRICT_C_PROVINCE_FROM_C_DISTRICT_TITLE',
  'id_name' => 'c_district_c_provincec_province_ida',
  'link-type' => 'one',
);
$dictionary["C_District"]["fields"]["c_district_c_province_name"] = array (
  'name' => 'c_district_c_province_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_C_DISTRICT_C_PROVINCE_FROM_C_PROVINCE_TITLE',
  'save' => true,
  'id_name' => 'c_district_c_provincec_province_ida',
  'link' => 'c_district_c_province',
  'table' => 'c_province',
  'module' => 'C_Province',
  'rname' => 'name',
);
$dictionary["C_District"]["fields"]["c_district_c_provincec_province_ida"] = array (
  'name' => 'c_district_c_provincec_province_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_C_DISTRICT_C_PROVINCE_FROM_C_DISTRICT_TITLE_ID',
  'id_name' => 'c_district_c_provincec_province_ida',
  'link' => 'c_district_c_province',
  'table' => 'c_province',
  'module' => 'C_Province',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-02-06 22:27:48
$dictionary["C_District"]["fields"]["c_ward_c_district"] = array (
  'name' => 'c_ward_c_district',
  'type' => 'link',
  'relationship' => 'c_ward_c_district',
  'source' => 'non-db',
  'module' => 'C_Ward',
  'bean_name' => false,
  'vname' => 'LBL_C_WARD_C_DISTRICT_FROM_C_DISTRICT_TITLE',
  'id_name' => 'c_ward_c_districtc_district_ida',
  'link-type' => 'many',
  'side' => 'left',
);

?>