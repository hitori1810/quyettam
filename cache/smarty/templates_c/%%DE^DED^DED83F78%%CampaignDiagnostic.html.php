<?php /* Smarty version 2.6.11, created on 2015-09-23 12:12:46
         compiled from modules/Campaigns/CampaignDiagnostic.html */ ?>
<!--
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

/*********************************************************************************

 ********************************************************************************/
-->
<form id="wizform" name="wizform" method="POST" action="index.php">
	<input type="hidden" name="module" value="Campaigns">
	<input type="hidden" name="action" = "CampaignDiagnostic">
	<input type="hidden" name="return_module" value="<?php echo $this->_tpl_vars['RETURN_MODULE']; ?>
">
	<input type="hidden" name="return_id" value="<?php echo $this->_tpl_vars['RETURN_ID']; ?>
">
	<input type="hidden" name="return_action" value="<?php echo $this->_tpl_vars['RETURN_ACTION']; ?>
">
		


<div id="diagnose" class="contentdiv"> 
<form name="form1" method="post" action="">

<table class="h3Row" border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td nowrap="nowrap"><h3><?php echo $this->_tpl_vars['EMAIL_IMAGE'];  echo $this->_tpl_vars['EMAIL_COMPONENTS']; ?>
</h3></td></tr></table>

	<div id="email" >

          <?php echo $this->_tpl_vars['EMAIL_SETTINGS_CONFIGURED_MESSAGE']; ?>

		  <?php echo $this->_tpl_vars['MAILBOXES_DETECTED_MESSAGE']; ?>


	</div>
<p><?php echo $this->_tpl_vars['EMAIL_SETUP_WIZ_LINK']; ?>
</p>

<p>&nbsp;</p>
<table class="h3Row" border="0" cellpadding="0" cellspacing="0" width="100%"><tbody><tr><td nowrap="nowrap"><h3><?php echo $this->_tpl_vars['SCHEDULE_IMAGE']; ?>
  <?php echo $this->_tpl_vars['SCHEDULER_COMPONENTS']; ?>
</h3></td></tr></table>

	<div id="schedule">

          <?php echo $this->_tpl_vars['SCHEDULER_EMAILS_MESSAGE']; ?>


	</div>	
</p>
<p><div id='submit'><input name="Re-Check" onclick="this.form.action.value='CampaignDiagnostic';" class='button' value="<?php echo $this->_tpl_vars['RECHECK_BTN']; ?>
" type="submit"></div>
</form></div>	



		