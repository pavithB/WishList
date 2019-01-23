<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
        <title>WISH LIST</title>
        <!-- <link href="<?php echo base_url(); ?>application/third_party/item.css" rel="stylesheet"> -->
    <!-- <link href="item.css" rel="stylesheet" media="all"/> -->
      <style>
      body {
	font-size: 14px;
	background: #eeeeee;
	color: #333333;
	width: 520px;
	margin: 0 auto;
}

#todoapp {
	background: #fff;
	padding: 20px;
	margin-bottom: 40px;
}

#todoapp h1 {
	font-size: 36px;
	text-align: center;
}

#todoapp input[type="text"] {
	width: 466px;
	font-size: 24px;
	line-height: 1.4em;
	padding: 6px;
}

#main {
	display: none;
}

#todo-list {
	margin: 10px 0;
	padding: 0;
	list-style: none;
}

#todo-list li {
	padding: 18px 20px 18px 0;
	position: relative;
	font-size: 24px;
	border-bottom: 1px solid #cccccc;
}

#todo-list li:last-child {
	border-bottom: none;
}
#todo-list li.done label {
    color: #777777;
    text-decoration: line-through;
}

#todo-list li .edit {
    display: none;
}
#todo-list li.editing {
	border-bottom: 1px solid #778899;
}

#todo-list li.editing .view {
	display: none;
}
#todo-list li.editing .edit {
	display: block;
	width: 444px;
	padding: 13px 15px 14px 20px;
	margin: 0;
}

#todo-list li.done label {
	color: #777777;
	text-decoration: line-through;
}

#todo-list .destroy {
	position: absolute;
	right: 5px;
	top: 20px;
	display: none;
	cursor: pointer;
	width: 20px;
	height: 20px;
}

#todoapp footer {
	display: none;
	margin: 0 -20px -20px -20px;
	overflow: hidden;
	color: #555555;
	background: #f4fce8;
	border-top: 1px solid #ededed;
	padding: 0 20px;
	line-height: 37px;
}

#clear-completed {
	float: right;
	line-height: 20px;
	text-decoration: none;
	background: rgba(0, 0, 0, 0.1);
	color: #555555;
	font-size: 11px;
	margin-top: 8px;
	margin-bottom: 8px;
	padding: 0 10px 1px;
	cursor: pointer;
}



      </style>
	</head>
	<body>

<div id="todoapp">
    <header>
      <h1>WishList</h1>
      <input id="new-todo" type="text" placeholder="What needs to be done?"/>
    </header>

    <section id="main" style="display: block;">
      <input id="toggle-all" type="checkbox"/>
      <label for="toggle-all">Mark all as complete</label>      
      <ul id="todo-list"></ul>
    </section>
    
    <footer style="display: block;">
      <div class="todo-count"><b>2</b> items left</div>
    </footer>
</div>
          
<script type="text/template" id="item-template">
    <div class="view">
      <input class="toggle" type="checkbox" <%= done ? 'checked="checked"' : '' %> />
      <label><%- title %></label>
      <a class="destroy"></a>
    </div>
<input class="edit" type="text" value="<%- title %>" />
</script>

<script type="text/template" id="stats-template">
    <% if (done) { %>
      <a id="clear-completed">Clear <%= done %> completed <%= done == 1 ? 'item' : 'items' %></a>
    <% } %>
    <div class="todo-count"><b><%= remaining %></b> <%= remaining == 1 ? 'item' : 'items' %> left</div>
</script>
        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.4.4/underscore-min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/backbone.js/1.0.0/backbone-min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/backbone-localstorage.js/1.1.16/backbone.localStorage-min.js"></script>
        
        <script>
        //see detail -> official example
//http://backbonejs.org/docs/todos.html
//http://backbonejs.org/examples/todos/index.html

$(document).ready(function(){
    //Define Model
    var Todo = Backbone.Model.extend({
        defaults: function() {
            return {
                title: "no title...",
                order: Todos.nextOrder(),
                done: false
            };
        },
        toggle: function() {
          this.save({done: !this.get("done")});
        }
    });
    
    //Model Collection
	var TodoList = Backbone.Collection.extend({
		model: Todo,
		localStorage: new Backbone.LocalStorage("todos-backbone"),
		done: function() {
			return this.where({done: true});
		},
		remaining: function() {
			return this.without.apply(this, this.done());
		},
		nextOrder: function() {
			if (!this.length) return 1;
			return this.last().get("order") + 1;
		},
		comparator: 'order'
	});
	var Todos = new TodoList;
    
    //Model View & event action
	var TodoView = Backbone.View.extend({
		tagName:  "li",
		template: _.template($("#item-template").html()),
		events: {
			"click .toggle"   : "toggleDone",
			"dblclick .view"  : "edit",
			"click a.destroy" : "clear",
			"keypress .edit"  : "updateOnEnter",
			"blur .edit"      : "close"
		},
		initialize: function() {
			this.listenTo(this.model, "change", this.render);
			this.listenTo(this.model, "destroy", this.remove);
		},
		render: function() {
			this.$el.html(this.template(this.model.toJSON()));
			this.$el.toggleClass("done", this.model.get("done"));
			this.input = this.$(".edit");
			return this;
		},
		toggleDone: function() {
			this.model.toggle();
		},
		edit: function() {
			this.$el.addClass("editing");
			this.input.focus();
		},
		close: function() {
			var value = this.input.val();
			if (!value) {
				this.clear();
			} else {
				this.model.save({title: value});
				this.$el.removeClass("editing");
			}
		},
		updateOnEnter: function(e) {
			if (e.keyCode == 13) this.close();
		},
		clear: function() {
			this.model.destroy();
		}

	});
    
    //Make Application
	var AppView = Backbone.View.extend({
		el: $("#todoapp"),
		statsTemplate: _.template($("#stats-template").html()),
	    events: {
			"keypress #new-todo":  "createOnEnter",
			"click #clear-completed": "clearCompleted",
			"click #toggle-all": "toggleAllComplete"
		},

		initialize: function() {
			this.input = this.$("#new-todo");
			this.allCheckbox = this.$("#toggle-all")[0];

			this.listenTo(Todos, "add", this.addOne);
			this.   (Todos, "reset", this.addAll);
			this.listenTo(Todos, "all", this.render);

			this.footer = this.$("footer");
			this.main = $("#main");

			Todos.fetch();
		},

		render: function() {
			var done = Todos.done().length;
			var remaining = Todos.remaining().length;

			if (Todos.length) {
				this.main.show();
				this.footer.show();
				this.footer.html(this.statsTemplate({done: done, remaining: remaining}));
			} else {
				this.main.hide();
				this.footer.hide();
			}

			this.allCheckbox.checked = !remaining;
		},

		addOne: function(todo) {
			var view = new TodoView({model: todo});
			this.$("#todo-list").append(view.render().el);
		},
		addAll: function() {
			Todos.each(this.addOne, this);
		},

		createOnEnter: function(e) {
			if (e.keyCode != 13) return;
			if (!this.input.val()) return;

			Todos.create({title: this.input.val()});
			this.input.val("");
		},
		clearCompleted: function() {
			_.invoke(Todos.done(), "destroy");
			return false;
		},

		toggleAllComplete: function () {
			var done = this.allCheckbox.checked;
			Todos.each(function (todo) { todo.save({"done": done}); });
		}

	});
	var App = new AppView;
    
}());
        </script>

	</body>
</html>