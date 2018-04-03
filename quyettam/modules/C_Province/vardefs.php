<?php
    $dictionary['C_Province'] = array(
        'table'=>'c_province',
        'audited'=>true,
        'duplicate_merge'=>true,
        'fields'=>array (
            'country' => 
            array (
                'required' => true,
                'name' => 'country',
                'vname' => 'LBL_COUNTRY',
                'type' => 'enum',
                'massupdate' => 0,
                'default' => 'VIETNAM',
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
                'calculated' => false,
                'len' => 100,
                'size' => '20',
                'options' => 'countries_dom',
                'studio' => 'visible',
                'dependency' => false,
            ),
        ),
        'relationships'=>array (
        ),
        'optimistic_locking'=>true,
        'unified_search'=>true,
    );
    if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
    }
    VardefManager::createVardef('C_Province','C_Province', array('basic','team_security','assignable'));