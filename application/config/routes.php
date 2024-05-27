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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['homepage'] = 'pub/view';
$route['current'] = 'pub/current';
$route['articles'] = 'pub/articles';
$route['article/(:num)'] = 'pub/article/$1';
$route['volumearticle/(:num)'] = 'pub/volart/$1';
$route['archives'] = 'pub/archives';
$route['about'] = 'pub/about';
$route['search/(:num)'] = 'pub/search/$1';

$route['dashboard'] = 'admin/dashboard';
$route['volumes'] = 'volumes/index';
$route['volumes/new'] = 'volumes/add';
$route['volumes/view(:num)'] = 'volumes/view/(:num)';
$route['volumes/edit/(:num)'] = 'volumes/edit/$1';
$route['volumes/update/(:num)'] = 'volumes/update_volume/$1';
$route['volumes/addarticle/(:num)'] = 'volumes/addarticle/$1';


$route['admin/articles'] = 'articles/index';
$route['admin/articles/view/(:num)'] = 'articles/view/$1';
$route['admin/articles/new'] = 'articles/add';
$route['admin/articles/edit/(:num)'] = 'articles/edit/$1';

$route['admin/users'] = 'users/index';
$route['admin/users/view/(:num)'] = 'users/view/$1';
$route['admin/users/add'] = 'users/add';
$route['admin/users/edit/(:num)'] = 'users/edit/$1';

$route['admin/authors'] = 'author/index';
$route['admin/authors/view/(:num)'] = 'author/view/$1';
$route['admin/authors/add'] = 'author/add';
$route['admin/authors/edit/(:num)'] = 'author/edit/$1';

$route['login'] = 'pub/login';

$route['default_controller'] = 'pub/view';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;