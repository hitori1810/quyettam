<?php
    if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

    include_once('include/SubPanel/SubPanel.php');
    global $beanList;
    global $beanFiles;
    global $sugar_config;
    $sugar_config['enable_action_menu']=false;
    if(empty($_REQUEST['module']))
    {
        die("'module' was not defined");
    }

    if(empty($_REQUEST['record']))
    {
        die("'record' was not defined");
    }

    if(!isset($beanList[$_REQUEST['module']]))
    {
        die("'".$_REQUEST['module']."' is not defined in \$beanList");
    }

    $subpanel = $_REQUEST['subpanel'];
    $record = $_REQUEST['record'];
    $module = $_REQUEST['module'];
    $layout_def_key = $_REQUEST['layout_def_key'];


    if(empty($_REQUEST['inline']))
    {
        insert_popup_header($theme);
    }

    // need to load the subpanel definition here and manipulate the 'where clause'

    $parent_bean_name = $beanList[$module];
    $parent_bean_file = $beanFiles[$parent_bean_name];
    require_once($parent_bean_file);
    $parent_bean = new $parent_bean_name();
    $parent_bean->retrieve($record);
    $result = $parent_bean;
    if (!class_exists('MyClass')) {
        require_once 'include/SubPanel/SubPanelDefinitions.php' ;
    }
    $panelsdef=new SubPanelDefinitions($result,$layout_def_key);
    $subpanelDef=$panelsdef->load_subpanel($subpanel);
    $table_name = $subpanelDef->table_name;
    // create or append subpanel definition where clause for the filter
    if (!isset($subpanelDef->panel_definition['where']) || $subpanelDef->panel_definition['where'] == ''){
        $subpanelDef->panel_definition['where'] = '';
    }else{
        $subpanelDef->panel_definition['where'] .= ' AND ';
    }
    if ($_REQUEST['search_params'] && $_REQUEST['search_params'] != '' && $table_name != ''){
        if($table_name == 'contacts'){
            $subpanelDef->panel_definition['where'] .= " " . $table_name . ".first_name like '%" . trim($_REQUEST['search_params']) . "%' OR " . $table_name . ".last_name like '%" . trim($_REQUEST['search_params']) . "%'";
        }elseif($table_name == 'role_contact_roles'){
            $subpanelDef->panel_definition['where'] .= " " . $table_name . ".contact_role like '%" . trim($_REQUEST['search_params']) . "%' ";
            // check to see if the terms are a partial match for the terms in the drop down
            global $app_list_strings;
            $pattern = "/(.)*" . trim($_REQUEST['search_params']) . "(.)*/i";
            foreach ($app_list_strings['role_at_primary_account_list_DD'] as $key => $val){
                if (preg_match($pattern, $key) || preg_match($pattern, $val)){
                    $subpanelDef->panel_definition['where'] .= " OR " . $table_name . ".contact_role = '" . $key . "' ";
                }
            }
        }else{
            $subpanelDef->panel_definition['where'] .= " " . $table_name . ".name like '%" . trim($_REQUEST['search_params']) . "%' ";
        }
    }elseif($subpanelDef->name == 'activities' || $subpanelDef->name == 'history'){
        //there is no $table_name in the subpanelDef for history
        $search_module = isset($_REQUEST['search_module'])?$_REQUEST['search_module']:'';;
        foreach ($subpanelDef->sub_subpanels as $key=>$value){
            $module_name = $subpanelDef->sub_subpanels[$key]->_instance_properties['module'];
            if($search_module != 'All' &&  $module_name != $search_module){
                unset($subpanelDef->sub_subpanels[$key]);
            }else{
                global $beanList, $beanFiles;
                $class_name = $beanList[$module_name];
                //require_once($beanFiles[$class_name]); 
                $class_name = new $class_name();
                $table=$class_name->table_name;
                //run through every sub_subpanel
                if(!empty($subpanelDef->sub_subpanels[$key]->panel_definition['where'])){
                    //some of the sub_subpanels already have a where clause, so the filter has to be added to it
                    $subpanelDef->sub_subpanels[$key]->panel_definition['where'] .= " AND UPPER(" . $table . ".name) like '%" . strtoupper(trim($_REQUEST['search_params'])) . "%'";
                }else{
                    //for the sub_subpanels that don't have a where-clause yet
                    $subpanelDef->sub_subpanels[$key]->panel_definition['where'] .= " UPPER(" . $table . ".name) like '%" . strtoupper(trim($_REQUEST['search_params'])) . "%'";
                }
            }
        }
    }
    $subpanel_object = new SubPanel($module, $record, $subpanel,$subpanelDef, $layout_def_key);
    $subpanel_object->setTemplateFile('include/SubPanel/SubPanelDynamic.html');
    echo (empty($_REQUEST['inline']))?$subpanel_object->get_buttons():'' ;
    $subpanel_object->display();

    if(empty($_REQUEST['inline']))
    {
        insert_popup_footer($theme);
    }
?>