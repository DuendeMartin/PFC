<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/inicio', 'Home::inicio');
$routes->match(['get','post'],'/inicioGet', 'Home::inicioGet');
$routes->get('/formulario', 'Home::formulario',['filter'=>'authGuard']);

$routes->match( ['get','post'],'/verificar', 'Home::comprobar');



$routes->match( ['get','post'],'/SiginController/loginAuth', 'SiginController::loginAuth');
$routes->get('/salir', 'ProfileController::cerrar_sesion');

$routes->get('/sigin', 'SiginController::index',['filter'=>'noauthGuard']);


$routes->get('/galaxias', 'GalaxiasController::index');
$routes->match( ['get','post'],'/galaxias/editar', 'GalaxiasController::editar');
$routes->match( ['get','post'],'/galaxias/actualizar', 'GalaxiasController::actualizar');


$routes->get('/misiones', 'MisionesController::index');
$routes->match( ['get','post'],'/misiones/editar', 'MisionesController::editar');
$routes->match( ['get','post'],'/misiones/actualizar', 'MisionesController::actualizar');


$routes->match( ['get','post'],'/estrellas_verdes/editar', 'MisionesController::editar_estrella_verde');
$routes->match( ['get','post'],'/estrellas_verdes/actualizar', 'MisionesController::actualizar_estrella_verde');


$routes->get('/enemigos', 'EnemigosController::index');
$routes->match( ['get','post'],'/enemigos/editar', 'EnemigosController::editar');
$routes->match( ['get','post'],'/enemigos/actualizar', 'EnemigosController::actualizar');


$routes->get('/encuentros_enemigos', 'EncuentrosEnemigosController::index');
$routes->match( ['get','post'],'/encuentros_enemigos/editar', 'EncuentrosEnemigosController::editar');
$routes->match( ['get','post'],'/encuentros_enemigos/actualizar', 'EncuentrosEnemigosController::actualizar');