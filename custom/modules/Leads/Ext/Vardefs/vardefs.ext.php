<?php 
 //WARNING: The contents of this file are auto-generated


// created: 2015-10-01 11:50:07
$dictionary["Lead"]["fields"]["leads_c_bookingticket_1"] = array (
  'name' => 'leads_c_bookingticket_1',
  'type' => 'link',
  'relationship' => 'leads_c_bookingticket_1',
  'source' => 'non-db',
  'module' => 'C_BookingTicket',
  'bean_name' => 'C_BookingTicket',
  'vname' => 'LBL_LEADS_C_BOOKINGTICKET_1_FROM_LEADS_TITLE',
  'id_name' => 'leads_c_bookingticket_1leads_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-10-01 11:52:04
$dictionary["Lead"]["fields"]["leads_c_ticket_1"] = array (
  'name' => 'leads_c_ticket_1',
  'type' => 'link',
  'relationship' => 'leads_c_ticket_1',
  'source' => 'non-db',
  'module' => 'C_Ticket',
  'bean_name' => 'C_Ticket',
  'vname' => 'LBL_LEADS_C_TICKET_1_FROM_LEADS_TITLE',
  'id_name' => 'leads_c_ticket_1leads_ida',
  'link-type' => 'many',
  'side' => 'left',
);


// created: 2015-03-26 08:48:14
$dictionary["Lead"]["fields"]["leads_opportunities_1"] = array (
  'name' => 'leads_opportunities_1',
  'type' => 'link',
  'relationship' => 'leads_opportunities_1',
  'source' => 'non-db',
  'module' => 'Opportunities',
  'bean_name' => 'Opportunity',
  'vname' => 'LBL_LEADS_OPPORTUNITIES_1_FROM_LEADS_TITLE',
  'id_name' => 'leads_opportunities_1leads_ida',
  'link-type' => 'many',
  'side' => 'left',
);


    $dictionary["Lead"]["fields"]["short_name"] = array(
        'name'    => 'short_name',
        'vname'   => 'LBL_SHORT_NAME',
        'type'    => 'varchar',
        'len'     => 150 ,
        'unified_search' => true,
    );

    $dictionary["Lead"]["fields"]["rating"] = array(
        'name'    => 'rating',
        'vname'   => 'LBL_RATING',
        'type'    => 'enum',
        'options' => 'lead_rating_options'
    );

    $dictionary["Lead"]["fields"]['industry'] = array ( 
        'name'      => 'industry',
        'vname'     => 'LBL_INDUSTRY',
        'type'      => 'enum',
        'options' => 'industry_dom',
    );

    $dictionary["Lead"]["fields"]['tax_code'] = array ( 
        'name'      => 'tax_code',
        'vname'     => 'LBL_TAX_CODE',
        'type'      => 'varchar',
        'len'       => 50,
        'unified_search' => true,
    );

    $dictionary["Lead"]["fields"]["business_type"] = array (
        'name'=> 'business_type', 
        'vname' => 'LBL_BUSINESS_TYPE',
        'type'  => 'enum',
        'options'   => 'account_business_type_dom',
    );

    $dictionary["Lead"]["fields"]["ownership"] = array (
        'name'      => 'ownership', 
        'vname'     => 'LBL_OWNERSHIP',
        'type'      => 'varchar',
        'len'       => 255,
    );

    //--- add by Tung Bui Kim
    $dictionary["Lead"]["fields"]["code"] = array (
        'name' => 'code',
        'vname' => 'LBL_CODE',
        'type' => 'varchar',
        'required' => true,
        'importable' => true,
        'help' => 'Code',
        'len' => '255',
        'size' => '20',
    );
    $dictionary["Lead"]["fields"]["credit_limit"] = array (
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

    $dictionary["Lead"]["fields"]["active_date"] = array (
        'name' => 'active_date',
        'vname' => 'LBL_ACTIVE_DATE',
        'type' => 'date',
        'display_default' => 'now',
    );

    $dictionary["Lead"]["fields"]["exp_date"] = array (
        'name' => 'exp_date',
        'vname' => 'LBL_EXP_DATE',
        'type' => 'date',
    );
    $dictionary["Lead"]["fields"]["auto_convert_contact"] = array (
        'name'      => 'auto_convert_contact',
        'vname'     => 'LBL_AUTO_CONVERT_CONTACT',
        'type'      => 'bool',
        'dbType'    => 'tinyint',
        'default'   => 0,
    );

    $dictionary['Lead']['fields']['category'] = array (
        'name' => 'category',
        'vname' => 'LBL_CATEGORY',
        'type' => 'enum',
        'options'=> 'category_lead_options',
        'len' => '40',
        'audited'=>true,
        'merge_filter' => 'enabled',
        'default' => 'FIT',
    );
    
    $dictionary['Lead']['fields']['fit_category'] = array (
        'name' => 'fit_category',
        'vname' => 'LBL_FIT_CATEGORY',
        'type' => 'enum',
        'options'=> 'fit_category_options',
        'len' => '40',
        'audited'=>true,
        'merge_filter' => 'enabled',
        'default' => 'Normal FIT',
    );

    $dictionary['Lead']['fields']['working_date']=array (
        'name' => 'working_date',
        'vname' => 'LBL_WORKING_DATE',
        'type' => 'date',
        'massupdate' => true,
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => false,
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'calculated' => false,
        'size' => '20',

    ); 
    $dictionary["Lead"]["fields"]["phone_mobile"] = array (
        'name' => 'phone_mobile',
        'vname' => 'LBL_MOBILE_PHONE',
        'type' => 'phone',
        'dbType' => 'varchar',
        'len' => 100,
        'unified_search' => true,
        'full_text_search' => array('boost' => 1),
        'comment' => 'Mobile phone number of the contact',
        'required' => true,
    );
    $dictionary["Lead"]["fields"]["first_name"] = array (
        'name' => 'first_name',
        'vname' => 'LBL_FIRST_NAME',
        'type' => 'varchar',
        'len' => '100',
        'unified_search' => true,
        'full_text_search' => array('boost' => 3),
        'comment' => 'First name of the contact',
        'merge_filter' => 'selected',     
        'required'=>true,
    );
    $dictionary["Lead"]["fields"]["last_name"] = array (
        'name' => 'last_name',
        'vname' => 'LBL_LAST_NAME',
        'type' => 'varchar',
        'len' => '100',
        'unified_search' => true,
        'full_text_search' => array('boost' => 3),
        'comment' => 'Last name of the contact',
        'merge_filter' => 'selected',     
        'required'=>false,
    );

$dictionary["Lead"]["fields"]["gs_code"] = array(
    'required' => false,
    'name' => 'gs_code',
    'vname' => 'LBL_GS_CODE',
    'type' => 'varchar',
    'massupdate' => 0,
    'no_default' => false,
    'importable' => 'false',
    'duplicate_merge' => 'disabled',
    'duplicate_merge_dom_value' => '0',
    'audited' => false,
    'reportable' => true,
    'unified_search' => true,
    'merge_filter' => 'disabled',
    'calculated' => false,
    'len' => '255',
    'size' => '20',
);
    //--- END -  add by Tung Bui Kim

    //Update Field Address By Lap Nguyen
    $dictionary['Lead']['fields']['primary_address_country'] = array (
        'name' => 'primary_address_country',
        'vname' => 'LBL_PRIMARY_ADDRESS_COUNTRY',
        'type' => 'enum',
        'group'=>'primary_address',
        'comment' => 'The country used for the primary address',
        'merge_filter' => 'enabled',      
        'options' => 'countries_list_dom',
        'len' => '50',
    );
    $dictionary['Lead']['fields']['alt_address_country'] = array (
        'name' => 'alt_address_country',
        'vname' => 'LBL_ALT_ADDRESS_COUNTRY',
        'type' => 'enum',
        'group'=>'primary_address',
        'comment' => 'The country used for the primary address',
        'merge_filter' => 'enabled',      
        'options' => 'countries_list_dom',
        'len' => '50',
    );   
    //END Field Address

    //Field First Opportunity
    $dictionary["Lead"]["fields"]["opp_name"] = array (
        'name' => 'opp_name',
        'vname' => 'LBL_OPPORTUNITY_NAME',
        'type' => 'varchar',
        'massupdate' => 0,
        'no_default' => false,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => false,
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'len' => '50',
        'size' => '20',
        'required' => true,
        'source' => 'non-db',
        'studio' => 'visible',
    );

    $dictionary["Lead"]["fields"]["opp_amount"] = array (
        'required' => false,
        'name' => 'opp_amount',
        'vname' => 'LBL_OPP_AMOUNT',
        'type' => 'currency',
        'massupdate' => 0,
        'no_default' => false,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => false,
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'size' => '20',
        'enable_range_search' => false,
        'source' => 'non-db',
        'studio' => 'visible',
    );

    $dictionary["Lead"]["fields"]["opp_sales_stage"] = array (
        'name' => 'opp_sales_stage',
        'vname' => 'LBL_OPP_SALES_STAGE',
        'type' => 'enum',
        'options' => 'sales_stage_dom',
        'len' => '255',
        'audited'=>true,
        'comment' => 'Indication of progression towards closure',
        'merge_filter' => 'enabled',
        'importable' => true,
        'required' => true,
        'source' => 'non-db',
        'studio' => 'visible',
    );

    $dictionary["Lead"]["fields"]["opp_description"] = array (
        'required' => false,
        'name' => 'opp_description',
        'vname' => 'LBL_OPP_DESCRIPTION',
        'type' => 'text',
        'massupdate' => 0,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'enabled',
        'duplicate_merge_dom_value' => '1',
        'audited' => true,
        'reportable' => true,
        'size' => '20',
        'studio' => 'visible',
        'rows' => '4',
        'cols' => '60',
        'source' => 'non-db',
        'studio' => 'visible',
    );

    $dictionary["Lead"]["fields"]["opp_date_closed"] = array (
        'name' => 'opp_date_closed',
        'vname' => 'LBL_OPP_DATE_CLOSED',
        'type' => 'date',
        'audited'=>true,
        'comment' => 'Expected or actual date the oppportunity will close',
        'importable' => true,
        'required' => true,
        'enable_range_search' => true,
        'options' => 'date_range_search_dom',
        'source' => 'non-db',
        'studio' => 'visible',
    );

    $dictionary["Lead"]["fields"]["first_opportunity_id"] = array (
        'name' => 'first_opportunity_id',
        'vname' => 'LBL_FIRST_OPPORTUNITY_ID',
        'type' => 'varchar',
        'massupdate' => 0,
        'no_default' => false,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => false,
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'len' => '50',
        'size' => '20',
    );

    $dictionary["Lead"]["fields"]["create_opportunity"] = array (
        'required' => false,
        'name' => 'create_opportunity',
        'vname' => 'LBL_CREATE_OPPORTUNITY',
        'type' => 'bool',
        'massupdate' => 0,
        'default' => '0',
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'enabled',
        'duplicate_merge_dom_value' => '1',
        'audited' => true,
        'reportable' => true,
        'len' => '255',
        'size' => '20',    
    );



    $dictionary["Lead"]["fields"]["currency_id"] = array (
        'name' => 'currency_id',
        'type' => 'currency_id',
        'dbType' => 'id',
        'group' => 'currency_id',
        'required' => true,
        'vname' => 'LBL_CURRENCY',
        'function' => 
        array (
            'name' => 'getCurrencyDropDown',
            'returns' => 'html',
        ),
        'reportable' => false,
        'default' => '-99',
        'comment' => 'Currency used for display purposes',    
    );

    $dictionary["Lead"]["fields"]["currency_name"] = array (
        'name' => 'currency_name',
        'rname' => 'name',
        'id_name' => 'currency_id',
        'vname' => 'LBL_CURRENCY_NAME',
        'type' => 'relate',
        'isnull' => 'true',
        'table' => 'currencies',
        'module' => 'Currencies',
        'source' => 'non-db',
        'function' => 
        array (
            'name' => 'getCurrencyNameDropDown',
            'returns' => 'html',
        ),
        'studio' => 'false',
        'duplicate_merge' => 'disabled',   
    );


    $dictionary["Lead"]["fields"]["currency_symbol"] = array (

        'name' => 'currency_symbol',
        'rname' => 'symbol',
        'id_name' => 'currency_id',
        'vname' => 'LBL_CURRENCY_SYMBOL',
        'type' => 'relate',
        'isnull' => 'true',
        'table' => 'currencies',
        'module' => 'Currencies',
        'source' => 'non-db',
        'function' => 
        array (
            'name' => 'getCurrencySymbolDropDown',
            'returns' => 'html',
        ),
        'studio' => 'false',
        'duplicate_merge' => 'disabled',
    );

    $dictionary["Lead"]["fields"]["passport"] = array (
        'name' => 'passport',
        'vname' => 'LBL_PASSPORT',
        'type' => 'varchar',
        'required' => false,
        'help' => 'Passport',
        'len' => '50',
        'size' => '20',
    );
    $dictionary["Lead"]["fields"]["membership_number"] = array (
        'name' => 'membership_number',
        'vname' => 'LBL_MEMBERSHIP_NUMBER',
        'type' => 'varchar',
        'required' => false,
        'help' => 'Membership Number',
        'len' => '50',
        'size' => '20',
    );
    $dictionary['Lead']['fields']['seat_type'] = array (
        'name' => 'seat_type',
        'vname' => 'LBL_SEAT_TYPE',
        'type' => 'enum',
        'options'=> 'seat_type_options',
        'len' => '40',
        'audited'=>true,
    );
    $dictionary['Lead']['fields']['airline'] = array (
        'name' => 'airline',
        'vname' => 'LBL_AIRLINE',
        'type' => 'enum',
        'options'=> 'full_supplier_ticket_list',
        'len' => '40',
        'audited'=>true,
    );

    $dictionary["Lead"]["fields"]["favorites"] = array (
        'required' => false,
        'name' => 'favorites',
        'vname' => 'LBL_FAVORITES',
        'type' => 'text',
        'massupdate' => 0,
        'no_default' => false,
        'comments' => '',
        'help' => 'Favorites',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => false,
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'calculated' => false,
        'size' => '20',
        'studio' => 'visible',
        'rows' => '4',
        'cols' => '60',
    );

    $dictionary['Lead']['fields']['pax_name'] = array (
        'name' => 'pax_name',
        'vname' => 'LBL_PAX_NAME',
        'type' => 'varchar',
        'massupdate' => 0,
        'no_default' => false,
        'comments' => '',
        'help' => 'Pax name',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => true,
        'reportable' => true,
        'unified_search' => true,
        'merge_filter' => 'disabled',
        'calculated' => false,
        'len' => '255',
        'size' => '20',
    );

    //$dictionary['Lead']['fields']['primary_address_street'] = array (
//        'name' => 'primary_address_street',
//        'vname' => 'LBL_PRIMARY_ADDRESS_STREET',
//        'type' => 'varchar',
//        'len' => '150',
//        'group'=>'primary_address',
//        'comment' => 'Street address for primary address',
//        'merge_filter' => 'enabled',
//        'unified_search' => true,
//    );
//    $dictionary['Lead']['fields']['primary_address_street'] = array (
//        'name' => 'alt_address_street',
//        'vname' => 'LBL_ALT_ADDRESS_STREET',
//        'type' => 'varchar',
//        'len' => '150',
//        'group'=>'alt_address',
//        'comment' => 'Street address for alternate address',
//        'merge_filter' => 'enabled',
//        'unified_search' => true,
//    );



    //***************  Fields Birthdate - Added By Lap Nguyen *************************
    $dictionary['Lead']['fields']['dob_day'] = array (
        'required' => false,
        'name' => 'dob_day',
        'vname' => 'LBL_DAY',
        'type' => 'enum',
        'len' => 10,
        'key' => 'dob',
        'options' => 'day_options',
    );
    $dictionary['Lead']['fields']['dob_month'] = array (
        'required' => false,
        'name' => 'dob_month',
        'vname' => 'LBL_MONTH',
        'type' => 'enum',
        'len' => 10,
        'key' => 'dob',
        'options' => 'month_options',
    );
    $dictionary['Lead']['fields']['dob_year'] = array (
        'name' => 'dob_year',
        'vname' => 'LBL_YEAR',
        'type' => 'int',
        'dbType' => 'varchar',
        'len' => 5,
        'key' => 'dob',
        'enable_range_search' => true,
        'options' => 'numeric_range_search_dom',
    );
    $dictionary['Lead']['fields']['dob_date'] = array(
        'name' => 'dob_date',
        'vname' => 'LBL_BIRTHDATE',
        'massupdate' => false,
        'type' => 'date',    
        'key' => 'dob',
        'enable_range_search' => true,
        'options' => 'date_range_search_dom',
    );
    //***************  END: Fields - Added By Lap Nguyen *************************
     //add by Trung Nguyen
     $dictionary['Lead']['relationships']['session_lead'] = array(
         'lhs_module' => 'Leads',
         'lhs_table' => 'leads',
         'lhs_key' => 'id',
         'rhs_module' => 'C_Session',
         'rhs_table' => 'c_session',
         'rhs_key' => 'lead_id',
         'relationship_type' => 'one-to-many'
     );
     $dictionary['Lead']['fields']['session_link'] = array(
         'name' => 'session_link',
         'type' => 'link',
         'relationship' => 'session_lead',
         'module' => 'C_Session',
         'bean_name' => 'C_Session',
         'source' => 'non-db',
         'vname' => 'LBL_SESSION',
     );
     
      $dictionary['Lead']['fields']['facebook_id'] = array(
        'name' => 'facebook_id',
        'vname' => 'LBL_FACEBOOK_ID',
        'massupdate' => false,
        'type' => 'varchar',   
        'len' => 100, 
    ); 
    $dictionary['Lead']['fields']['google_id'] = array(
        'name' => 'google_id',
        'vname' => 'LBL_GOOGLE_ID',
        'massupdate' => false,
        'type' => 'varchar',   
        'len' => 100, 
    );
    $dictionary['Lead']['fields']['ibe_id'] = array(
        'name' => 'ibe_id',
        'vname' => 'LBL_IBE_ID',
        'massupdate' => false,
        'type' => 'varchar',   
        'len' => 100, 
    );
    
    //2016.03.30 Trung Nguyen
     $dictionary['Lead']['fields']['document_type'] = array(
        'name' => 'document_type',
        'vname' => 'LBL_DOCUMENT_TYPE',
        'massupdate' => false,
        'type' => 'enum',   
        'len' => 50,
        'options' => 'customer_document_type_options' 
    );
    $dictionary['Lead']['fields']['card_holder'] = array(
        'name' => 'card_holder',
        'vname' => 'LBL_CARD_HOLDER',
        'massupdate' => false,
        'type' => 'varchar',   
        'len' => 150,
       // 'options' => 'customer_card_holder_options' 
    );
    $dictionary['Lead']['fields']['nationality'] = array(
        'name' => 'nationality',
        'vname' => 'LBL_NATIONALITY',
        'massupdate' => false,
        'type' => 'varchar',   
        'len' => 100,
    );
    $dictionary['Lead']['fields']['document_number'] = array(
        'name' => 'document_number',
        'vname' => 'LBL_DOCUMENT_NUMBER',
        'massupdate' => false,
        'type' => 'varchar',   
        'len' => 100,
    ); 
    $dictionary['Lead']['fields']['issuing_country'] = array(
        'name' => 'issuing_country',
        'vname' => 'LBL_ISSUING_COUNTRY',
        'massupdate' => false,
        'type' => 'varchar',   
        'len' => 100,
    );
    
     $dictionary['Lead']['fields']['gender'] = array(
        'name' => 'gender',
        'vname' => 'LBL_GENDER',
        'massupdate' => false,
        'type' => 'enum',
        'options' => 'gender_list',
        'len' => 20,
    ); 
    
    $dictionary['Lead']['fields']['birthday'] = array(
        'name' => 'birthday',
        'vname' => 'LBL_DOB_DATE',
        'massupdate' => false,
        'type' => 'varchar',       
        'len' => 20,
    );

?>