<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-02-11 11:04:59
$dictionary["Account"]["fields"]["accounts_campaigns_1"] = array (
  'name' => 'accounts_campaigns_1',
  'type' => 'link',
  'relationship' => 'accounts_campaigns_1',
  'source' => 'non-db',
  'module' => 'Campaigns',
  'bean_name' => 'Campaign',
  'vname' => 'LBL_ACCOUNTS_CAMPAIGNS_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_campaigns_1accounts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-03-05 14:18:59
$dictionary["Account"]["fields"]["accounts_c_bookinghotel_1"] = array (
  'name' => 'accounts_c_bookinghotel_1',
  'type' => 'link',
  'relationship' => 'accounts_c_bookinghotel_1',
  'source' => 'non-db',
  'module' => 'C_BookingHotel',
  'bean_name' => 'C_BookingHotel',
  'vname' => 'LBL_ACCOUNTS_C_BOOKINGHOTEL_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_c_bookinghotel_1accounts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-03-24 09:12:26
$dictionary["Account"]["fields"]["accounts_c_bookingticket_1"] = array (
  'name' => 'accounts_c_bookingticket_1',
  'type' => 'link',
  'relationship' => 'accounts_c_bookingticket_1',
  'source' => 'non-db',
  'module' => 'C_BookingTicket',
  'bean_name' => 'C_BookingTicket',
  'vname' => 'LBL_ACCOUNTS_C_BOOKINGTICKET_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_c_bookingticket_1accounts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-03-05 14:16:16
$dictionary["Account"]["fields"]["accounts_c_bookingtour_1"] = array (
  'name' => 'accounts_c_bookingtour_1',
  'type' => 'link',
  'relationship' => 'accounts_c_bookingtour_1',
  'source' => 'non-db',
  'module' => 'C_BookingTour',
  'bean_name' => 'C_BookingTour',
  'vname' => 'LBL_ACCOUNTS_C_BOOKINGTOUR_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_c_bookingtour_1accounts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-04-06 15:51:51
$dictionary["Account"]["fields"]["accounts_c_ticketreport_1"] = array (
  'name' => 'accounts_c_ticketreport_1',
  'type' => 'link',
  'relationship' => 'accounts_c_ticketreport_1',
  'source' => 'non-db',
  'module' => 'C_TicketReport',
  'bean_name' => 'C_TicketReport',
  'vname' => 'LBL_ACCOUNTS_C_TICKETREPORT_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_c_ticketreport_1accounts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-04-15 15:51:36
$dictionary["Account"]["fields"]["accounts_c_ticket_1"] = array (
  'name' => 'accounts_c_ticket_1',
  'type' => 'link',
  'relationship' => 'accounts_c_ticket_1',
  'source' => 'non-db',
  'module' => 'C_Ticket',
  'bean_name' => 'C_Ticket',
  'vname' => 'LBL_ACCOUNTS_C_TICKET_1_FROM_ACCOUNTS_TITLE',
  'id_name' => 'accounts_c_ticket_1accounts_ida',
  'link-type' => 'many',
  'side' => 'left',
);


 // created: 2015-03-26 10:07:26
$dictionary['Account']['fields']['description']['comments']='Full text of the note';
$dictionary['Account']['fields']['description']['merge_filter']='disabled';
$dictionary['Account']['fields']['description']['calculated']=false;
$dictionary['Account']['fields']['description']['rows']='4';
$dictionary['Account']['fields']['description']['cols']='60';

 

 // created: 2016-08-31 12:12:50
$dictionary['Account']['fields']['project_i_d_c']['labelValue']='Project ID';
$dictionary['Account']['fields']['project_i_d_c']['enforced']='';
$dictionary['Account']['fields']['project_i_d_c']['dependency']='';

 

    $dictionary["Account"]["fields"]["short_name"] = array (
        'name'=> 'short_name', 
        'vname' => 'LBL_SHORT_NAME',
        'type'  => 'varchar',
        'len'   => 150,
        'unified_search' => true,
    );
    $dictionary["Account"]["fields"]["tax_code"] = array (
        'name'=> 'tax_code', 
        'vname' => 'LBL_TAX_CODE',
        'type'  => 'varchar',
        'len'   => 50,
        'unified_search' => true,
    );
    $dictionary["Account"]["fields"]['mobile_phone'] = array ( 
        'name'      => 'mobile_phone',
        'vname'     => 'LBL_MOBILE_PHONE',
        'type'  => 'varchar',
        'len'   => 50,
        'unified_search' => true,
    );
    $dictionary['Account']['fields']['bank_name'] = array(
        'name' => 'bank_name',
        'vname' => 'LBL_BANK_NAME',
        'type' => 'enum',
        'options' => 'bank_name_options',
    );
    $dictionary['Account']['fields']['bank_account_number'] = array(
        'name' => 'bank_account_number',
        'vname' => 'LBL_BANK_ACCOUNT_NUMBER',
        'type' => 'varchar',
    );
    $dictionary['Account']['fields']['bank_account_holder'] = array(
        'name' => 'bank_account_holder',
        'vname' => 'LBL_BANK_ACCOUNT_HOLDER',
        'type' => 'varchar',
    );
    $dictionary['Account']['fields']['bank_branch'] = array(
        'name' => 'bank_branch',
        'vname' => 'LBL_BANK_BRANCH',
        'type' => 'varchar',
    );
    //***************  Fields Birthdate - Added By Lap Nguyen *************************
    $dictionary['Account']['fields']['dob_day'] = array (
        'required' => false,
        'name' => 'dob_day',
        'vname' => 'LBL_DAY',
        'type' => 'enum',
        'len' => 10,
        'key' => 'dob',
        'options' => 'day_options',
    );
    $dictionary['Account']['fields']['dob_month'] = array (
        'required' => false,
        'name' => 'dob_month',
        'vname' => 'LBL_MONTH',
        'type' => 'enum',
        'len' => 10,
        'key' => 'dob',
        'options' => 'month_options',
    );
    $dictionary['Account']['fields']['dob_year'] = array (
        'name' => 'dob_year',
        'vname' => 'LBL_YEAR',
        'type' => 'int',
        'dbType' => 'varchar',
        'len' => 5,
        'key' => 'dob',
        'enable_range_search' => true,
        'options' => 'numeric_range_search_dom',
    );
    $dictionary['Account']['fields']['dob_date'] = array(
        'name' => 'dob_date',
        'vname' => 'LBL_BIRTHDATE',
        'massupdate' => false,
        'type' => 'date',    
        'key' => 'dob',
        'enable_range_search' => true,
        'options' => 'date_range_search_dom',
    );
    //***************  END: Fields - Added By Lap Nguyen *************************
    //add by Trung Nguyen 2015.03.03 for search detail in master
    $dictionary["Account"]["fields"]["target_list_id"] = array (
        'name'      => 'target_list_id', 
        'vname'     => 'LBL_TARGET_LIST',
        'type'      => 'enum',
        'source'    => 'non-db',
        'function'  => 'getTargetList',
        'studio'    => 'visible',
    );

    // add by Hai Nguyen 
    $dictionary["Account"]["fields"]["business_type"] = array (
        'required' => false,
        'name' => 'business_type',
        'vname' => 'LBL_BUSINESS_TYPE',
        'type' => 'enum',
        'massupdate' => 0,
        'default' => 'organization',
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'enabled',
        'duplicate_merge_dom_value' => '1',
        'reportable' => true,
        'len' => '50',
        'size' => '20',
        'options'   => 'business_type_options',    
    );

    //--- add by Tung Bui Kim
    $dictionary["Account"]["fields"]["credit_limit"] = array (
        'required' => false,
        'name' => 'credit_limit',
        'vname' => 'LBL_CREDIT_LIMIT',
        'type' => 'currency',
        'help' => 'Credit Limit',
        'importable' => 'true',
        'len' => 26,
        'size' => '20',
        'enable_range_search' => false,
        'precision' => 2,       
    );

    $dictionary["Account"]["fields"]["active_date"] = array (
        'name' => 'active_date',
        'vname' => 'LBL_ACTIVE_DATE',
        'type' => 'date',
        'display_default' => 'now',
    );

    $dictionary["Account"]["fields"]["exp_date"] = array (
        'name' => 'exp_date',
        'vname' => 'LBL_EXP_DATE',
        'type' => 'date',
    );

    $dictionary["Account"]["fields"]["code"] = array (
        'name' => 'code',
        'vname' => 'LBL_CODE',
        'type' => 'varchar',
        'required' => false,
        'importable' => true,
        'unified_search' => true,
        'help' => 'Code',
        'len' => '50',
        'size' => '20',
    );
    $dictionary["Account"]["fields"]["brand_name"] = array (
        'name' => 'brand_name',
        'vname' => 'LBL_BRAND_NAME',
        'type' => 'varchar',
        'help' => 'Brand Name',
        'unified_search' => true,
        'len' => '255',
        'size' => '20',
    );
    $dictionary['Account']['fields']['lead_source'] = array (
        'name' => 'lead_source',
        'vname' => 'LBL_SOURCE',
        'type' => 'enum',
        'options'=> 'lead_source_dom',
        'len' => '100',
        'audited'=>true,
        'comment' => 'Lead source (ex: Web, print)',
        'merge_filter' => 'enabled',
    );
    $dictionary['Account']['fields']['category'] = array (
        'name' => 'category',
        'vname' => 'LBL_CATEGORY',
        'type' => 'enum',
        'options'=> 'category_account_options',
        'len' => '40',
        'audited'=>true,
        'merge_filter' => 'enabled',
        'default' => 'FIT',
    );

    //$dictionary['Account']['fields']['billing_address_street'] = array (
//        'name' => 'billing_address_street',
//        'vname' => 'LBL_BILLING_ADDRESS_STREET',
//        'type' => 'varchar',
//        'len' => '150',
//        'comment' => 'The street address used for billing address',
//        'group'=>'billing_address',
//        'merge_filter' => 'enabled',
//        'unified_search' => true,
//    );
//    $dictionary['Account']['fields']['shipping_address_street'] = array (
//        'name' => 'shipping_address_street',
//        'vname' => 'LBL_SHIPPING_ADDRESS_STREET',
//        'type' => 'varchar',
//        'len' => 150,
//        'group'=>'shipping_address',
//        'comment' => 'The street address used for for shipping purposes',
//        'merge_filter' => 'enabled',
//        'unified_search' => true,
//    );

    //Custom Relationship. Account-TicketReport

    $dictionary['Account']['relationships']['account_ticketreports'] = array(
        'lhs_module'        => 'Accounts',
        'lhs_table'            => 'accounts',
        'lhs_key'            => 'id',
        'rhs_module'        => 'C_TicketReport',
        'rhs_table'            => 'c_ticketreport',
        'rhs_key'            => 'account_id',
        'relationship_type'    => 'one-to-many',
    );

    $dictionary['Account']['fields']['account_ticketreports'] = array(
        'name' => 'account_ticketreports',
        'type' => 'link',
        'relationship' => 'account_ticketreports',
        'module' => 'C_TicketReport',
        'bean_name' => 'C_TicketReport',
        'source' => 'non-db',
        'vname' => 'LBL_TICKETREPORTS',
    );
    
    $dictionary["Account"]["fields"]["iata_code"] = array (
        'name' => 'iata_code',
        'vname' => 'LBL_IATA_CODE',
        'type' => 'varchar',
        'help' => '',
        'len' => '255',
        'size' => '20',
        'unified_search' => true,
    );

    //Update Field Address By Lap Nguyen
    $dictionary['Account']['fields']['billing_address_country'] = array (
        'name' => 'billing_address_country',
        'vname' => 'LBL_BILLING_ADDRESS_COUNTRY',
        'type' => 'enum',
        'group'=>'billing_address',
        'comment' => 'The country used for the billing address',
        'merge_filter' => 'enabled',      
        'options' => 'countries_list_dom',
        'len' => '50',
    );
    $dictionary['Account']['fields']['shipping_address_country'] = array (
        'name' => 'shipping_address_country',
        'vname' => 'LBL_SHIPPING_ADDRESS_COUNTRY',
        'type' => 'enum',
        'group'=>'billing_address',
        'comment' => 'The country used for the billing address',
        'merge_filter' => 'enabled',      
        'options' => 'countries_list_dom',
        'len' => '50',
    );   
    //END Field Address

?>