<!doctype html>
<html lang="en">
<head>

	<meta charset="utf-8">

	<!-- set title -->
	<title>>w i s h _ L i s t<</title>
	<!-- set favicon -->
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assest/images/favicon.png"/>

	<!-- load css files -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assest/css/font-awesome.min.css">
	<link href="<?php echo base_url(); ?>assest/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>assest/css/mdb.min.css" rel="stylesheet">

</head>
<body>

	<div class="container">
		<!-- <h1>WISH LIST</h1>	 -->
		<hr/>
		<div class="newItem"></div>
		<div class="page"></div>
	</div>

	<!-- JavaScript dependencis and lib -->
	<script src="<?php echo base_url(); ?>assest/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assest/js/underscore-min.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assest/js/backbone-min.js"></script>	
	<script src="<?php echo base_url(); ?>assest/js/sweetalert.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assest/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>assest/js/mdb.min.js"></script>

	<!-- load backbone model -->
	<script src="<?php echo base_url(); ?>assest/scripts/models/UserModel.js"></script>
	<script src="<?php echo base_url(); ?>assest/scripts/models/ItemModel.js"></script>

	<!-- load backbone collections -->
	<script src="<?php echo base_url(); ?>assest/scripts/collections/WishlistCollection.js"></script>

	<!-- load backbone views -->
	<script src="<?php echo base_url(); ?>assest/scripts/views/LoginView.js"></script>
	<script src="<?php echo base_url(); ?>assest/scripts/views/SignupView.js"></script>
	<script src="<?php echo base_url(); ?>assest/scripts/views/WishListView.js"></script>
	<script src="<?php echo base_url(); ?>assest/scripts/views/ShareListView.js"></script>


	<!-- template for user login view -->
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
	<!-- /template for user login view -->


	<!-- template for user signup view -->
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
	<!-- /template for user login view -->


	<!-- template for wishlist view -->
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

    	<table style="margin-top: 20px;" class="table striped">
			<thead class="thead-light">
			<tr>
			<th>Title</th><th style="max-width:55px">Description</th><th>url</th><th>Price</th><th>Piority</th><th></th><th></th>
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
	<!-- /template for wishlist view -->


	<!-- template for wishlist share view -->
	<script type="text/template" id="share-list-template">
		<div style="display:flex">
		<div style="flex:0 0 25%;text-align:center">
					<img  style="width: 350px;" src="<?php echo base_url(); ?>assest/images/cover.png" >
		</div>
		<div style="flex:1">
		<h2 class="h1-responsive font-weight-bold my-5" id="share-view-wishlist-header" style="text-transform: uppercase; text-align: center;margin-bottom: 0px!important;"></h2>
				</div>
		<div data-toggle="tooltip" title="Wish-List Owner" style="display:flex;    display: flex;
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
				<% _.each(list, function(item,index,size) { %>
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
						<% if(item.get('id')){ %>
						<td><button style="color:black" data-toggle="modal" data-target="#exampleModal<%= index %>" class="	 btn-share-Item2"><i class="fa fa-expand" aria-hidden="true"></i></button></td>
						<!-- data-item-title="<%=  item.get('title') %>" data-item-description="<%= item.get('description') %>}" data-item-url="<%=  item.get('url') %>" data-item-price="<%= item.get('price') %>}" data-item-priority="<%= item.get('priority') %>}" type="button"  -->
						<% }; %>
				</tr>
				<!--  -->

		<div class="modal fade" id="exampleModal<%= index %>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" style="    margin: 164px 134px 124px 264px;" role="document">
			<div style="    border-radius: 40px;width:1060PX" class="modal-content">
			<div style="display:flex" class="modal-header">
				<div style="flex:1"><h5 class="modal-title" style="text-align:center;font-weight:900" id="exampleModalLabel"><%=  item.get('title') %></h5></div>
				<div><button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button></div>
			</div>
			<div class="modal-body">
				<div style="margin-top:10px"><label>Description:</label><textarea readonly type="text" name="username" id="form2"  class="form-control"><%= item.get('description') %></textarea></div>
				<!-- <div><label>URL</label><input type="text" name="url" disabled id="form2" value="<%= item.get('url') %>" class="form-control"></div> -->

				<div style="margin-top:10px"><label>URL:</label><br/><a target="_blank" href="<%= item.get('url') %> "><%= item.get('url') %></a></div>
				
				<div style="margin-top:10px"><label>Price:</label><input type="number" name="price" disabled id="form2" value="<%= item.get('price') %>" class="form-control"></div>
				<div style="margin-top:10px"><label>Priority:</label><input type="text" name="username" disabled id="form2" <% if(item.get('priority')== 1) { %>
					 value="Must Have" 
					<% }; %>      
					<% if(item.get('priority')== 2) { %>
					value="Would be Nice to Have"
					<% }; %>
					<% if(item.get('priority')== 3) { %>
					value="If You Can"
					<% }; %> class="form-control"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
			</div>
		</div>
		</div>
				<!--  -->
				<% }); %>
				</tbody>
   </script> 
	<!-- /template for wishlist share view -->

	<script>
		//fo edit wishist row
		var maxWishlist = 99999;

		//handle custom ajax call
		$.ajaxPrefilter(function (options, originalOptions, jqXHR) {
		options.url = 'http://localhost/wishlistcw/api' + options.url;
		});

		//create object from form element
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

		//define backbone routes
		var Router = Backbone.Router.extend({
			routes: {
				"": "login",
				"signup": "signup",
				"wishlist/:id": "wishlist",
				"sharelist/:id": "sharelist"
			}
		});

		//create instance of router
		var router = new Router;

		router.on('route:wishlist', function (id) {
			// render item list
			wishListView.fetchData({
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
				id: atob(id) //decrypt share link user id
			});
		})
		
		//start record routes
		Backbone.history.start();

	</script>
</body>

</html>
