<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>BackboneTutorials.com Beginner Video</title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.1.1/css/bootstrap.min.css">
</head>
<body>


  <div class="container">
    <h1>WISH LIST</h1>
    <hr />
    <div class="page"></div>
  </div>


  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.2/jquery.min.js" type="text/javascript"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.2/underscore-min.js" type="text/javascript"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/backbone.js/0.9.2/backbone-min.js"></script>

  <script type="text/template" id="item-list-template">
    <a href="#/new" class="btn btn-primary">New</a>
    <hr />
    <table class="table striped">
      <thead>
        <tr>
          <th>Title</th><th>Description</th><th>url</th><th>Price</th><th>Piority</th><th></th>
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
            <td><a class="btn" href="#/edit/<%= item.id %>">Edit</a></td>
          </tr>
        <% }); %>
      </tbody>
    </table>
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
       var token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEiLCJmdWxsX25hbWUiOiJwYXZpdGggYnVkZGhpbWEiLCJ1c2VybmFtZSI6InBhdml0aGIiLCJlbWFpbCI6InBhdml0aEBnbWFpbC5jb20iLCJ0aW1lIjoxNTQ4MjU2OTAxfQ.DTSShZ5816yRs7MUAQelQVtvdmRUEgBjMgeP3E90pTk";
    function htmlEncode(value){
      return $('<div/>').text(value).html();
    }
    $.fn.serializeObject = function() {
      var o = {};
      var a = this.serializeArray();
      $.each(a, function() {
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
    $.ajaxPrefilter( function( options, originalOptions, jqXHR ) {
      options.url = 'http://localhost/wishlistcw/api' + options.url;
    });

    var Item = Backbone.Model.extend({
      urlRoot: '/item'
    });

    var WishList = Backbone.Collection.extend({
      url: '/item',
      model: Item
    });

    var WishListView = Backbone.View.extend({
      el: '.page',
      render: function () {
        var that = this;
        var list = new WishList();
        // collection.fetch({ data: $.param({ page: 1}) });
       
        list.fetch({ data: $.param({ id: 2}), headers: {'Authorization' :  token}, success: function (list) {
            // var data = list.models[0].attributes.data;
            var template = _.template($('#item-list-template').html(), {list: list.models});
            that.$el.html(template);
          } })
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
        item.save(itemDetails, {headers: {'Authorization' :  token},
          success: function (item) {
            router.navigate('', {trigger:true});
          }
        });
        return false;
      },
      deleteItem: function (ev) {
        this.item.destroy({headers: {'Authorization' :  token},
          success: function () {
            //console.log('destroyed');
            router.navigate('', {trigger:true});
          }
        })
      },
      render: function (options) {
        var that = this;
        if(options.id) {
          that.item = new Item({id: options.id});
          that.item.fetch({headers: {'Authorization' :  token},
            success: function (item) {
              var template = _.template($('#edit-item-template').html(), {item: item});
              that.$el.html(template);
            }
          })
        } else {
          var template = _.template($('#edit-item-template').html(), {item: null});
          that.$el.html(template);
        }
      }
    });
    var itemEditView = new ItemEditView();
    
    var Router = Backbone.Router.extend({
        routes: {
          "": "home", 
          "edit/:id": "edit",
          "new": "edit",
        }
    });
    var router = new Router;
    router.on('route:home', function() {
      // render item list
      wishListView.render();
    })
    router.on('route:edit', function(id) {
      itemEditView.render({id: id});
    })
    Backbone.history.start();
  </script>


</body>
</html> 
