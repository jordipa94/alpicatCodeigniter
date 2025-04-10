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
$routes->get('/searchNoticia', 'crudController::searchNoticia');

//CLASIFICACIONS
$routes->get('/programes', 'ProgramesController::programes');
$routes->get('/fcf', 'ProgramesController::fcfPrimerEquip');

//GALERIES
$routes->get('/galeria', 'GaleriaController::galeria');

//CONTACTE
$routes->get('/contacte', 'ContacteController::contacte');

//CRUD NOTICIES
$routes->get('/crearNoticia', 'crudController::viewCrearNoticia');
$routes->post('/crearNoticia', 'crudController::crearNoticia');
$routes->get('/editNoticia/(:num)', 'crudController::editNoticia/$1');
$routes->post('/updateNoticia/(:num)', 'crudController::updateNoticia/$1');
$routes->get('/deleteNoticia/(:num)', 'crudController::deleteNoticia/$1');
$routes->get('/readNoticia/(:num)', 'crudController::readNoticia/$1');
$routes->get('/searchNoticiaCrud', 'crudController::searchNoticiaCrud');

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
//BUSCADOR USER 
$routes->get('/searchUser','AdministracioController::searchUser');
//CRUD USERS
$routes->get('/deleteUser/(:num)', 'AdministracioController::deleteUser/$1');