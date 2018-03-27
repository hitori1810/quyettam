<?php
// created: 2015-05-04 10:36:51
$dictionary["Opportunity"]["fields"]["producttemplates_opportunities_1"] = array (
  'name' => 'producttemplates_opportunities_1',
  'type' => 'link',
  'relationship' => 'producttemplates_opportunities_1',
  'source' => 'non-db',
  'module' => 'ProductTemplates',
  'bean_name' => 'ProductTemplate',
  'side' => 'right',
  'vname' => 'LBL_PRODUCTTEMPLATES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'producttemplates_opportunities_1producttemplates_ida',
  'link-type' => 'one',
);
$dictionary["Opportunity"]["fields"]["producttemplates_opportunities_1_name"] = array (
  'name' => 'producttemplates_opportunities_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_PRODUCTTEMPLATES_OPPORTUNITIES_1_FROM_PRODUCTTEMPLATES_TITLE',
  'save' => true,
  'id_name' => 'producttemplates_opportunities_1producttemplates_ida',
  'link' => 'producttemplates_opportunities_1',
  'table' => 'product_templates',
  'module' => 'ProductTemplates',
  'rname' => 'name',
);
$dictionary["Opportunity"]["fields"]["producttemplates_opportunities_1producttemplates_ida"] = array (
  'name' => 'producttemplates_opportunities_1producttemplates_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_PRODUCTTEMPLATES_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE_ID',
  'id_name' => 'producttemplates_opportunities_1producttemplates_ida',
  'link' => 'producttemplates_opportunities_1',
  'table' => 'product_templates',
  'module' => 'ProductTemplates',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);
