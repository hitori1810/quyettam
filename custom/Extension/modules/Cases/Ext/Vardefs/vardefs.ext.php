<?php
    // Create by Tung Bui Kim
    $dictionary["Case"]["fields"]['account_name'] = array ( 
        'name' => 'account_name',
        'rname' => 'name',
        'id_name' => 'account_id',
        'vname' => 'LBL_ACCOUNT_NAME',
        'type' => 'relate',
        'link'=>'accounts',
        'table' => 'accounts',
        'join_name'=>'accounts',
        'isnull' => 'true',
        'module' => 'Accounts',
        'dbType' => 'varchar',
        'len' => 100,
        'source'=>'non-db',
        'unified_search' => true,
        'comment' => 'The name of the account represented by the account_id field',
    );


?>
