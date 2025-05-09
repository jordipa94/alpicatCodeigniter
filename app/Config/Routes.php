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

$routes->get('/admin/programes/llistatClassificacions', 'ProgramesController::viewLlistatClassificacio',['filter'=>'login:admin,gestor']);
$routes->get('/admin/programes/crearClassificacio', 'ProgramesController::viewCrearClassificacio',['filter'=>'login:admin,gestor']);
$routes->post('/admin/programes/crearClassificacio', 'ProgramesController::crearClassificacio',['filter'=>'login:admin,gestor']);
$routes->get('/admin/programes/editClassificacio/(:num)', 'ProgramesController::editClassificacio/$1',['filter'=>'login:admin,gestor']);
$routes->post('/admin/programes/updateClassificacio/(:num)', 'ProgramesController::updateClassificacio/$1',['filter'=>'login:admin,gestor']);
$routes->get('/admin/programes/deleteClassificacio/(:num)', 'ProgramesController::deleteClassificacio/$1',['filter'=>'login:admin,gestor']);
$routes->get('/admin/programes/papeleraClassificacions', 'ProgramesController::recycleBinClassificacio',['filter'=>'login:admin,gestor']);
$routes->get('/admin/programes/restaurarClassificacio/(:num)', 'ProgramesController::restaurarClassificacio/$1',['filter'=>'login:admin,gestor']);
$routes->get('/admin/programes/searchClassificacio', 'ProgramesController::searchClassificacio',['filter'=>'login:admin,gestor']);

//GALERIES
$routes->get('/galeria', 'GaleriaController::galeria');

//CONTACTE
$routes->get('/contacte', 'ContacteController::index');
$routes->post('/enviarFormulariContacte', 'ContacteController::enviarFormulariContacte');
$routes->get('/admin/gestionarContacte', 'ContacteController::gestionarContacte',['filter'=>'login:admin,gestor']);
$routes->get('/admin/gestionarContacte/filtrar', 'ContacteController::filtrar',['filter'=>'login:admin,gestor']);

//CRUD NOTICIES
$routes->get('/admin/noticies/llistatNoticies', 'NoticiesController::viewLlistatNoticies',['filter'=>'login:admin,gestor']);
$routes->get('/admin/noticies/crearNoticia', 'NoticiesController::viewCrearNoticia',['filter'=>'login:admin,gestor']);
$routes->post('/admin/noticies/crearNoticia', 'NoticiesController::crearNoticia',['filter'=>'login:admin,gestor']);
$routes->get('/admin/noticies/editNoticia/(:num)', 'NoticiesController::editNoticia/$1',['filter'=>'login:admin,gestor']);
$routes->post('/admin/noticies/updateNoticia/(:num)', 'NoticiesController::updateNoticia/$1',['filter'=>'login:admin,gestor']);
$routes->get('/admin/noticies/deleteNoticia/(:num)', 'NoticiesController::deleteNoticia/$1',['filter'=>'login:admin,gestor']);
$routes->get('/admin/noticies/papeleraNoticies', 'NoticiesController::recycleBinNoticia',['filter'=>'login:admin,gestor']);
$routes->get('/admin/noticies/restaurarNoticia/(:num)', 'NoticiesController::restaurarNoticia/$1',['filter'=>'login:admin,gestor']);
$routes->get('noticies/readNoticia/(:num)', 'NoticiesController::readNoticia/$1');
$routes->get('/admin/noticies/searchNoticiaCrud', 'NoticiesController::searchNoticiaCrud',['filter'=>'login:admin,gestor']);

//USUARIS
$routes->get('admin/users/registerUser', 'AuthController::showRegisterForm',['filter'=>'login:gestor']);
$routes->post('admin/users/registerUser', 'AuthController::registerUser',['filter'=>'login:gestor']);
$routes->get('admin/users', 'UsersController::index',['filter'=>'login:gestor']);
$routes->get('admin/users/editUser/(:num)', 'UsersController::editUser/$1',['filter'=>'login:gestor']);
$routes->post('admin/users/updateUser/(:num)', 'UsersController::updateUser/$1',['filter'=>'login:gestor']);
$routes->get('admin/users/deleteUser/(:num)', 'UsersController::deleteUser/$1',['filter'=>'login:gestor']);
$routes->get('admin/users/papeleraUsers', 'UsersController::recycleBinUsers',['filter'=>'login:gestor']);
$routes->get('admin/users/restaurarUser/(:num)', 'UsersController::restaurarUser/$1',['filter'=>'login:gestor']);
$routes->get('/admin/users/searchUser', 'UsersController::searchUser',['filter'=>'login:admin,gestor']);

//CONFIGURACIO
$routes->get('/admin/gestionarConfig', 'ConfigController::index',['filter'=>'login:admin,gestor']);
$routes->get('/admin/editConfig/(:num)', 'ConfigController::editConfig/$1',['filter'=>'login:admin,gestor']);
$routes->post('/admin/updateConfig/(:num)', 'ConfigController::updateConfig/$1',['filter'=>'login:admin,gestor']);
$routes->get('/admin/searchConfig', 'ConfigController::searchConfig',['filter'=>'login:admin,gestor']);

//ADMIN
$routes->get('/admin', 'AuthController::index',['filter'=>'login:admin,gestor']);
$routes->get('login', 'AuthController::showLoginForm');
$routes->post('login', 'AuthController::login');
$routes->get('register', 'AuthController::showRegisterForm');
$routes->post('register', 'AuthController::register');
$routes->get('logout', 'AuthController::logout');