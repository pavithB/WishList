<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>WISHLIST</title>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.1.1/css/bootstrap.min.css">
	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url(); ?>assest/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="<?php echo base_url(); ?>assest/css/mdb.min.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<h1>WISH LIST</h1>
		<hr />
		<div class="newItem"></div>
		<div class="page"></div>
	</div>


	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.2/underscore-min.js" type="text/javascript"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js"></script>
	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assest/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assest/js/mdb.min.js"></script>


	<script type="text/template" id="user-login-template">
		<div class="container-fluid">
    <div style='justify-content: center;' class="row">
        <div style="    padding-top: 12%;
    padding-bottom: 8%;" class="col-lg-8 col-md-10">
            <!--Form without header-->
            <div style="padding: 90px 20% 90px 20%" class="card">
                <div class="card-block">
                    <!--Header-->
                    <div class="text-center">
                        <h3><i class="fa fa-lock"></i> &nbsp;Login:</h3>
                        <hr class="mt-2 mb-2">
                    </div>
                    <!--Body-->
                    <form class="user-login-form">
                   <div style='text-align: center; color: red;' class='error_msg'></div>
                    <div class="md-form">
                        <i class="fa fa-envelope prefix"></i>
                        <input type="text" name="username" id="form2" class="form-control">
                        <label for="form2">username</label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" name="password" id="form4" class="form-control">
                        <label for="form4">password</label>
                    </div>
                    <div class="text-center">
                        <button type="submit" style="background:#20c997" id="login-btn" class="btn btn-deep loginbtn">Login</button>
                    </div>
				</div>
				not a user? <a href="#/signup">Create a Account</a>
            </div>
            <!--/Form without header-->
        </div>
    </div>
</div>
  </script>


	<script type="text/template" id="user-signup-template">
		<div class="container-fluid">
    <div style='justify-content: center;' class="row">
        <div style="padding-top: 12%;
    padding-bottom: 8%;" class="col-lg-8 col-md-10">
            <!--Form without header-->
            <div style="padding: 90px 20% 90px 20%" class="card">
                <div class="card-block">
                    <!--Header-->
                    <div class="text-center">
                        <h3><i class="fa fa-lock"></i> &nbsp;Create NEW Account:</h3>
                        <hr class="mt-2 mb-2">
                    </div>
                    <!--Body-->
                    <form class="user-signup-form">
				   <div style='text-align: center; color: red;' class='error_msg'></div>
				   <div class="md-form">
                        <i class="fa fa-envelope prefix"></i>
                        <input type="text" name="full_name" id="form1" class="form-control">
                        <label for="form1">Full Name:</label>
					</div>
					<div class="md-form">
                        <i class="fa fa-envelope prefix"></i>
                        <input type="text" name="email" id="form2" class="form-control">
                        <label for="form2">E-mail:</label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-envelope prefix"></i>
                        <input type="text" name="username" id="form3" class="form-control">
                        <label for="form3">username:</label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" name="password" id="form4" class="form-control">
                        <label for="form4">password:</label>
					</div>
					<div class="md-form">
                        <i class="fa fa-envelope prefix"></i>
                        <input type="text" name="wishlist_name" id="form5" class="form-control">
                        <label for="form5">Wish LIst Name:</label>
					</div>
					<div class="md-form">
                        <i class="fa fa-envelope prefix"></i>
                        <input type="text" name="wishlist_description" id="form6" class="form-control">
                        <label for="form6">Description</label>
                    </div>
                    <div class="text-center">
                        <button type="submit" style="background:#20c997" id="signup-btn" class="btn btn-deep signupbtn">Login</button>
                    </div>
				</div>
			</div>
			</form>
            <!--/Form without header-->
        </div>
    </div>
</div>
</script>

	<script type="text/template" id="item-list-template">
		<!-- <a href="#/new" class="btn btn-primary">New</a> -->
		<button type="button" onclick="shareUrl()" class="btn btn-danger share">share</button>
            <span style="width: calc(100% - 50%); display: inline-flex;"><input type="text" style="display:none" name="shareable-url" id="form1" class="form-control"></span>
			<button type="button" class="btn logout" >LOGOUT</button>
    		<table class="table striped">
	  <thead>
        <tr>
          <th>Title</th><th>Description</th><th>url</th><th>Price</th><th>Piority</th><th></th><th></th>
        </tr>
			<tr>
			<form class="add-item-form">
            <td><div class="md-form">
                        <input id="new-title" name="title" type="text" length="100" class="form-control">
                        <label for="new-title">new Title</label>
                      </div></td>
            <td><div class="md-form">
                        <input id="new-description" name="description" type="text" length="1000" class="form-control">
                        <label for="new-description">new Description</label>
                      </div></td>
            <td><div class="md-form">
                        <input id="new-url" name="url" type="text" length="100" class="form-control">
                        <label for="new-url">new URL</label>
                      </div></td>
            <td> <div class="md-form">
                        <input id="new-price" name="price" type="number" min="1" step="any" class="form-control">
                        <label for="new-price">new price</label>
                      </div></td>
			<td style="vertical-align: middle;">
					  <select id="new-priority" name="priority" class="browser-default custom-select">
                        <option value="1" selected>Must Have</option>
                        <option value="2" >Would be Nice to Have</option>
						<option value="3" >If You Can</option>
                      </select>
					  </td>
			<td style="vertical-align: middle;"><button type="button" style="background:#20c997" id="add-newitem" class="btn btn-deep add-newitem">add</button></td>
			<!-- <td></td> -->
			<!-- <hr/> -->
			</form>
		</tr>
		</thead>
      <tbody>
        <% _.each(list, function(item,index,list) { %>
          <tr>
			  
		  	<% if(editID == index) { %>
            <td><div class="md-form"><input id="edit-title" value="<%= item.get('title') %>" name="edit-title" type="text" length="100" class="form-control"></div></td>
			<% }else{ %>
			<td><%= htmlEncode(item.get('title')) %></td>
			<% }; %>

			<% if(editID == index) { %>
            <td><div class="md-form"><input id="edit-description" value="<%= item.get('description') %>" name="edit-description" type="text" length="100" class="form-control"></div></td>
			<% }else{ %>
			<td><%= htmlEncode(item.get('description')) %></td>
			<% }; %>

			<% if(editID == index) { %>
            <td><div class="md-form"><input id="edit-url" value="<%= item.get('url') %>" name="edit-url" type="text" length="100" class="form-control"></div></td>
			<% }else{ %>
			<td><%= htmlEncode(item.get('url')) %></td>
			<% }; %>

			<% if(editID == index) { %>
            <td><div class="md-form"><input id="edit-price" value="<%= item.get('price') %>" name="edit-price" type="number" min="1" step="any"  class="form-control"></div></td>
			<% }else{ %>
			<td><%= htmlEncode(item.get('price')) %></td>
			<% }; %>

			<% if(editID == index) { %>
            <td><div class="md-form"><select id="edit-priority" name="edit-priority" class="browser-default custom-select"><option value="1" <% if(item.get("priority") == 1) { %> selected <% } %> >Must Have</option><option value="2" <% if(item.get("priority") == 2) { %> selected <% } %> >Would be Nice to Have</option><option value="3" <% if(item.get("priority") == 3) { %> selected <% } %> >If You Can</option></select></div></td>
			<% }else{ if(item.get('priority')== 1) { %>
            <td>Must Have</td>            
            <% }; %>      
            <% if(item.get('priority')== 2) { %>
            <td>Would be Nice to Have</td>            
            <% }; %>
            <% if(item.get('priority')== 3) { %>
            <td>If You Can</td>            
            <% }; }; %>

			<% if(editID == index) { %>
				<td><button data-item-id="<%= index %>" style="color:black"  class="btn btn-edit-save">Save</button></td>
			<% }else{ %>
				<td><button data-item-id="<%= index %>" style="color:black"  class="btn btn-edit-item">Edit</button></td>
			<% }; %>

			<% if(editID == index) { %>
				<td><button data-item-id="<%= index %>" style="color:black"  class="btn btn-edit-cancel">Cancel</button></td>
			<% }else{ %>
				<td><button data-item-id="<%= item.id %>" style="color:black"  class="btn btn-delete-item">Delete</button></td>
			<% }; %>

			<% if(editID == index) { %>
				<td><input type="hidden" id="edit-item-id" name="edit-item-id" value="<%= item.id %>" /></td>
			<% }else{ %>
			<td><input type="hidden" name="id" value="<%= item.id %>" />
			<% }; %>
			<!-- <td><%= item.get("id") %><td> -->
          </tr>
        <% }); %>
      </tbody>
    </table>
  </script>

	<script type="text/template" id="share-list-template">
		<hr />
    <table class="table striped">
      <thead>
        <tr>
          <th>Title</th><th>Description</th><th>url</th><th>Price</th><th>Piority</th><th></th><th></th>
        </tr>
      </thead>
      <tbody>
        <% _.each(list, function(item) { %>
          <tr>
          <!-- <td><%= item.get('title') %></td>
            <td><%= item.get('description') %></td>
            <td><%= item.get('price') %></td> -->
            <td><%= htmlEncode(item.get('title')) %></td>
            <td><%= htmlEncode(item.get('description')) %></td>
            <td><%= htmlEncode(item.get('url')) %></td>
            <td><%= htmlEncode(item.get('price')) %></td>
            <td><%= htmlEncode(item.get('priority')) %></td>
          </tr>
        <% }); %>
      </tbody>
    </table>
  </script>
<!--
	<script type="text/template" id="add-item-template">
		<hr />
    <table class="table striped">
      <tbody>
         <% _.each(list, function(item) { %>
          <tr>
          <td><%= item.get('title') %></td>
            <td><%= item.get('description') %></td>
            <td><%= item.get('price') %></td> 
			<form class="add-item-form">
			<hr/>
            <td><input name="title" type="text" ></td>
            <td> <input name="description" type="text"></td>
            <td> <input name="url" type="text"></td>
            <td> <input name="price" type="text"></td>
            <td><input name="priority" type="text"></td>
			<hr/>
			</form>
          </tr>
        <% }); %>
      </tbody>
    </table>
   </script> --> 

	<script type="text/template" id="edit-item-template">
		<form class="edit-item-form">
      <legend><%= item ? 'Edit' : 'New' %> Item</legend>
        <label>Item Title</label>
        <input name="title" type="text" value="<%= item ? item.get('title') : '' %>">
        <label>Item Description</label>
        <input name="description" type="text" value="<%= item ? item.get('description') : '' %>">
        <label>Item Url</label>
        <input name="url" type="text" value="<%= item ? item.get('url') : '' %>">
        <label>Item Price</label>
        <input name="price" type="text" value="<%= item ? item.get('price') : '' %>">
        <label>Item Piority</label>
        <input name="priority" type="text" value="<%= item ? item.get('priority') : '' %>">
        <hr />
       <button type="submit" class="btn"><%= item ? 'Update' : 'Create' %></button>
       <% if(item) { %>
        <input type="hidden" name="id" value="<%= item.id %>" />
       <button data-item-id="<%= item.id %>" type="button" class="btn btn-danger delete">Delete</button>
       <% }; %>
    </form>
  </script>

	<script>
		// var token = "";		
		// "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJmdWxsX25hbWUiOiJwYXZpdGggYnVkZGhpbWEiLCJ1c2VybmFtZSI6InBhdml0aGIiLCJlbWFpbCI6InBhdml0aEBnbWFpbC5jb20iLCJ0aW1lIjoxNTQ4MjU2OTAxfQ.DTSShZ5816yRs7MUAQelQVtvdmRUEgBjMgeP3E90pTk";

		var maxWishlist = 99999;

		var shareUrl = function () {
			var shareURL = window.location.href;
			console.log(shareURL);
			// var res = shareURL.replace("wishlist", "sharelist");
			var newstr = shareURL.replace(new RegExp("\\b" + "wishlist" + "\\b"), "sharelist");
			document.getElementById("form1").value = newstr;
			document.getElementById("form1").style.display = "block";
			console.log(newstr);


			// return false;
		}

		function htmlEncode(value) {
			return $('<div/>').text(value).html();
		}
		$.fn.serializeObject = function () {
			var o = {};
			var a = this.serializeArray();
			$.each(a, function () {
				if (o[this.name] !== undefined) {
					if (!o[this.name].push) {
						o[this.name] = [o[this.name]];
					}
					o[this.name].push(this.value || '');
				} else {
					o[this.name] = this.value || '';
				}
			});
			return o;
		};
		$.ajaxPrefilter(function (options, originalOptions, jqXHR) {
			options.url = 'http://localhost/wishlistcw/api' + options.url;
		});

		var User = Backbone.Model.extend({
			urlRoot: '/user'
		});

		var Item = Backbone.Model.extend({
			urlRoot: '/item'
		});

		var WishList = Backbone.Collection.extend({
			url: '/item',
			comparator: function (m) {
				return m.get('priority');
			},
			model: Item
		});

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
							sessionStorage.setItem("token", user.attributes.data.token);
						}
						router.navigate('#/wishlist/' + user.attributes.data.user_id, {
							trigger: true
						});
					},
					error: function (user) {
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
						router.navigate('', {
							trigger: true
						});
					},
					error: function (user) {
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


		// var addItemView = Backbone.View.extend({
		// 	el: '.newItem',
		// 	render: function () {
		// 		var that = this;
		// 		var addItem = _.template($('#add-item-template').html(), {});
		// 		that.$el.html(addItem);
		// 	}
		// });

		// var addItemView = new addItemView();

		var WishListView = Backbone.View.extend({
			el: '.page',
			events: {
				'click .share': 'shareView',
				'click .logout': 'logout',
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
						wishListView.render({id: sessionStorage.getItem("userID")}, maxWishlist);
					},
					error: function (user) {
						router.navigate('', {
							trigger: true
						});
					}
				});
				return false;
			},
			editCancel: function(ev) {
				wishListView.render({id: sessionStorage.getItem("userID")}, maxWishlist);
			},
			shareView: function (ev) {
				// var shareURL = window.location.href;
				// console.log(shareURL);
				// return false;
			},
			logout: function (ev) {
				sessionstorage.clear();
				router.navigate('', {
					trigger: true
				});
			},
			deleteItem: function(ev){
				// console.log(ev);
				// ev.currentTarget.dataset.itemId
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
						// }
					// })
				// 
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
						// render(sessionStorage.getItem("userID"));
						wishListView.render({id: sessionStorage.getItem("userID")}, maxWishlist);
					},
					error: function (user) {
						router.navigate('', {
							trigger: true
						});
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
						router.navigate('', {
							trigger: true
						});
					}
				})
			}
		});
		var wishListView = new WishListView();



		var ItemEditView = Backbone.View.extend({
			el: '.page',
			events: {
				'submit .edit-item-form': 'saveItem',
				'click .delete': 'deleteItem'
			},
			saveItem: function (ev) {
				var itemDetails = $(ev.currentTarget).serializeObject();
				var item = new Item();
				item.save(itemDetails, {
					headers: {
						'Authorization': sessionStorage.getItem("token")
					},
					success: function (item) {
						router.navigate('/wishlist/3', {
							trigger: true
						});
					},
					error: function (user) {
						router.navigate('', {
							trigger: true
						});
					}
				});
				return false;
			},
			deleteItem: function (ev) {
				this.item.destroy({
					headers: {
						'Authorization': sessionStorage.getItem("token")
					},
					success: function () {
						//console.log('destroyed');
						router.navigate('', {
							trigger: true
						});
					},
					error: function (user) {
						router.navigate('', {
							trigger: true
						});
					}
				})
			},
			render: function (options) {
				var that = this;
				if (options.id) {
					that.item = new Item({
						id: options.id
					});
					that.item.fetch({
						headers: {
							'Authorization': sessionStorage.getItem("token")
						},
						success: function (item) {
							var template = _.template($('#edit-item-template').html(), {
								item: item
							});
							that.$el.html(template);
						}
					})
				} else {
					var template = _.template($('#edit-item-template').html(), {
						item: null
					});
					that.$el.html(template);
				}
			}
		});
		var itemEditView = new ItemEditView();

		//////////
		var ShareListView = Backbone.View.extend({
			el: '.page',
			render: function (options) {
				var that = this;
				var list = new WishList();
				// collection.fetch({ data: $.param({ page: 1}) });

				list.fetch({
					data: $.param({
						id: options.id
					}),
					url: "/item/sharelist",
					success: function (list) {
						// var data = list.models[0].attributes.data;
						var template = _.template($('#share-list-template').html(), {
							list: list.models
						});
						that.$el.html(template);
					},
					error: function (user) {
						router.navigate('', {
							trigger: true
						});
					}
				})
			}
		});

		var sharelistView = new ShareListView();
		//////////

		var Router = Backbone.Router.extend({
			routes: {
				"": "login",
				"signup": "signup",
				"edit/:id": "edit",
				"new": "edit",
				"wishlist/:id": "wishlist",
				"sharelist/:id": "sharelist"
			}
		});
		var router = new Router;
		router.on('route:wishlist', function (id) {
			// render item list
			wishListView.render({
				id: id
			}, maxWishlist);
		})
		router.on('route:edit', function (id) {
			itemEditView.render({
				id: id
			});
		})
		router.on('route:login', function () {
			loginView.render();
		})
		router.on('route:signup', function () {
			signupView.render();
		})
		router.on('route:sharelist', function (id) {
			sharelistView.render({
				id: id
			});
		})

		Backbone.history.start();

	</script>


</body>

</html>
