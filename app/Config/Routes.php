<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// "RUTA DE LA URL", "FITXER CONTROLLER", "FUNCTION DEL FITXER CONTROLLER".
$routes->get('/', 'IndexController::index');

//CLUB / PAGES
$routes->get('/historia', 'SobreNosaltresController::historia');
$routes->get('/club', 'SobreNosaltresController::club');

//NOTICIES
$routes->get('/noticies', 'NoticiesController::index');
$routes->get('/searchNoticia', 'NoticiesController::searchNoticia');

//CLASIFICACIONS
$routes->get('/programes', 'ProgramesController::programes');
$routes->get('/fcf', 'ProgramesController::fcfPrimerEquip');

//GALERIES
$routes->get('/galeria', 'GaleriaController::galeria');

//CONTACTE
$routes->get('/contacte', 'ContacteController::index');
$routes->post('/enviarFormulariContacte', 'ContacteController::enviarFormulariContacte');
$routes->get('/gestioContacte', 'ContacteController::gestionarContacte');
$routes->get('/readContactForm/(:num)', 'ContacteController::readContactForm/$1');

//CRUD NOTICIES
$routes->get('/crearNoticia', 'NoticiesController::viewCrearNoticia');
$routes->post('/crearNoticia', 'NoticiesController::crearNoticia');
$routes->get('/editNoticia/(:num)', 'NoticiesController::editNoticia/$1');
$routes->post('/updateNoticia/(:num)', 'NoticiesController::updateNoticia/$1');
$routes->get('/deleteNoticia/(:num)', 'NoticiesController::deleteNoticia/$1');
$routes->get('/papeleraNoticies', 'NoticiesController::recycleBinNoticia');
$routes->get('/restaurarNoticia/(:num)', 'NoticiesController::restaurarNoticia/$1');
$routes->get('/readNoticia/(:num)', 'NoticiesController::readNoticia/$1');
$routes->get('/searchNoticiaCrud', 'NoticiesController::searchNoticiaCrud');