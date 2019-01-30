var User = Backbone.Model.extend({
	defaults: {
		username: "",
		password: "",
		full_name: "",
		email: "",
		wishlist_name: "",
		wishlist_description: ""
	},
	urlRoot: '/user'


});