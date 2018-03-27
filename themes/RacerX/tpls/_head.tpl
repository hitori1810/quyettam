
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html {$langHeader}>
    <head>

        <link rel="SHORTCUT ICON" href="{$FAVICON_URL}">
        <meta http-equiv="Content-Type" content="text/html; charset={$APP.LBL_CHARSET}">
        <title>{$SYSTEM_NAME}</title>
        {$SUGAR_CSS}
        {if $AUTHENTICATED}
            <link rel='stylesheet' href='{sugar_getjspath file="include/ytree/TreeView/css/folders/tree.css"}'/>
            <link rel='stylesheet' href='{sugar_getjspath file="include/SugarCharts/Jit/css/base.css"}'/>
        {/if}
        {$SUGAR_JS}

        {literal}
            <script type="text/javascript">
                <!--
                SUGAR.themes.theme_name = '{/literal}{$THEME}{literal}';
                SUGAR.themes.hide_image = '{/literal}{sugar_getimagepath file="hide.gif"}{literal}';
                SUGAR.themes.show_image = '{/literal}{sugar_getimagepath file="show.gif"}{literal}';
                SUGAR.themes.loading_image = '{/literal}{sugar_getimagepath file="img_loading.gif"}{literal}';
                if (YAHOO.env.ua)
                    UA = YAHOO.env.ua;
                -->

            </script>
        {/literal}
        
        <link rel="stylesheet" type="text/css" href="{sugar_getjspath file='custom/include/javascripts/MultipleSelect/multiple-select.css'}"/>
        <link rel="stylesheet" type="text/css" href="{sugar_getjspath file='custom/include/css/CustomStyle.css'}"/>
		{sugar_getscript file="custom/include/javascripts/currency_fm.js"}
        {sugar_getscript file="custom/include/javascripts/jquery.tooltip.js"}
        {sugar_getscript file="custom/include/javascripts/CustomSubpanel.js"}
        {sugar_getscript file="custom/include/javascripts/MultipleSelect/jquery.multiple.select.js"}
        {sugar_getscript file="custom/include/javascripts/CustomMultiSelectFields.js"}
        {sugar_getscript file="custom/include/javascripts/StringUtil.js"}
        {sugar_getscript file="custom/modules/C_DuplicationDetection/js/DuplicationDetectionHandler.js"}

    </head>
