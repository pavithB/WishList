<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>WISHLIST</title>
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assest/images/favicon.png"/>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assest/css/font-awesome.min.css">
	<!-- Bootstrap core CSS -->
	<link href="<?php echo base_url(); ?>assest/css/bootstrap.min.css" rel="stylesheet">
	<!-- Material Design Bootstrap -->
	<link href="<?php echo base_url(); ?>assest/css/mdb.min.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<!-- <h1>WISH LIST</h1>	 -->
		<hr />
		<div class="newItem"></div>
		<div class="page"></div>
	</div>


	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.2/underscore-min.js" type="text/javascript"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js"></script>	
	<script src="<?php echo base_url(); ?>assest/js/sweetalert.min.js"></script>

	<!-- Bootstrap core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assest/js/bootstrap.min.js"></script>
	<!-- MDB core JavaScript -->
	<script type="text/javascript" src="<?php echo base_url(); ?>assest/js/mdb.min.js"></script>


	<script type="text/template" id="user-login-template">
	<div class="container-fluid">
		<div style="text-align:center">
			<img  style="width: 650px;" src="<?php echo base_url(); ?>assest/images/cover.png" >
		</div>
    <div style='justify-content: center;' class="row">
        <div style="" class="col-lg-8 col-md-10">
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
                        <input type="text" name="username" required id="form2" class="form-control">
                        <label for="form2">username</label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" name="password" required id="form4" class="form-control">
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
        <div style="padding-top: 5%;
    padding-bottom: 8%;" class="col-lg-8 col-md-10">
            <!--Form without header-->
            <div style="padding: 90px 20% 90px 20%" class="card">
                <div class="card-block">
                    <!--Header-->
                    <div class="text-center">
                        <h3><i class="fa fa-users"></i> &nbsp;Create NEW Account:</h3>
                        <hr class="mt-2 mb-2">
                    </div>
                    <!--Body-->
                    <form class="user-signup-form">
				   <div style='text-align: center; color: red;' class='error_msg'></div>
				   <div class="md-form">
                        <i class="fa fa-user prefix"></i>
                        <input type="text" name="full_name" required id="form1" class="form-control">
                        <label for="form1">Full Name:</label>
					</div>
					<div class="md-form">
                        <i class="fa fa-at prefix"></i>
                        <input type="email" name="email" required id="form2" class="form-control">
                        <label for="form2">E-mail:</label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-user-circle prefix"></i>
                        <input type="text" name="username" required id="form3" class="form-control">
                        <label for="form3">username:</label>
                    </div>
                    <div class="md-form">
                        <i class="fa fa-lock prefix"></i>
                        <input type="password" name="password" required id="form4" class="form-control">
                        <label for="form4">password:</label>
					</div>
					<div class="md-form">
                        <i class="fa fa-th-list prefix"></i>
                        <input type="text" name="wishlist_name" required id="form5" class="form-control">
                        <label for="form5">Wish LIst Name:</label>
					</div>
					<div class="md-form">
                        <i class="fa fa-info-circle prefix"></i>
                        <input type="text" name="wishlist_description" required id="form6" class="form-control">
                        <label for="form6">Description</label>
                    </div>
                    <div class="text-center">
                        <button type="submit" style="background:#20c997" id="signup-btn" class="btn btn-deep signupbtn">SIGNUP</button>
                    </div>
				</div>
				already user? <a href="#/">Login</a>
			</div>
			</form>
            <!--/Form without header-->
        </div>
    </div>
</div>
</script>

	<script type="text/template" id="item-list-template">

<div style="display:flex">
	<h2 class="h1-responsive font-weight-bold my-5" style="text-transform: uppercase; text-align: center;margin-bottom: 0px!important;flex:1"><%= sessionStorage.getItem("w_name")  %>- W I S H L I S T </h2>
	<div><i class="fa fa-user prefix" aria-hidden="true"></i>  <%= sessionStorage.getItem("u_name")  %> </div>
</div>
	<!-- Section heading -->

<!-- Section description -->
<p class="grey-text w-responsive mx-auto mb-5" style="text-transform: capitalize; text-align: center;"><%= sessionStorage.getItem("w_desc")  %></p>
		<!-- <a href="#/new" class="btn btn-primary">New</a> -->
		<div style="display: flex;justify-content: space-between;">
		<button type="button" data-toggle="tooltip" title="Share WishList" style="color:#139648;" class="btn btn-url-share"><i class="fa fa-share" aria-hidden="true"></i></button>
        <span style="    flex: 1 1 100%; margin-top: 10px;"><input type="text" disabled style="display:none;    height: 80%;font-weight: 900;font-size: 20px;" name="shareable-url" id="shareable-url" class="form-control"></span>
		<button type="button" data-toggle="tooltip" title="LOGOUT" style="float:right;    margin-left: 10%;" class="btn btn-danger btn-logout" ><i class="fa fa-sign-out" aria-hidden="true"></i></button>
		</div>

    	<table style="    margin-top: 20px;" class="table striped">
	  	<thead class="thead-light">
		<tr>
		<th>Title</th><th>Description</th><th>url</th><th>Price</th><th>Piority</th><th></th><th></th>
		</tr>
			<tr style="background:#e3e4e3">
			<form class="add-item-form">
            <td><div class="md-form">
                        <input id="new-title" required name="title" type="text" length="100" class="form-control">
                        <label for="new-title">new Title</label>
                      </div></td>
            <td><div class="md-form">
                        <input id="new-description" required name="description" type="text" length="1000" class="form-control">
                        <label for="new-description">new Description</label>
                      </div></td>
            <td><div class="md-form">
                        <input id="new-url" name="url" required type="text" length="100" class="form-control">
                        <label for="new-url">new URL</label>
                      </div></td>
            <td> <div class="md-form">
                        <input id="new-price" name="price" required type="number" min="1" step="any" class="form-control">
                        <label for="new-price">new price</label>
                      </div></td>
			<td style="vertical-align: middle;">
					  <select id="new-priority" name="priority" class="browser-default custom-select">
                        <option value="1" selected>Must Have</option>
                        <option value="2" >Would be Nice to Have</option>
						<option value="3" >If You Can</option>
                      </select>
					  </td>
			<td colspan="2" style="vertical-align: middle;text-align: center;"><button data-toggle="tooltip" title="Add New Item" type="submit" style="background:#20c997;    width: 80%;    min-width: 170px;" id="add-newitem" class="btn btn-deep add-newitem">add</button></td>
			<!-- <td></td> -->
			<!-- <hr/> -->
			</form>
		</tr>
		</thead>
      <tbody>
		<% _.each(list, function(item,index,size) { %>
			<% if(editID == index) { %>
			<tr style="background:#d8e8b9">
		  	<% }else{ %>
			<tr>
			<% }; %>
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
				<td><button data-item-id="<%= index %>" style="color:black" data-toggle="tooltip" title="Save Item"  class="btn btn-edit-save"><i class="fa fa-floppy-o" aria-hidden="true"></i></button></td>
			<% }else if(item.id){ %>
				<td><button data-toggle="tooltip" title="Edit Item" data-item-id="<%= index %>" style="color:black"  class="btn btn-edit-item"><i class="fa fa-pencil" aria-hidden="true"></i></button></td>
			<% }; %>

			<% if(editID == index) { %>
				<td><button data-item-id="<%= index %>" style="color:black" data-toggle="tooltip" title="Cancel Item" class="btn btn-edit-cancel"><i class="fa fa-ban" aria-hidden="true"></i></button></td>
				<% }else if(item.id){ %>
				<td><button data-item-id="<%= item.id %>" style="color:black" data-toggle="tooltip" title="Delete Item" class="btn btn-delete-item"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
			<% }; %>

			<% if(editID == index) { %>
				<td><input type="hidden" id="edit-item-id" name="edit-item-id" value="<%= item.id %>" /></td>
			<% }else{ %>
			<td><input type="hidden" name="id" value="<%= item.id %>" />
			<% }; %>
			<!-- <td><%= item.get("id") %><td> -->
			<!-- <td><%= size.length %><td> -->
          </tr>
        <% }); %>
      </tbody>
    </table>
  </script>

	<script type="text/template" id="share-list-old-template">

	<!-- Section heading -->
<h2 class="h1-responsive font-weight-bold my-5" id="share-view-wishlist-header" style="text-transform: uppercase; text-align: center;margin-bottom: 0px!important;"></h2>

<!-- Section description -->
<p class="grey-text w-responsive mx-auto mb-5" id="share-view-wishlist-description" style="text-transform: capitalize; text-align: center;"></p>

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
  

<script type="text/template" id="share-list-template">
<div style="display:flex">
<div style="flex:0 0 25%;text-align:center">
			<img  style="width: 650px;" src="<?php echo base_url(); ?>assest/images/cover.png" >
</div>
<div style="flex:1">
<h2 class="h1-responsive font-weight-bold my-5" id="share-view-wishlist-header" style="text-transform: uppercase; text-align: center;margin-bottom: 0px!important;"></h2>
		</div>
<div style="display:flex;    display: flex;
    font-size: 1.2rem;"><i class="fa fa-user prefix" aria-hidden="true"></i><span style="    margin-left: 15px;"  id="share-user"></span></div>
</div>


<!-- <div style="display:flex">
	<h2 class="h1-responsive font-weight-bold my-5" style="text-transform: uppercase; text-align: center;margin-bottom: 0px!important;flex:1"><%= sessionStorage.getItem("w_name")  %>- W I S H L I S T </h2>
	<div><i class="fa fa-user prefix" aria-hidden="true"></i>  <%= sessionStorage.getItem("u_name")  %> </div>
</div> -->

<!-- Section description -->
<p class="grey-text w-responsive mx-auto mb-5" id="share-view-wishlist-description" style="text-transform: capitalize; text-align: center;"></p>

		<hr />
<table style="    margin-top: 20px;" class="table striped">
	  	<thead class="thead-light">
		<tr>
		<th>Title</th><th>Description</th><th>url</th><th>Price</th><th>Piority</th>
		</tr>
		</thead>
		</tbody>
		<% _.each(list, function(item) { %>
			<tr>
            <td><div class="md-form">
                        <input id="share-title" value="<%= htmlEncode(item.get('title')) %>" disabled name="title" type="text" length="100" class="form-control">
                      </div></td>
            <td><div class="md-form">
                        <input id="share-description" value="<%= htmlEncode(item.get('description')) %>" disabled name="description" type="text" length="1000" class="form-control">
                      </div></td>
            <td><div class="md-form">
                        <input id="share-url" value="<%= htmlEncode(item.get('url')) %>" name="url" disabled type="text" length="100" class="form-control">
                      </div></td>
            <td> <div class="md-form">
                        <input id="share-price" value="<%= htmlEncode(item.get('price')) %>" name="price" disabled type="number"  class="form-control">
                      </div></td>
			<td> <div class="md-form">
				<!--  -->

				<% if(item.get('priority')== 1) { %>
            <input id="share-priority" value="Must Have" name="priority" disabled type="text" class="form-control">  
            <% }; %>      
            <% if(item.get('priority')== 2) { %>
            <input id="share-priority" value="Would be Nice to Have" name="priority" disabled type="text" class="form-control">
            <% }; %>
            <% if(item.get('priority')== 3) { %>
            <input id="share-priority" value="If You Can" name="priority" disabled type="text" class="form-control">
            <% }; %>
                      </div></td>
		</tr>
		<% }); %>
		</tbody>
   </script> 

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
						router.navigate('', {
							trigger: true
						});
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
		//////////

		var Router = Backbone.Router.extend({
			routes: {
				"": "login",
				"signup": "signup",
				// "edit/:id": "edit",
				// "new": "edit",
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
		// router.on('route:edit', function (id) {
		// 	itemEditView.render({
		// 		id: id
		// 	});
		// })
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
