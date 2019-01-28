
		var LoginView = Backbone.View.extend({
			el: '.page',
			events: {
				// 'submit .loginbtn': 'saveItem',
				'submit .user-login-form': 'loginUser'
			},
			loginUser: function (ev) {
				var loginetails = $(ev.currentTarget).serializeObject();
				var user = new User();
				user.save(loginetails, {
					success: function (user) {
						// token = user.attributes.data.token;
						if (typeof (Storage) !== "undefined") {
							// Store token 
							swal("welcome " +user.attributes.data.full_name + "!", "Successfully Logged In!", "success");
							sessionStorage.setItem("token", user.attributes.data.token);
							if(user.attributes.data.wishlist_description && user.attributes.data.wishlist_name){
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
        
        
		var SignupView = Backbone.View.extend({
			el: '.page',
			events: {
				// 'submit .loginbtn': 'saveItem',
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


		var WishListView = Backbone.View.extend({
			el: '.page',
			events: {
				'click .btn-url-share': 'shareView',
				'click .btn-logout': 'logout',
				'click .add-newitem': 'addNewItem',
				'click .btn-delete-item': 'deleteItem',
				'click .btn-edit-item': 'editItem',
				'click .btn-edit-save': 'editSave',
				'click .btn-edit-cancel': 'editCancel'
				
			},
			editSave: function(ev) {
				var itemDetails = {
					"title": $("#edit-title").val(),
					"id": $("#edit-item-id").val(),
					"description": $("#edit-description").val(),
					"url": $("#edit-url").val(),
					"price": $("#edit-price").val(),
					"priority": $("#edit-priority").val()
				}
				var item = new Item();
				item.save(itemDetails, {
					headers: {
						'Authorization': sessionStorage.getItem("token")
					},
					success: function (item) {
						swal("Save Changes!", "Successfully Save Changes!", "success");
						wishListView.render({id: sessionStorage.getItem("userID")}, maxWishlist);
					},
					error: function (user) {
						if(item.attributes.title == ""){
							swal("Please Enter Item Title!", "Enter Item Title to Keep Your WISH !", "error");
						}else if(item.attributes.description == ""){
							swal("Please Enter Description!", "Enter Description to Keep Your WISH !", "error");
						}else{
							swal("OOPS!", "Something Went Wrong !", "error");
						}
						
						// router.navigate('', {
						// 	trigger: true
						// });
					}



					// 	swal("Oops...", "Something went wrong! Please Log In Again", "error");
					// 	router.navigate('', {
					// 		trigger: true
					// 	});
					// }
				});
				return false;
			},
			editCancel: function(ev) {
				wishListView.render({id: sessionStorage.getItem("userID")}, maxWishlist);
			},
			shareView: function (ev) {
				var shareurl = document.getElementById("shareable-url");
				if (shareurl.style.display === "none") {
					var shareURL = window.location.href;
					var newstr = shareURL.replace(new RegExp("\\b" + "wishlist" + "\\b"), "sharelist");
					shareurl.value = newstr;
					shareurl.style.display = "block";

					// var dummyContent = newstr;
					// var dummy = $('<input>').val(dummyContent).appendTo('body').select();
					// document.execCommand('copy');
					// document.body.removeChild(dummy);

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


				
				// document.getElementById("form1").style.display = "block";
				// console.log(shareURL);
				// var res = shareURL.replace("wishlist", "sharelist");

				// console.log(newstr);
			},
			logout: function (ev) {
				swal("Ciao " + sessionStorage.getItem("u_name") +"!", "Successfully Logged Out!", "success");
				sessionStorage.clear();
				router.navigate('', {
					trigger: true
				});
			},
			deleteItem: function(ev){

				swal({
				title: "Are you sure?",
				text: "Once deleted, you will not be able to recover this ITEM!",
				icon: "warning",
				buttons: true,
				dangerMode: true,
				})
				.then((willDelete) => {
				if (willDelete) {
					
				var that = this;
					that.item = new Item({
						id: ev.currentTarget.dataset.itemId
					});
					// that.item.fetch({
						// headers: {
							// 'Authorization': sessionStorage.getItem("token")
						// },
						// success: function (item) {
							// var template = _.template($('#edit-item-template').html(), {
							// 	item: item
							// });
							// that.$el.html(template);
							that.item.destroy({
							headers: {
							'Authorization': sessionStorage.getItem("token")
							},
							success: function () {
								//console.log('destroyed');
								wishListView.render({id: sessionStorage.getItem("userID")}, maxWishlist);
							},
							error: function (user) {
								router.navigate('', {
									trigger: true
								});
					}
				})
				} else {
					wishListView.render({id: sessionStorage.getItem("userID")}, maxWishlist);
				}
				});
			},
			addNewItem: function(ev){
				var itemDetails = {
					"title": $("#new-title").val(),
					"description": $("#new-description").val(),
					"url": $("#new-url").val(),
					"price": $("#new-price").val(),
					"priority": $("#new-priority").val()
				}
				// var itemDetails = $(ev.currentTarget).serializeObject();
				var item = new Item();
				item.save(itemDetails, {
					headers: {
						'Authorization': sessionStorage.getItem("token")
					},
					success: function (item) {
						swal("New Wish Created!", "Successfully Added NEW Item!", "success");
						wishListView.render({id: sessionStorage.getItem("userID")}, maxWishlist);
					},
					error: function (item) {
						if(item.attributes.title == ""){
							swal("Please Enter Item Title!", "Enter Item Title to Keep Your WISH !", "error");
						}else if(item.attributes.description == ""){
							swal("Please Enter Description!", "Enter Description to Keep Your WISH !", "error");
						}else{
							swal("OOPS!", "Something Went Wrong !", "error");
						}
						
						// router.navigate('', {
						// 	trigger: true
						// });
					}
				});
				return false;
			},
			editItem: function(ev){
				wishListView.render({id: sessionStorage.getItem("userID")}, ev.currentTarget.dataset.itemId);
			},
			render: function (options, idEdit) {
				var that = this;
				var list = new WishList();
				sessionStorage.setItem("userID", options.id);
				// collection.fetch({ data: $.param({ page: 1}) });

				list.fetch({
					data: $.param({
						id: options.id
					}),
					headers: {
						'Authorization': sessionStorage.getItem("token")
					},
					success: function (list) {
						// var data = list.models[0].attributes.data;
						var template = _.template($('#item-list-template').html(), {
							list: list.models,
							editID: idEdit
						});
						that.$el.html(template);
					},
					error: function (user) {
						swal("Please Login!", "you have to log in !", "error");
					}
				})
			}
		});
		var wishListView = new WishListView();



		// var ItemEditView = Backbone.View.extend({
		// 	el: '.page',
		// 	events: {
		// 		'submit .edit-item-form': 'saveItem',
		// 		'click .delete': 'deleteItem'
		// 	},
		// 	saveItem: function (ev) {
		// 		var itemDetails = $(ev.currentTarget).serializeObject();
		// 		var item = new Item();
		// 		item.save(itemDetails, {
		// 			headers: {
		// 				'Authorization': sessionStorage.getItem("token")
		// 			},
		// 			success: function (item) {
		// 				router.navigate('/wishlist/3', {
		// 					trigger: true
		// 				});
		// 			},
		// 			error: function (user) {
		// 				router.navigate('', {
		// 					trigger: true
		// 				});
		// 			}
		// 		});
		// 		return false;
		// 	},
		// 	deleteItem: function (ev) {
		// 		this.item.destroy({
		// 			headers: {
		// 				'Authorization': sessionStorage.getItem("token")
		// 			},
		// 			success: function () {
		// 				//console.log('destroyed');
		// 				router.navigate('', {
		// 					trigger: true
		// 				});
		// 			},
		// 			error: function (user) {
		// 				router.navigate('', {
		// 					trigger: true
		// 				});
		// 			}
		// 		})
		// 	},
		// 	render: function (options) {
		// 		var that = this;
		// 		if (options.id) {
		// 			that.item = new Item({
		// 				id: options.id
		// 			});
		// 			that.item.fetch({
		// 				headers: {
		// 					'Authorization': sessionStorage.getItem("token")
		// 				},
		// 				success: function (item) {
		// 					var template = _.template($('#edit-item-template').html(), {
		// 						item: item
		// 					});
		// 					that.$el.html(template);
		// 				}
		// 			})
		// 		} else {
		// 			var template = _.template($('#edit-item-template').html(), {
		// 				item: null
		// 			});
		// 			that.$el.html(template);
		// 		}
		// 	}
		// });
		// var itemEditView = new ItemEditView();

		var ShareListView = Backbone.View.extend({
			el: '.page',
			events:{
				'click .btn-share-Item': 'showShareItem',
			},
			showShareItem: function(ev){

				swal({
				title: 'item View',
				text: 'I will close in seconds',
				html: 'I will close in <strong></strong> seconds.<br/><br/>' +
				'<button id="increase" class="btn btn-warning">' +
				'I need 5 more seconds!' +
				'</button><br/>' +
				'<button id="stop" class="btn btn-danger">' +
				'Please stop the timer!!' +
				'</button><br/>' +
				'<button id="resume" class="btn btn-success" disabled>' +
				'Phew... you can restart now!' +
				'</button><br/>' +
				'<button id="toggle" class="btn btn-primary">' +
				'Toggle' +
				'</button>',
				type: 'success',
				timer: 3000,
			});

			},
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
					
					if(user.attributes.data.full_name && user.attributes.data.wishlist_description && user.attributes.data.wishlist_name){
        			var u_name = user.attributes.data.full_name;
                    var w_desc = user.attributes.data.wishlist_description;
					var w_name = user.attributes.data.wishlist_name;

					swal("Welcome to "+ w_name + " Wishlist by " + u_name +" !", "Enjoy The list !", "success");
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