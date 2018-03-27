<?php
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


    // For $exemptModules, set the value to the module name is be exempt
    $exemptModules[] = 'ProspectLists';
    $exemptModules[] = 'Reports';

    //added by HB
 //   $exemptModules[] = 'C_SMS';


    $exemptModules[] = 'jjwg_Maps';
    $exemptModules[] = 'jjwg_Markers';
    $exemptModules[] = 'jjwg_Areas';
    $exemptModules[] = 'jjwg_Address_Cache';

    $exemptModules[] = 'C_Notifications';
    $exemptModules[] = 'C_KnowledgeBase';
    $exemptModules[] = 'DocumentRevisions';


    $exemptModules[] = 'CampaignLog';
    $exemptModules[] = 'Releases';
    $exemptModules[] = 'Currencies';
    $exemptModules[] = 'Trackers';
    $exemptModules[] = 'C_District';
    $exemptModules[] = 'C_Provice';
    $exemptModules[] = 'C_Report';
    
    
    $exemptModules[] = 'Project';
    $exemptModules[] = 'ProjectResources';
    $exemptModules[] = 'ProjectTask';
    $exemptModules[] = 'C_ConfigID';
    $exemptModules[] = 'Bugs';
//    $exemptModules[] = 'Currencies';
    $exemptModules[] = 'Forecasts';
    $exemptModules[] = 'C_Invoicelines';
    $exemptModules[] = 'KBDocuments';
    $exemptModules[] = 'ProductCategories';
    $exemptModules[] = 'ProductTypes';
    $exemptModules[] = 'Products';
    $exemptModules[] = 'Notes';
    $exemptModules[] = 'Quotas';
    $exemptModules[] = 'Quotes';
 //   $exemptModules[] = 'Contracts';
    $exemptModules[] = 'Worksheet';
    $exemptModules[] = 'TrackerSessions';
    $exemptModules[] = 'TrackerQueries';
    $exemptModules[] = 'TrackerPerfs';
    $exemptModules[] = 'TimePeriods';
//    $exemptModules[] = 'Accounts';
//    $exemptModules[] = 'Calls';
//    $exemptModules[] = 'Campaigns';
//    $exemptModules[] = 'Cases';
//   $exemptModules[] = 'C_Classes';
    $exemptModules[] = 'Documents';
//    $exemptModules[] = 'EmailAddresses';
//    $exemptModules[] = 'Emails';
    $exemptModules[] = 'C_Opplines';
//    $exemptModules[] = 'C_Rooms';
//    $exemptModules[] = 'Prospects';
//    $exemptModules[] = 'Tasks';
//    $exemptModules[] = 'C_Teachers';
//    $exemptModules[] = 'Teams';
//    $exemptModules[] = 'Users';
    

    // For $additionalModules, set the value to the module name to add
