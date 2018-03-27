<?php
    require_once('include/SugarFields/Fields/Base/SugarFieldBase.php');
    class SugarFieldDob extends SugarFieldBase {
        
        function getEditViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex) {
            $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);        
            global $app_strings;
            if(!isset($displayParams['key'])) {
                $GLOBALS['log']->debug($app_strings['ERR_ADDRESS_KEY_NOT_SPECIFIED']);    
                $this->ss->trigger_error($app_strings['ERR_ADDRESS_KEY_NOT_SPECIFIED']);
                return;
            }
            return $this->fetch($this->findTemplate('EditView'));      
        }
        
        function getDetailViewSmarty($parentFieldArray, $vardef, $displayParams, $tabindex) {
            $this->setup($parentFieldArray, $vardef, $displayParams, $tabindex);
            global $app_strings;
            if(!isset($displayParams['key'])) {
                $GLOBALS['log']->debug($app_strings['ERR_ADDRESS_KEY_NOT_SPECIFIED']);    
                $this->ss->trigger_error($app_strings['ERR_ADDRESS_KEY_NOT_SPECIFIED']);
                return;
            }
            return $this->fetch($this->findTemplate('DetailView'));
        }
    }
?>

