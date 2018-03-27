<?php
    require_once("custom/application/Ext/Utils/custom_utils.ext.php");
    $htmlOptions = ajaxGetWardByDistrict($_POST['district_value'], $_POST['ward_value']);
    echo $htmlOptions;
?>