<?php 

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AuthController;
use Controllers\DashboardController;
use Controllers\CategoriasController;
use Controllers\ProveedoresController;
use Controllers\AlmacenController;
use Controllers\APIProveedores;
use Controllers\PaginasController;
use Controllers\UsuariosController;
use Controllers\VentasController;
use Controllers\TiendasController;

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

$router->get('/admin/usuarios', [UsuariosController::class, 'index']);
$router->get('/admin/usuarios/crear', [UsuariosController::class, 'crear']);
$router->post('/admin/usuarios/crear', [UsuariosController::class, 'crear']);
$router->get('/admin/usuarios/editar', [UsuariosController::class, 'editar']);
$router->post('/admin/usuarios/editar', [UsuariosController::class, 'editar']);
$router->post('/admin/usuarios/eliminar', [UsuariosController::class, 'eliminar']);

$router->get('/admin/almacen', [AlmacenController::class, 'index']);

$router->get('/admin/categorias', [CategoriasController::class, 'index']);

$router->get('/admin/proveedores', [ProveedoresController::class, 'index']);
$router->get('/admin/proveedores/crear', [ProveedoresController::class, 'crear']);
$router->post('/admin/proveedores/crear', [ProveedoresController::class, 'crear']);
$router->get('/admin/proveedores/editar', [ProveedoresController::class, 'editar']);
$router->post('/admin/proveedores/editar', [ProveedoresController::class, 'editar']);
$router->post('/admin/proveedores/eliminar', [ProveedoresController::class, 'eliminar']);


$router->get('/admin/ventas', [VentasController::class, 'index']);
$router->get('/admin/ventas/crear', [VentasController::class, 'crear']);
$router->post('/admin/ventas/crear', [VentasController::class, 'crear']);
$router->get('/admin/ventas/editar', [VentasController::class, 'editar']);
$router->post('/admin/ventas/editar', [VentasController::class, 'editar']);
$router->post('/admin/ventas/eliminar', [VentasController::class, 'eliminar']);


$router->get('/admin/tiendas', [TiendasController::class, 'index']);
$router->get('/admin/tiendas/crear', [TiendasController::class, 'crear']);
$router->post('/admin/tiendas/crear', [TiendasController::class, 'crear']);
$router->get('/admin/tiendas/editar', [TiendasController::class, 'editar']);
$router->post('/admin/tiendas/editar', [TiendasController::class, 'editar']);
$router->post('/admin/tiendas/eliminar', [TiendasController::class, 'eliminar']);


$router->get('/api/proveedores', [APIProveedores::class, 'index']);


// Paginas públicas

$router->get('/', [PaginasController::class, 'index']);
$router->get('/conocenos', [PaginasController::class, 'conocenos']);
$router->get('/contactos', [PaginasController::class, 'contactanos']);



$router->comprobarRutas();