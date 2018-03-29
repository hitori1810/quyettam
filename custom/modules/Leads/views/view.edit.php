<?php

class LeadsViewEdit extends ViewEdit {

    function LeadsViewEdit(){
        parent::ViewEdit();
    }

    function preDisplay(){
        parent::preDisplay();
    }
    public function display()
    {
        global $current_user;
        $is_target_convert = false;
        if(!empty($_REQUEST['return_id']) && $_REQUEST['return_module'] == 'Prospects'){
            $prospect = BeanFactory::getBean('Prospects', $_REQUEST['return_id']);
            foreach ($prospect->field_defs as $keyField => $aFieldName)
                $this->bean->$keyField = $prospect->$keyField;

            $this->bean->j_school_leads_1_name = $prospect->j_school_prospects_1_name;
            $this->bean->j_school_leads_1j_school_ida = $prospect->j_school_prospects_1j_school_ida;

            $this->bean->id = '';
            $this->bean->assigned_user_id = $prospect->assigned_user_id;
            $this->bean->assigned_user_name = get_assigned_user_name($this->bean->assigned_user_id);
            $is_target_convert = true;
        }
        $this->ss->assign('is_target_convert', $is_target_convert);


        if(!empty($this->bean->campaign_id) && empty($this->bean->campaign_name))
            $this->bean->campaign_id = '';

        if(!empty($this->bean->j_school_leads_1j_school_ida) && empty($this->bean->j_school_leads_1_name))
            $this->bean->j_school_leads_1j_school_ida = '';

        $html = '';
        $status ='';
        if( empty($this->bean->id) ){
            $html .= '<label style="display: inline-block;"><input name="radio_national" value="Việt Nam" id="vietnam_national" type="radio" checked = "checked"> Việt Nam</label> &nbsp';
            $html .= '<label style="display: inline-block;"><input value="" name="radio_national" id="other_national" type="radio" > Other</label> &nbsp;';
            $html .= '<input type="text" style="display:none" name="nationality" id="nationality" size="30" maxlength="255" value="'.$this->bean->nationality.'">';
            $status .= '<label>New</label>' ;
        }
        else {
            $html .= '<label style="display: inline-block;"><input name="radio_national" value="Việt Nam" id="vietnam_national" type="radio"> Việt Nam</label> &nbsp';
            $html .= '<label style="display: inline-block;"><input value="" name="radio_national" id="other_national" type="radio" checked = "checked"> Other</label> &nbsp;';
            $html .= '<input type="text" name="nationality" id="nationality" size="30" maxlength="255" value="'.$this->bean->nationality.'">';
            $status .= '<label>'.$this->bean->status.'</label>' ;
        }

        $this->ss->assign('assigned_user_id_2', $this->bean->assigned_user_id);

        $this->ss->assign('birthdate_2', $this->bean->birthdate);

        $this->ss->assign('first_name_2', $this->bean->first_name);

        $this->ss->assign('last_name_2', $this->bean->last_name);

        $this->ss->assign('phone_mobile_2', $this->bean->phone_mobile);

        $team_id 	= $this->bean->team_id;
        if(empty($team_id)) $team_id = $GLOBALS['current_user']->team_id;
        $_type = $GLOBALS['db']->getOne("SELECT team_type FROM teams WHERE id = '{$team_id}'");
        if($_type == 'Junior'){
            //generate Prefered kind of course
            $html_koc = '<select name="prefer_level" id="prefer_level">';
            $html_koc .= get_select_options_with_id($GLOBALS['app_list_strings']['kind_of_course_list'], $this->bean->prefer_level);
            $html_koc .= '</select>';
        }else{
            //generate Prefered kind of course
            $html_koc = '<select name="prefer_level" id="prefer_level">';
            $html_koc .= get_select_options_with_id($GLOBALS['app_list_strings']['kind_of_course_360_list'], $this->bean->prefer_level);
            $html_koc .= '</select>';
        }

        //generate Lead Source
        $html_source = '<select title="'.translate('LBL_LEAD_SOURCE').'" style="width: 40%;" name="lead_source" id="lead_source"><option value="">-none-</option>';
        $html_source .= '<optgroup label="Online">';
        foreach($GLOBALS['app_list_strings']['online_source_list'] as $key => $value){
            $sel = ($this->bean->lead_source == $key) ? 'selected' : '';
            $html_source .= '<option '.$sel.' value="'.$key.'">'.$value.'</option>';
        }
        $html_source .= '</optgroup>';
        $html_source .= '<optgroup label="Offline">';
        foreach($GLOBALS['app_list_strings']['offline_source_list'] as $key => $value){
            $sel = ($this->bean->lead_source == $key) ? 'selected' : '';
            $html_source .= '<option '.$sel.' value="'.$key.'">'.$value.'</option>';
        }
        $html_source .= '</optgroup></select>';
//        $html_source .= '<select title="'.translate('LBL_ACTIVITY').'" style="width: 30%; margin-left: 4px;" name="activity" id="activity">';
//        $html_source .= get_select_options_with_id($GLOBALS['app_list_strings']['activity_source_list'], $this->bean->activity);
//        $html_source .= '</select>';


        $this->ss->assign('NATIONALITY', $html);
        if(ACLController::checkAccess('J_Marketingplan', 'import', true))
            $this->ss->assign('is_role_mkt', '1');
        else
            $this->ss->assign('is_role_mkt', '1');

        $this->ss->assign('team_type',$_type);
        $this->ss->assign('lead_source', $html_source);
        //End: Generate Lead Source

        $this->ss->assign('STATUS', $status);
        $this->ss->assign('html_koc',$html_koc);
        $this->ss->assign('phone_mobile', $this->bean->phone_mobile);
        if(!empty($this->bean->full_lead_name))
            $this->ss->assign('full_lead_name', $this->bean->full_lead_name);
        else
            $this->ss->assign('full_lead_name', $this->bean->last_name.' '.$this->bean->first_name);

        //Navigate Form Base convert Target -> Lead
        if(!empty($_REQUEST['prospect_id'])){
            $_REQUEST['return_module'] 	= 'Leads';
            $_REQUEST['return_id'] 		= '';
            $this->bean->status = 'New';
            $this->bean->potential = 'Interested';
        }
        if($_REQUEST['isDuplicate'] == "true"){
            $this->bean->status = 'New';
        }

        //Generate School
        if(!empty($this->bean->j_school_leads_1j_school_ida)){
            $school = BeanFactory::getBean('J_School',$this->bean->j_school_leads_1j_school_ida);
            $school->name = $school->level.': '.$school->name;
            if(!empty($school->address_address_street)){
                $school->name .= " ({$school->address_address_street})";
            }
            $this->bean->j_school_leads_1_name = $school->name;
        }
        parent::display();
    }
}