<?php /* Smarty version 2.6.11, created on 2018-03-27 23:02:58
         compiled from themes/RacerX/tpls/_quickcreate.tpl */ ?>

<div id="quickCreate">
<ul class="clickMenu" id="quickCreateUL">
    <li>
        <ul class="subnav iefixed showLess" id="quickCreateULSubnav">
            <?php $_from = $this->_tpl_vars['DCACTIONS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['quickCreate'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['quickCreate']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['action']):
        $this->_foreach['quickCreate']['iteration']++;
?>
                <li <?php if (($this->_foreach['quickCreate']['iteration']-1) > 4): ?>class="moreOverflow"<?php endif; ?>><a href="javascript: if ( DCMenu.menu ) DCMenu.menu('<?php echo $this->_tpl_vars['action']['module']; ?>
','<?php echo $this->_tpl_vars['action']['createRecordTitle']; ?>
', true);" id="<?php echo $this->_tpl_vars['action']['module']; ?>
_quickcreate"><?php echo $this->_tpl_vars['action']['createRecordTitle']; ?>
</a></li>

            <?php endforeach; endif; unset($_from); ?>

            <?php if (count ( $this->_tpl_vars['DCACTIONS'] ) > 4): ?>
                <li class="moduleMenuOverFlowMore"><a href="javascript: SUGAR.themes.toggleQuickCreateOverFlow('quickCreateULSubnav','more');"><?php echo $this->_tpl_vars['APP']['LBL_SHOW_MORE']; ?>
 <div class="showMoreArrow"></div></a></li>
                <li class="moduleMenuOverFlowLess"><a href="javascript: SUGAR.themes.toggleQuickCreateOverFlow('quickCreateULSubnav','less');"><?php echo $this->_tpl_vars['APP']['LBL_SHOW_LESS']; ?>
 <div class="showLessArrow"></div></a></li>
            <?php endif; ?>
        </ul>
    </li>
</ul>
</div>