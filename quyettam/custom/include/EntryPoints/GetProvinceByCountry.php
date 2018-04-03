<?php
    require_once("custom/application/Ext/Utils/custom_utils.ext.php");
    $htmlOptions = ajaxGetProvinceByCountry($_POST['country_value'],$_POST['province_value']);
    echo $htmlOptions;
?>