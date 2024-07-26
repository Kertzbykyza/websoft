<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
// $route['default_controller'] = 'welcome';
// $route['404_override'] = '';
// $route['translate_uri_dashes'] = FALSE;
// $route['default_controller'] = 'pages/view';
$route['default_controller'] = 'pages/view/home';
$route['article'] = 'pages/view/about';
$route['home'] = 'pages/view/home';
$route['about'] = 'pages/view/services';
$route['archived'] = 'pages/view/archived';
$route['articles']='controllers/ArticleController.php';
$route['articles']='models/Article_Author_model.php';


// $route['(:any)'] = 'pages/user/$1';
$route['user'] = 'usercontroller/view/users';
$route['createUser'] = 'usercontroller/create/adduser';
$route['addUser'] = 'usercontroller/add';
$route['editUser'] = 'usercontroller/edit';
$route['updateUser'] = 'usercontroller/update';
$route['deleteUser/(:num)'] = 'usercontroller/delete/$1';

$route['editAuthor'] = 'authorcontroller/edit';
$route['updateAuthor'] = 'authorcontroller/update';
$route['deleteAuthor'] = 'authorcontroller/delete';
//Dashbaord
$route['dashboard'] = 'dashboardcontroller/index';

$route['archives'] = 'archivecontroller/view';

$route['volumes'] = 'volumecontroller/view';
$route['createVolume'] = 'volumecontroller/create';
$route['addVolume'] = 'volumecontroller/add';
$route['deleteVolume'] = 'volumecontroller/delete';
$route['editVolume'] = 'volumecontroller/edit';
$route['updateVolume'] = 'volumecontroller/update';
$route['archiveVolume'] = 'volumecontroller/archive';
$route['publishVolume'] = 'volumecontroller/publish';


$route['articles'] = 'articlecontroller/view/articles';
$route['add-article'] = 'articlecontroller/create_article';
$route['deleteArticle'] = 'articlecontroller/delete';
$route['editArticle'] = 'articlecontroller/edit';
$route['updateArticle'] = 'articlecontroller/update';


$route['addSubmission'] = 'articlecontroller/create_article';
$route['submitArticle'] = 'articlecontroller/submit_article';
$route['editSubmission'] = 'articlecontroller/edit_submission';
$route['updateSubmission'] = 'articlecontroller/update_submission';
$route['deleteSubmission'] = 'articlecontroller/delete_submission';




$route['upload'] = 'uploadcontroller/index';
$route['doupload'] = 'uploadcontroller/do_upload';

$route['publish'] = 'articlecontroller/publishArticle';



// $route['(:any'] = 'user/user/$1';

// $route->get('pages', 'Pages::index');
// $route->post('pages', 'Pages::index');
