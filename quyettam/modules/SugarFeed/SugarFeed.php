<?PHP
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/


class SugarFeed extends Basic {
	var $new_schema = true;
	var $module_dir = 'SugarFeed';
	var $object_name = 'SugarFeed';
	var $table_name = 'sugarfeed';
	var $importable = false;

		var $id;
		var $name;
		var $date_entered;
		var $date_modified;
		var $modified_user_id;
		var $modified_by_name;
		var $created_by;
		var $created_by_name;
		var $description;
		var $deleted;
		var $created_by_link;
		var $modified_user_link;
		var $team_id;
		var $team_name;
		var $team_link;
		var $assigned_user_id;
		var $assigned_user_name;
		var $assigned_user_link;

    /**
     * This is a depreciated method, please start using __construct() as this method will be removed in a future version
     *
     * @see __construct
     * @deprecated
     */
    public function SugarFeed()
    {
        self::__construct();
    }

	public function __construct(){
		parent::__construct();
	}

    static function activateModuleFeed( $module, $updateDB = true ) {
        if ( $module != 'UserFeed' ) {
            // UserFeed is a fake module, used for the user postings to the feed
            // Don't try to load up any classes for it
            $fileList = SugarFeed::getModuleFeedFiles($module);

            foreach ( $fileList as $fileName ) {
                $feedClass = substr(basename($fileName),0,-4);

                require_once($fileName);
                $tmpClass = new $feedClass();
                $tmpClass->installHook($fileName,$feedClass);
            }
        }
        if ( $updateDB == true ) {

            $admin = new Administration();
            $admin->saveSetting('sugarfeed','module_'.$admin->db->quote($module),'1');
        }
    }

    static function disableModuleFeed( $module, $updateDB = true ) {
        if ( $module != 'UserFeed' ) {
            // UserFeed is a fake module, used for the user postings to the feed
            // Don't try to load up any classes for it
            $fileList = SugarFeed::getModuleFeedFiles($module);

            foreach ( $fileList as $fileName ) {
                $feedClass = substr(basename($fileName),0,-4);

                require_once($fileName);
                $tmpClass = new $feedClass();
                $tmpClass->removeHook($fileName,$feedClass);
            }
        }

        if ( $updateDB == true ) {

            $admin = new Administration();
            $admin->saveSetting('sugarfeed','module_'.$admin->db->quote($module),'0');
        }
    }

    static function flushBackendCache( ) {
        // This function will flush the cache files used for the module list and the link type lists
        sugar_cache_clear('SugarFeedModules');
        if ( file_exists($cachefile = sugar_cached('modules/SugarFeed/moduleCache.php'))) {
            unlink($cachefile);
        }

        sugar_cache_clear('SugarFeedLinkType');
        if ( file_exists($cachefile = sugar_cached('modules/SugarFeed/linkTypeCache.php'))) {
            unlink($cachefile);
        }
    }


    static function getModuleFeedFiles( $module )
    {
        // We store the files in a list sorted by the filename so you can override a default feed by
        // putting your replacement feed in the custom directory with the same filename
        $fileList = array();

        foreach(SugarAutoLoader::getFilesCustom('modules/'.$module.'/SugarFeeds/') as $file) {
            if ( substr($file,-4) == '.php' ) {
                $fileList[basename($file)] = $file;
            }
        }

        return $fileList;
    }

    static function getActiveFeedModules( )
    {
        // Stored in a cache somewhere
        $feedModules = sugar_cache_retrieve('SugarFeedModules');
        if ( $feedModules != null ) {
            return($feedModules);
        }

        // Already stored in a file
        if ( file_exists($cachefile = sugar_cached('modules/SugarFeed/moduleCache.php'))) {
            require_once($cachefile);
            sugar_cache_put('SugarFeedModules',$feedModules);
            return $feedModules;
        }

        // Gotta go looking for it

        $admin = new Administration();
        $admin->retrieveSettings();

        $feedModules = array();
        if ( isset($admin->settings['sugarfeed_enabled']) && $admin->settings['sugarfeed_enabled'] == '1' ) {
            // Only enable modules if the feed system is enabled
            foreach ( $admin->settings as $key => $value ) {
                if ( strncmp($key,'sugarfeed_module_',17) === 0 ) {
                    // It's a module setting
                    if ( $value == '1' ) {
                        $moduleName = substr($key,17);
                        $feedModules[$moduleName] = $moduleName;
                    }
                }
            }
        }


        sugar_cache_put('SugarFeedModules',$feedModules);
        if ( ! file_exists($cachedir = sugar_cached('modules/SugarFeed')))  {
            mkdir_recursive($cachedir);
        }
        $fd = fopen("$cachedir/moduleCache.php",'w');
        fwrite($fd,'<'."?php\n\n".'$feedModules = '.var_export($feedModules,true).';');
        fclose($fd);

        return $feedModules;
    }

    static function getAllFeedModules( )
    {
        // Uncached, only used from the admin panel and during installation currently
        $feedModules = array('UserFeed'=>'UserFeed');

        foreach(SugarAutoLoader::getFilesCustom("modules", true) as $module) {
            foreach(SugarAutoLoader::getDirFiles($module.'/SugarFeeds/') as $file) {
                if ( substr($file,-4) == '.php' ) {
                	// We found one
                	$modulename = basename($module);
                	$feedModules[$modulename] = $modulename;
                }
            }
        }

        return $feedModules;
    }

    /**
     * pushFeed2
     * This method is a wrapper to pushFeed
     *
     * @param $text String value of the feed's description
     * @param $bean The SugarBean that is triggering the feed
     * @param $link_type boolean value indicating whether or not feed is a link type
     * @param $link_url String value of the URL (for link types only)
     */
    static function pushFeed2($text, $bean, $link_type=false, $link_url=false) {
            self::pushFeed($text, $bean->module_dir, $bean->id
                                ,$bean->team_id
								,$bean->assigned_user_id
								,$link_type
								,$link_url
                                ,$bean->team_set_id
            );
    }

	static function pushFeed($text, $module, $id,
		$team_id,
		$record_assigned_user_id=false,
		$link_type=false,
		$link_url=false
		,$team_set_id=''
		) {
		$feed = new SugarFeed();
		if((empty($text) && empty($link_url)) || !$feed->ACLAccess('save', true) )
		{
			$GLOBALS['log']->error('Unable to save SugarFeed record (missing data or no ACL access)');
			return;
		}

		if(!empty($link_url)){
            $linkClass = SugarFeed::getLinkClass($link_type);
            if ( $linkClass !== FALSE ) {
                $linkClass->handleInput($feed,$link_type,$link_url);
            }
        }
        $text = strip_tags(from_html($text));
		$text = '<b>{this.CREATED_BY}</b> ' . $text;
		$feed->name = substr($text, 0, 255);
		if(strlen($text) > 255){
			$feed->description = substr($text, 255, 510);
		}

		if ( $record_assigned_user_id === false ) {
			$feed->assigned_user_id = $GLOBALS['current_user']->id;
		} else {
			$feed->assigned_user_id = $record_assigned_user_id;
		}
		$feed->related_id = $id;
		$feed->related_module = $module;
		$feed->team_id = $team_id;
		$feed->team_set_id = empty($team_set_id) ? $team_id : $team_set_id;
		$feed->save();
	}

    static function getLinkTypes() {
        static $linkTypeList = null;

        // Fastest, already stored in the static variable
        if ( $linkTypeList != null ) {
            return $linkTypeList;
        }

        // Second fastest, stored in a cache somewhere
        $linkTypeList = sugar_cache_retrieve('SugarFeedLinkType');
        if ( $linkTypeList != null ) {
            return($linkTypeList);
        }

        // Third fastest, already stored in a file
        if ( file_exists($cachedfile = sugar_cached('modules/SugarFeed/linkTypeCache.php'))) {
            require_once($cachedfile);
            sugar_cache_put('SugarFeedLinkType',$linkTypeList);
            return $linkTypeList;
        }

        // Slow, have to actually collect the data
        $linkTypeList = array();

        foreach(SugarAutoLoader::getFilesCustom('modules/SugarFeed/linkHandlers') as $file) {
            if ( substr($file,-4) == '.php' ) {
            	// We found one
            	$typeName = substr(basename($file),0,-4);
            	$linkTypeList[$typeName] = $typeName;
            }
        }

        sugar_cache_put('SugarFeedLinkType',$linkTypeList);

        create_cache_directory('modules/SugarFeed/linkTypeCache.php');
        write_array_to_file('linkTypeList', $linkTypeList, $cachedfile);

        return $linkTypeList;
    }

    static function getLinkClass( $linkName ) {
        $linkTypeList = SugarFeed::getLinkTypes();

        // Have to make sure the linkName is on the list, so they can't pass in linkName's like ../../config.php ... not that they could get anywhere if they did
        if ( ! isset($linkTypeList[$linkName]) ) {
            // No class by this name...
            return FALSE;
        }

        SugarAutoLoader::requireWithCustom('modules/SugarFeed/linkHandlers/'.$linkName.'.php');
        $linkClassName = 'FeedLinkHandler'.$linkName;
        $linkClass = new $linkClassName();

        return $linkClass;
    }

	function get_list_view_data(){
		$data = parent::get_list_view_data();
		if ( !isset($data['TEAM_NAME']) )
		    $data['TEAM_NAME'] = '';
		$delete = '';
		if (ACLController::moduleSupportsACL($data['RELATED_MODULE']) && !ACLController::checkAccess($data['RELATED_MODULE'], 'view', $data['CREATED_BY'] == $GLOBALS['current_user']->id) && !ACLController::checkAccess($data['RELATED_MODULE'], 'list', $data['CREATED_BY'] == $GLOBALS['current_user']->id)){
			$data['NAME'] = '';
			return $data;
		}
        if(is_admin($GLOBALS['current_user']) || (isset($data['CREATED_BY']) && $data['CREATED_BY'] == $GLOBALS['current_user']->id) ) {
            $delete = ' - <a id="sugarFeedDeleteLink'.$data['ID'].'" href="#" onclick=\'SugarFeed.deleteFeed("'. $data['ID'] . '", "{this.id}"); return false;\'>'. $GLOBALS['app_strings']['LBL_DELETE_BUTTON_LABEL'].'</a>';
        }
		$data['NAME'] .= $data['DESCRIPTION'];
		$data['NAME'] =  '<div style="padding:3px">' . html_entity_decode($data['NAME']);
		if(!empty($data['LINK_URL'])){
            $linkClass = SugarFeed::getLinkClass($data['LINK_TYPE']);
            if ( $linkClass !== FALSE ) {
                $data['NAME'] .= $linkClass->getDisplay($data);
            }
		}
        $data['NAME'] .= '<div class="byLineBox"><span class="byLineLeft">';
		$data['NAME'] .= $this->getTimeLapse($data['DATE_ENTERED']) . '&nbsp;</span><div class="byLineRight"><a id="sugarFeedReplyLink'.$data['ID'].'" href="#" onclick=\'SugarFeed.buildReplyForm("'.$data['ID'].'", "{this.id}", this); return false;\'>'.$GLOBALS['app_strings']['LBL_EMAIL_REPLY'].'</a>' .$delete. '</div></div>';

        $data['NAME'] .= $this->fetchReplies($data);
		return  $data ;
	}

    function fetchReplies($data) {
        $seedBean = new SugarFeed;

        $replies = $seedBean->get_list('date_entered',"related_module = 'SugarFeed' AND related_id = '".$data['ID']."'");

        if ( count($replies['list']) < 1 ) {
            return '';
        }


        $replyHTML = '<div class="clear"></div><blockquote>';

        foreach ( $replies['list'] as $reply ) {
            // Setup the delete link
            $delete = '';
            if(is_admin($GLOBALS['current_user']) || $data['CREATED_BY'] == $GLOBALS['current_user']->id) {
                $delete = '<a id="sugarFieldDeleteLink'.$reply->id.'" href="#" onclick=\'SugarFeed.deleteFeed("'. $reply->id . '", "{this.id}"); return false;\'>'. $GLOBALS['app_strings']['LBL_DELETE_BUTTON_LABEL'].'</a>';
            }

            if ( isset($reply->created_by) ) {
                $user = BeanFactory::getBean('Users', $reply->created_by);
                $image_url = 'index.php?entryPoint=download&id='.$user->picture.'&type=SugarFieldImage&isTempFile=1&isProfile=1';
                $user_name = $user->name;
            } else {
                $image_url = 'include/images/default_user_feed_picture.png';
                $user_name = '';
            }
            $replyHTML .= '<div style="float: left; margin-right: 3px; width: 50px; height: 50px;"><!--not_in_theme!--><img src="'.$image_url.'" style="max-width: 50px; max-height: 50px;"></div> ';
            $replyHTML .= str_replace("{this.CREATED_BY}",$user_name,html_entity_decode($reply->name)).'<br>';
            $replyHTML .= '<div class="byLineBox"><span class="byLineLeft">'. $this->getTimeLapse($reply->date_entered) . '&nbsp;</span><div class="byLineRight">  &nbsp;' .$delete. '</div></div><div class="clear"></div>';
        }

        $replyHTML .= '</blockquote>';
        return $replyHTML;

    }

	static function getTimeLapse($startDate)
	{
		$seconds = $GLOBALS['timedate']->getNow()->ts - $GLOBALS['timedate']->fromUser($startDate)->ts;
		$minutes =   $seconds/60;
		$seconds = $seconds % 60;
		$hours = floor( $minutes / 60);
		$minutes = $minutes % 60;
		$days = floor( $hours / 24);
		$hours = $hours % 24;
		$weeks = floor( $days / 7);
		$days = $days % 7;
		$result = '';
		if($weeks == 1){
			$result = translate('LBL_TIME_LAST_WEEK','SugarFeed').' ';
			return $result;
		}else if($weeks > 1){
			$result .= $weeks . ' '.translate('LBL_TIME_WEEKS','SugarFeed').' ';
			if($days > 0) {
                $result .= $days . ' '.translate('LBL_TIME_DAYS','SugarFeed').' ';
            }
		}else{
			if($days == 1){
				$result = translate('LBL_TIME_YESTERDAY','SugarFeed').' ';
				return $result;
			}else if($days > 1){
				$result .= $days . ' '. translate('LBL_TIME_DAYS','SugarFeed').' ';
			}else{
				if($hours == 1) {
                    $result .= $hours . ' '.translate('LBL_TIME_HOUR','SugarFeed').' ';
                } else {
                    $result .= $hours . ' '.translate('LBL_TIME_HOURS','SugarFeed').' ';
                }
				if($hours < 6){
					if($minutes == 1) {
                        $result .= $minutes . ' ' . translate('LBL_TIME_MINUTE','SugarFeed'). ' ';
                    } else {
                        $result .= $minutes . ' ' . translate('LBL_TIME_MINUTES','SugarFeed'). ' ';
                    }
				}
				if($hours == 0 && $minutes == 0) {
                    if($seconds == 1 ) {
                        $result = $seconds . ' ' . translate('LBL_TIME_SECOND','SugarFeed');
                    } else {
                        $result = $seconds . ' ' . translate('LBL_TIME_SECONDS','SugarFeed');
                    }
                }
			}
		}
		return $result . ' ' . translate('LBL_TIME_AGO','SugarFeed');
    }

    /**
     * Parse a piece of text and replace with proper display tags.
     * @static
     * @param  $input
     * @return void
     */
    public static function parseMessage($input){
        $urls = getUrls($input);
        foreach($urls as $url){
			$output = "<a href='$url' target='_blank'>".$url."</a>";
			$input = str_replace($url, $output, $input);
		}
		return $input;
    }


}
