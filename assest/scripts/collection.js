$.ajaxPrefilter(function (options, originalOptions, jqXHR) {
    options.url = 'http://localhost/wishlistcw/api' + options.url;
});


var WishList = Backbone.Collection.extend({
    url: '/item',
    comparator: function (m) {
        return m.get('priority');
    },
    model: Item
});