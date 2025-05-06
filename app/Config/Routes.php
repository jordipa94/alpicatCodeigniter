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
$routes->get('/classificacioPrimerEquip', 'ProgramesController::fcfPrimerEquip');

//GALERIES
$routes->get('/galeria', 'GaleriaController::galeria');

//CONTACTE
$routes->get('/contacte', 'ContacteController::index');
$routes->post('/enviarFormulariContacte', 'ContacteController::enviarFormulariContacte');
$routes->get('/admin/gestionarContacte', 'ContacteController::gestionarContacte');
$routes->get('/admin/gestionarContacte/filtrar', 'ContacteController::filtrar');
$routes->get('/admin/gestionarContacte/readContactForm/(:num)', 'ContacteController::readContactForm/$1');

//CRUD NOTICIES
$routes->get('admin/noticies/llistatNoticies', 'NoticiesController::viewLlistatNoticies');
$routes->get('/admin/noticies/crearNoticia', 'NoticiesController::viewCrearNoticia');
$routes->post('/admin/noticies/crearNoticia', 'NoticiesController::crearNoticia');
$routes->get('/admin/noticies/editNoticia/(:num)', 'NoticiesController::editNoticia/$1');
$routes->post('/admin/noticies/updateNoticia/(:num)', 'NoticiesController::updateNoticia/$1');
$routes->get('/admin/noticies/deleteNoticia/(:num)', 'NoticiesController::deleteNoticia/$1');
$routes->get('/admin/noticies/papeleraNoticies', 'NoticiesController::recycleBinNoticia');
$routes->get('/admin/noticies/restaurarNoticia/(:num)', 'NoticiesController::restaurarNoticia/$1');
$routes->get('noticies/readNoticia/(:num)', 'NoticiesController::readNoticia/$1');
$routes->get('/admin/noticies/searchNoticiaCrud', 'NoticiesController::searchNoticiaCrud');

//CONFIGURACIO
$routes->get('/admin/gestionarConfig', 'ConfigController::index');

//ADMIN
$routes->get('/admin', 'AuthController::index',/*['filter'=>'login:admin,administrador']*/);
