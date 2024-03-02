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

$routes->get('/clase', 'Clase::index',  ['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/clase/registrar', 'Clase::registrar', ['filter' => 'authGuard']);
$routes->get('/clase/editar/(:any)', 'Clase::editar/$1',  ['filter' => 'authGuard']);
$routes->get('/clase/borrar/(:any)', 'Clase::borrar/$1',  ['filter' => 'authGuard']);
$routes->post('/clase/editar/(:any)', 'Clase::editar/$1',  ['filter' => 'authGuard']);

$routes->get('/user/list', 'Login::display',  ['filter' => 'authGuard']);

