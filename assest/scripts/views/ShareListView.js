var ShareListView = Backbone.View.extend({
	el: '.page',
	render: function (options) {
		var that = this;
		var list = new WishList();
		list.fetch({
			data: $.param({
				id: options.id
			}),
			url: "/item/sharelist",
			success: function (list) {
				var template = _.template($('#share-list-template').html(), {
					list: list.models
				});
				that.$el.html(template);
				var user = new User();
				user.fetch({
					data: $.param({
						id: options.id
					}),
					success: function (user) {
						var wishlistName = "userName";
						var wishlistDescription = "wishlist description";
						var wishlistDescription = "wishlist name";

						if (user.attributes.data.full_name && user.attributes.data.wishlist_description && user.attributes.data.wishlist_name) {
							var u_name = user.attributes.data.full_name;
							var w_desc = user.attributes.data.wishlist_description;
							var w_name = user.attributes.data.wishlist_name;

							swal("Welcome to " + w_name + " Wishlist by " + u_name + " !", "Enjoy The list !", "success");
						}
						$("#share-view-wishlist-header").html(w_name);
						$("#share-view-wishlist-description").text(w_desc);
						$("#share-user").html(u_name);

					},
					error: function (user) {
						swal("Oops...Something went wrong!", "Check The Link", "error");
					}
				})
			},
			error: function (user) {
				swal("Oops...!", "Check The Link", "error");
			}
		})
	}
});

var sharelistView = new ShareListView();
