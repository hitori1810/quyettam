<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class AdministrationViewGeneralConfig extends SugarView{   
    public function display(){
        global $mod_strings, $app_strings, $current_user;
        if(!is_admin($current_user)) sugar_die($app_strings['ERR_NOT_ADMIN']); 

        // Load config 
        $admin = new Administration();  
        $admin->retrieveSettings();

        //load import mapping record
        $sql = "
        select id, name, module
        from import_maps
        WHERE deleted <> 1
        ANd is_published = 'yes'
        ";
        $rs = $GLOBALS['db']->query($sql);         
        $mappingLeadArr = array('none' => '');      
        while($row = $GLOBALS['db']->fetchByAssoc($rs)){
            if($row['module'] == 'Leads') $mappingLeadArr[$row['id']] = $row['name'];
        }                                                                                 
        $defaultMappingLead     = $admin->settings['wellspring_default_mapping_lead'];        
        
        $smarty = new Sugar_Smarty(); 
        $smarty->assign('MOD', $mod_strings);                           
        $smarty->assign('MAPPING_LEAD_OPTIONS', $mappingLeadArr);        
        $smarty->assign('DEFAUL_MAPPING_LEAD', $defaultMappingLead);            

        echo $smarty->fetch("custom/modules/Administration/tpl/general_config.tpl");
    }
}