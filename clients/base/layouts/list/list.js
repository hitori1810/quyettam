
({_placeComponent:function(comp,def){var size=def.size||12;function createLayoutContainers(self){if(!self.$el.children()[0]){self.$el.addClass("container-fluid").append($('<div/>').addClass('row-fluid').append($('<div/>').addClass("span"+size).append($('<div/>').addClass("thumbnail list"))));}}
createLayoutContainers(this);this.$el.find('.thumbnail').append(comp.el);}})