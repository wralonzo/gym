<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'authGuard']);
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::index');
$routes->get('/login/logout', 'Login::logout',  ['filter' => 'authGuard']);

$routes->get('/login/registrar', 'Login::registrar');
$routes->post('/login/registrar', 'Login::registrar');
$routes->post('/login/registrar', 'Login::registrar');
$routes->get('/client', 'Client::index',  ['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/client/registrar', 'Client::registrar', ['filter' => 'authGuard']);
$routes->get('/client/asistencia', 'Client::asistencia',  ['filter' => 'authGuard']);
$routes->post('/client/asistencia', 'Client::asistencia',  ['filter' => 'authGuard']);
$routes->get('/client/editar/(:any)', 'Client::editar/$1',  ['filter' => 'authGuard']);
$routes->get('/client/borrar/(:any)', 'Client::borrar/$1',  ['filter' => 'authGuard']);
$routes->post('/client/editar/(:any)', 'Client::editar/$1',  ['filter' => 'authGuard']);
$routes->get('/client/clases/(:any)', 'Client::clases/$1',  ['filter' => 'authGuard']);
$routes->get('/client/asistenciaclase/(:any)/(:any)', 'Client::asistenciaclase/$1/$2',  ['filter' => 'authGuard']);

$routes->get('/clase', 'Clase::index',  ['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/clase/registrar', 'Clase::registrar', ['filter' => 'authGuard']);
$routes->get('/clase/editar/(:any)', 'Clase::editar/$1',  ['filter' => 'authGuard']);
$routes->post('/clase/editar/(:any)', 'Clase::editar/$1',  ['filter' => 'authGuard']);
$routes->get('/clase/borrar/(:any)', 'Clase::borrar/$1',  ['filter' => 'authGuard']);

$routes->get('/user/list', 'Login::display',  ['filter' => 'authGuard']);
$routes->get('/user/editar/(:any)', 'Login::editar/$1',  ['filter' => 'authGuard']);
$routes->post('/user/editar/(:any)', 'Login::editar/$1',  ['filter' => 'authGuard']);
$routes->get('/user/borrar/(:any)', 'Login::borrar/$1',  ['filter' => 'authGuard']);

$routes->get('/reservacion', 'Reservacion::index',  ['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/reservacion/registrar', 'Reservacion::registrar', ['filter' => 'authGuard']);
$routes->get('/reservacion/editar/(:any)', 'Reservacion::editar/$1',  ['filter' => 'authGuard']);
$routes->post('/reservacion/editar/(:any)', 'Reservacion::editar/$1',  ['filter' => 'authGuard']);
$routes->get('/reservacion/borrar/(:any)', 'Reservacion::borrar/$1',  ['filter' => 'authGuard']);
$routes->get('/reservacion/activar/(:any)', 'Reservacion::activar/$1',  ['filter' => 'authGuard']);

$routes->get('/horario', 'Horario::index',  ['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/horario/registrar', 'Horario::registrar', ['filter' => 'authGuard']);
$routes->get('/horario/editar/(:any)', 'Horario::editar/$1',  ['filter' => 'authGuard']);
$routes->post('/horario/editar/(:any)', 'Horario::editar/$1',  ['filter' => 'authGuard']);
$routes->get('/horario/borrar/(:any)', 'Horario::borrar/$1',  ['filter' => 'authGuard']);


$routes->get('/membresia', 'Membresia::index',  ['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/membresia/registrar', 'Membresia::registrar', ['filter' => 'authGuard']);
$routes->get('/membresia/editar/(:any)', 'Membresia::editar/$1',  ['filter' => 'authGuard']);
$routes->post('/membresia/editar/(:any)', 'Membresia::editar/$1',  ['filter' => 'authGuard']);
$routes->get('/membresia/borrar/(:any)', 'Membresia::borrar/$1',  ['filter' => 'authGuard']);


