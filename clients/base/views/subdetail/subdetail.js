
({events:{'click [data-toggle=tab]':'closeSubdetail'},initialize:function(options){app.view.View.prototype.initialize.call(this,options);this.fallbackFieldTemplate="detail";},render:function(){},bindDataChange:function(){if(this.model){this.model.on("change",function(){app.view.View.prototype.render.call(this);},this);}},closeSubdetail:function(){this.model.clear();$('.nav-tabs').find('li').removeClass('on');this.$el.empty();}})