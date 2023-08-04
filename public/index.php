<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\CategoriasController;
use Controllers\ClientesController;
use Controllers\ProovedoresController;
use Controllers\AlmacenController;
use Controllers\VentasController;

$router = new Router();

//                      clase       ,        metodo
// Login
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'login']);
$router->post('/logout', [AuthController::class, 'logout']);

// Crear Cuenta
$router->get('/registro', [AuthController::class, 'registro']);
$router->post('/registro', [AuthController::class, 'registro']);

// Formulario de olvide mi password
$router->get('/olvide', [AuthController::class, 'olvide']);
$router->post('/olvide', [AuthController::class, 'olvide']);

// Colocar el nuevo password
$router->get('/reestablecer', [AuthController::class, 'reestablecer']);
$router->post('/reestablecer', [AuthController::class, 'reestablecer']);

// Confirmación de Cuenta
$router->get('/mensaje', [AuthController::class, 'mensaje']);
$router->get('/confirmar-cuenta', [AuthController::class, 'confirmar']);


//AREA DE ADMINISTRACION
$router->get('/admin/dashboard', [DashboardController::class, 'index']);

$router->get('/admin/clientes', [ClientesController::class, 'index']);

$router->get('/admin/almacen', [AlmacenController::class, 'index']);

$router->get('/admin/categorias', [CategoriasController::class, 'index']);

$router->get('/admin/proovedores', [ProovedoresController::class, 'index']);

$router->get('/admin/ventas', [VentasController::class, 'index']);
$router->get('/admin/ventas/crear', [VentasController::class, 'crear']);
$router->post('/admin/ventas/crear', [VentasController::class, 'crear']);
$router->get('/admin/ventas/editar', [VentasController::class, 'editar']);
$router->post('/admin/ventas/editar', [VentasController::class, 'editar']);
$router->post('/admin/ventas/eliminar', [VentasController::class, 'eliminar']);


$router->comprobarRutas();