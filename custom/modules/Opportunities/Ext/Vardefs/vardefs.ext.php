<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-03-26 08:48:14
$dictionary["Opportunity"]["fields"]["leads_opportunities_1"] = array (
  'name' => 'leads_opportunities_1',
  'type' => 'link',
  'relationship' => 'leads_opportunities_1',
  'source' => 'non-db',
  'module' => 'Leads',
  'bean_name' => 'Lead',
  'side' => 'right',
  'vname' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'leads_opportunities_1leads_ida',
  'link-type' => 'one',
);
$dictionary["Opportunity"]["fields"]["leads_opportunities_1_name"] = array (
  'name' => 'leads_opportunities_1_name',
  'type' => 'relate',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_LEADS_TITLE',
  'save' => true,
  'id_name' => 'leads_opportunities_1leads_ida',
  'link' => 'leads_opportunities_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'name',
  'db_concat_fields' => 
  array (
    0 => 'first_name',
    1 => 'last_name',
  ),
);
$dictionary["Opportunity"]["fields"]["leads_opportunities_1leads_ida"] = array (
  'name' => 'leads_opportunities_1leads_ida',
  'type' => 'id',
  'source' => 'non-db',
  'vname' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_OPPORTUNITIES_TITLE_ID',
  'id_name' => 'leads_opportunities_1leads_ida',
  'link' => 'leads_opportunities_1',
  'table' => 'leads',
  'module' => 'Leads',
  'rname' => 'id',
  'reportable' => false,
  'side' => 'right',
  'massupdate' => false,
  'duplicate_merge' => 'disabled',
  'hideacl' => true,
);


// created: 2015-05-16 16:35:34
$dictionary["Opportunity"]["fields"]["opportunities_c_bookinghotel_1"] = array (
  'name' => 'opportunities_c_bookinghotel_1',
  'type' => 'link',
  'relationship' => 'opportunities_c_bookinghotel_1',
  'source' => 'non-db',
  'module' => 'C_BookingHotel',
  'bean_name' => 'C_BookingHotel',
  'vname' => 'LBL_OPPORTUNITIES_C_BOOKINGHOTEL_1_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'opportunities_c_bookinghotel_1opportunities_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-05-16 16:24:10
$dictionary["Opportunity"]["fields"]["opportunities_c_bookingticket_1"] = array (
  'name' => 'opportunities_c_bookingticket_1',
  'type' => 'link',
  'relationship' => 'opportunities_c_bookingticket_1',
  'source' => 'non-db',
  'module' => 'C_BookingTicket',
  'bean_name' => 'C_BookingTicket',
  'vname' => 'LBL_OPPORTUNITIES_C_BOOKINGTICKET_1_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'opportunities_c_bookingticket_1opportunities_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-05-16 16:39:46
$dictionary["Opportunity"]["fields"]["opportunities_c_bookingtour_1"] = array (
  'name' => 'opportunities_c_bookingtour_1',
  'type' => 'link',
  'relationship' => 'opportunities_c_bookingtour_1',
  'source' => 'non-db',
  'module' => 'C_BookingTour',
  'bean_name' => 'C_BookingTour',
  'vname' => 'LBL_OPPORTUNITIES_C_BOOKINGTOUR_1_FROM_OPPORTUNITIES_TITLE',
  'id_name' => 'opportunities_c_bookingtour_1opportunities_ida',
  'link-type' => 'many',
  'side' => 'left',
);


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


 // created: 2015-03-26 11:45:44
$dictionary['Opportunity']['fields']['description']['comments']='Full text of the note';
$dictionary['Opportunity']['fields']['description']['merge_filter']='disabled';
$dictionary['Opportunity']['fields']['description']['calculated']=false;
$dictionary['Opportunity']['fields']['description']['rows']='4';
$dictionary['Opportunity']['fields']['description']['cols']='60';

 

    /***
    * Create by Hai Nguyen
    */
    // define field store parent option of Opp Account/Leads

    //  $dictionary["Opportunity"]["fields"]["auto_convert_lead"] = array (
    //        'name'      => 'auto_convert_lead',
    //        'vname'     => 'LBL_AUTO_CONVERT_LEAD',
    //        'type'      => 'bool',
    //        'dbType'    => 'tinyint',
    //        'default'   => 0,
    //  );

    $dictionary["Opportunity"]["fields"]["parent_name"] = array (
        'name' => 'parent_name',
        'vname' => 'LBL_PARENT_NAME',
        'type' => 'parent',
        'massupdate' => 0,
        'dbtype' => 'varchar',
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => false,
        'reportable' => true,
        'len' => 100,
        'size' => '20',
        'options' => 'parent_type_display',
        'studio' => 'visible',
        'type_name' => 'parent_type',
        'id_name' => 'parent_id',
        'parent_type' => 'parent_type_display',
    );
    $dictionary["Opportunity"]["fields"]["parent_type"] = array (
        'required' => false,
        'name' => 'parent_type',
        'vname' => 'LBL_PARENT_TYPE',
        'type' => 'parent_type',
        'massupdate' => 0,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => 0,
        'audited' => false,
        'reportable' => true,
        'len' => 50,
        'size' => '20',
        'default' => '',
        'dbType' => 'varchar',
        'studio' => 'hidden',
    );
    $dictionary["Opportunity"]["fields"]["parent_id"] = array (
        'required' => false,
        'name' => 'parent_id',
        'vname' => 'LBL_PARENT_ID',
        'type' => 'id',
        'massupdate' => 0,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => 0,
        'audited' => false,
        'reportable' => true,
        'len' => 36,
        'size' => '20',
    );
    $dictionary["Opportunity"]["fields"]["account_name"] = array (
        'name' => 'account_name',
        'rname' => 'name',
        'id_name' => 'account_id',
        'vname' => 'LBL_ACCOUNT_NAME',
        'type' => 'relate',
        'table' => 'accounts',
        'join_name'=>'accounts',
        'isnull' => 'true',
        'module' => 'Accounts',
        'dbType' => 'varchar',
        'link'=>'accounts',
        'len' => '255',
        'source'=>'non-db',
        'unified_search' => true,
        'required' => true,
        'importable' => 'required',
        'required' => false,
    );
    $dictionary["Opportunity"]["fields"]["currency"] = array (
        'required' => true,
        'name' => 'currency',
        'vname' => 'LBL_CURRENCY',
        'type' => 'enum',
        'massupdate' => true,
        'default' => 'VND',
        'comments' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => true,
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'calculated' => false,
        'len' => 30,
        'size' => '20',
        'options' => 'currency_list',
        'studio' => 'visible',
        'dependency' => false
    );

    $dictionary["Opportunity"]["fields"]["won_amount"] = array (
        'required' => false,
        'name' => 'won_amount',
        'vname' => 'LBL_WON_AMOUNT',
        'type' => 'currency',
        'massupdate' => 0,
        'no_default' => false,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => true,
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'calculated' => false,
        'len' => 26,
        'size' => '20',
        'enable_range_search' => true,
        'options' => 'numeric_range_search_dom',
        'precision' => 2,
    );



?>