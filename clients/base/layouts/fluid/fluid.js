
({_placeComponent:function(comp,def){var compdef=def.layout||def.view,size=compdef.span||4;if(!this.$el.children()[0]){this.$el.addClass("container-fluid").append('<div class="row-fluid"></div>');}
$().add("<div></div>").addClass("span"+size).append(comp.el).appendTo(this.$el.find("div.row-fluid")[0]);}})