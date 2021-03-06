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
({initialize:function(options){app.view.View.prototype.initialize.call(this,options);this.model.set({amount:0,best_case:0,worst_case:0,overall_amount:0,overall_best:0,overall_worst:0,show_worksheet_likely:options.context.forecasts.config.get('show_worksheet_likely'),show_worksheet_best:options.context.forecasts.config.get('show_worksheet_best'),show_worksheet_worst:options.context.forecasts.config.get('show_worksheet_worst')});},unbindData:function(){if(this.context.forecasts)this.context.forecasts.off(null,null,this);app.view.View.prototype.unbindData.call(this);},bindDataChange:function(){var self=this;this.context.forecasts.on('change:updatedTotals',function(context,totals){self.model.set(totals);self._render();});this.context.forecasts.on('forecasts:worksheet:rendered forecasts:worksheet:filtered',function(){self._render();})},_render:function(){if(this.context.forecasts.get('currentWorksheet')=='worksheet'){if(!_.isEmpty($('#forecastsWorksheetTotalsIncludedTotals').html())){$('#forecastsWorksheetTotalsIncludedTotals').remove();$('#forecastsWorksheetTotalsOverallTotals').remove();}
$('#summary').html(this.template(this.model.toJSON()));}}})