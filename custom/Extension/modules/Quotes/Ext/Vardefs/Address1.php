<?php
    $dictionary['Quote']['fields']['billing_address_district'] = array (
        'name' => 'billing_address_district',
        'vname' => 'LBL_BILLING_ADDRESS_DISTRICT',
        'type' => 'enum',
        'options' => 'district_list_options',
        'audited'=>true,
        'merge_filter' => 'enabled'
    );
    $dictionary['Quote']['fields']['billing_address_city'] = array (
        'name' => 'billing_address_city',
        'vname' => 'LBL_BILLING_ADDRESS_CITY',
        'type' => 'enum',
        'options' => 'province_list_options',
        'audited'=>true,
        'merge_filter' => 'enabled',
    );
    $dictionary['Quote']['fields']['billing_address_country'] = array (
        'name' => 'billing_address_country',
        'vname' => 'LBL_BILLING_ADDRESS_COUNTRY',
        'type' => 'enum',
        'options'=> 'countries_dom', 
        'default'=> '',
        'audited'=>true,
        'merge_filter' => 'enabled',
    );

    $dictionary['Quote']['fields']['billing_address_state'] = array (
        'name' => 'billing_address_state',
        'vname' => 'LBL_BILLING_ADDRESS_STATE',
        'type' => 'enum',
        'options'=> 'ward_list_options', 
        'default'=> '',
        'audited'=>true,
        'merge_filter' => 'enabled',
    );      
    $dictionary['Quote']['fields']['shipping_address_district'] = array (
        'name' => 'shipping_address_district',
        'vname' => 'LBL_SHIPPING_ADDRESS_DISTRICT',
        'audited'=>true,
        'len' => '255',
        'type' => 'enum',
        'options' => 'district_list_options',
        'merge_filter' => 'enabled',
    );
    $dictionary['Quote']['fields']['shipping_address_city'] = array (
        'name' => 'shipping_address_city',
        'vname' => 'LBL_SHIPPING_ADDRESS_CITY',
        'type' => 'enum',
        'options' => 'province_list_options',
        'default'=> '',
        'audited'=>true,
        'merge_filter' => 'enabled',
    );
    $dictionary['Quote']['fields']['shipping_address_country'] = array (
        'name' => 'shipping_address_country',
        'vname' => 'LBL_SHIPPING_ADDRESS_COUNTRY',
        'type' => 'enum',
        'options'=> 'countries_dom', 
        'default'=> '',
        'audited'=>true,
        'merge_filter' => 'enabled',
    );

    $dictionary['Quote']['fields']['shipping_address_state'] = array (
        'name' => 'shipping_address_state',
        'vname' => 'LBL_SHIPPING_ADDRESS_STATE',
        'audited'=>true,
        'len' => '255',
        'type' => 'enum',
        'options' => 'ward_list_options',
        'merge_filter' => 'enabled',
    );