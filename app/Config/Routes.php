<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
$routes->setDefaultController('Article');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->group('admin', function($routes)
{
	$routes->add('/', 'Admin::dashboard', ['filter' => 'admin-auth']);
	$routes->add('index', 'Admin::dashboard', ['filter' => 'admin-auth']);
	// articles
	$routes->add('dashboard', 'Admin::dashboard', ['filter' => 'admin-auth']);
	$routes->add('page', 'Admin::pages', ['filter' => 'admin-auth']);
	$routes->add('page/(:any)', 'Admin::page/$1', ['filter' => 'admin-auth']);
	$routes->add('article', 'Admin::articles', ['filter' => 'admin-auth']);
	$routes->add('article/(:any)', 'Admin::article/$1', ['filter' => 'admin-auth']);
	$routes->add('category', 'Admin::categories', ['filter' => 'admin-auth']);
	$routes->add('category/(:any)', 'Admin::category/$1', ['filter' => 'admin-auth']);
	$routes->add('tag', 'Admin::tags', ['filter' => 'admin-auth']);
	$routes->add('tag/(:any)', 'Admin::tag/$1', ['filter' => 'admin-auth']);
	$routes->add('article-status', 'Admin::articleStatuses', ['filter' => 'admin-auth']);
	$routes->add('article-status/(:any)', 'Admin::articleStatus/$1', ['filter' => 'admin-auth']);
	// users
	$routes->add('user', 'Admin::users', ['filter' => 'admin-auth']);
	$routes->add('user/(:any)', 'Admin::user/$1', ['filter' => 'admin-auth']);
	$routes->add('group', 'Admin::groups', ['filter' => 'admin-auth']);
	$routes->add('group/(:any)', 'Admin::group/$1', ['filter' => 'admin-auth']);
	$routes->add('user-status', 'Admin::userStatuses', ['filter' => 'admin-auth']);
	$routes->add('user-status/(:any)', 'Admin::userStatus/$1', ['filter' => 'admin-auth']);
	// menus
	$routes->add('menu', 'Admin::menus', ['filter' => 'admin-auth']);
	$routes->add('menu/(:any)', 'Admin::menu/$1', ['filter' => 'admin-auth']);
	$routes->add('menu-type', 'Admin::menuTypes', ['filter' => 'admin-auth']);
	$routes->add('menu-type/(:any)', 'Admin::menuType/$1', ['filter' => 'admin-auth']);
	$routes->add('user-status', 'Admin::userStatuses', ['filter' => 'admin-auth']);
	$routes->add('user-status/(:any)', 'Admin::userStatus/$1', ['filter' => 'admin-auth']);
	// communications
	$routes->add('comment', 'Admin::comments', ['filter' => 'admin-auth']);
	$routes->add('comment/(:any)', 'Admin::comment/$1', ['filter' => 'admin-auth']);
	$routes->add('message', 'Admin::messages', ['filter' => 'admin-auth']);
	$routes->add('message/(:any)', 'Admin::message/$1', ['filter' => 'admin-auth']);
	$routes->add('notification', 'Admin::notifications', ['filter' => 'admin-auth']);
	$routes->add('notification/(:any)', 'Admin::notification/$1', ['filter' => 'admin-auth']);
	// media
	$routes->add('media', 'Admin::media', ['filter' => 'admin-auth']);
//	$routes->add('media/(:any)', 'Admin::media');
	$routes->add('media/upload', 'Admin::upload', ['filter' => 'admin-auth']);
	$routes->add('media/upload-multiple', 'Admin::uploadMultiple', ['filter' => 'admin-auth']);
	// modules
	$routes->add('module', 'Admin::modules', ['filter' => 'admin-auth']);
	$routes->add('module/(:any)', 'Admin::module/$1', ['filter' => 'admin-auth']);
	$routes->add('module-status', 'Admin::moduleStatuses', ['filter' => 'admin-auth']);
	$routes->add('module-status/(:any)', 'Admin::moduleStatus/$1', ['filter' => 'admin-auth']);
	// settings
	$routes->add('common', 'Admin::notifications', ['filter' => 'admin-auth']);
	$routes->add('profile', 'Admin::profile', ['filter' => 'admin-auth']);
	$routes->add('update', 'Admin::update', ['filter' => 'admin-auth']);
	$routes->add('security', 'Admin::security', ['filter' => 'admin-auth']);
	// information
	$routes->add('docs', 'Admin::docs', ['filter' => 'admin-auth']);
	$routes->add('support', 'Admin::support', ['filter' => 'admin-auth']);
	// other
	$routes->add('login', 'User::login', ['filter' => 'admin-noauth']);
	$routes->add('logout', 'User::logout');
});

// homepage
$routes->add('/', 'Article::index');
// ajax requests (sorting, filtering etc.)
$routes->add('/articles/(:any)', 'Article::articles/$1');
// some static pages
$routes->add('/contact', 'Article::contact');
$routes->add('/login', 'User::login');
$routes->add('/register', 'User::register');
$routes->post('/subscribe', 'User::subscribe');
$routes->get('/unsubscribe/(:num)', 'User::unsubscribe');
// all another pages
$routes->add('/(:any)', 'Article::article/$1');

//$routes->group('account', function($routes)
//{
//	$routes->add('user', 'User::profile');
//	$routes->add('user', 'user::index');
//});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
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

/**
 * --------------------------------------------------------------------
 * Include Modules Routes Files
 * --------------------------------------------------------------------
 */
/*if (file_exists(ROOTPATH.'modules'))
{
	$modulesPath = ROOTPATH.'modules/';
	$modules = scandir($modulesPath);
	
	foreach ($modules as $module)
	{
		if ($module === '.' || $module === '..')
		{
			continue;
		}
		if (is_dir($modulesPath) . '/' . $module)
		{
			$routesPath = $modulesPath . $module . '/Config/Routes.php';
			if (file_exists($routesPath)) {
				require_once $routesPath;
			}
		}
	}
}*/
