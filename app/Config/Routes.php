<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index', ['filter' => 'authGuard']);
$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::index');
$routes->get('/login/registrar', 'Login::registrar');
$routes->post('/login/registrar', 'Login::registrar');
$routes->post('/login/registrar', 'Login::registrar');
$routes->get('/client', 'Client::index',  ['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/client/registrar', 'Client::registrar', ['filter' => 'authGuard']);
