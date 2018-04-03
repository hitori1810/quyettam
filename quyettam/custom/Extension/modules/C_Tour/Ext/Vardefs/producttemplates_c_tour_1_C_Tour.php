<?php
// created: 2015-05-04 10:34:26
$dictionary["C_Tour"]["fields"]["producttemplates_c_tour_1"] = array (
  'name' => 'producttemplates_c_tour_1',
  'type' => 'link',
  'relationship' => 'producttemplates_c_tour_1',
  'source' => 'non-db',
  'module' => 'ProductTemplates',
  'bean_name' => 'ProductTemplate',
  'side' => 'right',
  'vname' => 'LBL_PRODUCTTEMPLATES_C_TOUR_1_FROM_C_TOUR_TITLE',
  'id_name' => 'producttemplates_c_tour_1producttemplates_ida',
  'link-type' => 'one',
);
$dictionary["C_Tour"]["fields"]["producttemplates_c_tour_1_name"] = array (
  'name' => 'producttemplates_c_tour_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PRODUCTTEMPLATES_C_TOUR_1_FROM_PRODUCTTEMPLATES_TITLE',
  'save' => true,
  'id_name' => 'producttemplates_c_tour_1producttemplates_ida',
  'link' => 'producttemplates_c_tour_1',
  'table' => 'product_templates',
  'module' => 'ProductTemplates',
  'rname' => 'name',
);
$dictionary["C_Tour"]["fields"]["producttemplates_c_tour_1producttemplates_ida"] = array (
  'name' => 'producttemplates_c_tour_1producttemplates_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_PRODUCTTEMPLATES_C_TOUR_1_FROM_C_TOUR_TITLE_ID',
  'id_name' => 'producttemplates_c_tour_1producttemplates_ida',
  'link' => 'producttemplates_c_tour_1',
  'table' => 'product_templates',
  'module' => 'ProductTemplates',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
