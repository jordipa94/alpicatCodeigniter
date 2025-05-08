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
$routes->get('/programes/viewClassification/(:num)', 'ProgramesController::viewClassification/$1');

$routes->get('/admin/programes/llistatClassificacions', 'ProgramesController::viewLlistatClassificacio',['filter'=>'login:admin,administrador']); //
$routes->get('/admin/programes/crearClassificacio', 'ProgramesController::viewCrearClassificacio',['filter'=>'login:admin,administrador']); //
$routes->post('/admin/programes/crearClassificacio', 'ProgramesController::crearClassificacio',['filter'=>'login:admin,administrador']); //
$routes->get('/admin/programes/editClassificacio/(:num)', 'ProgramesController::editClassificacio/$1',['filter'=>'login:admin,administrador']);
$routes->post('/admin/programes/updateClassificacio/(:num)', 'ProgramesController::updateClassificacio/$1',['filter'=>'login:admin,administrador']);
$routes->get('/admin/programes/deleteClassificacio/(:num)', 'ProgramesController::deleteClassificacio/$1',['filter'=>'login:admin,administrador']);
$routes->get('/admin/programes/papeleraClassificacions', 'ProgramesController::recycleBinClassificacio',['filter'=>'login:admin,administrador']);
$routes->get('/admin/programes/restaurarClassificacio/(:num)', 'ProgramesController::restaurarClassificacio/$1',['filter'=>'login:admin,administrador']);
$routes->get('/admin/programes/searchClassificacio', 'ProgramesController::searchClassificacio',['filter'=>'login:admin,administrador']); //

//PROVA CLASSIFICACIO
$routes->get('/classificacioPrimerEquip', 'ProgramesController::fcfPrimerEquip');

//GALERIES
$routes->get('/galeria', 'GaleriaController::galeria');

//CONTACTE
$routes->get('/contacte', 'ContacteController::index');
$routes->post('/enviarFormulariContacte', 'ContacteController::enviarFormulariContacte');
$routes->get('/admin/gestionarContacte', 'ContacteController::gestionarContacte',['filter'=>'login:admin,administrador']);
$routes->get('/admin/gestionarContacte/filtrar', 'ContacteController::filtrar',['filter'=>'login:admin,administrador']);
$routes->get('/admin/gestionarContacte/readContactForm/(:num)', 'ContacteController::readContactForm/$1',['filter'=>'login:admin,administrador']);

//CRUD NOTICIES
$routes->get('/admin/noticies/llistatNoticies', 'NoticiesController::viewLlistatNoticies',['filter'=>'login:admin,administrador']);
$routes->get('/admin/noticies/crearNoticia', 'NoticiesController::viewCrearNoticia',['filter'=>'login:admin,administrador']);
$routes->post('/admin/noticies/crearNoticia', 'NoticiesController::crearNoticia',['filter'=>'login:admin,administrador']);
$routes->get('/admin/noticies/editNoticia/(:num)', 'NoticiesController::editNoticia/$1',['filter'=>'login:admin,administrador']);
$routes->post('/admin/noticies/updateNoticia/(:num)', 'NoticiesController::updateNoticia/$1',['filter'=>'login:admin,administrador']);
$routes->get('/admin/noticies/deleteNoticia/(:num)', 'NoticiesController::deleteNoticia/$1',['filter'=>'login:admin,administrador']);
$routes->get('/admin/noticies/papeleraNoticies', 'NoticiesController::recycleBinNoticia',['filter'=>'login:admin,administrador']);
$routes->get('/admin/noticies/restaurarNoticia/(:num)', 'NoticiesController::restaurarNoticia/$1',['filter'=>'login:admin,administrador']);
$routes->get('noticies/readNoticia/(:num)', 'NoticiesController::readNoticia/$1');
$routes->get('/admin/noticies/searchNoticiaCrud', 'NoticiesController::searchNoticiaCrud',['filter'=>'login:admin,administrador']);

//USUARIS
$routes->get('admin/registerUser', 'AuthController::showRegisterForm',['filter'=>'login:administrador']);
$routes->post('admin/registerUser', 'AuthController::registerUser',['filter'=>'login:administrador']);
$routes->get('admin/users', 'UsersController::index',['filter'=>'login:administrador']);
$routes->get('admin/users/editUser/(:num)', 'UsersController::editUser/$1',['filter'=>'login:administrador']);
$routes->post('admin/users/updateUser/(:num)', 'UsersController::updateUser/$1',['filter'=>'login:administrador']);
$routes->get('admin/users/deleteUser/(:num)', 'UsersController::deleteUser/$1',['filter'=>'login:administrador']);
$routes->get('admin/users/papeleraUsers', 'UsersController::recycleBinUsers',['filter'=>'login:administrador']);
$routes->get('admin/users/restaurarUser/(:num)', 'UsersController::restaurarUser/$1',['filter'=>'login:administrador']);

//CONFIGURACIO
$routes->get('/admin/gestionarConfig', 'ConfigController::index',['filter'=>'login:admin,administrador']);
$routes->get('/admin/editConfig/(:num)', 'ConfigController::editConfig/$1',['filter'=>'login:admin,administrador']);
$routes->post('/admin/updateConfig/(:num)', 'ConfigController::updateConfig/$1',['filter'=>'login:admin,administrador']);
$routes->get('/admin/searchConfig', 'ConfigController::searchConfig',['filter'=>'login:admin,administrador']);

//ADMIN
$routes->get('/admin', 'AuthController::index',['filter'=>'login:admin,administrador']);
$routes->get('login', 'AuthController::showLoginForm');
$routes->post('login', 'AuthController::login');
$routes->get('register', 'AuthController::showRegisterForm');
$routes->post('register', 'AuthController::register');
$routes->get('logout', 'AuthController::logout');