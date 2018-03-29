<?php
echo '<html>
<head>
<script>
function loaded()
{
    window.setTimeout(CloseMe, 100);
}

function CloseMe()
{
    window.close();
}
</script>
</head>
<body onLoad="loaded()">
Debugger !!
</body>';


//TEMP CONFIG SIS
//  'dbconfig' =>
//  array (
//    'db_host_name' => '103.27.237.53',
//    'db_host_instance' => 'SQLEXPRESS',
//    'db_user_name' => 'lap.nguyen',
//    'db_password' => 'UNdV3vQN8T6nx79R',
//    'db_name' => 'sis_bk',
//    'db_type' => 'mysqli',
//    'db_port' => '',
//    'db_manager' => 'MysqliManager',
//  ),
?>