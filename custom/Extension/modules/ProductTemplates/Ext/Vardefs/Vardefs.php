<?php
    //--- add by Tung Bui Kim
    $dictionary["ProductTemplate"]["fields"]["code"] = array (
        'name' => 'code',
        'vname' => 'LBL_CODE',
        'type' => 'varchar',
        'importable' => true,
        'help' => 'Code',
        'len' => '255',
        'size' => '20',
    );
    $dictionary["ProductTemplate"]["fields"]["currency"] = array (
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
    $dictionary["ProductTemplate"]["fields"]["support_term"] = array (
        'name' => 'support_term',
        'vname' => 'LBL_SUPPORT_TERM',
        'type' => 'enum',
        'options' => 'support_term_dom',
        'massupdate' => false,
        'len' => 100,
        'comment' => 'Term (length) of support contract'
    );
    $dictionary["ProductTemplate"]["fields"]["tax_class"] = array (
        'name' => 'tax_class',
        'vname' => 'LBL_TAX_CLASS',
        'type' => 'enum',
        'options' => 'tax_class_dom',
        'massupdate' => false,
        'len' => 100,
        'comment' => 'Tax classification (ex: Taxable, Non-taxable)'
    );
    $dictionary["ProductTemplate"]["fields"]["date_available"] = array (
        'name' => 'date_available',
        'vname' => 'LBL_DATE_AVAILABLE',
        'massupdate' => false,
        'type' => 'date',
        'comment' => 'Availability date'
    );
    $dictionary["ProductTemplate"]["fields"]["status"] = array (
        'name' => 'status',
        'vname' => 'LBL_STATUS',
        'type' => 'enum',
        'options' => 'product_template_status_dom',
        'massupdate' => false,
        'len' => 100,
        'comment' => 'Product status (not used in product Catalog)'
    );
?>