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
//$routes->get('/galeria', 'GaleriaController::index');
$routes->get('/admin/gestioGaleria', 'GaleriaController::index');//falta Galeria Funncion de los admins


//CONTACTE
$routes->get('/contacte', 'ContacteController::index');
$routes->post('/enviarFormulariContacte', 'ContacteController::enviarFormulariContacte');
$routes->get('/admin/gestionarContacte', 'ContacteController::gestionarContacte',['filter'=>'login:admin,gestor']);
$routes->get('/admin/marcarContestat/(:num)', 'ContacteController::marcarContestat/$1');
$routes->get('/admin/marcarPendent/(:num)', 'ContacteController::marcarPendent/$1');

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
//CRUD GALERIA falta ['filter'=>'login:admin,gestor'] 
$routes->get('/galeria', 'GaleriaController::index');
$routes->get('/admin/gestioGaleria', 'GaleriaController::index');
$routes->get('/admin/crearGaleria', 'GaleriaController::viewCrearGaleria');
$routes->post('/admin/crearGaleria', 'GaleriaController::crearGaleria');
$routes->get('/admin/editGaleria/(:num)', 'GaleriaController::editGaleria/$1');
$routes->post('/admin/updateGaleria/(:num)', 'GaleriaController::updateGaleria/$1');
$routes->get('/admin/deleteGaleria/(:num)', 'GaleriaController::deleteGaleria/$1');
$routes->get('/admin/papeleraGaleria', 'GaleriaController::recycleBinGaleria');
$routes->get('/admin/restaurarGaleria/(:num)', 'GaleriaController::restaurarGaleria/$1');
$routes->get('galeria/readGaleria/(:num)', 'GaleriaController::readGaleria/$1');
$routes->get('/admin/searchGaleriaCrud', 'GaleriaController::searchGaleriaCrud');
//CRUD CALENDARIO falta cambiar los links de las paginas privadas añadir ['filter'=>'login:admin,gestor']
$routes->get('/calendario_home','CalendarioController::index_home');
$routes->get('/calendario', 'CalendarioController::index');
$routes->get('/calendario/gestiEvent', 'CalendarioController::gestiEvent');
$routes->get('/calendario/addEvent', 'CalendarioController::viewAddEvent');
$routes->post('/calendario/addEvent', 'CalendarioController::addEvent');
$routes->get('/calendario/editEvent/(:num)', 'CalendarioController::viewEditEvent/$1');
$routes->post('/calendario/editEvent/(:num)', 'CalendarioController::editEvent/$1');
$routes->get('/calendario/deleteEvent/(:num)', 'CalendarioController::deleteEvent/$1');
$routes->get('/calendario/searchEventCrud', 'CalendarioController::searchEventCrud');


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

//CATEGORIES
$routes->get('/admin/gestionarCategoria', 'ConfigController::gestionarCategoria',['filter'=>'login:admin,gestor']);
$routes->get('/admin/editCategoria/(:num)', 'ConfigController::editCategoria/$1',['filter'=>'login:admin,gestor']);
$routes->post('/admin/updateCategoria/(:num)', 'ConfigController::updateCategoria/$1',['filter'=>'login:admin,gestor']);
$routes->get('/admin/searchCategoria', 'ConfigController::searchCategoria',['filter'=>'login:admin,gestor']);
$routes->post('/admin/crearCategoria', 'ConfigController::crearCategoria',['filter'=>'login:admin,gestor']);
$routes->get('/admin/deleteCategoria/(:num)', 'ConfigController::deleteCategoria/$1',['filter'=>'login:admin,gestor']);
$routes->get('admin/papeleraCategories', 'ConfigController::recycleBinCategories',['filter'=>'login:gestor']);
$routes->get('admin/restaurarCategoria/(:num)', 'ConfigController::restaurarCategoria/$1',['filter'=>'login:gestor']);

//ADMIN
$routes->get('/admin', 'AuthController::index',['filter'=>'login:admin,gestor']);
$routes->get('login', 'AuthController::showLoginForm');
$routes->post('login', 'AuthController::login');
$routes->get('register', 'AuthController::showRegisterForm');
$routes->post('register', 'AuthController::register');
$routes->get('logout', 'AuthController::logout');