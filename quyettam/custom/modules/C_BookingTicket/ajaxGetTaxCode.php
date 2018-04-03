<?php
    $parent_type = $_POST['parent_type'];
    $parent_id   = $_POST['parent_id'];

    if($parent_type == 'Contacts'){
        $taxcode =  $GLOBALS['db']->getOne("SELECT DISTINCT IFNULL(l1.tax_code,'') l1_tax_code FROM contacts INNER JOIN accounts_contacts l1_1 ON contacts.id=l1_1.contact_id AND l1_1.deleted=0 INNER JOIN accounts l1 ON l1.id=l1_1.account_id AND l1.deleted=0 WHERE (((contacts.id='$parent_id' ))) AND contacts.deleted=0");  
    }
    if (!$taxcode) $taxcode = "";
    echo json_encode(array(
        "taxcode" => $taxcode,
    ));

?>
