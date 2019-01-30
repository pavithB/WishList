var SignupView = Backbone.View.extend({
	el: '.page',
	events: {
		'submit .user-signup-form': 'signupUser'
	},
	signupUser: function (ev) {
		var signupDetails = $(ev.currentTarget).serializeObject();
		var user = new User();
		user.save(signupDetails, {
			url: "/user/register",
			success: function (user) {
				swal("User Added!", "Successfully Added User!", "success");
				router.navigate('', {
					trigger: true
				});
			},
			error: function (user) {
				swal("Oops...", "Something Went Wrong, Please Try Again!", "error");
				router.navigate('signup', {
					trigger: true
				});
			}
		});
		return false;
	},
	render: function () {
		var that = this;
		var template = _.template($('#user-signup-template').html(), {});
		that.$el.html(template);
	}
});

var signupView = new SignupView();