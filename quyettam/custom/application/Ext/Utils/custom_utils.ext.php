<?php 
 //WARNING: The contents of this file are auto-generated



    function getAvailableModules() {
        require_once('modules/MySettings/TabController.php');
        global $app_list_strings;
        // Unused modules
        $excludeModule = array('Home', 'Emails', 'Forecasts', 'Bugs', 'Reports', 'Calendar');

        $controller = new TabController();
        $tabs = $controller->get_tabs_system();

        // Loop all the enabled modules name to convert into an array of: module_name => module_label
        $availableModules = array('' => '');
        foreach($tabs[0] as $moduleName) {  // $tabs[0] is the list of avaiable modules
            if(!in_array($moduleName, $excludeModule)) {
                $moduleLabel = $app_list_strings['moduleList'][$moduleName];    // Get module label
                $availableModules[$moduleName] = $moduleLabel;    
            }
        }

        return $availableModules;   
    }

    /**
    * Function generate provine option
    * @author Hai Nguyen
    */
    function getProvineOprions(){
        $province_list_options = array(); 
        $province_list_options[''] = '';
        $arrTemp = array();
        $query = "SELECT  id, name FROM c_province WHERE deleted = 0 AND (name LIKE 'Ho Chi Minh' OR name LIKE 'Ha Noi') ORDER BY name";
        $result = $GLOBALS['db']->query($query);
        if($GLOBALS['db']->getRowCount($result)>0){
            while($row = $GLOBALS['db']->fetchByAssoc($result)){
                $province_list_options[$row['id']] = $row['name'];
                $arrTemp[] = $row['id'];
            }
        }
        $idNotIn = implode("','",$arrTemp);

        $query = "SELECT  id, name FROM c_province WHERE deleted = 0 ";
        if(!empty($idNotIn))
            $query .= " AND id NOT IN ('{$idNotIn}')"; 
        $query .= " ORDER BY name";
        $result = $GLOBALS['db']->query($query);
        if($GLOBALS['db']->getRowCount($result)>0){
            while($row = $GLOBALS['db']->fetchByAssoc($result)){
                $province_list_options[$row['id']] = $row['name'];
            }
        }
        return $province_list_options; 
    }
    /**
    * Function genarate District option
    * @author Hai Nguyen
    * 
    */
    function getDistrictOptions(){
        $district_list_options = array();
        $query = "SELECT 
        a.id,
        a.name
        FROM
        c_district a 
        WHERE a.deleted = 0
        ORDER BY a.name ";
        $result = $GLOBALS['db']->query($query);
        if($GLOBALS['db']->getRowCount($result)>0){
            $district_list_options[''] = '';
            while($row = $GLOBALS['db']->fetchByAssoc($result)){
                $district_list_options[$row['id']] = $row['name'];
            }
        }
        return $district_list_options;
    }
    /**
    * Function get All Ward option
    * @author Hai Nguyen
    */
    function getWardOptions(){
        $ward_list_options = array();
        $query = 'SELECT 
        c_ward.id,
        c_ward.name
        FROM
        c_ward
        WHERE c_ward.deleted = 0 
        ORDER BY c_ward.name';
        $result = $GLOBALS['db']->query($query);
        if($GLOBALS['db']->getRowCount($result)>0){
            $ward_list_options [''] ='';
            while($row = $GLOBALS['db']->fetchByAssoc($result)){
                $ward_list_options[$row['id']] = $row['name'];
            }
        }
        return $ward_list_options;
    }

    /**
    * function get all Provinve By Country
    * @author Hai Nguyen
    * @param mixed $country
    * @return $html province option
    */
    function ajaxGetProvinceByCountry($country = '', $province_value){
        $html = '<option value=""> </option>';
        $selected = '';
        if($country != ''){
            $query = "SELECT  id, name FROM c_province WHERE deleted = 0 AND country = '{$country}' AND (name LIKE 'Ho Chi Minh' OR name LIKE 'Ha Noi') ORDER BY name";
            $result = $GLOBALS['db']->query($query);
            if($GLOBALS['db']->getRowCount($result)>0){
                while($row = $GLOBALS['db']->fetchByAssoc($result)){
                    $selected = $row['id'] == $province_value? 'selected="selected"':'';
                    $html .= "<option value='{$row['id']}' ".$selected."> {$row['name']}</option>"; 
                    $arrTemp[] = $row['id'];
                }
            }
            $idNotIn = implode("','",$arrTemp);
            $query = "SELECT  id, name FROM c_province WHERE deleted = 0 AND country = '{$country}' ";
            if(!empty($idNotIn))
                $query .= " AND id NOT IN ('{$idNotIn}')"; 
            $query .= " ORDER BY name";
            $result = $GLOBALS['db']->query($query);
            if($GLOBALS['db']->getRowCount($result) >0){
                while($row = $GLOBALS['db']->fetchByAssoc($result)){
                    $selected = $row['id'] == $province_value? 'selected="selected"':'';
                    $html .= "<option value='{$row['id']}' ".$selected."> {$row['name']}</option>";  
                }
            }
        }
        return $html;
    }
    /**
    * Function get District By Province
    * @author Hai Nguyen 
    * @param mixed $province
    * @return mixed $html option
    */
    function ajaxGetDistrictByProvince($province = '',$district_value =''){
        $html = '<option value=""> </option>';
        if(!empty($province)){
            $query = "SELECT 
            a.id,
            a.name
            FROM
            c_district a 
            JOIN c_district_c_province_c b 
            ON a.id = b.c_district_c_provincec_district_idb 
            AND b.deleted = 0 
            WHERE a.deleted = 0 AND b.c_district_c_provincec_province_ida = '{$province}'
            ORDER BY a.name ";
            $result = $GLOBALS['db']->query($query);
            if($GLOBALS['db']->getRowCount($result)>0){
                while($row = $GLOBALS['db']->fetchByAssoc($result)){
                    $selected = $row['id'] == $district_value? 'selected="selected"':'';
                    $html .= "<option value='{$row['id']}' ".$selected."> {$row['name']}</option>";  
                }
            } 
        }
        return $html;
    }
    /**
    * function get Ward By District 
    * @author Hai Nguyen
    * @param mixed $district
    * @return mixed $html option
    */
    function ajaxGetWardByDistrict($district ='',$ward_value=''){
        $html = '<option value=""> </option>';
        if(!empty($district)){
            $query = "SELECT 
            c_ward.id,
            c_ward.name,
            c_ward_c_district_c.c_ward_c_districtc_district_ida AS billing_address_district 
            FROM
            c_ward
            JOIN c_ward_c_district_c 
            ON c_ward_c_district_c.c_ward_c_districtc_ward_idb = c_ward.id 
            AND c_ward_c_district_c.deleted = 0 
            WHERE c_ward.deleted = 0 AND c_ward_c_district_c.c_ward_c_districtc_district_ida = '{$district}'
            ORDER BY c_ward.name";
            $result = $GLOBALS['db']->query($query);
            if($GLOBALS['db']->getRowCount($result)){
                while($row = $GLOBALS['db']->fetchByAssoc($result)){
                    $selected = $row['id'] == $ward_value? 'selected="selected"':'';
                    $html .= "<option value='{$row['id']}' ".$selected."> {$row['name']}</option>";  
                }
            }
        }
        return $html;
    }
    /**
    * function genarate target list
    * 
    * @return target list (id=>name)
    * 
    * Add by Trung Nguyen at 2015.03.03
    */
    function getTargetList(){
        $bean = BeanFactory::getBean('ProspectLists');
        $beanList = $bean->get_full_list();
        $targetList = array();
        for($i=0;$i<count($beanList);$i++){
            $targetList[$beanList[$i]->id] = $beanList[$i]->name;
        }
        return $targetList;                    
    }

    

?>