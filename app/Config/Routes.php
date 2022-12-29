<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('index', 'Home::index');
// $routes->get('hire', 'Page::hire');
// $routes->get('loginCompany', 'Page::loginCom');
// $routes->get('register', 'Auth::register');
// $routes->get('loginJS', 'Auth::index');
// $routes->get('enroll', 'Page::history_enroll');
// $routes->get('profile', 'Page::profile');
// $routes->get('lowongan', 'Page::lowongan');
// $routes->post('lowongan', 'Page::lowongan');


$routes->group('', ['filter' => 'AuthCheck'], function ($routes) {
    $routes->get('/enroll', 'Page::enroll');
    $routes->get('page/enroll', 'Page::enroll');
    $routes->get('/profile', 'Page::profile');
    $routes->get('page/profile', 'Page::profile');
    $routes->get('/lowongan', 'Page::lowongan');
    $routes->get('page/lowongan', 'Page::lowongan');
    $routes->get('/lowonganAll', 'Page::lowonganAll');
    $routes->post('/lowongan', 'Page::lowongan');
    $routes->post('/crud_job', 'Page::crud_job');
});

$routes->group('', ['filter' => 'LoggedIn'], function ($routes) {
    $routes->get('hire', 'Page::hire');
    $routes->get('loginCompany', 'Page::loginCom');
    $routes->get('register', 'Auth::register');
    $routes->get('loginJS', 'Auth::index');
    $routes->get('Auth', 'Auth::index');
});
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
