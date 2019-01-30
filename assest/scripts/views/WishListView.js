var WishListView = Backbone.View.extend({
	el: '.page',
	model: WishList,
	events: {
		'click .btn-url-share': 'shareView',
		'click .btn-logout': 'logout',
		'click .add-newitem': 'addNewItem',
		'click .btn-delete-item': 'deleteItem',
		'click .btn-edit-item': 'editItem',
		'click .btn-edit-save': 'editSave',
		'click .btn-edit-cancel': 'editCancel'

	},
	editSave: function (ev) {
		newItem = new Item({
			id: $("#edit-item-id").val()
		});
		var changedItem = wishCollection.get(newItem);
		changedItem.set("title", $("#edit-title").val());
		changedItem.set("url", $("#edit-url").val());
		changedItem.set("priority", $("#edit-priority").val());
		changedItem.set("price", $("#edit-price").val());
		changedItem.set("description", $("#edit-description").val());
		changedItem.save(null, {
			headers: {
				'Authorization': sessionStorage.getItem("token")
			},
			success: function (model, respose, options) {
				this.wishCollection.sort();
				wishListView.render(this.wishCollection, maxWishlist);
				swal("Save Changes!", "Successfully Save Changes!", "success");
			},
			error: function (model, xhr, options) {
				if ($("#edit-title").val() == "") {
					swal("Please Enter Item Title!", "Enter Item Title to Keep Your WISH !", "error");
				} else if ($("#edit-description").val() == "") {
					swal("Please Enter Description!", "Enter Description to Keep Your WISH !", "error");
				} else {
					swal("OOPS!", "Something Went Wrong !", "error");
				}
			}
		});
		return false;
	},
	editCancel: function (ev) {
		wishListView.render(wishCollection, maxWishlist);
	},
	shareView: function (ev) {
		var shareurl = document.getElementById("shareable-url");
		if (shareurl.style.display === "none") {
			var shareURL = window.location.href;
			var newstr = shareURL.replace(new RegExp("\\b" + "wishlist" + "\\b"), "sharelist");

			shareurl.style.display = "block";

			var pre = newstr.substring(0, newstr.lastIndexOf("/") + 1);
			var last = newstr.substring(newstr.lastIndexOf("/") + 1, newstr.length);
			var encordedId = btoa(last);
			var newstr = pre + encordedId;
			shareurl.value = newstr;

			var dummy = document.createElement("input");
			document.body.appendChild(dummy);
			dummy.setAttribute('value', newstr);
			dummy.select();
			document.execCommand("copy");
			document.body.removeChild(dummy);

			swal("Copy to Clipboard!", "shareable URL is READY", "success");

		} else {
			shareurl.style.display = "none";
		}
	},
	logout: function (ev) {
		swal("Ciao " + sessionStorage.getItem("u_name") + "!", "Successfully Logged Out!", "success");
		sessionStorage.clear();
		router.navigate('', {
			trigger: true
		});
	},
	deleteItem: function (ev) {
		swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this ITEM!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
			})
			.then((willDelete) => {
				if (willDelete) {

					var deletedItem = new Item({
						id: ev.currentTarget.dataset.itemId
					});
					deletedItem.destroy({
						headers: {
							'Authorization': sessionStorage.getItem("token")
						},
						success: function (model, respose, options) {
							this.wishCollection.remove(deletedItem);
							this.wishCollection.sort();
							wishListView.render(this.wishCollection, maxWishlist);
							swal("Success!", "Wish removed!", "success");
						},
						error: function (model, xhr, options) {
							swal("Oops!", "Something went wrong while deleting the model!", "error");
						}
					});

				} else {
					wishListView.render(wishCollection, maxWishlist);
				}
			});
	},
	addNewItem: function (ev) {
		newItem = new Item();
		newItem.set('title', $("#new-title").val());
		newItem.set('description', $("#new-description").val());
		newItem.set('url', $("#new-url").val());
		newItem.set('price', $("#new-price").val());
		newItem.set('priority', $("#new-priority").val());
		newItem.set('user_id', sessionStorage.getItem("userID"));
		newItem.save(null, {
			headers: {
				'Authorization': sessionStorage.getItem("token")
			},
			success: function (model, respose, options) {
				newItem.set("id", respose.id);
				this.wishCollection.add(newItem);
				this.wishCollection.sort();
				wishListView.render(this.wishCollection, maxWishlist);
				swal("New Wish Created!", "Successfully Added NEW Item!", "success");
			},
			error: function (model, xhr, options) {
				if ($("#new-title").val() == "") {
					swal("Please Enter Item Title!", "Enter Item Title to Keep Your WISH !", "error");
				} else if ($("#new-description").val() == "") {
					swal("Please Enter Description!", "Enter Description to Keep Your WISH !", "error");
				} else {
					swal("OOPS!", "Something Went Wrong !", "error");
				}
			}
		});
		return false;
	},
	editItem: function (ev) {
		wishListView.render(wishCollection, ev.currentTarget.dataset.itemId);
	},
	fetchData: function (options) {
		sessionStorage.setItem("userID", options.id);
		wishCollection.fetch({
			data: $.param({
				id: options.id
			}),
			headers: {
				'Authorization': sessionStorage.getItem("token")
			},
			success: function (list) {
				wishListView.render(list, maxWishlist);

			},
			error: function (user) {
				swal("Please Login!", "you have to log in !", "error");
				router.navigate('', {
					trigger: true
				});
			}
		})
	},
	render: function (data, idEdit) {
		var that = this;
		var template = _.template($('#item-list-template').html(), {
			list: data.models,
			editID: idEdit
		});
		that.$el.html(template);
	}
});

var wishListView = new WishListView();
