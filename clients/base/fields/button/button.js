
({_render:function(){if(app.acl.hasAccessToModel(this.def.value,this.model,this)){app.view.Field.prototype._render.call(this);}},getFieldElement:function(){return this.$el.find(':first-child');}})