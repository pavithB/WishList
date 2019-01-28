<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// User API Routes
$route['api/user/register'] = 'api/users/register';
$route['api/user']["POST"] = 'api/users/login';
$route['api/user']["GET"] = 'api/users/user';

// Users Article Routes
$route['api/article/create'] = 'api/articles/createArticle';

// Deleta an Article Routes
# https://codeigniter.com/user_guide/general/routing.html#using-http-verbs-in-routes
$route['api/article/(:num)/delete']["DELETE"] = 'api/articles/deleteArticle/$1';

// Update and Article Route :: PUT API Request
$route['api/article/update']["put"] = 'api/articles/updateArticle';



// Users item Routes
$route['api/item']["POST"] = 'api/items/item';

// Deleta an item Routes
# https://codeigniter.com/user_guide/general/routing.html#using-http-verbs-in-routes
$route['api/item/(:num)']["DELETE"] = 'api/items/item/$1';

// Update and item Route :: PUT API Request
$route['api/item/(:num)']["put"] = 'api/items/item/$1';

// View all Items in Wishlist 
$route['api/item']["GET"] = 'api/items/wishlist';

// View all Items in sharelist 
$route['api/item/sharelist']["GET"] = 'api/items/sharelist';

$route['api/item/(:num)']["GET"] = 'api/items/item/$1';

// Users item Routes
// $route['api/item/receive'] = 'api/items/item';

// $route['api/item/receive/(:num)'] = 'api/item/item/id/$1';

// $route['api/item/receive/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/item/item/id/$1/format/$3$4'; // Example 8

