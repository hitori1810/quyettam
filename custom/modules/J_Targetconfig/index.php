<?php
function loadTargetConfig(){
    global $current_user, $app_list_strings, $timedate;
    $ss = new Sugar_Smarty();

    //Get Center List
    $user_id = $current_user->id;
    if($current_user->isAdmin())  $user_id = '1';

    $q1 = "SELECT DISTINCT
    IFNULL(users.id, '') primaryid,
    IFNULL(users.user_name, '') users_user_name,
    IFNULL(l2.id, '') id,
    IFNULL(l2.name, '') name,
    IFNULL(l2.team_type, '') team_type
    FROM
    users
    INNER JOIN
    teams l1 ON users.default_team = l1.id
    AND l1.deleted = 0
    INNER JOIN
    team_memberships l2_1 ON users.id = l2_1.user_id
    AND l2_1.deleted = 0
    INNER JOIN
    teams l2 ON l2.id = l2_1.team_id AND l2.deleted = 0
    WHERE (((users.id = '$user_id') AND l2.sms_config <> ''))
    AND users.deleted = 0
    ORDER BY l2.team_type ASC";
    $res1       = $GLOBALS['db']->query($q1);
    $html       = "";
    $first_opt  = true;
    $previous   = '';
    $teams      = array();
    while($row = $GLOBALS['db']->fetchByAssoc($res1)){
        if ($row['team_type'] != $previous){
            if(!$first_opt)
                $html .= '</optgroup>';
             else
                $first_opt = false;

            $html .= '<optgroup label="' . $row['team_type'] . '">';
            $previous = $row['team_type'];
        }
        $html .= '<option value="'.$row["id"].'">'.$row["name"].'</option>';
        $teams[] = $row['id'];
    }
    $ss->assign("MOD", $GLOBALS['mod_strings']);
    $ss->assign("option_center", "<option value='".implode(",", $teams)."' selected>-Select all-</option>".$html);
    $ss->assign("option_type", get_select_options_with_id($app_list_strings['type_targetconfig_list'],''));
    $ss->assign("option_year", get_select_options_with_id($app_list_strings['year_targetconfig_list'],date('Y')));
    $ss->assign("option_frequency", get_select_options_with_id($app_list_strings['frequency_targetconfig_list'],''));
    $ss->assign("option_unit_from", get_select_options_with_id(['','1'],''));
    $ss->assign("option_unit_to", get_select_options_with_id(['','1'],''));
    return $ss->fetch('custom/modules/J_Targetconfig/tpls/targetConfig.tpl');
}
echo  loadTargetConfig();