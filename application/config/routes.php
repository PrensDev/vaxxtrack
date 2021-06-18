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
$route['default_controller']   = 'home';
$route['404_override']         = 'auth/page_not_found';
$route['translate_uri_dashes'] = FALSE;


/*
| -------------------------------------------------------------------------
| ROUTES
| -------------------------------------------------------------------------
*/

// Main Routes
$route['data-privacy']         = 'home/data_privacy';
$route['about-us']             = 'home/about_us';
$route['terms-and-conditions'] = 'home/terms_and_conditions';
$route['login']                = 'home/login';

// Authorized Routes
$route['forgot-password'] = 'auth/forgot_password';
$route['forbidden']       = 'auth/forbidden';
$route['oAuth']           = 'auth/oAuth';
$route['logout']          = 'auth/logout';

// Citizen Routes
$route['c']                                 = 'citizen/profile';
$route['c/profile']                         = 'citizen/profile';
$route['c/edit-info']                       = 'citizen/edit_info';
$route['c/account-settings']                = 'citizen/account_settings';
$route['c/visiting-logbook']                = 'citizen/visiting_logbook';
$route['c/vaccination-card']                = 'citizen/vaccination_card';
$route['c/vaccination-appointments']        = 'citizen/vaccination_appointments';
$route['c/create-appointment']              = 'citizen/create_appointment';
$route['c/available-vaccines']              = 'citizen/available_vaccines';

// Representative Routes
$route['r']                                 = 'representative/dashboard';
$route['r/dashboard']                       = 'representative/dashboard';
$route['r/profile']                         = 'representative/profile';
$route['r/edit-info']                       = 'representative/edit_info';
$route['r/account-settings']                = 'representative/account_settings';
$route['r/establishment']                   = 'representative/establishment';
$route['r/establishment/:any']              = 'representative/establishment/';
$route['r/add-establishment']               = 'representative/add_establishment';
$route['r/edit-establishment/:any']         = 'representative/edit_establishment/';
$route['r/manage-representatives/:any']     = 'representative/manage_representatives/';
$route['r/add-representative/:any']         = 'representative/add_representative/';
$route['r/edit-representative/:any/:any']   = 'representative/edit_representative//';

// Health Official Routes
$route['h']                                 = 'health_official/dashboard';
$route['h/dashboard']                       = 'health_official/dashboard';
$route['h/edit-info']                       = 'health_official/edit_info';
$route['h/account-settings']                = 'health_official/account_settings';
$route['h/cases']                           = 'health_official/cases';
$route['h/add-new-case']                    = 'health_official/add_new_case';
$route['h/heatmap']                         = 'health_official/heatmap';
$route['h/contacts']                        = 'health_official/contacts';
$route['h/vaccination-records']             = 'health_official/vaccination_records';
$route['h/vaccination-appointments']        = 'health_official/vaccination_appointments';
$route['h/vaccines']                        = 'health_official/vaccines';

// Super Admin Routes
$route['admin']                             = 'super_admin/dashboard';
$route['admin/dashboard']                   = 'super_admin/dashboard';
$route['admin/heatmap-cases']               = 'super_admin/heatmap_cases';
$route['admin/users/(:any)']                = function ($user_category) { return 'super_admin/users/' . $user_category; };
$route['admin/edit-info']                   = 'super_admin/edit_info';
$route['admin/account-settings']            = 'super_admin/account_settings';
