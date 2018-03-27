<?php
    require_once("custom/application/Ext/Utils/custom_utils.ext.php");
    $htmlOptions = ajaxGetDistrictByProvince($_POST['province_value'], $_POST['district_value']);
    echo $htmlOptions;
?>