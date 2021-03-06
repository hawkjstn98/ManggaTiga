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
$route['default_controller'] = 'home';
$route['404_override'] = 'Home/index';
$route['translate_uri_dashes'] = FALSE;
$route['Home'] = 'Home/index';
$route["Redirect"] = 'RedirectController';
$route['Redirect/category'] = 'RedirectController/toCategory';
$route['Redirect/detail'] = 'RedirectController/toDetail';
$route['Redirect/search'] = 'RedirectController/toSearch';
$route['Redirect/shoppingchart'] = 'RedirectController/toShoppingChart';
$route['Redirect/register'] = 'RedirectController/toRegister';
$route['Redirect/home'] = 'RedirectController/toHome';
$route['Redirect/payment'] = 'RedirectController/toPayment';
$route['cms/Admin'] = 'Cms/ListTransaction';
$route['cms/Admin/product'] = 'Cms/ShowProduct';
$route['cms/Admin/banner'] = 'Cms/BannerConfig';
$route['cms/Admin/newProduct'] = 'Cms/NewProduct';
$route['cms/Admin/newBrand'] = 'Cms/NewBrand';
$route['cms/Admin/listProduct'] = 'Cms/ListProduct';
//$route['cms/Admin/listTransaction'] = 'Cms/ListTransaction';
$route['cms/Admin/DeleteTransaction'] = 'Cms/DeleteTransaction';
$route['cms/Admin/newProduct/insert_action'] = 'Cms/InsertProduct';
$route['cms/Admin/newBrand/insert_action'] = 'Cms/InsertBrand';
$route['user/profile'] = 'ProfileController/toProfile';