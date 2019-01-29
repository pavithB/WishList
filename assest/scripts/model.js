$.ajaxPrefilter(function (options, originalOptions, jqXHR) {
    options.url = 'http://localhost/wishlistcw/api' + options.url;
});

var User = Backbone.Model.extend({
    // defaults: {
    //     id: "",
    //     title: "",
    //     description: "",
    //     createtime:"",
    //     user_id:"",
    //     url:"",
    //     price:"",
    //     priority:""
    //   },
    urlRoot: '/user'


});

var Item = Backbone.Model.extend({
    // defaults: {
    //     id: "",
    //     username: "",
    //     password: "",
    //     full_name:"",
    //     email:"",
    //     wishlist_name:"",
    //     wishlist_description:"",
    //     shareable:""
    //   },
    urlRoot: '/item'
});

var WishList = Backbone.Collection.extend({
    url: '/item',
    comparator: function (m) {
        return m.get('priority');
    },
    model: Item
});