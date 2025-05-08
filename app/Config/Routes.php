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
$routes->get('/programes', 'ProgramesController::index');
$routes->get('/classificacioPrimerEquip', 'ProgramesController::fcfPrimerEquip');

//GALERIES
$routes->get('/galeria', 'GaleriaController::galeria');

//CONTACTE
$routes->get('/contacte', 'ContacteController::index');
$routes->post('/enviarFormulariContacte', 'ContacteController::enviarFormulariContacte');
$routes->get('/admin/gestionarContacte', 'ContacteController::gestionarContacte',['filter'=>'login:admin']);
$routes->get('/admin/gestionarContacte/filtrar', 'ContacteController::filtrar',['filter'=>'login:admin']);
$routes->get('/admin/gestionarContacte/readContactForm/(:num)', 'ContacteController::readContactForm/$1',['filter'=>'login:admin']);

//CRUD NOTICIES
$routes->get('/admin/noticies/llistatNoticies', 'NoticiesController::viewLlistatNoticies',['filter'=>'login:admin']);
$routes->get('/admin/noticies/crearNoticia', 'NoticiesController::viewCrearNoticia',['filter'=>'login:admin']);
$routes->post('/admin/noticies/crearNoticia', 'NoticiesController::crearNoticia',['filter'=>'login:admin']);
$routes->get('/admin/noticies/editNoticia/(:num)', 'NoticiesController::editNoticia/$1',['filter'=>'login:admin']);
$routes->post('/admin/noticies/updateNoticia/(:num)', 'NoticiesController::updateNoticia/$1',['filter'=>'login:admin']);
$routes->get('/admin/noticies/deleteNoticia/(:num)', 'NoticiesController::deleteNoticia/$1',['filter'=>'login:admin']);
$routes->get('/admin/noticies/papeleraNoticies', 'NoticiesController::recycleBinNoticia',['filter'=>'login:admin']);
$routes->get('/admin/noticies/restaurarNoticia/(:num)', 'NoticiesController::restaurarNoticia/$1',['filter'=>'login:admin']);
$routes->get('noticies/readNoticia/(:num)', 'NoticiesController::readNoticia/$1');
$routes->get('/admin/noticies/searchNoticiaCrud', 'NoticiesController::searchNoticiaCrud',['filter'=>'login:admin']);

//CONFIGURACIO
$routes->get('/admin/gestionarConfig', 'ConfigController::index',['filter'=>'login:admin']);
$routes->get('/admin/editConfig/(:num)', 'ConfigController::editConfig/$1',['filter'=>'login:admin']);
$routes->post('/admin/updateConfig/(:num)', 'ConfigController::updateConfig/$1',['filter'=>'login:admin']);
$routes->get('/admin/searchConfig', 'ConfigController::searchConfig',['filter'=>'login:admin']);

//ADMIN
$routes->get('/admin', 'AuthController::index',['filter'=>'login:admin']);
$routes->get('login', 'AuthController::showLoginForm');
$routes->post('login', 'AuthController::login');
$routes->get('register', 'AuthController::showRegisterForm');
$routes->post('register', 'AuthController::register');
$routes->get('logout', 'AuthController::logout');