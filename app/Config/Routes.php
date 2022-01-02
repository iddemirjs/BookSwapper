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
$routes->get('/', 'Home::index');
$routes->post('user/create', 'User::create');
$routes->post('user/logout', 'User::logout');

// Author URLs
$routes->get('dashboard/delete_author/(:num)', 'Dashboard::delete_author/$1');
$routes->get('dashboard/update_author/(:num)', 'Dashboard::update_author/$1');
// Category URLs
$routes->get('dashboard/delete_category/(:num)', 'Dashboard::delete_category/$1');
$routes->get('dashboard/update_category/(:num)', 'Dashboard::update_category/$1');
// Book URLs
$routes->get('dashboard/delete_book/(:num)', 'Dashboard::delete_book/$1');
$routes->get('dashboard/update_book/(:num)', 'Dashboard::update_book/$1');
$routes->get('offer/make/(:num)', 'OfferController::make/$1');
$routes->post('offer/create', 'OfferController::create');
$routes->get('offer/reject/(:num)', 'OfferController::reject/$1');
$routes->get('offer/accept/(:num)', 'OfferController::accept/$1');
$routes->get('book/(:num)', 'BookController::getBookById/$1');
$routes->get('profile/(:num)', 'User::profile/$1');


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
