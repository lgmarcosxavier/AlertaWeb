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
$routes->get('Alerta', 'Alerta::index', ['as' => 'alerta_index']);
$routes->get('alerta/sancion/(:num)', 'Sancion::sancion/$1', ['as' => 'alerta_sancion']);
$routes->post('alerta/sancion', 'Sancion::registrar', ['as' => 'alerta_registrar']);
$routes->get('tipoAlerta', 'TipoAlerta::index', ['as' => 'tipoAlerta_index']);
$routes->get('tipoAlerta/crear', 'TipoAlerta::crear', ['as' => 'tipoAlerta_crear']);
$routes->post('tipoAlerta/registrar', 'TipoAlerta::registrar', ['as' => 'tipoAlerta_registrar']);
$routes->get('tipoAlerta/editar/(:num)', 'TipoAlerta::editar/$1', ['as' => 'tipoAlerta_editar']);
$routes->post('tipoAlerta/actualizar/(:num)', 'TipoAlerta::actualizar/$1', ['as' => 'tipoAlerta_actualizar']);
$routes->post('tipoAlerta/eliminar/(:num)', 'TipoAlerta::destroy/$1', ['as' => 'tipoAlerta_eliminar']);
# Usuarios administradores
$routes->get('usuario/administrador', 'Usuario::administradores', ['as' => 'usuarioAdmininistrador']);
$routes->get('usuario/usuarios', 'Usuario::usuarios', ['as' => 'usuariosCliente']);
$routes->get('usuario/administrador/crear', 'Usuario::crearAdministrador', ['as' => 'usuarioAdministrador_crear']);
$routes->post('usuario/administrador/registrar', 'Usuario::registrarAdministrador', ['as' => 'usuarioAdministrador_registrar']);
$routes->get('usuario/administrador/editar/(:num)', 'Usuario::editarAdministrador/$1', ['as' => 'usuarioAdministrador_editar']);

$routes->post('usuario/administrador/eliminar/(:num)', 'Usuario::eliminarAdministrador/$1', ['as' => 'usuarioAdministrador_eliminar']);
$routes->post('usuario/usuarios/eliminar/(:num)', 'Usuario::darBajaUsuario/$1', ['as' => 'usuarioUsuarios_eliminar']);
$routes->get('usuario/usuarios/confianza/(:num)', 'Usuario::verUsuariosConfianza/$1', ['as' => 'usuariosConfianza_usuario']);
$routes->get('mensajesPersonalizados', 'MensajesPersonalizados::index', ['as' => 'mensajesPersonalizados']);


$routes->get('contactoEmergencia', 'ContactoEmergencia::index', ['as' => 'ContactoEmergencia_index']);
$routes->get('contactoEmergencia/crear', 'ContactoEmergencia::crear', ['as' => 'contactoEmergencia_crear']);
$routes->post('contactoEmergencia/registrar', 'ContactoEmergencia::registrar', ['as' => 'contactoEmergencia_registrar']);
$routes->get('contactoEmergencia/editar/(:num)', 'ContactoEmergencia::editar/$1', ['as' => 'ContactoEmergencia_editar']);
$routes->post('contactoEmergencia/actualizar/(:num)', 'ContactoEmergencia::actualizar/$1', ['as' => 'ContactoEmergencia_actualizar']);
$routes->post('contactoEmergencia/eliminar/(:num)', 'ContactoEmergencia::destroy/$1', ['as' => 'contactoEmergencia_eliminar']);

/*
* ------------------------------------
* Api Rest
* ------------------------------------
*/
$routes->post('/api/login','RestController::login', ['as' => 'api_usuarioLogin']);
$routes->post('/api/registrar/usuario','RestController::registrarUsuario', ['as' => 'api_usuarioRegistrar']);
$routes->post('/api/actualizar/usuario','RestController::actualizarUsuario', ['as' => 'api_actualizarUsuario']);
$routes->post('/api/obtener/sanciones/usuario','RestController::sancionesUsuario', ['as' => 'api_sancionesUsuario']);
$routes->post('/api/obtener/tipoAlerta','RestController::obtenerTiposAlerta', ['as' => 'api_obtenerTiposAlerta']);
$routes->post('/api/obtener/departamentos','RestController::obtenerDepartamentos', ['as' => 'api_obtenerDepartamentos']);
$routes->post('/api/obtener/municipios','RestController::obtenerMunicipios_Departamento', ['as' => 'api_obtenerMunicipios_Departamento']);
$routes->post('/api/obtener/usuarios','RestController::obtenerUsuarios', ['as' => 'api_obtenerUsuarios']);
$routes->post('/api/obtener/usuarios/por/nombre','RestController::obtenerUsuariosPorNombre', ['as' => 'api_obtenerUsuariosPorNombre']);
$routes->post('/api/registrar/mensaje/personalizado','RestController::registrarMensajePersonalizado', ['as' => 'api_registrarMensajePersonalizado']);
$routes->post('/api/consultar/mensaje/personalizado','RestController::consultarMensajesPersonalizado', ['as' => 'api_consultarMensajesPersonalizado']);
$routes->post('/api/registrar/usuario/confianza', 'RestController::registrarUsuarioConfianza', ['as' => 'api_registrarUsuarioConfianza']);
$routes->post('/api/consultar/usuario/confianza', 'RestController::consultarUsuariosConfianza', ['as' => 'api_consultarUsuariosConfianza']);
$routes->post('/api/consultar/usuario/confianza/por/nombre', 'RestController::consultarUsuariosConfianzaPorNombre', ['as' => 'api_consultarUsuariosConfianzaPorNombre']);
$routes->post('/api/obtener/contactos/emergencia','RestController::obtenerContactosEmergencia', ['as' => 'api_obtenerContactosEmergencia']);
$routes->post('/api/consultar/alertas/usuario','RestController::consultarAlertasUsuario', ['as' => 'api_consultarAlertasUsuario']);
$routes->post('/api/obtener/alerta','RestController::obtenerAlerta', ['as' => 'api_obtenerAlerta']);
$routes->post('/api/marcar/vista/alerta','RestController::marcarAlertaVista', ['as' => 'api_marcarAlertaVista']);
$routes->post('/api/obtener/alerta/no/vistas','RestController::obtenerAlertasNoVistas', ['as' => 'api_obtenerAlertasNoVistas']);
$routes->post('/api/registrar/alerta','RestController::registrarAlerta', ['as' => 'api_registrarAlerta']);


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
