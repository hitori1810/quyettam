<?php
    if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
    class DropdownTransformer {
        function transformDropdown ($bean, $event, $args) {
            $relationship_type=$bean->relationship_type;
            $bean->relationship_type="<span>
            <select record_id='{$bean->id}' class='relationship_type'>
            ".get_select_options_with_id($GLOBALS['app_list_strings']['relationship_type_options'],$bean->relationship_type)."
            </select>
            </span>" ;
        }
    }
?>
