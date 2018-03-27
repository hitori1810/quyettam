{*

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


*}

	{if $fields.reminder_time}            	
            	
            	{assign var="REMINDER_TIME_OPTIONS" value=$fields.reminder_time.options}
            	{assign var="EMAIL_REMINDER_TIME_OPTIONS" value=$fields.reminder_time.options}	
            	
            	{if !$fields.reminder_checked.value}            		
            		{assign var="REMINDER_TIME" value=-1}
            	{else}
            		{assign var="REMINDER_TIME" value=$fields.reminder_time.value}
            	{/if}
            	{if !$fields.email_reminder_checked.value}            		
            		{assign var="EMAIL_REMINDER_TIME" value=-1}
            	{else}
            		{assign var="EMAIL_REMINDER_TIME" value=$fields.email_reminder_time.value}
            	{/if}
	{/if}
	
	{assign var="REMINDER_TIME_DISPLAY" value="none"}
	{assign var="EMAIL_REMINDER_TIME_DISPLAY" value="none"}
	{if $REMINDER_TIME != -1}
            	{assign var="REMINDER_CHECKED" value="checked"}
            	{assign var="REMINDER_TIME_DISPLAY" value="inline"}	
	{/if}
        {if $EMAIL_REMINDER_TIME != -1}
            	{assign var="EMAIL_REMINDER_CHECKED" value="checked"}
            	{assign var="EMAIL_REMINDER_TIME_DISPLAY" value="inline"}
        {/if}

{if $view == "EditView" || $view == "QuickCreate" || $view == "QuickEdit" || $view == "wirelessedit"}


		<div>
		    	   	
		    	<input name="reminder_checked" type="hidden" value="0">
		    	<input name="reminder_checked" id="reminder_checked" onclick="toggleReminder(this,'reminder');" type="checkbox" class="checkbox" value="1" {$REMINDER_CHECKED}>
		    	<div style="display: inline-block; width: 111px;">{$MOD.LBL_REMINDER_POPUP}</div>
		    	<div id="reminder_list" style="display: {$REMINDER_TIME_DISPLAY}">
		    		<select tabindex="{$REMINDER_TABINDEX}" name="reminder_time">
					{html_options options=$REMINDER_TIME_OPTIONS selected=$REMINDER_TIME}
				</select>
		    	</div>
            	</div>
            	<div>
		    	
		   	<input name="email_reminder_checked" type="hidden" value="0">
		    	<input name="email_reminder_checked" id="email_reminder_checked" onclick="toggleReminder(this,'email_reminder');" type="checkbox" class="checkbox" value="1" {$EMAIL_REMINDER_CHECKED}>
		    	<div style="display: inline-block; width: 111px;">{$MOD.LBL_REMINDER_EMAIL_ALL_INVITEES}</div>
		    	<div id="email_reminder_list" style="display: {$EMAIL_REMINDER_TIME_DISPLAY}">
		    		<select tabindex="{$REMINDER_TABINDEX}" name="email_reminder_time">
					{html_options options=$EMAIL_REMINDER_TIME_OPTIONS selected=$EMAIL_REMINDER_TIME}
				</select>
		    	</div>
		</div>
            	<script type="text/javascript">
            		{literal} 
			function toggleReminder(el,field){
				if(el.checked){
					document.getElementById(field + "_list").style.display = "inline";
				}else{
					document.getElementById(field + "_list").style.display = "none";
				}
			}
			{/literal}
            	</script>
	{else}
		<div>			
			<input type="checkbox" disabled  {$REMINDER_CHECKED}>
			{$MOD.LBL_REMINDER_POPUP}
			{if $REMINDER_TIME != -1}
				{$REMINDER_TIME_OPTIONS[$REMINDER_TIME]}
			{/if}			
		</div>
		<div>			
			<input type="checkbox" disabled  {$EMAIL_REMINDER_CHECKED}>
			{$MOD.LBL_REMINDER_EMAIL_ALL_INVITEES}
			{if $EMAIL_REMINDER_TIME != -1}
				{$EMAIL_REMINDER_TIME_OPTIONS[$EMAIL_REMINDER_TIME]}
			{/if}			
		</div>
	{/if}	
