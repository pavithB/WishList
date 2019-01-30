var LoginView = Backbone.View.extend({
	el: '.page',
	events: {
		'submit .user-login-form': 'loginUser'
	},
	loginUser: function (ev) {
		var loginetails = $(ev.currentTarget).serializeObject();
		var user = new User();
		user.save(loginetails, {
			success: function (user) {
				if (typeof (Storage) !== "undefined") {
					// Store token 
					swal("welcome " + user.attributes.data.full_name + "!", "Successfully Logged In!", "success");
					sessionStorage.setItem("token", user.attributes.data.token);
					if (user.attributes.data.wishlist_description && user.attributes.data.wishlist_name) {
						sessionStorage.setItem("u_name", user.attributes.data.full_name);
						sessionStorage.setItem("w_name", user.attributes.data.wishlist_name);
						sessionStorage.setItem("w_desc", user.attributes.data.wishlist_description);
					}
				}
				router.navigate('#/wishlist/' + user.attributes.data.user_id, {
					trigger: true
				});
			},
			error: function (user) {
				swal("incorrect User Name or Passwod", "please check your username and assword!", "error");
				router.navigate('', {
					trigger: true
				});
			}
		});
		return false;
	},
	render: function () {
		var that = this;
		var template = _.template($('#user-login-template').html(), {});
		that.$el.html(template);
	}
});

var loginView = new LoginView();