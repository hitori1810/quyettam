<?php 
 //WARNING: The contents of this file are auto-generated


    $dictionary['Prospect']['fields']['working_date']=array (
        'name' => 'working_date',
        'vname' => 'LBL_WORKING_DATE',
        'type' => 'date',
        'required' => true,
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
        'display_default' => 'now',
        'source' => 'non-db',
    ); 
    $dictionary['Prospect']['fields']['status']=array (
        'name' => 'status',
        'vname' => 'LBL_STATUS',
        'type' => 'enum',
        'len' => '100',
        'massupdate' => true,
        'options' => 'target_status_dom',
        'default' => 'New',
        'comment' => 'Status of the target',
        'required' => true,
    );
    $dictionary['Prospect']['fields']['category'] = array (
        'name' => 'category',
        'vname' => 'LBL_CATEGORY',
        'type' => 'enum',
        'options'=> 'category_options',
        'massupdate' => false,
        'len' => '40',
        'audited'=>true,
        'merge_filter' => 'enabled',
        'default' => 'FIT',
    );
    $dictionary['Prospect']['fields']['dob_day'] = array (
        'required' => false,
        'name' => 'dob_day',
        'vname' => 'LBL_DAY',
        'massupdate' => false,
        'type' => 'enum',
        'len' => 10,
        'key' => 'dob',
        'options' => 'day_options',
    );
    $dictionary['Prospect']['fields']['dob_month'] = array (
        'required' => false,
        'name' => 'dob_month',
        'vname' => 'LBL_MONTH',
        'massupdate' => false,
        'type' => 'enum',
        'len' => 10,
        'key' => 'dob',
        'options' => 'month_options',
    );
    $dictionary['Prospect']['fields']['dob_year'] = array (
        'name' => 'dob_year',
        'vname' => 'LBL_YEAR',
        'type' => 'int',
        'massupdate' => false,
        'dbType' => 'varchar',
        'len' => 5,
        'key' => 'dob',
        'enable_range_search' => true,
        'options' => 'numeric_range_search_dom',
    );
    $dictionary['Prospect']['fields']['dob_date'] = array(
        'name' => 'dob_date',
        'vname' => 'LBL_BIRTHDATE',
        'massupdate' => false,
        'type' => 'date',    
        'key' => 'dob',
        'enable_range_search' => true,
        'options' => 'date_range_search_dom',
    );
    $dictionary["Prospect"]["fields"]['tax_code'] = array ( 
        'name'      => 'tax_code',
        'vname'     => 'LBL_TAX_CODE',
        'type'      => 'varchar',
        'massupdate' => false,
        'len'       => 50,
        'unified_search' => true,
    );
    $dictionary["Prospect"]["fields"]['website'] = array ( 
        'name' => 'website',
        'vname' => 'LBL_WEBSITE',
        'type' => 'url',
        'dbType' => 'varchar',
        'massupdate' => false,
        'len' => 255,
        'link_target' => '_blank',
        'comment' => 'URL of website for the company',
    );
    $dictionary["Prospect"]["fields"]['phone_mobile'] = array ( 
        'name' => 'phone_mobile',
        'vname' => 'LBL_MOBILE_PHONE',
        'type' => 'phone',
        'dbType' => 'varchar',
        'massupdate' => false,
        'len' => 100,
        'unified_search' => true,
        'full_text_search' => array('boost' => 1),
        'comment' => 'Mobile phone number of the contact',
        'merge_filter' => 'enabled',
    );
    $dictionary["Prospect"]["fields"]['converted'] = array ( 
        'name' => 'converted',
        'vname' => 'LBL_CONVERTED',
        'massupdate' => false,
        'type'=>'bool',
        'default' =>'0',
    );
    $dictionary["Prospect"]["fields"]["phone_mobile"] = array (
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
    $dictionary["Prospect"]["fields"]["first_name"] = array (
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



?>