
({events:{"click .delete":"delete"},fileUrl:"",_render:function(){this.model.fileField=this.name;app.view.Field.prototype._render.call(this);return this;},format:function(value){if(value){value=this.buildUrl()+"&"+value;}
return value;},buildUrl:function(options){return app.api.buildFileURL({module:this.module,id:this.model.id,field:this.name},options);},delete:function(){var self=this;app.api.call('delete',self.buildUrl({htmlJsonFormat:false}),{},{success:function(data){self.model.set(self.name,"");self.render();},error:function(data){app.error.handleHttpError(data,{});}});},bindDomChange:function(){},bindDataChange:function(){if(this.model){this.model.on("change:"+this.name,function(){var isValue=this.$(this.fieldTag).val();if(!isValue){this.render();}},this);}}})