
({events:{'click [name=save_button]':'saveModel'},initialize:function(options){app.view.View.prototype.initialize.call(this,options);this.context.off("subnav:save",null,this);this.context.on("subnav:save",this.saveModel,this);},saveModel:function(){var self=this,deleteIfFails=_.isUndefined(self.model.id);app.alert.show('save_edit_view',{level:'process',title:app.lang.getAppString('LBL_PORTAL_SAVING')});this.model.save(null,{success:function(){app.alert.dismiss('save_edit_view');app.file.checkFileFieldsAndProcessUpload(self.model,{success:function(){app.navigate(self.context,self.model,'detail');}},{deleteIfFails:deleteIfFails});},fieldsToValidate:this.getFields(this.module)});},_renderHtml:function(){app.view.View.prototype._renderHtml.call(this);if(this.model.id){this.model.on("change",function(){if(this.context.get('subnavModel')){this.context.get('subnavModel').set({'title':app.lang.get('LBL_EDIT_BUTTON',this.module),'meta':this.meta,'fields':this.fields});}},this);}else{if(this.context.get('subnavModel')){this.context.get('subnavModel').set({'title':app.lang.get('LBL_NEW_FORM_TITLE',this.module),'meta':this.meta,'fields':this.fields});}}}})