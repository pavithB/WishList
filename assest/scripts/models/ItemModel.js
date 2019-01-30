var Item = Backbone.Model.extend({
	defaults: {
		title: "",
		description: "",
		user_id: "",
		url: "",
		price: "",
		priority: ""
	},
	urlRoot: '/item'
});