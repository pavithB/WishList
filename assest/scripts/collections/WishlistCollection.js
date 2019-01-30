var WishList = Backbone.Collection.extend({
	url: '/item',
	comparator: function (m) {
		return m.get('priority');
	},
	model: Item
});

var wishCollection = new WishList();
