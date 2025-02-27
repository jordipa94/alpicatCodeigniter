<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'IndexController::index');

$routes->get('/noticies', 'NoticiesController::noticies');

$routes->get('/programes', 'ProgramesController::programes');

$routes->get('/galeria', 'GaleriaController::galeria');

$routes->get('/contacte', 'ContacteController::contacte');

