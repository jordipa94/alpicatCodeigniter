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
$routes->get('/gestioContacte', 'ContacteController::gestionarContacte');
$routes->get('/gestioContacte/filtrar', 'ContacteController::filtrar');
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

//LOGIN ADMIN
$routes->get('/administracio_log','AdministracioController::login_dashboard');
$routes->post('/administracio_log/(:num)','AdministracioController::login_dashboard/$1');
$routes->get('/administracio_log_dark','AdministracioController::login_dashboard_dark');
$routes->post('/administracio_log_post','AdministracioController::login_post');
//REGISTRACION ADMIN
$routes->get('/registrar','AdministracioController::Registrar');
$routes->post('/registrar_post','AdministracioController::Registrar_post');
//ADMINISTRACION
$routes->get('/administracio','AdministracioController::index');
//ADMINISTRACION USERS
$routes->get('/administracio_users','AdministracioController::users_Admin');
//CRUS USERS
$routes->get('/Ver_users/(:num)', 'AdministracioController::readUser/$1');
//BUSCADOR USER 
$routes->get('/searchUser','AdministracioController::searchUser');
//CRUD USERS
$routes->get('/deleteUser/(:num)', 'AdministracioController::deleteUser/$1');
//CALENDARIO 

$routes->get('/calendar', 'AdministracioController::calendar');
$routes->get('/calendar/loadEvents', 'AdministracioController::loadEvents');
$routes->post('/calendar/addEvent', 'AdministracioController::addEvent');
