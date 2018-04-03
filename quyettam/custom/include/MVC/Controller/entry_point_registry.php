
<?php
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    
    $entry_point_registry['RemoveAllRelatedRecords'] = array('file' => 'custom/include/EntryPoints/RemoveAllRelatedRecords.php', 'auth' => true);
    $entry_point_registry['FilterSubpanel'] = array('file' => 'custom/include/EntryPoints/FilterSubpanel.php', 'auth' => true);
    $entry_point_registry['CheckExistsRelatedRecord'] = array('file' => 'custom/include/EntryPoints/CheckExistsRelatedRecord.php', 'auth' => true);
    $entry_point_registry['LoadTheFirstOpp'] = array('file' => 'custom/include/EntryPoints/LoadTheFirstOpp.php', 'auth' => true);
     $entry_point_registry['APIv10'] = array('file' => 'custom/include/APIv10.php', 'auth' => false);
    $entry_point_registry['callAPI'] = array('file' => 'custom/include/callAPI.php', 'auth' => false);
?>