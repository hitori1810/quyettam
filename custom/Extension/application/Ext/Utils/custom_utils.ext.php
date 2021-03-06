<?php
function getdiscount(){
    $options = array();
    $sql  = "SELECT id, `name` FROM j_discount ";
    $result = $GLOBALS['db']->query($sql);
    while($discount = $GLOBALS['db']->fetchByAssoc($result)){
        $options[$discount['id']] = $discount['name'];
    }
    return $options;

}

/**
* CustomUtils
* Modified By Thanh Le At 04/2015
* Removed AjaxgetAddress
*/

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
* Convert vietnamese name to no marks
*/
function viToEn($str){
    $str = html_entity_decode_utf8($str);
    //Convert Unicode Dung San
    $str=preg_replace('/(à|á|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ)/','a',$str);
    $str=preg_replace('/(Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ)/','A',$str);

    $str=preg_replace("/(é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ)/",'e',$str);
    $str=preg_replace("/(É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ)/",'E',$str);

    $str=preg_replace("/(í|ì|ỉ|ị|ĩ)/",'i',$str);
    $str=preg_replace("/(Í|Ì|Ỉ|Ĩ|Ị)/",'i',$str);

    $str=preg_replace("/(ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ)/",'o',$str);
    $str=preg_replace("/(Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ)/",'O',$str);

    $str=preg_replace("/(ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự)/",'u',$str);
    $str=preg_replace("/(Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự)/",'U',$str);

    $str=preg_replace("/(ý|ỳ|ỷ|ỹ|ỵ)/",'y',$str);
    $str=preg_replace("/(Ý|Ỳ|Ỷ|Ỹ|Ỵ)/",'Y',$str);

    $str=preg_replace("/(đ)/",'d',$str);
    $str=preg_replace("/(Đ)/",'D',$str);


    //Convert Unicode To Hop
    $str=preg_replace('/(à|á|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ)/','a',$str);
    $str=preg_replace('/(Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ)/','A',$str);

    $str=preg_replace("/(é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ)/",'e',$str);
    $str=preg_replace("/(É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ)/",'E',$str);

    $str=preg_replace("/(í|ì|ỉ|ị|ĩ)/",'i',$str);
    $str=preg_replace("/(Í|Ì|Ỉ|Ĩ|Ị)/",'i',$str);

    $str=preg_replace("/(ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ)/",'o',$str);
    $str=preg_replace("/(Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ)/",'O',$str);

    $str=preg_replace("/(ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự)/",'u',$str);
    $str=preg_replace("/(Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự)/",'U',$str);

    $str=preg_replace("/(ý|ỳ|ỷ|ỹ|ỵ)/",'y',$str);
    $str=preg_replace("/(Ý|Ỳ|Ỷ|Ỹ|Ỵ)/",'Y',$str);

    $str=preg_replace("/(đ)/",'d',$str);
    $str=preg_replace("/(Đ)/",'D',$str);
    $str=preg_replace("/(`)/",'',$str);
    return $str;
}

function getTeamType($team_id){
    return $GLOBALS['db']->getOne("SELECT team_type FROM teams WHERE id = '$team_id' AND deleted = 0");
}

function getParentTeamName($team_id){
    return $GLOBALS['db']->getOne("SELECT l1.name
    FROM teams
    LEFT JOIN teams l1 ON l1.id = teams.parent_id AND l1.deleted <> 1
    WHERE teams.id = '$team_id' AND teams.deleted = 0");
}

/**
 * Generate an array of string dates between 2 dates
 *
 * @param string $start Start date
 * @param string $end End date
 * @param string $format Output format (Default: Y-m-d)
 *
 * @return array
 */
function getDatesFromRange($start, $end, $format = 'Y-m-d') {
    $array = array();
    $interval = new DateInterval('P1D');

    $realEnd = new DateTime($end);
    $realEnd->add($interval);

    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);

    foreach($period as $date) {
        $array[] = $date->format($format);
    }

    return $array;
}
function get_string_between($string, $start = "'", $end = "'"){
    $string = " ".$string;
    $ini = strpos($string,$start);
    if ($ini == 0) return "";
    $ini += strlen($start);
    $len = strpos($string,$end,$ini) - $ini;
    return substr($string,$ini,$len);
}
function checkDataLockDate($input_date_time){
    global $current_user, $timedate, $sugar_config;
    if($sugar_config['lock_info']){
        if(!empty($sugar_config['except_lock_for_user_name'])){
            $count_match = 0;
            $user_name = explode(",", $sugar_config['except_lock_for_user_name']);
            for($i = 0; $i<count($user_name); $i++){
                if($user_name[$i] == $current_user->user_name)
                    $count_match++;
            }
            if($count_match > 0) return true;
        }

        if($current_user->isAdmin())
            return true;
        else{
            $splited            = explode('-',$GLOBALS['sugar_config']['lock_date']);
            $input_date_db      = $timedate->to_db_date($input_date_time, false);
            $check_date_time    = strtotime('first day of next month '.$input_date_db) + ( (intval($splited[0]) - 1) * 86400 ) + ( (intval($splited[1])) * 3600 );
            $now_date           = strtotime('+7hour '. $timedate->nowDb());
            if($now_date > $check_date_time)
                return false;
            else return true;
        }

    }else return true;

}

//Add by Tung Bui - get grade option for vardef
function getProductForVardef()
{
    $sql = "SELECT id, name
    FROM products
    WHERE deleted <> 1
    ORDER BY code";
    $result = $GLOBALS['db']->query($sql);
    $dataArr = array("" => "");
    while ($row = $GLOBALS['db']->fetchByAssoc($result)) {
        $dataArr[$row['id']] = $row['name'];
    }

    return $dataArr;
}
//Add by Tung Bui - get grade option for vardef
function getCustomerForVardef()
{
    $sql = "SELECT id, first_name
    FROM contacts
    WHERE deleted <> 1
    ORDER BY first_name";
    $result = $GLOBALS['db']->query($sql);
    $dataArr = array("" => "");
    while ($row = $GLOBALS['db']->fetchByAssoc($result)) {
        $dataArr[$row['id']] = $row['first_name'];
    }

    return $dataArr;
}
//Add by Tung Bui - get grade option for vardef
function getPaymentForVardef()
{
    $sql = "SELECT id, name
    FROM j_payments
    WHERE deleted <> 1
    ORDER BY name";
    $result = $GLOBALS['db']->query($sql);
    $dataArr = array("" => "");
    while ($row = $GLOBALS['db']->fetchByAssoc($result)) {
        $dataArr[$row['id']] = $row['name'];
    }

    return $dataArr;
}