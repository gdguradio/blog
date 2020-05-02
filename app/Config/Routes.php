<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index', ['as' => 'home']);


$routes->add('users', 'Register::index', ['as' => 'users']);
$routes->add('usersnew', 'Register::store', ['as' => 'usersnew']);
$routes->add('userlost', 'Register::lostPassword', ['as' => 'userlost']);
$routes->add('userpass', 'Register::changePassword', ['as' => 'changepass']);

$routes->add('users/(:num)/(:num)', 'Register::updaterole/$1/$2', ['as' => 'usersUpdate']);
$routes->add('users/(:num)', 'Register::deleteuser/$1', ['as' => 'usersdelete']);

// $routes->post('user', 'Register::show', ['as' => 'user']);
$routes->add('user', 'Register::show', ['as' => 'User']);
// Redirect to a named route
$routes->addRedirect('User', 'home');


$routes->add('post/(:num)', 'Post::updatepost/$1', ['as' => 'updatePost']);
$routes->add('postedit/(:num)', 'Post::edit/$1', ['as' => 'updateEdit']);
$routes->add('postlist', 'Post::postlist', ['as' => 'postList']);
$routes->add('post', 'Post::index', ['as' => 'postNew']);
$routes->add('poststore', 'Post::store', ['as' => 'postStore']);
$routes->add('postview/(:num)', 'Post::viewpost/$1', ['as' => 'postView']);

// $routes->get('post/(:segment)',      'Post::updatepost/$1', ['as' => 'updatePost']);

// $routes->add('post/(:num)', 'Post::deletepost/$1', ['as' => 'deletepost']);


// $routes->get('/viewpost/{id}', 'Post::viewpost');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
