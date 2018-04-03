<?php

class ProspectsViewEdit extends ViewEdit {

    function ProspectsViewEdit(){
        parent::ViewEdit();
    }

    function preDisplay(){
        parent::preDisplay();
    }
    public function display()
    {
        $team_id 	= $GLOBALS['current_user']->team_id;

        $_type = $GLOBALS['db']->getOne("SELECT team_type FROM teams WHERE id = '{$team_id}'");
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

        $this->ss->assign('lead_source', $html_source);
        //End: Generate Lead Source

        $this->bean->assigned_user_name = get_assigned_user_name($this->bean->assigned_user_id);

        if(!empty($this->bean->campaign_id) && empty($this->bean->campaign_name))
            $this->bean->campaign_id = '';

        if(!empty($this->bean->j_school_prospects_1j_school_ida) && empty($this->bean->j_school_prospects_1_name))
            $this->bean->j_school_prospects_1j_school_ida = '';
        //Generate School
        if(!empty($this->bean->j_school_prospects_1j_school_ida)){
            $school = BeanFactory::getBean('J_School',$this->bean->j_school_prospects_1j_school_ida);
            $school->name = $school->level.': '.$school->name;
            if(!empty($school->address_address_street)){
                $school->name .= " ({$school->address_address_street})";
            }
            $this->bean->j_school_prospects_1_name = $school->name;
        }

        $color = '';
        switch($this->bean->status) {
            case 'New':
                $color = "textbg_green";
                break;
            case 'In Process':
                $color = "textbg_blue";
                break;
            case 'Dead':
                $color = "textbg_black";
                break;
            case 'Converted':
                $color = "textbg_red";
                break;
        }
        $this->ss->assign('STATUS',"<span class='$color'>{$this->bean->status}</span>");
        parent::display();
    }
}

?>