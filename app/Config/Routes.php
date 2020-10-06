<?php namespace Config;

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
$routes->get('/', 'Home::index');
$routes->get("/dashboard", "Dashboard::index", ['as' => 'dashboard']);
# TipoAlerta
$routes->get('tipoAlerta', 'TipoAlerta::index', ['as' => 'tipoAlerta_index']);
$routes->get('tipoAlerta/crear', 'TipoAlerta::crear', ['as' => 'tipoAlerta_crear']);
$routes->post('tipoAlerta/registrar', 'TipoAlerta::registrar', ['as' => 'tipoAlerta_registrar']);
$routes->get('tipoAlerta/editar/(:num)', 'TipoAlerta::editar/$1', ['as' => 'tipoAlerta_editar']);
$routes->post('tipoAlerta/actualizar/(:num)', 'TipoAlerta::actualizar/$1', ['as' => 'tipoAlerta_actualizar']);
$routes->post('tipoAlerta/eliminar/(:num)', 'TipoAlerta::destroy/$1', ['as' => 'tipoAlerta_eliminar']);


/*
* ------------------------------------
* Api Rest
* ------------------------------------
*/
$routes->post('/api/login','RestController::login', ['as' => 'api_login']);


/**
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
