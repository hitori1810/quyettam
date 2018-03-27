<?php /* Smarty version 2.6.11, created on 2018-03-27 23:02:59
         compiled from themes/RacerX/tpls/_globalLinks.tpl */ ?>
<div class="dcmenuDivider" id="globalLinksDivider"></div>
<div id="globalLinksModule">
    <ul class="clickMenu" id="globalLinks">
        <li>
            <ul class="subnav iefixed">
                <?php $_from = $this->_tpl_vars['GCLS']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['gcl'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gcl']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gcl_key'] => $this->_tpl_vars['GCL']):
        $this->_foreach['gcl']['iteration']++;
?>
    			    <li><a id="<?php echo $this->_tpl_vars['gcl_key']; ?>
_link" href="<?php echo $this->_tpl_vars['GCL']['URL']; ?>
" <?php if (($this->_foreach['gcl']['iteration'] == $this->_foreach['gcl']['total'])): ?>class="last"<?php endif;  if (! empty ( $this->_tpl_vars['GCL']['ONCLICK'] )): ?> onclick="<?php echo $this->_tpl_vars['GCL']['ONCLICK']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['GCL']['LABEL']; ?>
</a></li>

	                <?php $_from = $this->_tpl_vars['GCL']['SUBMENU']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['gcl_submenu'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['gcl_submenu']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['gcl_submenu_key'] => $this->_tpl_vars['GCL_SUBMENU']):
        $this->_foreach['gcl_submenu']['iteration']++;
?>
	                    <a id="<?php echo $this->_tpl_vars['gcl_submenu_key']; ?>
_link" href="<?php echo $this->_tpl_vars['GCL_SUBMENU']['URL']; ?>
"<?php if (! empty ( $this->_tpl_vars['GCL_SUBMENU']['ONCLICK'] )): ?> onclick="<?php echo $this->_tpl_vars['GCL_SUBMENU']['ONCLICK']; ?>
"<?php endif; ?>><?php echo $this->_tpl_vars['GCL_SUBMENU']['LABEL']; ?>
</a>
	                <?php endforeach; endif; unset($_from); ?>
                <?php endforeach; endif; unset($_from); ?>
                <?php if (! empty ( $this->_tpl_vars['LOGOUT_LINK'] ) && ! empty ( $this->_tpl_vars['LOGOUT_LABEL'] )): ?>
                    <li><a id="logout_link" href='<?php echo $this->_tpl_vars['LOGOUT_LINK']; ?>
' class='utilsLink'><?php echo $this->_tpl_vars['LOGOUT_LABEL']; ?>
</a> </li>
                <?php endif; ?>
            </ul>
            <span> 
        	    <div id="dcmenuUserIcon" <?php echo $this->_tpl_vars['NOTIFCLASS']; ?>
>
				  <?php echo $this->_tpl_vars['NOTIFICON']; ?>

				</div>
            	<a id="welcome_link" href='javascript: void(0);'><?php echo $this->_tpl_vars['CURRENT_USER']; ?>
</a>
            	
            </span>
        </li>
    </ul>
</div>

<?php if ($this->_tpl_vars['NOTIFCODE'] != ""): ?>
	<div class="dcmenuDivider" id="notifDivider"></div>
	<div id="dcmenuSugarCube" <?php echo $this->_tpl_vars['NOTIFCLASS']; ?>
 <?php if ($this->_tpl_vars['ISADMIN']): ?>onclick="DCMenu.notificationsList();" title="<?php echo $this->_tpl_vars['APP']['LBL_PENDING_NOTIFICATIONS']; ?>
"<?php endif; ?>>
	  <?php echo $this->_tpl_vars['NOTIFCODE']; ?>

	</div>
<?php else: ?>
<div id="dcmenuSugarCubeEmpty"></div>
<?php endif; ?>