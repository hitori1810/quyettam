<?php
class GradebookLogicHooks{
    function genagateName(&$bean, $event, $arg) {
        $thisClass          = BeanFactory::getBean("J_Class", $bean->j_class_j_gradebook_1j_class_ida);
        $bean->team_id      = $thisClass->team_id;
        $bean->team_set_id  = $bean->team_id;
        
        $teamCode   = $GLOBALS['db']->getOne("SELECT short_name FROM teams WHERE id = '{$bean->team_id}' ");
        
        $bean->name = $teamCode .'-' . $thisClass->name .'-'.$bean->type;
        if($bean->type != 'Progress')
            $bean->minitest = '';
            
        if(!empty($bean->minitest))
            $bean->name .= '-'.$bean->minitest;

        $gradebookConfig = new J_GradebookConfig();
        $gradebookConfig->retrieve_by_string_fields(
            array(
                'team_id'   => $thisClass->team_id,
                'koc_id'    => $thisClass->koc_id,
                'type'      => $bean->type,
                'minitest'  => $bean->minitest,
            )
        );
        if(!empty($gradebookConfig->content) && !empty($gradebookConfig->id)){
            $bean->grade_config = $gradebookConfig->content;
            $bean->weight       = $gradebookConfig->weight;
            $bean->gradebook_config_id = $gradebookConfig->id;
        } 
        
    }
    function updateBeforeSave(&$bean, $event, $arg) {
        global $timedate;
        //#420
        if($bean->status == 'Approved' && empty($bean->date_confirm)) {
            $bean->date_confirm = $timedate->nowDbDate();
        }
        //end #420
    }
}
?>
