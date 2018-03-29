<?php
// created: 2018-01-19 16:09:13
$connectors = array (
  'ext_rest_linkedin' => 
  array (
    'id' => 'ext_rest_linkedin',
    'name' => 'LinkedIn&#169;',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/rest/linkedin',
    'eapm' => 
    array (
      'enabled' => true,
    ),
    'modules' => 
    array (
      0 => 'Accounts',
      1 => 'Contacts',
      2 => 'Leads',
      3 => 'Prospects',
    ),
  ),
  'ext_soap_hoovers' => 
  array (
    'id' => 'ext_soap_hoovers',
    'name' => 'Hoovers&#169;',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/soap/hoovers',
    'eapm' => false,
    'modules' => 
    array (
      0 => 'Accounts',
    ),
  ),
  'ext_rest_zoominfocompany' => 
  array (
    'id' => 'ext_rest_zoominfocompany',
    'name' => 'Zoominfo&#169; - Company',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/rest/zoominfocompany',
    'eapm' => false,
    'modules' => 
    array (
      0 => 'Leads',
      1 => 'Accounts',
      2 => 'Contacts',
    ),
  ),
  'ext_rest_zoominfoperson' => 
  array (
    'id' => 'ext_rest_zoominfoperson',
    'name' => 'Zoominfo&#169; - Person',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/rest/zoominfoperson',
    'eapm' => false,
    'modules' => 
    array (
      0 => 'Leads',
      1 => 'Accounts',
      2 => 'Contacts',
    ),
  ),
  'ext_rest_twitter' => 
  array (
    'id' => 'ext_rest_twitter',
    'name' => 'Twitter&#169;',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/rest/twitter',
    'eapm' => 
    array (
      'enabled' => true,
    ),
    'modules' => 
    array (
      0 => 'Accounts',
      1 => 'Contacts',
      2 => 'Leads',
      3 => 'Prospects',
    ),
  ),
  'ext_eapm_facebook' => 
  array (
    'id' => 'ext_eapm_facebook',
    'name' => 'Facebook&#169;',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/eapm/facebook',
    'eapm' => 
    array (
      'enabled' => true,
      'only' => true,
    ),
    'modules' => 
    array (
    ),
  ),
  'ext_eapm_google' => 
  array (
    'id' => 'ext_eapm_google',
    'name' => 'Google&#169;',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/eapm/google',
    'eapm' => 
    array (
      'enabled' => true,
      'only' => true,
    ),
    'modules' => 
    array (
    ),
  ),
  'ext_eapm_gotomeeting' => 
  array (
    'id' => 'ext_eapm_gotomeeting',
    'name' => 'GoToMeeting&#169;',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/eapm/gotomeeting',
    'eapm' => 
    array (
      'enabled' => true,
      'only' => true,
    ),
    'modules' => 
    array (
    ),
  ),
  'ext_eapm_ibmsmartcloud' => 
  array (
    'id' => 'ext_eapm_ibmsmartcloud',
    'name' => 'IBM SmartCloud&#169;',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/eapm/ibmsmartcloud',
    'eapm' => 
    array (
      'enabled' => true,
      'only' => true,
    ),
    'modules' => 
    array (
    ),
  ),
  'ext_eapm_webex' => 
  array (
    'id' => 'ext_eapm_webex',
    'name' => 'WebEx&#169;',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/eapm/webex',
    'eapm' => 
    array (
      'enabled' => true,
      'only' => true,
    ),
    'modules' => 
    array (
    ),
  ),
  'ext_eapm_lotuslive' => 
  array (
    'id' => 'ext_eapm_lotuslive',
    'name' => 'LotusLive&#169;',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/eapm/lotuslive',
    'eapm' => 
    array (
      'enabled' => true,
      'only' => true,
    ),
    'modules' => 
    array (
    ),
  ),
  'ext_rest_insideview' => 
  array (
    'id' => 'ext_rest_insideview',
    'name' => 'InsideView&#169;',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/rest/insideview',
    'eapm' => false,
    'modules' => 
    array (
    ),
  ),
  'ext_rest_sugarchimplist' => 
  array (
    'id' => 'ext_rest_sugarchimplist',
    'name' => 'SugarChimp List Properties',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/rest/sugarchimplist',
    'eapm' => 
    array (
      'enabled' => true,
    ),
    'modules' => 
    array (
      0 => 'ProspectLists',
    ),
  ),
  'ext_rest_sugarchimp' => 
  array (
    'id' => 'ext_rest_sugarchimp',
    'name' => 'MailChimp Activities',
    'enabled' => true,
    'directory' => 'custom/modules/Connectors/connectors/sources/ext/rest/sugarchimp',
    'eapm' => 
    array (
      'enabled' => true,
    ),
    'modules' => 
    array (
      0 => 'Contacts',
      1 => 'Prospects',
      2 => 'Leads',
      3 => 'Accounts',
    ),
  ),
);