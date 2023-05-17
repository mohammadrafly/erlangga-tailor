<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Co nfig/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//Autentikasi
$routes->group('auth', function($routes) {
    $routes->match(['POST', 'GET'], 'sign-in', 'AuthController::signIn');
    $routes->match(['POST', 'GET'], 'sign-up', 'AuthController::signUp');
});

$routes->group('dashboard', ['filter' => 'auth'], function ($routes){
    $routes->get('/', 'Home::dashboard');

    $routes->post('export/order', 'OrderController::export');

    $routes->match(['POST', 'GET'], 'setting', 'Home::setting');
    //users
    $routes->group('users', function($routes) {
        $routes->match(['POST', 'GET'], '/', 'UsersController::index');
        $routes->match(['POST', 'GET'], 'update/(:num)', 'UsersController::update/$1');
        $routes->get('delete/(:num)', 'UsersController::delete/$1');
    });

    //orders
    $routes->group('orders', function($routes) {
        $routes->match(['POST', 'GET'], '/', 'OrderController::index');
        $routes->match(['POST', 'GET'], 'update/(:num)', 'OrderController::update/$1');
        $routes->get('delete/(:num)', 'OrderController::delete/$1');
    });

    //collections
    $routes->group('collections', function($routes) {
        $routes->match(['POST', 'GET'], '/', 'CollectionController::index');
        $routes->get('add', 'CollectionController::add');
        $routes->match(['POST', 'GET'], 'update/(:num)', 'CollectionController::update/$1');
        $routes->get('delete/(:num)', 'CollectionController::delete/$1');
    });
});

$routes->group('customer', ['filter' => 'authCustomer'], function($routes) {
    $routes->match(['POST', 'GET'], 'profile', 'UsersController::myProfile');
    $routes->match(['POST', 'GET'], 'order', 'OrderController::myOrder');
    $routes->match(['POST', 'GET'], 'tanpa-desain', 'OrderController::tanpaDesain');
    $routes->match(['POST', 'GET'], 'dengan-desain', 'OrderController::denganDesain');
    $routes->match(['POST', 'GET'], 'perbaikan', 'OrderController::perbaikan');
});

$routes->get('collection', 'CollectionController::displayCollection');
$routes->get('promo', 'CollectionController::displayPromo');

$routes->get('sign-out', 'AuthController::signOut');

//webpack
$routes->add('js/(:any)', 'StaticFiles::serve/$1');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
