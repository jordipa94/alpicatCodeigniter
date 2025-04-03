<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// "RUTA DE LA URL", "FITXER CONTROLLER", "FUNCTION DEL FITXER CONTROLLER".
$routes->get('/', 'IndexController::index');

$routes->get('/historia', 'SobreNosaltresController::historia');
$routes->get('/club', 'SobreNosaltresController::club');

$routes->get('/noticies', 'NoticiesController::index');
$routes->get('/searchNoticia', 'crudController::searchNoticia');

$routes->get('/programes', 'ProgramesController::programes');

$routes->get('/galeria', 'GaleriaController::galeria');

$routes->get('/contacte', 'ContacteController::contacte');

//CRUD NOTICIES
$routes->get('/crearNoticia', 'crudController::viewCrearNoticia');
$routes->post('/crearNoticia', 'crudController::crearNoticia');
$routes->get('/editNoticia/(:num)', 'crudController::editNoticia/$1');
$routes->post('/updateNoticia/(:num)', 'crudController::updateNoticia/$1');
$routes->get('/deleteNoticia/(:num)', 'crudController::deleteNoticia/$1');
$routes->get('/readNoticia/(:num)', 'crudController::readNoticia/$1');
$routes->get('/searchNoticiaCrud', 'crudController::searchNoticiaCrud');