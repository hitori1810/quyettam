<?php /* Smarty version 2.6.11, created on 2018-03-29 10:02:13
         compiled from themes/RacerX/tpls/_dcmenu.tpl */ ?>
<?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
<?php echo $this->_tpl_vars['DCSCRIPT']; ?>

<div id='dcmenutop'></div>
<div id='dcmenu' class='dcmenu dcmenuFloat navbar navbar-fixed-top'>
<div id='ie8GradientFix'></div>
    <div class="inner">
  <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/RacerX/tpls/_headerModuleList.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

    <?php if ($this->_tpl_vars['AUTHENTICATED']): ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/RacerX/tpls/_quickcreate.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/RacerX/tpls/_globalLinks.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "themes/RacerX/tpls/_search.tpl", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<?php endif; ?>
    </div>
</div>
<?php endif; ?>