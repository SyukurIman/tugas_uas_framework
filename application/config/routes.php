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
$route['default_controller'] = 'Index_Home';
$route['404_override'] = '';
$route['dashboard'] = 'Dashboard_Admin';

$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['register'] = 'auth/registration';

// Buss Router
$route['ds_bus'] = 'bus';
$route['ds_bus/add'] = 'bus/add_bus';
$route['ds_bus/edit'] = 'bus/edit_bus';

// Driver Router
$route['ds_driver'] = 'driver';
$route['ds_driver/add'] = 'driver/add_driver';
$route['ds_driver/edit'] = 'driver/edit_driver';
$route['ds_driver/penghasilan'] = 'driver/penghasilan_driver';

// Kondektur Router
$route['ds_kondektur'] = 'kondektur';
$route['ds_kondektur/add'] = 'kondektur/add_kondektur';
$route['ds_kondektur/edit'] = 'kondektur/edit_kondektur';
$route['ds_kondektur/penghasilan'] = 'kondektur/penghasilan_kondektur';


$route['translate_uri_dashes'] = FALSE;
