<?php /* Smarty version 2.6.11, created on 2018-03-27 23:02:58
         compiled from themes/RacerX/tpls/_head.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'sugar_getjspath', 'themes/RacerX/tpls/_head.tpl', 11, false),array('function', 'sugar_getimagepath', 'themes/RacerX/tpls/_head.tpl', 20, false),array('function', 'sugar_getscript', 'themes/RacerX/tpls/_head.tpl', 32, false),)), $this); ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html <?php echo $this->_tpl_vars['langHeader']; ?>
>
    <head>

        <link rel="SHORTCUT ICON" href="<?php echo $this->_tpl_vars['FAVICON_URL']; ?>
">
        <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_tpl_vars['APP']['LBL_CHARSET']; ?>
">
        <title><?php echo $this->_tpl_vars['SYSTEM_NAME']; ?>
</title>
        <?php echo $this->_tpl_vars['SUGAR_CSS']; ?>

        <?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
            <link rel='stylesheet' href='<?php echo smarty_function_sugar_getjspath(array('file' => "include/ytree/TreeView/css/folders/tree.css"), $this);?>
'/>
            <link rel='stylesheet' href='<?php echo smarty_function_sugar_getjspath(array('file' => "include/SugarCharts/Jit/css/base.css"), $this);?>
'/>
        <?php endif; ?>
        <?php echo $this->_tpl_vars['SUGAR_JS']; ?>


        <?php echo '
            <script type="text/javascript">
                <!--
                SUGAR.themes.theme_name = \'';  echo $this->_tpl_vars['THEME'];  echo '\';
                SUGAR.themes.hide_image = \'';  echo smarty_function_sugar_getimagepath(array('file' => "hide.gif"), $this); echo '\';
                SUGAR.themes.show_image = \'';  echo smarty_function_sugar_getimagepath(array('file' => "show.gif"), $this); echo '\';
                SUGAR.themes.loading_image = \'';  echo smarty_function_sugar_getimagepath(array('file' => "img_loading.gif"), $this); echo '\';
                if (YAHOO.env.ua)
                    UA = YAHOO.env.ua;
                -->

            </script>
        '; ?>

        
        <link rel="stylesheet" type="text/css" href="<?php echo smarty_function_sugar_getjspath(array('file' => 'custom/include/javascripts/MultipleSelect/multiple-select.css'), $this);?>
"/>
        <link rel="stylesheet" type="text/css" href="<?php echo smarty_function_sugar_getjspath(array('file' => 'custom/include/css/CustomStyle.css'), $this);?>
"/>
		<?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/currency_fm.js"), $this);?>

        <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/jquery.tooltip.js"), $this);?>

        <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/CustomSubpanel.js"), $this);?>

        <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/MultipleSelect/jquery.multiple.select.js"), $this);?>

        <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/CustomMultiSelectFields.js"), $this);?>

        <?php echo smarty_function_sugar_getscript(array('file' => "custom/include/javascripts/StringUtil.js"), $this);?>

        <?php echo smarty_function_sugar_getscript(array('file' => "custom/modules/C_DuplicationDetection/js/DuplicationDetectionHandler.js"), $this);?>


    </head>